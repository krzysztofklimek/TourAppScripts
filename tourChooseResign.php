<?php

// znajduje user id przez maila, znajduje tour id przez nazwe i date
// sprawdzam czy jest juz to w bazie po przez ilosc zwroconych wierszy
// jesli jest to usuwam
// jesli nie ma to dodaje

require_once "connect.php";
$con=mysqli_connect($host, $username, $pwd, $db);

if(mysqli_connect_error($con)){
	echo "Fail to connect";
}

$string = $_GET['string'];
$valueArray = explode('/', $string);


//getting user id
$query = mysqli_query($con, "SELECT * FROM users WHERE email = '$valueArray[0]'");

$row = $query->fetch_assoc();
$userID = $row['id'];
//echo $userID;

//getting tour id
$query = mysqli_query($con, "SELECT * FROM tours WHERE name = '$valueArray[1]' AND date = '$valueArray[2]'");

$row = $query->fetch_assoc();
$tourID = $row['id'];
//echo $tourID;

//getting number of userstours
$query = mysqli_query($con, "SELECT * FROM userstours WHERE user_id_fk = '$userID' AND tour_id_fk = '$tourID'");
$rows_number = $query->num_rows;

if($rows_number>0){	
	//echo "wieksze od zera";
	$query = mysqli_query($con, "DELETE FROM userstours WHERE user_id_fk = '$userID' AND tour_id_fk = '$tourID'");
}
else{
	//echo "równe zero";
	$query = mysqli_query($con, "INSERT INTO userstours(user_id_fk, tour_id_fk) VALUES ('$userID', '$tourID')");
}

mysqli_close($con);
?>