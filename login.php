<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel = "icon" href = "img/index_icon.jpg">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Delivery - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="css/style.min.css" rel="stylesheet">
    <style>
        img{
            background-position: center; 
            background-size: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>

<body class="bg-gradient-primary">
<form action = "DB_login.php" method = "post">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 "><img src="img/login_img.jpg"/></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">เจ้าหน้าที่</h1>
                                    </div>
                                    <?php if(isset($_SESSION['error'])){?>
                                    <div class="alert alert-danger" role ="alert">
                                    <?php
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                    </div>
                                    <?php }?>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp" name = "admin_username"
                                                placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name = "admin_password"
                                                id="exampleInputPassword" placeholder="Password" required>
                                        </div>
                                        <br>
                                        <button type="submit" name = "login" class="btn btn-primary btn-user btn-block">เข้าสู่ระบบ</button>
                                        <hr><br><br><br><br><br><br><br><br>
                                        <a href="index.php" style="text-decoration:none;"><p style="text-align:center;">กลับสู่หน้าแรก</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</form>
</body>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</html>