<?php 

    session_start();
    require('connect.php');
    
   $fname = $_POST['fname'];
   $lname = $_POST['lname'];
   $admin_username = $_POST['admin_username'];
   $password = md5($_POST['password']);
   $c_password =md5($_POST['c_password']);
   $urole = 'admin';

    $countadmin = "SELECT COUNT(*) FROM admin_info WHERE admin_username='$admin_username'";
    $stmt = $conn->query($countadmin);
    $countadmin = $stmt->fetchColumn();
    echo $countadmin . "<br>";
    if($countadmin==1){
        $_SESSION['error']='username ซ้ำ';
        header("location: manage_admin.php");
    }elseif ($password!=$c_password){
        $_SESSION['warning']='รหัสไม่ตรงกัน';
        header("location: manage_admin.php");
    }
    else{
 
        $user_sql = "INSERT INTO admin_info (admin_username,admin_password,admin_name,admin_surname,admin_role) 
                    VALUES ('$admin_username','$password','$fname','$lname','$urole')";
        $user_result = $conn->query($user_sql);

        if ($user_result /*and $book_result*/) {
            $_SESSION['success_admin']='add admin success';
            header("location: manage_admin.php");
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        
    }
    $pdo = null; // ปิดฐานข้อมูล
?>
