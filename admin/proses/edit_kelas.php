<?php
include('../../core/koneksi.php');

$id_kelas = $_POST['id_kelas'];
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];


$query = "UPDATE kelas SET nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' Where id_kelas='$id_kelas'";
$result = mysqli_query($koneksi, $query);
// var_dump($_POST);
// die();

header("Location:../kelas.php");