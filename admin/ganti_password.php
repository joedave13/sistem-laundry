<?php include 'header.php'; ?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <?php
        if (isset($_GET['pesan'])) {
            if ($_GET['pesan'] == 'success') {
                echo "<div class='alert alert-success'>Password telah diganti!</div>";
            }
        }
        ?>

        <div class="panel">
            <div class="panel-heading">
                <h4>Ganti Password</h4>
            </div>
            <div class="panel-body">
                <form action="ganti_password_act.php" method="post">
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Masukkan Password Baru">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Ganti Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>