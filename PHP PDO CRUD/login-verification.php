<?php
    include_once 'config.php';
    session_start();

    if (isset($_POST["Account"]) && isset($_POST["Password"])){
        $state = FALSE;
        $identity = '';
        $UserID = '';
        $Account = $_POST["Account"];
        $Password = md5($_POST["Password"]);

        //比對資料庫帳密(是否有該名使用者)
        $query = "SELECT `UserID` FROM `users` WHERE BINARY `Account` = '$Account' AND `Password` = '$Password'";
        $query_run = mysqli_query($connection, $query);

        if (mysqli_num_rows($query_run) > 0){
            $state = TRUE;
            foreach ($query_run as $row) {
                $UserID = $row['UserID'];
                $_SESSION['Id'] = $UserID;
            }

            //將該名使用者的身分撈出來
            $query = "SELECT ur.UserID,r.RoleID,r.RoleName FROM `usersrole` as ur JOIN `roles` as r ON ur.RoleID = r.RoleID WHERE ur.UserID = '$UserID'";
            $query_run = mysqli_query($connection, $query);

            if (mysqli_num_rows($query_run) > 0){
                foreach ($query_run as $row) {
                    $identity = $row['RoleName'];
                    $_SESSION['Identity'] = $identity;
                }
            }
        }

        echo $UserID . "," . $state . "," . $identity;
    }
?>