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
                        <h1 class="app-page-title">Siswa</h1>
				    </div>
                    <div class="col-auto">
					    <div class="page-utilities">
						    <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                            <div class="col-auto">						    
								    <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#Modal-tambah" href="#">
                                    <i class="fas fa-plus"></i> 
									    Tambah Siswa
									</a>
							    </div>
                            </div>
                        </div>
                </div>
                
				    
			    <div class="row g-2 mb-4" >

                <div class="card card-nav-tabs">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h6>Data Siswa</h6>
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
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Alamat</th>
                            <th>No.Telpon</th>
                            <th>Data SPP</th>
                            <th style="text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        include'../core/koneksi.php';
                        $query = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nama ASC";
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
                            <td><?php echo $data['nis'] ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['nama_kelas'] ?></td>
                            <td><?php echo $data['alamat'] ?></td>
                            <td><?php echo $data['no_telp'] ?></td>
                            <td><?php echo $data['tahun'] ?> - <?= number_format($data['nominal'],2,',','.'); ?></td>
                            <td style="text-align: center">
                                <a href="edit_siswa.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-warning btn-sm" <?php echo $data['nisn']; ?>><i class="fas fa-edit"></i></a>
                                <a href="proses/hapus_siswa.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal-hapus"><i class="fas fa-trash"></i></a>
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
                                    <a href="proses/hapus_siswa.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-primary">Hapus</a>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Modal Tambah -->
                        <div class="modal fade" id="Modal-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Siswa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="proses/tambah_siswa.php" method="post">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">NISN</label>
                                    <input type="number" name="nisn" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan NISN">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">NIS</label>
                                    <input type="number" name="nis" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan NIS">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama</label>
                                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan Nama">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Kelas</label>
                                    <select name="id_kelas" class="form-select" required>
                                    <option value="">>-- Pilih Kelas --<</option>
                                    <?php
                                    include'../core/koneksi.php';
                                    $kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                    foreach($kelas as $data_kelas){
                                    ?>
                                    <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas'] ?></option>
                                    <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" placeholder="Masukkan Alamat" rows="3"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">No.Telpon</label>
                                    <input name="no_telp" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Masukkan No.Telpon">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">SPP</label>
                                    <select name="id_spp" class="form-select" required>
                                    <option value="">>-- Pilih SPP --<</option>
                                    <?php
                                    include'../core/koneksi.php';
                                    $spp = mysqli_query($koneksi, "SELECT * FROM spp ORDER BY tahun ASC");
                                    foreach($spp as $data_spp){
                                    ?>
                                    <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> | <?= number_format($data_spp['nominal'],2,',','.'); ?></option>
                                    <?php } ?>
                                    </select>
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
	    <br><br><br><br><br>  
<footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                 <!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">Fahmi Rais Riadi</a> Aplikasi Pembayaran SPP</small> -->
		       
		    </div>
	    </footer><!--//app-footer-->
    </div><!--//app-wrapper-->    					

 

