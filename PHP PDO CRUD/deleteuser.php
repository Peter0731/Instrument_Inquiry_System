<?php
    include_once 'config.php';

    if(isset($_POST['deleteuserdata']))
    {
        $UserID = $_POST['delete_userid'];
        //echo var_dump($UserID);
        
        $query = "DELETE FROM `users` WHERE `UserID` IN ($UserID)";
        //echo $query;
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("使用者資料刪除成功");window.location.href="manageuser.php";</script>';
            //header('Location: index.php');
        }
        else
        {
            echo '<script> alert("使用者資料刪除失敗"); </script>';
        }
    }
?>