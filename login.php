<?php 
    session_start();
    include 'koneksi.php';

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $data = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");

    $cek_login = mysqli_num_rows($data);

    if ($cek_login > 0) {
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        header("location: admin/index.php");
    }
    else {
        header("location: index.php?pesan=gagal");
    }
?>