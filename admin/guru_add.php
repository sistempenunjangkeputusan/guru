<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Tambah Guru";

      //Memanggil File Header
      include 'header.php';
    ?>
  </head>

  <body>
    <div id="wrapper">
      <?php
        //Memanggil File NavBar
        include 'navbar.php';
      ?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">TAMBAH GURU</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="guru.php"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
              </div>

              <div class="panel-body">
                <div class="row col-lg-12">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">NUPTK</label>
                      <div class="col-lg-3">
                        <input type="text" id="text-input" name="nuptk" class="form-control" placeholder="NUPTK" maxlength="20" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">NAMA GURU</label>
                      <div class="col-lg-10">
                        <input type="text" id="text-input" name="nm_guru" class="form-control" placeholder="NAMA GURU" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">JENIS KELAMIN</label>
                      <div class="col-lg-1">
                        <input type="radio" name="jenkel" value="Pria" checked> Pria
                      </div>
                      <div class="col-lg-2">
                        <input type="radio" name="jenkel" value="Wanita"> Wanita
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">ALAMAT</label>
                      <div class="col-lg-10">
                        <textarea id="textarea-input" name="alamat" class="form-control" placeholder="ALAMAT" required></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">TEMPAT LAHIR</label>
                      <div class="col-lg-10">
                        <input type="text" id="text-input" name="tmpt_lahir" class="form-control" placeholder="TEMPAT LAHIR" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">TANGGAL LAHIR</label>
                      <div class="col-lg-3">
                        <input type="date" id="text-input" name="tgl_lahir" class="form-control tgl_lahir" placeholder="TANGGAL LAHIR">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">PENDIDIKAN</label>
                      <div class="col-lg-3">
                        <select id="select" name="pendidikan" class="form-control">
                          <option value="">PENDIDIKAN</option>
                          <option value="SLTA">SLTA</option>
                          <option value="D1">D1</option>
                          <option value="D2">D2</option>
                          <option value="D3">D3</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">Nomor Telepon</label>
                      <div class="col-lg-3">
                        <input type="text" id="text-input" name="no_telp" class="form-control" placeholder="Nomor Telepon" maxlength="13" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="text-input"></label>
                      <div class="col-md-5">
                        <button type="submit" name="submit" class="btn btn-primary">SIMPAN</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      //Memanggil File Js
      include 'js.php';
    ?>

    <script>
      //DatePicker Tanggal Lahir
      $(document).ready(function () {
        $('.tgl_lahir').datepicker({
          format: "yyyy-mm-dd",
          autoclose:true
        });
      });

      //DatePicker Mulai Tugas
      // $(document).ready(function () {
      //   $('.mulai_tugas').datepicker({
      //     format: "yyyy-mm-dd",
      //     autoclose:true
      //   });
      // });
    </script>
  </body>
</html>

<?php
  include 'koneksi.php';

  if(isset($_POST['submit'])){

    $nuptk        = $_POST['nuptk'];
    $nm_guru      = $_POST['nm_guru'];
    $jenkel		  	= $_POST['jenkel'];
    $alamat    	  = $_POST['alamat'];
    $tmpt_lahir 	= $_POST['tmpt_lahir'];
    $tgl_lahir    = $_POST['tgl_lahir'];
    $pendidikan   = $_POST['pendidikan'];
    $no_telp       = $_POST['no_telp'];

    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM guru
                                                  WHERE nuptk = '$nuptk' AND nm_guru = '$nm_guru'"));

    if($cek > 0){
      echo "<script>alert('Data Yang Anda Masukkan Sudah Ada!');window.location='guru.php';</script>";
    }else{
      $save = mysqli_query($koneksi,"INSERT INTO guru
                                    VALUES('$nuptk','$nm_guru','$jenkel','$alamat',
                                            '$tmpt_lahir','$tgl_lahir','$pendidikan','$no_telp')");

        if ($save){
          echo "<script>alert('Data BERHASIL di Simpan!');window.location='guru.php';</script>";
        }else{
          echo "<script>alert('Data GAGAL di Simpan!');window.location='guru.php';</script>";
        }
    }
  }
?>
