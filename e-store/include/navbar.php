<header class="header style7">
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <div class="header-message">
                    Welcome to our online store!
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="main-header">
            <div class="row">
                <div class="col-lg-3 col-sm-4 col-md-3 col-xs-7 col-ts-12 header-element">
                    <div class="logo">
                        <a href="index.html">
                            <img src="assets/images/logo.png" alt="img">
                        </a>
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-md-6 col-xs-5 col-ts-12">
                    <div class="block-search-block">
                        <form class="form-search form-search-width-category">
                            <div class="form-content">
                                <div class="category">
                                    <select title="cate" data-placeholder="All Categories" class="chosen-select" tabindex="1">
                                        <?php
                                        $category = getAll('category');
                                        foreach ($category as $item) {
                                        ?>
                                            <option value="<?= $item['id'] ?>"><?= $item['category_Name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <form method="get">
                                    <div class="inner">
                                        <input type="text" class="input" name="q" placeholder="Search here">
                                    </div>
                                    <button class="btn-search" type="submit">
                                        <span class="icon-search"></span>
                                    </button>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12 col-ts-12">
                    <div class="header-control">

                        <!-- cart -->
                        <div class="block-minicart teamo-mini-cart block-header teamo-dropdown">
                            <a href="javascript:void(0);" class="shopcart-icon" data-teamo="teamo-dropdown">
                                Cart
                                <?php
                                if (!isset($_SESSION['cus_name']) && !isset($_SESSION['cus_username']) && !isset($_SESSION['cus_pass'])) {
                                ?>
                                    <span class="count">
                                        0
                                    </span>
                                <?php
                                } else {
                                ?>
                                    <span class="count">
                                        <?php
                                        $ProCart = countProCart();
                                        $countitem = mysqli_num_rows($ProCart);
                                        echo $countitem;
                                        ?>
                                    </span>
                                <?php
                                }
                                ?>

                            </a>
                            <div class="shopcart-description teamo-submenu">
                                <div class="content-wrap">
                                    <h3 class="title">Shopping Cart</h3>
                                    <?php
                                    if (!isset($_SESSION['cus_name']) && !isset($_SESSION['cus_username']) && !isset($_SESSION['cus_pass'])) {
                                    ?>
                                        <div class="text-center text-light p-2 m-2 bg-danger">No Products</div>
                                    <?php
                                    } else {
                                    ?>
                                        <ul class="minicart-items">
                                            <?php
                                            $carts = getProCart();
                                            $subTotal = 0;
                                            foreach ($carts as $item) {
                                            ?>
                                                <li class="product-cart mini_cart_item">
                                                    <a href="#" class="product-media">
                                                        <img src="./uploads/<?= $item['product_Img'] ?>" alt="img">
                                                    </a>
                                                    <div class="product-details">
                                                        <h5 class="product-name">
                                                            <a href="#"><?= $item['product_Name'] ?></a>
                                                        </h5>
                                                        <div class="variations">
                                                            <span class="attribute_color">
                                                                <a href="#"><?= $item['product_color'] ?></a>
                                                            </span>
                                                            ,
                                                            <span class="attribute_size">
                                                                <a href="#"><?= $item['product_size'] ?></a>
                                                            </span>
                                                        </div>
                                                        <span class="product-price">
                                                            <span class="price">
                                                                <span>$<?= $item['product_Price'] ?></span>
                                                            </span>
                                                        </span>
                                                        <span class="product-quantity">
                                                            (<?= $item['product_qty'] ?>)
                                                        </span>
                                                        <div class="product-remove">
                                                            <a href=""><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php
                                                $subPrice = $item['product_Price'] * $item['product_qty'];
                                                $subTotal = $subTotal + $subPrice;
                                            }
                                            ?>
                                        </ul>
                                        <div class="subtotal">
                                            <span class="total-title">Subtotal: </span>
                                            <span class="total-price">
                                                <span class="Price-amount">
                                                    $<?= $subTotal ?>
                                                </span>
                                            </span>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                    <div class="actions">
                                        <a class="button button-viewcart" href="./cart.php">
                                            <span>View Bag</span>
                                        </a>
                                        <a href="./order-tracking.php" class="button button-checkout">
                                            <span>Orders</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- login register -->
                        <?php
                        if (!isset($_SESSION['cus_name']) && !isset($_SESSION['cus_username']) && !isset($_SESSION['cus_pass'])) {
                        ?>
                            <div class="block-account block-header teamo-dropdown">
                                <a href="javascript:void(0);" data-teamo="teamo-dropdown">
                                    <span class="flaticon-user"></span>
                                </a>
                                <div class="header-account teamo-submenu">
                                    <div class="header-user-form-tabs">
                                        <ul class="tab-link">
                                            <li class="active">
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-login">Login</a>
                                            </li>
                                            <li>
                                                <a data-toggle="tab" aria-expanded="true" href="#header-tab-rigister">Register</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-container">
                                        <div id="header-tab-login" class="tab-panel active">
                                            <form action="./middleware/cus-login.php" method="POST" class="login form-login">
                                                <p class="form-row form-row-wide">
                                                    <input type="text" name="cus_name" placeholder="Name" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="text" name="cus_username" placeholder="Username" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" name="cus_pass" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <label class="form-checkbox">
                                                        <input type="checkbox" class="input-checkbox">
                                                        <span>
                                                            Remember me
                                                        </span>
                                                    </label>
                                                    <input type="submit" name="cusLoginSave" class="button" value="Login">
                                                </p>
                                                <p class="lost_password">
                                                    <a href="#">Lost your password?</a>
                                                </p>
                                            </form>
                                        </div>
                                        <div id="header-tab-rigister" class="tab-panel">
                                            <form action="./middleware/cus-login.php" method="POST" class="register form-register">
                                                <p class="form-row form-row-wide">
                                                    <input type="text" name="cus_name" placeholder="Name" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="text" name="cus_username" placeholder="Username" class="input-text">
                                                </p>
                                                <p class="form-row form-row-wide">
                                                    <input type="password" name="cus_pass" class="input-text" placeholder="Password">
                                                </p>
                                                <p class="form-row">
                                                    <input type="submit" name="saveRegister" class="button" value="Register">
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <a class="menu-bar mobile-navigation menu-toggle" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="block-account block-header teamo-dropdown">
                                <a href="javascript:void(0);" data-teamo="teamo-dropdown">
                                    <span class="flaticon-user"></span>
                                </a>
                                <div class="header-account teamo-submenu">
                                    <div class="header-user-form-tabs">
                                        <ul class="tab-link">
                                            <li class="active">
                                                <a href="./middleware/logout.php">Logout</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <a class="menu-bar mobile-navigation menu-toggle" href="#">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- menu -->
        <div class="header-nav-container rows-space-20">
            <div class="container">
                <div class="header-nav-wapper main-menu-wapper">
                    <div class="vertical-wapper block-nav-categori">
                        <div class="block-title">
                            <span class="icon-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="text">All Categories</span>
                        </div>
                        <div class="block-content verticalmenu-content">
                            <ul class="teamo-nav-vertical vertical-menu teamo-clone-mobile-menu">
                                <?php
                                $category = getAll('category');
                                foreach ($category as $item) {
                                ?>
                                    <li class="menu-item">
                                        <a href="./products.php?category=<?= $item['id'] ?>" class="teamo-menu-item-title" title="<?= $item['category_Name'] ?>"><?= $item['category_Name'] ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="header-nav">
                        <div class="container-wapper">
                            <ul class="teamo-clone-mobile-menu teamo-nav main-menu " id="menu-main-menu">
                                <li class="menu-item">
                                    <a href="index.html" class="teamo-menu-item-title" title="Home">Home</a>
                                </li>
                                <li class="menu-item">
                                    <a href="./products.php" class="teamo-menu-item-title" title="Product">Product</a>
                                </li>
                                <li class="menu-item  menu-item-has-children item-megamenu">
                                    <a href="#" class="teamo-menu-item-title" title="Brand">Brand</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu mega-menu menu-page">
                                        <div class="row">
                                            <?php
                                            $brands = getAll('brands');
                                            foreach ($brands as $item) {
                                            ?>
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 menu-page-item">
                                                    <a href="./products.php?brands=<?= $item['id'] ?>">
                                                        <img src="./uploads/brands/<?= $item['brand_img'] ?>" alt="">
                                                        <p class="text-center"><?= $item['brand_name'] ?></p>
                                                    </a>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<?php

if (isset($_GET['q'])) {
    $search = $_GET['q'];
    $searchData = "SELECT * FROM products WHERE product_Name LIKE '%$search%'";
    $searchDataRun = mysqli_query($conn, $searchData);
    if (mysqli_num_rows($searchDataRun) > 0) {
        ?>
        <div class="container">
            <div class="row">
                <div class="content-area shop-grid-content full-width col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="site-main">
                        <ul class="row list-products auto-clear equal-container product-grid">
                        <?php
                        foreach ($searchDataRun as $product) {
                        ?>
                                <li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                    <div class="product-inner equal-element">
                                        <div class="product-top">
                                            <div class="flash">
                                                <span class="onnew">
                                                    <span class="text">
                                                        new
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="product-thumb">
                                            <div class="thumb-inner">
                                                <a href="#">
                                                    <img src="./uploads/<?= $product['product_Img'] ?>" alt="img">
                                                </a>
                                                <div class="thumb-group">
                                                    <div class="yith-wcwl-add-to-wishlist">
                                                        <div class="yith-wcwl-add-button">
                                                            <a href="#">Add to Wishlist</a>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="button quick-wiew-button">Quick View</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <h5 class="product-name product_title">
                                                <a href="#">
                                                    <?= $product['product_Name'] ?>
                                                </a>
                                            </h5>
                                            <div class="group-info">
                                                <div class="stars-rating">
                                                    <div class="star-rating">
                                                        <span class="star-3"></span>
                                                    </div>
                                                    <div class="count-star">
                                                        (3)
                                                    </div>
                                                </div>
                                                <div class="price">
                                                    <ins>$
                                                        <?= $product['product_Price'] ?>
                                                    </ins>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php
                            }
                            ?>
                            </ul>
                            <div class="pagination clearfix style2">
                                <div class="nav-link">
                                    <a href="#" class="page-numbers"><i class="icon fa fa-angle-left" aria-hidden="true"></i></a>
                                    <a href="#" class="page-numbers">1</a>
                                    <a href="#" class="page-numbers">2</a>
                                    <a href="#" class="page-numbers current">3</a>
                                    <a href="#" class="page-numbers"><i class="icon fa fa-angle-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

?>