<html>
<head>
	<title>學生資料庫管理系統</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
	table, th, td {
	border: 1px solid black;
	border-collapse: collapse;
	}
	th, td {
	padding: 5px;
	text-align: left;    
	}
</style>
<body>
	
	<h1 align="center">學生資料庫管理系統</h1>
	<!-- <table style="width:50%" align="center">
		<tr><th>id</th><th>Name</th><th>stdid</th><th colspan="2">Action</th></tr>
		// TODO 
			從資料庫中撈出student表格的資料，用html呈現。
			
			以下html為範例。
		
		<tr>
			<td>7</td>
			<td>Daenerys Targaryen</td>
			<td>59</td>
			<td><a href="update.php?">修改</td>
			<td><a href="delete.php?">刪除</td>
		</tr>
	-->


		<!-- hint: 用這段php code 讀取資料庫的資料-->

		<?php
  // ******** update your personal settings ********
  $servername = 'localhost';
  $username = '';
  $password = '';
  $dbname = 'db_class';

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
  $sql = 'SELECT * FROM student'; // set up your sql query
  $result = $conn->query($sql); // Send SQL Query

  if ($result->num_rows > 0) {
      echo '<table style="width:50%" align="center">';
      echo '<tr>';
      echo '<th>id</th>';
      echo '<th>Name</th>';
      echo '<th>stdid</th>';
      echo '<th colspan="2">Action</th>';
      echo '</tr>';
      while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
          // Process the Result here , need to modify.
          $id = $row['id'];
          $StuName = $row['StuName'];
          $StuNum = $row['StuNum'];
		  $gender = $row['gender'];
          echo '<tr>';
          echo '<td>' . $id . '</td>';
          echo '<td>' . $StuName . '</td>';
          echo '<td>' . $StuNum . '</td>';
          echo "<td><a href='update.php?id=" . $id . "&gender=" . $gender ."'>修改</a></td>";
          echo "<td><a href='delete.php?id=" . $id . "'>刪除</a></td>";
          echo '</tr>';
      }
  } else {
      echo '0 results';
  }
  ?>
		
	<!-- </table> -->
	<p align="center"><a href="create.html">新增資料</a><p>
</body>
	
</html>


				
		