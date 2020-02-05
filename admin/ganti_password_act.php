<?php 
    include '../koneksi.php';

    $password_baru = md5($_POST['password_baru']);
    mysqli_query($koneksi, "UPDATE admin SET password = '$password_baru'");
    header("location: ganti_password.php?pesan=success");
?>