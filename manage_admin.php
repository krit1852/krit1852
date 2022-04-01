
<?php
  session_start();
  require('connect.php');
  if(!isset($_SESSION['super_admin_login'])){
     $_SESSION['error']='กรุณาเข้าสู่ระบบ';
      header('location: login.php');
  }
  if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $user_sql = ("DELETE FROM admin_info WHERE admin_username = '$delete_id'");
    $user_result = $conn->query($user_sql);
    if ($user_result /*and $book_result*/) {
      $_SESSION['success_admin']="Delete successfully";
      header("refresh:1; url=manage_admin.php");
   } else {
     echo "Error: " . mysqli_error($conn);
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
  <title>Manage admin</title>
</head>
<body>
<?php
include('side-nav-bar.php');
?>
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">เพิ่มผู้ใช้งาน</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action = "DB_manage_admin.php" method = "post" enctype="multipart/from-data"> 
            
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name = "admin_username" aria-describedby="username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name ="password"  required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name ="c_password"  required>
            </div>

            <div class="mb-3">
                <label for="fname" class="form-label">FirstName</label>
                <input type="text" class="form-control" name = "fname" aria-describedby="fname" required>
            </div>
            <div class="mb-3">
                <label for="lname" class="form-label">LastName</label>
                <input type="text" class="form-control" name = "lname" aria-describedby="lname"required>
            </div>
            <div class="mb-3">
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-primary">เพิ่ม</button>
      </div>
       </form>
      </div>
      
    </div>
  </div>
</div>
  <div class ="container mt-5">
    <div class="row">
      <div class = "col-md-6">
        <h1>จัดการผู้ดูแลระบบ</h1>
        
         </div>   
        <div class = "col-md-6 d-flex justify-content-end">
          <button type="button" class = "btn btn-primary " data-bs-toggle = "modal" data-bs-target="#userModal" >เพิ่มผู้ใช้งาน</button>
        </div>
      </div>
        <hr class="mt-2">
        <?php if(isset($_SESSION['error'])){?>
                <div class="alert alert-danger" role ="alert">
                    <?php
                     echo $_SESSION['error'];
                     unset($_SESSION['error']);
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
            <?php if(isset($_SESSION['success_admin'])){?>
                <div class="alert alert-success" role ="alert">
                    <?php
                     echo $_SESSION['success_admin'];
                     unset($_SESSION['success_admin']);
                    ?>
                </div>
            <?php }?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Username</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $stmt = $conn->query("SELECT admin_username,admin_name,admin_surname	FROM admin_info WHERE admin_role='admin'" );
    $stmt->execute();
    $admin = $stmt->fetchAll();

    if(!$admin){
      echo "<tr><td colspan= '6' class ='text-center'>No admin found</td></tr>";

    }else{
      $count = 1;
      foreach ($admin as $admins){
        

     
    
    ?>
    <tr>
      <th scope="row"><?php echo $count?> </th>
      <td><?= $admins['admin_username']?></td>
      <td><?= $admins['admin_name']?></td>
      <td><?= $admins['admin_surname']?></td>
      <td>
        <a href="DB_edit_admin.php?id=<?= $admins['admin_username'];?> " class = "btn btn-warning">แก้ไข</a>
        <a href="?delete=<?= $admins['admin_username'];?> " class = "btn btn-danger" onclick="return confirm('ต้องการลบข้อมูลหรือไม่?');">ลบ</a>
      </td>
    </tr>
    <?php  $count++;}
    }?>
    
  </tbody>
</table>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>