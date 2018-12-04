<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Tambah Sub Kriteria";

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
            <h1 class="page-header">TAMBAH SUB KRITERIA</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="subkriteria.php"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
              </div>

              <div class="panel-body">
                <div class="row col-lg-12">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">KODE SUB KRITERIA</label>
                      <div class="col-lg-9">
                        <input type="text" id="text-input" name="kd_subkriteria" class="form-control" placeholder="NAMA SUB KRITERIA" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">KRITERIA</label>
                      <div class="col-lg-9">
                        <select input type="text" name="kriteria" class="form-control">
                          <?php
                            $result1 = mysqli_query($koneksi,"SELECT kd_kriteria, nm_kriteria FROM kriteria");
                            while($row1 = mysqli_fetch_array($result1)):;?>
                              <option value="<?php echo $row1['kd_kriteria'];?>"><?php echo $row1['nm_kriteria'];?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">NAMA SUB KRITERIA</label>
                      <div class="col-lg-9">
                        <input type="text" id="text-input" name="nm_subkriteria" class="form-control" placeholder="NAMA SUB KRITERIA" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">RANGE AWAL</label>
                      <div class="col-lg-9">
                        <input type="text" id="text-input" name="rn_awal" class="form-control" placeholder="RANGE AWAL" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">RANGE AKHIR</label>
                      <div class="col-lg-9">
                        <input type="text" id="text-input" name="rn_akhir" class="form-control" placeholder="RANGE AKHIR" required>
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-3 form-control-label" for="text-input"></label>
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

    $kd_subkriteria = $_POST['kd_subkriteria'];
    $kriteria       = $_POST['kriteria'];
    $nm_subkriteria = $_POST['nm_subkriteria'];
    $rn_awal		    = $_POST['rn_awal'];
    $rn_akhir		    = $_POST['rn_akhir'];

    $cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM subkriteria
                                                  WHERE nm_subkriteria = '$nm_subkriteria'"));

    if($cek > 0){
      echo "<script>alert('Data Yang Anda Masukkan Sudah Ada!');window.location='subkriteria.php';</script>";
    }else{
      $save = mysqli_query($koneksi,"INSERT INTO subkriteria
                                     VALUES('$kd_subkriteria','$kriteria','$nm_subkriteria','$rn_awal','$rn_akhir')");

        if ($save){
          echo "<script>alert('Data BERHASIL di Simpan!');window.location='subkriteria.php';</script>";
        }else{
          echo "<script>alert('Data GAGAL di Simpan!');window.location='subkriteria.php';</script>";
        }
    }
  }
?>
