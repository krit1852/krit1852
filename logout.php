<?php 
    session_start();
    unset($_SESSION['admin_login']);
    unset($_SESSION['super_admin_login']);
    header('location: login.php');
?>