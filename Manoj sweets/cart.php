<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Manoj sweets</title>
    <style>
        .img-sweet{
            height:250px;
            width:250px;
        }
        .font-sweet{
            color: black;
        }
        .font-sweet1{
            color: black;
            font-size: medium;
        }
        .align-sweet{
            align-items: center;
            align-self: center;
            align-content: center;
            justify-self: center;
            justify-content: center;
            justify-items: center;
            text-align: center;
        }
    </style>
    <?php include "bootstrap.php"; ?>
</head>
<body>
<?php
session_start();
include "navbar.php";
include "db.php";
if($_SESSION['login']!=""){
$user = $_SESSION['login'];
if($user!=""){
$sql = "SELECT * FROM `cart` WHERE `user` = '".$user."'";
$result = mysqli_query($conn,$sql);
if($result){
   if(mysqli_num_rows($result)==0){
        echo "<b>There are no item in your cart</b>";
   }       
   else{
    while($row = mysqli_fetch_assoc($result)){
        echo "<a href='page_sweet.php?name=".$row['products']."' class='btn btn-primery align-sweet'><div class='row-sweet'>
        <lable class='col-sm-12'>
        <img class='img img-sweet' src='img/".$row['img']."'>
        </lable>
        <br><br>
        <lable class='col-sm-8 font-sweet'>
        <h2>".$row['products']."</h2>
        </lable>
        <lable class='col-sm-3 font-sweet1'>
        <h4>".$row['price']." Rupees Per kg</h4>
        </lable>
    </div></a>";
    }
   }  
}
else{
    die("Error:".mysqli_error($conn));
}
}
}
else{
    echo'<script>
    alert("Please Login First");
    window.location.href="login.php";
</script>';
}
include "bootstrap-js.php";
?> 

</body>
</html>