<?php include './include/header.php'; ?>

<div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            <?php
            $orders = getOrder();
            foreach($orders as $order){
                ?>
            <div class="card-main">
                <article class="card">
                    <div class="card-body row">
                        <div class="col"> <strong>Estimated Delivery time:</strong> <br>29 nov 2019 </div>
                        <div class="col"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="bi bi-telephone-fill"></i> +1598675986 </div>
                        <?php
                        if($order['status'] == 10){
                            ?>
                                <div class="col"> <strong>Status:</strong> <br><span class="text-success">in Process</span></div>
                            <?php
                        }
                        elseif($order['status'] == 15){
                            ?>
                                <div class="col"> <strong>Status:</strong> <br><span class="text-success">Confirmed</span></div>
                            <?php
                        }
                        elseif($order['status'] == 20){
                            ?>
                                <div class="col"> <strong>Status:</strong> <br><span class="text-success">Picked</span></div>
                            <?php
                        }
                        elseif($order['status'] == 25){
                            ?>
                                <div class="col"> <strong>Status:</strong> <br><span class="text-success">Completed</span></div>
                            <?php
                        }
                        else{
                            ?>
                                <div class="col"> <strong>Status:</strong> <br><span class="text-danger">Cancel</span></div>
                            <?php
                        }
                        ?>
                        <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div>
                    </div>
                </article>
                <?php
                if($order['status'] == 10){
                    ?>
                    <div class="track">
                        <div class="step "> <span class="icon"> <i class="bi bi-check-lg"></i> </span> <span class="text">Confirmed</span> </div>
                        <div class="step "> <span class="icon"> <i class="bi bi-person-fill"></i> </span> <span class="text">Picked</span> </div>
                        <div class="step"> <span class="icon"> <i class="bi bi-box-fill"></i> </span> <span class="text">Completed</span> </div>
                    </div>
                    <?php
                }
                elseif($order['status'] == 15){
                    ?>
                    <div class="track">
                        <div class="step active "> <span class="icon"> <i class="bi bi-check-lg"></i> </span> <span class="text">Confirmed</span> </div>
                        <div class="step "> <span class="icon"> <i class="bi bi-person-fill"></i> </span> <span class="text">Picked</span> </div>
                        <div class="step"> <span class="icon"> <i class="bi bi-box-fill"></i> </span> <span class="text">Completed</span> </div>
                    </div>
                    <?php
                }
                elseif($order['status'] == 20){
                    ?>
                    <div class="track">
                        <div class="step active "> <span class="icon"> <i class="bi bi-check-lg"></i> </span> <span class="text">Confirmed</span> </div>
                        <div class="step active "> <span class="icon"> <i class="bi bi-person-fill"></i> </span> <span class="text">Picked</span> </div>
                        <div class="step"> <span class="icon"> <i class="bi bi-box-fill"></i> </span> <span class="text">Completed</span> </div>
                    </div>
                    <?php
                }
                elseif($order['status'] == 25){
                    ?>
                    <div class="track">
                        <div class="step active "> <span class="icon"> <i class="bi bi-check-lg"></i> </span> <span class="text">Confirmed</span> </div>
                        <div class="step active "> <span class="icon"> <i class="bi bi-person-fill"></i> </span> <span class="text">Picked</span> </div>
                        <div class="step active "> <span class="icon"> <i class="bi bi-box-fill"></i> </span> <span class="text">Completed</span> </div>
                    </div>
                    <?php
                }
                else{
                    ?>
                    <div class="track">
                        <div class="step"> <span class="icon"> <i class="bi bi-check-lg"></i> </span> <span class="text">Confirmed</span> </div>
                        <div class="step"> <span class="icon"> <i class="bi bi-person-fill"></i> </span> <span class="text">Picked</span> </div>
                        <div class="step"> <span class="icon"> <i class="bi bi-box-fill"></i> </span> <span class="text">Completed</span> </div>
                    </div>
                    <?php
                }
                ?>
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
            </div>
            <hr>
            <?php
            }
            ?>
            <div class="d-flex justify-content-between">
                <a href="./products.php"><button><i class="bi bi-chevron-left"></i> Back to orders</button></a>
                <a href="./history.php"><button>Orders History</button></a>
            </div>
        </div>
    </article>
</div>

<?php include './include/script.php'; ?>