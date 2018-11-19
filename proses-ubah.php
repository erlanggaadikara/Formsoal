<?php
// Panggil koneksi database
require_once "config/database.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['no_soal'])) {
		// ambil data hasil submit dari form
  	$nosoal    = trim($_POST['no_soal']);
		$tipe			 = trim($_POST['tipe']);
  	$soal      = trim($_POST['soal']);
		$lvl			 = trim($_POST['lvl']);
		$jawaban   = trim($_POST['jawaban']);
  	$pil_a   = trim($_POST['Pilihan_a']);
		$pil_b   = trim($_POST['Pilihan_b']);
		$pil_c   = trim($_POST['Pilihan_c']);
		$pil_d   = trim($_POST['Pilihan_d']);

				// sql statement untuk mengubah data pada tabel soal
		        $query = "UPDATE soal SET
												soal 			= :soal,
												jawaban 	= :jawaban,
												Pilihan_a 	= :Pilihan_a,
												Pilihan_b 	= :Pilihan_b,
												Pilihan_c 	= :Pilihan_c,
												Pilihan_d 	= :Pilihan_d
										    WHERE no_soal 			= :no_soal";
		        // membuat prepared statements
		        $stmt = $pdo->prepare($query);

		        // mengikat parameter
            $stmt->bindParam(':no_soal', $nosoal);
            $stmt->bindParam(':soal', $soal);
            $stmt->bindParam(':jawaban', $jawaban);
						$stmt->bindParam(':Pilihan_a', $pil_a);
						$stmt->bindParam(':Pilihan_b', $pil_b);
						$stmt->bindParam(':Pilihan_c', $pil_c);
						$stmt->bindParam(':Pilihan_d', $pil_d);

			// eksekusi query
	        $stmt->execute();

	        // jika berhasil tampilkan pesan berhasil update data
			header('location: index.php?alert=2');

			// tutup koneksi database
	        $pdo = null;
		} catch (PDOException $e) {
			// tampilkan pesan kesalahan
	        echo "ada kesalahan : ".$e->getMessage();
		}
	}
?>
