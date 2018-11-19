  <?php
  // Panggil koneksi database
  require_once "config/database.php";

  if (isset($_GET['no_soal'])) {
    try {
      // sql statement untuk menampilkan data dari tabel soal berdasarkan no_soal
      $query = "SELECT * FROM soal WHERE no_soal=:no_soal";
      // membuat prepared statements
      $stmt = $pdo->prepare($query);

      //mengikat parameter
      $stmt->bindParam(':no_soal', $_GET['no_soal']);

      // eksekusi query
      $stmt->execute();

      // mengambil data Soal
      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      // nilai untuk mengisi form
      $no_soal       = $data['no_soal'];
      $soal          = $data['soal'];
      $jawaban       = $data['jawaban'];
      $pil_a         = $data['Pilihan_a'];
      $pil_b         = $data['Pilihan_b'];
      $pil_c         = $data['Pilihan_c'];
      $pil_d         = $data['Pilihan_d'];

      // tutup koneksi database
      $pdo = null;
    } catch (PDOException $e) {
      // tampilkan pesan kesalahan
      echo "ada kesalahan pada query : ".$e->getMessage();
    }
  }
  ?>

  <script type="text/javascript">
    $(function () {
      //datepicker plugin
      $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
      });
    })
  </script>

  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">
          <i class="glyphicon glyphicon-edit"></i>
          Ubah Soal
        </h4>
      </div>

      <div class="modal-body">
        <form action="proses-ubah.php" method="POST" name="modal_popup" enctype="multipart/form-data" >
          <div class="form-group">
            <label>No soal</label>
            <input type="text" class="form-control" name="no_soal" value="<?php echo $no_soal; ?>" readonly required/>
          </div>

          <div class="form-group">
            <label>Soal</label>
            <input type="text" class="form-control" name="soal" autocomplete="off" value="<?php echo $soal; ?>" required/>
          </div>

          <div class="form-group">
            <label>Jawaban</label>
            <input type="text" class="form-control" name="jawaban" autocomplete="off" value="<?php echo $jawaban; ?>" required/>
          </div>

          <div class="form-group">
            <label>Pilihan A</label>
            <input type="text" class="form-control" name="Pilihan_a" autocomplete="off" value="<?php echo $pil_a; ?>" required/>
          </div>

          <div class="form-group">
            <label>Pilihan B</label>
            <input type="text" class="form-control" name="Pilihan_b" autocomplete="off" value="<?php echo $pil_b; ?>" required/>
          </div>

          <div class="form-group">
            <label>Pilihan C</label>
            <input type="text" class="form-control" name="Pilihan_c" autocomplete="off" value="<?php echo $pil_c; ?>" required/>
          </div>

          <div class="form-group">
            <label>Pilihan D</label>
            <input type="text" class="form-control" name="Pilihan_d" autocomplete="off" value="<?php echo $pil_d; ?>" required/>
          </div>

          <div class="modal-footer">
            <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
            <button type="reset" class="btn btn-danger btn-reset" data-dismiss="modal" aria-hidden="true">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
