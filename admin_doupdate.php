<?php
    
    require_once('connect_db.php');

    if (isset($_POST['rname']) && isset($_POST['ryear']) && isset($_POST['rmonth']) && isset($_POST['rday'])) {
        $rname = $_POST['rname'];
        $ryear= $_POST['ryear'];
        $rmonth= $_POST['rmonth'];
        $rday = $_POST['rday'];

       //check classroom exist
        $select = "SELECT * FROM reservation_time as r, classroom as c WHERE c.Classroom_name = '$rname';"; 
        $result = mysqli_query($conn,$select);
        if( mysqli_num_rows($result) <= 0){
            echo "<script>alert('沒有這間教室喔');</script>";
		echo "<script>window.location.href='admin_res.php;</script>";
        }

        $row = mysqli_fetch_assoc ( $result );
        
        $cid = $row['Classroom_id'];
        $rid = $row['Re_id'];

       
        
        mysqli_close($conn);
        //Update
        header("Location: admin_doupdate2.php?cid=$cid&rid=$rid&ryear=$ryear&rmonth=$rmonth&rday=$rday"); 
        
       
    
    }else{
        echo "資料不完全";
    }