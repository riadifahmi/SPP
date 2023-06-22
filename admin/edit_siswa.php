<?php
include('../layouts/header.php');
include('../layouts/admin/bar.php');
include('../layouts/footer.php');
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Edit Data Siswa</h1>
				    
			    <div class="row g-4 mb-4">

                <?php
                        include'../core/koneksi.php';
                        $no = 1;
                        $nisn = $_GET['nisn'];
                        $sql =  mysqli_query($koneksi, "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'");
                        $data = mysqli_fetch_array($sql);
                        ?>
                            
                            <form action="proses/edit_siswa.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $data['nisn'];?>" name="nisn">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">NISN</label>
                                    <input type="number" name="nisn" class="form-control" value="<?php echo $data['nisn'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">NIS</label>
                                    <input type="number" name="nis" class="form-control" value="<?php echo $data['nis'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $data['nama'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Kelas</label>
                                    <select name="id_kelas" class="form-control" required>
                                    <option value="<?= $data['id_kelas'] ?>"> <?= $data['nama_kelas'] ?> </option>
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
                                    <textarea name="alamat" class="form-control" rows="3" > <?php echo $data['alamat'] ?> </textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">No.Telpon</label>
                                    <input type="number" name="no_telp" class="form-control" value="<?php echo $data['nisn'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">SPP</label>
                                    <select name="id_spp" class="form-control" required>
                                    <option value="<?= $data['id_spp'] ?>"> <?= $data['tahun']; ?> | <?= number_format($data['nominal'],2,',','.'); ?></option>
                                    <?php
                                    include'../core/koneksi.php';
                                    $spp = mysqli_query($koneksi, "SELECT * FROM spp ORDER BY tahun ASC");
                                    foreach($spp as $data_spp){
                                    ?>
                                    <option value="<?= $data_spp['id_spp'] ?>"> <?= $data_spp['tahun']; ?> | <?= number_format($data_spp['nominal'],2,',','.'); ?></option>
                                    <?php } ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="siswa.php" class="btn btn-secondary">Close</a>

                        </div>
</form>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 

