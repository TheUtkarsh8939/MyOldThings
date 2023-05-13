<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "db.php"; 
          include "functions.php";
          error_reporting(0);
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET["name"]; ?> - Utkarsh Restraunt</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
         .nav{
                position: fixed !important;
             }
    </style>
    <script src="script.js"></script>
</head>
<body>
    <!--NavBar-->
    <?php navbar(); ?>
    <!--SideNav-->
    <?php sidenav(); ?>
    <div class="main">
        <?php 
            if($_GET["food-search"] == ""){
                $name = $_GET['name'];
                showproductdetails($name);
            }
            else{
                $m = $_GET;
                $search = $m["food-search"];
                $veg =$m["veg"];
                $non = $m["non"];
                $type;
                if($non = "on" and $veg = "on"){
                    $type = "both";
                }
                elseif($non="on"){
                    $type = "Non";
                }
                else{
                    $type = "veg";
                }
                search($search,$type);
            }
           ?>
    </div>  
</body>
</html>