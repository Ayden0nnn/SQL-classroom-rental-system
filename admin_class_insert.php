<?php
    
    require_once('connect_db.php');

    if(!isset($_POST['cname']) || 
            !isset($_POST['cc'])  || 
            !isset($_POST['lo'])
            ){

            echo '請確認教室名稱，教室容量，教室地點已填妥';
            exit();
        }
    
        // read data from sign_up.html
        // $cid = $_POST['cid'];
        $cname = $_POST['cname'];
        $cc = $_POST['cc'];
        $eq = $_POST['eq'];
        $lo = $_POST['lo'];

        $maxIdQuery = "SELECT MAX(Classroom_id) as maxId FROM classroom";
        $result = $conn->query($maxIdQuery);
        $row = $result->fetch_assoc();
        $maxId = $row['maxId'];
        $cid = $maxId + 1;
      

        //check classroom
            //sql
            $sql_select = "SELECT * FROM classroom where Classroom_name = ?; ";
            //prepare statememt
            $stmt = mysqli_stmt_init($conn);
            //
            if(!mysqli_stmt_prepare($stmt, $sql_select)){
                echo 'stmt failed';
            }

            mysqli_stmt_bind_param($stmt, "s", $cname);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                echo '帳戶已存在';
                exit();
            }
            
            mysqli_stmt_close($stmt);

            //check id only have0-9 A-Z
            if(!preg_match("/^[A-Z0-9]*$/", $cname)){
                echo '請使用大寫英文字母及數字';
                exit();
            }
            
    //insert into db

    // 
    if(isset($_POST['cname'])){
       // echo 'id'. $cid.' name' . $cname . ' cap' . $cc . ' eq' . $eq . ' lo'. $lo;
        $sql_insert = "INSERT INTO classroom (Classroom_id , Classroom_name, Classroom_capacity, Classroom_equipment, Classroom_location) values (?, ?, ?, ?, ?);";
        $stmt2 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt2, $sql_insert)){
            echo 'stmt failed';
            exit();
        }

        mysqli_stmt_bind_param($stmt2, "sssss", $cid, $cname, $cc, $eq, $lo);

        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
    
        //show up sign_up successed
        echo "<script>alert('新增成功');</script>";
        echo "<script>window.location.href='admin.php';</script>";
    
    }else{
        echo "2";
        $sql_insert = "INSERT INTO classroom (Classroom_id , Classroom_name, Classroom_capacity, Classroom_location) values (?, ?, ?, ?);";
        $stmt2 = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt2, $sql_insert)){
            echo 'stmt failed';
        }

        mysqli_stmt_bind_param($stmt2, "ssss", $cid, $cname, $cc, $lo);

        mysqli_stmt_execute($stmt2);
        mysqli_stmt_close($stmt2);
    
        //show up sign_up successed
        echo "<script>alert('新增成功');</script>";
        echo "<script>window.location.href='admin.php';</script>";

    }
    
 

  

   