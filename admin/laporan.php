<?php
include('../layouts/header.php');
include('../layouts/admin/bar.php');
include('../layouts/footer.php');
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
            <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Laporan</h1>
				    </div>
                <div class="col-auto">
					    <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">						    
								    <a class="btn btn-info" href="cetak_laporan.php">
									    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-download me-1" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
                                        </svg>
									    Cetak Laporan
									</a>
							    </div>
                            </div>
                        </div>
                    </div>
                </div>
			    <div class="row g-2 mb-4">

                <div class="card card-nav-tabs">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h6>Data Laporan</h6>
                            </div>
                            <!-- <div class="col-6 text-end">
                            <a href="cetak_laporan.php" class="btn btn-info btn-sm">Cetak Laporan</a>
                            </div> -->

                        </div>
                    </div>
                    <div class="table-responsive"> 
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>No</th>                                
                            <th>NISN</th>    
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Tahun SPP</th>
                            <th>Nominal Dibayar</th>
                            <th>Sudah Dibayar</th>
                            <th>Tanggal Dibayar</th>
                            <th>Petugas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        include'../core/koneksi.php';
                        $query = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas ORDER BY tgl_bayar DESC";
                        $result = mysqli_query($koneksi, $query);
                        if(!$result) {
                            die("Query Error : ".mysqli_error($koneksi)." - ".mysqli_error($koneksi));
                          }
                        $no = 1;
  
                        while ($data = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nisn'] ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['nama_kelas'] ?></td>
                            <td><?php echo $data['tahun'] ?></td>
                            <td><?= number_format($data['nominal'],2,',','.'); ?></td>
                            <td><?= number_format($data['jumlah_bayar'],2,',','.'); ?></td>
                            <td><?php echo $data['tgl_bayar'] ?></td>
                            <td><?php echo $data['nama_petugas'] ?></td>
                            </tr>

                            
                        
                    </form>
                        </div>
                        </div>

                        <?php
                        }
                        ?>

                    </tbody>
                    </table>
                </div>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    <br><br><br><br><br><br><br>  
<footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                 <!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">Fahmi Rais Riadi</a> Aplikasi Pembayaran SPP</small> -->
		       
		    </div>
	    </footer>
    </div><!--//app-wrapper-->    					

 

