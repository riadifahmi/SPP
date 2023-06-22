<?php
include('../../core/koneksi.php');

$id = $_GET['id'];

$query = "DELETE FROM spp WHERE id_spp='$id'";
$result = mysqli_query($koneksi, $query);

header("Location:../spp.php");