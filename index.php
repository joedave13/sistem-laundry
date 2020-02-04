<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <title>Sistem Informasi Laundry - PHP</title>
</head>

<body style="background: #F0F0F0">
    <br><br><br>

    <center>
        <h2>Sistem Informasi Laundry</h2>
    </center>

    <br><br><br>

    <div class="container">
        <div class="col-md-4 col-md-offset-4">
            <?php 
                if (isset($_GET['pesan'])) {
                    if ($_GET['pesan'] == 'gagal') {
                        echo "<div class='alert alert-danger'>Login gagal! Username atau password anda salah!</div>";
                    }
                    else if ($_GET['pesan'] == 'logout') {
                        echo "<div class='alert alert-info'>Anda telah logout.</div>";
                    }
                    else if ($_GET['pesan'] == 'belum_login') {
                        echo "<div class='alert alert-danger'>Anda harus login untuk mengakses sistem!</div>";
                    }
                }
            ?>
            <form action="login.php" method="post">
                <div class="panel">
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.js"></script>
</body>

</html>