<?php 

require '../functions.php';

$keyword = $_GET["keyword"];
$query = "SELECT * FROM karyawan WHERE nama LIKE '%$keyword%' OR no_induk LIKE '%$keyword%' OR bidang LIKE '%$keyword%'";
$karyawan = query($query); 

 ?>

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