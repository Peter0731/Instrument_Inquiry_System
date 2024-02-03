<?php
    /*將使用者新輸入的數據更新到資料中,若成功回傳1,反之,回傳0*/ 
    include_once 'config.php';
    
    if(isset($_POST['editdata']))
    {
        $id=$_POST['update_id'];
        $name = $_POST['update_hname'];
        $ins = $_POST['update_ins'];
        $time = $_POST['update_time'];
        $sn = $_POST['update_sn'];
        $remarks = $_POST['update_remarks'];
        $UserID = $_POST['update_UserID'];

        $query = "UPDATE `eikentable` Set `name`='$name',`ins`='$ins',`time`='$time',`sn`='$sn',`remarks`='$remarks',
        `UserID`='$UserID' Where `Id`='$id'";
        
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script type="text/javascript"> alert("資料更新成功"); </script>';
            //header('Location: index.php');
        }
        else
        {
            echo '<script type="text/javascript"> alert("資料更新失敗"); </script>';
        }
    }
?>