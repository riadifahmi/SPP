<?php
session_start();
include('../layouts/header.php');
include('../layouts/admin/bar.php');
include('../layouts/footer.php');

?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Tambah Data Pembayaran</h1>
				    
			    <div class="row g-4 mb-4">

                <?php
                
                
                        include'../core/koneksi.php';
                        $no = 1;
                        $nisn = $_GET['nisn'];
                        $kekurangan = $_GET['kekurangan'];
                        $sql =  mysqli_query($koneksi, "SELECT * FROM petugas,siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND nisn='$nisn'");
                        $data = mysqli_fetch_array($sql);
                        
                        ?>
                            
                            <form action="proses/tambah_pembayaran.php" method="POST" enctype="multipart/form-data" >

                            <input type="hidden" value="<?php echo $data['id_spp'];?>" name="id_spp">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Petugas</label>
                                    <input disabled type="text" class="form-control" value="<?php echo $data['nama_petugas'] ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">NISN</label>
                                    <input readonly name="nisn" type="text" class="form-control"  value="<?php echo $data['nisn'] ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Siswa</label>
                                    <input disabled type="text" class="form-control"  value="<?php echo $data['nama'] ?>" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Tanggal Bayar</label>
                                    <input type="date" name="tgl_bayar" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Bulan Bayar</label>
                                    <select name="bulan_dibayar" class="form-select" required>
                                        <option value="">Pilih Bulan Dibayar</option>
                                        <option value="Januari">Januari</option>
                                        <option value="Februari">Februari</option>
                                        <option value="Maret">Maret</option>
                                        <option value="April">April</option>
                                        <option value="Mei">Mei</option>
                                        <option value="Juni">Juni</option>
                                        <option value="Juli">Juli</option>
                                        <option value="Agustus">Agustus</option>
                                        <option value="Sebtember">Sebtember</option>
                                        <option value="Oktober">Oktober</option>
                                        <option value="November">November</option>
                                        <option value="Desember">Desember</option>
                                        
                                    </select>
                                </div>
                                <div class="form-gropu mb-3">
                                    <label class="fw-bold">Tahun Bayar</label>
                                    <select name="tahun_dibayar" class="form-select" required>
                                        <option value="">Pilih Tahun Bayar</option>
                                        <?php
                                        for($i=2010; $i<=date('Y'); $i++){
                                            echo"<option value='$i'>$i</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Jumlah Bayar (Jumlah yang harus di bayar adalah <b><?= number_format($kekurangan,2,',','.') ?></b>)</label>
                                    <input type="number" name="jumlah_bayar" max="<?= $kekurangan; ?>" class="form-control" required>
                                </div>
                                </div>

                                <button type="submit" class="btn btn-success">Tambah</button>
                                <a href="pembayaran.php" class="btn btn-secondary">Close</a>

                        </div>
</form>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 

