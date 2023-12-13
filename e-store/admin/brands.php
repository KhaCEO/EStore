
<?php
include './include/header.php';
include './include/navbar.php';

?>
<div class="p-5">
    <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-products">
                <div class="tm-product-table-container">
                    <table class="table table-hover tm-table-small tm-product-table">
                        <thead>
                            <tr>
                                <th scope="col">BRAND NAME</th>
                                <th scope="col">BRAND IMAGE</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $brands = getAll('brands');
                                foreach( $brands as $brand ){
                                    ?>
                                        <tr>
                                            <td class="tm-product-name"><?= $brand['brand_name'] ?></td>
                                            <td>
                                                <img height="100px" width="100px" src="../uploads/brands/<?= $brand['brand_img'] ?>">
                                            </td>
                                            <td>
                                                <form action="./product-code.php" method="post" class="tm-product-delete-link">
                                                    <button type="submit" value="" name="deleteProduct" class=" border-0 bg-transparent">
                                                    <i class="bi bi-trash-fill text-danger"></i>
                                                    </button>
                                                </form>
                                                <a href="../admin/edit-product.php?id=" class="tm-product-delete-link">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- table container -->
                <a href="../admin/add-brand.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new brands</a>
            </div>
        </div>
</div>
<?php
include './include/footer.php';
?>