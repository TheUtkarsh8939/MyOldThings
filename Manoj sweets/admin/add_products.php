<?php
session_start();
include('bootstrap.php');
include('bootstrap-js.php');
if (!$_SESSION['admin']) {
    echo '<script>window.location.href="index.php"</script>';
}
include "db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        * {
            align-self: center;
            align-content: center;
            align-items: center;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product-Manoj Sweet</title>
</head>

<body>
    <br><br><br><br>
    <div class="container">
        <h1>Add Product To Manoj Sweets</h1>
        <br><br>
        <div class="form-group" align='center'>
            <div class="row" align='center'>
                <lable class="col-sm-3">Product name</lable><br>
                <lable class="col-sm-9" align='center'><input type="text" placeholder="Product Name" name="name" id="name" class="form-control"></lable>
            </div>
        </div>
        <br><br>
        <div class="form-group" align='center'>
            <div class="row" align='center'>
                <lable class="col-sm-3">Product Price</lable><br>
                <lable class="col-sm-9" align='center'><input type="Number" placeholder="Price" name="Price" id="prc" class="form-control"></lable>
            </div>
        </div> <br><br>
        <div class="form-group" align='center'>
            <div class="row" align='center'>
                <lable class="col-sm-3">Product Image</lable><br>
                <lable class="col-sm-9" align='center'><input type="file" name="img" id='img' value="img" class="form-control"></lable>
            </div>
        </div>
        <br><br>
        <div class="form-group" align='center'>
            <div class="row" align='center'>
                <lable class="col-sm-9" align='center'><button type="submit" name="sub" id="sub" class="btn btn-success">Add</button></lable>
            </div>
        </div>
    </div>
    <script>
        $("#sub").click(function() {
            var name = $("#name").val();
            var prc = $("#prc").val();
            $.ajax({url:"product_add.php?name="+name+"&prc="+prc+"",success:function(result){
                if (result = true){
                alert('Product added succsesfuly');
                }
                else {
                    alert('Failed to add product');
                }
            }});
        });
    </script>
    <?php print_r( $_FILES); ?>
</body>

</html>