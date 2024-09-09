<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body style="background-color: #fff; font-family: 'Times New Roman', Times, serif;">

    <!-- Controller -->
    <?php include 'app/controller/report/cetak_evaluasi.php' ?>
    <!-- \Controller -->

    <div class="row">
        <div class="col-12 mb-3">
            <img src="assets/img/<?= $dataProject['icon'] ?>" class="mx-auto d-block" width="250" height="200">
        </div>
        <div class="col-12 mb-5">
            <h2 class="font-weight-bolder text-center text-uppercase">
                Laporan Hasil Evaluasi Kinerja Guru <br>
                SDN 38 Koto Gaek Guguak
            </h2>
        </div>
        <div class="col-12 mb-5">
            <h5 class="font-weight-bolder mb-3">Penilaian Guru : <?= $dataGuru['nama_pengguna'] ?></h5>
            <center><table  class=" table-bordered table-hover text-center align-middle border-dark">
                <thead>
                    <tr>
                        <th><b>Kriteria</b></th>
                        <th><b>Indikator</b></th>
                        <th><b>Nilai</b></th>
                        <th><b>Keterangan</b></th>
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
            </table></center>
        </div>
        <div class="col-12">
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
    </div>

    <script>
        window.print()
    </script>
</body>

</html>