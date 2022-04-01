
<?php
  session_start();
  require('connect.php');
 if(!isset($_SESSION['super_admin_login'])){
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
     header('location: login.php');
 }
  if(isset($_POST['update'])){
      $id=$_POST['admin_username'];
      $id_temp=$_POST['admin_username_temp'];
      $password =md5($_POST['password']);
      $firstname =$_POST['fname'];
      $lastname =$_POST['lname'];
      $countadmin = "SELECT COUNT(*) FROM admin_info WHERE admin_username='$id'";
      $stmt = $conn->query($countadmin);
      $countadmin = $stmt->fetchColumn();
      
      if($countadmin==1 and ($id_temp!=$id)){
        $_SESSION['error_admin']='username ซ้ำ';
        header("location: manage_admin.php");
    }else{
        echo $id;
        $user_sql = ("UPDATE admin_info SET admin_username = '$id', admin_password='$password' ,admin_name='$firstname',admin_surname='$lastname'	WHERE admin_username='$id_temp'");
        $user_result = $conn->query($user_sql);

        if($user_result){
            $_SESSION['success_admin']="Data has been updated successfully";
            header("location: manage_admin.php");
            
        }else{
            $_SESSION['error_admin']="Data has not been updated successfully";
            header("location: manage_admin.php");
            

        }
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
  <link rel = "icon" href = "img/index_icon.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Edit Admin</title>
</head>
<body>

  <div class ="container mt-5">
    <h1>แก้ไขข้อมูลเจ้าหน้าที่</h1>
        <hr class="mt-2">
        <form action = "DB_edit_admin.php" method = "post" enctype="multipart/form-data"> 
            <?php
            if(isset($_GET['id'])){
                $admin_username =  $_GET['id'];
                $stmt = $conn->query("SELECT * FROM admin_info WHERE   admin_username='$admin_username' ");
                $stmt->execute();
                $data =  $stmt->fetch();


            }
            ?>
            <div class="mb-3">
                <label for="username" class="form-label">ชื่อผู้ใช้</label>
                <input type="text" value="<?= $data['admin_username'];?>" class="form-control" name = "admin_username" aria-describedby="username" required>
                <input type="hidden" value="<?= $data['admin_username'];?>" class="form-control" name = "admin_username_temp" aria-describedby="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">รหัสผ่าน</label>
                <input type="password" class="form-control" name ="password"  >
            </div>
          
            <div class="mb-3">
                <label for="fname" class="form-label">ชื่อจริง</label>
                <input type="text" value="<?= $data['admin_name'];?>" class="form-control" name = "fname" aria-describedby="fname" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">นามสกุล</label>
                <input type="text" value="<?= $data['admin_surname'];?>" class="form-control" name = "lname" aria-describedby="lname"required>
            </div>
            <div class="mb-3">
            </div>
            <div class="modal-footer">
        <a href="manage_admin.php" class="btn btn-secondary">ยกเลิก</a>
        <button type="submit"name="update" class="btn btn-primary">ตกลง</button>
      </div>
       </form>
        
    


  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>