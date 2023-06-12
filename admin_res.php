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
        <a href="admin_user.php">使用者管理</a>
        <a class="active" href="admin_res.php">預約管理</a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Classroom Reservation</h1>
        <h2 style="text-align:center;">預約管理</h2>   
        <div class="text-center">
        <a class="button">查看預約</a>
        <a class="button">修改預約</a>
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
  $sql = 'SELECT * FROM reservation_time natural join classroom'; // set up your sql query
  $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
      echo '<table style="width:50%" align="center">';
      echo '<tr>';
      echo '<th>Res_Id</th>';
      echo '<th>User_Id</th>';
      echo '<th>Classroom_name</th>';
      echo '<th>year</th>';
      echo '<th>month</th>';
      echo '<th>day</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $Re_id = $row['User_id'];
          $User_id = $row['User_id'];
          $Classroom_id = $row['Classroom_id'];
          $Classroom_name = $row['Classroom_name'];
          $Res_year = $row['Res_year'];
		  $Res_month = $row['Res_month'];
		  $Res_day = $row['Res_day'];
          echo '<tr id="myTable" class="table-row1 hidden">';
          echo '<td>' . $Re_id . '</td>';
          echo '<td>' . $User_id . '</td>';
          echo '<td>' . $Classroom_name . '</td>';
          echo '<td>' . $Res_year . '</td>';
          echo '<td>' . $Res_month . '</td>';
          echo '<td>' . $Res_day . '</td>';
        //   echo "<td><a href='update.php?id=" . $id . "&gender=" . $gender ."'>修改</a></td>";
        //   echo "<td><a href='delete.php?id=" . $id . "'>刪除</a></td>";
          echo '</tr>';

      }
  } else {
      echo '0 results';
  }
  ?>
    </div>
</body>
</html>