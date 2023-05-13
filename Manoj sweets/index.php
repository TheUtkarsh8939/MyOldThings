<?php session_start(); include"db.php"; ?>
<!DOCTYPE html>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<html>
    <head>
        <style>
        .img-sweet{
            height:250px;
            width:250px;
        }
        .row-sweet{
            float:left;
            margin-right:40px;
            align-self:center;
            align-content: center;
            align-items: center;
        }
        .font-sweet{
            color: black;
        }
        .welcome-sweet{
            font-family: 'Lobster', cursive;
            color: red;
            font-size:xxx-large;
        }
        .lable-welcome-sweet{
            text-align: center !important;
            align-self: center !important;
            align-content: center !important;
            align-items: center !important;
        }
        .sweet-text-after-welcome{
            color: black;
        }
        .lable-after-welcome-sweet{
            text-align: center !important;
            align-self: center !important;
            align-content: center !important;
            align-items: center !important;
        }
        .font-sweet1{
            color: black;
            font-size: 35px;
            align-self: center;
            align-items: center;
        }
        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Manoj sweets</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php include"bootstrap.php"; ?>
        
    </head>
    <body>
    <script>
    alert("Home delivery at darihat only");
    </script>
        <?php include"navbar.php"; ?>
        <br><br><br><br><br><br><br><br><br><br><br>
        <lable class="col-sm-7 lable-welcome-sweet">
        <h2 class="welcome-sweet">Welcome To</h2></lable><lable class="col-sm-9 lable-after-welcome-sweet"><h1 class="sweet-text-after-welcome">The Taste Of Darihut "Manoj sweet"</h1></lable>
       <br><lable class="col-sm-6 lable-after-welcome-sweet"><h1 class="sweet-text-after-welcome">Buy Sweets from here</h1></lable>
       <br><br><br><br> 
       <div class="container d-flex">
        <div class="form-group">
        <?php
                include "db.php";
                $sql = "SELECT * FROM `products`";
                $execute = mysqli_query($conn,$sql);
                $html = "";
                   if(mysqli_num_rows($execute)>0){
                   // Code to show Items
                       while($items = mysqli_fetch_assoc($execute)){
                           echo $html.'
                                   <a href="page_sweet.php?name='.$items["name"].'">
                                    <div class="item">
                                        <img src="img/'.$items["img"].'" alt="" class="img-sweet"><Br>
                                        <label id="name" class="font-sweet1">'.$items['name'].'</label><br>
                                        <label id="price" class="font-sweet1">Price  '.$items['price'].' Rupees</label>
                                        
                                    </div>
                                   </a>';
                   }
                   }
                   else{
                       echo $html;
                   }

        ?>
        <?php include "bootstrap-js.php"; ?>
        </div>
        </div>
    </body>
</html>