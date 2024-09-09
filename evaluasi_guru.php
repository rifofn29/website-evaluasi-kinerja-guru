<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body>
    <!-- Controller -->
    <?php include 'app/controller/dashboard/evaluasi_guru.php' ?>
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
                                Hasil Evaluasi
                            </h2>
                            <?php if (isset($_POST['cek'])) : ?>
                                <h5>Semester <?= $semester ?> Periode <?= $periode ?></h5>
                            <?php endif ?>
                        </div>
                    </div>
                    <?php if (isset($_POST['cek'])) : ?>
                        <div class="row">
                            <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header">
                                        <a href="?p=Evaluasi" class="btn btn-secondary">Reset</a>
                                        <?php if (mysqli_num_rows($queryCekPenilaian) > 0) : ?>
                                            <a href="?r=CetakEvaluasi&semester=<?= $semester ?>&periode=<?= $periode ?>&id_guru=<?= $id_guru ?>" target="_blank" class="btn btn-primary">Cetak</a>
                                        <?php endif ?>
                                    </div>
                                    <div class="card-body">
                                        <?php if (mysqli_num_rows($queryCekPenilaian) == $jumlah_indikator) :  ?>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover text-center align-middle border-dark">
                                                    <thead>
                                                        <tr>
                                                            <th>Kriteria</th>
                                                            <th>Indikator</th>
                                                            <th>Nilai</th>
                                                            <th>Keterangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($queryKriteria as $rKriteria) : $no++ ?>
                                                            <?php $queryIndikator = $crud->read("indikator", "WHERE kode_kriteria = '$rKriteria[kode_kriteria]'") ?>
                                                            <?php $rowIndikator = mysqli_num_rows($queryIndikator) + 1 ?>
                                                            <tr>
                                                                <th rowspan="<?= $rowIndikator ?>"><?= $rKriteria['nama_kriteria'] ?></th>
                                                            </tr>
                                                            <?php foreach ($queryIndikator as $rIndokator) : ?>
                                                                <?php $dataPenilaian = mysqli_fetch_array(
                                                                    $crud->read(
                                                                        "penilaian",
                                                                        "INNER JOIN pengguna ON penilaian.id_pengguna = pengguna.id_pengguna
                                                                         INNER JOIN kriteria ON penilaian.id_kriteria = kriteria.id_kriteria
                                                                         INNER JOIN indikator ON penilaian.id_indikator = indikator.id_indikator
                                                                         INNER JOIN kategori ON penilaian.id_kategori = kategori.id_kategori
                                                                         WHERE 
                                                                         penilaian.id_pengguna = '$id_guru' AND
                                                                         penilaian.id_indikator = '$rIndokator[id_indikator]' AND
                                                                         penilaian.semester = '$semester' AND 
                                                                         penilaian.periode = '$periode'
                                                                         ORDER BY indikator.kode_indikator ASC"
                                                                    )
                                                                ); ?>
                                                                <?php $total_nilai += $dataPenilaian['nilai'] ?>
                                                                <tr>
                                                                    <td><?= $rIndokator['nama_indikator'] ?></td>
                                                                    <td><?= $dataPenilaian['nilai'] ?></td>
                                                                    <td><?= $dataPenilaian['nama_kategori'] ?></td>
                                                                </tr>
                                                            <?php endforeach ?>
                                                        <?php endforeach ?>
                                                        <?php $rata = $total_nilai / $jumlah_indikator ?>
                                                        <?php if ($rata == 5) {
                                                            # code...
                                                            $ket = "Sangat Baik";
                                                        } elseif ($rata >= 4 and $rata < 5) {
                                                            # code...
                                                            $ket = "Baik";
                                                        } elseif ($rata >= 3 and $rata < 4) {
                                                            # code...
                                                            $ket = "Cukup Baik";
                                                        } elseif ($rata >= 2 and $rata < 3) {
                                                            # code...
                                                            $ket = "Kurang Baik";
                                                        } elseif ($rata >= 1 and $rata < 2) {
                                                            # code...
                                                            $ket = "Sangat Kurang Baik";
                                                        } else {
                                                            # code...
                                                            $ket = "-";
                                                        } ?>
                                                        <tr>
                                                            <th colspan="2">Rata-rata</th>
                                                            <th><?= round($rata, 2) ?></th>
                                                            <th><?= $ket ?></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php else : ?>
                                            <h2>Belum ada penilaian</h2>
                                        <?php endif ?>
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
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-check-label">Semester</label>
                                                    <select class="form-control" name="semester" required>
                                                        <option value="" disabled selected>Pilih</option>
                                                        <option value="1">Semester 1</option>
                                                        <option value="2">Semester 2</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-3">
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
                                                <div class="col-md-12">
                                                    <button type="submit" name="cek" class="btn btn-success">Cek Data</button>
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