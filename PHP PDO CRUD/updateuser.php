<?php
    include_once 'config.php';

    if (isset($_POST["edituser"])){

        $UserId = $_POST['update_UserID'];
        $Pwd = trim($_POST['editpwd']);
        if (str_contains($Pwd, ' ')){
            echo '<script>alert("密碼中含空白，無法成功更新資料");</script>';
            return false;
        }
        else{
            $SecurePwd = md5($Pwd);
        }
        $Permission = trim($_POST['editpermission']);
        

        if ($Pwd == ''){

            $query = "UPDATE `usersrole` SET `RoleID`='$Permission' WHERE `UserID`='$UserId'";
            $query_run = mysqli_query($connection, $query);

            if ($query_run){
                echo '<script>alert("使用者資料更新成功");</script>';
            }
            else{
                echo '<script>alert("使用者資料更新失敗");</script>';
            }
        }
        else{
            $query = "UPDATE `users` SET `Password`='$SecurePwd' WHERE `UserID`='$UserId'";
            $query_run = mysqli_query($connection, $query);

            if ($query_run){
                
                $query = "UPDATE `usersrole` SET `RoleID`='$Permission' WHERE `UserID`='$UserId'";
                $query_run = mysqli_query($connection, $query);

                if ($query_run){
                    echo '<script>alert("使用者資料更新成功");</script>';
                }
                else{
                    echo '<script>alert("使用者資料更新失敗");</script>';
                }
            }
            else{
                echo '<script>alert("使用者資料更新失敗");</script>';
            }
        }
    }
?>