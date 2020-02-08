<?php include 'header.php'; ?>

<?php include '../koneksi.php'; ?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4>Transaksi Laundry Baru</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-8 col-md-offset-2">
                <a href="transaksi.php" class="btn btn-sm btn-info pull-left">Kembali</a>
                <br><br>
                <form action="transaksi_tambah_act.php" method="post">
                    <div class="form-group">
                        <label for="pelanggan">Pelanggan</label>
                        <select class="form-control" name="pelanggan" id="pelanggan" required="required">
                            <option value="">--Pilih Pelanggan--</option>
                            <?php
                            $data = mysqli_query($koneksi, "SELECT * FROM pelanggan");
                            while ($d = mysqli_fetch_array($data)) {
                            ?>
                                <option value="<?= $d['pelanggan_id']; ?>"><?= $d['pelanggan_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="berat">Berat</label>
                        <input type="number" name="berat" id="berat" class="form-control" placeholder="Masukkan Berat Cucian" required>
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control" required>
                    </div>
                    <br>
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Jenis Pakaian</th>
                            <th width="20%">Jumlah</th>
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
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>