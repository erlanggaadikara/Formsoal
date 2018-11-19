<?php
// Panggil koneksi database
require_once "config/database.php";

$no_soal_cerita = $_GET['no_soal_cerita'];

if (isset($no_soal_cerita)) {
	try {
		// sql statement untuk menghapus data pada tabel soal_cerita
        $query = "DELETE FROM soal_cerita WHERE no_soal_cerita=:no_soal_cerita";
        // membuat prepared statements
		$stmt = $pdo->prepare($query);

		//mengikat parameter
		$stmt->bindParam(':no_soal_cerita', $no_soal_cerita);

		// eksekusi query
		$stmt->execute();

        // jika berhasil tampilkan pesan berhasil delete data
		header('location: index_cerita.php?alert=3');

		// tutup koneksi database
        $pdo = null;
	} catch (PDOException $e) {
		// tampilkan pesan kesalahan
        echo "ada kesalahan : ".$e->getMessage();
	}
}
?>
