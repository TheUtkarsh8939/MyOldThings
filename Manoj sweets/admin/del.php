<?php 
    include 'db.php';
    $sno = $_GET['sno'];
    $sql = 'DELETE FROM `products` WHERE `SNO` = "'.$sno.'"';
    $res = mysqli_query($conn,$sql);
    if($res){
        echo '<script>
        alert("Succsesfuly Deleted Product");
        windows.location.href="product.php";
    </script>';
    }
    else{
        echo '<script>
        alert("Failed to Delete Product");
        windows.location.href="product.php";
    </script>';
    }
