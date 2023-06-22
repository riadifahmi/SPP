<?php
include('../layouts/header.php');
include('../layouts/admin/bar.php');
include('../layouts/footer.php');
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
            <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Pembayaran</h1>
				    </div>
            </div>
            <div class="table-responsive"> 
                    <form class="col-auto" method="post">
                                <table cellpadding=6>
                                    <tr>
                                        <td>Tahun:</td>
                                        <td><input type="text" name="tahun" required="required"></td>
                                        <td>Kelas:</td>
                                        <td><select   type="text" name="kelas" required="required">
                                                <option>Pilih Kelas </option>
                                                <?php
                                                include'../core/koneksi.php';
                                                $kelas = mysqli_query($koneksi, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
                                                foreach($kelas as $data_kelas){
                                                ?>
                                                <option value="<?= $data_kelas['id_kelas'] ?>"> <?= $data_kelas['nama_kelas'] ?></option>
                                                <?php } ?>
                                                
                                            </select>
                                        </td>
                                        <td><input type="submit" class="btn btn-primary" name="filter" value="Filter"> </td>
                                    </tr>
                                </table>
                            </form>
            </div>
                
			    <div class="row g-4 mb-4">

                <div class="card card-nav-tabs">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <h6>Data Pembayaran</h6>
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
                            <th>Tahun</th>
                            <th>Nominal</th>
                            <th>Sudah Dibayar</th>
                            <th>Kekurangan</th>
                            <th>Status</th>
                            <th>Histori</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                        include'../core/koneksi.php';
                        
                        $no = 1;
                        // $query = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER BY nama ASC";
                        

                        if(isset($_POST['filter'])) {
                            $tahun = mysqli_real_escape_string($koneksi, $_POST['tahun']);
                            $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);
                    
                            // echo "$tahun,$kelas";
                            $query = "SELECT * FROM siswa,spp,kelas WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp AND spp.tahun='$tahun' AND kelas.id_kelas='$kelas' ORDER by nama ASC;";  
                        }else{
                            $query = "SELECT * FROM siswa,spp,kelas  WHERE siswa.id_kelas=kelas.id_kelas AND siswa.id_spp=spp.id_spp ORDER by tahun ASC";
                        }
                        $result = mysqli_query($koneksi, $query);
                        

                        foreach($result as $data) {
                            $data_pembayaran = mysqli_query($koneksi,"SELECT SUM(jumlah_bayar) as jumlah_bayar FROM pembayaran WHERE nisn='$data[nisn]'");
                            $data_pembayaran = mysqli_fetch_array($data_pembayaran);
                            $sudah_bayar = $data_pembayaran['jumlah_bayar'];
                            $kekurangan = $data['nominal'] - $data_pembayaran['jumlah_bayar'];
                    ?>
                            <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $data['nisn'] ?></td>
                            <td><?php echo $data['nama'] ?></td>
                            <td><?php echo $data['nama_kelas'] ?></td>
                            <td><?php echo $data['tahun'] ?></td>
                            <td><?= number_format($data['nominal'],2,',','.'); ?></td>
                            <td><?= number_format($sudah_bayar,2,',','.'); ?></td>
                            
                            <td><?= number_format($kekurangan,2,',','.'); ?></td>
                            <td>
                                <?php
                                if($kekurangan==0){
                                    echo "<span class='badge text-bg-success'>Sudah Lunas</span>";
                                }else{ ?>
                                    <a href="tambah_pembayaran.php?nisn=<?php echo $data['nisn']; ?>&kekurangan=<?= $kekurangan ?>" class="btn btn-danger btn-sm">Pilih & Bayar</a>
                                <?php } ?>
                            <td>
                                <a href="histori_pembayaran.php?nisn=<?php echo $data['nisn']; ?>" class="btn btn-warning btn-sm">Histori</a>
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
                </div>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    <br><br><br>
<footer class="app-footer">
		    <div class="container text-center py-3">
		         <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                 <!-- <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="#" target="_blank">Fahmi Rais Riadi</a> Aplikasi Pembayaran SPP</small> -->
		       
		    </div>
	    </footer>
    </div><!--//app-wrapper-->    					

 

