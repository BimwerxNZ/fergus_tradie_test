<?php
include_once('fix_mysql.inc.php');
require_once "_config.php";

$xjobid=$_POST['xjobid'];
$xstatus=$_POST['xstatus'];

$con = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$sql = "UPDATE jobs SET status='$xstatus' WHERE id='$xjobid'";
	
if ($con->query($sql) === TRUE) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . $con->error;
}

$con->close();

?>