<?php 
    include '../koneksi.php';

    $pelanggan = $_POST['pelanggan'];
    $berat = $_POST['berat'];
    $tgl_selesai = $_POST['tgl_selesai'];

    $tgl_hari_ini = date('Y-m-d');
    $status = 0;

    $h = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga");
    $harga_per_kilo = mysqli_fetch_assoc($h);

    $harga = $berat * $harga_per_kilo['harga_per_kilo'];

    mysqli_query($koneksi, "INSERT INTO transaksi VALUES ('', '$tgl_hari_ini', '$pelanggan', '$harga', '$berat', '$tgl_selesai', '$status')");

    $id_terakhir = mysqli_insert_id($koneksi);

    $jenis_pakaian = $_POST['jenis_pakaian'];
    $jumlah_pakaian = $_POST['jumlah_pakaian'];

    for ($i = 0; $i < count($jenis_pakaian); $i++) { 
        if ($jenis_pakaian[$i] != "") {
            mysqli_query($koneksi, "INSERT INTO pakaian VALUES ('', '$id_terakhir', '$jenis_pakaian[$i]', '$jumlah_pakaian[$i]')");
        }
    }

    header('location: transaksi.php');
?>