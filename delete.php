<?php

// ******** update your personal settings ********
$servername = '140.122.184.125:3307';
$username = 'team18';
$password = '0J/rLx9rOh4WhNb6';
$dbname = 'team18';

// Connecting to and selecting a MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

if (!$conn->set_charset('utf8')) {
    printf("Error loading character set utf8: %s\n", $conn->error);
    exit();
}

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$id = $_GET['id'];


if (isset($id)) {
    $delete_sql = "DELETE FROM users where User_id = '$id'"; // TODO

    if ($conn->query($delete_sql) === true) {
        echo "刪除成功!<a href='admin_user.php'>返回主頁</a>";
    } else {
        echo '刪除失敗!';
    }
} else {
    echo '資料不完全';
}

?>
