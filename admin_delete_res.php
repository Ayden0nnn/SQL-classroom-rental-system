<?php
    
    require_once('connect_db.php');
    $id = $_GET['id'];


if (isset($id)) {
    $delete_sql = "DELETE FROM reservation_time where Re_id = '$id'"; // TODO

    if ($conn->query($delete_sql) === true) {
        echo "刪除成功!<a href='admin_res.php'>返回主頁</a>";
    } else {
        echo '刪除失敗!';
    }
} else {
    echo '資料不完全';
}

?>