<?php 
require('connect.php');

if ($_POST['title']=='นิสิต'){
  $title = '0';
}
else if($_POST['title']=='บุคลากรภายในมหาวิทยาลัย'){
  $title = '1';
}
else if($_POST['title']=='ประชาชนทั่วไป'){
  $title = '2';
}

if ($_POST['sendOption']=='รับด้านหน้าหอสมุด'){
  $option = '0';
}
else if($_POST['sendOption']=='ส่งคณะ / ภาควิชาในวิทยาเขตกำแพงแสน'){
  $option = '1';
}
else if($_POST['sendOption']=='ส่งหอพักนอกวิทยาเขตกำแพงแสน'){
  $option = '2';
}
else if($_POST['sendOption']=='ส่งต่างจังหวัด'){
  $option = '3';
}

date_default_timezone_set('asia/bangkok');
$user_id = rand(0,9).$title.$option.time();
$price_id = "P".$user_id;
$rand = rand(0,9);

//user_info
$user_sql = "INSERT INTO user_info (user_name, user_surname, user_id, user_title, user_stdID, user_faculty, user_department, user_email, user_tel, user_lineID, user_sendOption, user_address, user_date) 
    	VALUES ('$_POST[name]', '$_POST[surname]', '$user_id', '$_POST[title]', '$_POST[stdID]', '$_POST[faculty]', '$_POST[department]', '$_POST[email]', '$_POST[tel]', '$_POST[lineID]', '$_POST[sendOption]', '$_POST[address]', CURRENT_TIMESTAMP)";
$user_result = $conn->query($user_sql);

//price
$user_price = "INSERT INTO price (price_id, price_type, price_value, price_withdraw, user_name, user_surname, user_sendOption, user_address, user_date) 
    	VALUES ('$price_id', '', '', '', '$_POST[name]', '$_POST[surname]', '$_POST[sendOption]', '$_POST[address]', CURRENT_TIMESTAMP)";
$user_price_result = $conn->query($user_price);

//book
$stmt = $conn->prepare("INSERT INTO  book (book_title, book_call, book_author, book_id, book_user_id, book_comment)
                      VALUES (?,?,?,?,'$user_id',?)");
$stmt -> bindParam(1,$title);
$stmt -> bindParam(2,$call);
$stmt -> bindParam(3,$author);
$stmt -> bindParam(4,$book_id);
$stmt -> bindParam(5,$comment);
for($i=0;$i<=count($_POST['book_title'])-1;$i++)
{
  $title = $_POST['book_title'][$i];
  $call = $_POST['book_call'][$i];
  $book_id = "B".$rand.$i.time();
  $author = $_POST['book_author'][$i];
  $comment = $_POST['book_comment'][$i];
  $stmt->execute();
}

$default_status = 'กำลังดำเนินการ';
for($i=0;$i<=count($_POST['book_title'])-1;$i++)
{
$stmt = $conn->prepare("INSERT INTO  bookstatus (status_book, status_tracking,status_id,status_book_id,status_dateSent,status_comment)
                      VALUES (?,'','',?,'','')");
$stmt -> bindParam(1,$default_status);
$stmt -> bindParam(2,$book_id);
$book_id = "B".$rand.$i.time();
$stmt->execute();
}


 if ($user_result and $user_price_result) {
    header("Location: linenotify.php");
 } else {
   echo "Error: " . mysqli_error($conn);
 }

$pdo = null; // ปิดฐานข้อมูล
?>
