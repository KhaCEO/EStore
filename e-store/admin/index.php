<?php
    session_start();
    include "../functions/function.php";
    if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){ ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="ie=edge" />
            <title>Login Page - Product Admin Template</title>
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700" />
            <link rel="stylesheet" href="./asset/css/fontawesome.min.css" />
            <link rel="stylesheet" href="./asset/css/bootstrap.min.css" />
            <link rel="stylesheet" href="./asset/css/templatemo-style.css">
        </head>

        <body>
            <div class="container tm-mt-big tm-mb-big">
                <div class="row">
                    <div class="col-12 mx-auto tm-login-col">
                        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <h2 class="tm-block-title mb-4">Welcome to Dashboard, Login</h2>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <form action="../middleware/login-code.php" method="post" class="tm-login-form">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input name="email" type="text" class="form-control validate" id="email" required />
                                        </div>
                                        <div class="form-group mt-3">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control validate" id="password" required />
                                        </div>
                                        <div class="form-group mt-4">
                                            <button type="submit" class="btn btn-primary btn-block text-uppercase">
                                                Login
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="./asset/js/jquery-3.3.1.min.js"></script>
            <script src="./asset/js/bootstrap.min.js"></script>
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
        </body>

</html>
    <?php }else{
        header("Location: ../admin/dashboard.php");
    }?>
