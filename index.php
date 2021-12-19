<?php 
include "koneksi.php";
$q1 = mysqli_query($koneksi,"SELECT * FROM kamar_kos");

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
	<title>Sistem Penyewaan Kamar Kos</title>
<link href="./main.d8e0d294.css" rel="stylesheet">
 	<style>
 		.table{
 			width: 600px;
 			margin-left: auto;
 			margin-right: auto;
 		}
 		body{
 			background: grey;
 			text-align: center;
 		}
 		.btn{
 			width: 500px;
 		}
 	</style>

 </head>
 <body >
 	<div class="background-color-layer" style="background-image: url('asset/img/47374.png')"></div>
<main class="content-wrapper">
  <header class="white-text-container section-container">
    <div class="text-center">
      <h1>PENYEWAAN KAMAR KOS</h1>
      <p>
        <a class="fa-icon fa-icon-2x" href="login.php" title="">
         <i> Login</i>
        </a>
      </p>
    </div>
  </header>
  <div class="container">
 	<div class="card">
          <div class="card-block">
            <h2>Daftar Kamar Kos</h2><br><br>
            <div class="work-experience">
<?php 
while ($q1a=mysqli_fetch_assoc($q1)) {
	$tersedia = $q1a["jumlah"] - $q1a["terpakai"];
 ?>
<table border="1" cellpadding="10" class="table">
	<tr style="background-color: #f8f8ff">
		<td colspan="2"><h3>Kamar <?= $q1a["tipe_kamar"]; ?></b></h3></td>
	</tr>
	<tr>
		<td>Fasilitas</td>
		<td><?= $q1a["fasilitas"]; ?></td>
	<tr>
		<td>Sistem Pembayaran</td>
	<td><?= $q1a["sistem_pembayaran"]; ?></td>
	</tr>
	<tr>
		<td>Harga</td>
		<td><?= $q1a["harga"]; ?></td>
	</tr>
	<tr>
		<td>Masa Kontrak</td>
		<td><?= $q1a["masa_kontrak"]; ?></td>
	</tr>
	<tr>
		<td>Kamar Tersedia</td>
		<td><?= $tersedia; ?></td>
	</tr>
	<tr>
		<td colspan="2">
			<a href="infopemilik.php?id=<?= $q1a["id_pemilik"]; ?>" class="btn btn-info">Informasi Pemilik</a>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a href="permintaansewa.php?id=<?= $q1a["id"]; ?>" class="btn btn-primary">Pilih</a></td>
	</tr>
</table>
<br>
<?php } ?>
            </div>
                <p>Created By Danone</p>
          </div>
        </div>
</div>
 </body>
 </html>