<?php
session_start();
if ($_SESSION['login'] == "") {
    echo '<script>
    alert("Please Login First");
    window.location.href = "login.php";
    </script>';
}
$product = $_GET['product'];
include "db.php";
$sql = "SELECT * FROM `products` WHERE `name` = '" . $product . "'";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Sweet of this name is not exists')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy - Manoj Sweets</title>
    <?php include "bootstrap.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <?php include "navbar.php"; ?>
    <br><br><br>
    <form action="" method="post">
        <div class="container">
            <div class="row">
                <lable class="col-sm-4">Address: </lable><br><br>
            </div>
            <div class="row">
                <lable class="col-sm-6"><input type="text" class="form-control" placeholder="Address" id="addr"></lable>
            </div>
            <br><br>
            <input type="hidden" name="price" id="prc" value="<?php echo $row['price']; ?>" disabled="disabled">
            <div class="row">
                <lable for="paytm" class="col-sm-7"><button type="submit" class="btn btn-success">Credit Card , Debit Card , UPI , Paytm</button></lable>
            </div>
            <br><br>
            <div class="row">
                <label for="cod" class="col-sm-7"><button type="button" class="btn btn-primary" id="cod">Cash on Dellivery</button></label>
            </div>
        </div>
    </form>
    <script>
        $("#cod").click(function() {
            var addr = $("#addr").val();
            var prc = $("#prc").val();
            $.post("cod.php", {
                    addr: addr,
                    prc: prc,
                    name: "<?php echo $product; ?>"
                },
                function(data, status) {
                    if (data == "true") {
                        alert("Your product has been Purchased");
                        window.location.href = "index.php";
                    } else {
                        alert("Unable to Purchase server problem " + data);
                    }
                });
        });
    </script>
    <?php include "bootstrap-js.php"; ?>

</body>

</html>