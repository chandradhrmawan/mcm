<?php 
//$koneksi = new mysqli("localhost","root","","mcm");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$koneksi = $conn;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


function debux($str, $ret=FALSE)
{
	echo "<pre>";
	print_r($str);
	echo "</pre>";
	($ret==TRUE) ? die() : "";
}

?>