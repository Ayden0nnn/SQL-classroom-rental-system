<?php
    
    require_once('connect_db.php');
    $cid = $_GET['cid'];
    $ryear = $_GET['ryear'];
    $rmonth = $_GET['rmonth'];
    $rday = $_GET['rday'];
    $rid = $_GET['rid'];
    $User_id= $_GET['ID'];

    $update_sql = "UPDATE reservation_time SET Classroom_id='$cid', Res_year='$ryear', Res_month='$rmonth', Res_day='$rday' WHERE Re_id='$rid'"; // TODO
    $query_run2 = mysqli_query($conn,$update_sql);

    if ($query_run2) {
        echo "<script>alert('修改成功');</script>";
        //echo "<br> <a href='user_reservation.php?id=$User_id' id='User_id'>返回主頁</a>";
        echo "<script>window.location.href='user_reservation.php?ID=$User_id';</script>";
    } else {
        echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
        //echo "<br> <a href='user_reservation.php?id=$User_id' id='User_id'>返回主頁</a>";
        echo "<script>window.location.href='user_reservation.php?ID=$User_id';</script>";
    }
    ?>