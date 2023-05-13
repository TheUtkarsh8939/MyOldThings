<?php 
    session_start();
    if($_SESSION['login'] != ""){
    include"db.php";
    $user = $_SESSION['login'];
    $prc = $_POST['prc'];
    $addr = $_POST['addr'];
    $name = $_POST['name'];
    $sql = "INSERT INTO `orders` (`product_name`, `address`, `user`, `price`, `payment_type`,`status`) VALUES ('".$name."', '".$addr."', '".$user."', '".$prc."', 'Cash on Dellivery','Pending');";
    $res = mysqli_query($conn,$sql);
    if($res){
        echo "true";
    }
    else{
        echo "false".mysqli_error($conn);
    }
}
else
{
    echo "Please Login First";
}
?>
