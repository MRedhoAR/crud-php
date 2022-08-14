<?php 

session_start();

if( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

require 'functions.php';

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	//cek apakah data berhasil ditambahkan atau tidak
	if( tambah($_POST) > 0){
		//echo "<h6>data berhasil ditambahkan!</h6>";

		//fungsi javascript
		echo "<script>
		alert('data berhasil ditambahkan');
		document.location.href = 'index.php';
		</script>";
	}else{
		//echo "<h6>data gagal ditambahkan!</h6>";

		//fungsi javascript
		echo "<script>
		alert('data gagal ditambahkan');
		document.location.href = 'index.php';
		</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Tambah Data</title>
</head>
<body>
	<h1>TAMBAH DATA KARYAWAN</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required>
			</li>
			<br>
			<li>
				<label for="no_induk">No Induk : </label>
				<input type="text" name="no_induk" id="no_induk" required>
			</li>
			<br>
			<li>
				<label for="bidang">Bidang : </label>
				<input type="text" name="bidang" id="bidang" required>
			</li>
			<br>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required>
			</li>
			<br>
			<li>
				<label for="gambar">Gambar : </label>
				<input type="file" name="gambar" id="gambar">
			</li>
			<br>
			<li>
				<button type="submit" name="submit"><b>Tambahkan Data</b></button>
			</li>
		</ul>
	</form>

</body>
</html>