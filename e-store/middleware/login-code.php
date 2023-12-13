<?php 
    session_start();
    include "../config/dbconn.php";
    include "../functions/function.php";

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = testInput($_POST['email']);
        $password = testInput($_POST['password']);

        if(empty($email)){
            $_SESSION['status'] = "Email Required";
            $_SESSION['status_code'] = "error";
            header("Location: ../admin/index.php");
        }
        elseif(empty($password)){
            $_SESSION['status'] = "Password Required";
            $_SESSION['status_code'] = "error";
            header("Location: ../admin/index.php");
        }
        else{
            $password = md5($password);
            $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) === 1){
                $row = mysqli_fetch_assoc($result);
                if($row['password'] === $password){
                    if($row['role'] === 'admin'){

                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['status'] = "Login Successfully";
                        $_SESSION['status_code'] = "success";
                        header("Location: ../admin/dashboard.php");
                    }
                    else{

                        $_SESSION['name'] = $row['name'];
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['role'] = $row['role'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['status'] = "Something Wrong";
                        $_SESSION['status_code'] = "error";
                        header("Location: ../admin/index.php");
                    }
                }
                else{
                    $_SESSION['status'] = "Password is Wrong";
                    $_SESSION['status_code'] = "error";
                    header("Location: ../admin/index.php");
                }
            }
            else{
                $_SESSION['status'] = "Password and Email is Wrong";
                $_SESSION['status_code'] = "error";
                header("Location: ../admin/index.php");
            }
        }
    }

?>