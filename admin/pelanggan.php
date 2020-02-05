<?php include 'header.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Data Pelanggan</h4>
        </div>
        <div class="panel-body">
            <a href="pelanggan_tambah.php" class="btn btn-sm btn-info pull-left">Tambah Data</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No.</th>
                    <th>Nama</th>
                    <th>HP</th>
                    <th>Alamat</th>
                    <th width="15%">Action</th>
                </tr>
                <?php 
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                    $no = 1;
                    while($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['pelanggan_nama']; ?></td>
                    <td><?= $d['pelanggan_hp']; ?></td>
                    <td><?= $d['pelanggan_alamat']; ?></td>
                    <td>
                        <a href="pelanggan_edit.php?id=<?= $d['pelanggan_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="pelanggan_hapus.php?id=<?= $d['pelanggan_id']; ?>"
                            class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>