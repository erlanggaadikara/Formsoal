<?php
// Panggil koneksi database
require_once "config/database.php";

$no_soal = $_GET['no_soal'];

if (isset($no_soal)) {
	try {
		// sql statement untuk menghapus data pada tabel soal
        $query = "DELETE FROM soal WHERE no_soal=:no_soal";
        // membuat prepared statements
		$stmt = $pdo->prepare($query);

		//mengikat parameter
		$stmt->bindParam(':no_soal', $no_soal);

		// eksekusi query
		$stmt->execute();

        // jika berhasil tampilkan pesan berhasil delete data
		header('location: index.php?alert=3');

		// tutup koneksi database
        $pdo = null;
	} catch (PDOException $e) {
		// tampilkan pesan kesalahan
        echo "ada kesalahan : ".$e->getMessage();
	}
}
?>
