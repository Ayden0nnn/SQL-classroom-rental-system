<?php
    
    require_once('connect_db.php');

$id = $_GET['id']; 
$sql = "SELECT * FROM classroom as c WHERE Classroom_id='$id' ;";

$result = mysqli_query($conn,$sql) ;


if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc ( $result );
    
}

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
    </style>
</head>

<body>
    <div class="topnav">
        <a class="active" href="admin.php">教室管理</a>
        <a href="admin_user.php">使用者管理</a>
        <a href="admin_res.php">預約管理</a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Update Classroom </h1>
        <h2 style="text-align:center;">修改資料</h2>   
    <div class="text-center">

	<form action="admin_class_doupdate.php" method="POST">
        <fieldset>
          <br>
          <div class="text-center">
          <label for="fname">Classroom_id</label><br>
          <input type="text" id="cid" name="cid" value="<?php echo $row['Classroom_id'];?>" readonly = "true"><br>

          <label for="fname">Classroom_name:</label><br>
          <input type="text" id="cname" name="cname" value="<?php echo $row['Classroom_name'];?>" ><br>
        
          <label for="lname">Classroom capacity:</label><br>
          <input type="text" id="cc" name="cc" value="<?php echo $row['Classroom_capacity'];?>"><br>

          <label for="lname">Classroom equipment:</label><br>
          <input type="text" id="eq" name="eq" value="<?php echo $row['Classroom_equipment'];?>"><br>

          <label for="lname">Classroom location:</label><br>
          <input type="text" id="lo" name="lo" value="<?php echo $row['Classroom_location'];?>"><br>

          <input class="button" type="submit" value="修改" >
          </div>
          
        </fieldset>
     
</body>
</html>