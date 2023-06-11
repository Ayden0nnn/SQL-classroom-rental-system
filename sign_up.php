<?php
    
    require_once('connect_db.php');
    
    //check data
/*
        echo 'account:';
        echo $_POST['user_account'];
        echo '<br>';

        echo 'user_name:';
        echo $_POST['user_name'];
        echo '<br>';

        echo 'user_phone:';
        echo $_POST['user_phone'];
        echo '<br>';

        echo 'user_pwd:';
        echo $_POST['user_pwd'];
        echo '<br>';

        echo 'user_chpwd:';
        echo $_POST['user_chpwd'];
        echo '<br>';
*/
        
    
        //check all data aren't null
        if(!isset($_POST['user_account']) || 
            !isset($_POST['user_pwd'])  || 
            !isset($_POST['user_phone']) || 
            !isset($_POST['user_chpwd'])  || 
            !isset($_POST['user_name'])){

            echo '請確認所有資料已填妥';
            exit();
        }

        
        // read data from sign_up.html
        $user_account = $_POST['user_account'];
        $user_pwd = $_POST['user_pwd'];
        $user_phone = $_POST['user_phone'];
        $user_name = $_POST['user_name'];
        $user_chpwd = $_POST['user_chpwd'];
        $user_type = 'ST';

        

        //check pwd
        if($user_pwd != $user_chpwd){
            echo '請確認密碼是否正確';
            exit();
        }
        

        //check account 
            //sql
            $sql_select = "SELECT * FROM users where User_id = ?; ";
            //prepare statememt
            $stmt = mysqli_stmt_init($conn);
            //
            if(!mysqli_stmt_prepare($stmt, $sql_select)){
                echo 'stmt failed';
            }

            mysqli_stmt_bind_param($stmt, "s", $user_account);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if($row = mysqli_fetch_assoc($result)){
                echo '帳戶已存在';
                exit();
            }
            
            mysqli_stmt_close($stmt);

            //check id only have0-9 A-Z
            if(!preg_match("/^[A-Z0-9]*$/", $user_account)){
                echo '請使用大寫英文字母及數字';
                exit();
            }
            
            //check phone
            if(strlen( $string ) != 10){
                echo '手機格式不正確';
                exit();
            }

    //insert into db
    $sql_insert = "INSERT INTO users (User_id , User_type, User_name, User_phone, User_pwd) values (?, ?, ?, ?, ?);";
    $stmt2 = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt2, $sql_insert)){
        echo 'stmt failed';
    }

   // $hashpwd = password_hash();

    mysqli_stmt_bind_param($stmt2, "sssss", $user_account, $user_type, $user_name, $user_phone, $user_pwd);

    mysqli_stmt_execute($stmt2);
    mysqli_stmt_close($stmt2);

    //show up sign_up successed
    echo '註冊成功';