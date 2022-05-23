<?php
include_once('fix_mysql.inc.php');
require_once "_config.php";

session_start();
//$xid=$_POST['xid'];
$xid = $_SESSION["id"];

$con=mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT id, name, contact, telno, caddress, notes FROM clients WHERE userid = ('$xid')");

$retval = "";

$intI = 0;

while($row = mysqli_fetch_array($result)) {

    if ($intI > 0) {
        $retval = $retval . '|' . $row['id'] . '*' . $row['name'] . '*' . $row['contact'] . '*' . $row['telno'] . '*' . $row['caddress'] . '*' . $row['notes'];
    } else {
        $retval = $row['id'] . '*' . $row['name'] . '*' . $row['contact'] . '*' . $row['telno'] . '*' . $row['caddress'] . '*' . $row['notes'];
    }
            
    $intI += 1;

}

echo $retval;

mysqli_close($con);