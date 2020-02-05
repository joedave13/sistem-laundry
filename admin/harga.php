<?php include 'header.php'; ?>

<div class="container">
    <br><br><br>

    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Pengaturan Harga Laundry</h4>
            </div>
            <div class="panel-body">
                <?php
                include '../koneksi.php';
                $data = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <form action="harga_edit.php" method="post">
                        <div class="form-group">
                            <label for="harga">Harga Per Kilo</label>
                            <input type="text" name="harga" id="harga" class="form-control" value="<?= $d['harga_per_kilo']; ?>">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Update Harga</button>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>