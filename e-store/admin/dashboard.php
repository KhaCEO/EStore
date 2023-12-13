<?php 
    session_start();
    include '../config/dbconn.php';
    if(isset($_SESSION['email']) && isset($_SESSION['id'])){
        
        include './include/header.php';
        include './include/navbar.php';
        include './include/sidebar.php';
        include './include/footer.php';
    }
    else{
        header("Location: index.php");
    }

?>