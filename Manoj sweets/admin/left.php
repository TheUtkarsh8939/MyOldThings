<?php
session_start();
if ($_SESSION['admin'] == "") {
    echo "<script>
        window.location.href='index.php';
    </script>";
    return false;
} else {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,300&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat&display=swap');
       *{
           padding-top: 5px !important;
           margin-top: 5px !important;
           padding-bottom: 5px !important;
           margin-bottom: 5px !important;
           font-family: 'Poppins', sans-serif;
       }
       .p {
            color: white;
        }

        .table {
            color: white;
        }
        .th{
            width: 100%;
            font-size: large;
            font-family: 'Montserrat', sans-serif;
        }
        .gr{
            background-color: green;
        }
        .td{
            width: 100%;
            color: #C5C5C5;
        }
        .td:hover{
            color:white !important;
        }
        .tr1{
            /*background-color: #808080;*/
            margin-top: 8px !important;
            padding: 8px !important;
        }
        a{
            color: #C5C5C5;
            text-decoration: none;
        }
        a:hover
        {
            color: white;
        }

    </style>
</head>
<body bgcolor="black">
    <p class="p">
        <font size="5">Operation</font>
    </p>
    <table class="table" width="100%">
        <tr>
            <td>
                Dashboard
            </td>
        </tr>
        <tr class="gr" width="100%">
            <th class="th">Manoj Sweet</th>
        </tr>
        <tr class="tr1">
            <td class="td"><a href="orders.php" target="right">Orders</a></td>
        </tr>
        <tr class="tr1">
            <td class="td"><a href="User.php" target="right">User</a></td>
        </tr>
        <tr class="tr1">
            <td class="td"><a href="products.php" target="right">Products</a></td>
        </tr>
        <tr class="tr1">
            <td class="td"><a href="add_products.php" target="right">Add Products</a></td>
        </tr>
    </table>
</body>

</html>