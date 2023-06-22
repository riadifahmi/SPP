<?php
include('../layouts/header.php');
include('../layouts/admin/bar.php');
include('../layouts/footer.php');
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Edit Data Kelas</h1>
				    
			    <div class="row g-4 mb-4">

                <?php
                        include'../core/koneksi.php';
                        $no = 1;
                        $id = $_GET['id'];
                        $sql =  mysqli_query($koneksi, "select * from kelas where id_kelas='$id'");
                        $data = mysqli_fetch_array($sql);
                        ?>
                            
                            <form action="proses/edit_kelas.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $data['id_kelas'];?>" name="id_kelas">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Kelas</label>
                                    <input type="text" name="nama_kelas" class="form-control" id="nama_kelas" value="<?php echo $data['nama_kelas'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Kompetensi Keahlian</label>
                                    <input type="text" name="kompetensi_keahlian" class="form-control" id="nonminal" value="<?php echo $data['kompetensi_keahlian'] ?>">
                                </div>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="kelas.php" class="btn btn-secondary">Close</a>

                        </div>
</form>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 

