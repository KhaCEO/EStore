<?php 
    $sName = "localhost";
    $uName = "root";
    $Password = "";
    $dbName = "store_admin";

    $conn = mysqli_connect($sName, $uName, $Password, $dbName);

    if(!$conn){
        echo "Connection is Failed";
        exit();
    }
?>