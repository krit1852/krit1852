<?php
  session_start();
  require('connect.php');
  if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
  if(isset($_POST['update_book'])){
      $id = $_POST['id'];
      $status_book = $_POST['status_book'];
      $status_tracking = $_POST['status_tracking'];
      $status_dateSent = $_POST['status_dateSent'];
      $status_comment = $_POST['status_comment'];

    

      $user_sql = ("UPDATE bookstatus SET status_book = '$status_book',status_tracking= '$status_tracking', status_dateSent= '$status_dateSent', status_comment= '$status_comment' WHERE status_book_id = '$id'	");
      $user_result = $conn->query($user_sql);
      if($user_result){
        $_SESSION['success_book']="Data has been updated successfully";
        header("location: manage_book.php");
        
    }else{
        $_SESSION['error_book']="Data has not been updated successfully";
        header("location: manage_book.php");
        

        }
    $pdo = null; // ปิดฐานข้อมูล
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel = "icon" href = "img/index_icon.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Edit book</title>
</head>
<body>
<div class ="container mt-5">
    <h1>แก้ไขข้อมูลหนังสือ</h1>
        <hr class="mt-2">
        <form action = "DB_manage_book.php" method = "post" enctype="multipart/form-data"> 
            <?php
            if(isset($_GET['id'])){
                $id =  $_GET['id'];
                $stmt = $conn->query("SELECT user_info.user_date,user_info.user_id, user_info.user_name, user_info.user_surname, user_info.user_sendOption,user_info.user_stdID, 
                book.book_title, bookstatus.status_book, bookstatus.status_tracking, bookstatus.status_dateSent, bookstatus.status_comment,bookstatus.status_book_id
                            FROM user_info
                            INNER JOIN book ON user_info.user_id=book.book_user_id
                            INNER JOIN bookstatus ON book.book_id=bookstatus.status_book_id
                            WHERE bookstatus.status_book_id='$id'");
      $stmt->execute();
      $user_info = $stmt->fetch();


            }
            ?> 
            <div class="mb-3">
            <label for="status_book" class="form-label">สถานะหนังสือ</label>
            <input type="hidden" value="<?= $user_info['status_book_id'];?>" class="form-control" name = "id" aria-describedby="lname"required>
            <select name="status_book" class="form-select" >
                    <option value="<?= $user_info['status_book'];?>" selected="selected" hidden="hidden"><?= $user_info['status_book'];?></option>
                    <option value="กำลังดำเนินการ">กำลังดำเนินการ</option>
                    <option value="ส่งเรียบร้อย">ส่งเรียบร้อย</option>
                    <option value="ยกเลิกคำขอ (หาไม่พบ / หาย)">ยกเลิกคำขอ (หาไม่พบ / หาย)</option>
                    <option value="ยกเลิกคำขอ (มีที่ห้องสมุดอื่น)">ยกเลิกคำขอ (มีที่ห้องสมุดอื่น)</option>
                    <option value="ยกเลิกคำขอ (ส่งไฟล์แทนฉบับจริง)">ยกเลิกคำขอ (ส่งไฟล์แทนฉบับจริง)</option>
                    <option value="ยกเลิกคำขอ (ถูกยืมแล้ว)">ยกเลิกคำขอ (ถูกยืมแล้ว)</option>
            </select >
            </div>
            <div class="mb-3">
                <label for="status_tracking" class="form-label">หมายเลขพัสดุ</label>
                <input type="text" value="<?= $user_info['status_tracking'];?>" class="form-control" name = "status_tracking" aria-describedby="lname">
            </div>
            <div class="mb-3">
                <label for="status_dateSent" class="form-label">วันที่จัดส่งพัสดุ</label>
                <input type="date" value="<?= $user_info['status_dateSent'];?>" class="form-control" name = "status_dateSent" aria-describedby="lname">
            </div>
            <div class="mb-3">
                <label for="status_comment" class="form-label">หมายเหตุจากเจ้าหน้าที่</label>
                <input type="text" value="<?= $user_info['status_comment'];?>" class="form-control" name = "status_comment" aria-describedby="lname">
            </div>
        <a href="manage_book.php" class="btn btn-secondary">ยกเลิก</a>
        <button type="submit"name="update_book" class="btn btn-primary">ตกลง</button>
            
       </form>

        
    


  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
<?php $pdo = null; // ปิดฐานข้อมูล 
}
else{
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
      header('location: login.php');
}
?>