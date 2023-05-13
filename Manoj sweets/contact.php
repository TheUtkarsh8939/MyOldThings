<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Manoj Sweets</title>
    <?php include"bootstrap.php"; ?>
    <style>
    .align-sweet{
        justify-content: center;
        align-self: center;
        align-content: center;
        align-items: center;
        text-align: center;
    }
    .input-sweet{
        border-radius: 50px !important;
        align-self: center;
    }
    .input-sweet::placeholder { 
                  
                  /* Firefox, Chrome, Opera */
                  text-align: top !important;
              }
    .input-sweet:-ms-input-placeholder {
                    
        /* Internet Explorer 10-11 */
        text-align: top !important;
    }
              
    </style>
</head>
<body>
    <?php include "navbar.php"; ?>
    <br><br><br><br>
    <div class="container align-sweet">
    <div class="form-group">
    <h1>Our location</h1>
    <iframe 
     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4301.284915253885!2d84.23062689227373!3d24.9683237849279!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x398da8636640e5fd%3A0x1c9b8079d49e964b!2sManoj%20Sweet%20Shop!5e0!3m2!1sen!2sin!4v1625914366694!5m2!1sen!2sin" 
     width="600" 
     height="450"
      style="border:0;">
    </iframe><br><br>
    <form action="" method="post">
    <input type="text" class="form-control input-sweet" placeholder="Mobile number" name="mobileno"><br>
    <input type="text" class="form-control input-sweet" placeholder="E-mail" name="email"><br>
    <input type="text" class="form-control input-sweet" placeholder="Name *" required name="name"><br>
    <input type="text" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required name="msg"></textarea><br><br>
    <button type="submit" class="btn btn-primery" name="btn">Submit</button>
    <br><br>
    </form>
    </div>
    </div>
    <?php 
    include"db.php";
    error_reporting(0);
    if(isset($_POST["btn"])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $msg = $_POST['msg'];
    include "db.php";
    $sql = "INSERT INTO `contact` (`Name`, `E-mail`, `Mobile number`, `Msg`) VALUES ('".$name."', '".$email."', '".$mobileno."', '".$msg."')";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "<script>alert('Thank you for contacting your messege is sended to admin')</script";
    }
    }
    ?>
    <?php include "bootstrap-js.php"; ?>
</body>
</html>