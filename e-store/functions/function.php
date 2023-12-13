<?php
    include '../config/dbconn.php';

    function testInput($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function getAll($table){

        global $conn;
        $queryGet = "SELECT * FROM $table";
        return mysqli_query($conn, $queryGet);
    }

    function getById($table, $id){

        global $conn;
        $queryGet = "SELECT * FROM $table WHERE id='$id'";
        return mysqli_query($conn, $queryGet);
    }

    function alertMessage(){
        if(isset($_SESSION['alert'])){
            echo $_SESSION['alert'];
            unset($_SESSION['alert']);
        }
    }

    function redirect($url, $message){
        $_SESSION['alert'] = $message;
        header("Location:" .$url);
    }
?>