<?php
  session_start();
  require('connect.php');
  if (isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])) {
    if (isset($_POST['update_rec'])) {
      $rec_title = $_POST['rec_title'];
      $rec_call = $_POST['rec_call'];
      $rec_author = $_POST['rec_author'];

      //id
      $id = $_SESSION['id'];
      // pic
      $image = addslashes(file_get_contents($_FILES['rec_pic']['tmp_name']));

      if (!empty($_FILES['rec_pic']['tmp_name']))
      {
        $rec_sql = ("UPDATE recommand SET rec_title = '$rec_title', rec_call='$rec_call' ,rec_author='$rec_author', rec_pic='$image' WHERE rec_id='$id'");
      } else
      {
        $rec_sql = ("UPDATE recommand SET rec_title = '$rec_title', rec_call='$rec_call' ,rec_author='$rec_author' WHERE rec_id='$id'");
      }
      $count = "SELECT COUNT(*) FROM recommand ";
      $stmt = $conn->query($count);
      $count = $stmt->fetchColumn();
      $rec_result = $conn->query($rec_sql);
      $stmt->execute();

      if ($rec_result) {
        $_SESSION['success_rec'] = "Data has been updated successfully";
        header("location: recommand_book.php");
      } else {
        $_SESSION['error_rec'] = "Data has not been updated successfully";
        header("location: recommand_book.php");


        $pdo = null; // ปิดฐานข้อมูล
      }
    }
  ?>

   <!DOCTYPE html>
   <html lang="en">

   <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="icon" href="img/index_icon.jpg">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <title>Edit Recommand</title>
   </head>

   <body>

     <div class="container mt-5">
       <h1>แก้ไขหนังสือยืมยอดนิยม</h1>
       <hr class="mt-2">
       <form action="DB_edit_recommand.php" method="post" enctype="multipart/form-data">
         <?php
          if (isset($_GET['id'])) {
            $rec_id =  $_GET['id'];
            $stmt = $conn->query("SELECT * FROM recommand WHERE rec_id='$rec_id' ");
            $stmt->execute();
            $data =  $stmt->fetch();
            $_SESSION['id'] = $rec_id;
          }
          ?>
         <div class="mb-3">
           <label for="rec_title" class="form-label">ชื่อหนังสือ</label>
           <input type="text" value="<?= $data['rec_title']; ?>" class="form-control" name="rec_title" aria-describedby="rec_title" required>
         </div>
         <div class="mb-3">
           <label for="rec_call" class="form-label">เลขหมู่หนังสือ</label>
           <input type="text" value="<?= $data['rec_call']; ?>" class="form-control" name="rec_call" aria-describedby="rec_call" required>
         </div>
         <div class="mb-3">
           <label for="rec_author" class="form-label">ชื่อผู้แต่ง</label>
           <input type="text" value="<?= $data['rec_author']; ?>" class="form-control" name="rec_author" aria-describedby="rec_author">
         </div>
         <div class="mb-3">
           <label for="img">รูปปกหนังสือ:</label>
           <input type="file" class="form-control" id="rec_pic" name="rec_pic">
         </div>
         <div class="modal-footer">
           <a href="recommand_book.php" class="btn btn-secondary">ยกเลิก</a>
           <button type="submit" name="update_rec" class="btn btn-primary">ตกลง</button>
         </div>
       </form>
     </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   </body>

   </html>
 <?php } else {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ';
    header('location: login.php');
  } ?>