<?php
    session_start();
    include '../koneksi.php';
    if(!isset($_SESSION['status_login'])) {
    	echo "<script>window.location = '../login.php?msg=Harap Login Terlebih Dahulu!'</script>";
    }
    date_default_timezone_set("Asia/Jakarta");

    $identitas = mysqli_query($conn, "SELECT * FROM pengaturan ORDER BY id DESC LIMIT 1");
    $d = mysqli_fetch_object($identitas);
?>
<!DOCTYPE html>
<html>
     <head>
     	 <link rel="icon" href="../uploads/identitas/<?= $d->favicon ?>">
	     <title>Panel Admin - <?= $d->nama ?></title>
	     <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body class="bg-light">

	    <!-- navbar -->
	    <div class="navbar">
	    	
	    	<div class="container">

	    		<!-- navbar brand -->
	    		<h2 class="nav-brand float-left"><a href="index.php"><?= $d->nama ?></a></h2>

	    		<!-- navbar menu -->
	    		<ul class="nav-menu float-left">
	    			<li><a href="index.php">Dashboard</a></li>

	    			    <?php if ($_SESSION['ulevel'] == 'Super Admin'){ ?>
	    				
	    			        <li><a href="pengguna.php">Pengguna</a></li>

	    		        <?php }elseif ($_SESSION['ulevel'] == 'Admin'){ ?>

                            <li><a href="struktur-pemerintahan.php">Struktur Pemerintahan</a></li>
	    			        <li><a href="galeri.php">Galeri</a></li>
	    			        <li><a href="informasi.php">Informasi</a></li>
	    			        <li>
	    				        <a href="#">Pengaturan <i class="fa fa-caret-down"></i></a>

	    				        <!-- sub menu -->
	    				        <ul class="dropdown">
	    					        <li><a href="identitas-desa.php">Identitas Desa</a></li>
	    					        <li><a href="tentang-desa.php">Tentang Desa</a></li>
	    					        <li><a href="kepala-desa.php">Kepala Desa</a></li>
	    				        </ul>
	    			        </li>

	    		        <?php } ?>

	    		        <li>
	    		        	<a href="#"><?= $_SESSION['uname'] ?> (<?= $_SESSION['ulevel'] ?>) <i class="fa fa-caret-down"></i></a>

	    				    <!-- sub menu -->
	    				    <ul class="dropdown">
	    					    <li><a href="ubah-password.php">Ubah Password</a></li>
	    					    <li><a href="logout.php">Keluar</a></li>
	    				    </ul>
	    			    </li>
	    		    </ul>

	    		<div class="clearfix"></div>
	    	</div>
	    </div>
	</body>
</html>