<?php
session_start();
include "db.php";
$name = $_GET['name'];
$sql = "SELECT * FROM `products` WHERE `name` = '" . $name . "'";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php
            $row = mysqli_fetch_assoc($result);
            echo $row['name'];
            ?> - Manoj sweets</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            box-sizing: border-box;
        }

        .img-sweet {
            height: 400px;
            max-width: 280px;
        }

        .img-sweet1 {
            height: auto;
            max-width: 100%;
        }

        .margin-sweet {
            margin-left: 10px;
        }

        .btn-sweet-cart {
            height: 60px;
            width: 100px;
            margin-right: 20px;
            background-color: lightgreen;
            border-color: lightgreen;
            border-radius: 26px;
            outline: 0 !important;
        }

        .btn-sweet-buy {
            height: 60px;
            width: 100px;
            margin-left: 10px;
            background-color: orange;
            border-color: orange;
            border-radius: 26px;
            outline: 0 !important;
        }

        .text {
            margin-left: 10px;
        }

        .img-zoom-container {
            position: relative;
        }

        .img-zoom-lens {
            position: absolute;
            border: 1px solid #d4d4d4;
            /*set the size of the lens:*/
            width: 60px;
            height: 60px;
        }

        .img-zoom-result {
            max-width: 280px;
            height: 280px;
        }
    </style>
    <script>
        function imageZoom(imgID, resultID) {
            var img, lens, result, cx, cy;
            img = document.getElementById(imgID);
            result = document.getElementById(resultID);
            lens = document.createElement("DIV");
            lens.setAttribute("class", "img-zoom-lens");
            lens.setAttribute("id", "lens");
            img.parentElement.insertBefore(lens, img);
            cx = result.offsetWidth / lens.offsetWidth;
            cy = result.offsetHeight / lens.offsetHeight;
            result.style.backgroundImage = "url('" + img.src + "')";
            result.style.backgroundSize = (img.width * cx) + "px " + (img.height * cy) + "px";
            lens.addEventListener("mousemove", moveLens);
            img.addEventListener("mousemove", moveLens);
            lens.addEventListener("touchmove", moveLens);
            img.addEventListener("touchmove", moveLens);

            function moveLens(e) {
                var pos, x, y;
                e.preventDefault();
                pos = getCursorPos(e);
                x = pos.x - (lens.offsetWidth / 2);
                y = pos.y - (lens.offsetHeight / 2);
                if (x > img.width - lens.offsetWidth) {
                    x = img.width - lens.offsetWidth;
                }
                if (x < 0) {
                    x = 0;
                }
                if (y > img.height - lens.offsetHeight) {
                    y = img.height - lens.offsetHeight;
                }
                if (y < 0) {
                    y = 0;
                }
                lens.style.left = x + "px";
                lens.style.top = y + "px";
                result.style.backgroundPosition = "-" + (x * cx) + "px -" + (y * cy) + "px";
            }

            function getCursorPos(e) {
                var a, x = 0,
                    y = 0;
                e = e || window.event;
                a = img.getBoundingClientRect();
                x = e.pageX - a.left;
                y = e.pageY - a.top;
                x = x - window.pageXOffset;
                y = y - window.pageYOffset;
                return {
                    x: x,
                    y: y
                };
            }
        }
    </script>
    <?php include "bootstrap.php"; ?>
</head>

<body>
    <form action="" method="post">
        <?php include "navbar.php"; ?><br><br>
        <div>
            <?php
            if (mysqli_num_rows($result) == 0) {
                echo "<script>alert('There are no sweet of this name');
            window.location='index.php';
            </script>";
            } else {
                echo "
                    <div class='img-zoom-container'>
                    <div class='img-sweet'><img id='myimage' class='img img-sweet1' src='img/" . $row['img'] . "'>
                    </div>
                    </div>
            <br><h1 class='margin-sweet'>" . $row['name'] . "</h1><form action='' method='post'>
             <span class='text'>Quantity</span><br><select name='q' class='form-control' style='width:170px !important; margin-left:10px !important;'>
             <option>1/4</option>
             <option>1/2</option>
             <option>1</option>
             <option>2</option>
             <option>3</option>
             <option>4</option>
             <option>5</option>
             </select><span class='text'>Kg</span><br>
            <br><br><a href='buy.php?product=" . $_GET['name'] . "'><button type='button' class='btn-sweet-buy'>Buy</button></a>
            <button type='submit' class='btn-sweet-cart' name='cart'>Add to cart</button></form>
            ";
            }
            ?>
        </div>
    </form>
    <?php
    error_reporting(0);
    function cart()
    {
        $sql2 = "SELECT * FROM `products` WHERE `name` = '" . $_GET['name'] . "'";
        $exe = mysqli_query(mysqli_connect('localhost', 'root', '', 'sweet'), $sql2);
        $row1 = mysqli_fetch_assoc($exe);
        if ($_SESSION['login'] != "") {
            $query = "INSERT INTO `cart`(`user`, `products`,`img`,`price`) VALUES ('" . $_SESSION['login'] . "','" . $_GET['name'] . "','" . $row1['img'] . "','" . $row1['price'] . "')";
            $res = mysqli_query(mysqli_connect('localhost', 'root', '', 'sweet'), $query);
            if ($res) {
                echo '        <script>
                    alert("Your Product is succsessfuly added to cart");
                    </script>';
            }
        } else {
            echo "<script>
                window.location = 'login.php?name=" . $_GET['name'] . "&redirect=page_sweet.php';
                </script>";
        }
    }
    if ($_GET['cart'] != "") {
        cart();
    }
    if (isset($_POST["cart"])) {
        cart();
    }
    ?>
    <?php include "bootstrap-js.php"; ?>
    <div id="myresult" class="img-zoom-result"></div>
    </form>
    <script>
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            document.getElementById('myresult').style.display = 'none';
        } else {
            imageZoom("myimage", "myresult");
        }
        
    </script>
</body>

</html>