<?php include 'header.php'; ?>  
   

<div class="section">
   	<div class="container">
   		<h3 class="text-center">Tentang Desa</h3>
   		<img src="uploads/identitas/<?= $d->foto_desa ?>" width="100%" class="image">
   		<?= $d->tentang_desa ?>
   	</div>
</div>

<?php include 'footer.php'; ?>