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
    <title>Ubah Data Karyawan</title>
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
                        <h4 class="text-themecolor">Ubah Data Karyawan</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Master Data</a></li>
                                <li class="breadcrumb-item active">Data Karyawan</li>
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
                                <form class="form pt-3" method="post" action="update_karyawan.php" enctype="multipart/form-data">
                                    <?php if (!empty($_GET['error_msg'])) : ?>
                                        <div class="alert alert-danger">
                                            <?= $_GET['error_msg']; ?>
                                        </div>
                                    <?php endif ?>
                                    <?php foreach ($db->select('*', 'karyawan')->where('id_calon_kr=' . $_GET['id'])->get() as $val) : ?>
                                        <input type="hidden" name="id_calon_kr" value="<?= $val['id_calon_kr'] ?>">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon11"><i class="ti-id-badge"></i></span>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" name="nik" maxlength="16" class="form-control" style="width: 24.2cm;" value="<?= $val['NIK'] ?>" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Tidak boleh huruf, hanya boleh angka!" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Karyawan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon22"><i class="ti-user"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $val['nama'] ?>" aria-label="Nama Karyawan" aria-describedby="basic-addon22"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon33"><i class="ti-star"></i></span>
                                                </div>
                                                <select required class="form-control" ID="jeniskelamin" name="jeniskelamin">
                                                    <option value="">-Pilih-</option>
                                                    <option <?php if ($val['jeniskelamin'] == 'Pria') {
                                                                echo "selected";
                                                            } ?> value="Pria">Pria</option>
                                                    <option <?php if ($val['jeniskelamin'] == 'Wanita') {
                                                                echo "selected";
                                                            } ?> value="Wanita">Wanita</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon44"><i class="ti-location-pin"></i></span>
                                                </div>
                                                <textarea type="text" class="form-control" id="alamat" name="alamat" aria-label="Alamat" aria-describedby="basic-addon44"><?= $val['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Telepon</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon55"><i class="ti-mobile"></i></span>
                                                </div>
                                                <div class="controls">
                                                    <input type="text" name="telepon" maxlength="13" class="form-control" style="width: 24.2cm;" value="<?= $val['telepon'] ?>" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="Tidak boleh huruf, hanya boleh angka!">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Lahir</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon66"><i class="ti-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $val['ttl'] ?>" aria-label="Tanggal Lahir" aria-describedby="basic-addon66"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Lahir</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon77"><i class="ti-location-pin"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="tempatlahir" name="tempatlahir" value="<?= $val['TempatLahir'] ?>" aria-label="Tempat Lahir" aria-describedby="basic-addon77"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pendidikan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon99"><i class="ti-medall-alt"></i></span>
                                                </div>
                                                <select required class="form-control" ID="pendidikan" name="pendidikan">
                                                    <option value="">-Pilih-</option>
                                                    <option <?php if ($val['PendidikanTerakhir'] == 'SD') {
                                                                echo "selected";
                                                            } ?> value="SD">SD</option>
                                                    <option <?php if ($val['PendidikanTerakhir'] == 'SMA') {
                                                                echo "selected";
                                                            } ?> value="SMA">SMA</option>
                                                    <option <?php if ($val['PendidikanTerakhir'] == 'D3') {
                                                                echo "selected";
                                                            } ?> value="D3">D3</option>
                                                    <option <?php if ($val['PendidikanTerakhir'] == 'S1') {
                                                                echo "selected";
                                                            } ?> value="S1">S1</option>
                                                    <option <?php if ($val['PendidikanTerakhir'] == 'S2') {
                                                                echo "selected";
                                                            } ?> value="S2">S2</option>
                                                    <option <?php if ($val['PendidikanTerakhir'] == 'S3') {
                                                                echo "selected";
                                                            } ?> value="S3">S3</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon99"><i class="ti-medall"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $val['Jabatan'] ?>" aria-label="Jabatan" aria-describedby="basic-addon99"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Bergabung</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon99"><i class="ti-calendar"></i></span>
                                                </div>
                                                <input type="date" class="form-control" id="ttb" name="ttb" value="<?= $val['TglBergabung'] ?>" aria-label="Tanggal Bergabung" aria-describedby="basic-addon99"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Keahlian</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon99"><i class="ti-cup"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="skill" name="skill" value="<?= $val['skill'] ?>" aria-label="Keahlian" aria-describedby="basic-addon99"></input>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pengalaman</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon99"><i class="ti-briefcase"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="pengalaman" name="pengalaman" <?= $val['pengalaman'] ?> aria-label="Keahlian" aria-describedby="basic-addon99"></input>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                                        <a href="data_karyawan.php" class="btn btn-danger">Cancel</a>
                                    <?php endforeach ?>
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
    <script src="dist/js/pages/validation.js"></script>
    <!--stickey kit -->
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
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
    <script type="text/javascript">
        $(function() {
            $("#ck").addClass('menu-top-active');
        });
    </script>
    <script>
        ! function(window, document, $) {
            "use strict";
            $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);
    </script>
</body>

</html>