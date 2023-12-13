<?php 
    session_start();
    include "../functions/function.php";

    if(isset($_POST['saveProduct'])){
        // table products
        $productName = $_POST['product_Name'];
        $categoryID = $_POST['category_ID'];
        $productPrice = $_POST['product_Price'];
        $productStock = $_POST['product_Stock'];
        $productDeatil = $_POST['productDetail'];
        $productBrand = $_POST['brand_id'];

        // table size
        $sizes = $_POST['size'];

        // table color
        $colors = $_POST['color'];




        $productImg = $_FILES['product_Img']['name'];
        $path = "../uploads";
        $img_ext = pathinfo($productImg, PATHINFO_EXTENSION);
        $filename = time().'.'.$img_ext;

        $productInsert = "INSERT INTO products (product_Name, product_Img, productDetail, category_ID, brand_id, product_Price, product_Stock) 
        VALUES ('$productName','$filename', '$productDeatil', '$categoryID', '$productBrand', '$productPrice','$productStock')";

        $productInsertRun = mysqli_query($conn, $productInsert);

        $productID = mysqli_insert_id($conn);
        

        if($productInsertRun){
            move_uploaded_file($_FILES['product_Img']['tmp_name'], $path.'/'.$filename);

            // insert to table size
            foreach($sizes as $size){
                $sizeInsert = "INSERT INTO size (size_name, products_id) 
                VALUES ('$size','$productID')";
                $sizeInsertRun = mysqli_query($conn, $sizeInsert);
            }

            // insert to table color
            foreach($colors as $color){
                $colorInsert = "INSERT INTO color (color_name, products_id) 
                VALUES ('$color','$productID')";
                $colorInsertRun = mysqli_query($conn, $colorInsert);
            }

            // insert to table detailImg
            $pathDetail = "../uploads/detail";
            
            // table detailImg
            $detailImg = $_FILES['image']['name'];
            
            foreach($detailImg as $key => $img){


                $DetailImgInsert = "INSERT INTO detailimg (image, products_id) 
                VALUES ('$img','$productID')";
                $DetailImgInsertRun = mysqli_query($conn, $DetailImgInsert);

                move_uploaded_file($_FILES['image']['tmp_name'][$key], $pathDetail.'/'.$img);

            }
            redirect("../admin/product.php",'Product has Added');
        }
    }
    else if(isset($_POST['saveCategory'])){

        $productName = $_POST['category_Name'];

        $categoryInsert = "INSERT INTO category (category_Name) VALUES ('$productName')";
        $categoryInsertRun = mysqli_query($conn, $categoryInsert);
        
        if($categoryInsertRun){
            redirect("../admin/product.php",'Category has Added');   
        }
    }
    else if(isset($_POST['updateProduct'])){
        $productID = $_POST['product_ID'];
        $productName = $_POST['product_Name'];
        $categoryID = $_POST['category_ID'];
        $productPrice = $_POST['product_Price'];
        $productStock = $_POST['product_Stock'];

        $NewproductImg = $_FILES['product_Img']['name'];
        $OldproductImg = $_POST['Old_product_Img'];

        if($NewproductImg != ''){
            $imgExt = pathinfo($NewproductImg, PATHINFO_EXTENSION);
            $Updatefilename = time().'.'.$imgExt;
        }
        else{
            $Updatefilename = $OldproductImg;
        }
        $path = "../uploads";
        $categoryUpdate = "UPDATE products SET product_Name='$productName', product_Img='$Updatefilename',
        category_ID='$categoryID', product_Price='$productPrice', product_Stock='$productStock' WHERE id='$productID'";
        $categoryUpdateRun = mysqli_query($conn, $categoryUpdate);

        if($categoryUpdateRun){

            if($_FILES['product_Img']['name'] != ""){
                move_uploaded_file($_FILES['product_Img']['tmp_name'], $path.'/'.$NewproductImg);
                if(file_exists("../uploads/".$OldproductImg)){
                    unlink("../uploads/".$OldproductImg);
                }
                redirect("../admin/product.php",'Product has Added');
            }
        }
    }

    else if(isset($_POST['deleteProduct'])){
        $productID = $_POST['deleteProduct'];

        $checkImg = "SELECT * FROM products WHERE id='$productID'";
        $checkImgRun = mysqli_query($conn ,$checkImg);
        $checkData = mysqli_fetch_array($checkImgRun);
        $img = $checkData['product_Img'];

        $query = "DELETE FROM products WHERE id='$productID'";
        $queryRun = mysqli_query($conn ,$query);

        if($queryRun){
            if(file_exists("../uploads/".$img)){
                unlink("../uploads/".$img);
            }
            redirect("../admin/product.php",'Product has Added');
        }
        else{
            redirect("../admin/product.php",'Product has Added');
        }
    }
    else if(isset($_POST['saveSlider'])){
        $sliderTilte = $_POST['slider_tilte'];
        $sliderDetail = $_POST['slider_detail'];

        $sliderImg = $_FILES['slider_img']['name'];
        $path = "../uploads/silder";
        $img_ext = pathinfo($sliderImg, PATHINFO_EXTENSION);
        $filename = time().'.'.$img_ext;

        $SildeInsert = "INSERT INTO slider (slider_img, slider_tilte, slider_detail) 
        VALUES ('$filename','$sliderTilte','$sliderDetail')";

        $SildeInsertRun = mysqli_query($conn, $SildeInsert);

        if($SildeInsertRun){
            move_uploaded_file($_FILES['slider_img']['tmp_name'], $path.'/'.$filename);
            redirect("../admin/product.php",'Product has Added');
        }
    }
    else if(isset($_POST['saveBrand'])){
        $brandName = $_POST['brand_name'];

        $brandImg = $_FILES['brand_img']['name'];
        $path = "../uploads/brands";
        $img_ext = pathinfo($brandImg, PATHINFO_EXTENSION);
        $filename = time().'.'.$img_ext;

        $BrandInsert = "INSERT INTO brands (brand_name, brand_img) 
        VALUES ('$brandName','$filename')";

        $BrandInsertRun = mysqli_query($conn, $BrandInsert);

        if($BrandInsertRun){
            move_uploaded_file($_FILES['brand_img']['tmp_name'], $path.'/'.$filename);
            redirect("../admin/brands.php",'Product has Added');
        }
    }
?>