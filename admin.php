<?php
 session_start();
 require('connect.php');
 if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
?>

<html lang="en">
<head>
    <title>Dashboard</title>
   
    <link rel="stylesheet" href="css/admin_form.css">
    <link href="http://fonts.cdnfonts.com/css/lucida-sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel = "icon" href = "img/index_icon.jpg">
    <style>
        body {
        font-family: "Lucida Sans Unicode";
        font-size: 1rem;
        font-weight: 400;
        }
        .card{
            border-color: #f9f9f9;
            border-radius: 25px;
            padding:25px;
        }
        .card-text{
            font-size: 250%;
            font-weight: bold;
        }
        .column1 {
            margin-bottom: 100px;
            float: left;
            width: 40%;
            padding: 10px;
            height: 300px;
            z-index: 1;
        }
        .column2 {
            background-color:#b2ba1b;
            float: left;
            width: 60%;
            padding: 10px;
            height: 450px;
            border-radius:25px;
        }
        .row:after {
            content: "";
            display: table;
            clear: both;
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
    </style>
</head>
<body>
    
<?php
include('side-nav-bar.php');
if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
    $lost = "SELECT COUNT(*) FROM bookstatus INNER JOIN book ON book.book_id=bookstatus.status_book_id INNER JOIN user_info ON user_info.user_id=book.book_user_id WHERE status_book=3 and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
    $stmt = $conn->query($lost);
    $lost = $stmt->fetchColumn();

    $nothave = "SELECT COUNT(*) FROM bookstatus INNER JOIN book ON book.book_id=bookstatus.status_book_id INNER JOIN user_info ON user_info.user_id=book.book_user_id WHERE status_book=4 and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
    $stmt = $conn->query($nothave);
    $nothave = $stmt->fetchColumn();

    $anotherplace = "SELECT COUNT(*) FROM bookstatus INNER JOIN book ON book.book_id=bookstatus.status_book_id INNER JOIN user_info ON user_info.user_id=book.book_user_id WHERE status_book=5 and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
    $stmt = $conn->query($anotherplace);
    $anotherplace = $stmt->fetchColumn();

    $borrowed = "SELECT COUNT(*) FROM bookstatus INNER JOIN book ON book.book_id=bookstatus.status_book_id INNER JOIN user_info ON user_info.user_id=book.book_user_id WHERE status_book=6 and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
    $stmt = $conn->query($borrowed);
    $borrowed = $stmt->fetchColumn();
}

else{
$lost = "SELECT COUNT(*) FROM bookstatus WHERE status_book=3";
$stmt = $conn->query($lost);
$lost = $stmt->fetchColumn();


$nothave = "SELECT COUNT(*) FROM bookstatus WHERE status_book=4";
$stmt = $conn->query($nothave);
$nothave = $stmt->fetchColumn();

$anotherplace = "SELECT COUNT(*) FROM bookstatus WHERE status_book=5";
$stmt = $conn->query($anotherplace);
$anotherplace = $stmt->fetchColumn();

$borrowed = "SELECT COUNT(*) FROM bookstatus WHERE status_book=6";
$stmt = $conn->query($borrowed);
$borrowed = $stmt->fetchColumn();
}
?>
<div style="padding:30px;">
<div style="white-space: nowrap;">
<h1 style="display: inline-block;">สถิติ</h1>

<div style="display: inline-block;float:right;">
</div>
<div style="float:right; margin-right:15px">
<p class="pop_up name" style="display: inline-block; padding-left:10px;width: 150px;"><a href="export_pdf.php" target="_blank" style="color:black;">Export PDF</a></p>
<p class="pop_up name" style="display: inline-block; padding-left:10px;width: 150px;"><a href="export_excel.php" style="color:black;">Export Excel</a></p>
</div>
</div>

<hr>

    <form method = "post" autocomplete="off"> 
        <div>
            <input type="date" id="start" placeholder="Start Date" name="start_date">
            <input type="date" id="end" placeholder="End Date" name="end_date">
            <button id="submit" type='submit' >ตกลง</button>
        </div>
    </form>

<div class="card-deck">
  <div class="card" style="background-color:#9dd5d6;">
    <div class="card-body">
      <h5 class="card-title">จำนวนคนส่งคำขอยืม</h5>
      <p class="card-text">
          <?php 
          if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
            $user_info = "SELECT COUNT(*) FROM user_info WHERE user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1";
            $stmt = $conn->query($user_info);
            $count_user = $stmt->fetchColumn();
            echo $count_user;
          }
          else{
            $user_info = "SELECT COUNT(*) FROM user_info";
            $stmt = $conn->query($user_info);
            $count_user = $stmt->fetchColumn();
            echo $count_user; }
            ?>
      </p>
    </div>
  </div>
  <div class="card" style="background-color:#ffb85a;">
    <div class="card-body">
      <h5 class="card-title">จำนวนเล่มที่ขอยืม</h5>
      <p class="card-text">
          <?php 
           if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
            $book_info = "SELECT COUNT(*) FROM book INNER JOIN user_info ON user_info.user_id=book.book_user_id WHERE user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1";
            $stmt = $conn->query($book_info);
            $count_book = $stmt->fetchColumn();
            echo $count_book;
           }
           else{
            $book_info = "SELECT COUNT(*) FROM book";
            $stmt = $conn->query($book_info);
            $count_book = $stmt->fetchColumn();
            echo $count_book; }
          ?>
      </p>
    </div>
  </div>
  <div class="card" style="background-color:#ffb496;">
    <div class="card-body">
      <h5 class="card-title">จำนวนเล่มที่ให้ยืม</h5>
      <p class="card-text">
          <?php
           if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
            $book_done_status = "SELECT COUNT(*) FROM bookstatus INNER JOIN book ON book.book_id=bookstatus.status_book_id INNER JOIN user_info ON user_info.user_id=book.book_user_id WHERE status_book=2 and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
           $stmt = $conn->query($book_done_status);
           $count_done_book = $stmt->fetchColumn();
           echo $count_done_book;
           }
           else{   
           $book_done_status = "SELECT COUNT(*) FROM bookstatus WHERE status_book=2";
           $stmt = $conn->query($book_done_status);
           $count_done_book = $stmt->fetchColumn();
           echo $count_done_book; }
           ?>
      </p>
    </div>
  </div>
  <div class="card" style="background-color:#ff455c;">
    <div class="card-body">
      <h5 class="card-title">จำนวนเล่มที่ไม่ได้ส่ง</h5>
      <p class="card-text">
          <?php 
          if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
           $book_reject_status = "SELECT COUNT(*) FROM bookstatus INNER JOIN book ON book.book_id=bookstatus.status_book_id INNER JOIN user_info ON user_info.user_id=book.book_user_id WHERE (status_book=3 OR status_book=4 OR status_book=5 OR status_book=6) and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
           $stmt = $conn->query($book_reject_status);
           $count_reject_book = $stmt->fetchColumn();
           echo $count_reject_book;
           }
           else{
           $book_reject_status = "SELECT COUNT(*) FROM bookstatus WHERE status_book=3 OR status_book=4 OR status_book=5 OR status_book=6";
           $stmt = $conn->query($book_reject_status);
           $count_reject_book = $stmt->fetchColumn();
           echo $count_reject_book; }
           ?>
      </p>
    </div>
  </div>
</div></div>
<hr>
<div class="row">
    <div class="column1">
        <div id="piechart"></div>
    </div>
    <div class="column2">
    <h1 style="padding-left: 20rem;">การขนส่ง</h1>
    <div class="card-deck">
    <div class="card" style="background-color:#b2ba1b; border-color:#b2ba1b;"></div>
        <div class="card" style="background-color:#9dd5d6; border-color:#b2ba1b; margin-right:150px; height: 170px;">
            <div class="card-body">
                <h5 class="card-title">มอเตอร์ไซค์รับจ้าง<br>ค่าใช้จ่าย</h5>
                <p class="card-text">
                <?php 
                 if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
                    $sumpicepost ="SELECT SUM(price_value) FROM price WHERE price_type= 'มอเตอร์ไซค์รับจ้าง' and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
                    $stmt = $conn->query($sumpicepost );
                    $sumpicepost  = $stmt->fetchColumn();
                    echo $sumpicepost;
                 }
                 else{
                    $sumpicepost ="SELECT SUM(price_value) FROM price WHERE price_type= 'มอเตอร์ไซค์รับจ้าง'";
                    $stmt = $conn->query($sumpicepost );
                    $sumpicepost  = $stmt->fetchColumn();
                    echo $sumpicepost;
                }
                ?>
                </p>
            </div>
        </div>
        <div class="card" style="background-color:#ffb85a; border-color:#b2ba1b; margin-right:150px; height: 170px;">
            <div class="card-body">
                <h5 class="card-title">มอเตอร์ไซค์รับจ้าง<br>จำนวนครั้ง</h5>
                <p class="card-text">
                <?php 
                if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
                    $countmoto ="SELECT count(price_value) FROM price WHERE price_type= 'มอเตอร์ไซค์รับจ้าง' and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
                    $stmt = $conn->query($countmoto );
                    $countmoto  = $stmt->fetchColumn();
                    echo $countmoto;
                }
                else{
                $countmoto ="SELECT count(price_value)
                FROM price
                WHERE price_type= 'มอเตอร์ไซค์รับจ้าง'";
                $stmt = $conn->query($countmoto );
                $countmoto  = $stmt->fetchColumn();
                echo $countmoto; }
                ?>
                </p>
            </div>
        </div>
    </div>
    <div class="card-deck" style="margin-top: 20px">
    <div class="card" style="background-color:#b2ba1b; border-color:#b2ba1b;"></div>
        <div class="card" style="background-color:#9dd5d6; border-color:#b2ba1b; margin-right:150px; height: 170px;">
            <div class="card-body">
                <h5 class="card-title">ไปรษณีย์<br>ค่าใช้จ่าย</h5>
                <p class="card-text">
                <?php 
                if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
                    $sumpicepost ="SELECT SUM(price_value) FROM price WHERE price_type= 'ส่งไปรษณีย์' and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
                    $stmt = $conn->query($sumpicepost );
                    $sumpicepost  = $stmt->fetchColumn();
                    echo $sumpicepost; 
                }
                else{
                    $sumpicepost ="SELECT SUM(price_value)
                    FROM price
                    WHERE price_type= 'ส่งไปรษณีย์'";
                    $stmt = $conn->query($sumpicepost );
                    $sumpicepost  = $stmt->fetchColumn();
                    echo $sumpicepost; }
                    ?>
                </p>
            </div>
        </div>
        <div class="card" style="background-color:#ffb85a; border-color:#b2ba1b; margin-right:150px; height: 170px;">
            <div class="card-body">
                <h5 class="card-title">ไปรษณีย์<br>จำนวนครั้ง</h5>
                <p class="card-text">
                <?php 
                if(!empty($_POST['start_date']) and !empty($_POST['end_date'])){
                    $countpost ="SELECT count(price_value) FROM price WHERE price_type= 'ส่งไปรษณีย์' and user_date BETWEEN CAST('$_POST[start_date]' AS DATE) AND CAST('$_POST[end_date]' AS DATE)+1;";
                    $stmt = $conn->query($countpost );
                    $countpost  = $stmt->fetchColumn();
                    echo $countpost;
                }
                else{
                $countpost ="SELECT count(price_value)
                FROM price
                WHERE price_type= 'ส่งไปรษณีย์'";
                $stmt = $conn->query($countpost );
                $countpost  = $stmt->fetchColumn();
                echo $countpost;} ?>
                </p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
// Load google charts
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

// Draw the chart and set the chart values
function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['หนังสือหาย',<?php echo $lost?>],
  ['ไม่มีหนังสือ', <?php echo $nothave?>],
  ['มีที่ห้องสมุดอื่น', <?php echo $anotherplace?>],
  ['ถูกยืมแล้ว', <?php echo $borrowed?>],
  
]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':'จำนวนเล่มที่ไม่ได้ส่ง', 'width':700, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>
  <!--Resubmit form-->
    <script>
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
<?php }
else{
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
    header('location: login.php');
}
?>