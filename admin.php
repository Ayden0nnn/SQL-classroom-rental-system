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
        <a href="home.php" class="text-center">登出</a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Classroom Reservation</h1>
        <h2 style="text-align:center;">教室管理</h2>   
        <div class="text-center">
        <a class="button" href="admin_class_insert.html">新增教室</a>
        <p></p>
 
 <?php
  // ******** update your personal settings ********
  $servername = '140.122.184.125:3307';
  $username = 'team18';
  $password = '0J/rLx9rOh4WhNb6';
  $dbname = 'team18';

  // Connect MySQL server
  $conn = new mysqli($servername, $username, $password, $dbname);

  // set up char set
  if (!$conn->set_charset('utf8')) {
      printf("Error loading character set utf8: %s\n", $conn->error);
      exit();
  }

  // Check connection
  if ($conn->connect_error) {
      die('Connection failed: ' . $conn->connect_error);
  }

  // ******** update your personal settings ********
  $sql = 'SELECT * FROM classroom'; // set up your sql query
  $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
    echo '<table style="border-collapse: collapse; font-size: 0.9em; font-family: sans-serif; min-width: 400px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);" align="center" margin: 20px;>';
    echo '<tr>';
    echo '<th style="padding: 10px; background-color: #89b8c7ba;">教室編號</th>';
    echo '<th style="padding: 10px; background-color: #89b8c7ba;">教室名稱</th>';
    echo '<th style="padding: 10px; background-color: #89b8c7ba;">容量</th>';
    echo '<th style="padding: 10px; background-color: #89b8c7ba;">器材</th>';
    echo '<th style="padding: 10px; background-color: #89b8c7ba;" colspan="2">地點</th>';
    echo '<th style="padding: 10px; background-color: #89b8c7ba;" colspan="2">修改/刪除</th>';
    echo '</tr>';
   
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $Classroom_id = $row['Classroom_id'];
          $Classroom_name = $row['Classroom_name'];
          $Classroom_capacity= $row['Classroom_capacity'];
		  $Classroom_equipment = $row['Classroom_equipment'];
		  $Classroom_location = $row['Classroom_location'];

?>
   
        <tr id="myTable" class="table-row1 hidden">
            <td style="padding: 10px; border: 1px solid #ddd;"><?php echo $Classroom_id; ?></td>
			<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;"><?php echo $Classroom_name; ?></td>
			<td style="padding: 10px; border: 1px solid #ddd;"><?php echo $Classroom_capacity ?></td>
            <td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;"><?php echo $Classroom_equipment?></td>
            <td style="padding: 10px; border: 1px solid #ddd;" colspan="2"><?php echo $Classroom_location?></td>
            <td><a href="admin_class_update.php?id=<?php echo $row['Classroom_id'];?>" class="button">修改</td>
			<td><a href="admin_class_delete.php?id=<?php echo $row['Classroom_id'];?>" class="button">刪除</td>
		</tr>
   
        
        
        
<?php
      }
  } else {
      echo '0 results';
  }
  ?>
    </div>
</body>
</html>
