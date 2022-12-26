//config.php
<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DB', 'db_gift');

//dbhelper.php
<?php
require_once('config.php');

function init() {
	initDB();

	query('create table if not exists users (
			id int primary key auto_increment,
			fullname varchar(50),
			email varchar(150),
			password varchar(32)
		)');

	query('create table if not exists gifts (
			id int primary key auto_increment,
			title varchar(150),
			thumbnail varchar(500),
			content longtext,
			price float,
			created_at datetime,
			updated_at datetime
		)');
}

function initDB() {
	
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD);
	mysqli_set_charset($conn, 'utf8');

	
	mysqli_query($conn, 'create database if not exists '.DB);

	
	mysqli_close($conn);
}

function query($sql) {
	
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
	mysqli_set_charset($conn, 'utf8');

	
	mysqli_query($conn, $sql);

	
	mysqli_close($conn);
}

function queryResult($sql, $isSingle = false) {
	
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
	mysqli_set_charset($conn, 'utf8');

	
	$resultset = mysqli_query($conn, $sql);
	$data = [];

	while(($row = mysqli_fetch_array($resultset, 1)) != null) {
		$data[] = $row;
	}

	
	mysqli_close($conn);

	if($isSingle) {
		if(count($data) == 0) return null;

		return $data[0];
	}
	return $data;
}

//init.php
<?php
if(!empty($_POST)) {
	require_once('dbhelper.php');

	init();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Init Data</title>
</head>
<body>
<form method="post">
	<button name="action" value="init">Init Database</button>
</form>
</body>
</html>

//gift.php
<?php
session_start();

if(!isset($_SESSION['user'])) {
	header('Location: login.php');
	die();
}   

require_once('dbhelper.php');
$sql = "select * from gifts";
$list = queryResult($sql);
$index = 0;
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Page</title>
</head>
<body>
<a href="add.php"><button>Add new gift</button></a>
<table border="1" cellpadding="3" cellpadding="3" style="margin-top: 20px">
	<thead>
		<tr>
			<th>No</th>
			<th>Thumbnail</th>
			<th>Title</th>
			<th>Content</th>
			<th>Price</th>
			<th>Updated At</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($list as $item) { ?>
			<tr>
				<td><?=++$index?></td>
				<td><img src='<?=$item['thumbnail']?>' style="width: 120px"/></td>
				<td><?=$item['title']?></td>
				<td><?=$item['content']?></td>
				<td><?=number_format($item['price'], 0)?></td>
				<td><?=$item['updated_at']?></td>
				<td>
					<a href="edit.php?id=<?=$item['id']?>"><button>Edit</button></a>
					<a href="delete.php?id=<?=$item['id']?>"><button>Remove</button></a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>
</body>
</html>

//add.php
<?php
session_start();


if(!isset($_SESSION['user'])) {
	header('Location: login.php');
	die();
}

if(!empty($_POST)) {
	require_once('dbhelper.php');

	$title = $_POST['title'];
	$thumbnail = $_POST['thumbnail'];
	$content = $_POST['content'];
	$price = $_POST['price'];
	$updated_at = $created_at = date('Y-m-d H:i:s');

	$sql = "insert into gifts (title, thumbnail, content, price, updated_at, created_at) values ('$title', '$thumbnail', '$content', '$price', '$updated_at', '$created_at')";
	query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Gift Page</title>
</head>
<body>
<form method="post">
	<label>Title: </label>
	<br/>
	<input type="text" name="title" placeholder="Enter title" />

	<br/><br/>
	<label>Thumbnail: </label>
	<br/>
	<input type="text" name="thumbnail" placeholder="Enter thumbnail" />

	<br/><br/>
	<label>Content: </label>
	<br/>
	<textarea name="content" rows="5"></textarea>

	<br/><br/>
	<label>Price: </label>
	<br/>
	<input type="number" name="price" placeholder="Enter price" />

	<br/><br/>
	<p>
		<a href="gift.php">Back to list</a>
	</p>
	<button>Save</button>
</form>
</body>
</html>

//edit.php
<?php
session_start();

if(!isset($_SESSION['user'])) {
	header('Location: login.php');
	die();
}

require_once('dbhelper.php');
if(!empty($_POST)) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$thumbnail = $_POST['thumbnail'];
	$content = $_POST['content'];
	$price = $_POST['price'];
	$updated_at = date('Y-m-d H:i:s');

	$sql = "update gifts set title = '$title', thumbnail = '$thumbnail', content = '$content', price = '$price', updated_at = '$updated_at' where id = '$id'";
	query($sql);

	header('Location: gift.php');
	die();
}

$sql = "select * from gifts where id = ".$_GET['id'];
$item = queryResult($sql, true);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit Gift Page</title>
</head>
<body>
<form method="post">
	<label>Title: </label>
	<br/>
	<input type="hidden" name="id" value="<?=$item['id']?>" />
	<input type="text" name="title" placeholder="Enter title" value="<?=$item['title']?>" />

	<br/><br/>
	<label>Thumbnail: </label>
	<br/>
	<input type="text" name="thumbnail" placeholder="Enter thumbnail" value="<?=$item['thumbnail']?>" />

	<br/><br/>
	<label>Content: </label>
	<br/>
	<textarea name="content" rows="5"><?=$item['content']?></textarea>

	<br/><br/>
	<label>Price: </label>
	<br/>
	<input type="number" name="price" placeholder="Enter price" value="<?=$item['price']?>" />

	<br/><br/>
	<p>
		<a href="gift.php">Back to list</a>
	</p>
	<button>Save</button>
</form>
</body>
</html>

//delete.php
<?php
session_start();

if(!isset($_SESSION['user'])) {
	header('Location: login.php');
	die();
}

require_once('dbhelper.php');
if(!empty($_POST)) {
	$id = $_POST['id'];
	$sql = "delete from gifts where id = ".$id;
	query($sql);
	header('Location: gift.php');
	die();
}

$sql = "select * from gifts where id = ".$_GET['id'];
$item = queryResult($sql, true);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Page</title>
</head>
<body>
<p><img src='<?=$item['thumbnail']?>' style="width: 120px"/></p>
<p>Title: <?=$item['title']?></p>
<p>Content: <?=$item['content']?></p>
<p>Price: <?=number_format($item['price'], 0)?></p>
<p>Updated At: <?=$item['updated_at']?></p>

<p>
	<a href="gift.php">Back to list</a>
</p>

<form method="post">
	<button name="id" value="<?=$_GET['id']?>">Confirm Delete</button>
</form>
</body>
</html>

//form_register.php
<?php
if(!empty($_POST)) {
	require_once('dbhelper.php');

	$fullname = $_POST['fullname'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];

	$sql = "insert into users (fullname, email, password) values ('$fullname', '$email', '$pwd')";
	query($sql);
}

//form_login.php
<?php
if(!empty($_POST)) {
	require_once('dbhelper.php');

	$email = $_POST['email'];
	$pwd = $_POST['pwd'];

	$sql = "select * from users where email = '$email' and password = '$pwd'";
	$user = queryResult($sql, true);

	if($user != null) {
		$_SESSION['user'] = $user;

		header('Location: gift.php');
		die();
	}
}

//register.php
<?php
session_start();

if(isset($_SESSION['user'])) {
	header('Location: gift.php');
	die();
}

require_once('form_register.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register Page</title>
</head>
<body>
<form method="post">
	<label>Full Name: </label>
	<br/>
	<input type="text" name="fullname" placeholder="Enter fullname" />

	<br/><br/>
	<label>Email: </label>
	<br/>
	<input type="text" name="email" placeholder="Enter email" />

	<br/><br/>
	<label>Password: </label>
	<br/>
	<input type="password" name="pwd" placeholder="Enter pwd" />

	<br/><br/>
	<p>
		<a href="login.php">I have a account</a>
	</p>
	<button>Login</button>
</form>
</body>
</html>

//login.php
<?php
session_start();

if(isset($_SESSION['user'])) {
	header('Location: gift.php');
	die();
}

require_once('form_login.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>
<form method="post">
	<label>Email: </label>
	<br/>
	<input type="text" name="email" placeholder="Enter email" />

	<br/><br/>
	<label>Password: </label>
	<br/>
	<input type="password" name="pwd" placeholder="Enter pwd" />

	<br/><br/>
	<p>
		<a href="register.php">Create a new account</a>
	</p>
	<button>Login</button>
</form>
</body>
</html>
