<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login.php?error_login=1');
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
    <title>Tambah Data Penilaian Karyawan</title>
    <!-- This page CSS -->
    <!-- Custom CSS -->
    <link href="dist/css/fix-style.css" rel="stylesheet">
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
                <!-- User Profile-->
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
                        <h4 class="text-themecolor">Tambah Data Penilaian Karyawan</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item active">Penilaian Karyawan</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="insert_penilaian.php" enctype="multipart/form-data">
                                    <?php if (!empty($_GET['error_msg'])) : ?>
                                        <div class="alert alert-danger">
                                            <?= $_GET['error_msg']; ?>
                                        </div>
                                    <?php endif ?>
                                    <div class="row col-md-12">
                                        <div class="form-group col-md-6">
                                            <label for="nama">Periode Awal</label>
                                            <input id="periode_awal" type="date" class="form-control" name="periode_awal" placeholder="Periode Awal" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nama">Periode Akhir</label>
                                            <input id="periode_akhir" type="date" class="form-control" name="periode_akhir" placeholder="Periode Akhir" />
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div class="alert alert-info">
                                            <i class="ti-info-alt"></i> Nama Yang Ditampilkan adalah nama karyawan yang belum dinilai...
                                        </div>
                                        <label for="nama">Nama Karyawan</label>
                                        <select required class="form-control" name="id_calon_kr">
                                            <?php foreach ($db->select('*', 'karyawan')->where('id_calon_kr not in (select id_calon_kr from hasil_tpa)')->get() as $val) : ?>
                                                <option value="<?= $val['id_calon_kr'] ?>"><?= $val['nama'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12">
                                        <?php foreach ($db->select('id_kriteria,kriteria', 'kriteria')->get() as $r) : ?>
                                            <div class="form-group col-md-3">
                                                <label><?= $r['kriteria'] ?></label>
                                                <!-- <input type="number" name="place[]" class="form-control"> -->
                                                <select required class="form-control" name="place[]">
                                                    <?php foreach ($db->select('*', 'sub_kriteria')->where('id_kriteria = ' . $r['id_kriteria'] . '')->get() as $val) : ?>
                                                        <option value="<?= $val['id_subkriteria'] ?>"><?= $val['subkriteria'] ?> (Nilai = <?= $val['nilai'] ?>)</option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <a href="data_penilaian.php" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
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
    <!-- DateRangePicker -->
    <!-- <link href="assets/daterangepicker/daterangepicker-bs3.css" rel="stylesheet"></link>
    <script src="assets/daterangepicker/daterangepicker.js"></script> -->
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
    <!-- <script>
        var startDate;
        var endDate;
        $(document).ready(function() {
            $('#periode').daterangepicker({
                    showDropdowns: true,
                    startDate: moment(),
                    endDate: moment(),
                },
                function(start, end) {
                    console.log("Callback has been called!");
                    $('#periode').html(start.format('DD MMMM YYYY') + ' - ' + end.format(
                        'DD MMMM YYYY'));
                    startDate = start;
                    endDate = end;

                }
            );
            $('#periode').html(moment().format('DD MMMM YYYY') + ' - ' + moment()
                .format('DD MMMM YYYY'));

            $('#saveBtn').click(function() {
                //console.log(startDate.format('DD MMMM YYYY') + ' - ' + endDate.format('DD MMMM YYYY'));
                $('#tampil').html(startDate.format('DD MMMM YYYY') + ' - ' + endDate.format(
                    'DD MMMM YYYY'));
            });

        });
    </script> -->
    <script type="text/javascript">
        $(function() {
            $("#sidebarnav >li >a.pk").addClass('active');
        });
    </script>
</body>

</html>