<?php
    /*$hostname = 'localhost';
    $username = 'youcoizd_dev2019';
    $password = 'P^kO$gw})[ED';
    $dbname = 'youcoizd_telecallapp';*/
    session_start();
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'android_telecall';
    
    $con = mysqli_connect($hostname, $username, $password);
    if($con){
       mysqli_select_db($con, $dbname);
    }
    else{
        die("Connection failed: " . mysqli_connect_error());
    }
?>