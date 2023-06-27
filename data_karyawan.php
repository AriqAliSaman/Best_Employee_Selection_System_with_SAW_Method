<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login.php?error_login=1');
}
function hitung_lama_bergabung($tgl_lahir)
{
    $today = date('Y-m-d');
    $now = time();
    list($thn, $bln, $tgl) = explode('-', $tgl_lahir);
    $time_lahir = mktime(0, 0, 0, $bln, $tgl, $thn);

    $selisih = $now - $time_lahir;

    $tahun = floor($selisih / (60 * 60 * 24 * 365));
    $bulan = round(($selisih % (60 * 60 * 24 * 365)) / (60 * 60 * 24 * 30));

    return $tahun . ' tahun ' . $bulan . ' bulan';
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
    <title>Data Karyawan</title>
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- Custom CSS -->
    <link href="dist/css/fix-style.css" rel="stylesheet">
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
                        <h4 class="text-themecolor">Data Karyawan</h4>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12">
                        <?php if (!empty($_GET['error_msg'])) : ?>
                            <div class="alert alert-danger">
                                <?= $_GET['error_msg']; ?>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div><a href="input_karyawan.php" id="ck" class="btn btn-info"><i class="ti-plus"></i> Tambah Data</a></div>
                                    <table id="myTable" class="table table-bordered table-striped" style="width:max-content;">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>Telepon</th>
                                                <th>Tempat lahir</th>
                                                <th>Tanggal lahir</th>
                                                <th>Pendidikan</th>
                                                <th>Jabatan</th>
                                                <th>Tanggal Bergabung</th>
                                                <th>Lama Bergabung</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($db->select('*', 'karyawan')->get() as $data) : ?>
                                                <tr>
                                                    <td><?= $data['NIK']; ?></td>
                                                    <td><?= $data['nama'] ?></td>
                                                    <td><?= $data['jeniskelamin'] ?></td>
                                                    <td><?= $data['alamat'] ?></td>
                                                    <td><?= $data['telepon'] ?></td>
                                                    <td><?= $data['TempatLahir'] ?></td>
                                                    <td><?= $data['ttl'] ?></td>
                                                    <td><?= $data['PendidikanTerakhir'] ?></td>
                                                    <td><?= $data['Jabatan'] ?></td>
                                                    <td><?= $data['TglBergabung'] ?></td>
                                                    <td><?php echo hitung_lama_bergabung($data['TglBergabung']) ?>
                                                    <td>
                                                        <a class="btn btn-warning" href="edit_karyawan.php?id=<?php echo $data[0] ?>">Ubah</a>
                                                        <a class="btn btn-danger img-fluid model_img text-white hapus" data-id="<?php echo $data[0] ?>">Hapus</a>
                                                    </td>
                                                </tr>
                                            <?php $no++;
                                            endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
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
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- This is data table -->
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        // Alert Berhasil Tambah Data
        let success_create_param = "<?= $_GET['success_create']; ?>";
        if (success_create_param == '1') {
            Swal.fire(
                'Berhasil!',
                'Data berhasil ditambahkan',
                'success'
            ).then((result) => {
                window.history.replaceState(null, '', window.location.pathname);
            });
        } else if (success_create_param == '0') {
            Swal.fire(
                'Gagal!',
                'Data gagal ditambahkan',
                'error'
            ).then((result) => {
                window.history.replaceState(null, '', window.location.pathname);
            });
        }
        // Alert Berhasil Tambah Data

        // Alert Berhasil Ubah Data
        let success_edit_param = "<?= $_GET['success_edit']; ?>";
        if (success_edit_param == '1') {
            Swal.fire(
                'Berhasil!',
                'Data berhasil diubah',
                'success'
            ).then((result) => {
                window.history.replaceState(null, '', window.location.pathname);
            });
        } else if (success_edit_param == '0') {
            Swal.fire(
                'Gagal!',
                'Data gagal diubah',
                'error'
            ).then((result) => {
                window.history.replaceState(null, '', window.location.pathname);
            });
        }
        // Alert Berhasil Ubah Data

        // Alert Berhasil Hapus Data
        let success_delete_param = "<?= $_GET['success_delete']; ?>";
        if (success_delete_param == '1') {
            Swal.fire(
                'Berhasil!',
                'Data berhasil dihapus',
                'success'
            ).then((result) => {
                window.history.replaceState(null, '', window.location.pathname);
            });
        } else if (success_delete_param == '0') {
            Swal.fire(
                'Gagal!',
                'Data gagal dihapus',
                'error'
            ).then((result) => {
                window.history.replaceState(null, '', window.location.pathname);
            });
        }
        // Alert Berhasil Hapus Data

        //! Alert Confirm
        ! function($) {

            var SweetAlert = function() {};

            SweetAlert.prototype.init = function() {
                //Confirm Message
                $("table tbody").on('click', '.hapus', function(e) {
                    let id = $(this).data("id");
                    Swal.fire({
                        title: 'Hapus data ini?',
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: "#00C295",
                        confirmButtonText: "Hapus",
                        closeOnConfirm: false,
                        cancelButtonColor: "#DD6B55",
                        cancelButtonText: "Batal"
                    }).then((result) => {
                        if (result.value) {
                            location.href = 'delete_karyawan.php?id= ' + id;
                        }
                    })
                });
            }
            $.SweetAlert = new SweetAlert, $.SweetAlert.Constructor = SweetAlert
        }(window.jQuery),

        //initializing 
        function($) {
            "use strict";
            $.SweetAlert.init()
        }(window.jQuery);
        //! Alert Confirm

        // <!-- ======================================================= -->
        $(function() {
            $('#myTable').DataTable();
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
            // responsive table
            $('#config-table').DataTable({
                responsive: true
            });
            $('#example23').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $('#example1').dataTable();
        });
    </script>
</body>

</html>