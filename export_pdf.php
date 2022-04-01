<?php
session_start();
require('fpdf.php');
if(isset($_SESSION['super_admin_login']) or isset($_SESSION['admin_login'])){
//Connect to your database
include("connect.php");

$select = "SELECT user_date,user_name,user_surname,user_sendOption,user_address,price_type,price_value,price_withdraw FROM price";
$result = $conn->prepare($select);
$result->execute();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('angsa','','angsa.php');
$pdf->SetFont('angsa','',10);
$pdf->Cell(0,10,iconv( 'UTF-8','TIS-620','รายการส่งหนังสือ'),0,1,"C");
    $pdf->Cell(25,10,iconv('UTF-8', 'TIS-620',"วันที่กรอกแบบฟอร์ม"),1);
    $pdf->Cell(25,10,iconv('UTF-8', 'TIS-620','ชื่อ'),1);
    $pdf->Cell(25,10,iconv('UTF-8', 'TIS-620','นามสกุล'),1);
    $pdf->Cell(35,10,iconv('UTF-8', 'TIS-620','ประเภทจัดส่ง'),1);
    $pdf->Cell(40,10,iconv('UTF-8', 'TIS-620','รายละเอียดการจัดส่ง'),1);
    $pdf->Cell(20,10,iconv('UTF-8', 'TIS-620','วิธีการจัดส่ง'),1);
    $pdf->Cell(10,10,iconv('UTF-8', 'TIS-620','ค่าส่ง'),1);
    $pdf->Cell(15,10,iconv('UTF-8', 'TIS-620','สถานะเบิก'),1);
    $pdf->Ln();
foreach ($result as $eachResult){
  $pdf->Cell(25,10,$eachResult["user_date"],1);
  $pdf->Cell(25,10,iconv('UTF-8', 'TIS-620',$eachResult["user_name"]),1);
  $pdf->Cell(25,10,iconv('UTF-8', 'TIS-620',$eachResult["user_surname"]),1);
  $pdf->Cell(35,10,iconv('UTF-8', 'TIS-620',$eachResult["user_sendOption"]),1);
  $pdf->Cell(40,10,iconv('UTF-8', 'TIS-620',$eachResult["user_address"]),1);
  $pdf->Cell(20,10,iconv('UTF-8', 'TIS-620',$eachResult["price_type"]),1);
  $pdf->Cell(10,10,iconv('UTF-8', 'TIS-620',$eachResult["price_value"]),1);
  $pdf->Cell(15,10,iconv('UTF-8', 'TIS-620',$eachResult["price_withdraw"]),1);
  $pdf->Ln();
}
$pdf->Output();
}
else{
    $_SESSION['error']='กรุณาเข้าสู่ระบบ';
      header('location: login.php');
}
?>