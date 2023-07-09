<?php 
// Menghubungkan Database ke PHP 
$konek = mysqli_connect('localhost', 'root', '', 'db_sibela');
if (mysqli_errno($konek)) {
	echo "Database Gagal".mysqli_error();
}
function tabel($tabel){
	global $konek;
	
	$ambil = mysqli_query($konek, $tabel);
	$barisan = [];
	while ( $baris = mysqli_fetch_assoc($ambil) ) {
		$barisan[] = $baris;
	}
	return $barisan;
}

function tambah($data){
	global $konek;

	$hari = htmlspecialchars($data["hari"]);
	$jam = htmlspecialchars($data["jam"]);
	$jadwal = htmlspecialchars($data["jadwal"]);
	$audio = htmlspecialchars($data["audio"]);

	$query = "INSERT INTO tb_jadwal VALUES 
			('', '$hari','$jam','$jadwal','$audio')";
	mysqli_query($konek, $query);

	return mysqli_affected_rows($konek);
}

function hapus($id){
	global $konek;

	mysqli_query($konek, "DELETE FROM tb_jadwal WHERE id_jadwal = $id");
	return mysqli_affected_rows($konek);
}

?>