<?php
print_r($_GET);
include"db.php";
    $prc = $_GET['prc'];
    $img = $_GET['name'];
    $name = $_GET['name'];
    $sql = "INSERT INTO `products`(`name`, `img`, `price`) VALUES ('$name','$img','$prc');";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "true";
    }
    else{
        echo mysqli_error($conn);
    }
?>