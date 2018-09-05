<?php

require_once "connect.php";

$con=mysqli_connect($host, $username, $pwd, $db) or die('unnable to connect');

if(mysqli_connect_error($con))
{
	echo "Failed to connect";
}

$query=mysqli_query($con, "SELECT * FROM users WHERE email='qwe'");


$row = $query->fetch_assoc();
$output = $row['password'];
echo $output;

//if($query)
//{
//	while($row=mysqli_fetch_array($query))
//	{
//		$flag[]=$row;
//	}

//	print(json_encode($flag));
//}
	
mysqli_close($con);
?>