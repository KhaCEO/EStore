
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
                                <th scope="col">PRODUCT NAME</th>
                                <th scope="col">IMAGE</th>
                                <th scope="col">CATEGORY</th>
                                <th scope="col">PRICE</th>
                                <th scope="col">STOCK</th>
                                <th scope="col">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = "SELECT products.*, category.category_Name FROM products, category 
                                    WHERE products.category_ID = category.id;";
                            $productsRun = mysqli_query($conn, $products);
                            foreach ($productsRun as $product) {
                            ?>
                                <tr>
                                    <td class="tm-product-name"><?= $product['product_Name'] ?></td>
                                    <td>
                                        <img height="100px" width="100px" src="../uploads/<?= $product['product_Img'] ?>">
                                    </td>
                                    <td><?= $product['category_Name'] ?></td>
                                    <td>$<?= $product['product_Price'] ?></td>
                                    <td><?= $product['product_Stock'] ?></td>
                                    <td>
                                        <form action="./product-code.php" method="post" class="tm-product-delete-link">
                                            <button type="submit" value="<?= $product['id'] ?>" name="deleteProduct" class=" border-0 bg-transparent">
                                            <i class="bi bi-trash-fill text-danger"></i>
                                            </button>
                                        </form>
                                        <a href="../admin/edit-product.php?id=<?= $product['id'] ?>" class="tm-product-delete-link">
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
                <a href="../admin/add-product.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
            </div>
        </div>

        <!-- category -->
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
                <h2 class="tm-block-title">Product Categories</h2>
                <div class="tm-product-table-container">
                    <table class="table tm-table-small tm-product-table">
                        <tbody>
                            <?php
                            $category = getAll('category');
                            foreach ($category as $item) {
                            ?>
                                <tr>
                                    <td class="tm-product-name"><?= $item['category_Name'] ?></td>
                                    <td class="text-center">
                                        <a href="#" class="tm-product-delete-link">
                                            <i class="bi bi-trash-fill"></i>
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
                <div class="row mt-2">
                    <div class="col-12">
                        <form action="./product-code.php" method="post" class="tm-login-form">
                            <div class="form-group">
                                <input name="category_Name" type="text" class="form-control validate" id="category_Name" placeholder="Category Name" required />
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" name="saveCategory" class="btn btn-primary btn-block text-uppercase">
                                Add new category
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- slider -->
        <?php include './slider.php';?>
    </div>
</div>
<?php
include './include/footer.php';
?>