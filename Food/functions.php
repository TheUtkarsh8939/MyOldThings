<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Style.css-->
        <link rel="stylesheet" href="style.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
<script src="script.js"></script>
<style>
  .drop{
    margin-left:91% !important;
  }
</style>
<?php
session_start();
function fetch_products(){
    include "db.php";
    $sql = "SELECT * FROM `items`";
    $execute = mysqli_query($db,$sql);
    $html = "";
       if(mysqli_num_rows($execute)>0){
       // Code to show Items
           while($items = mysqli_fetch_assoc($execute)){
               echo $html.'
                       <a href="products.php?name='.$items["name"].'">
                        <div class="item">
                            <img src="'.$items["img"].'" alt="" class="item-img">
                            <label id="name">'.$items['name'].'</label><br>
                            <label id="price">'.$items['price'].'</label>
                            
                        </div>
                       </a>';
       }
       }
       else{
           echo $html;
       }
}
    function navbar(){
      include "db.php";
      if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
      $url = "https://";   
      else  
      $url = "http://";   
      // Append the host(domain name, ip) to the URL.   
      $url.= $_SERVER['HTTP_HOST'];   
      
      // Append the requested resource location to the URL   
      $url.= $_SERVER['REQUEST_URI'];   
      
      //Account section Navigation Code
      error_reporting(0) ;
      if($_SESSION['login']){
        $query = "SELECT * FROM `users` WHERE `username` = '".$_SESSION["user"]."'";
        $run = mysqli_query($db,$query);
        $assoc = mysqli_fetch_assoc($run);
        $name = $assoc['Fn']." ".$assoc["Ln"];
      }
      else{
        $name = "Accounts";
      }
      //Navbar Code
        echo '    <nav class="nav navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" onclick="onclickjs()">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
            <li class="nav-item dropdown">
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Disabled</a>
            </li>
          </ul>
          <div class="form-inline">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              '.$name.'
            </a>
            <div class="dropdown-menu drop" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="login.php">Login</a>
              <a class="dropdown-item" href="logout.php/?url='.$url.'">Logout</a>
              <a class="dropdown-item" href="signin.php">Sign In</a>
            </div>
          </div>
        </div>
      </nav>';
    }
    function sidenav(){
      $name = $_GET["name"];
        echo '        <div class="sidenav" id="side">
        <form action="" method="get"><br><br><br><br>
            <div class="form-group">
                <input type="checkbox" name="veg" id="veg" checked>
                <label for="flexCheckDefault">Veg</label>
            </div>
            <br>
                <input type="text" name="name" value="'.$name.'" style="display:none;">
            <div class="form-group">
                <input type="checkbox" name="non" id="non" checked>
                <label for="non">Non-Veg</label>
            </div>
            <div class="form-group">
                <input class="form-control mr-sm-2" name="food-search" type="search" placeholder="Search Food Item" aria-label="Search"><br>
                <button class="btn btn-success my-2 my-sm-0" type="submit" onclick="search()">Search</button>
            </div>
        </form>
    </div>';
    }
    function search($name,$type){
      include "db.php"; 
      if($type == "both"){
        $query = "SELECT `name`,`img`,`price`,`type` FROM `items` WHERE `name` LIKE '".$name."'";
        $run = mysqli_query($db,$query);
        if(mysqli_num_rows($run)>0){
          while($items = mysqli_fetch_assoc($run)){
            echo '<a href="products.php?name='.$items["name"].'">
                        <div class="item">
                            <img src="'.$items["img"].'" alt="" class="item-img">
                            <label id="name">'.$items['name'].'</label><br>
                            <label id="price">'.$items['price'].'</label>
                            
                        </div>
                    </a>';
          }
        }
        else{
          die("Looks Like That We Don't Sell That Product");
        }
      } else {
        $query = "SELECT `name`,`img`,`price`,`type` FROM `items` WHERE `name` LIKE '".$name."' AND `type`='".$type."'";
        $run = mysqli_query($db,$query);
        if(mysqli_num_rows($run)>0){
          while($items = mysqli_fetch_assoc($run)){
            echo '<a href="products.php?name='.$items["name"].'">
                        <div class="item">
                            <img src="'.$items["img"].'" alt="" class="item-img">
                            <label id="name">'.$items['name'].'</label><br>
                            <label id="price">'.$items['price'].'</label>
                            
                        </div>
                    </a>';
          }
        }
        else{
          die("Looks Like That We Don't Sell That Product");
        }
      }
    }
    function showproductdetails($name){
      include("db.php");
      $query = "SELECT `name`, `price`, `type`,`img` FROM `items` WHERE `name` = '".$name."'";
      $run = mysqli_query($db,$query);
      if($run){
          $assoc = mysqli_fetch_assoc($run);
          echo '<script src="script.js"></script>
          <div class="sub1">
                   <img src="'.$assoc['img'].'" alt="" class="img"><br><br>
                   <label for="Name" class="tag">'.$assoc['name'].'</label>
                   <br>
                   <label for="Price" class="tag">'.$assoc['price'].'</label>
                   <br><br><br><br>
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="buy.php" class="btn btn-dark" >Buy</a> 
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="btn btn-dark">Add To Cart</a>
               </div>';
      }
      else{
          die ("Could Not Connect");
      }
 
      echo '<br><br><br><label for="More">More Products</label><br>';
      fetch_products();
    }
  function login($email,$ps){
    include "db.php";
    if($_SESSION['user'] != ""){
      return "You are alredy logined";
    }
    else{
      $query = "SELECT * FROM `users` WHERE `email` =  '".$email."' ans `ps` = '.$ps.'";
      $run = mysqli_query($db,$query);
      if($run){
        if(mysqli_num_rows($run)>0){
          $_SESSION["login"] = true;
          $assoc = mysqli_fetch_assoc($run);
          $_SESSION["user"] = $assoc["username"];
        }else{
          return("<script>alert('Account You selected does not exist');</script>");
        }
      }else{
        return("<script>alert('Database Problem from server');</script>");
      }
    }
  }
  function logout(){
    unset($_SESSION["login"]);
    unset($_SESSION["user"]);
  }
  function signin($email,$ps,$Fn,$ln,$user){
    include "db.php";
    error_reporting(0);
    $sql = "SELECT * FROM `users` WHERE `email` = '".$email."'";
    $run = mysqli_query($db,$sql);
    if(mysqli_num_rows($run)>0){
      echo "<script>alert('This Account alredy exist');</script>";
    }else{
      $query = "INSERT INTO `users`(`email`, `ps`, `Fn`, `Ln`, `username`) VALUES ('".$email."','".$ps."','".$Fn."','".$ln."','".$user."')";
      $exe = mysqli_query($db,$query);
      if($exe)
      $_SESSION["login"] = true;
      $assoc = mysqli_fetch_assoc($exe);
      $_SESSION["user"] = $assoc["username"];
      echo "<script>alert('Done, Your account is created');</script>";
    }
  }
  function  gotoin(){
    echo "<script>window.location.href = 'index.php';</script>";
  }
  function buy(){
    include "db.php";
    
  }


