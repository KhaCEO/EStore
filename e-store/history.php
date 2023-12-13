<?php include './include/header.php'; ?>

<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <?php
                $orders = getOrderHistory();
                foreach($orders as $order){
                    ?>
                    <div class="d-flex justify-content-between">
                        <h6>Orde Number: #<?= $order['order_number'] ?></h6>
                        <h6>Status : 
                            <?= $order['status'] == 25 ? '<span class="text-success">Completed</span>': '<span class="text-danger">Cancel</span>'; ?>
                             | Date: <?= $order['date'] ?></h6>
                    </div>
                    <hr>
                    <ul class="row">
                        <?php
                            $orderId = $order['id'];
                            $items = getOrderItem($orderId);
                            foreach($items as $item){
                                ?>
                                <li class="col-md-4">
                                    <figure class="itemside mb-3">
                                        <div class="aside"><img src="./uploads/<?= $item['product_Img'] ?>" class="img-sm border"></div>
                                        <figcaption class="info align-self-center">
                                            <p class="title"><?= $item['product_Name'] ?></p> <span class="text-muted">$<?= $item['price'] ?> (x<?= $item['product_qty'] ?>)</span>
                                        </figcaption>
                                    </figure>
                                </li>
                                <?php
                            }
                        ?>
                    </ul>
                    <div class="d-flex justify-content-end">
                            <h6>Total: $<?= $order['total_price'] ?></h6>
                    </div>
                    <hr>
                    <?php
                }
            ?>
            <div class="d-flex justify-content-between">
                <a href="./products.php"><button><i class="bi bi-chevron-left"></i> Back to orders</button></a>
            </div>
        </div>
    </article>
</div>

<?php include './include/script.php'; ?>