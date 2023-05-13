<?php session_start(); include"db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include"bootstrap.php"; include"db.php";?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in - Manoj sweets</title>
</head>
<body>
<?php include"navbar.php"; ?><br><br><br><br><br>
<form action="" method="post">
    <div class="container">
        <div class="form-group">
            <div class="row">
                <label for="E-mail" class="col-sm-2">E-mail:</label><label for="" class="col-sm-12"><input type="email" class="form-control" name="email" required></label>
            </div><br>
            <div class="row">
                <label for="Password" class="col-sm-2">Password:</label><label for="" class="col-sm-12"><input type="password" class="form-control" name="ps" required></label>
            </div><br>
            <div class="row">
                <label for="Mobile No." class="col-sm-2">Mobile No.:</label><label for="" class="col-sm-12"><input type="text" class="form-control" name="mobile"></label>
            </div><br><br>
            <button class="btn btn-primery" name="btn">Sign in</button>
        </div>
    </div>
    <?php 
    error_reporting(0);
    if(isset($_POST["btn"])){
        $email = $_POST['email'];
        $ps = $_POST['ps'];
        $mobile = $_POST['mobile'];
        $query = "SELECT * FROM `accounts` WHERE `email` = '".$email."'";
        if(mysqli_num_rows(mysqli_query($conn,$query))>0){
        echo "<script>alert('Please choose another email this email is allredy exists or login with it');</script>";
        }
        else{
            $sql = "INSERT INTO `accounts` (`email`, `ps`, `mobile`) VALUES ('".$email."', '".$ps."', '".$mobile."')";
            $res = mysqli_query($conn,$sql);
            if(!$res){
                echo "<script>alert('Error:".mysqli_error($conn)."')</script>";
            }
            else{
                echo "<script>alert('Thank you for sign in your account are succsesfuly created')</script>";
                $_SESSION["login"] = $email;
            }
        }
    }
    ?>
    <?php include "bootstrap-js.php"; ?>
</form>
</body>
</html>