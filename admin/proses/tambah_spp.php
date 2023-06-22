<?php
include('../../core/koneksi.php');

$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];

$sql = "INSERT INTO spp(tahun,nominal) VALUES('$tahun', '$nominal')";
$query = mysqli_query($koneksi, $sql);
if($query){
    header("Location:../spp.php");
}else{
    echo"<script>alert('Maaf Data Tidak Tersimpan');
    window.location.assign('../spp.php');
    </script>";
}