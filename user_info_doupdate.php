<?php
    
    // 
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
        // $User_id= $_GET['ID'];

    if (isset($_POST['uid']) && isset($_POST['uname']) && isset($_POST['uphone']) && isset($_POST['upwd'])) {
        $uid = $_POST['uid'];
        $uname= $_POST['uname'];
        $uphone= $_POST['uphone'];
        $upwd = $_POST['upwd'];

        $update_sql = "UPDATE users SET User_id='$uid', User_name='$uname', User_phone='$uphone', User_pwd='$upwd' WHERE User_id='$uid'"; // TODO
        $query_run2 = mysqli_query($conn,$update_sql);
        if ($query_run2) {
            echo "<script>alert('新增成功');</script>";
    	    echo "<script>window.location.href='user_info.php?ID=$uid';</script>";
        } else {
            echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
    		echo "<br> <a href='user.php'>返回主頁</a>";

        }
       //check classroom exist

        // $row = mysqli_fetch_assoc ( $result );

       
        
        // mysqli_close($conn);
        // //Update
        // header("Location: user_info_doupdate2.php?uid=$uid&uname=$uname&uphone=$uphone&upwd=$upwd"); 
        
       
    
    }else{
        echo "資料不完全";
    }