<!-- silder -->
<?php
if (!isset($_GET['q'])) {
?>
    <div class="home-slider style1 rows-space-30">
        <div class="container">
            <div class="slider-owl owl-slick equal-container nav-center" data-slick='{"autoplay":true, "autoplaySpeed":9000, "arrows":true, "dots":false, "infinite":true, "speed":1000, "rows":1}' data-responsive='[{"breakpoint":"2000","settings":{"slidesToShow":1}}]'>
                <?php
                $Slider = getSlider('slider', 2);
                foreach ($Slider as $banner) {
                ?>
                    <div class="slider-item">
                        <div class="slider-inner equal-element" style="background-image: url(./uploads/silder/<?= $banner['slider_img'] ?>); width:100%">
                            <div class="slider-infor">
                                <h5 class="title-small">
                                    <?= $banner['slider_tilte'] ?>
                                </h5>
                                <h3 class="title-big">
                                    <?= $banner['slider_detail'] ?>
                                </h3>
                                <a href="./products.php" class="button btn-shop-the-look bgroud-style">Shop now</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
<?php
}

?>