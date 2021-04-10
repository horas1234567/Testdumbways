<?php 
require 'functions.php';

	// Ambil data di URL
	$id = $_GET["id"];
	// query data mahasiswa berdasarkan id 
	$mhs = query("SELECT * FROM book_tb WHERE id = $id") [0]; 

//cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["submit"]) ) {
	

// cek apakah data berhasil di ubah atau tidak
if ( ubah($_POST) > 0  ) {
	echo "
	<script>
		alert('data berhasil di diubah!');
		document.location.href = 'index.php';
	</script>
	";
} else {
	echo "<script>
		alert('data gagal di ubah!');
		document.location.href = 'index.php';
	</script>";
 }


}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Ubah data </title>
</head>
<body>

	<h1>Ubah data </h1>

	<form action="" method="post" enctype="multipart/form-data"> 
		<input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?= $mhs["gambar"]; ?>">
	 	
	 	<ul>
			<li>
				<label for="id"> ID :</label>
				<input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
			</li>
			<li>
				<label for="nama"> Nama :</label>
				<input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
			</li>
			<li>
				<label for="category_id"> category_id :</label>
				<input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
			</li>
			<li>
				<label for="writer_id"> writer_id :</label>
				<input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
			</li>
			<br>	
			<li>
				<label for="gambar"> Gambar :</label> <br>	
				<img src="img/<?= $mhs['gambar'];?>" width = "60"><br>	
				<input type="file" name="gambar" id="gambar" >
			</li>
			<br>	
			<li>
				<button type="submit" name="submit">ubah Data!</button>
			</li>
		</ul>


	</form>

</body>
</html>