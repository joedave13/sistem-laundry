<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Laporan Transaksi</h4>
        </div>
        <div class="panel-body">
            <form action="laporan.php" method="get">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th width="1%"></th>
                    </tr>
                    <tr>
                        <td><br><input type="date" name="tgl_dari" id="tgl_dari" class="form-control"></td>
                        <td><br><input type="date" name="tgl_sampai" id="tgl_sampai" class="form-control"></td>
                        <td><br><button type="submit" class="btn btn-primary">Filter</button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <br>
    <?php
        if (isset($_GET['tgl_dari']) && $_GET['tgl_sampai']) {
            $dari = $_GET['tgl_dari'];
            $sampai = $_GET['tgl_sampai'];
    ?>
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Laporan Laundry dari <b><?= date('d-M-Y', strtotime($dari)); ?></b> sampai
                <b><?= date('d-M-Y', strtotime($sampai)); ?></b></h4>
        </div>
        <div class="panel-body">
            <a target="_blank" href="cetak_print.php?dari=<?= $dari; ?>&sampai=<?= $sampai; ?>"
                class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak
            </a>
            <a target="_blank" href="cetak_pdf.php?dari=<?= $dari; ?>&sampai=<?= $sampai; ?>"
                class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak PDF
            </a>
            <br><br>
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
                    include '../koneksi.php';

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
        </div>
    </div>
    <?php } ?>
</div>

<?php include 'footer.php'; ?>