<?php
include('../../core/koneksi.php');

$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];

$sql = "INSERT INTO kelas(nama_kelas,kompetensi_keahlian) VALUES('$nama_kelas', '$kompetensi_keahlian')";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:../kelas.php");
}else{
    echo"<script>alert('Maaf Data Tidak Tersimpan');
    window.location.assign('../kelas.php');
    </script>";
}