<?php
    
    require_once('connect_db.php');

    $id = $_GET['id'];


    if (isset($id)) {
        $delete_sql = "DELETE FROM classroom where Classroom_id = '$id'"; // TODO

        if ($conn->query($delete_sql) === true) {
            echo "<script>alert('刪除成功');</script>";
            echo "<script>window.location.href='admin.php';</script>";
        } else {
            echo "<h2 align='center'><font color='antiquewith'>刪除失敗!!</font></h2>";
            echo "<br> <a href='admin.php'>返回主頁</a>";
        }
    } else {
        echo '資料不完全';
    }
