<?php
    $room=$_POST["room"];
    include "db_connect.php";
    $sql = "SELECT * FROM `msgs` WHERE `room`='".$room."'";
    $res = "";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result))
        {
            $res = $res. '<div class="container">
              <span>'.$row['ip'].'</span>
              <p>'.$row['msg'].'</p>
              <span class="time-right">'.$row['stime'].'</span>
            </div>';
        }
    }
    else{
        $res = $res. "";
    }
    echo $res;
?>