<?php 
include "koneksi.php";
$id = $_GET["id"];
$q1 = mysqli_query($koneksi, "SELECT * FROM kamar_kos,pemilik_kos WHERE kamar_kos.id_pemilik=pemilik_kos.id  AND kamar_kos.id = $id");
$q1a = mysqli_fetch_assoc($q1);
if($q1a["jumlah"]==$q1a["terpakai"]){
	echo "<script>alert('KAMAR PENUH!  MAAF ANDA TIDAK BISA MENYEWA KAMAR INI!!! ');
          document.location.href='index.php';
          </script>";
}
if (isset($_POST["submit"])){
	$id_kamar = $id;
	$nama_penyewa = $_POST["nama_penyewa"];
	$no_ktp = $_POST["no_ktp"];
	$no_hp = $_POST["no_hp"];
	$kesanggupan_membayar = $_POST["kesanggupan_membayar"];
	$masa_kontrak = $q1a["masa_kontrak"];
	$status = "belum bayar";
	$q2 = mysqli_query($koneksi,"INSERT INTO `penyewa_kos` (`id_penyewa`, `id_kamar`, `masa_kontrak`, `nama_penyewa`, `no_ktp`, `no_hp`, `kesanggupan_membayar`, `status`) VALUES ('', '$id_kamar', '$masa_kontrak', '$nama_penyewa', '$no_ktp', '$no_hp', '$kesanggupan_membayar', '$status');");
	 if (mysqli_affected_rows($koneksi)>0) {
          echo "<script>alert('Permintaan Berhasil Diproses!')
          document.location.href = 'index.php';
          </script>";
     }else{
          echo "<script>alert('Permintaan Gagal Diproses!');
          document.location.href='index.php';
          </script>";
     
     }
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta content="width=device-width,initial-scale=1" name="viewport">
  <meta content="description" name="description">
  <meta name="google" content="notranslate" />
  <meta content="Mashup templates have been developped by Orson.io team" name="author">

  <!-- Disable tap highlight on IE -->
  <meta name="msapplication-tap-highlight" content="no">
  
  <link rel="apple-touch-icon" sizes="180x180" href="./assets/apple-icon-180x180.png">
  <link href="./assets/favicon.ico" rel="icon">
	<title>Permintaan Sewa </title>
<link href="./main.d8e0d294.css" rel="stylesheet">
 	<style>
 		.table{
 			width: 600px;
 			margin-left: auto;
 			margin-right: auto;
 		}
 		body{
 			background: #adff2f;
 			text-align: left;
 		}
 		.btn{
 			width: 200px;
 		}
 	</style>
</head>
<body>
	<div class="background-color-layer" style="background-image: url('asset/img/319175.jpg')"></div>
<main class="content-wrapper">
  <header class="white-text-container section-container">
    <div class="text-center">
      <h1>Permintaan Sewa Kos</h1>
    </div>
  </header>
  <div class="container">
 	<div class="card">
          <div class="card-block">
            <h3>Peraturan Kos</h3></h2><br>
            <div class="work-experience">
	
	<?= $q1a["peraturan_kos"]; ?>
</div>
</div>
</div>

<div class="card">
          <div class="card-block">
            <h3>Untuk Menyewa Kamar Kos Silahkan Isi data diri Anda</h3>
            <form action="" method="post" class="reveal-content">
	    	<label for="nama_penyewa">Nama Penyewa:</label>
	    	<div class="form-group">
	    	<input type="text" name="nama_penyewa" id="nama_penyewa" class="form-control">
	    </div>

	    	<label for="no_ktp">No KTP:</label>
	    	<div class="form-group">
	    	<input type="text" name="no_ktp" id="no_ktp" class="form-control">
	    </div>

	    	<label for="no_hp">No Telepon:</label>
	    	<div class="form-group">
	    	<input type="text" name="no_hp" id="no_hp" class="form-control">
	    </div>

	    	<label for="kesanggupan_membayar">Kesanggupan Membayar:</label>
	    	<div class="form-group">
	    	<input type="text" name="kesanggupan_membayar" id="kesanggupan_membayar" class="form-control">
	    </div>

	    	<label for="masa_kontrak">Masa Kontrak :</label>
	    	<div class="form-group">
	    		<div class="form-control">
	    	<?= $q1a["masa_kontrak"]; ?> Rp <?= $q1a["harga"]; ?>
	    	</div>
	    </div>

	<button type="submit" name="submit" onclick="return confirm('Anda akan menyewa kamar <?= $q1a["tipe_kamar"]; ?>? \nSilahkan lakukan pembayaran pada pemilik kos sebesar Rp <?= $q1a["harga"]; ?>. Kunci kamar kos akan diberikan oleh pemilik_kos setelah anda menyelesaikan proses pembayaran.')">Sewa Kamar Ini</button>
	<p><br>Setelah Mengklik "Sewa Kamar Ini" silahkan lakukan pembayaran pada pemilik kos sebesar Rp <?= $q1a["harga"]; ?><br>
		Kunci kamar kos akan diberikan oleh pemilik_kos setelah anda menyelesaikan proses pembayaran.<br>	
	<br>Untuk melihat informasi pemilik kos silahkan klik link dibawah<br>	
	<a href="infopemilik.php?h=p&id=<?= $q1a["id_pemilik"]; ?>&idk=<?=$id; ?>" class="btn btn-primary">informasi pemilik kos</a></p><br>
<a href="index.php" class="btn btn-danger">Kembali</a>
</form>
          </div>
        </div>
       
     </div>
   </div>
 </div>
</div>
</body>
</html>