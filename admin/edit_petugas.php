<?php
include('../layouts/header.php');
include('../layouts/admin/bar.php');
include('../layouts/footer.php');
?>

<body class="app">   	
   
    <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Edit Data Petugas</h1>
				    
			    <div class="row g-4 mb-4">

                <?php
                        include'../core/koneksi.php';
                        $no = 1;
                        $id = $_GET['id'];
                        $sql =  mysqli_query($koneksi, "select * from petugas where id_petugas='$id'");
                        $data = mysqli_fetch_array($sql);
                        ?>
                            
                            <form action="proses/edit_petugas.php" method="POST" enctype="multipart/form-data">

                            <input type="hidden" value="<?php echo $data['id_petugas'];?>" name="id_petugas">
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Username</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $data['username'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Password</label>
                                    <input type="text" name="password" class="form-control" value="<?php echo $data['password'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Petugas</label>
                                    <input type="name" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas'] ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Level</label>
                                    <select class="form-control" name="level">
                                    <option ><?php echo $data['level'] ?></option>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                    </select>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-success">Update</button>
                                    <a href="petugas.php" class="btn btn-secondary">Close</a>
                                </div>
                            </form>
				    </div><!--//col-->
			   
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
    </div><!--//app-wrapper-->    					

 

