<footer class="tm-footer row tm-mt-small">
            <div class="col-12 font-weight-light">
                <p class="text-center text-white mb-0 px-4 small">
                    Copyright &copy; <b>2018</b> All rights reserved
                </p>
            </div>
        </footer>
        
    </div>

    <script src="./asset/js/jquery-3.3.1.min.js"></script>
    <script src="./asset/js/moment.min.js"></script>
    <script src="./asset/js/Chart.min.js"></script>
    <script src="./asset/js/bootstrap.min.js"></script>
    <script src="./asset/js/tooplate-scripts.js"></script>

    <!-- Mutilple Selection -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- alert jd -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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

    <script>
        $(document).ready(function() {
            $('.size-multiple').select2();
            $(".multiple").select2({
                tags: true
            });
        });

        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();                
            });
        })
    </script>
</body>

</html>