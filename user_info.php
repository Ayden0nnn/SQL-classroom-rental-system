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
        <a href="user_reservation.php" id="reservationLink">教室借閱紀錄查詢</a>
        <a class="active" href="user_info.php" id="infoLink">使用者資訊</a>
        <a href="home.php" class="text-center">log out</a>
        <a class="white text-center"><?php echo $_GET["ID"] ?></a>
    </div>
    <br><br>
    <div id = "root"><div>
        <h2 style="text-align:center;">使用者資訊</h2>   
        <div class="text-center">
        <a class="button" id="toggleButton1" onclick="toggleTable(1)">查看使用者資訊</a>
        <a class="button" id="toggleButton2" onclick="toggleTable(2)">修改使用者資訊</a>
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
        $sql = 'SELECT * FROM users where User_id = ?'; // set up your sql query
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $User_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                // Process the Result here , need to modify.
                $User_id = $row['User_id'];
                $User_name = $row['User_name'];
                $User_phone= $row['User_phone'];
                $User_pwd = $row['User_pwd'];
                echo '<table width="500" border="1" align="center" class="table-row1 hidden" id="myTable">';
                echo '<tr>';
                echo '<th>學號</th>';
                echo '<td bgcolor="#FFFFFF">' . $User_id . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>姓名</th>';
                echo '<td bgcolor="#FFFFFF">' . $User_name . '</td>';
                echo '</tr>';
                echo '<tr>';
                echo '<th>電話</th>';
                echo '<td bgcolor="#FFFFFF">' . $User_phone . '</td>';
                echo '</tr>';
                echo '</table>';
               
            }
        } else {
            echo '0 results';
        }

        $sql = 'SELECT * FROM users where User_id = ?'; // set up your sql query
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $User_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        ?>
        <form action="user_info_doupdate.php" class="table-row2 hidden" method="POST">
        <fieldset>
            <br>
            <div class="text-center">
            <label for="fname">學號</label><br>
            <input type="text" id="uid" name="uid" value="<?php echo $User_id; ?>"><br>
            <label for="lname">姓名</label><br>
            <input type="text" id="uname" name="uname" value="<?php echo $User_name; ?>"><br>
            <label for="lname">電話</label><br>
            <input type="text" id="uphone" name="uphone" value="<?php echo $User_phone; ?>"><br>
            <label for="lname">密碼</label><br>
            <input type="text" id="upwd" name="upwd" value="<?php echo $User_pwd; ?>"><br>
            <input class="button" type="submit" value="修改">
            </div>
        </fieldset>
        </form>

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