<?php
    session_start();
    require('connect.php');
    $id = $_POST['admin_username'];
    $password = md5($_POST['admin_password']);
  
    try{
        $check_data = $conn ->prepare("SELECT * FROM admin_info WHERE admin_username= :admin_username");
        $check_data ->bindParam(":admin_username",$id);
        $check_data ->execute();
        $row = $check_data->fetch(PDO::FETCH_ASSOC);
        if($check_data->rowCount()>0){
            if($id == $row['admin_username']){
                $check_pass = "SELECT admin_password FROM admin_info
                WHERE admin_username='$id'";
                $stmt = $conn->query($check_pass);
                $check_pass= $stmt->fetchColumn();
                if($password==$check_pass){
                    if($row['admin_role']=='admin'){
                        $_SESSION['admin_login'] =$row['admin_username'];
                        header("location: admin.php");
                    }else if($row['admin_role']=='super_admin'){
                        $_SESSION['super_admin_login']=$row['admin_username'];
                        header("location: admin.php");
                    }
                }else{
                    $_SESSION['error']="รหัสผ่านไม่ถูกต้อง";
                header("location: login.php");
                   
                }
            } else{
                $_SESSION['error']="username ไม่ถูกต้อง";
                header("location: login.php");
                }
        }else{$_SESSION['error']="username ไม่ถูกต้อง";
            header("location: login.php");
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $pdo = null; // ปิดฐานข้อมูล
?>