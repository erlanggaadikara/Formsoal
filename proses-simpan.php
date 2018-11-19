<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	// ambil data hasil submit dari form
	$no_soal   = trim($_POST['no_soal']);
	$tipe			 = trim($_POST['tipe']);
	$soal      = trim($_POST['soal']);
	$lvl			 = trim($_POST['lvl']);
	$jawaban   = trim($_POST['jawaban']);
	$pil_a   	 = trim($_POST['Pilihan_a']);
	$pil_b   	 = trim($_POST['Pilihan_b']);
	$pil_c   	 = trim($_POST['Pilihan_c']);
	$pil_d     = trim($_POST['Pilihan_d']);

	try {
		// sql statement untuk seleksi nim dari tabel is_mahasiswa
		$query = "SELECT no_soal FROM soal WHERE no_soal=:no_soal";
		// membuat prepared statements
		$stmt = $pdo->prepare($query);

		// mengikat parameter
		$stmt->bindParam(':no_soal', $no_soal);

		// eksekusi query
		$stmt->execute();

		$count = $stmt->rowCount();
		// jika No Soal sudah ada
		if($count > 0) {
			// tampilkan pesan Nomor soal sudah ada
			header("location: index.php?no_soal=$no_soal&alert=4");
		}
		// jika nim belum ada
		else {
				  $query = "INSERT INTO soal(no_soal, tipe, lvl, soal, jawaban, Pilihan_a, Pilihan_b, Pilihan_c, Pilihan_d)
					VALUES(:no_soal,:tipe,:lvl, :soal,:jawaban, :Pilihan_a, :Pilihan_b, :Pilihan_c, :Pilihan_d)";
				  // membuat prepared statements
				  $stmt = $pdo->prepare($query);

				  // mengikat parameter
					$stmt->bindParam(':no_soal', $no_soal);
					$stmt->bindParam(':tipe',$tipe);
					$stmt->bindParam(':lvl',$lvl);
					$stmt->bindParam(':soal', $soal);
					$stmt->bindParam(':jawaban', $jawaban);
					$stmt->bindParam(':Pilihan_a', $pil_a);
					$stmt->bindParam(':Pilihan_b', $pil_b);
					$stmt->bindParam(':Pilihan_c', $pil_c);
					$stmt->bindParam(':Pilihan_d', $pil_d);

						// eksekusi query
				  $stmt->execute();

			    // jika berhasil tampilkan pesan berhasil simpan data
						header('location: index.php?alert=1');



		// tutup koneksi database
        $pdo = null;
	}
}catch (PDOException $e) {
	// tampilkan pesan kesalahan
			echo "ada kesalahan : ".$e->getMessage();
		}
	}
?>
