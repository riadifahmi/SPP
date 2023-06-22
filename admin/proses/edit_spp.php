<?php
include('../../core/koneksi.php');

$id_spp = $_POST['id_spp'];
$tahun = $_POST['tahun'];
$nominal = $_POST['nominal'];


$query = "UPDATE spp SET tahun='$tahun', nominal='$nominal' Where id_spp='$id_spp'";
$result = mysqli_query($koneksi, $query);
// var_dump($_POST);
// die();

header("Location:../spp.php");