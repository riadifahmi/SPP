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
                        <h1 class="app-page-title">Kelas</h1>
				    </div>
                    <div class="col-auto">
					    <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">						    
								    <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Modal-tambah" href="#">
                                    <i class="fas fa-plus"></i> 
									    Tambah Kelas
									</a>
							    </div>
                            </div>
                        </div>
                </div>
				    
			    <div class="row g-2 mb-4">

                <div class="card card-nav-tabs">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h6>Data Kelas</h6>
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
                            <th>Nama Kelas</th>    
                            <th>Kompetensi Keahlian</th>
                            <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        include'../core/koneksi.php';
                        $query = "SELECT * FROM kelas ORDER BY nama_kelas ASC";
                        $result = mysqli_query($koneksi, $query);
  
                        if(!$result) {
                          die("Query Error : ".mysqli_error($koneksi)." - ".mysqli_error($koneksi));
                        }
                        $no = 1;
  
                        while ($data = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nama_kelas'] ?></td>
                            <td><?php echo $data['kompetensi_keahlian'] ?></td>
                            <td style="text-align: center">
                                <a href="edit_kelas.php?id=<?php echo $data['id_kelas']; ?>" class="btn btn-warning btn-sm" <?php echo $data['id_kelas']; ?>><i class="fas fa-edit"></i></a>
                                <a href="proses/hapus_kelas.php?id=<?php echo $data['id_kelas']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal-hapus"><i class="fas fa-trash"></i></a>
                            </td>
                            </td>
                            </tr>

                            <!-- Modal Hapus -->
                        <div class="modal fade" id="Modal-hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kelas</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah Anda Yakin Menghapus Data Ini !!!</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a href="proses/hapus_kelas.php?id=<?php echo $data['id_kelas']; ?>" class="btn btn-primary">Hapus</a>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="Modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="proses/tambah_kelas.php" method="post">
                            <input type="hidden" name="id_kelas" value="<?php ['id_kelas']; ?>">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama Kelas">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Kompetensi Keahlian</label>
                                    <input type="text" name="kompetensi_keahlian" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Kompetensi Keahliah">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
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
	    <br><br><br>  
<footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                 <!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">Fahmi Rais Riadi</a> Aplikasi Pembayaran SPP</small>
		        -->
		    </div>
	    </footer>
    </div><!--//app-wrapper-->    					

 

