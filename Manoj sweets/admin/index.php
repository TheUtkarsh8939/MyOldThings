<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login Page</title>

<style>
	#type
	{
		height: 32px;
		width: 270px;
		border: 0;
  		outline: 0;
  		background: transparent;
  		border-bottom: 3px solid white;
  		color: white;
  		font-size: 25px;
	}

	#btn
	{
		height: 30px;
		width: 230px;
		background-color: orange;
		font-size: 20px;
	}

	table
	{
		border-radius: 25px;
		border:7px solid white;
		font-size: 25px;
		color: white;
		background:rgba(0,0,0,0.8);
	}

	input::-webkit-input-placeholder 
	{
    font-size: 20px;
    line-height: 3;
    color: white;
	}
</style>

</head>
<body background="img/admin_login_background1.jpg">

<form action="" method="POST">

<br><br><br><br><br>
	<table bgcolor="black" border="0" align="center" width="25%" cellspacing="30">
		
		<tr>
			<td colspan="2" align="center"><img src="img/admin_logo.png" width="50%"></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="email" placeholder="Username" id="type"></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="password" placeholder="*******" id="type"></td>
		</tr>

		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit" id="btn" value="Login"></td>
		</tr>
	</table>
<br><br>
<br><br>
</form>
<?php 
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $ps = $_POST['password'];
    if($ps == "1234" and $email == "localhost"){
        $_SESSION['admin'] = "yes";
        echo '
        <script>
            window.location.href="panel.php";
        </script>
        ';
    }
    else{
        echo"<script>
            alert('Wrong Username or Password');
        </script>";
    }
}
?>
</body>
</html>

