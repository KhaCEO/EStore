<?php
    session_start();
    include "../config/dbconn.php";

    if(isset($_POST['addCart'])){
        if(isset($_SESSION['cus_name']) && isset($_SESSION['cus_username']) && isset($_SESSION['cus_pass'])){
            $productId = $_POST['product_id'];
            $productQty = $_POST['product_qty'];
            $productColor = $_POST['product_color'];
            $productSize = $_POST['product_size'];

            $cusName = $_SESSION['auth']['cus_id'];

            $cartInsert = "INSERT INTO carts (cus_id, product_id, product_qty, product_color, product_size) 
            VALUES ('$cusName', '$productId', '$productQty', '$productColor', '$productSize')";

            $cartInsertRun = mysqli_query($conn, $cartInsert);

            if($cartInsertRun){
                $_SESSION['status'] = "Products has added";
                $_SESSION['status_code'] = "success";
                header('Location: ../products.php');
            }
            else{
                $_SESSION['status'] = "Something wrong";
                $_SESSION['status_code'] = "error";
                header('Location: ../products.php');
            }
        }
        else{
            $_SESSION['status'] = "Please login first";
            $_SESSION['status_code'] = "warning";
            header('Location: ../products.php');
        }
    }

    elseif(isset($_POST['btnUpCart'])){
        if(isset($_SESSION['cus_name']) && isset($_SESSION['cus_username']) && isset($_SESSION['cus_pass'])){
            $productId = $_POST['product_id'];
            $updateQty = $_POST['qtyUpdate'];

            $cusName = $_SESSION['auth']['cus_id'];

            // echo $productId;
            // echo $updateQty;
            // echo $cusName;

            $cartUpdate = "UPDATE carts SET product_qty = '$updateQty' 
            WHERE product_id = '$productId' AND cus_id = '$cusName'";

            $cartUpdateRun = mysqli_query($conn, $cartUpdate);

            if($cartUpdate){
                $_SESSION['status'] = "Products has Updated";
                $_SESSION['status_code'] = "success";
                header('Location: ../cart.php');
            }
            else{
                $_SESSION['status'] = "Something wrong";
                $_SESSION['status_code'] = "error";
                header('Location: ../carts.php');
            }
        }
        else{
            $_SESSION['status'] = "Please login first";
            $_SESSION['status_code'] = "warning";
            header('Location: ../products.php');
        }
    }
    
?>