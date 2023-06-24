<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login_page.php');
}
?>
<?php include 'db/db_config.php'; ?>

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
    <title>Dashboard</title>
    <!-- This page CSS -->
    <!-- Custom CSS -->
    <link href="dist/css/fix-style.css" rel="stylesheet">
    <!-- page css -->
    <link href="dist/css/pages/icon-page.css" rel="stylesheet">
    <!-- This page CSS -->
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="assets/node_modules/c3-master/c3.min.css" rel="stylesheet">
    <link href="dist/css/pages/dashboard1.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php include 'layouts/loader.php' ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include 'layouts/header.php' ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <?php include 'layouts/sidebar.php' ?>
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- col 1-->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-info" style="border-radius: 10px;">
                            <div class="card-body">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item flex-column active">
                                            <div class="d-flex no-block al m-r-15ign-items-center">
                                                <i class="icon-screen-desktop fa-2x mr-3" title="Admin"></i>
                                                <div class="m-t-1">
                                                    <h5 class="text-white font-medium">Total Admin</h5>
                                                    <h6 class="text-white"><?php echo $db->totaladmin() ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left"><a href="data_admin.php" id="AD" style="color: white;">View Details</a></span>
                                            <span class="text-right"><i class="ti-arrow-right" style="color: black;"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col 1-->
                    <!-- col 2-->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-danger" style="border-radius: 10px;">
                            <div class="card-body">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item flex-column active">
                                            <div class="d-flex no-block al m-r-15ign-items-center">
                                                <i class="icon-doc fa-2x mr-3" title="Kriteria"></i>
                                                <div class="m-t-1">
                                                    <h5 class="text-white font-medium">Total Kriteria</h5>
                                                    <h6 class="text-white"><?php echo $db->totalkriteria() ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left"><a href="data_kriteria.php" id="ds" style="color: white;">View Details</a></span>
                                            <span class="pull-right"><i class="ti-arrow-right" style="color: black;"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col 2-->
                    <!-- col 3-->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-warning" style="border-radius: 10px;">
                            <div class="card-body">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item flex-column active">
                                            <div class="d-flex no-block al m-r-15ign-items-center">
                                                <i class="icon-docs fa-2x mr-3" title="SubKriteria"></i>
                                                <div class="m-t-1">
                                                    <h5 class="text-white font-medium">Total Sub Kriteria</h5>
                                                    <h6 class="text-white"><?php echo $db->totalsubkriteria() ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left"><a href="data_subkriteria.php" id="sk" style="color: white;">View Details</span>
                                            <span class="pull-right ms-30"><i class="ti-arrow-right" style="color: black;"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- col 3-->
                    <!-- col 4-->
                    <div class="col-lg-3 col-md-6">
                        <div class="card bg-success" style="border-radius: 10px;">
                            <div class="card-body">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item flex-column active">
                                            <div class="d-flex no-block al m-r-15ign-items-center">
                                                <i class="icon-people fa-2x mr-3" title="Karyawan"></i>
                                                <div class="m-t-1">
                                                    <h5 class="text-white font-medium">Total Karyawan</h5>
                                                    <h6 class="text-white"><?php echo $db->totalkaryawan() ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#">
                                        <div class="panel-footer">
                                            <span class="pull-left"><a href="data_karyawan.php" id="ck" style="color: white">View Details</a></span>
                                            <span class="pull-right"><i class="ti-arrow-right" style="color: black;"></i></span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-6">
                    <div class="alert alert-success">
                        <strong> Cari Karyawan</strong>
                        <form method="get" action="cari_karyawan.php">
                            <div class="input-group">
                                <input type="text" class="form-control" name="nama" placeholder="Search">
                                <div class="input-group-btn">
                                  <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                  </button>
                                </div>
                              </div>
                        </form>
                    </div>
                </div> -->
                    <!-- col 4-->
                </div>
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                   <?php include 'layouts/custom_style.php' ?>
                </div>
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php include 'layouts/footer.php' ?>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap popper Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
    <!-- Popup message jquery -->
    <script src="assets/node_modules/d3/d3.min.js"></script>
    <script src="assets/node_modules/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="dist/js/dashboard1.js"></script>
    <!-- datatable -->
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- Tickers -->
    <script src="dist/js/jquery.webticker.min.js"></script>
    <script src="dist/js/fastclick.js"></script>
    <script src="dist/js/web-ticker.js"></script>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function() {
            $('#cc-table').DataTable({
                "displayLength": 10
            });
            $("#live").perfectScrollbar();
            $("#task1").perfectScrollbar();
            $("#task2").perfectScrollbar();
            $("#task3").perfectScrollbar();
        });
    </script>
</body>

</html>