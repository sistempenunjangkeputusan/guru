<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Tambah Kriteria";

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
            <h1 class="page-header">TAMBAH KRITERIA</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="kriteria.php"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
              </div>

              <div class="panel-body">
                <div class="row col-lg-12">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">Kode KRITERIA</label>
                      <div class="col-lg-10">
                        <input type="text" id="text-input" name="kd_kriteria" class="form-control" placeholder="Kode KRITERIA" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">NAMA KRITERIA</label>
                      <div class="col-lg-10">
                        <input type="text" id="text-input" name="nm_kriteria" class="form-control" placeholder="NAMA KRITERIA" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">BOBOT</label>
                      <div class="col-lg-10">
                        <input type="text" id="text-input" name="bobot" class="form-control" placeholder="BOBOT" required>
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
  </body>
</html>

<?php
  include 'koneksi.php';

  if(isset($_POST['submit'])){

    $kd_kriteria = $_POST['kd_kriteria'];
    $nm_kriteria = $_POST['nm_kriteria'];
    $bobot		   = $_POST['bobot'];

    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM kriteria
                                                  WHERE nm_kriteria = '$nm_kriteria'"));

    if($cek > 0){
      echo "<script>alert('Data Yang Anda Masukkan Sudah Ada!');window.location='kriteria.php';</script>";
    }else{
      $save = mysqli_query($koneksi,"INSERT INTO kriteria
                                     VALUES('$kd_kriteria','$nm_kriteria','$bobot')");

        if ($save){
          echo "<script>alert('Data BERHASIL di Simpan!');window.location='kriteria.php';</script>";
        }else{
          echo "<script>alert('Data GAGAL di Simpan!');window.location='kriteria.php';</script>";
        }
    }
  }
?>
