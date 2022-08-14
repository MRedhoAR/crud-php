<?php 

//koneksi ke data base
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result)){
		$rows[] = $row;
	}
	return $rows;
}

function tambah($data){
	global $conn;
	$nama = htmlspecialchars($data["nama"]);
	$no_induk = htmlspecialchars($data["no_induk"]);
	$bidang = htmlspecialchars($data["bidang"]);
	$email = htmlspecialchars($data["email"]);
	
	//upload gambar
	$gambar = upload();
	if( !$gambar ){
		return false;
	}

	$query = "INSERT INTO karyawan VALUES ('', '$nama', '$no_induk', '$bidang', '$email', '$gambar')";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function upload(){
	$namafile = $_FILES['gambar']['name'];
	$ukuranfile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpname = $_FILES['gambar']['tmp_name'];

	//cek apakah tidak ada gambar yang diupload
	if( $error === 4 ){
		echo "<script>
			alert('Pilih gambar terlebih dahulu!');
		</script>";
		return false;
	}

	//cek apakah yang diupload adalah gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$ekstensiGambar = explode('.', $namafile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));

	if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
		echo "<script>
			alert('Silahkan Upload Gambar Menggunakan ekstensi jpg, jpeg, png');
		</script>";
		return false;
	}

	//cek jika ukurannya terlalu besar
	if( $ukuranfile > 1000000 ){
		echo "<script>
			alert('Ukuran Gambar Terlalu Besar');
		</script>";
		return false;

	}

	//lolos pengecekan, gambar siap diupload
	//generane nama gambar baru
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $ekstensiGambar;

	move_uploaded_file($tmpname, 'foto/' . $namafilebaru);
	return $namafilebaru;
}

function hapus($id){
	global $conn;
	mysqli_query($conn, "DELETE FROM karyawan WHERE id = $id");
	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;
	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$no_induk = htmlspecialchars($data["no_induk"]);
	$bidang = htmlspecialchars($data["bidang"]);
	$email = htmlspecialchars($data["email"]);
	$gambarlama = htmlspecialchars($data["gambarlama"]);

	//cek apakah user pilih gambar baru atau tidak
	if( $_FILES['gambar']['error'] === 4 ){
		$gambar = $gambarlama;
	}else{
		$gambar = upload();
	}

	$query = "UPDATE karyawan SET nama = '$nama', no_induk = '$no_induk', bidang = '$bidang', email = '$email', gambar = '$gambar' WHERE id = $id";
	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function cari($keyword){
	$query = "SELECT * FROM karyawan WHERE nama LIKE '%$keyword%' OR no_induk LIKE '%$keyword%' OR bidang LIKE '%$keyword%'";
	return query($query);
}

function registrasi($data){
	global $conn;

	$username = strtolower(stripcslashes($data["username"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	//cek username sudah ada atau belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if( mysqli_fetch_assoc($result) ){
		echo "<script>
			alert('Username sudah terdaftar!');
		</script>";
		return false;
	}

	//cek konfirmasi password
	if( $password !== $password2 ){
		echo "<script>
			alert('konfirmasi password tidak sesuai!');
		</script>";
		return false;
	}
	//enkripsi password
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password')");
	return mysqli_affected_rows($conn);
}

 ?>