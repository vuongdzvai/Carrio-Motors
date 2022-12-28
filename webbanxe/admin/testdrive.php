<?php
	include('../db/connect.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            .thumbnail{
                height: 60px;
                width: 100px;
                overflow: hidden;
            }
            .thumbnail img{
                width:100%;
            }
        </style>
    </head>
    <body>
        <table border="0">
          <caption><h2>Danh sách khách hàng</h2></caption>
          <tr>
            <th>STT</th>
            <th>year_car</th>
            <th>make car id</th>
            <th>model car</th>
            <th>ho</th>
            <th>ten</th>
            <th>email</th>
            <th>phone</th>
            <th>noi dung</th>
            <th>ngay thang</th>
          </tr>
         
<?php
                        require_once('../db/connect.php');
                        $query = "SELECT * FROM testdrive ORDER BY id DESC";
                        $result = mysqli_query($con,$query);
                        $data = [];
                        while($row = mysqli_fetch_array($result,1)) {
                            $data[] = $row;
                        };
                       
                        require_once('../db/close.php');
$count1 = 0;
                        for($i = 0; $i <count($data);$i++)
                        {
    echo '<tr>
                        <td>'.++$count1.'
                           <td>' . $data[$i]['year_car'].'</td>
                           <td>' . $data[$i]['make_carID'].'</td>
                           <td>' . $data[$i]['model_car'].'</td>
                           <td>' . $data[$i]['ho_td'].'</td>
                           <td>' . $data[$i]['ten_td'].'</td>
                           <td>' . $data[$i]['email'].'</td>
                           <td>' . $data[$i]['phone'].'</td>
                           <td>' . $data[$i]['nd'].'</td>
                           <td>' . $data[$i]['ngay_thangtd'].'</td>
                           <tr>';
                         };
                      

                        ?>
        </table>
    </body>
</html>