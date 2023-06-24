<?php
session_start();
error_reporting(0);
if (empty($_SESSION['id'])) {
    header('location:login_page.php?error_login=1');
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
    <title>Proses SPK</title>
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
                        <h4 class="text-themecolor">Proses SPK</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                                <li class="breadcrumb-item active">Proses SPK</li>
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
                                    <h4><b>Tabel Hasil Penilaian</b></h4>
                                    <table id="example2" class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Karyawan</th>
                                                <?php foreach ($db->select('kriteria', 'kriteria')->get() as $k) : ?>
                                                    <th>
                                                        <?php
                                                        $tmp = explode('_', $k['kriteria']);
                                                        echo ucwords(implode(' ', $tmp));
                                                        ?>
                                                    </th>
                                                <?php endforeach ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($db->select('karyawan.nama,hasil_tpa.*', 'karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data) :
                                            ?>
                                                <tr>
                                                    <td><?= $data['nama'] ?></td>
                                                    <?php foreach ($db->select('kriteria', 'kriteria')->get() as $td) : ?>
                                                        <td><?= $db->getnilaisubkriteria($data[$td['kriteria']]) ?></td>
                                                    <?php endforeach ?>
                                                </tr>
                                            <?php
                                            endforeach;
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <button id=" sk" class="btn btn-info m-t-20" style="margin-left: 10cm;" onclick="tpl()"><i class="ti-check-box"></i> Proses</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="proses_spk" style="display: none;">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h4><b>Normalisasi</b></h4>
                                        <table id="example2" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama Karyawan</th>
                                                    <?php foreach ($db->select('kriteria', 'kriteria')->get() as $k) : ?>
                                                        <th>
                                                            <?php
                                                            $tmp = explode('_', $k['kriteria']);
                                                            echo ucwords(implode(' ', $tmp));
                                                            ?>
                                                        </th>
                                                    <?php endforeach ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($db->select('karyawan.nama,hasil_tpa.*', 'karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data) :
                                                ?>
                                                    <tr>
                                                        <td><?= $data['nama'] ?></td>
                                                        <?php foreach ($db->select('kriteria', 'kriteria')->get() as $td) : ?>
                                                            <td><?= number_format($db->rumus($db->getnilaisubkriteria($data[$td['kriteria']]), $td['kriteria']), 2); ?></td>
                                                        <?php endforeach ?>
                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h4><b>Proses Penentuan</b></h4>
                                        <table id="example3" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Nama </th>
                                                    <th>Hasil</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($db->select('karyawan.id_calon_kr,karyawan.nama,hasil_tpa.*', 'karyawan,hasil_tpa')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr')->get() as $data) :
                                                ?>
                                                    <tr>
                                                        <td><?= $data['nama'] ?></td>
                                                        <td>
                                                            <?php
                                                            $hasil = [];
                                                            $bulan = date('m');
                                                            $tahun = date('Y');
                                                            $tanggal = date('Y-m-d');

                                                            $minggu = $db->weekOfMonth($tanggal);

                                                            foreach ($db->select('kriteria', 'kriteria')->get() as $dt) {
                                                                array_push($hasil, $db->rumus($db->getnilaisubkriteria($data[$dt['kriteria']]), $dt['kriteria']) * $db->bobot($dt['kriteria']));
                                                            }
                                                            echo $h = number_format(array_sum($hasil), 2);
                                                            if ($db->select('id_calon_kr', 'hasil_spk')->where("id_calon_kr='$data[id_calon_kr]' and minggu='$minggu' and bulan='$bulan' and tahun='$tahun'")->count() == 0) {
                                                                $db->insert('hasil_spk', "'','$data[id_calon_kr]','$h','$minggu','$bulan','$tahun'")->count();
                                                            } else {
                                                                $db->update('hasil_spk', "hasil_spk='$h',minggu='$minggu',bulan='$bulan',tahun='$tahun'")->where("id_calon_kr='$data[id_calon_kr]' and minggu='$minggu' and bulan='$bulan' and tahun='$tahun'")->count();
                                                            }

                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <h4><b>Perangkingan</b></h4>
                                        <table id="example4" class="table table-bordered table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Hasil </th>
                                                    <?php $no = 1;
                                                    foreach ($db->select('kriteria', 'kriteria')->get() as $th) : ?>
                                                        <th>K<?= $no ?></th>
                                                    <?php $no++;
                                                    endforeach ?>
                                                    <th rowspan="2" style="padding-bottom:25px">Hasil</th>
                                                    <th rowspan="2" style="padding-bottom:25px">Ranking</th>
                                                </tr>
                                                <tr>
                                                    <th>Bobot </th>
                                                    <?php foreach ($db->select('bobot', 'kriteria')->get() as $th) : ?>
                                                        <th><?= $th['bobot'] ?></th>
                                                    <?php endforeach ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $bulan = date('m');
                                                $tahun = date('Y');
                                                $tanggal = date('Y-m-d');

                                                $minggu = $db->weekOfMonth($tanggal);
                                                foreach ($db->select('distinct(karyawan.nama),hasil_tpa.*,hasil_spk.*', 'karyawan,hasil_tpa,hasil_spk')->where('karyawan.id_calon_kr=hasil_tpa.id_calon_kr and karyawan.id_calon_kr=hasil_spk.id_calon_kr and hasil_spk.minggu=' . $minggu . ' and hasil_spk.bulan=' . $bulan . ' and hasil_spk.tahun=' . $tahun . '')->order_by('hasil_spk.hasil_spk', 'desc')->get() as $data) :
                                                ?>
                                                    <tr>
                                                        <td><?= $data['nama'] ?></td>
                                                        <?php foreach ($db->select('kriteria', 'kriteria')->get() as $td) : ?>
                                                            <td><?= number_format($db->rumus($db->getnilaisubkriteria($data[$td['kriteria']]), $td['kriteria']), 2); ?></td>
                                                        <?php endforeach ?>
                                                        <td>
                                                            <?php
                                                            $hasil = [];
                                                            foreach ($db->select('kriteria', 'kriteria')->get() as $dt) {
                                                                array_push($hasil, $db->rumus($db->getnilaisubkriteria($data[$dt['kriteria']]), $dt['kriteria']) * $db->bobot($dt['kriteria']));
                                                            }
                                                            echo $r = number_format(array_sum($hasil), 2);
                                                            ?>
                                                        </td>
                                                        <td>
                                                            <?= $no ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    $no++;
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
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
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span>
                        </div>
                        <div class="r-panel-body">
                            <ul id="themecolors" class="m-t-20">
                                <li><b>With Light sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default" class="default-theme working">1</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green" class="green-theme">2</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red" class="red-theme">3</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue" class="blue-theme">4</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple" class="purple-theme">5</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna" class="megna-theme">6</a></li>
                                <li class="d-block m-t-30"><b>With Dark sidebar</b></li>
                                <li><a href="javascript:void(0)" data-skin="skin-default-dark" class="default-dark-theme ">7</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-green-dark" class="green-dark-theme">8</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-red-dark" class="red-dark-theme">9</a>
                                </li>
                                <li><a href="javascript:void(0)" data-skin="skin-blue-dark" class="blue-dark-theme">10</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-purple-dark" class="purple-dark-theme">11</a></li>
                                <li><a href="javascript:void(0)" data-skin="skin-megna-dark" class="megna-dark-theme ">12</a></li>
                            </ul>
                        </div>
                    </div>
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
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
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
            $("#proses").addClass('menu-top-active');
            // $.ajax({
            //     url:'truncate_tpa.php',
            //     success:function(data){
            //         //alert(data);

            //     }
            // });
        });

        function tpl() {
            Swal.fire({
                position: 'center',
                type: 'success',
                title: 'Proses SPK Berhasil!',
                showConfirmButton: true,
                timer: 3000
            }).then((result) => {
                $("#proses_spk").show();
            })
        }
    </script>
</body>

</html>