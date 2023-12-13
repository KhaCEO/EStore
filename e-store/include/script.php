<!-- script -->
<script src="asset/js/jquery-1.12.4.min.js"></script>
<script src="asset/js/jquery.plugin-countdown.min.js"></script>
<script src="asset/js/jquery-countdown.min.js"></script>
<script src="asset/js/bootstrap.min.js"></script>
<script src="asset/js/owl.carousel.min.js"></script>
<script src="asset/js/magnific-popup.min.js"></script>
<script src="asset/js/isotope.min.js"></script>
<script src="asset/js/jquery.scrollbar.min.js"></script>
<script src="asset/js/jquery-ui.min.js"></script>
<script src="asset/js/mobile-menu.js"></script>
<script src="asset/js/chosen.min.js"></script>
<script src="asset/js/slick.js"></script>
<script src="asset/js/custome.js"></script>
<script src="asset/js/jquery.elevateZoom.min.js"></script>
<script src="asset/js/jquery.actual.min.js"></script>
<script src="asset/js/fancybox/source/jquery.fancybox.js"></script>
<script src="asset/js/lightbox.min.js"></script>
<script src="asset/js/owl.thumbs.min.js"></script>
<script src="asset/js/jquery.scrollbar.min.js"></script>
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyC3nDHy1dARR-Pa_2jjPCjvsOR4bcILYsM'></script>
<script src="asset/js/frontend-plugin.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<?php
    if(isset($_SESSION['status']) && $_SESSION['status'] != ''){
        ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['status']?>",
                    icon: "<?php echo $_SESSION['status_code']?>",
                    button: "OK",
                });
            </script>
        <?php
        unset($_SESSION['status']);
    }
?>
</body>
</html>