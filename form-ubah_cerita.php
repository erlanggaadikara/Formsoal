  <?php
  // Panggil koneksi database
  require_once "config/database.php";

  if (isset($_GET['no_soal_cerita'])) {
    try {
      // sql statement untuk menampilkan data dari tabel soal berdasarkan no_soal
      $query = "SELECT * FROM soal_cerita WHERE no_soal_cerita=:no_soal_cerita";
      // membuat prepared statements
      $stmt = $pdo->prepare($query);

      //mengikat parameter
      $stmt->bindParam(':no_soal_cerita', $_GET['no_soal_cerita']);

      // eksekusi query
      $stmt->execute();

      // mengambil data Soal
      $data = $stmt->fetch(PDO::FETCH_ASSOC);

      // nilai untuk mengisi form
      $no_soal_cerita       = $data['no_soal_cerita'];
      $soalnya              = $data['soalnya'];
      $level                = $data['level'];
      $jawaban       = $data['jawaban'];
      $pil_a         = $data['pil_a'];
      $pil_b         = $data['pil_b'];
      $pil_c         = $data['pil_c'];
      $pil_d         = $data['pil_d'];

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
            <input type="text" class="form-control" name="no_soal" value="<?php echo $no_soal_cerita; ?>" readonly required/>
          </div>

          <div class="form-group">
            <label>Soal</label>
            <input type="text" class="form-control" name="soal" autocomplete="off" value="<?php echo $soalnya; ?>" required/>
          </div>

          <div class="form-group">
            <label>Jawaban</label>
            <input type="text" class="form-control" name="jawaban" autocomplete="off" value="<?php echo $jawaban; ?>" required/>
          </div>

          <div class="form-group">
            <label>pil A</label>
            <input type="text" class="form-control" name="pil_a" autocomplete="off" value="<?php echo $pil_a; ?>" required/>
          </div>

          <div class="form-group">
            <label>pil B</label>
            <input type="text" class="form-control" name="pil_b" autocomplete="off" value="<?php echo $pil_b; ?>" required/>
          </div>

          <div class="form-group">
            <label>pil C</label>
            <input type="text" class="form-control" name="pil_c" autocomplete="off" value="<?php echo $pil_c; ?>" required/>
          </div>

          <div class="form-group">
            <label>pil D</label>
            <input type="text" class="form-control" name="pil_d" autocomplete="off" value="<?php echo $pil_d; ?>" required/>
          </div>

          <div class="modal-footer">
            <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
            <button type="reset" class="btn btn-danger btn-reset" data-dismiss="modal" aria-hidden="true">Batal</button>
          </div>
        </form>
      </div>
    </div>
  </div>
