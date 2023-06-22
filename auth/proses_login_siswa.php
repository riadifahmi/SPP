<?php


include "../core/koneksi.php";

$nisn = $_POST["nisn"];
$nis = $_POST["nis"];

$sql = "select * from siswa where nisn='".$nisn."' and nis='".$nis."'";
$query = mysqli_query ($koneksi,$sql);

if (mysqli_num_rows($query)>0) {
	$data = mysqli_fetch_assoc($query);
	session_start();
	$_SESSION["nisn"]=$data["nisn"];
	$_SESSION["nama"]=$data["nama"];
	$_SESSION["nis"]=$data["nis"];

		header("Location:../siswa/index.php");
	}else {
		echo"<script>
		alert('Maaf Username Atau Password Salah !!!');
		window.location.assign('../auth/login_siswa.php');
		</script>";
	
}
?>