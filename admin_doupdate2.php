<?php
    
    require_once('connect_db.php');
    $cid = $_GET['cid'];
    $ryear = $_GET['ryear'];
    $rmonth = $_GET['rmonth'];
    $rday = $_GET['rday'];
    $rid = $_GET['rid'];

    $update_sql = "UPDATE reservation_time SET Classroom_id='$cid', Res_year='$ryear', Res_month='$rmonth', Res_day='$rday' WHERE Re_id='$rid'"; // TODO
    $query_run2 = mysqli_query($conn,$update_sql);
    if ($query_run2) {
        echo "修改成功!!<br> <a href='admin_res.php'>返回主頁</a>";
    } else {
        echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
    }
    ?>