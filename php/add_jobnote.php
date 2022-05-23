<?php
include_once('fix_mysql.inc.php');
require_once "_config.php";

$xjobid=$_POST['xjobid'];
$xnote=$_POST['xnote'];

$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$result = mysqli_query($con,"SELECT notes FROM jobs WHERE id = '$xjobid'");

$retval = "";

while($row = mysqli_fetch_array($result)) {
    $retval = $row['notes'] . '^' . $xnote;   
}

$sql = "UPDATE jobs SET notes='$retval' WHERE id='$xjobid'";
	
if ($con->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

$con->close();

?>