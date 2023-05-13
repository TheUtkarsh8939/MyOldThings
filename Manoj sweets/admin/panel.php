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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
</head>
<frameset cols="14%,*" noresize border="0">
    <frame src="left.php" name="left">
    <frame src="right.php" name="right">
</frameset>
</html>
