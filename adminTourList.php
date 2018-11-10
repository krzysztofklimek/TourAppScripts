<?php

require_once "connect.php";

$con=mysqli_connect($host, $username, $pwd, $db);

if(mysqli_connect_error($con)){
	echo "Failed to connect";
}

$string = $_GET['string'];

$query=mysqli_query($con, "SELECT * FROM tours");

$query_user=mysqli_query($con, "SELECT * FROM users WHERE email = '$string'");

$query_user_result = $query_user->fetch_assoc();
$id = $query_user_result['id'];
		
if($query){
	
	while($row = $query->fetch_assoc()){
		

			echo $row['name'].'/'.$row['date'].'/'.$row['description'].'/false';
			echo "/";
		
	}	
}
	
	
mysqli_close($con);

?>