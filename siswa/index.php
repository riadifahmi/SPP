<?php
session_start();
if(empty($_SESSION['nisn'])){
	echo"<script>
	alert('Maaf Anda Belum Login');
	window.location.assign('../auth/login_siswa.php');
	</script>";
}else($_SESSION['nama']);



include('../layouts/header.php');
include('../layouts/bar.php');
include('../layouts/footer.php');
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Dashboard</h1>
			    
			    <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
				    <div class="inner">
					    <div class="app-card-body p-3 p-lg-4">
						    <h3 class="mb-3">Welcome, <?= $_SESSION['nama'] ?>!</h3>
						    <div class="row gx-5 gy-3"> 
						        <div class="col-12 col-lg-9">
							        
							        <div>Selamat Datang Di Aplikasi Pembayaran SPP, Silahkan Cek Histori Pembayaran Anda</div>
							    </div><!--//col-->
							    <div class="col-12 col-lg-3">
							    </div><!--//col-->
						    </div><!--//row-->
						    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					    </div><!--//app-card-body-->
					    
				    </div><!--//inner-->
			    </div><!--//app-card-->
				    
			   
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    <br><br><br><br><br><br><br><br><br><br><br>
<footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
				 <!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">Fahmi Rais Riadi</a> Aplikasi Pembayaran SPP</small> -->
		    </div>
	    </footer>
<!--//app-footer-->
	    
    </div><!--//app-wrapper-->    					

 

