<?php

require_once "connect.php";

//mysql_query("SET NAMES 'latin2'");

$con=mysqli_connect($host, $username, $pwd, $db);
$con->set_charset("utf-8");

if(mysqli_connect_error($con)){
	echo "Failed to connect";
}

$string = $_GET['string'];

$query=mysqli_query($con, "SELECT * FROM tours");

$query_user=mysqli_query($con, "SELECT * FROM users WHERE email = '$string'");

$query_user_result = $query_user->fetch_assoc();
$id = $query_user_result['id'];
		
if($query){
	
	echo '{'.'"tours":'.'[';
	
	while($row = $query->fetch_assoc()){
		
		$tour_id = $row['id'];
		$query_check_box=mysqli_query($con, "SELECT * FROM userstours WHERE user_id_fk = '$id' AND tour_id_fk = '$tour_id'");
		$how_many_rows = $query_check_box->num_rows;
		
		
		$myObj = new \stdClass();
		
		if($how_many_rows>0){
			$myObj ->tourName = $row['name'];
			$myObj ->tourDate = $row['date'];
			$myObj ->tourDesc = $row['description'];
			$myObj ->tourBool = 'true';
			
			$myJSON = json_encode($myObj);
			
			echo $myJSON;
			echo ',';
			
			//echo $row['name'].'/'.$row['date'].'/'.$row['description'].//'/true';
			//echo "/";
		}
		else{
			$myObj ->tourName = $row['name'];
			$myObj ->tourDate = $row['date'];
			$myObj ->tourDesc = $row['description'];
			$myObj ->tourBool = 'false';
			
			$myJSON = json_encode($myObj);
			
			echo $myJSON;
			echo ',';
			
			//echo $row['name'].'/'.$row['date'].'/'.$row['description'].'/false';
			//echo "/";
		}
	}	
	
	echo ']'.'}';
}
	
	
mysqli_close($con);

?>