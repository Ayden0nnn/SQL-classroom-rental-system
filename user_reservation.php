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
        <a href="user.php" id="userLink">教室資訊</a>
        <a class="active" href="user_reservation.php" id="reservationLink">教室借閱紀錄查詢</a>
        <a href="user_info.php" id="infoLink">使用者資訊</a>
        <a href="home.php" class="text-center">登出</a>
        <a class="white text-center"><?php echo $_GET["ID"] ?></a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Classroom Reservation</h1>
        <h2 style="text-align:center;">教室借閱紀錄查詢</h2>   
        <div class="text-center">
        <a class="button" id="toggleButton0" onclick="toggleTable(0)">預約教室</a>
        <a class="button" id="toggleButton1" onclick="toggleTable(1)">查看已預約教室</a>
        <a class="button" id="toggleButton2" onclick="toggleTable(2)">查看借用紀錄</a>
        <p> </p>
        <!-- <h1 align="center">新增學生資料</h1> -->
    <form action="create_res.php" method="post">
      <table width="500" border="1"  align="center" id="myTable" class="table-row0 hidden">
        <tr>
          <th>學號</th>
          <td bgcolor="#FFFFFF"><input type="text" name="User_id" value="<?php echo $_GET["ID"]; ?>" readonly/></td>
        </tr>
        <tr>
          <th>教室ID</th>
          <td bgcolor="#FFFFFF"><input type="text" name="Classroom_id" /></td>
        </tr>
        <tr>
          <th>年</th>
          <td bgcolor="#FFFFFF"><input type="text" name="Res_year" /></td>
        </tr>
        <tr>
          <th>月</th>
          <td bgcolor="#FFFFFF"><input type="text" name="Res_month" /></td>
        </tr>
        <tr>
          <th>日</th>
          <td bgcolor="#FFFFFF"><input type="text" name="Res_day" /></td>
        </tr>
        <tr>
          <th colspan="2"><input class="button" type="submit" border="none" value="新增" /></th>
        </tr>
      </table>
    </form>
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
  $User_id= $_GET['ID'];

  // ******** update your personal settings ********
  $sql = 'SELECT * FROM reservation_time natural join classroom order by Re_id desc'; // set up your sql query
  $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
      echo '<table class="table-row1 hidden" style="border-collapse: collapse; font-size: 0.9em; font-family: sans-serif; min-width: 400px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);" align="center" margin: 20px;>';
      echo '<tr>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">學號</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">教室名稱</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">年</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">月</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">日</th>';
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
          echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $User_id . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;">' . $Classroom_name . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $Res_year . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;">' . $Res_month . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $Res_day. '</td>';
          //   echo "<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;"><a href='update.php?id=" . $id . "&gender=" . $gender ."'>修改</a></td>";
        //   echo "<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;"><a href='delete.php?id=" . $id . "'>刪除</a></td>";
          echo '</tr>';

      }
  } 
  $User_id= $_GET['ID'];

  $sql = 'SELECT * FROM reservation_time natural join classroom where User_id = ?'; // set up your sql query
  $stmt = mysqli_prepare($conn, $sql);
  mysqli_stmt_bind_param($stmt, "s", $User_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
//   $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
      echo '<table class="table-row2 hidden" style="border-collapse: collapse; font-size: 0.9em; font-family: sans-serif; min-width: 400px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);" align="center" margin: 20px;>';
    echo '<tr>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">學號</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">教室名稱</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">年</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">月</th>';
      echo '<th style="padding: 10px; background-color: #89b8c7ba;">日</th>';
      echo '<th colspan="2" style="padding: 10px; background-color: #89b8c7ba;">修改/刪除</th>';
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
          echo '<tr id="myTable" class="table-row2 hidden">';
          echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $User_id . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;">' . $Classroom_name . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $Res_year . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;">' . $Res_month . '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd;">' . $Res_day. '</td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd;"><a href="user_update.php?id=' . $row['Re_id'] . '" class="button">修改</a></td>';
          echo '<td style="padding: 10px; border: 1px solid #ddd;"><a href="user_delete_res.php?id=' . $row['Re_id'] . '" class="button">刪除</a></td>';
        //   echo "<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;"><a href='update.php?id=" . $id . "&gender=" . $gender ."'>修改</a></td>";
        //   echo "<td style="padding: 10px; border: 1px solid #ddd; background-color: #f3f3f3;"><a href='delete.php?id=" . $id . "'>刪除</a></td>";
          echo '</tr>';

      }
  } 
  $User_id= $_GET['ID'];

  ?>
    </div>
<script>
    var isButton0Clicked = false;
    var isButton1Clicked = false;
    var isButton2Clicked = false;

    function toggleTable(buttonId) {
        var button1 = document.getElementById("toggleButton0");
        var button1 = document.getElementById("toggleButton1");
        var button2 = document.getElementById("toggleButton2");

        if (buttonId === 0) {
            if(isButton0Clicked == false)
                isButton0Clicked = !isButton0Clicked;
            if (isButton1Clicked) {
                isButton1Clicked = false;
                var tableRows1 = document.querySelectorAll(".table-row1");
                tableRows1.forEach(function(row) {
                    row.classList.add("hidden");
                });
            }
            if (isButton2Clicked) {
                isButton2Clicked = false;
                var tableRows2 = document.querySelectorAll(".table-row2");
                tableRows2.forEach(function(row) {
                    row.classList.add("hidden");
                });
            }
            var tableRows1 = document.querySelectorAll(".table-row0");
            tableRows1.forEach(function(row) {
                row.classList.remove("hidden");
            });
        }else if (buttonId === 1) {
            if(isButton1Clicked == false)
                isButton1Clicked = !isButton1Clicked;
            if (isButton0Clicked) {
                isButton0Clicked = false;
                var tableRows0 = document.querySelectorAll(".table-row0");
                tableRows0.forEach(function(row) {
                    row.classList.add("hidden");
                });
            }
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
            if (isButton0Clicked) {
                isButton0Clicked = false;
                var tableRows0 = document.querySelectorAll(".table-row0");
                tableRows0.forEach(function(row) {
                    row.classList.add("hidden");
                });
            }
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
    });
</script>

    </div>
   
</body>
</html>
