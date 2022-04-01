<?php
  session_start();
  require('connect.php');
  if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
    if(isset($_GET['delete'])){
      $delete_id = $_GET['delete'];
      $user_sql = ("DELETE FROM bookstatus WHERE status_book_id = '$delete_id'");
      $user_result = $conn->query($user_sql);
      $user_sql2 = ("DELETE FROM book WHERE book_id = '$delete_id'");
      $user_result2 = $conn->query($user_sql2);
  
      if ($user_result and $user_result2/*and $book_result*/) {
        $_SESSION['success_book']="Delete successfully";
        header("refresh:1; url=manage_book.php");
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
  <title>Manage Book</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<?php
include('side-nav-bar.php');
?>

<div style="padding:50px">
<h1>จัดการสถานะหนังสือ</h1><br>
<hr class="mt-2">
        <?php if(isset($_SESSION['error_book'])){?>
                <div class="alert alert-danger" role ="alert">
                    <?php
                     echo $_SESSION['error_book'];
                     unset($_SESSION['error_book']);
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
            <?php if(isset($_SESSION['success_book'])){?>
                <div class="alert alert-success" role ="alert">
                    <?php
                     echo $_SESSION['success_book'];
                     unset($_SESSION['success_book']);
                    ?>
                </div>
            <?php }?>
  <div class="container-fluid">
  <table id="userInfo" class="table table-striped">
    <thead>
      <th>วันที่กรอกแบบฟอร์ม</th>
      <th>ชื่อ นามสกุล</th>
      <th>รหัสนิสิต</th>
      <th>วิธีการจัดส่ง</th>
      <th>ชื่อหนังสือ</th>
      <th>สถานะ</th>
      <th>หมายเลขพัสดุ</th>
      <th>วันที่ส่งพัสดุ</th>
      <th>หมายเหตุ</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
      $stmt = $conn->query("SELECT user_info.user_date, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, 
      book.book_title, bookstatus.status_book, bookstatus.status_tracking, bookstatus.status_dateSent, bookstatus.status_comment, bookstatus.status_book_id
                            FROM user_info
                            INNER JOIN book ON user_info.user_id=book.book_user_id
                            INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id");
      $stmt->execute();

      $user_info = $stmt->fetchAll();

      foreach ($user_info as $user_info) {
      ?>
        <tr>
          <td><?php echo $user_info['user_date']?></td>
          <td><?php echo $user_info['user_name'] . " " . $user_info['user_surname']?> </td>
          <td><?php echo $user_info['user_stdID']?></td>
          <td><?php echo $user_info['user_sendOption']?></td>
          <td><?php echo $user_info['book_title'] ?></td>
            
          <?php if ($user_info['status_book'] == "กำลังดำเนินการ") {
            echo '<td style="color:orange;">'.$user_info['status_book'].'</td>';
            }
            else if ($user_info['status_book'] == "ส่งเรียบร้อย"){
            echo '<td style="color:green;">'.$user_info['status_book'].'</td>';
            }
            else if ($user_info['status_book'] == "ยกเลิกคำขอ (หาไม่พบ / หาย)" or $user_info['status_book'] == "ยกเลิกคำขอ (มีที่ห้องสมุดอื่น)" or $user_info['status_book'] == "ยกเลิกคำขอ (ถูกยืมแล้ว)" or $user_info['status_book'] == "ยกเลิกคำขอ (ส่งไฟล์แทนฉบับจริง)"){
            echo '<td style="color:red;">'.$user_info['status_book'].'</td>';
            }
            ?>
          <td><?php echo $user_info['status_tracking'] ?></td>
          <td><?php echo $user_info['status_dateSent'] ?></td>
          <td><?php echo $user_info['status_comment'] ?></td>
          <td>
            <a href="DB_manage_book.php?id=<?= $user_info['status_book_id'];?>" class = "btn btn-warning">แก้ไข</a>
            <a href="?delete=<?= $user_info['status_book_id'];?>" class = "btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?');">ลบ</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>
  </div>
</div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready( function () {
    $('#userInfo').DataTable({
        order: [[ 0, 'desc' ]]});
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