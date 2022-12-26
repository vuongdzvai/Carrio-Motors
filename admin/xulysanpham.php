<?php
	include('../db/connect.php');
?>
<?php
	if(isset($_POST['themsanpham'])){
		 
        $tenxe = $_POST['tenxe'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$thuonghieu = $_POST['thuonghieu'];
		$giaxe = $_POST['giaxe'];
		$dongco = $_POST['dongco'];
		$mauxe = $_POST['mauxe'];
		$namsanxuat = $_POST['namsanxuat'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_xe(ten_xe,thuong_hieu,gia_xe,dong_co,mau_xe,nam_sanxuat,sanpham_image) values ('$tenxe','$thuonghieu','$giaxe','$dongco','$mauxe','$namsanxuat','$hinhanh')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
         
		$tenxe = $_POST['tenxe'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$thuonghieu = $_POST['thuonghieu'];
		$giaxe = $_POST['giaxe'];
		$dongco = $_POST['dongco'];
		$mauxe = $_POST['mauxe'];
        $namsanxuat = $_POST['namsanxuat'];
		$path = '../uploads/';
		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_xe SET ten_xe='$tenxe',thuong_hieu='$thuonghieu',gia_xe='$giaxe',dong_co='$dongco',mau_xe='$mauxe',nam_sanxuat='$namsanxuat',sanpham_image='$hinhanh' WHERE Car_id='$id_update'";
		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_xe SET ten_xe='$tenxe',thuong_hieu='$thuonghieu',gia_xe='$giaxe',dong_co='$dongco',mau_xe='$mauxe',nam_sanxuat='$namsanxuat',sanpham_image='$hinhanh' WHERE Car_id='$id_update'";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="xulysanpham.css">
    <title>xe</title>
</head>

<body>
    <div class="collapse">
        <div class="details">
            <div class="acentOrders">
                <div class="cardHeader">
				 <h2>cap nhat xe</h2>
            	</div>
				<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_xe WHERE Car_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				
				?>
				<h4>cap nhat san pham</h4>
                <form action menthod="POST" enctype="multipart/form-data">
                    <label>Tên xe</label>
                    <input type="text" class="form-control" name="tenxe" value="<?php echo $row_capnhat['ten_xe'] ?>"><br>
                    <input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['Car_id'] ?>">
					<br/>
                    <label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['sanpham_image'] ?>" height="80" width="80"><br>
                    <br />
                    <label>Giá xe</label>
                    <input type="text" class="form-control" name="giaxe" value="<?php echo $row_capnhat['gia_xe'] ?>"><br>
                    <br />
					<label>Thương Hiệu</label>
					<input type="text" class="form-control" name="thuonghieu" value="<?php echo $row_capnhat['thuong_hieu'] ?>"><br>
                    <label>Động Cơ</label>
					<input type="text" class="form-control" name="dongco" value="<?php echo $row_capnhat['dong_co'] ?>"><br>
                    <br />
                    <label>Màu Xe</label>
					<input type="text" class="form-control" name="mauxe" value="<?php echo $row_capnhat['mau_xe'] ?>"><br>
                    <br />
                    <label>nam san xuat</label>
					<input type="text" class="form-control" name="namsanxuat" value="<?php echo $row_capnhat['nam_sanxuat'] ?>"><br>
                    <br />
					
                   <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-default">
                </form>
				<?php
			}else{
				?> 
				
				<h4>Thêm sản phẩm</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>Tên xe</label>
					<input type="text" class="form-control" name="tenxe" placeholder="Tên xe"><br>
					<label>Hình ảnh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Giá xe</label>
					<input type="text" class="form-control" name="giaxe" placeholder="Giá sản phẩm"><br>
					<label>Thương Hiệu</label>
					<input type="text" class="form-control" name="thuonghieu" placeholder="Thương Hiệu"><br>
					<label>Động Cơ</label>
					<input type="text" class="form-control" name="dongco" placeholder="Động Cơ"><br>
					<label>Màu Xe</label>
					<input type="text" class="form-control" name="mauxe" placeholder="Màu Xe"><br>
					<label>Năm Sản Xuất</label>
					<input type = "text"class="form-control" name="namsanxuat" placeholder="Năm Sản Xuất"><br>
					<input type="submit" name="themsanpham" value="Thêm sản phẩm" class="btn btn-default">
				</form>
			</div>
				<?php
			} 
			?>
				
			
  
			
				
            <div class="recentCustomers">
                <div class="cardHeader">
                    <h2> Liet Ke San Pham</h2>
                </div>
				<?php
				$sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_xe  ORDER BY Car_id DESC"); 
				?> 
                <table>
                    <tr>
                        <td width="60px">
                            <div class="imgBx"></div>
                        </td>
                        <td>
                            <table>
                                <thead >
                                    <tr>
                                        <th>Tên xe</th>
                                        <th>Hình Ảnh</th>
                                        <th>Giá Xe</th>
                                        <th>Thương Hiệu</th>
                                        <th>Động Cơ</th>
                                        <th>Màu Xe</th>
                                        <th>Năm Sản Xuất</th>
                                    </tr>
                                </thead>
                            </table>
                            <table>
                                <tbody>
								<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
                    			<tr>
									<td><?php echo $i ?></td>
									<td><?php echo $row_sp['ten_xe'] ?></td>
									<td><img src="../uploads/<?php echo $row_sp['sanpham_image'] ?>" height="100" width="80"></td>
									<td><?php echo number_format($row_sp['gia_xe']).'$' ?></td>
									<td><?php echo $row_sp['thuong_hieu'] ?></td>
									<td><?php echo $row_sp['dong_co'] ?></td>
									<td><?php echo $row_sp['mau_xe'] ?></td>
									<td><?php echo $row_sp['nam-sanxuat'] ?></td>
									<td><a href="?xoa=<?php echo $row_sp['Car_id'] ?>">Xóa</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['Car_id'] ?>">Cập nhật</a></td>
                   				</tr>
									<?php
					} 
					?> 
				
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>