<?php include 'header.php'; ?>  
   

<div class="section">
   	<div class="container">

   		<?php
   		     $struktur_pemerintahan  = mysqli_query($conn, "SELECT *  FROM struktur_pemerintahan WHERE id =  '".$_GET['id']."' ");

		    if(mysqli_num_rows($struktur_pemerintahan) == 0){
		    	echo "<script>window.location='index.php'</script>";
		    }

		    $p          = mysqli_fetch_object($struktur_pemerintahan); 

   		?>

   		<h3 class="text-center"><?= $p->nama ?></h3>
   		<img src="uploads/struktur/<?= $p->gambar ?>" width="100%" class="image">
   		<?= $p->keterangan ?>
   	</div>
</div>

<?php include 'footer.php'; ?>