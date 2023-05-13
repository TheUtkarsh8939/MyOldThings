<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <?php include "bootstrap.php" ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PragSearch</title>
    <style>
        html {
            width: 100% !important;
            height: 100% !important;
        }

        .logo {
            max-height: auto;
            max-width: 18%;
            min-height: auto;
            min-width: 18%;
            margin-left: 57%;
        }
        .form-control{
            max-width: 48%;
            margin-left:20%;
            border-radius: 81px;
            border: 1px solid gray;
        }
        .btn{
            margin-left:272%;
        }
    </style>
</head>

<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br>
    <div class='container'>
        <form action="search.php" method="get">
        <div class="form-group">
            <div class="row">
                <label for="logo" class='col-sm-8'><img src="logo.png" alt="Pragya" class="logo"></label>
            </div>
            <br><br>
            <div class="row">
                <lable class="col-sm-12"><input type="text" name="q" class="form-control"  placeholder="Search"></lable>
            </div>
            <br>
            <div class="row">
                <lable class="col-sm-2"><input type="submit" class="btn btn-success" value="Search"></lable>
            </div>
        </div>
    </form>
    </div>
    <?php include "bootstrap-js.php" ?>
</body>

</html>