<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item <?= $page == "Dashboard" ? 'active' : '' ?>">
            <a class="nav-link" href="?p=Dashboard">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <?php if ($dataPengguna['jabatan'] == "Operator") : ?>
            <li class="nav-item <?= $page == "DataPengguna" ? 'active' : '' ?>">
                <a class="nav-link" href="?p=DataPengguna">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <span class="menu-title">Data Pengguna</span>
                </a>
            </li>
            <li class="nav-item <?= $page == "DataGuru" ? 'active' : '' ?>">
                <a class="nav-link" href="?p=DataGuru">
                    <i class="mdi mdi-account-box-multiple menu-icon"></i>
                    <span class="menu-title">Data Guru</span>
                </a>
            </li>
            <li class="nav-item <?= $page == "DataKriteria" ? 'active' : '' ?>">
                <a class="nav-link" href="?p=DataKriteria">
                    <i class="mdi mdi-database menu-icon"></i>
                    <span class="menu-title">Data Kriteria Penilaian</span>
                </a>
            </li>
            <li class="nav-item <?= ($page == "DataIndikator" or $page == "DataKategori") ? 'active' : '' ?>">
                <a class="nav-link" href="?p=DataIndikator">
                    <i class="mdi mdi-database-search menu-icon"></i>
                    <span class="menu-title">Data Indikator</span>
                </a>
            </li>
            <li class="nav-item <?= $page == "Laporan" ? 'active' : '' ?>">
                <a class="nav-link" href="?p=Laporan">
                    <i class="mdi mdi-file-document menu-icon"></i>
                    <span class="menu-title">Laporan</span>
                </a>
            </li>
        <?php elseif ($dataPengguna['jabatan'] == "Kepala") : ?>
            <li class="nav-item <?= $page == "DataGuru" ? 'active' : '' ?>">
                <a class="nav-link" href="?p=DataGuru">
                    <i class="mdi mdi-account-box-multiple menu-icon"></i>
                    <span class="menu-title">Data Guru</span>
                </a>
            </li>
            <li class="nav-item <?= ($page == "PenilaianGuru" or $page == "Nilai") ? 'active' : '' ?>">
                <a class="nav-link" href="?p=PenilaianGuru">
                    <i class="mdi mdi-account-multiple-plus menu-icon"></i>
                    <span class="menu-title">Penilaian Guru</span>
                </a>
            </li>
            <li class="nav-item <?= $page == "Laporan" ? 'active' : '' ?>">
                <a class="nav-link" href="?p=Laporan">
                    <i class="mdi mdi-file-document menu-icon"></i>
                    <span class="menu-title">Laporan</span>
                </a>
            </li>
        <?php elseif ($dataPengguna['jabatan'] == "Guru") : ?>
            <li class="nav-item <?= $page == "Evaluasi" ? 'active' : '' ?>">
                <a class="nav-link" href="?p=Evaluasi">
                    <i class="mdi mdi-chart-histogram menu-icon"></i>
                    <span class="menu-title">Evaluasi</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>