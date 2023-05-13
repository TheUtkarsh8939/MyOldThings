<!doctype html>
<html>
<head>
<link rel="icon" href="favicon.png">
<title>Checking information - Pragya chat</title>
</head>
</html>
<?php
    $room = $_POST['room'];
   
   $room = $_POST['room'];
   if(strlen($room)>20 or strlen($room)<2){
       echo '<script language="javascript">';
       echo 'alert("Please choose a name beetween 2 to 20 characters");';
       echo 'window.location="http://localhost/chatroom";';
       echo '</script>';
   }
   else if(!ctype_alnum($room)){
        echo '<script language="javascript">';
        echo 'alert("Please choose a alphanumeric name");';
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>'; 
   }
   else{
       include 'db_connect.php';

   $sql="SELECT * FROM `rooms` WHERE `roomname` LIKE '".$room."'";
   $result = mysqli_query($conn,$sql);
   if($result){
        if(mysqli_num_rows($result)>0){
            echo '<script language="javascript">';
            echo 'alert("Please Choose another room name this room name is alredy exists");';
            echo 'window.location="http://localhost/chatroom";';
            echo '</script>'; 
        }
        else{
            $sql = "INSERT INTO `rooms` ( `roomname`, `stime`) VALUES ( '".$room."', current_timestamp()); ";
            if(mysqli_query($conn,$sql)){
                echo '<script language="javascript">';
                echo 'alert("The room is reddy go and chat with your freinds and famliy members");';
                echo 'window.location="http://localhost/chatroom/rooms.php?roomname='.$room.'";';
                echo '</script>';

            }
        }
   }
}
echo mysqli_error($conn)
?>
