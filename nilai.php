<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Controller -->
    <?php include 'app/controller/dashboard/nilai.php' ?>
    <!-- \Controller -->

    <div class="container-scroller">
        <!-- Nav -->
        <?php include 'app/view/layout/nav.php' ?>
        <!-- \Nav -->

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <?php include 'app/view/layout/sidebar.php' ?>
            <!-- \Sidebar -->

            <!-- Main -->
            <div class="main-panel">
                <!-- Content -->
                <div class="content-wrapper">
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h2 class="font-weight-bold">
                                Penilaian Guru <?= $dataGuru['nama_pengguna'] ?>
                            </h2>
                        </div>
                    </div>
                    <?php if (isset($_POST['cek'])) : ?>
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex justify-content-between ">
                                            <h4 class="font-weight-bolder">(<?= $kode_kriteria ?>) <?= $dataKriteria['nama_kriteria'] ?> </h4>
                                            <a href="?p=Nilai&id=<?= $id_guru ?>" class="btn btn-secondary">Kembali</a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" class="needs-validation" novalidate>
                                            <input type="hidden" name="id_kriteria" value="<?= $dataKriteria['id_kriteria'] ?>">
                                            <input type="hidden" name="kode_kriteria" value="<?= $dataKriteria['kode_kriteria'] ?>">
                                            <div class="row mb-3">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-check-label">Semester</label>
                                                    <input type="text" class="form-control" name="semester" value="<?= $semester ?>" readonly>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-check-label">Periode</label>
                                                    <input type="text" class="form-control" name="periode" value="<?= $periode ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="row mb-4">
                                                <?php foreach ($queryIndikator as $rowi) : ?>
                                                    <?php $queryKategori = $crud->read(
                                                        "kategori",
                                                        "WHERE id_indikator = '$rowi[id_indikator]'"
                                                    ) ?>
                                                    <?php $queryCekNilai = $crud->read(
                                                        "penilaian",
                                                        "WHERE 
                                                             id_pengguna = '$id_guru' AND 
                                                             id_kriteria = '$dataKriteria[id_kriteria]' AND
                                                             id_indikator = '$rowi[id_indikator]' AND
                                                             semester = '$semester' AND
                                                             periode = '$periode'"
                                                    ); ?>
                                                    <?php $dataKategori = mysqli_fetch_array($queryCekNilai); ?>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-check-label">(<?= $rowi['kode_indikator'] ?>) <?= $rowi['nama_indikator'] ?></label>
                                                        <select class="form-control" name="<?= $rowi['id_indikator'] ?>" required>
                                                            <option value="" disabled selected>Pilih</option>
                                                            <?php foreach ($queryKategori as $rowk) : ?>
                                                                <?php if (mysqli_num_rows($queryCekNilai) > 0) : ?>
                                                                    <option value="<?= $rowk['id_kategori'] ?>" <?= $rowk['id_kategori'] == $dataKategori['id_kategori'] ? 'selected' : '' ?>>
                                                                        <?= $rowk['nama_kategori'] ?>
                                                                    </option>
                                                                <?php else : ?>
                                                                    <option value="<?= $rowk['id_kategori'] ?>">
                                                                        <?= $rowk['nama_kategori'] ?>
                                                                    </option>
                                                                <?php endif ?>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" name="submit" class="btn btn-success">Submit Penilaian</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <form method="post" class="needs-validation" novalidate>
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-check-label">Semester</label>
                                                    <select class="form-control" name="semester" required>
                                                        <option value="" disabled selected>Pilih</option>
                                                        <option value="1">Semester 1</option>
                                                        <option value="2">Semester 2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-check-label">Periode</label>
                                                    <select class="form-control" name="periode" required>
                                                        <option value="" disabled selected>Pilih</option>
                                                        <option value="2020/2021">Periode 2020/2021</option>
                                                        <option value="2021/2022">Periode 2021/2022</option>
                                                        <option value="2022/2023">Periode 2022/2023</option>
                                                        <option value="2023/2024">Periode 2023/2024</option>
                                                        <option value="2024/2025">Periode 2024/2025</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-check-label">Kriteria Penilaian</label>
                                                    <select class="form-control" name="kode_kriteria" required>
                                                        <option value="" disabled selected>Pilih</option>
                                                        <?php foreach ($queryKriteria as $row) : ?>
                                                            <option value="<?= $row['kode_kriteria'] ?>">
                                                                (<?= $row['kode_kriteria'] ?>) <?= $row['nama_kriteria'] ?>
                                                            </option>
                                                        <?php endforeach ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" name="cek" class="btn btn-success">Cek Penilaian</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <!-- \Content -->

                <!-- Footer -->
                <?php include 'app/view/layout/footer.php' ?>
                <!-- \Footer -->
            </div>
            <!-- \Main -->
        </div>
    </div>

    <!-- Script -->
    <?php include 'app/view/layout/script.php' ?>
    <!-- \Script -->
</body>

</html>