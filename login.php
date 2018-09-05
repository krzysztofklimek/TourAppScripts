<?php

require_once "connect.php";

$con=mysqli_connect($host, $username, $pwd, $db) or die('unnable to connect');

if(mysqli_connect_error($con)){
	echo "Failed to connect";
}

$string = $_GET['string'];
$valueArray = explode('/', $string);


//$query=mysqli_query($con, "SELECT * FROM users WHERE email='qwe'");
$query=mysqli_query($con, "SELECT * FROM users WHERE email='$valueArray[0]' AND password='$valueArray[1]'");

$row = $query->fetch_assoc();
$output = $row['type'];
echo $output;
	
mysqli_close($con);
?>