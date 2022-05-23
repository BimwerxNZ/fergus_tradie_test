<?php
include_once('fix_mysql.inc.php');
require_once "_config.php";

session_start();
$xuser=$_REQUEST['xuser'];  
//$xuser = $_SESSION["username"];

$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT id FROM users WHERE username = '$xuser'");

$retval = "";

while($row = mysqli_fetch_array($result))
{
$retval = $row['id'];
}

session_start();
// Store data in session variables
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $retval;
$_SESSION["username"] = $xuser;

mysqli_close($con);

header("location: ../index.php");



?>