<?php include 'header.php'; ?>  
    <!-- bagian banner -->
     <div class="banner" style="background-image: url('uploads/identitas/<?= $d->foto_desa ?>');">
     	<div class="banner-text">
     		<div class="container">
	     		<h3>Selamat Datang di Website Resmi Pemerintahan <?= $d->nama ?></h3>
	     		<p>Dengan hadirnya website ini, masyarakat dapat mengakses informasi tentang Desa Patahuwe</p>
     	    </div>
     	</div>
     </div>

     <!-- bagian sambutan -->
     <div class="section">
     	
     	<div class="container text-center">
     		<h3>Sambutan Kepala Desa</h3>
     		<img src="uploads/identitas/<?= $d->foto_kades ?>" width="100p">
     		<h4><?= $d->nama_kades ?></h4>
     		<p><?= $d->sambutan_kades?></p>
     	</div>
     </div>

     <!-- bagian visi Misi -->
     <div class="section">

     	<div class="container text-center">
     		<h3>Visi Misi</h3>
     		<?= $d->tentang_desa ?>
     	</div>
     </div>

     <!-- bagian struktur-pemerintahan -->
     <div class="section" id="struktur-pemerintahan">
     	
     	<div class="container text-center">
     		<h3>Struktur Pemerintahan</h3>

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

     <!-- bagian informasi -->
     <div class="section">
     	
     	<div class="container text-center">
     		<h3>Informasi Terbaru</h3>

     		<?php
     		    $informasi = mysqli_query($conn,"SELECT * FROM informasi ORDER BY id DESC LIMIT 8");
     		    if (mysqli_num_rows($informasi) > 0){
     		    	while($p = mysqli_fetch_array($informasi)){
     		?>

	     		<div class="col-1">

	     			<a href="detail-informasi.php?id=<?= $p['id'] ?>" class="thumbnail-link">	     			
	     			<div class="thumbnail-box">
	      				<div class="thumbnail-img" style="background-image: url('uploads/informasi/<?= $p['gambar'] ?>');">
	     					
	     				</div>

	     				<div class="thumbnail-text">
	     					<?= substr($p['judul'], 0, 50) ?>
	     					
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