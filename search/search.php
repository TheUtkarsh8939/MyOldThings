<?php
session_start();
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'search');
class DB_con
{
 function __construct()
 {
     $this -> q = $_GET['q'];
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
$this->dbh=$con;
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }
 }
 public function fetchdata()
 {
 $this->sql = "select * from results where `tags` like '".$this->q."'";
 $result=mysqli_query($this->dbh,$this->sql);
 return $result;
 }
}
$fetchdata=new DB_con();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET['q']; ?> - Pragsearch</title>
    <?php include 'bootstrap.php' ?>
</head>

<body>
<?php
  $sql=$fetchdata->fetchdata();
  while($row=mysqli_fetch_array($sql))
  {
  echo '
     <div class="row"><lable class="col-sm-10">'.$row['Title'] .'</lable></div>
     <div class="row"><lable class="col-sm-10">$row'.['Description'].'</lable></div>
     
    '; } include 'bootstrap-js.php';?>
</body>

</html>