
<?php
  session_start();
  require('connect.php');
  //แก้
  if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel = "icon" href = "img/index_icon.jpg">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Recommand book</title>
</head>
<body>
<?php
include('side-nav-bar.php');
?>

</div>
  <div class ="container mt-5">
    <div class="row">
      <div class = "col-md-6">
        <h1>จัดการหนังสือยืมยอดนิยม</h1>
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
            <?php if(isset($_SESSION['success_rec'])){?>
                <div class="alert alert-success" role ="alert">
                    <?php
                     echo $_SESSION['success_rec'];
                     unset($_SESSION['success_rec']);
                    ?>
                </div>
            <?php }?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ลำดับที่</th>
      <th scope="col">ชื่อเรื่อง</th>
      <th scope="col">เลขหมู่หนังสือ</th>
      <th scope="col">ชื่อผู้แต่ง</th>
      <th scope="col">รูป</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $stmt = $conn->query("SELECT * FROM recommand ORDER BY rec_id ASC" );
    $stmt->execute();
    $rec = $stmt->fetchAll();

    if(!$rec){
      echo "<tr><td colspan= '6' class ='text-center'>No recommand book found</td></tr>";

    }else{
      $count = 1;
      foreach ($rec as $recs){
        

     
    
    ?>
    <tr>
      <th scope="row"><?php echo $count?> </th>
      <td><?= $recs['rec_title']?></td>
      <td><?= $recs['rec_call']?></td>
      <td><?= $recs['rec_author']?></td>
      <td><?= '<img style="width: 100px; height:100px; " src="data:image/jpeg;base64,'.base64_encode($recs['rec_pic']).'"/>'?></td>
      <td>
        <a href="DB_edit_recommand.php?id=<?= $recs['rec_id'];?> " class = "btn btn-warning">แก้ไข</a>
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
<?php }
else{
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
      header('location: login.php');
} ?>