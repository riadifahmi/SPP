<?php
$db_host="localhost";
$db_user="root";
$db_pass="";
$db_name="db_spp";

$connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if($connection) {
    echo '';
} else {
    echo "Koneki Gagal! : ". mysqli_connect_error();
}
if (!$koneksi){
    die("Koneksi gagal:".mysqli_connect_error());
}
