<?php
session_start();
require('connect.php');
if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel = "icon" href = "img/index_icon.jpg">
</head>

<body>
<?php
include('side-nav-bar.php');
?>
<div style="padding:50px">
    <h1>บันทึกข้อมูลทางการเงิน</h1><br>
    <table id="userInfo" class="table table-striped">
            <thead>
                <th>ลำดับ</th>
                <th>ชื่อ</th>
                <th>นามสกุล</th>
                <th>ที่อยู่ผู้รับ</th>
                <th>ประเภทการจัดส่ง</th>
                <th>ค่าส่ง</th>
                <th>สถานะเบิก</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM price");
                $stmt->execute();
                $price = $stmt->fetchAll();
                foreach ($price as $user_price) {
                ?>
                    <tr>
                        <td><?php echo $user_price['user_date'] ?></td>
                        <td><?php echo $user_price['user_name'] ?></td>
                        <td><?php echo $user_price['user_surname'] ?></td>
                        <td><?php echo $user_price['user_address'] ?></td>
                        <td><?php echo $user_price['price_type'] ?></td>
                        <td><?php echo $user_price['price_value'] ?></td>
                        <td><?php echo $user_price['price_withdraw'] ?></td>
                        <td>
                            <a href=" " class = "btn btn-warning">แก้ไข</a>
                            <a href=" " class = "btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?');">ลบ</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
    $('#userInfo').DataTable();
} );
  </script>
    </body>

</html>
<?php $pdo = null; // ปิดฐานข้อมูล 
}
else{
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
      header('location: login.php');
}
?>