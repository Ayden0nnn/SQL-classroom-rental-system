

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
        <a class="active" href="user.php" id="userLink">教室資訊</a>
        <a href="user_reservation.php" id="reservationLink">教室借閱紀錄查詢</a>
        <a href="user_info.php" id="infoLink">使用者資訊</a>

        <a href="home.php" class="text-center">log out</a>
        <!--  ID -->
        <a class="white text-center"><?php echo $_GET["ID"] ?></a>
        
    </div>
    <br><br>
    <div id = "root"><div>
        <h1 style="text-align:center;">Classroom Reservation</h1>
        <h2 style="text-align:center;">教室資訊</h2>   
        <div class="text-center">
        <a class="button" id="toggleButton1" onclick="toggleTable(1)">編號排序</a>
        <a class="button" id="toggleButton2" onclick="toggleTable(2)">容量排序</a>
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
//   header("Location: user_reservation.php?ID=$User_id");
  // ******** update your personal settings ********
  $sql = 'SELECT * FROM classroom'; // set up your sql query
  $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
      echo '<table style="width:50%" align="center">';
      echo '<tr>';
      echo '<th>教室編號</th>';
      echo '<th>教室名稱</th>';
      echo '<th>容量</th>';
      echo '<th>器材</th>';
      echo '<th colspan="2">地點</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $Classroom_id = $row['Classroom_id'];
          $Classroom_name = $row['Classroom_name'];
          $Classroom_capacity= $row['Classroom_capacity'];
		  $Classroom_equipment = $row['Classroom_equipment'];
		  $Classroom_location = $row['Classroom_location'];
          echo '<tr id="myTable" class="table-row1 hidden">';
          echo '<td>' . $Classroom_id . '</td>';
          echo '<td>' . $Classroom_name . '</td>';
          echo '<td>' . $Classroom_capacity . '</td>';
          echo '<td>' . $Classroom_equipment . '</td>';
          echo '<td>' . $Classroom_location. '</td>';
        //   echo "<td><a href='update.php?id=" . $id . "&gender=" . $gender ."'>修改</a></td>";
        //   echo "<td><a href='delete.php?id=" . $id . "'>刪除</a></td>";
          echo '</tr>';

      }
  } else {
      echo '0 results';
  }

  $sql = 'SELECT * FROM classroom order by Classroom_capacity desc'; // set up your sql query
  $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $Classroom_id = $row['Classroom_id'];
          $Classroom_name = $row['Classroom_name'];
          $Classroom_capacity= $row['Classroom_capacity'];
		  $Classroom_equipment = $row['Classroom_equipment'];
		  $Classroom_location = $row['Classroom_location'];
          echo '<tr id="myTable" class="table-row2 hidden">';
          echo '<td>' . $Classroom_id . '</td>';
          echo '<td>' . $Classroom_name . '</td>';
          echo '<td>' . $Classroom_capacity . '</td>';
          echo '<td>' . $Classroom_equipment . '</td>';
          echo '<td>' . $Classroom_location. '</td>';
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
    var isButton1Clicked = true;
    var isButton2Clicked = false;
    var tableRows1 = document.querySelectorAll(".table-row1");
            tableRows1.forEach(function(row) {
                row.classList.remove("hidden");
            });

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