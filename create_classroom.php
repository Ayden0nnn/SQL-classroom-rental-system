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

if (isset($_POST['Classroom_name']) && isset($_POST['Classroom_capacity']) && isset($_POST['Classroom_equipment']) && isset($_POST['Classroom_location'])) {
	$Classroom_name = $_POST['Classroom_name'];
	$Classroom_capacity = $_POST['Classroom_capacity'];
	$Classroom_equipment = $_POST['Classroom_equipment'];
	$Classroom_location = $_POST['Classroom_location'];


	$maxIdQuery = "SELECT MAX(Classroom_id) as maxId FROM classroom";
    $result = $conn->query($maxIdQuery);
    $row = $result->fetch_assoc();
    $maxId = $row['maxId'];
    $newId = $maxId + 1;

	
	$insert_sql = "insert into classroom (Classroom_id, Classroom_name, Classroom_capacity, Classroom_equipment, Classroom_location) value ('$newId', '$Classroom_name', '$Classroom_capacity', '$Classroom_equipment', '$Classroom_location')";	// TODO
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='admin.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
				
?>

