<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Transaksi Laundry</h4>
        </div>
        <div class="panel-body">
            <a href="transaksi_tambah.php" class="btn btn-primary btn-sm pull-left">Tambah Data Transaksi</a>
            <br><br>

            <table class="table table-bordered table-table-striped">
                <tr>
                    <th width="1%">No.</th>
                    <th>Invoice</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Berat (Kg)</th>
                    <th>Tgl. Selesai</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th width="20%">Action</th>
                </tr>
                <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan, transaksi WHERE transaksi_pelanggan = pelanggan_id ORDER BY transaksi_id DESC");
                    $no = 1;
                    while($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>INVOICE-<?= $d['transaksi_id']; ?></td>
                    <td><?= date('d-m-Y', strtotime($d['transaksi_tgl'])); ?></td>
                    <td><?= $d['pelanggan_nama']; ?></td>
                    <td><?= $d['transaksi_berat']; ?></td>
                    <td><?= date('d-m-Y', strtotime($d['transaksi_tgl_selesai'])); ?></td>
                    <td><?= "Rp. " . number_format($d['transaksi_harga'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if ($d['transaksi_status'] == 0) {
                            echo "<div class ='label label-warning'>Proses</div>";
                        }
                        else if ($d['transaksi_status'] == 1) {
                            echo "<div class = 'label label-info'>Dicuci</div>";
                        }
                        else if ($d['transaksi_status'] == 2) {
                            echo "<div class = 'label label-success'>Selesai</div>";
                        }
                        ?>
                    </td>
                    <td>
                        <a href="transaksi_invoice.php?id=<?= $d['transaksi_id']; ?>" target="_blank"
                            class="btn btn-warning btn-sm">Invoice</a>
                        <a href="transaksi_edit.php?id=<?= $d['transaksi_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="transaksi_hapus.php?id=<?= $d['transaksi_id']; ?>"
                            class="btn btn-danger btn-sm">Batal</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>