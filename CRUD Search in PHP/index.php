<?php 
session_start();

if( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

require 'functions.php';
$karyawan = query("SELECT * FROM Karyawan ORDER BY id DESC");

//tombol Cari ditekan
if( isset($_POST["cari"]) ){
	$karyawan = cari($_POST["keyword"]);
}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>Halaman Admin</title>
 	<style>
 		.loader {
 			width: 100px;
 			position: absolute;
 			top: 96px;
 			left: 230px;
 			display: none;
 		}
 	</style>
 </head>
 <body>
 
 	<h1>Daftar Karyawan</h1>

 	<a href="tambah.php"><h4>Tambah Data Karyawan</h4></a>

 	<form action="" method="post">
 		<input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian.." autocomplete="off" id="keyword">
 		<!-- <button type="submit" name="cari" id="tombol-cari">Cari!</button> -->
 		<img src="foto/loader.gif" class="loader">
 	</form>
 	<br>

<div id="container">
 	<table border="1" cellpadding="10" cellspacing="0">
 		
 		<tr>
 			<th>No.</th>
 			<th>Aksi</th>
 			<th>gambar</th>
 			<th>no_induk</th>
 			<th>nama</th>
 			<th>bidang</th>
 			<th>email</th>
 		</tr>

<?php $i=1; ?>
<?php foreach( $karyawan as $row ) : ?>
 		<tr>
 			<td><?php echo $i; ?></td>
 			<td>
 				<a href="ubah.php?id=<?php echo $row["id"]; ?>">update</a> | <a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Yakin Mbok Hapus?');">delete</a>
 			</td>
 			<td><img src="foto/<?php echo $row["gambar"]; ?>" width="50"></td>
 			<td><?php echo $row["no_induk"]; ?></td>
 			<td><?php echo $row["nama"]; ?></td>
 			<td><?php echo $row["bidang"]; ?></td>
 			<td><?php echo $row["email"]; ?></td>
 		</tr>
 		<?php $i++; ?>
 <?php endforeach; ?>

 	</table>
 </div>
<br><br>
 	<a href="logout.php"><b>LOGOUT</b></a>

 	 	<script src="js/jquery-3.6.0.min.js"></script>
		<script src="js/script.js"></script>

 </body>
 </html>