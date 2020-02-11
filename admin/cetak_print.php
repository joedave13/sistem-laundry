<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Sistem Informasi Laundry - Laporan Transaksi</title>
</head>

<body>
    <?php 
        session_start();
        if ($_SESSION['status'] != 'login') {
            header('location: ../index.php?pesan=belum_login');
        }
    ?>

    <?php 
        include '../koneksi.php';
    ?>

    <div class="container">
        <center>
            <h2>Laundry "Joe Laundry"</h2>
        </center>
        <br><br>
        <?php
        if (isset($_GET['dari']) && $_GET['sampai']) {
            $dari = $_GET['dari'];
            $sampai = $_GET['sampai'];
        ?>
        <h4>Data Laporan Laundry dari <b><?= date('d-M-Y', strtotime($dari)); ?></b> sampai
            <b><?= date('d-M-Y', strtotime($sampai)); ?></b></h4>
        <table class="table table-bordered table-striped">
            <tr>
                <th width="1%">No.</th>
                <th>Invoice</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Berat (Kg)</th>
                <th>Tanggal Selesai</th>
                <th>Harga</th>
                <th>Status</th>
            </tr>
            <?php 
                $data = mysqli_query($koneksi, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = pelanggan_id AND date(transaksi_tgl) > '$dari' AND date(transaksi_tgl) < '$sampai' ORDER BY transaksi_id DESC");
                $no = 1;
                while($d = mysqli_fetch_array($data)) {
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                <td><?= date('d-M-Y', strtotime($d['transaksi_tgl'])); ?></td>
                <td><?= $d['pelanggan_nama']; ?></td>
                <td><?= $d['transaksi_berat']; ?></td>
                <td><?= date('d-M-Y', strtotime($d['transaksi_tgl_selesai'])); ?></td>
                <td><?= 'Rp. ' . number_format($d['transaksi_harga'], 0, ',', '.'); ?></td>
                <td>
                    <?php 
                        if ($d['transaksi_status'] == 0) {
                            echo "<div class='label label-warning'>Proses</div>";
                        }
                        else if ($d['transaksi_status'] == 1) {
                            echo "<div class='label label-info'>Dicuci</div>";
                        }
                        else if ($d['transaksi_status'] == 2) {
                            echo "<div class='label label-success'>Selesai</div>";
                        }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </table>
        <?php } ?>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>