
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-user"></i> Welcome Admin

          <a class="btn btn-success pull-right" href="#" data-target="#modal_tambah" data-toggle="modal">
            <i class="glyphicon glyphicon-plus"></i> Tambah Soal Cerita
          </a>
        </h4>
        <h4>
          <a class="btn btn-success pull-center" href="index.php">Soal Operasi Matematika -></a>
        </h4>
      </div>

  <?php
  // fungsi untuk menampilkan pesan
  // jika alert = "" (kosong)
  // tampilkan pesan "" (kosong)
  if (empty($_GET['alert'])) {
    echo "";
  }
  // jika alert = 1
  // tampilkan pesan Sukses "Mahasiswa baru berhasil disimpan"
  elseif ($_GET['alert'] == 1) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Soal berhasil disimpan.
          </div>";
  }
  // jika alert = 2
  // tampilkan pesan Sukses "Mahasiswa berhasil diubah"
  elseif ($_GET['alert'] == 2) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Soal berhasil diubah.
          </div>";
  }
  // jika alert = 3
  // tampilkan pesan Sukses "Mahasiswa berhasil dihapus"
  elseif ($_GET['alert'] == 3) {
    echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Soal berhasil dihapus.
          </div>";
  }
  // jika alert = 4
  // tampilkan pesan Gagal "no_soal_cerita sudah ada"
  elseif ($_GET['alert'] == 4) {
    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Gagal!</strong> no_soal_cerita $_GET[no_soal_cerita] sudah ada.
          </div>";
  }
  // jika alert = 5
  // tampilkan pesan Upload Gagal "Pastikan file yang diupload sudah benar"
  elseif ($_GET['alert'] == 5) {
  echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Upload Gagal!</strong> Pastikan file yang diupload sudah benar.
          </div>";
  }
  // jika alert = 6
  // tampilkan pesan Upload Gagal "Pastikan ukuran file foto tidak lebih dari 1MB"
  elseif ($_GET['alert'] == 6) {
  echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Upload Gagal!</strong> Pastikan ukuran file foto tidak lebih dari 1MB.
          </div>";
  }
  // jika alert = 7
  // tampilkan pesan Upload Gagal "Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG"
  elseif ($_GET['alert'] == 7) {
  echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-remove-circle'></i> Upload Gagal!</strong> Pastikan file yang diupload bertipe *.JPG, *.JPEG, *.PNG.
          </div>";
  }
  ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Soal Cerita Itung-itungan</h3>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-hover" id="dataTables-example">
            <thead>
              <tr>
                <th>No Soal</th>
                <th>Soal</th>
                <th>Level</th>
                <th>jawaban</th>
                <th>A</th>
                <th>B</th>
                <th>C</th>
                <th>D</th>
              <th></th>
              </tr>
            </thead>

            <tbody>
            <?php
            try {
              $no = 1;

              // sql statement untuk menampilkan semua data dari tabel soal
              $query = "SELECT * FROM soal_cerita ORDER BY no_soal_cerita DESC";
              // membuat prepared statements
              $stmt = $pdo->prepare($query);

              // eksekusi query
              $stmt->execute();

              // tampilkan data
              while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {

                echo "  <td width='60'>$data[no_soal_cerita]</td>
                        <td width='60'>$data[soalnya]</td>
                        <td width='60'>$data[level]</td>
                        <td width='60'>$data[jawaban]</td>
                        <td width='60'>$data[pil_a]</td>
                        <td width='60'>$data[pil_b]</td>
                        <td width='60'>$data[pil_c]</td>
                        <td width='60'>$data[pil_d]</td>

                        <td width='100'>
                          <div class=''>
                            <a href='#' data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-success btn-sm open_modal' id='$data[no_soal_cerita]' >
                              <i class='glyphicon glyphicon-edit'></i>
                            </a>";
                ?>
                            <a href="#" onclick="confirm_modal('proses-hapus.php?&no_soal_cerita=<?php echo $data['no_soal_cerita']; ?>');" data-no_soal_cerita="<?php echo $data['no_soal_cerita']; ?>" data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm">
                              <i class="glyphicon glyphicon-trash"></i>
                            </a>
              <?php
                echo "
                          </div>
                        </td>
                      </tr>";
                $no++;
              }

              // tutup koneksi database
              $pdo = null;
            } catch (PDOException $e) {
              // tampilkan pesan kesalahan
              echo "ada kesalahan pada query : ".$e->getMessage();
            }
            ?>
            </tbody>
          </table>
        </div>
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->

  <!-- Modal Popup untuk tambah-->
  <div id="modal_tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title" id="myModalLabel">
            <i class="glyphicon glyphicon-edit"></i>
            Masukan Soal
          </h4>
        </div>

        <div class="modal-body">
          <form action="proses-simpan.php" method="POST" name="modal_popup" enctype="multipart/form-data">

            <div class="form-group">
              <label>Nomor Soal</label>
              <input type="text" class="form-control" name="no_soal_cerita" autocomplete="off" required/>
            </div>

            <div class="form-group">
              <label>Soal</label>
              <input type="text" class="form-control" name="soalnya" autocomplete="off" required/>
            </div>

            <div class="form-group">
              <label>Level</label>
              <select class="form-control" name="level" placeholder="Pilih Level" required>
                <option value="1">Mudah</option>
                <option value="2">Menengah</option>
                <option value="3">Sulit</option>
              </select>
            </div>

           <div class="form-group">
              <label>Jawaban</label>
              <input type="text" class="form-control" name="jawaban" autocomplete="off" required/>
          </div>

          <div class="form-group">
             <label>Pilihan A</label>
             <input type="text" class="form-control" name="pil_a" autocomplete="off" required/>
         </div>

         <div class="form-group">
            <label>Pilihan B</label>
            <input type="text" class="form-control" name="pil_b" autocomplete="off" required/>
        </div>

        <div class="form-group">
           <label>Pilihan C</label>
           <input type="text" class="form-control" name="pil_c" autocomplete="off" required/>
       </div>

       <div class="form-group">
          <label>Pilihan D</label>
          <input type="text" class="form-control" name="pil_d" autocomplete="off" required/>
      </div>

            <div class="modal-footer">
              <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
              <button type="reset" class="btn btn-danger btn-reset" data-dismiss="modal" aria-hidden="true">Batal</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Popup untuk ubah-->
  <div id="modal_ubah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

  </div>

  <!-- Modal Popup untuk hapus -->
  <div class="modal fade" id="modal_hapus">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title"><i style="margin-right:7px" class="glyphicon glyphicon-trash"></i> Anda yakin ingin menghapus Soal ?</h4>
        </div>
        <div class="modal-footer">
          <a href="#" type="button" class="btn btn-danger btn-submit" id="link_hapus">Ya, Hapus</a>
          <button type="button" class="btn btn-default btn-reset" data-dismiss="modal">Batal</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
