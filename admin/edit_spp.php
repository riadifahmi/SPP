<?php
include('../layouts/header.php');
include('../layouts/admin/bar.php');
include('../layouts/footer.php');
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Edit Data SPP</h1>
				    
			    <div class="row g-4 mb-4">

                <?php
                        include'../core/koneksi.php';
                        $no = 1;
                        $id = $_GET['id'];
                        $sql =  mysqli_query($koneksi, "select * from spp where id_spp='$id'");
                        $data = mysqli_fetch_array($sql);
                        ?>
                            
                            <form action="proses/edit_spp.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $data['id_spp'];?>" name="id_spp">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Tahun</label>
                                    <input type="number" name="tahun" class="form-control" id="tahun" value="<?php echo $data['tahun'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nominal</label>
                                    <input type="number" name="nominal" class="form-control" id="nonminal" value="<?php echo $data['nominal'] ?>">
                                </div>
                                </div>

                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="spp.php" class="btn btn-secondary">Close</a>

                        </div>
</form>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 

