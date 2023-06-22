<?php
include('../../core/koneksi.php');

$id = $_GET['id'];

$query = "DELETE FROM kelas WHERE id_kelas='$id'";
$result = mysqli_query($koneksi, $query);

header("Location:../kelas.php");