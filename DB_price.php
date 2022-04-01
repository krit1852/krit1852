<?php
  session_start();
  require('connect.php');
  if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
  if(isset($_POST['update_price'])){
      $id = $_POST['id'];
      $price_type = $_POST['price_type'];
      $price_withdraw = $_POST['price_withdraw'];
      $price_value = $_POST['price_value'];

      $price_sql = ("UPDATE price SET price_type = '$price_type',price_withdraw= '$price_withdraw', price_value= '$price_value' WHERE price_id = '$id'");
      $price_result = $conn->query($price_sql);
      if($price_result){
        $_SESSION['success_price']="Data has been updated successfully";
        header("location: price.php");
        
    }else{
        $_SESSION['error_price']="Data has not been updated successfully";
        header("location: price.php");
        

        }
    $pdo = null; // ปิดฐานข้อมูล
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel = "icon" href = "img/index_icon.jpg">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <title>Edit price</title>
</head>
<body>
<div class ="container mt-5">
    <h1>แก้ไขข้อมูลการจัดส่ง</h1>
        <hr class="mt-2">
        <form action = "DB_price.php" method = "post" enctype="multipart/form-data"> 
            <?php
            if(isset($_GET['id'])){
                $id =  $_GET['id'];
                $stmt = $conn->query("SELECT * FROM price WHERE price_id='$id'");
      $stmt->execute();
      $price_info = $stmt->fetch();


            }
            ?> 
            <div class="mb-3">
            <label for="price" class="form-label">วิธีการจัดส่ง</label>
            <input type="hidden" value="<?= $price_info['price_id'];?>" class="form-control" name = "id" aria-describedby="lname"required>
            <select name="price_type" class="form-select" >
                    <option value="<?= $price_info['price_type'];?>" selected="selected" hidden="hidden"><?= $price_info['price_type'];?></option>
                    <option value="มอเตอร์ไซค์รับจ้าง">มอเตอร์ไซค์รับจ้าง</option>
                    <option value="ส่งไปรษณีย์">ส่งไปรษณีย์</option>
            </select >
            </div>
            <div class="mb-3">
            <label for="price" class="form-label">สถานะเบิก</label>
            <select name="price_withdraw" class="form-select" >
                    <option value="<?= $price_info['price_withdraw'];?>" selected="selected" hidden="hidden"><?= $price_info['price_withdraw'];?></option>
                    <option value="เบิก">เบิก</option>
                    <option value="ยังไม่เบิก">ยังไม่เบิก</option>
            </select >
            </div>
            <div class="mb-3">
                <label for="price_value" class="form-label">ค่าส่ง</label>
                <input type="text" value="<?= $price_info['price_value'];?>" class="form-control" name = "price_value" aria-describedby="lname">
            </div>
        <a href="price.php" class="btn btn-secondary">ยกเลิก</a>
        <button type="submit"name="update_price" class="btn btn-primary">ตกลง</button>
            
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
