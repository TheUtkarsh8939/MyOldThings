<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders - Manoj sweets</title>
    <?php include "bootstrap.php"; ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <style>
        table {
            margin-left: 10px;
            margin-top: 10px;
        }

        td {
            padding-right: 4px;
            padding-left: 4px;
        }
    </style>
</head>

<body>
<table border="2px solid black">
        <tr>
            <th>Username</th>
            <th>Address</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Payment type</th>
            <th>Status</th>
            <th>Change Status</th>
            <th>Delete</th>
        </tr>
        <?php
        session_start();
        if ($_SESSION['admin'] == "") {
            echo "<script>
            window.location.href='index.php';
        </script>";
            return false;
        } else {
        }
        include "db.php";
        $sql = "SELECT * FROM `orders`";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                <form action='' method='post'>
                <tr>
                <td>" . $row['user'] . "</td>
                <input type='hidden' name='user' value='" . $row['user'] . "'>
                <td>" . $row['address'] . "</td>
                <td>" . $row['product_name'] . "</td>
                <input type='hidden' name='id' value='" . $row['id'] . "'>
                <input type='hidden' name='name' value='" . $row['product_name'] . "'>
                <td>" . $row['price'] . "</td>
                <td>" . $row['payment_type'] . "</td>
                <td><select name='status'>
                <option value='" . $row['status'] . "'>" . $row['status'] . "</option>
                <option value='Pending'>Pending</option>
                <option value='Delliverd'>Delliverd</option>
                <option value='Canceled'>Canceled</option>
                </select></td>
                <td><button id='edit' type='submit' class='btn btn-success' name='edit'>Change Status</button></td>
                <td><a class='btn btn-danger' href='?del=true&id=".$row['id']."'>Delete</a></td>
                </tr>
                </form>
                ";
            }
        } else {
            echo "No Order was placed";
        }
        ?>
    </table>
    <?php
    error_reporting(0);
   
    if ($_GET['del'] == "true") {
        $id = $_GET['id'];
        $sql = "DELETE FROM `orders` WHERE `id` = '".$id."'";
        if(mysqli_query($conn,$sql)){
            echo '<script>alert("Order Deleted")</script>';
        }
        else{
            echo '<script>alert("Sorry Order was not deleted database problem")</script>'; 
        }
    }
    if (isset($_POST['edit'])) {
        $user = $_POST['user'];
        $name = $_POST['name'];
        $id = $_POST['id'];
        $status = $_POST['status'];
        $sql = "UPDATE `orders` SET `status` = '" . $status . "'  WHERE `id` = '" . $id . "'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<script>alert('The Status Has Been Updated');
            </script>";
        } else {
            echo "<script>alert('Error: '" . mysqli_error($conn) . ")</script>";
        }
        echo mysqli_error($conn);
    }
    ?>
    <?php include 'bootstrap-js.php'; ?>
    
</body>

</html>