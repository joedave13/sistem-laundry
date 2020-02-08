<?php 
    include '../koneksi.php';

    $id = $_POST['id'];
    $pelanggan = $_POST['pelanggan'];
    $berat = $_POST['berat'];
    $tgl_selesai = $_POST['tgl_selesai'];
    $status = $_POST['status'];

    $h = mysqli_query($koneksi, "SELECT harga_per_kilo FROM harga");
    $harga_per_kilo = mysqli_fetch_assoc($h);

    $harga = $berat * $harga_per_kilo['harga_per_kilo'];

    mysqli_query($koneksi, "UPDATE transaksi SET transaksi_pelanggan = '$pelanggan', transaksi_harga = '$harga', transaksi_berat = '$berat', transaksi_tgl_selesai = '$tgl_selesai', transaksi_status = '$status' WHERE transaksi_id = '$id'");

    $jenis_pakaian = $_POST['jenis_pakaian'];
    $jumlah_pakaian = $_POST['jumlah_pakaian'];

    mysqli_query($koneksi, "DELETE FROM pakaian WHERE pakaian_transaksi = '$id'");

    for ($i = 0; $i < count($jenis_pakaian); $i++) { 
        if ($jenis_pakaian[$i] != "") {
            mysqli_query($koneksi, "INSERT INTO pakaian VALUES ('', '$id', '$jenis_pakaian[$i]', '$jumlah_pakaian[$i]')");
        }
    }
    header('location: transaksi.php');
?>