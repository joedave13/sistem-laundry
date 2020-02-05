<?php include 'header.php'; ?>

<div class="container">
    <br><br><br>

    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Pelanggan</h4>
            </div>
            <div class="panel-body">
                <?php 
                    include '../koneksi.php';
                    $id = $_GET['id'];
                    $data = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE pelanggan_id = '$id'");
                    while($d = mysqli_fetch_array($data)) {
                ?>
                <form action="pelanggan_edit_act.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="hidden" name="id" id="id" class="form-control" value="<?= $d['pelanggan_id']; ?>">
                        <input type="text" id="nama" name="nama" class="form-control"
                            value="<?= $d['pelanggan_nama']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="hp">HP</label>
                        <input type="number" id="hp" name="hp" class="form-control" value="<?= $d['pelanggan_hp']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control" cols="30"
                            rows="5"><?= $d['pelanggan_alamat']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Edit Data</button>
                    </div>
                </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>