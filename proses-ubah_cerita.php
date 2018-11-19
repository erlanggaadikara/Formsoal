<?php
// Panggil koneksi database
require_once "databasecerita.php";

if (isset($_POST['simpan'])) {
	if (isset($_POST['no_soal'])) {
		// ambil data hasil submit dari form
		$no_soal_cerita   = trim($_POST['no_soal_cerita']);
		$soal			 = trim($_POST['soalnya']);
		$lvl			 = trim($_POST['level']);
		$jawaban   = trim($_POST['jawaban']);
		$pil_a   	 = trim($_POST['pil_a']);
		$pil_b   	 = trim($_POST['pil_b']);
		$pil_c   	 = trim($_POST['pil_c']);
		$pil_d     = trim($_POST['pil_d']);

				// sql statement untuk mengubah data pada tabel soal
		        $query = "UPDATE soal_cerita SET
												soalnya 		= :soalnya,
												level			  = :level
												jawaban 	  = :jawaban,
												pil_a 	= :pil_a,
												pil_b 	= :pil_b,
												pil_c 	= :pil_c,
												pil_d 	= :pil_d
										    WHERE no_soal_cerita 			= :no_soal_cerita";
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

	        // jika berhasil tampilkan pesan berhasil update data
			header('location: index_cerita.php?alert=2');

			// tutup koneksi database
	        $pdo = null;
		} catch (PDOException $e) {
			// tampilkan pesan kesalahan
	        echo "ada kesalahan : ".$e->getMessage();
		}
?>
