<?php
include('../../core/koneksi.php');

$id = $_GET['id'];

$query = "DELETE FROM petugas WHERE id_petugas='$id'";
$result = mysqli_query($koneksi, $query);

header("Location:../petugas.php");