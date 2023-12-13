<?php 
    include './include/header.php';
    include './include/navbar.php';

?>
<div class="container tm-mt-big tm-mb-big">
    <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                <div class="row">
                    <div class="col-12">
                        <h2 class="tm-block-title d-inline-block">Add Product</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="./product-code.php" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="product_Name">Product Name
                                </label>
                                <input id="name" name="product_Name" type="text" class="form-control validate" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="productDetail">Detail</label>
                                <textarea class="form-control validate" name="productDetail" rows="2" required></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category">Category</label>
                                    <select class="custom-select tm-select-accounts" name="category_ID" id="category">
                                        <option selected>Select category</option>
                                            <?php 
                                                $category = getAll('category');
                                                foreach($category as $item){
                                                    ?>
                                                        <option value="<?= $item['id'] ?>"><?= $item['category_Name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                    </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category">Brands</label>
                                    <select class="custom-select tm-select-accounts" name="brand_id" id="brands">
                                        <option selected>Select Brands</option>
                                            <?php 
                                                $brands = getAll('brands');
                                                foreach($brands as $item){
                                                    ?>
                                                        <option value="<?= $item['id'] ?>"><?= $item['brand_name'] ?></option>
                                                    <?php
                                                }
                                            ?>
                                    </select>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="product_Price">Price
                                    </label>
                                    <input id="product_Price" name="product_Price" type="text" class="form-control validate" data-large-mode="true" />
                                </div>
                                <div class="form-group mb-3 col-xs-12 col-sm-6">
                                    <label for="stock">Units In Stock
                                    </label>
                                    <input id="product_Stock" name="product_Stock" type="text" class="form-control validate" required />
                                </div>
                                    <select class="size-multiple form-control" name="size[]" multiple="multiple">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                        <option value="XXL">XXL</option>
                                        <option value="XXXL">XXXL</option>
                                    </select>
                                    <select class="form-control multiple" name="color[]" multiple="multiple">

                                    </select>
                            </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto">
                            <i class="fas fa-cloud-upload-alt tm-upload-icon" name="product_Img" onclick="document.getElementById('fileInput').click();"></i>
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput" type="file" name="product_Img" style="display:none;" />
                            <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" onclick="document.getElementById('fileInput').click();" />
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="custom-file mt-3 mb-3">
                            <input type="file" name="image[]" id="" multiple>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="saveProduct" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    include './include/footer.php';
?>