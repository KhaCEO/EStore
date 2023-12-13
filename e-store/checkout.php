<?php include './include/header.php'; ?>

<div class="main-content main-content-checkout">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-trail breadcrumbs">
                    <ul class="trail-items breadcrumb">
                        <li class="trail-item trail-begin">
                            <a href="index.html">Home</a>
                        </li>
                        <li class="trail-item trail-end active">
                            Checkout
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <h3 class="custom_blog_title">
            Checkout
        </h3>
        <div class="checkout-wrapp">
            <div class="shipping-address-form-wrapp">
                <form action="./middleware/checkout-code.php" method="post">
                <div class="shipping-address-form  checkout-form">
                    <div class="row-col-1 row-col">
                        <div class="shipping-address">
                            <h3 class="title-form">
                                Shipping Address
                            </h3>
                            <p class="form-row form-row-first">
                                <label class="text">Name</label>
                                <input title="first" type="text" class="input-text" name="user_id" value="<?= $_SESSION['cus_name'] ?>">
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">Phone Number</label>
                                <input title="last" type="text" name="phone" class="input-text">
                            </p>
                            <p class="form-row forn-row-col forn-row-col-1">
                                <label class="text">City</label>
                                <select title="city" class="chosen-select" tabindex="1" name="city">
                                    <option value="United States">United States</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                </select>
                            </p>
                            <p class="form-row forn-row-col forn-row-col-2">
                                <label class="text">Khan</label>
                                <select title="khan" class="chosen-select" tabindex="1" name="khan">
                                    <option value="London">London</option>
                                    <option value="Tokyo">tokyo</option>
                                </select>
                            </p>
                            <p class="form-row forn-row-col forn-row-col-3">
                                <label class="text">Sangkat</label>
                                <select title="sangkat" class="chosen-select" tabindex="1" name="sangkat">
                                    <option value="PP">PP</option>
                                    <option value="PV">PV</option>
                                </select>
                            </p>
                            <p class="form-row form-row-last">
                                <label class="text">Address</label>
                                <input title="address" type="text" class="input-text" name="address">
                            </p>
                        </div>
                    </div>
                    <div class="row-col-2 row-col">
                        <div class="your-order">
                            <h3 class="title-form">
                                Your Order
                            </h3>
                            <ul class="list-product-order">
                                <?php
                                    $carts = getProCart();
                                    $subTotal = 0;
                                    foreach ($carts as $item) {
                                    ?>
                                       <li class="product-item-order">
                                            <div class="product-thumb">
                                                <a href="#">
                                                    <img src="./uploads/<?= $item['product_Img'] ?>" alt="img">
                                                </a>
                                            </div>
                                            <div class="product-order-inner">
                                                <h5 class="product-name">
                                                    <a href="#"><?= $item['product_Name'] ?></a>
                                                </h5>
                                                <span class="attributes-select attributes-color"><?= $item['product_color'] ?>,</span>
                                                <span class="attributes-select attributes-size"><?= $item['product_size'] ?></span>
                                                <div class="price">
                                                    $<?= $item['product_Price'] ?>
                                                    <span class="count"> x<?= $item['product_qty'] ?></span>
                                                </div>
                                            </div>
                                        </li> 
                                    <?php
                                    $subPrice = $item['product_Price'] * $item['product_qty'];
                                    $subTotal = $subTotal + $subPrice;
                                    }
                                ?>
                            </ul>
                            <div class="order-total" value>
                                <span class="title">
                                    Total Price:
                                </span>
                                <span class="total-price">
                                    <input type="hidden" name="total_price" value="<?= $subTotal ?>">
                                    $<?= $subTotal ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="btnPayment" class="button button-payment">Payment</button>
                </form>
            </div>
            <!-- <div class="end-checkout-wrapp">
                <div class="end-checkout checkout-form">
                    <div class="icon">
                    </div>
                    <h3 class="title-checkend">
                        Congratulation! Your order has been processed.
                    </h3>
                    <div class="sub-title">
                        Aenean dui mi, tempus non volutpat eget, molestie a orci.
                        Nullam eget sem et eros laoreet rutrum.
                        Quisque sem ante, feugiat quis lorem in.
                    </div>
                    <a href="#" class="button btn-return">Return to Store</a>
                </div>
            </div> -->
        </div>
    </div>
</div>

<?php include './include/script.php'; ?>
