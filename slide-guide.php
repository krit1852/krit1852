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
<ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="10"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="11"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="12"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="13"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="14"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="15"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="16"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="17"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="18"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="19"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="20"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="21"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="22"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="23"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="24"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="25"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="26"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="27"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="28"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="29"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="30"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="31"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="32"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0001.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0002.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0003.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0004.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0005.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0006.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0007.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0008.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0009.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0010.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0011.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0012.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0013.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0014.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0015.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0016.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0017.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0018.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0019.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0020.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0021.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0022.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0023.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0024.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0025.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0026.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0027.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0028.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0029.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0030.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0031.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0032.jpg">
    </div>
    <div class="carousel-item">
      <img class="d-block" style="width:75%; margin-left: auto; margin-right: auto;" src="pic/BOOK REPORT (3)_page-0033.jpg">
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
</div>
</div>
</body>
</html>