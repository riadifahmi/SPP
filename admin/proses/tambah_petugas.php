<?php
include('../../core/koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];
$nama_petugas = $_POST['nama_petugas'];
$level = $_POST['level'];

$sql = "INSERT INTO petugas(username, password, nama_petugas, level) VALUES('$username', '$password', '$nama_petugas', '$level')";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:../petugas.php");
}else{
    echo"<script>alert('Maaf Data Tidak Tersimpan');
    window.location.assign('../petugas.php');
    </script>";
}