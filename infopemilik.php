<?php 
include "koneksi.php";
$id = $_GET["id"];
$q2=mysqli_query($koneksi,"SELECT * FROM pemilik_kos WHERE id = $id");
$q2a=mysqli_fetch_assoc($q2);
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
	<title>Info Pemilik </title>
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
 			width: 200px;
 		}
 	</style>
</head>
<body>
	<br><br>
	<div class="container">
   <div class="row">
     <div class="col-xs-12">

        <div class="card">
          <div class="card-block">
            <h2>Data Pemilik Kamar Kos</h2>
            <div class="row">
              <div class="col-md-4">
                <p><img src="./asset/img/<?= $q2a["foto_kos"]; ?>" class="img-responsive" alt=""></p>
              </div>
              <div class="col-md-8">

              <table class="table">
	<tr>
		<td>Nama Pemilik</td>
		<td>:</td>
		<td><?= $q2a["nama_pemilik"]; ?></td>
	</tr>
	<tr>
		<td>Alamat Kos</td>
		<td>:</td>
		<td><?= $q2a["alamat_kos"]; ?></td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td>:</td>
		<td><?= $q2a["no_hp"]; ?></td>
	</tr>
	<tr>
		<td colspan="3"></td>
	</tr>
</table>
	<?php 
	if (isset($_GET["idk"])){
		$idk = $_GET["idk"];
	}
	$hal = (isset($_GET["h"])) ? "permintaansewa.php?id=$idk" : "index.php";
	 ?>
	<a href="<?= $hal; ?>" class="btn btn-danger">Kembali</a>
              </div>
            </div>
          </div>
        </div>

</div>
</div>
</div>
</body>
</html>