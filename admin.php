<?php 
session_start();
if (!isset($_SESSION["admin"])){
	header("Location:login.php");
	exit;
}
include "koneksi.php";
$q2=mysqli_query($koneksi,"SELECT * FROM pemilik_kos");
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
	<title>Halaman Pemilik</title>
<link href="./main.d8e0d294.css" rel="stylesheet">
 	<style>
 		.table{
 			width: 800px;
 			margin-left: auto;
 			margin-right: auto;
			 color: black;
 		}
 		body{
 			background: green;
 			text-align: center;
 		}
 		.btn{
 			width: 600px;
 		}
 	</style>

</head>
<body>
<main class="content-wrapper">
  <header class="white-text-container section-container">
    <div class="text-center">
      <h1>Halaman Admin</h1>
      <br><br>
      <h2>Data Pemilik</h2>
    </div>
  </header>
<?php 
while ($q2a=mysqli_fetch_assoc($q2)) {
	$id_pemilik = $q2a["id"];
 ?>
 <div class="container">
	<div class="card">
          <div class="card-block">
            <div class="work-experience">
<table border="1" cellpadding="10" class="table" style="background-color: #fafad2">
	<tr>
		<td colspan="2" style="background-color: #fafad2"><br><h2>Data <?= $q2a["nama_pemilik"]; ?></h2></td>
	</tr>
	<tr>
		<th>Nama Pemilik</th>
		<td><?= $q2a["nama_pemilik"]; ?></td>
	</tr>
	<tr>
		<th>Alamat Kos</th>
		<td><?= $q2a["alamat_kos"]; ?></td>
	</tr>
	<tr>
		<th>No Telepon</th>
		<td><?= $q2a["no_hp"]; ?></td>
	</tr>
	<tr>
		<th>Gambar Kos<br>
			<td><img src="asset/img/<?= $q2a["foto_kos"]; ?>" width = 600><br><a href="asset/img/<?= $q2a["foto_kos"]; ?>">lihat</a></td>
		</th>
	</tr>
	<tr>
		
	</tr>
	<tr>
		<td colspan="2"><a href="kamar.php?id=<?= $id_pemilik; ?>" class="btn btn-primary">Daftar Kamar Kos</a></td>
	</tr>
	<tr>
		<td colspan="2"><a href="crud/ubah/pemilik.php?id=<?= $id_pemilik; ?>&h=a" class="btn btn-danger">ubah</a></td>
	</tr>
</table>
<br>

</div>
          </div>
        </div>
        </div>
<?php } ?>
</body>
</html>