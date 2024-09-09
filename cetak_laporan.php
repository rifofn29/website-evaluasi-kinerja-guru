<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body style="background-color: #fff; font-family: 'Times New Roman', Times, serif;">

    <!-- Controller -->
    <?php include 'app/controller/report/cetak_laporan.php' ?>
    <!-- \Controller -->

    <div class="row">
        <div class="col-12 mb-3">
            <img src="assets/img/<?= $dataProject['icon'] ?>" class="mx-auto d-block" width="250" height="200">
        </div>
        <div class="col-12 mb-4">
            <h2 class="font-weight-bolder text-center text-uppercase">
                Laporan Evaluasi Penilaian Kinerja Guru <br>
                SDN 38 Koto Gaek Guguak
            </h2>
        </div>
        <div class="col-12 mb-5">
            
            <center><table class=" table-bordered table-hover text-center border-dark">
                <thead>
                    <tr>
                        <th rowspan="2" class="align-middle"><b>No</b></th>
                        <th rowspan="2" class="align-middle"><b>Nama Guru</b></th>
                        <?php foreach ($queryKriteria as $row) : ?>
                            <?php $rowIndikator = mysqli_num_rows(
                                $crud->read(
                                    "indikator",
                                    "WHERE kode_kriteria = '$row[kode_kriteria]'"
                                )
                            ) ?>
                            <th colspan="<?= $rowIndikator ?>"><b><?= $row['nama_kriteria'] ?></b></th>
                        <?php endforeach ?>
                        <th rowspan="2" class="align-middle"><b>Rata-rata</b></th>
                        <th rowspan="2" class="align-middle"><b>Keterangan</b></th>
                    </tr>
                    <tr>
                        <?php foreach ($queryIndikator as $row) : ?>
                            <th><b><?= $row['kode_indikator'] ?></b></th>
                        <?php endforeach ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($queryGuru as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nama_pengguna'] ?></td>
                            <?php $total_nilai = 0; ?>
                            <?php foreach ($queryIndikator as $rowi) : ?>
                                <?php $queryPenilaian =  $crud->read(
                                    "penilaian",
                                    "INNER JOIN pengguna ON penilaian.id_pengguna = pengguna.id_pengguna
                                     INNER JOIN kategori ON penilaian.id_kategori = kategori.id_kategori
                                     WHERE 
                                     penilaian.id_pengguna = '$row[id_pengguna]' AND
                                     penilaian.id_indikator = '$rowi[id_indikator]' AND
                                     penilaian.semester = '$semester' AND 
                                     penilaian.periode = '$periode'"
                                ); ?>
                                <?php $rowPenilaian = mysqli_num_rows($queryPenilaian) ?>
                                <?php if ($rowPenilaian > 0) : ?>
                                    <?php foreach ($queryPenilaian as $rowp) : ?>
                                        <?php
                                        $dataKategori = mysqli_fetch_array(
                                            $crud->read(
                                                "kategori",
                                                "WHERE id_kategori = '$rowp[id_kategori]'"
                                            )
                                        );

                                        $total_nilai += $dataKategori['nilai'];
                                        ?>
                                        <td><?= $dataKategori['nilai'] ?></td>
                                    <?php endforeach ?>
                                <?php else : ?>
                                    <td>-</td>
                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if ($total_nilai == 0) : ?>
                                <th>-</th>
                                <th>-</th>
                            <?php else : ?>
                                <?php $rata = $total_nilai / mysqli_num_rows($queryIndikator) ?>
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
                                <th><?= round($rata, 2) ?></th>
                                <th><?= $ket ?></th>
                            <?php endif ?>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table><br>
            <div class="col-10">
            <div class="d-flex justify-content-end">
                <div class="d-block">
                    <p>
                        Solok, <?= $fungsi->TanggalIndo(date('Y-m-d')) ?> <br>
                        Kepala Sekolah
                    </p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="font-weight-bold">
                        <ins><?= $dataKepala['nama_pengguna'] ?></ins> <br>
                        NIP .<?= $dataKepala['nip'] ?>
                    </p>
                </div>
            </div>
        </div>  
                </center>
            <div class="w-100 mb-3">
                <h5 class="font-weight-bolder">Keterangan</h5>
                <?php foreach ($queryIndikator as $row) : ?>
                    <table>
                        <td><?= $row['kode_indikator'] ?> : </td>
                        <td class="ml-2"> <?= $row['nama_indikator'] ?></td>
                    </table>
                <?php endforeach ?>
            </div>
        </div>
        
    </div>

    <script>
        window.print()
    </script>
</body>

</html>