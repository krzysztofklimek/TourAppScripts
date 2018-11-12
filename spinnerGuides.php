<?php

require_once "connect.php";

$con=mysqli_connect($host, $username, $pwd, $db);

if(mysqli_connect_error($con)){
	echo "Failed to connect";
}



$query=mysqli_query($con, "SELECT * FROM users WHERE type = 'g'");


		
if($query){
	
	while($row = $query->fetch_assoc()){
		

			echo $row['email'];
			echo "/";
		
	}	
}
	
	
mysqli_close($con);

?>