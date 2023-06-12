<?php

// ******** update your personal settings ******** 
$servername = '140.122.184.125:3307';
$username = 'team18';
$password = '0J/rLx9rOh4WhNb6';
$dbname = 'team18';

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if (isset($_POST['User_id']) && isset($_POST['Classroom_id']) && isset($_POST['Res_year']) && isset($_POST['Res_month']) && isset($_POST['Res_day'])) {
	$User_id = $_POST['User_id'];
	$Classroom_name = $_POST['Classroom_id'];
	$Classroom_id = $_POST['Classroom_id'];
	$Res_year = $_POST['Res_year'];
	$Res_month = $_POST['Res_month'];
	$Res_day = $_POST['Res_day'];


	$maxIdQuery = "SELECT MAX(Re_id) as maxId FROM reservation_time";
    $result = $conn->query($maxIdQuery);
    $row = $result->fetch_assoc();
    $maxId = $row['maxId'];
    $newId = $maxId + 1;

	
	$insert_sql = "insert into reservation_time (Re_id, User_id, Classroom_id, Res_year, Res_month, Res_day) value ('$newId', '$User_id', '$Classroom_id', '$Res_year', '$Res_month', '$Res_day')";	// TODO
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='user.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
				
?>

