<?php
include_once('fix_mysql.inc.php');
require_once "_config.php";

session_start();
$xid = $_SESSION["id"];

$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT name FROM clients WHERE id = ('$xid')");

$retval = "";

while($row = mysqli_fetch_array($result)) {

    $retval = $row['name'];
    
}

echo $retval;

mysqli_close($con);