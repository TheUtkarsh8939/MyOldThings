<?php
$roomname = $_GET['roomname'];
include 'db_connect.php';
$sql="SELECT * FROM `rooms` WHERE `roomname` LIKE '".$roomname."'";
$result=mysqli_query($conn,$sql);
if($result)
{
    if(mysqli_num_rows($result) == 0){
        echo '<script language="javascript">';
        echo "alert('This room dose not exist');";
        echo 'window.location="http://localhost/chatroom";';
        echo '</script>'; 
    }
}
else{
    echo "Error".mysqli_error($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
<title>
Pragya Chat - <?php echo $roomname ?>
</title>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="favicon.png">
<style>
body {
  margin: 0 !important;
  max-width: 100%;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
.anyClass{
    height: 350px;
    overflow-y: scroll;
}
.center{
  align-self: center;
  align-items: center;
  align-content: center;
  margin-right:30%;
  margin-left:30%;
}
</style>

<link rel="stylesheet" href="css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="justify-content-center align-center center">
<h2>Chat Messages - <?php echo $roomname ?></h2>

<div class="container">
<div class="anyClass">
</div>
</div>
<input type ="text" class="form-control" name="usermsg" id="usermsg" placeholde="Add messege"></input><br>
<button class="btn btn-grey" name="submitmsg" id="submitmsg">Send</button>
</div>
<script language="javascript">
//get data from database every 1 second
setInterval(runFunction,1000);
function runFunction(){
  $.post("htcont.php",
    {
      room: "<?php echo $roomname ?>"
    },
    function(data,status){
      document.getElementsByClassName("anyClass")[0].innerHTML = data;
    });
}
//ajax for sending messege

$( "#submitmsg" ).click(function() {
  var clientmsg = $("#usermsg").val()
  $.ajax({
  type: "POST",
  url: "postmsg.php",
  data: {text:clientmsg,room:"<?php echo $roomname ?>",ip:"<?php echo $_SERVER['REMOTE_ADDR'] ?>"},
  success:function(data,status){
    $("#usermsg").val("");
    document.getElementsByClassName("anyClass")[0].innerHTML=data;
  }
});
});
</script>
</body>
</html>