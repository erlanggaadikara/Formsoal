<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	// ambil data hasil submit dari form
	$no_soal_cerita   = trim($_POST['no_soal_cerita']);
	$soal			 = trim($_POST['soalnya']);
	$lvl			 = trim($_POST['level']);
	$jawaban   = trim($_POST['jawaban']);
	$pil_a   	 = trim($_POST['pil_a']);
	$pil_b   	 = trim($_POST['pil_b']);
	$pil_c   	 = trim($_POST['pil_c']);
	$pil_d     = trim($_POST['pil_d']);

	try {
		// sql statement untuk seleksi nim dari tabel is_mahasiswa
		$query = "SELECT no_soal_cerita FROM soal_cerita WHERE no_soal_cerita=:no_soal_cerita";
		// membuat prepared statements
		$stmt = $pdo->prepare($query);

		// mengikat parameter
		$stmt->bindParam(':no_soal_cerita', $no_soal_cerita);

		// eksekusi query
		$stmt->execute();

		$count = $stmt->rowCount();
		// jika No soal_cerita sudah ada
		if($count > 0) {
			// tampilkan pesan Nomor soal_cerita sudah ada
			header("location: index_cerita.php?no_soal_cerita=$no_soal_cerita&alert=4");
		}
		// jika nim belum ada
		else {
				  $query = "INSERT INTO soal_cerita(no_soal_cerita, soalnya, level, jawaban, pil_a, pil_b, pil_c, pil_d)
					VALUES(:no_soal_cerita, :soalnya, :level, :jawaban, :pil_a, :pil_b, :pil_c, :pil_d)";
				  // membuat prepared statements
				  $stmt = $pdo->prepare($query);

				  // mengikat parameter
					$stmt->bindParam(':no_soal_cerita', $no_soal_cerita);
					$stmt->bindParam(':soalnya', $soal_cerita);
					$stmt->bindParam(':level', $level);
					$stmt->bindParam(':jawaban', $jawaban);
					$stmt->bindParam(':pil_a', $pil_a);
					$stmt->bindParam(':pil_b', $pil_b);
					$stmt->bindParam(':pil_c', $pil_c);
					$stmt->bindParam(':pil_d', $pil_d);

						// eksekusi query
				  $stmt->execute();

			    // jika berhasil tampilkan pesan berhasil simpan data
						header('location: index_cerita.php?alert=1');



		// tutup koneksi database
        $pdo = null;
	}
}catch (PDOException $e) {
	// tampilkan pesan kesalahan
			echo "ada kesalahan : ".$e->getMessage();
		}
	}
?>
