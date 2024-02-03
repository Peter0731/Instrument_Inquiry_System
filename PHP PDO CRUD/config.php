<?php 
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $usedb = 'eikendata';

    $connection = mysqli_connect($host, $username, $password);
    $db = mysqli_select_db($connection, $usedb);
?>