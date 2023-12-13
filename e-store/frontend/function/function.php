<?php

    include './config/dbconn.php';

    function getAll($table){

        global $conn;
        $queryGet = "SELECT * FROM $table";
        return mysqli_query($conn, $queryGet);
    }

    function getById($table, $id){

        global $conn;
        $queryGet = "SELECT * FROM $table WHERE id = '$id' LIMIT 1";
        return mysqli_query($conn, $queryGet);
    }
    function getProduct($categoryID){

        global $conn;
        $queryGet = "SELECT * FROM products WHERE category_ID = '$categoryID'";
        return mysqli_query($conn, $queryGet);
    }

    function getProductBrand($BrandID){

        global $conn;
        $queryGet = "SELECT * FROM products WHERE brand_id = '$BrandID'";
        return mysqli_query($conn, $queryGet);
    }

    function getProDetail($id){

        global $conn;
        $queryGet = "SELECT products.*, category.category_Name, brands.brand_name
        FROM ((products
                  LEFT JOIN category ON products.category_ID = category.id)
                  LEFT JOIN brands ON products.brand_id = brands.id)
        WHERE products.id = $id";
        
        return mysqli_query($conn, $queryGet);
    }

    // function getBySearch($pro){

    //     global $conn;
    //     $queryGet = "SELECT * FROM products WHERE product_Name LIKE '%.$pro.%'";
    //     return mysqli_query($conn, $queryGet);
    // }

    function getOrder(){

        global $conn;
        $cusID = $_SESSION['auth']['cus_id'];
        $queryGet = "SELECT *
        FROM orders WHERE user_id = '$cusID' AND status IN (10, 15, 20)";
        
        return mysqli_query($conn, $queryGet);
    }
    function getOrderHistory(){

        global $conn;
        $cusID = $_SESSION['auth']['cus_id'];
        $queryGet = "SELECT * , DATE_FORMAT(update_at, '%d-%M-%Y') as date
        FROM orders WHERE user_id = '$cusID' AND status IN (25, 0) ORDER BY date DESC";
        
        return mysqli_query($conn, $queryGet);
    }

    function getOrderItem($orderId){

        global $conn;
        $queryGet = "SELECT products.*, order_items.*, orders.status
        FROM ((order_items
                  LEFT JOIN orders ON orders.id = order_items.order_id)
                  LEFT JOIN products ON products.id = order_items.product_id)
        WHERE orders.id = order_items.order_id AND order_items.order_id = '$orderId'";
        
        return mysqli_query($conn, $queryGet);
    }
    function getProColor($id){

        global $conn;
        $queryGet = "SELECT products.*, color.color_name
        FROM color, products
        WHERE color.products_id = $id AND products.id = '$id'";
        
        return mysqli_query($conn, $queryGet);
    }
    function getProSize($id){

        global $conn;
        $queryGet = "SELECT products.*, size.size_name
        FROM size, products
        WHERE size.products_id = $id AND products.id = '$id'";
        
        return mysqli_query($conn, $queryGet);
    }

    function getProDetailImg($id){

        global $conn;
        $queryGet = "SELECT products.*, detailimg.image
        FROM detailimg, products
        WHERE detailimg.products_id = $id AND products.id = '$id'";
        
        return mysqli_query($conn, $queryGet);
    }

    function getProCart(){

        global $conn;
        $cusID = $_SESSION['auth']['cus_id'];
        $queryGet = "SELECT products.*, carts.product_qty, carts.product_color, carts.product_size FROM products, carts 
        WHERE carts.product_id = products.id AND carts.cus_id = '$cusID'";
       
        return mysqli_query($conn, $queryGet);
    }
    function countProCart(){
        global $conn;
        $cusID = $_SESSION['auth']['cus_id'];
        $queryGet = "SELECT * FROM carts WHERE cus_id = '$cusID'";
        return mysqli_query($conn, $queryGet);
    }
    function getSlider($table, $num){

        global $conn;
        $queryGet = "SELECT * FROM $table ORDER BY slider_id DESC LIMIT $num";
        return mysqli_query($conn, $queryGet);
    }


?>