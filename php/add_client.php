<?php
include_once('fix_mysql.inc.php');
require_once "_config.php";

//$xuserid=$_POST['xuserid'];
$xuserid = $_SESSION["id"];
$xdate=$_POST['xdate'];
$xname=$_POST['xname'];
$xcontact=$_POST['xcontact'];
$xtelno=$_POST['xtelno'];
$xaddress=$_POST['xaddress'];
$xnotes=$_POST['xnotes'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "INSERT INTO `clients` (`userid`, `name`, `cdate`, `contact`, `telno`, `caddress`, `notes`) VALUES ('$userid', '$xname', '$xdate', '$xcontact', '$xtelno', '$xaddress', '$xnotes')";
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