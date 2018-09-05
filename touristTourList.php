<?php

require_once "connect.php";

$con=mysqli_connect($host, $username, $pwd, $db) or die('unnable to connect');

if(mysqli_connect_error($con)){
	echo "Failed to connect";
}

$query=mysqli_query($con, "SELECT name FROM tours");
		
if($query)
{
	while($row = $query->fetch_assoc())
	{
		//$output = $row['name'];
		//echo $output;
		echo $row['name'];
		echo "/";
	}	
}
	
	
mysqli_close($con);

?>