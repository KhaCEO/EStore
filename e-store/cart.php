<?php include './include/header.php'; ?>

<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="">
                            <span>
                                Home
                            </span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
                        <span>
                            Shopping Cart
                        </span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        Shopping Cart
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                            <div class="cart-form">
                                <table class="shop_table">
                                    <thead>
                                        <tr>
                                            <th class="product-remove"></th>
                                            <th class="product-thumbnail"></th>
                                            <th class="product-name"></th>
                                            <th class="product-price"></th>
                                            <th class="product-quantity"></th>
                                            <th class="product-subtotal"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!isset($_SESSION['cus_name']) && !isset($_SESSION['cus_username']) && !isset($_SESSION['cus_pass'])) {
                                        ?>

                                            <?php
                                        } 
                                        else {
                                            $carts = getProCart();
                                            $subTotal = 0;
                                            foreach ($carts as $item) {
                                            ?>
                                                <tr class="cart_item">
                                                    <td class="product-remove">
                                                        <a href="#" class="remove"></a>
                                                    </td>
                                                    <td class="product-thumbnail">
                                                        <a href="#">
                                                            <img src="./uploads/<?= $item['product_Img'] ?>" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                                        </a>
                                                    </td>
                                                    <td class="product-name" data-title="Product">
                                                        <a href="#" class="title"><?= $item['product_Name'] ?></a>
                                                        <span class="attributes-select attributes-color"><?= $item['product_color'] ?>,</span>
                                                        <span class="attributes-select attributes-size"><?= $item['product_size'] ?></span>
                                                    </td>
                                                    <td class="product-quantity" data-title="Quantity">
                                                        <form action="./middleware/cart-code.php" method="post" >
                                                            <div class="quantity">
                                                                <div class="control">
                                                                    <input type="hidden" name="product_id" value="<?= $item['id'] ?>" class="product_id">
                                                                    <input type="text" value="<?= $item['product_qty'] ?>" class="input-qty qty" name="qtyUpdate" size="4">
                                                                </div>
                                                                <button type="submit" id="btnUpCart" name="btnUpCart" class="btn-btn-danger">Update</button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                    <td class="product-price" data-title="Price">
                                                        <span class="woocommerce-Price-amount amount">
                                                            <span class="woocommerce-Price-currencySymbol">
                                                                $
                                                            </span>
                                                            <?= $item['product_Price'] ?>
                                                        </span>
                                                    </td>
                                                </tr>
                                        <?php
                                        $subPrice = $item['product_Price'] * $item['product_qty'];
                                        $subTotal = $subTotal + $subPrice;
                                            }
                                        }
                                        ?>
                                        <tr>
                                        <td class="actions">
                                            <div class="order-total">
												<span class="title">Total Price:</span>
                                                <span class="total-price">$<?= $subTotal ?></span>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="control-cart">
                                <button class="button btn-continue-shopping">
                                    Continue Shopping
                                </button>
                                <a href="./checkout.php"><button class="button btn-cart-to-checkout" >
                                    Checkout
                                </button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

<?php include './include/script.php'; ?>