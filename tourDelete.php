<?php


require_once "connect.php";
$con=mysqli_connect($host, $username, $pwd, $db);

if(mysqli_connect_error($con)){
	echo "Fail to connect";
}

$string = $_GET['string'];
$valueArray = explode('/', $string);


$query = mysqli_query($con, "DELETE FROM tours WHERE name = '$valueArray[0]' AND date = '$valueArray[0]'");


mysqli_close($con);
?>