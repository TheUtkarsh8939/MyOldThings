<?php session_start(); include"db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "bootstrap.php"; ?>
    <title>Login - Manoj sweets</title>
</head>
<body>
    <?php include "navbar.php"; ?>
    <br><br><br><br><br><br>
    <form action="" method="post">
        <div class="container">
            <div class="form-group">
                <div class="row">
                    <labal class="col-sm-2">E-mail:</labal><lable class="col-sm-12"><input type="email" name="email" class="form-control" required></lable><br><br>
                    <br><br><lable class="col-sm-2">Password:</lable><lable class="col-sm-12"><input type="password" name="ps" class="form-control" required></lable>
                    <br><br><lable class="col-sm-6">Not Have Account? <a href="sign_in.php">Create ones</a></lable><br>
                    <br><br><br><br><lable class="col-sm-6"><button type="submit" class="btn btn-primery" name="btn">Login</button></lable>
                </div>
            </div>
        </div>
    </form>
    <?php 
        error_reporting(0);
        if (isset($_POST["btn"])) {
            $name = $_GET['name'];
            $red = $_GET['redirect'];
            $email = $_POST["email"];
            $ps = $_POST["ps"];
            $query = "SELECT * FROM `accounts` WHERE `email` = '".$email."' AND `ps` = '".$ps."'";
            $run = mysqli_query($conn,$query);
            if (mysqli_num_rows($run)<1) {
                echo "<script>alert('This account is not exists login with another account or create account');
                     window.location='sign_in.php';
                     </script>";
            }
            else {
                $_SESSION["login"] = $email;
                if($red != ""){
                    if($red == "page_sweet.php"){
                        echo "    <script>
                        window.location='".$red."?name=".$name."&cart=cart';
                        </script>";
                    }
                }
                else{
                    echo "<script>window.location='index.php';</script>";
                }
            }
        }
    ?>
    <?php include "bootstrap-js.php"; ?>
</body>
</html>