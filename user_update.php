<?php

    require_once('connect_db.php');

$id = $_GET['id']; 
$sql = "SELECT * FROM reservation_time as r natural join classroom as c WHERE r.Re_id='$id';";

$result = mysqli_query($conn,$sql) ;


if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc ( $result );
    
}
$User_id= $_GET['ID'];
?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>classroom arrangement - admin_home</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Button</title>
    <style>
        .topnav {
            background-color: #333;
            overflow: hidden;
        }

        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        .topnav a.active {
            background-color: #7aa8b7;
            color: white;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            color: #ffffff;
            background-color: #7aa8b7;
            border-radius: 6px;
            outline: none;
            transition: 0.3s;
            margin-top: 30px;
            
          }
          .button:hover {
            background-color: #c2c7c7;
          }
	    
	  input[type="text"] {
             border-radius: 4px;
             border: 1px solid #ccc;
             box-sizing: border-box;
           }
	    
    </style>
</head>

<body>
    <div class="topnav">
        <a href="user.php" id="userLink">教室資訊</a>
        <a href="user_reservation.php" id="reservationLink">教室借閱紀錄查詢</a>
        <a class="active" href="user_info.php" id="infoLink">使用者資訊</a>
        <a href="home.php" class="text-center">登出</a>
        <a class="white text-center"><?php echo $_GET["ID"] ?></a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Classroom Reservation</h1>
        <h2 style="text-align:center;">修改資料</h2>   
    <div class="text-center">

	<form action="user_doupdate.php" method="POST">
        <fieldset>
          <br>
          <div class="text-center">
          <label for="fname">Classroom_name:</label><br>
          <input type="text" id="rname" name="rname" value="<?php echo $row['Classroom_name'];?>" ><br>
        
          <label for="lname">year:</label><br>
          <input type="text" id="ryear" name="ryear" value="<?php echo $row['Res_year'];?>"><br>

          <label for="lname">month:</label><br>
          <input type="text" id="rmonth" name="rmonth" value="<?php echo $row['Res_month'];?>"><br>

          <label for="lname">day:</label><br>
          <input type="text" id="rday" name="rday" value="<?php echo $row['Res_day'];?>"><br>

          <input class="button" type="submit" value="修改" >
          </div>
          
        </fieldset>
    
        
    </div>
<script>
    var userLink = document.getElementById("userLink");
    userLink.addEventListener("click", function(event) {
    event.preventDefault(); 
    var userAccount = "<?php echo $User_id; ?>";
    window.location.href = "user.php?ID=" + userAccount;
    });
    
    var reservationLink = document.getElementById("reservationLink");
    reservationLink.addEventListener("click", function(event) {
    event.preventDefault();
    var userAccount = "<?php echo $User_id; ?>";
    window.location.href = "user_reservation.php?ID=" + userAccount;
    });

    var infoLink = document.getElementById("infoLink");
    infoLink.addEventListener("click", function(event) {
    event.preventDefault(); 
    var userAccount = "<?php echo $User_id; ?>";
    window.location.href = "user_info.php?ID=" + userAccount;

    var updateLink = document.getElementById("updateLink");
    updateLink.addEventListener("click", function(event) {
    event.preventDefault(); 
    var userAccount = "<?php echo $User_id; ?>";
    window.location.href = "user_update.php?ID=" + userAccount;
    });
</script>

    </div>
</body>
</html>
