<?php
  session_start();
  require('connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<link rel = "icon" href = "img/index_icon.jpg">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="css/nav.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Status</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
<nav class="navbar navbar-light " style="background-color: #006666;">
      <div class="container-fluid">
        <a class="navbar-brand">
          <img src="img/KU_Logo.png" width="100%" height="65px" class="d-inline-block align-text-center">
          <a href="index.php"style="text-decoration:none;" class="nav_link"><span class="navbar-brand-left">Book Delivery</span></a>
        </a>
        <a class="navbar-brand-right nav_link" href="login.php">เจ้าหน้าที่</a>
      </div>
</nav>
<div style="padding:50px">
<div style="float:left;">
    <p>กรุณาติดตามสถานะพัสดุได้  <a href="https://track.thailandpost.co.th/%22%3Ehttps://track.thailandpost.co.th/" target="_blank" style="color: #1cc88a">ที่นี่</a></p>
</div>
    <form method = "post" autocomplete="off"> 
        <div style="float:right; margin-bottom: 1rem;">
            <input type="date" id="start" placeholder="Start Date" name="start_date">
            <input type="date" id="end" placeholder="End Date" name="end_date">
            <input type=submit>
        </div>
    </form>

  <table id="userInfo" class="table table-striped">
    <thead>
      <th>วันที่กรอกแบบฟอร์ม</th>
      <th>ชื่อ นามสกุล</th>
      <th>รหัสนิสิต</th>
      <th>ประเภทจัดส่ง</th>
      <th>ชื่อหนังสือ</th>
      <th>สถานะ</th>
      <th>หมายเลขพัสดุ</th>
      <th>วันที่ส่งพัสดุ</th>
      <th>หมายเหตุจากเจ้าหน้าที่</th>
    </thead>
    <tbody>
      <?php
      if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
      $stmt = $conn->query("SELECT user_info.user_date, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, 
      book.book_title, bookstatus.status_book, bookstatus.status_tracking, bookstatus.status_dateSent, bookstatus.status_comment
                            FROM user_info
                            INNER JOIN book ON user_info.user_id=book.book_user_id
                            INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id
                            WHERE user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;");
      }
      else{
      $stmt = $conn->query("SELECT user_info.user_date, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, 
      book.book_title, bookstatus.status_book, bookstatus.status_tracking, bookstatus.status_dateSent, bookstatus.status_comment
                            FROM user_info
                            INNER JOIN book ON user_info.user_id=book.book_user_id
                            INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id");
      }
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
    $('#userInfo').DataTable({
        order: [[ 0, 'desc' ]]});
  });

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