<?php
    include_once 'config.php';

    if(isset($_POST['insertdata']))
    {
        $hname = trim($_POST['hname']);
        $ins = trim($_POST['ins']);
        $time = trim($_POST['time']);
        $sn = trim($_POST['sn']);
        $remarks = trim($_POST['remarks']);
        $UserID = trim($_POST['insert_UserID']);
        
        $query = "INSERT INTO `eikentable`(`name`, `ins`, `time`, `sn`, `remarks`,`UserID`) VALUES ('$hname','$ins','$time','$sn','$remarks','$UserID')";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script type="text/javascript"> alert("資料新增成功"); </script>';
            //header('Location: index.php');
        }
        else
        {
            echo '<script type="text/javascript"> alert("資料新增失敗"); </script>';
        }
    }
?>