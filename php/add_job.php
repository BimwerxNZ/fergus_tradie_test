<?php
include_once('fix_mysql.inc.php');
require_once "_config.php";

//$xuserid=$_POST['xuserid'];
$xuserid = $_SESSION["id"];
$xdate=$_POST['xdate'];
$xclientid=$_POST['xclientid'];
$xnotes=$_POST['xnotes'];
$xstatus=$_POST['xstatus'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO `jobs` (`userid`, `cdate`, `clientid`, `notes`, `status`) VALUES ('$xuserid', '$xdate', '$xclientid', '$xnotes', '$xstatus')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;

?>