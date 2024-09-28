<?php include 'header.php' ?>


	    <!-- content -->
	    <div class="content">

	    	<div class="container">

	    		<div class="box">

	    			<div class="box-header">
	    				Kepala Desa
	    			</div>

	    			<div class="box-body">

	    				<?php
	    				    if (isset($_GET['success'])) {
	    				    	echo "<div class='alert alert-success'>".$_GET['success']."</div>";
	    				    }
	    				?>

	    				<form action="" method="POST" enctype="multipart/form-data">

	    				  
                            <div class="form-group">
	    					     <label>Nama</label>
	    					     <input type="text" name="nama" class="input-control" placeholder="Nama Kepala Desa" value="<?= $d->nama_kades ?>" required>
                            </div>

                            <div class="form-group">
	    					     <label>Sambutan</label>
	    					     <textarea name="sambutan" class="input-control" placeholder="Sambutan Kepala Desa"><?= $d->sambutan_kades ?></textarea>
                            </div>



                            <div class="form-group">
	    					     <label>Foto</label>
	    					     <img src="../uploads/identitas/<?= $d->foto_kades ?>" width="200px" class="image">
	    					     <input type="hidden" name="foto_lama" value="<?= $d->foto_kades ?>">
	    					     <input type="file" name="foto_baru" class="input-control">
                            </div>

                                 <input type="submit" name="submit" value="Simpan Perubahan" class="btn btn-blue">
	    					
	    				</form>


	    				<?php

	    				    if(isset($_POST['submit'])){

	    				      	$nama   = addslashes(ucwords($_POST['nama']));
	    				      	$sambutan   = addslashes($_POST['sambutan']);
	    				      	$currdate  = date('Y-m-d H:i:s');

	    				      	// menampung dan validasi data foto desa

	    				    	if($_FILES['foto_baru']['name'] != ''){

	    				    		// echo 'user ganti gambar';

	    				    		$filename  = $_FILES['foto_baru']['name'];
		    				    	$tmpname   = $_FILES['foto_baru']['tmp_name'];
		    				    	$filesize  = $_FILES['foto_baru']['size'];
		    	

		    				    	$formatfile = pathinfo($filename, PATHINFO_EXTENSION);
		    				    	$rename     = 'kades'.time().'.'.$formatfile;

		    				    	$allowedtype = array('png','jpg','jpeg','gif');


	    				    	    if(!in_array($formatfile, $allowedtype)){
	    				    		
		    				    	    echo '<div class="alert alert-error">Format file foto kepala desa tidak diizinkan.</div>';

		    				    	    return false;

		    				    	}elseif($filesize_logo > 1000000){

		    				    		echo '<div class="alert alert-error">Ukuran file foto kepala desa tidak boleh lebih dari 1 MB.</div>';

		    				    		return false;

		    				    	}else{

			    				    	if (file_exists("../uploads/identitas/".$_POST['foto_lama'])){

			    				    		unlink("../uploads/identitas/".$_POST['foto_lama']);
			    				    	}

			    				    	move_uploaded_file($tmpname, "../uploads/identitas/".$rename);

			    				    }


	    				    	}else{

	    				    		$rename= $_POST['foto_lama'];
	    				    	}


	    				    	$update = mysqli_query($conn, "UPDATE pengaturan SET
                                        nama_kades = '".$nama."',
                                        sambutan_kades = '".$sambutan."',
                                        foto_kades = '".$rename."',
                                        updated_at = '".$currdate."'
                                        WHERE id = '".$d->id."'
	    				      	");


	    				        if($update){
	    				              echo "<script>window.location='kepala-desa.php?success=Edit Data Berhasil'</script>";
	    				        }else{
	    				        	echo 'gagal edit '.mysqli_error($conn);
	    				        }
	    			   
	    				      
	    				    } 

	    				?>

	    			</div>

	    		</div>

	    	</div>
	    	
	    </div>

<?php include 'footer.php' ?>