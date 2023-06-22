<?php
session_start();

include "../core/koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "select * from petugas where username='".$username."' and password='".$password."' limit 1";
$query = mysqli_query ($koneksi,$sql);

	if (mysqli_num_rows($query)>0) {
		$data = mysqli_fetch_assoc($query);
		session_start();
		$_SESSION['id_petugas']=$data['id_petugas'];
		$_SESSION["nama_petugas"]=$data["nama_petugas"];
		$_SESSION["level"]=$data["level"];
		echo $_SESSION['id_petugas'];
		
		if($data['level']=='admin'){
			header("Location:../admin/index.php");
		}elseif($data['level']=='petugas'){
			header("Location:../petugas/index.php");
		}
		
		
	}else {
		echo"<script>
		alert('Maaf Username Atau Password Salah !!!');
		window.location.assign('../auth/login_admin.php');
		</script>";
	}
?>