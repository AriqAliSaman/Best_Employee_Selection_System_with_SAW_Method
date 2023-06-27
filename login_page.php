<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo_mnm.png">
    <title>Sistem Penunjang Keputusan Karyawan Terbaik PT Mahakarya Nuansa Mandiri | Login</title>

    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/fix-style.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include 'layouts/loader.php' ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php
    session_start();
    error_reporting(0);
    include 'db/db_config.php';
    ?>
    <section id="wrapper">
        <div class="video-background">
            <video id="bg_video" style="position:fixed; right: 0; top: 0; min-width:100%; z-index: -100; object-fit: cover;" class="video" autoplay loop muted>
                <source src="assets/images/video/Looping_Background_New.mp4" type="video/mp4">
            </video>
            <!-- <div class="login-register" style="background-image:url(assets/images/background/login-register.jpg);"> -->
            <br><br><br>
            <div class="login-box card m-t-40" style="background:rgba(0.5, 0.5, 0.5, 0.5); border-radius: 10px;">
                <div class="card-body">
                    <a href="javascript:void(0)" class="db"><img src="assets/images/logo_mnm.png" alt="Home" /><img src="assets/images/text_mnm.png" alt="Home" /></a>
                    <?php if ($_GET['error_login'] == 1) : ?>
                        <div class="alert alert-danger m-t-10">
                            Username atau Password Anda salah!
                        </div>
                    <?php endif ?>
                    <form class="form-horizontal form-material" id="loginform" method="post" action="proses.php">
                        <h3 class="text-center text-white m-b-20 m-t-20">Log In</h3>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control text-white" type="text" name="username" required placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control text-white" type="password" name="password" required placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button type="submit" class="btn btn-block btn-lg btn-info btn-rounded"><span class="glyphicon glyphicon-user"></span> &nbsp;Log In</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- </div> -->
        </div>
    </section>

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });

        (function() {
            /**
             * Video element
             * @type {HTMLElement}
             */
            var video = document.getElementById("bg_video");

            /**
             * Check if video can play, and play it
             */
            video.addEventListener("canplay", function() {
                video.play();
            });
        })();
    </script>
    </script>

</body>

</html>