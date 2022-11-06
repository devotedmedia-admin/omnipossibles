<?php

    $hostName = 'localhost';
    $userName = 'root';
    $userPass = '';
    $dbName = 'omnipossibles';

    $con = mysqli_connect($hostName, $userName, $userPass, $dbName);

    if(!$con){
        echo "connection failed!";
    }
?>