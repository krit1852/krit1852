<?php
  session_start();
  require('connect.php');
  if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
    if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      $user_sql = ("DELETE FROM price WHERE price_id = '$delete_id'");
      $user_result = $conn->query($user_sql);
  
      if ($user_result) {
        $_SESSION['success_price']="Delete successfully";
        header("refresh:1; url=price.php");
     } else {
       echo "Error: " . mysqli_error($conn);
     }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel = "icon" href = "img/index_icon.jpg">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Price</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<?php
include('side-nav-bar.php');
?>

<div style="padding:50px">
<h1>บันทึกข้อมูลการเงิน</h1><br>
<hr class="mt-2">
<form method = "post" autocomplete="off"> 
        <div style="margin-bottom: 1rem;">
            <input type="date" id="start" placeholder="Start Date" name="start_date">
            <input type="date" id="end" placeholder="End Date" name="end_date">
            <select name="sendOption" style="padding:5px">
                <option value="0" disabled selected>ประเภทการจัดส่ง</option>
                <option value=1>รับด้านหน้าหอสมุด</option>
                <option value=2>ส่งคณะ / ภาควิชาในวิทยาเขตกำแพงแสน</option>
                <option value=3>ส่งหอพักนอกวิทยาเขตกำแพงแสน</option>
                <option value=4>ส่งต่างจังหวัด</option>
            </select>
            <select name="type" style="padding:5px">
              <option value="0" disabled selected>วิธีการจัดส่ง</option>
              <option value=1>มอเตอร์ไซค์รับจ้าง</option>
              <option value=2>ส่งไปรษณีย์</option>
            </select>
            <select name="withdraw" style="padding:5px">
              <option value="0" disabled selected>สถานะเบิก</option>
              <option value=1>เบิก</option>
              <option value=2>ยังไม่เบิก</option>
            </select>
            <input type=submit>
            <input type=reset>
        </div>
    </form>
        <?php if(isset($_SESSION['error_price'])){?>
                <div class="alert alert-danger" role ="alert">
                    <?php
                     echo $_SESSION['error_price'];
                     unset($_SESSION['error_price']);
                    ?>
                </div>
            <?php }?>
            <?php if(isset($_SESSION['warning'])){?>
                <div class="alert alert-danger" role ="alert">
                    <?php
                     echo $_SESSION['warning'];
                     unset($_SESSION['warning']);
                    ?>
                </div>
            <?php }?>
            <?php if(isset($_SESSION['success_price'])){?>
                <div class="alert alert-success" role ="alert">
                    <?php
                     echo $_SESSION['success_price'];
                     unset($_SESSION['success_price']);
                    ?>
                </div>
            <?php }?>
  <table id="priceInfo" class="table table-striped">
    <thead>
        <th>วันที่กรอกแบบฟอร์ม</th>
        <th>ชื่อ นามสกุล</th>
        <th>ที่อยู่ผู้รับ</th>
        <th>ประเภทการจัดส่ง</th>
        <th>วิธีการจัดส่ง</th>
        <th>สถานะเบิก</th>
        <th>ค่าส่ง</th>
        <th>Action</th>
    </thead>
    <tbody>
      <?php
      if (isset($_POST["sendOption"]))
      {
        $sendOption = $_POST["sendOption"];
      } 
      else 
      {
        $sendOption = "1 or 2 or 3 or 4";
      }
      if (isset($_POST["type"]))
      {
        $type = $_POST["type"];
      } 
      else 
      {
        $type = "1 or 2";
      }
      if (isset($_POST["withdraw"]))
      {
        $withdraw = $_POST["withdraw"];
      } 
      else 
      {
        $withdraw = "1 or 2";
      }
      if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
        $stmt = $conn->query("SELECT * FROM price 
        WHERE (user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1)
        and (price.user_sendOption=$sendOption) and (price.price_type=$type) and (price.price_withdraw=$withdraw)");
      }
      else{
      $stmt = $conn->query("SELECT * FROM price 
      WHERE (price.user_sendOption=$sendOption) and (price.price_type=$type) and (price.price_withdraw=$withdraw)");
      }
      $stmt->execute();

      $price_info = $stmt->fetchAll();

      foreach ($price_info as $price_info) {
      ?>
        <tr>
          <td><?php echo $price_info['user_date']?></td>
          <td><?php echo $price_info['user_name'] . " " . $price_info['user_surname']?> </td>
          <td><?php echo $price_info['user_address']?></td>
          <td><?php echo $price_info['user_sendOption']?></td>
          <td><?php echo $price_info['price_type']?></td>
          <td><?php echo $price_info['price_withdraw']?></td>
          <td><?php echo $price_info['price_value'] ?></td>
          <td>
            <a href="DB_price.php?id=<?= $price_info['price_id'];?>" class = "btn btn-warning">แก้ไข</a>
            <a href="?delete=<?= $price_info['price_id'];?>" class = "btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?');">ลบ</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
</div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
    $('#priceInfo').DataTable({
        order: [[ 0, 'desc' ]]});
} );
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
  var start = document.getElementById('start');
  var end = document.getElementById('end');

start.addEventListener('change', function() {
    if (start.value)
        end.min = start.value;
}, false);
end.addEventListener('change', function() {
    if (end.value)
        start.max = end.value;
}, false);
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