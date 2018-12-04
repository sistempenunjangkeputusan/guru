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
                      <label class="col-lg-3 form-control-label" for="text-input">NUPTK</label>
                      <div class="col-lg-9">
                        <select input type="text" name="guru" class="form-control">
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
                        <select input type="text" name="kriteria" class="form-control">
                          <?php
                            include 'koneksi.php';
                        
                            $sel_krit = "SELECT * FROM kriteria";
                            $q = mysqli_query($koneksi, $sel_krit);
                            while($data_krit = mysqli_fetch_array($q)){
                          ?>

                          <option value="<?php echo $data_krit["kd_kriteria"] ?>"><?php echo $data_krit["nm_kriteria"] ?></option>

                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-3 form-control-label" for="text-input">NAMA SUB KRITERIA</label>
                      <div class="col-lg-9">
                        <select input type="text" id="subkrit" name="subkrit" class="form-control">
                          <option value="">Sub Kriteria</option>
                          <!-- Data Sub Kriteria -->
                        </select>
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

    <script>
      $("#kriteria").change(function(){
        // variabel dari nilai combo box Fakultas
        var kd_kriteria = $("#kriteria").val();
          // mengirim dan mengambil data
          $.ajax({
            type: "POST",
            dataType: "html",
            url: "subkrit.php",
            data: "krit="+kd_kriteria,
            success: function(msg){
              // jika tidak ada data
              if(msg == ''){
                alert('Tidak ada data');
              }
              // jika dapat mengambil data,, tampilkan di combo box subkriteria
              else{
                $("#subkrit").html(msg);
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
