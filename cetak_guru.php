<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head -->
    <?php include 'app/view/layout/head.php' ?>
    <!-- \Head -->
</head>

<body style="background-color: #fff; font-family: 'Times New Roman', Times, serif;">

    <!-- Controller -->
    <?php include 'app/controller/report/cetak_guru.php' ?>
    <!-- \Controller -->

    <div class="row">
        <div class="col-12 mb-3">
            <img src="assets/img/<?= $dataProject['icon'] ?>" class="mx-auto d-block" width="250" height="200">
        </div>
        <div class="col-12 mb-5">
            <h2 class="font-weight-bolder text-center text-uppercase">
                Laporan Data Guru <br>
                SDN 38 Koto Gaek Guguak
            </h2>
        </div>
        <div class="col-12 mb-5">
    
            <center><table border="1" width="400px" class= " table-bordered table-hover text-center border-dark" >
                <thead>
                    <tr>
                        <th><b>No</b></th>
                        <th><b>NIP Guru</b></th>
                        <th><b>Nama Guru</b></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($queryGuru as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['nip'] ?></td>
                            <td><?= $row['nama_pengguna'] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
                    </center>
        </div>
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
    </div>

    <script>
        window.print()
    </script>
</body>

</html>