<?php
    
    require_once('connect_db.php');
    ?>


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
        <a href="admin.php">教室管理</a>
        <a class="active" href="admin_user.php">使用者管理</a>
        <a href="admin_res.php">預約管理</a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Classroom Reservation</h1>
        <h2 style="text-align:center;">使用者管理</h2>   
        <div class="text-center">
        <a class="button">查看使用者</a>

        
<?php
  // ******** update your personal settings ********
  $sql = "SELECT * FROM users"; // set up your sql query
  $result = mysqli_query($conn,$sql) ; // Send SQL Query

  if ($result->num_rows > 0) {
      echo '<table style="width:50%" align="center">';
      echo '<tr>';
      echo '<th>學號</th>';
      echo '<th>身分</th>';
      echo '<th>姓名</th>';
      echo '<th>手機</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $User_id = $row['User_id'];
          $User_type = $row['User_type'];
          $User_name = $row['User_name'];
          $User_phone= $row['User_phone'];
?>
        
		<tr id="myTable" class="table-row1 hidden">
			<td><?php echo $User_id ; ?></td>
			<td><?php echo $User_type; ?></td>
			<td><?php echo $User_name ?></td>
            <td><?php echo $User_phone?></td>
			<td><a href="delete.php?id=<?php echo $row['User_id'];?>" class="button">刪除</td>
		</tr>
         
<?php
          echo '</tr>';

      }
  } else {
      echo '0 results';
  }
  ?>
    </div>
</body>
</html>