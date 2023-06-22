<?php
session_start();
include('../../core/koneksi.php');
$id_petugas = $_SESSION['id_petugas'];
$nisn = $_POST['nisn'];
$tgl_bayar = $_POST['tgl_bayar'];
$bulan_dibayar = $_POST['bulan_dibayar'];
$tahun_dibayar = $_POST['tahun_dibayar'];
$id_spp = $_POST['id_spp'];
$jumlah_bayar = $_POST['jumlah_bayar'];


$sql = "INSERT INTO pembayaran (id_petugas, nisn, tgl_bayar, bulan_dibayar, tahun_dibayar, id_spp, jumlah_bayar) VALUES('$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')";
echo"$sql";

$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:../pembayaran.php");
    echo"pembayaran berhasil";
}else{
    echo"<script>alert('Maaf Data Tidak Tersimpan');
    window.location.assign('../pembayaran.php');
    </script>";
}
