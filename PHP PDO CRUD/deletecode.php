<?php
    include_once 'config.php';

    if(isset($_POST['deletedata']))
    {
        $id = $_POST['delete_id'];
        
        $query = "DELETE FROM `eikentable` WHERE `Id` IN ($id)";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("資料刪除成功");window.location.href="index.php"</script>';
            //header('Location: index.php');
        }
        else
        {
            echo '<script> alert("資料刪除失敗"); </script>';
        }
    }
?>