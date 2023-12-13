<?php
    session_start();
    include "../config/dbconn.php";

    // Customer Register
    if(isset($_POST['saveRegister'])){
        $cusName = $_POST['cus_name'];
        $cusUsername = $_POST['cus_username'];
        $cusPass = $_POST['cus_pass'];

        $Pass = md5($cusPass);

        $cusRegister = "INSERT INTO customer (cus_name, cus_username, cus_pass) 
        VALUES ('$cusName','$cusUsername', '$Pass')";

        $cusRegisterRun = mysqli_query($conn, $cusRegister);
        
        if($cusRegisterRun){
            header('Location: ../products.php');
        }

    }

    // Customer Login
    elseif(isset($_POST['cusLoginSave'])){
        $cusName = $_POST['cus_name'];
        $cusUsername = $_POST['cus_username'];
        $cusPass = $_POST['cus_pass'];

        $Pass = md5($cusPass);

        $cusLogin = "SELECT * FROM customer 
        WHERE cus_name = '$cusName' AND cus_username = '$cusUsername' AND cus_pass = '$Pass'";

        $cusLoginRun = mysqli_query($conn, $cusLogin);
        
        if(mysqli_num_rows($cusLoginRun) === 1){

            $_SESSION['auth'] = true;
            $data = mysqli_fetch_array($cusLoginRun);
            
            $id = $data['id'];
            $user = $data['cus_username'];
            $pass = $data['cus_pass'];

            $_SESSION['auth'] = [
                "cus_id" => $id,
                "cus_user" => $user,
                "cus_pass" => $pass
            ];

            $_SESSION['cus_name'] = $cusName;
            $_SESSION['cus_username'] = $cusUsername;
            $_SESSION['cus_pass'] = $cusPass;
            $_SESSION['status'] = "Login Successfully";
            $_SESSION['status_code'] = "success";
            header('Location: ../products.php');
        }
        else{
            $_SESSION['status'] = "Login Failed";
            $_SESSION['status_code'] = "error";
            header('Location: ../products.php');
        }

    }
?>