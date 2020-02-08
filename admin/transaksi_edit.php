<?php include 'header.php'; ?>

<?php include '../koneksi.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Edit Transaksi Laundry</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-left">Kembali</a>
                <br><br>
                <?php
                    $id = $_GET['id'];
                    $transaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE transaksi_id = '$id'");
                    while($t = mysqli_fetch_array($transaksi)) {
                ?>
                <form action="transaksi_edit_act.php" method="post">
                    <input type="hidden" name="id" id="id" value="<?= $t['transaksi_id']; ?>">
                    <div class="form-group">
                        <label for="pelanggan">Pelanggan</label>
                        <select name="pelanggan" id="pelanggan" class="form-control" required>
                            <option value="">--Pilih Pelanggan--</option>
                            <?php
                                $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                                while($p = mysqli_fetch_array($pelanggan)) {
                            ?>
                            <option
                                <?php if($p['pelanggan_id'] == $t['transaksi_pelanggan']) { echo "selected='selected'"; } ?>
                                value="<?= $p['pelanggan_id']; ?>"><?= $p['pelanggan_nama']; ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="number" class="form-control" name="berat" id="berat"
                            value="<?= $t['transaksi_berat']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai"
                            value="<?= $t['transaksi_tgl_selesai']; ?>" required>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th width="20%">Jumlah</th>
                        </tr>
                        <?php 
                            $id_transaksi = $t['transaksi_id'];
                            $pakaian = mysqli_query($koneksi, "SELECT * FROM pakaian WHERE pakaian_transaksi = '$id_transaksi'");
                            while($p = mysqli_fetch_array($pakaian)){
                        ?>
                        <tr>
                            <td>
                                <input type="text" name="jenis_pakaian[]" id="jenis_pakaian[]" class="form-control"
                                    value="<?= $p['pakaian_jenis']; ?>">
                            </td>
                            <td>
                                <input type="number" name="jumlah_pakaian[]" id="jumlah_pakaian[]" class="form-control"
                                    value="<?= $p['pakaian_jumlah']; ?>">
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td>
                                <input type="text" name="jenis_pakaian[]" id="jenis_pakaian[]" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="jumlah_pakaian[]" id="jumlah_pakaian[]" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="jenis_pakaian[]" id="jenis_pakaian[]" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="jumlah_pakaian[]" id="jumlah_pakaian[]" class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="jenis_pakaian[]" id="jenis_pakaian[]" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="jumlah_pakaian[]" id="jumlah_pakaian[]" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <div class="form-group alert alert-info">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option <?php if($t['transaksi_status'] == 0) { echo "selected='selected'"; } ?> value="0">
                                Proses</option>
                            <option <?php if($t['transaksi_status'] == 1) { echo "selected='selected'"; } ?> value="1">
                                Dicuci</option>
                            <option <?php if($t['transaksi_status'] == 2) { echo "selected='selected'"; } ?> value="2">
                                Selesai</option>
                        </select>
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