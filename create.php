<?php

// ******** update your personal settings ******** 
$servername = "localhost";
$username = "";
$password = "";
$dbname = "db_class";

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

if (isset($_POST['StuName']) && isset($_POST['StuNum']) && isset($_POST['passwd']) && isset($_POST['gender'])) {
	$StuName = $_POST['StuName'];
	$StuNum = $_POST['StuNum'];
	$passwd = $_POST['passwd'];
	$gender = $_POST['gender'];

	$maxIdQuery = "SELECT MAX(id) as maxId FROM student";
    $result = $conn->query($maxIdQuery);
    $row = $result->fetch_assoc();
    $maxId = $row['maxId'];
    $newId = $maxId + 1;

	
	$insert_sql = "insert into student (id, StuName, StuNum, passwd, gender) value ('$newId', '$StuName', '$StuNum', '$passwd', '$gender')";	// TODO
	
	if ($conn->query($insert_sql) === TRUE) {
		echo "新增成功!!<br> <a href='index.php'>返回主頁</a>";
	} else {
		echo "<h2 align='center'><font color='antiquewith'>新增失敗!!</font></h2>";
	}

}else{
	echo "資料不完全";
}
				
?>

