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

        .td-width {
            width: 25%;
            margin-left: 20px;
            font-family: 'Poppins', sans-serif;
        }

        .poppins {
            font-family: 'Poppins', sans-serif;
            align-self: center;
            align-items: center;
            align-content: center;
            text-align: center;
        }
    </style>
</head>

<body>
    <table bgcolor="black" style="width: 100%;" height="100px">
        <tr style="text-align:right;align-content:right;">
            <td>
                <font color="white" size="7"><b>Welcome Admin</b></font>
            </td>
        </tr>
    </table>
    <br><br><br>
    <table width="100%" height="200" cellspacing="15">
        <tr>
            <td class="td-width" bgcolor="red" rowspan="2">
                Orders
            </td>
            <td class="td-width" bgcolor="red" rowspan="2">
            </td>
            <td class="td-width" bgcolor="red" rowspan="2">
            </td>
            <td class="td-width" bgcolor="green"></td>
        </tr>
        <tr>
            <td bgcolor="orange"></td>
        </tr>
    </table>
</body>

</html>