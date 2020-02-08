<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>Sistem Informasi Laundry - Invoice</title>
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
        <div class="col-md-10 col-md-offset-1">
            <?php 
                $id = $_GET['id'];
                $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi, pelanggan WHERE transaksi_id = '$id' AND transaksi_pelanggan = pelanggan_id");
                while($t = mysqli_fetch_array($transaksi)){
            ?>
            <center>
                <h2>Laundry "Joe Laundry"</h2>
                <h3></h3>
                <a href="transaksi_invoice_cetak.php?id=<?= $t['transaksi_id']; ?>" target="_blank"
                    class="btn btn-primary btn-sm pull-left"><i class="glyphicon glyphicon-print"></i>
                    Cetak Invoice
                </a>
                <br><br>
                <table class="table">
                    <tr>
                        <th width="20%">No. Invoice</th>
                        <th>:</th>
                        <td>INVOICE-<?= $t['transaksi_id']; ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Tanggal Laundry</th>
                        <th>:</th>
                        <td><?= date('d-M-Y', strtotime($t['transaksi_tgl'])); ?></td>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th>:</th>
                        <td><?= $t['pelanggan_nama']; ?></td>
                    </tr>
                    <tr>
                        <th>HP</th>
                        <th>:</th>
                        <td><?= $t['pelanggan_hp']; ?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <th>:</th>
                        <td><?= $t['pelanggan_alamat']; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Cucian (Kg)</th>
                        <th>:</th>
                        <td><?= $t['transaksi_berat']; ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal Selesai</th>
                        <th>:</th>
                        <td><?= date('d-M-Y', strtotime($t['transaksi_tgl_selesai'])); ?></td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <th>:</th>
                        <td>
                            <?php
                                if ($t['transaksi_status'] == 0) {
                                    echo "<div class='label label-warning'>PROSES</div>";
                                }
                                else if ($t['transaksi_status'] == 1) {
                                    echo "<div class='label label-info'>DICUCI</div>";
                                }
                                else if ($t['transaksi_status'] == 2) {
                                    echo "<div class='label label-success'>SELESAI</div>";
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <th>:</th>
                        <td><?= 'Rp. ' . number_format($t['transaksi_harga'], 0, ',', '.'); ?></td>
                    </tr>
                </table>
                <br>
                <h4 class="text-center">Daftar Cucian</h4>
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Jenis Pakaian</th>
                        <th width="20%">Jumlah Pakaian</th>
                    </tr>
                    <?php 
                        $id = $t['transaksi_id'];
                        $pakaian = mysqli_query($koneksi, "SELECT * FROM pakaian WHERE pakaian_transaksi = '$id'");
                        while($p = mysqli_fetch_array($pakaian)) {
                    ?>
                    <tr>
                        <td>
                            <?= $p['pakaian_jenis']; ?>
                        </td>
                        <td width="5%">
                            <?= $p['pakaian_jumlah']; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                <br>
                <p>
                    <center>
                        <i>Terima kasih telah mempercayakan cucian anda kepada kami.</i>
                    </center>
                </p>
            </center>
            <?php } ?>
        </div>
    </div>

    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</body>

</html>