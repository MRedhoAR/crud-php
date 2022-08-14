<?php 

session_start();

if( !isset($_SESSION["login"]) ){
	header("location: login.php");
	exit;
}

require 'functions.php';

//ambil data di URL
$id = $_GET["id"];
//query data mahasiswa berdasarkan id
$karyawan = query("SELECT * FROM karyawan WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if( isset($_POST["submit"]) ) {
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0){
		//echo "<h6>data berhasil diubah!</h6>";

		//fungsi javascript
		echo "<script>
		alert('data berhasil diubah');
		document.location.href = 'index.php';
		</script>";
	}else{
		//echo "<h6>data gagal diubah!</h6>";

		//fungsi javascript
		echo "<script>
		alert('data gagal diubah');
		document.location.href = 'index.php';
		</script>";
	}
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>
	<h1>UPDATE DATA KARYAWAN</h1>

	<form action="" method="post" enctype="multipart/form-data">
		<input type="hidden" name="id" value="<?php echo $karyawan["id"]; ?>">
		<input type="hidden" name="gambarlama" value="<?php echo $karyawan["gambar"]; ?>">
		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" required value="<?php echo $karyawan["nama"]; ?>">
			</li>
			<br>
			<li>
				<label for="no_induk">No Induk : </label>
				<input type="text" name="no_induk" id="no_induk" required value="<?php echo $karyawan["no_induk"]; ?>">
			</li>
			<br>
			<li>
				<label for="bidang">Bidang : </label>
				<input type="text" name="bidang" id="bidang" required value="<?php echo $karyawan["bidang"]; ?>">
			</li>
			<br>
			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" required value="<?php echo $karyawan["email"]; ?>">
			</li>
			<br>
			<li>
				<label for="gambar">Gambar : </label>
				<br>
				<img src="foto/<?php echo $karyawan['gambar']; ?>" width="70">
				<br>
				<input type="file" name="gambar" id="gambar">
			</li>
			<br>
			<li>
				<button type="submit" name="submit"><b>Update Data</b></button>
			</li>
		</ul>
	</form>

</body>
</html>