<?php
session_start();

include('../layouts/header.php');
include('../layouts/bar.php');
include('../layouts/footer.php');
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Histori Pembayaran</h1>
				    
			    <div class="row g-4 mb-4">

                <div class="card card-nav-tabs">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h6>Data Histori Pembayaran</h6>
                            </div>
                            <!-- <div class="col-6 text-end">
                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Modal-tambah"><i class="fas fa-plus"></i> Tambah Data</a>
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
                            <th>Bulan Dibayar</th>
                            <th>Petugas</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        include'../core/koneksi.php';
                        $nisn = $_SESSION['nisn'];
                        $query = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER BY tgl_bayar DESC";
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
                            <td><?php echo $data['bulan_dibayar'] ?></td>
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
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	    <footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
				 <!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">Fahmi Rais Riadi</a> Aplikasi Pembayaran SPP</small> -->
		    </div>
	    </footer>
    </div><!--//app-wrapper-->    					

 

