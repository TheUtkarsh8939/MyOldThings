<?php 
    session_start();
    if($_SESSION['admin']==""){
        echo "<script>
        window.location.href='index.php';
    </script>";
    return false;
    }
    else{

    }
    include "bootstrap.php";
    include 'bootstrap-js.php';
    include "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products - Manoj sweets</title>
    <style>
        table{
            margin: 5px;
        }
        th{
            padding: 5px;
        }
        td{
            padding: 5px;
        }
        img{
            max-height: 120px;
            max-width: 120px;
        }
    </style>
</head>
<body>
    <table border="3">
        <tr><th>Image</th><th>Name</th><th>Price</th><th>Delete</th></tr>
        <?php 
            $sql = "SELECT * FROM `products`";
            $res = mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                while($row = mysqli_fetch_array($res)){
                    echo "<tr><td><img src='../img/".$row['img']."'></td><td>".$row['name']."</td><td>".$row['price']."</td><td><a href='del.php?sno=".$row['sno']."' class='btn btn-danger'>Delete</a></td></tr>";
                }
            }
        ?>
    </table>
</body>
</html>