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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel = "icon" href = "img/index_icon.jpg">
    <style>
        
    </style>
</head>

<body>
<?php
include('side-nav-bar.php');
?>
<br>
    <h1 style="padding-left:10px;">รายการคำขอยืม</h1>
    <form method = "post" autocomplete="off"> 
        <div style="margin-left: 1rem;">
            <input type="date" id="start" placeholder="Start Date" name="start_date">
            <input type="date" id="end" placeholder="End Date" name="end_date">
            <br>
            <div style="margin-top: 0.5rem;">
                <input type="checkbox" name="pending">
                <label for="pending">กำลังดำเนินการ</label>
                <button id="submit" type='submit' style="margin-left: 1rem;">ตกลง</button>
            </div>
        </div>
    </form>
    <div class="container-fluid">
        <table class="table table-striped" id="userTable">
            <thead>
                <th>วันที่กรอกแบบฟอร์ม</th>
                <th>ชื่อ นามสกุล</th>
                <th>สถานภาพ</th>
                <th>รหัสนิสิต</th>
                <th>คณะ/สำนัก</th>
                <th>ภาควิชา/ฝ่าย/กอง</th>
                <th>อีเมล</th>
                <th>เบอร์โทรศัพท์</th>
                <th>ไอดีไลน์</th>
                <th>ประเภทจัดส่ง</th>
                <th>รายละเอียดการจัดส่ง</th>
                <th>ชื่อหนังสือ</th>
                <th>เลขหมู่หนังสือ</th>
                <th>ชื่อผู้แต่ง</th>
                <th>หมายเหตุจากผู้ใช้</th>
                <th>สถานะหนังสือ</th>
            </thead>
            <tbody>
                <?php
                if(!empty($_POST['start_date']) and !empty($_POST['end_date']) and !isset($_POST['pending'])){
                    $stmt = $conn->query("SELECT user_info.user_date, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, user_info.user_title, user_info.user_faculty, 
                    user_info.user_department, user_info.user_email, user_info.user_tel, user_info.user_lineID, user_info.user_address,
                    book.book_title, book.book_call, book.book_author, book.book_comment,bookstatus.status_book
                                    FROM user_info INNER JOIN book ON user_info.user_id=book.book_user_id
                                    INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id 
                                    WHERE user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;");
                }
                else if(!empty($_POST['start_date']) and !empty($_POST['end_date']) and isset($_POST['pending'])){
                    $stmt = $conn->query("SELECT user_info.user_date, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, user_info.user_title, user_info.user_faculty, 
                    user_info.user_department, user_info.user_email, user_info.user_tel, user_info.user_lineID, user_info.user_address, 
                    book.book_title, book.book_call, book.book_author, book.book_comment,bookstatus.status_book
                                    FROM user_info
                                    INNER JOIN book ON user_info.user_id=book.book_user_id
                                    INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id 
                                    WHERE (user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1) and (status_book=1);");
                }
                else if(empty($_POST['start_date']) and empty($_POST['end_date']) and isset($_POST['pending'])){
                    $stmt = $conn->query("SELECT user_info.user_date, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, user_info.user_title, user_info.user_faculty, 
                    user_info.user_department, user_info.user_email, user_info.user_tel, user_info.user_lineID, user_info.user_address, 
                    book.book_title, book.book_call, book.book_author, book.book_comment,bookstatus.status_book
                                    FROM user_info
                                    INNER JOIN book ON user_info.user_id=book.book_user_id
                                    INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id 
                                    WHERE status_book=1;");
                }
                else{
                    $stmt = $conn->query("SELECT user_info.user_date, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, user_info.user_title, user_info.user_faculty, 
                    user_info.user_department, user_info.user_email, user_info.user_tel, user_info.user_lineID, user_info.user_address, 
                    book.book_title, book.book_call, book.book_author, book.book_comment,bookstatus.status_book
                                    FROM user_info
                                    INNER JOIN book ON user_info.user_id=book.book_user_id
                                    INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id");
                    }
                $stmt->execute();
                $user_info = $stmt->fetchAll();
                foreach ($user_info as $user) {
                ?>
                    <tr>
                        <td><?php echo $user['user_date'] ?></td>
                        <td><?php echo $user['user_name'] . " " . $user['user_surname']?> </td>
                        <td><?php echo $user['user_title'] ?></td>
                        <td><?php echo $user['user_stdID'] ?></td>
                        <td><?php echo $user['user_faculty'] ?></td>
                        <td><?php echo $user['user_department'] ?></td>
                        <td><?php echo $user['user_email'] ?></td>
                        <td><?php echo $user['user_tel'] ?></td>
                        <td><?php echo $user['user_lineID'] ?></td>
                        <td><?php echo $user['user_sendOption'] ?></td>
                        <td><?php echo $user['user_address'] ?></td>
                        <td><?php echo $user['book_title'] ?></td>
                        <td><?php echo $user['book_call'] ?></td>
                        <td><?php echo $user['book_author'] ?></td>
                        <td><?php echo $user['book_comment'] ?></td>
                        <td><?php echo $user['status_book'] ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- nav side script -->
    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.getElementById("mySidebar").style.display = "block";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.getElementById("mySidebar").style.display = "none";
        }
    </script>
    <!-- Data Table-->
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        
    $('#userTable').DataTable({
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
<?php $pdo = null; // ปิดฐานข้อมูล 
}
else{
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
      header('location: login.php');
}
?>