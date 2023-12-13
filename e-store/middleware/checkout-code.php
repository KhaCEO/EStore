<?php
    session_start();
    include "../config/dbconn.php";

    if(isset($_POST['btnPayment'])){

        // Table orders
        $orderNumber = rand(1111,9999);
        $cusName = $_SESSION['auth']['cus_id'];
        $phone = $_POST['phone'];
        $cusAddress = $_POST['city'].", ".$_POST['khan'].", ".$_POST['sangkat'].", ".$_POST['address'];
        $totalPrice = $_POST['total_price'];


        $orderInsert = "INSERT INTO orders (order_number, user_id, phone, address, total_price)
        VALUES ('$orderNumber', '$cusName', '$phone', '$cusAddress', '$totalPrice')";

        $orderInsertRun = mysqli_query($conn, $orderInsert);
        $orderId = mysqli_insert_id($conn);

        if($orderInsertRun){
            
            // table order item
            $cusID = $_SESSION['auth']['cus_id'];
            $queryGet = "SELECT products.*, carts.product_qty, carts.product_color, carts.product_size FROM products, carts 
            WHERE carts.product_id = products.id AND carts.cus_id = '$cusID'";
       
            $carts = mysqli_query($conn, $queryGet);

            foreach($carts as $item){
                
                $productId = $item['id'];
                $productQty = $item['product_qty'];
                $price = $item['product_Price'];

                $orderItemInsert = "INSERT INTO order_items (order_id , product_id, product_qty, price)
                VALUES ('$orderId', '$productId', '$productQty', '$price')";

                $orderItemInsertRun = mysqli_query($conn, $orderItemInsert);

                if($orderItemInsertRun){
                    
                    $cartsDelete = "DELETE FROM carts WHERE cus_id = '$cusName' ";
                    $cartsDeleteRun = mysqli_query($conn, $cartsDelete);

                    if($cartsDeleteRun){

                        $_SESSION['status'] = "Congratulation! Your order has been processed.";
                        $_SESSION['status_code'] = "success";
                        header('Location: ../checkout.php');
                    }
                }

            }


        }
    }
?>