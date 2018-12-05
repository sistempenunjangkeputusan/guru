<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Tambah Penilaian Guru";

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
            <h1 class="page-header">TAMBAH PENILAIAN GURU</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="penilaian.php"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
              </div>

              <div class="panel-body">
                <div class="row col-lg-12">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">NAMA GURU</label>
                      <div class="col-lg-9">
                        <select name="nuptk" class="form-control">
                          <option value="">--- Pilih Guru ---</option>
                          <?php
                            include 'koneksi.php';

                            $result1 = mysqli_query($koneksi,"SELECT * FROM guru");
                            while($row1 = mysqli_fetch_array($result1)):;?>
                              <option value="<?php echo $row1['nuptk'];?>"><?php echo $row1['nm_guru'];?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">KRITERIA</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kd_kriteria" id="kd_kriteria">
                          <option value="">--- Pilih Kriteria ---</option>
                          <?php
                            include 'koneksi.php';

                            $pilih_kriteria="SELECT * FROM kriteria";
                            $q=mysqli_query($koneksi, $pilih_kriteria);
                            while($data_kriteria=mysqli_fetch_array($q)){
                          ?>
                          <option value="<?php echo $data_kriteria["kd_kriteria"] ?>"><?php echo $data_kriteria["nm_kriteria"] ?></option>

                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">SUBKRITERIA</label>
                      <div class="col-lg-9">
                        <select class="form-control" name="kd_subkriteria" id="kd_subkriteria">
                          <option value="">--- Pilih SubKriteria ---</option>
                          <!-- hasil data dari subkrit.php akan ditampilkan disini -->
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">NILAI</label>
                      <div class="col-lg-9">
                        <input type="text" class="form-control" id="nilai" name="nilai" required>
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

    <script>
      $("#kd_kriteria").change(function(){
        // variabel dari nilai combo box Kriteria
        var kd_kriteria = $("#kd_kriteria").val();
        
        // mengirim dan mengambil data
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "penilaian_cek.php",
          data: "crt="+kd_kriteria,
          success: function(msg){
            // jika tidak ada data
            if(msg == ''){
              alert('Tidak ada data Subkriteria');
            }else{
              // jika dapat mengambil data,, tampilkan di combo box subkriteria
              $("#kd_subkriteria").html(msg);
            }
          }
        });
      });
    </script>
  </body>
</html>

<?php
  include 'koneksi.php';

  if(isset($_POST['submit'])){

    $kd_nilai       = $_POST['kd_nilai'];
    $nuptk          = $_POST['nuptk'];
    $kd_kriteria    = $_POST['kd_kriteria'];
    $kd_subkriteria = $_POST['kd_subkriteria'];
    $nilai		      = $_POST['nilai'];

    $save = mysqli_query($koneksi,"INSERT INTO nilai
                                   VALUES('','$nuptk','$kd_kriteria','$kd_subkriteria','$nilai')");

    if ($save){
      echo "<script>alert('Data BERHASIL di Simpan!');window.location='penilaian.php';</script>";
    }else{
      echo "<script>alert('Data GAGAL di Simpan!');window.location='penilaian.php';</script>";
    }
  }
?>
