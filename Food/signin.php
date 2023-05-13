<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <?php include "db.php"; include "functions.php"; ?>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php navbar();?>
    <section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp'); padding:70px 0px;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form action="" method="post">

                                <div class="form-outline mb-4">
                                <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="fn"/>
                                <label class="form-label" for="form3Example1cg">Your First Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                <input type="text" id="form3Example1cg" class="form-control form-control-lg" name = "ln"/>
                                <label class="form-label" for="form3Example1cg" >Your Last Name</label>
                                </div>

                                <div class="form-outline mb-4">
                                <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                                <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="ps" />
                                <label class="form-label" for="form3Example4cg" >Password</label>
                                </div>

                                <div class="form-outline mb-4">
                                <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="pscon" />
                                <label class="form-label" for="form3Example4cdg" >Repeat your password</label>
                                </div>

                                <div class="d-flex justify-content-center">
                                <button type="submit"
                                    class="btn btn-success btn-block btn-lg text-body" name="sub">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php"
                                    class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    error_reporting(0);
        if(isset($_POST["sub"])){
            $fn = $_POST["fn"];
            $ln = $_POST["ln"];
            $em = $_POST["email"];
            $ps = $_POST["ps"];
            $pscon = $_POST["pscon"];
            $user = $ln.$fn;
            if($pscon == $ps){
                signin($em,$ps,$fn,$ln,$user);
            }
            else{
                echo '<script>alert("You Must Enter Same Password in both Password and Confirm Password")</script>';
            }
        }
    
    ?>

</body>
</html>