<!DOCTYPE html>
<html lang="en">
<head>
    <?php
         include "db.php" ;
         include "functions.php";
         //error_reporting(0);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .form1
        {
            margin-left: 40%;
            margin-right: 40%;
            padding-top: 10%;
            line-height: 60px;
        }
    </style>
</head>
<body>
    <?php navbar(); 
        if(isset($_POST["login"])){
            include "db.php";
            if($_SESSION['login']){
                echo "You are alredy logined";
            }
            else{
                $query = "SELECT * FROM `users` WHERE `email` =  '".$_POST["email"]."' and `ps` = '".$_POST["ps"]."'";
                $run = mysqli_query($db,$query);
                if($run){
                if(mysqli_num_rows($run)>0){
                    $_SESSION["login"] = true;
                    $assoc = mysqli_fetch_assoc($run);
                    $_SESSION["user"] = $assoc["username"];
                    echo "<script>alert('You are now Loged in');</script>";
                    gotoin();
                }else{
                    echo "<script>alert('Account You selected does not exist or You entered wrong Password or Email ');</script>";
                }
                }else{
                echo "<script>alert('Database Problem from server');</script>";
                gotoin();
                }
            }
        }
    ?>
    <div class="form-group form1">
    <form action="" method="post">
    <!-- Email input -->
    <div class="form-outline mb-4">
        <input type="email" id="form2Example1" class="form-control" name="email" />
        <label class="form-label" for="form2Example1">Email address</label>
    </div>

    <!-- Password input -->
    <div class="form-outline mb-4">
        <input type="password" id="form2Example2" class="form-control" name="ps" />
        <label class="form-label" for="form2Example2">Password</label>
    </div>

    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4" name="login">Log in</button>

    <!-- Register buttons -->
    <div class="text-center">
        <p>Do Not Have An Account? <a href="signin">Register</a></p>
        <p>or sign up with:</p>
        <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-facebook-f"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-google"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-twitter"></i>
        </button>

        <button type="button" class="btn btn-link btn-floating mx-1">
        <i class="fab fa-github"></i>
        </button>
    </div>
    </form>
    </div>
</body>
</html>