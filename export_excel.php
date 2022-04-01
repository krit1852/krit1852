<?php
session_start();
require('connect.php');

if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){


//Prepare our SQL query.
$statement = $conn->prepare("SELECT user_date,user_name,user_surname,user_sendOption,user_address,price_type,price_value,price_withdraw FROM price");

//Executre our SQL query.
$statement->execute();

//Fetch all of the rows from our MySQL table.
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);

//Get the column names.
$columnNames = ['วันที่กรอกแบบฟอร์ม','ชื่อ','นามสกุล','ประเภทจัดส่ง','รายละเอียดการจัดส่ง','วิธีการจัดส่ง','ค่าส่ง','สถานะเบิก'];
if(!empty($rows)){
    //We only need to loop through the first row of our result
    //in order to collate the column names.
}

//Setup the filename that our CSV will have when it is downloaded.
$fileName = 'mysql-export.csv';

//Set the Content-Type and Content-Disposition headers to force the download.
header('Content-Type: application/excel; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $fileName . '"');

//Open up a file pointer
$fp = fopen('php://output', 'w');
fputs($fp,(chr(0xEF).chr(0xBB).chr(0xBF)));

//Start off by writing the column names to the file.
fputcsv($fp, $columnNames);

//Then, loop through the rows and write them to the CSV file.
foreach ($rows as $row) {
    fputcsv($fp, $row);
}

//Close the file pointer.
fclose($fp);
}
else{
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
      header('location: login.php');
}
?>