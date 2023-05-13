<?php 
    include "db.php";
    include "functions.php";
    $url = $_GET["url"];
    logout();
    echo "<script>
            window.location.href = '".$url."';
          </script>";
?>