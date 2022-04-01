<html lang="en">
<head>
    <title>Book Delivery</title>
    <link rel = "icon" href = "img/index_icon.jpg">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="css/nav.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
* {
  box-sizing: border-box;
}
.column1 {
  float: left;
  width: 30%;
  padding: 10px;
  height: 300px; / Should be removed. Only for demonstration /
}
.column2 {
  float: left;
  width: 70%;
  padding: 10px;
  height: 300px; / Should be removed. Only for demonstration /
}

/ Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

.rec{
  font-size: bold;
  text-align: center;
  margin-top: 10px; 
  margin-right: 20px;
  background-color: #006666;
  color: white;
  padding-top: 10px;
  padding-bottom: 10px;
  border-radius: 25px;
}

.user:link {
  color: #6B6B6B;
  text-decoration:none;
}
.user:visited {
  color: #6B6B6B;
  text-decoration:none;
}
.user:active {
  color: #6B6B6B;
  text-decoration:none;
}

.user:hover {
  color: black;
  text-decoration:none;
}

.user_form{
  font-size: 110%;
}

@media screen and (max-width: 1400px) {
  .column1 {
    width: 100%;
  }
}
@media screen and (max-width: 1400px) {
  .column2 {
    width: 100%;
    margin-top: 200px;
  }
}
@media only screen and (max-width: 600px) {
  .center-nav {
    display: none;
  }
}
@media only screen and (max-width: 575px) {
  .rec {
    font-size: bold;
    text-align: center;
    margin-top: 10px; 
    background-color: #006666;
    color: white;
    margin-right: auto;
    margin-left: auto;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 25px;
  }
  .card-deck {
    margin-right: auto;
    margin-left: 20%;
  }
}
@media only screen and (max-width: 480px) {
  .rec {
    margin-top: 20%;
    margin-left: 15px;
    margin-top: 200px;
    font-size: 100%;
  }
}
@media only screen and (max-width: 375px) {
  .rec {
    margin-right: auto;
    margin-left: 15px;
    margin-top: 200px;
    font-size: 100%;
  }
  .card-deck {
    margin-right: auto;
    margin-left: 15%;
  }
}
  

</style>
</head>
<body>
<nav class="navbar navbar-light " style="background-color: #006666;">
      <div class="container-fluid">
        <a class="navbar-brand">
          <img src="img/KU_Logo.png" width="100%" height="65px" class="d-inline-block align-text-center">
          <a href="index.php"style="text-decoration:none;" class="nav_link center-nav"><span class="navbar-brand-left">Book Delivery</span></a>
        </a>
        <a class="navbar-brand-right nav_link" href="login.php">เจ้าหน้าที่</a>
      </div>
    </nav>
<br>
<!--slideshow-->
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="img/banner1.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="img/banner3.jpg">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
  
<div class="row">
  <div class="column1">
    <div style="background-color: #c2c948; color: #6B6B6B; padding: 50px; margin-top: 25px; border-radius: 50px; margin-left: 50px; margin-right: 50px;">
      <h2>ผู้ใช้งาน (User)</h2><hr>
      <a class="user" href="form.php" target="_blank"><p class="user_form">• แบบฟอร์มยืม <span style="color: red; font-size:13px;">(Borrowing Books Form)</span></p></a>
      <a class="user" href="user_table.php"><p class="user_form">• ตรวจสอบสถานะการยืม <span style="color: red; font-size:13px;">(Tracking Service)</span></p></a>
      <a class="user" href="address.php"><p class="user_form">• ที่อยู่สำหรับส่งคืน <span style="color: red; font-size:13px;">(Return Address)</span></p></a>
      <a class="user" href="http://158.108.80.5/"><p class="user_form">• ค้นหาหนังสือ <span style="color: red; font-size:13px;">(Find Books)</span></p></a>
      <a class="user" href="https://docs.google.com/forms/d/e/1FAIpQLSdlg8autWpcVLW7OQhT34K1FGUy7uVpL0xY_6bap69QDOr1lg/viewform"><p class="user_form">• ประเมินความพึงพอใจ <span style="color: red; font-size:13px;">(Satisfaction Survey Form)</span></p></a>
      <a class="user" href="slide-guide.php"><p class="user_form">• คู่มือ <span style="color: red; font-size:13px;">(User Guide)</span></p></a>
    </div>
  </div>
  <div class="column2">



<!--card-->
<h5 class="rec">หนังสือยืมยอดนิยม (RECOMMAND BOOK)</h5>
<div class="card-deck" style="margin-right: 20px;">
<?php 
   require('connect.php');
   $stmt = $conn->prepare("SELECT * FROM recommand ORDER BY rec_id ASC"); 
   $stmt->execute();
   if($stmt->rowCount() > 0){ 
         while($row = $stmt->fetch(PDO::FETCH_ASSOC)){ 
            extract($row);
            echo '<div class="card" style="width: 17rem; height: 23rem; margin:8px 8px;">' . 
                     '<img class="card-img-top" style="width: 150px; height:200px; margin:auto; margin-top:10px;" src="data:image/jpeg;base64,'.base64_encode($row['rec_pic']).'"/>' .
                     '<div class="card-body">' . 
                     '<h5 class="card-title" style="text-align:center;">' . $row['rec_title'] . '</h5>' . 
                     '<p class="card-title" style="text-align:center;">Call No. : ' . $row['rec_call'] . '</p>' . 
                    //  '<p class="card-title" style="text-align:center;">ผู้แต่ง: ' . $row['rec_author'] . '</p>' . 
                  '</div></div>';
         }
      }
?>
  </div>
</div>
</div>
</body>
</html>