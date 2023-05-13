<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Manoj Sweets Shop</title>
    <?php session_start(); include "bootstrap.php"; ?>
    <style>
    .mlmu{
        margin-left: 8px;
        margin-top: 8px;
    }
    </style>
</head>
<body>
<table border="3" class='mlmu'>
<tr><td>Email</td><td>Mobile</td></tr>
<?php 

include "db.php";
if($_SESSION['admin']==""){
    echo "<script>
    window.location.href='index.php';
</script>";
return false;
}
else{

}
$sql = "SELECT * FROM `accounts`";
$res = mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
while($row = mysqli_fetch_array($res)){
    echo "<tr>
    <td>".$row['email']."</td>
    <td>".$row['mobile']."</td>
    </tr>";
}
}
else{
    echo "No Accounts Found";
}
include 'Bootstrap-js.php';
?>  
</table>
</body>
</html>