<?php
    include_once 'config.php';

    if (isset($_POST["insertuser"])){

        //配置用戶一組編號(新增使用者)
        $query = "SELECT UUID() as UserID";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) > 0){
            foreach ($query_run as $row) {
                $UserID = $row['UserID'];
            }
        }

        $Account = trim($_POST["account"]);
        $Pwd = trim($_POST["pwd"]);
        if (str_contains($Pwd, ' ')){
            echo '<script>alert("密碼中含空白，無法成功新增資料");</script>';
            return false;
        }
        else{
            $Pwd = md5($Pwd);
        }
        $identity = trim($_POST["permission"]);

        $query = "INSERT INTO `users` VALUES('$UserID','$Account','$Pwd')";
        $query_run = mysqli_query($connection, $query);

        if ($query_run){
            $query = "INSERT INTO `usersrole` VALUES('$UserID','$identity')";
            $query_run = mysqli_query($connection, $query);
            if ($query_run){
                echo '<script>alert("使用者資料新增成功");</script>';
            }
            else{
                echo '<script>alert("使用者資料新增失敗");</script>';
            }
        }
        else{
            echo '<script>alert("使用者資料新增失敗");</script>';
        }
    }
?>