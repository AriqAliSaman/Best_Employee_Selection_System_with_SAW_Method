<!-- Sidebar navigation-->
    <div class="user-profile">
        <div class="user-pro-body">
            <div><img src="assets/images/users/avatar1.png" alt="user-img"></div>
            <div class="dropdown">
                <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['nama'] ?><span class="caret"></span></a>
                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    <!-- <a href="javascript:void(0)" class="dropdown-item"><i class="ti-user"></i> My
                        Profile</a> -->
                    <a href="login_page.php" class="dropdown-item"><i class=" ti-power-off"></i>
                        Logout</a>
                    <!-- text-->
                </div>
            </div>
        </div>
    </div>
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li>
                <a href="index.php" id="home" aria-expanded="false">
                    <i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="icon-screen-desktop"></i><span class="hide-menu">Master Data</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="data_admin.php" id="adm">Data Admin</a></li>
                    <li><a href="data_kriteria.php" id="kri">Data Kriteria</a></li>
                    <li><a href="data_subkriteria.php" id="skr">Data Sub Kriteria</a></li>
                    <li><a href="data_karyawan.php" id="kar">Data Karyawan</a></li>
                </ul>
            </li>
            <li>
                <a href="data_penilaian.php" id="pk" aria-expanded="false">
                    <i class="icon-note"></i><span class="hide-menu">Penilaian Karyawan</span>
                </a>
            </li>
            <li>
                <a href="proses_spk.php" id="pspk" aria-expanded="false">
                    <i class="icon-pie-chart"></i><span class="hide-menu">Proses SPK</span>
                </a>
            </li>
            <li> <a class="has-arrow2 waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                    <i class="icon-chart"></i><span class="hide-menu">Laporan</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="laporan_admin.php" id="ladm">Laporan Admin</a></li>
                    <li><a href="laporan_kriteria.php" id="lkri">Laporan Kriteria</a></li>
                    <li><a href="laporan_subkriteria.php" id="lskr">Laporan Sub Kriteria</a></li>
                    <li><a href="laporan_karyawan.php" id="lka">Laporan Karyawan</a></li>
                    <li><a href="laporan_penilaian.php" id="lp">Laporan Penilaian</a></li>
                </ul>
            </li>
        </ul>
    </nav>
<!-- End Sidebar navigation -->