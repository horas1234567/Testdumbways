<?php 

// Koneksi ke Database

$conn = mysqli_connect("localhost","root","","phpdasar");



function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
 }


 function tambah($data){
 	global $conn;
 
	$nrp = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["category_id"]);
	$jurusan = htmlspecialchars($data["writer_id"]);

	// upload gambar
	$gambar = upload();
	if( !$gambar){
		return false;
	}

	// query insert data
	$query = "INSERT INTO book_tb
				VALUES  
				('','$id', '$nama','$category_id','$writer_id','$gambar')

				";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
 }
function upload(){
	$namaFile = $_FILES['gambar']['name'];
	$ukuranFile = $_FILES['gambar']['size'];
	$error = $_FILES['gambar']['error'];
	$tmpName = $_FILES['gambar']['tmp_name'];

	// cek apakah tidak ada gambar yang diupload
	if($error === 4){

		echo "<script>

					alert('Pilih gambar terlebih dahulu');
				</script>";
				return false;
	} 

	// cek apakah yang dipload adalah gambar
		$ekstensiGambarValid = ['jpg','jpeg','png'];
		$ekstensiGambar = explode('.', $namaFile);
		$ekstensiGambar = strtolower(end ($ekstensiGambar));
		if( !in_array($ekstensiGambar, $ekstensiGambarValid)){

			echo "<script>

					alert('Yang anda upload bukan gambar');
				</script>";
				return false;	

		}

		// cek jika ukurannya terlalu besar

		if($ukuranFile > 1000000){
			echo "<script>

					alert('Ukuran File terlalu besar');
				</script>";
				return false;

		}

		// lolos pengecekan, gambar siap diupload
		// generate nama gambar baru 
		$namaFileBaru = uniqid();
		$namaFileBaru.='.';	
		$namaFileBaru.= $ekstensiGambar;


		move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

		return $namaFileBaru;	

}


 function hapus($id){
 	global $conn;
 	mysqli_query($conn,"DELETE FROM book_tb WHERE id = $id");
 	
 	return mysqli_affected_rows($conn);
 }

function ubah($data){
	global $conn;

	$id = $data["id"];
	$nrp = htmlspecialchars($data["id"]);
	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["category_id"]);
	$jurusan = htmlspecialchars($data["writer_id"]);
	$gambarLama = htmlspecialchars($data["gambarLama"]);

	// cek apakah user pilih gambar baru atau tidak
	if($_FILES['gambar']['error'] === 4 ){
		$gambar = $gambarLama;
	} else {
 
 		$gambar =upload();

	}
	

	// query insert data
	$query = "UPDATE mahasiswa SET
				id = '$id',
				nama = '$nama',
				category_id = '$category_id',
				writer_id = '$writer_id',
				gambar = '$gambar'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}
function cari ($keyword) {

	$query = "SELECT * FROM book_tb 

			  WHERE
			  nama LIKE '%$keyword%'
			  OR id LIKE '%$keyword%' OR category_id LIKE '%$keyword%' OR writer_id LIKE '%$keyword%' "  ;
return query($query);
}

?>