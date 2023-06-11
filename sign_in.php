<?php
    
    require_once('connect_db.php');

     //check all data aren't null
     if(!isset($_POST['ID']) || !isset($_POST['pwd']) ){

     echo '請確認所有資料已填妥';
     exit();
 }

// read data from sign_in.html
$user_account = $_POST['ID'];
$user_pwd = $_POST['pwd'];
//echo $user_account;
//echo '<br>';

//sql
$sql_select_id = "SELECT User_pwd, User_type FROM users where User_id = ?; ";
//prepare statememt
$stmt = mysqli_stmt_init($conn);
//
if(!mysqli_stmt_prepare($stmt, $sql_select_id)){
    echo 'stmt failed';
}

mysqli_stmt_bind_param($stmt, "s", $user_account);

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(!$row = mysqli_fetch_assoc($result)){
    echo '沒有使用大寫英文字母或者還沒註冊喔';
    exit();
}

//echo $row['User_pwd'];

//check pwd
if($row['User_pwd'] != $user_pwd){
    echo '密碼錯誤!';
    exit();
}


if($row['User_type'] == 'ST'){
    mysqli_stmt_close($stmt);
    header("Location: user.php"); 
}else{
    mysqli_stmt_close($stmt);
    header("Location: admin.php"); 
}


