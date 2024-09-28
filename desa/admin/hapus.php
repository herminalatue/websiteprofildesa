<?php 

    include '../koneksi.php';

    if(isset($_GET['idpengguna'])){

    	$delete = mysqli_query($conn, "DELETE FROM  pengguna WHERE id = '".$_GET['idpengguna']."' ");
    	echo "<script>window.location = 'pengguna.php'</script>";
    }

    if(isset($_GET['idstruktur-pemerintahan'])){

        $struktur_pemerintahan = mysqli_query($conn, "SELECT gambar FROM struktur_pemerintahan WHERE id = '".$_GET['idstruktur-pemerintahan']."' ");

        if (mysqli_num_rows($struktur_pemerintahan)> 0){

            $p = mysqli_fetch_object($struktur_pemerintahan);

            if(file_exists("../uploads/struktur/".$p->gambar)){

                unlink("../uploads/struktur/".$p->gambar);
            }
        }

        $delete = mysqli_query($conn, "DELETE FROM  struktur_pemerintahan WHERE id = '".$_GET['idstruktur-pemerintahan']."' ");
        echo "<script>window.location = 'struktur-pemerintahan.php'</script>";



    }

    if(isset($_GET['idgaleri'])){

        $galeri= mysqli_query($conn, "SELECT foto FROM galeri WHERE id = '".$_GET['idgaleri']."' ");

        if (mysqli_num_rows($galeri)> 0){

            $p = mysqli_fetch_object($galeri);

            if(file_exists("../uploads/galeri/".$p->foto)){

                unlink("../uploads/galeri/".$p->foto);
            }
        }

        $delete = mysqli_query($conn, "DELETE FROM  galeri WHERE id = '".$_GET['idgaleri']."' ");
        echo "<script>window.location = 'galeri.php'</script>";



    }
    
    if(isset($_GET['idinformasi'])){

        $informasi= mysqli_query($conn, "SELECT gambar FROM informasi WHERE id = '".$_GET['idinformasi']."' ");

        if (mysqli_num_rows($informasi)> 0){

            $p = mysqli_fetch_object($informasi);

            if(file_exists("../uploads/informasi/".$p->gambar)){

                unlink("../uploads/informasi/".$p->gambar);
            }
        }

        $delete = mysqli_query($conn, "DELETE FROM  informasi WHERE id = '".$_GET['idinformasi']."' ");
        echo "<script>window.location = 'informasi.php'</script>";
    


    }


?>