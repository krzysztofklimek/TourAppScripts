<?php


require_once "connect.php";
$con=mysqli_connect($host, $username, $pwd, $db);

if(mysqli_connect_error($con)){
	echo "Fail to connect";
}

$string = $_GET['string'];
$valueArray = explode('/', $string);


$query = mysqli_query($con, "INSERT INTO tours(name, date, description) VALUES ('$valueArray[0]', '$valueArray[1]', '$valueArray[2]')");


mysqli_close($con);
?>