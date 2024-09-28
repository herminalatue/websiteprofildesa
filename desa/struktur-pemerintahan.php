<?php include 'header.php'; ?>  
   

<div class="section">
   	<div class="container">
   		<h3 class="text-center">Struktur Pemerintahan</h3>
   		
   		<?php
     		    $struktur_pemerintahan = mysqli_query($conn,"SELECT * FROM struktur_pemerintahan ORDER BY id DESC");
     		    if (mysqli_num_rows($struktur_pemerintahan) > 0){
     		    	while($j = mysqli_fetch_array($struktur_pemerintahan)){
     		?>

	     		<div class="col-1">

	     			<a href="detail-struktur-pemerintahan.php?id=<?= $j['id'] ?>" class="thumbnail-link">	     			
	     			<div class="thumbnail-box">
	     				<div class="thumbnail-img" style="background-image: url('uploads/struktur/<?= $j['gambar'] ?>');">
	     					
	     				</div>

	     				<div class="thumbnail-text">
	     					<?= $j['nama'] ?>
	     					
	     				</div>

	     			</div>
	     		</a>
	     			
	     		</div>

     		<?php }}else{ ?>

             	tidak ada data

           <?php } ?>
   	</div>
</div>

<?php include 'footer.php'; ?>