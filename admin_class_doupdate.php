<?php
    
    require_once('connect_db.php');
    
// check
    if (isset($_POST['cname']) && isset($_POST['cc']) && isset($_POST['lo'])) {       
    
        $cname = $_POST['cname'];
        $cc= $_POST['cc'];
        $lo= $_POST['lo'];

        

        if(isset($_POST['eq'])){
            $eq = $_POST['eq'];
            $update=  "UPDATE classroom SET Classroom_name='$cname', Classroom_capacity='$cc', Classroom_equipment='$eq', Classroom_location = '$lo' WHERE Classroom_id='$cid'";
        }else{

            $update=  "UPDATE classroom SET Classroom_name='$cname', Classroom_capacity='$cc', Classroom_location = '$lo' WHERE Classroom_id='$cid' ";
        }

        $query_run2 = mysqli_query($conn,$update);

        if ($query_run2) {
            echo "<script>alert('修改成功');</script>";
            echo "<script>window.location.href='admin.php';</script>";
        } else {
            echo "<h2 align='center'><font color='antiquewith'>修改失敗!!</font></h2>";
            echo "<br> <a href='admin.php'>返回主頁</a>";
        }
    
    
    }else{
        echo "<script>alert('請確認教室名稱，教室容量，教室地點已填妥');</script>";
		echo "<script>window.location.href='admin.php;</script>";

    }
