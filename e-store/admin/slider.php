<div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
    <div class="tm-bg-primary-dark tm-block tm-block-products">
        <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                    <tr>
                        <th scope="col">IMAGE</th>
                        <th scope="col">TITLE</th>
                        <th scope="col">DETAIL</th>
                        <th scope="col">&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $Slider = getAll('slider');
                        foreach($Slider as $banner){
                            ?>
                                <tr>
                                    <td>
                                        <img width="100%" src="../uploads/silder/<?= $banner['slider_img'] ?>">
                                    </td>
                                    <td><?= $banner['slider_tilte'] ?></td>
                                    <td><?= $banner['slider_detail'] ?></td>
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
        <a href="../admin/add-slider.php" class="btn btn-primary btn-block text-uppercase mb-3">Add new Slide banner</a>
    </div>
</div>