<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>classroom arrangement - user_home</title>

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
          .hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="topnav">
        <a href="user.php">教室資訊</a>
        <a class="active" href="user_reservation.php">教室借閱紀錄查詢</a>
        <a href="user_info.php">使用者資訊</a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Classroom Reservation</h1>
        <h2 style="text-align:center;">教室借閱紀錄查詢</h2>   
        <div class="text-center">
        <a class="button">預約教室</a>
        <a class="button" id="toggleButton1" onclick="toggleTable(1)">查看已預約教室</a>
        <a class="button" id="toggleButton2" onclick="toggleTable(2)">查看借用紀錄</a>
        
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
      echo '<th>學號</th>';
      echo '<th>教室名稱</th>';
      echo '<th>年</th>';
      echo '<th>月</th>';
      echo '<th>日</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $Re_id = $row['Re_id'];
          $User_id = $row['User_id'];
          $Classroom_id= $row['Classroom_id'];
          $Classroom_name= $row['Classroom_name'];
		  $Res_year = $row['Res_year'];
		  $Res_month = $row['Res_month'];
		  $Res_day = $row['Res_day'];
          echo '<tr id="myTable" class="table-row1 hidden">';
          echo '<td>' . $User_id . '</td>';
          echo '<td>' . $Classroom_name . '</td>';
          echo '<td>' . $Res_year . '</td>';
          echo '<td>' . $Res_month . '</td>';
          echo '<td>' . $Res_day. '</td>';
        //   echo "<td><a href='update.php?id=" . $id . "&gender=" . $gender ."'>修改</a></td>";
        //   echo "<td><a href='delete.php?id=" . $id . "'>刪除</a></td>";
          echo '</tr>';

      }
  } else {
      echo '0 results';
  }

  $sql = 'SELECT * FROM reservation_time natural join classroom where User_id = "40971227H"'; // set up your sql query
  $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $Re_id = $row['Re_id'];
          $User_id = $row['User_id'];
          $Classroom_id= $row['Classroom_id'];
          $Classroom_name= $row['Classroom_name'];
		  $Res_year = $row['Res_year'];
		  $Res_month = $row['Res_month'];
		  $Res_day = $row['Res_day'];
          echo '<tr id="myTable" class="table-row2 hidden">';
          echo '<td>' . $User_id . '</td>';
          echo '<td>' . $Classroom_name . '</td>';
          echo '<td>' . $Res_year . '</td>';
          echo '<td>' . $Res_month . '</td>';
          echo '<td>' . $Res_day. '</td>';
        //   echo "<td><a href='update.php?id=" . $id . "&gender=" . $gender ."'>修改</a></td>";
        //   echo "<td><a href='delete.php?id=" . $id . "'>刪除</a></td>";
          echo '</tr>';

      }
  } else {
      echo '0 results';
  }
  ?>
    </div>
<script>
    var isButton1Clicked = false;
    var isButton2Clicked = false;

    function toggleTable(buttonId) {
        var button1 = document.getElementById("toggleButton1");
        var button2 = document.getElementById("toggleButton2");

        if (buttonId === 1) {
            if(isButton1Clicked == false)
                isButton1Clicked = !isButton1Clicked;
            if (isButton2Clicked) {
                isButton2Clicked = false;
                var tableRows2 = document.querySelectorAll(".table-row2");
                tableRows2.forEach(function(row) {
                    row.classList.add("hidden");
                });
            }
            var tableRows1 = document.querySelectorAll(".table-row1");
            tableRows1.forEach(function(row) {
                row.classList.remove("hidden");
            });
        } else if (buttonId === 2) {
            if(isButton2Clicked == false)
                isButton2Clicked = !isButton2Clicked;
            if (isButton1Clicked) {
                isButton1Clicked = false;
                var tableRows1 = document.querySelectorAll(".table-row1");
                tableRows1.forEach(function(row) {
                    row.classList.add("hidden");
                });
            }
            var tableRows2 = document.querySelectorAll(".table-row2");
            tableRows2.forEach(function(row) {
                row.classList.remove("hidden");
            });
        }
    }

</script>

    </div>
   
</body>
</html>