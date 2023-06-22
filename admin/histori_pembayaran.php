<?php

include('../layouts/header.php');
include('../layouts/admin/bar.php');
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
                            <th>Hapus</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        error_reporting(0);
                        include'../core/koneksi.php';
                        $nisn = $_GET['nisn'];
                        $query = "SELECT * FROM pembayaran,siswa,kelas,spp,petugas WHERE pembayaran.nisn=siswa.nisn AND  siswa.id_kelas=kelas.id_kelas AND pembayaran.id_spp=spp.id_spp AND pembayaran.id_petugas=petugas.id_petugas AND pembayaran.nisn='$nisn' ORDER by tgl_bayar DESC";
                        $result = mysqli_query($koneksi, $query);

                        $no = 1;
  
                        foreach($result as $data) {
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
                            <td>
                                <a href="proses/hapus_pembayaran.php?id_pembayaran=<?php echo $data['id_pembayaran']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                            </tr>

                            
                        
                    </form>
                        </div>
                        </div>

                        <?php
                        }
                        ?>

                    </tbody>
                    </table>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 

