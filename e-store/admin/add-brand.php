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
                        <h2 class="tm-block-title d-inline-block">Add Brands</h2>
                    </div>
                </div>
                <div class="row tm-edit-product-row">
                    <div class="col-xl-6 col-lg-6 col-md-12">
                        <form action="./product-code.php" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label for="brand_name">Brand Name
                                </label>
                                <input id="name" name="brand_name" type="text" class="form-control validate" required />
                            </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                        <div class="tm-product-img-dummy mx-auto">
                            <i class="fas fa-cloud-upload-alt tm-upload-icon" name="slider_img" onclick="document.getElementById('fileInput').click();"></i>
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <input id="fileInput" type="file" name="brand_img" style="display:none;" />
                            <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD BRAND" onclick="document.getElementById('fileInput').click();" />
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="saveBrand" class="btn btn-primary btn-block text-uppercase">Add Brands Now</button>
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