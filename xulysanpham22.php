<?php
	include('../db/connect.php');
?>
<?php
	if(isset($_POST['themsanpham'])){
		$ten_xe = $_POST['ten_xe'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$thuong_hieu = $_POST['thuong_hieu'];
		$gia_xe = $_POST['gia_xe'];
		$dong_co = $_POST['dong_co'];
		$mau_xe = $_POST['mau_xe'];
		$nam_sanxuat = $_POST['nam_sanxuat'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_xe(ten_xe,thuong_hieu,gia_xe,dong_co,mau_xe,nam_sanxuat,sanpham_image) values ('$ten_xe','$thuong_hieu','$gia_xe','$dong_co','$mau_xe','$nam_sanxuat','$hinhanh')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$ten_xe = $_POST['ten_xe'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$thuong_hieu = $_POST['thuong_hieu'];
		$gia_xe = $_POST['gia_xe'];
		$dong_co = $_POST['dong_co'];
		$mau_xe = $_POST['mau_xe'];
		$nam_sanxuat = $_POST['nam_sanxuat'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_xe SET ten_xe='$ten_xe',thuong_hieu='$thuong_hieu',gia_xe='$gia_xe',dong_co='$dong_co',mau_xe='$mau_xe',nam_sanxuat='$nam_sanxuat' WHERE Car_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_xe SET ten_xe='$ten_xe',thuong_hieu='$thuong_hieu',gia_xe='$gia_xe',dong_co='$dong_co',mau_xe='$mau_xe',nam_sanxuat='$nam_sanxuat',sanpham_image='$hinhanh' WHERE Car_id='$id_update'";
		}
		mysqli_query($con,$sql_update_image);
	}
	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_xe WHERE Car_id='$id'");
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body style="background-color: #E6E6FA">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">Đơn hàng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh mục</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh mục Bài viết</a>
	      </li>
	         <li class="nav-item">
	        <a class="nav-link" href="xulybaiviet.php">Bài viết</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">Sản phẩm</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulykhachhang.php">Khách hàng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_xe WHERE Car_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				
				?>
				<div class="col-md-4">
				<h4>Cập nhật sản phẩm</h4>
				
				<form action="xulysanpham.php" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="ten_xe" value="<?php echo $row_capnhat['ten_xe'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['Car_id'] ?>">
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" width="80"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="dong_co" value="<?php echo $row_capnhat['dong_co'] ?>"><br>
					<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="mau_xe" value="<?php echo $row_capnhat['mau_xe'] ?>"><br>
					<label>Số lượng</label>
					<input type="text" class="form-control" name="nam_sanxuat" value="<?php echo $row_capnhat['nam_sanxuat'] ?>"><br>
					<input type="text" class="form-control" name="gia_xe" value="<?php echo $row_capnhat['gia_xe'] ?>"><br>
					
					<label>Chi tiết</label>
					<textarea class="form-control" rows="10" name="thuong_hieu"><?php echo $row_capnhat['thuong_hieu'] ?></textarea><br>
					
					</select><br>
					<input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Thêm sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên sản phẩm</label>
					<input type="text" class="form-control" name="ten_xe" placeholder="Tên sản phẩm"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Giá</label>
					<input type="text" class="form-control" name="dong_co" placeholder="Giá sản phẩm"><br>
					<label>Giá khuyến mãi</label>
					<input type="text" class="form-control" name="mau_xe" placeholder="Giá khuyến mãi"><br>
					<label>Số lượng</label>
					<input type="text" class="form-control" name="nam_sanxuat" placeholder="Số lượng"><br>
					<label>Mô tả</label>
					<textarea class="form-control" name="gia_xe"></textarea><br>
					<label>Chi tiết</label>
					<textarea class="form-control" name="thuong_hieu"></textarea><br>
					<input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Liệt kê sản phẩm</h4>
				<?php
				$sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_xe  ORDER BY tbl_xe.Car_id DESC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Thứ tự</th>
						<th>Tên sản phẩm</th>
						<th>Hình ảnh</th>
						<th>Số lượng</th>
						<th>Danh mục</th>
						<th>Giá sản phẩm</th>
						<th>Giá khuyến mãi</th>
						<th>Quản lý</th>
					</tr>
					<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_sp['ten_xe'] ?></td>
						<td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" height="100" width="80"></td>
						<td><?php echo $row_sp['nam_sanxuat'] ?></td>
						<td><?php echo $row_sp['thuong_hieu'] ?></td>
						<td><?php echo $row_sp['gia_xe'] ?></td>
						<td><?php echo $row_sp['dong_co']?></td>
						<td><?php echo $row_sp['mau_xe']?></td>
						<td><a href="?xoa=<?php echo $row_sp['Car_id'] ?>">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['Car_id'] ?>">Cập nhật</a></td>
					</tr>
				<?php
					} 
					?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>