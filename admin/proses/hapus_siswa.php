<?php
include('../../core/koneksi.php');

$nisn = $_GET['nisn'];

$query = "DELETE FROM siswa WHERE nisn='$nisn'";
$result = mysqli_query($koneksi, $query);

header("Location:../siswa.php");