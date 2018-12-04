<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Edit Guru";

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
            <h1 class="page-header">EDIT GURU</h1>
          </div>
        </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="guru.php"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
            </div>
            <?php
              include 'koneksi.php';

              $nuptk	= $_GET['id'];
              $query  = mysqli_query($koneksi, "SELECT * FROM guru WHERE nuptk='$nuptk'");
              $tampil = mysqli_fetch_array($query);
            ?>

            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">NUPTK</label>
                      <div class="col-md-3">
                        <input type="text" id="text-input" name="nuptk" class="form-control" maxlength="20" value="<?php echo $tampil['nuptk']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">NAMA GURU</label>
                      <div class="col-md-10">
                        <input type="text" id="text-input" name="nm_guru" class="form-control" value="<?php echo $tampil['nm_guru']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">JENIS KELAMIN</label>
                      <div class="col-lg-1">
                        <input type="radio" name="jenkel" <?php if( $tampil['jenkel']=='Pria'){echo "checked"; } ?> value="Pria"> Pria
                      </div>
                      <div class="col-lg-2">
                        <input type="radio" name="jenkel" <?php if( $tampil['jenkel']=='Wanita'){echo "checked"; } ?> value="Wanita"> Wanita
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">ALAMAT</label>
                      <div class="col-lg-10">
                        <textarea id="textarea-input" name="alamat" class="form-control" required><?php echo $tampil['alamat']; ?></textarea>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">TEMPAT LAHIR</label>
                      <div class="col-md-10">
                        <input type="text" id="text-input" name="tmpt_lahir" class="form-control" value="<?php echo $tampil['tmpt_lahir']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">TANGGAL LAHIR</label>
                      <div class="col-md-3">
                      <input type="text" class="form-control tgl_lahir" name="tgl_lahir" value="<?php echo $tampil['tgl_lahir'] ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-lg-2 form-control-label" for="text-input">PENDIDIKAN</label>
                      <div class="col-lg-3">
                        <select id="select" name="pendidikan" class="form-control">
                          <option value="">PENDIDIKAN</option>
                          <option <?php if( $tampil['pendidikan']=='SLTA'){echo "selected"; } ?> value="SLTA">SLTA</option>
                          <option <?php if( $tampil['pendidikan']=='D1'){echo "selected"; } ?> value="D1">D1</option>
                          <option <?php if( $tampil['pendidikan']=='D2'){echo "selected"; } ?> value="D2">D2</option>
                          <option <?php if( $tampil['pendidikan']=='D3'){echo "selected"; } ?> value="D3">D3</option>
                          <option <?php if( $tampil['pendidikan']=='S1'){echo "selected"; } ?> value="S1">S1</option>
                          <option <?php if( $tampil['pendidikan']=='S2'){echo "selected"; } ?> value="S2">S2</option>
                          <option <?php if( $tampil['pendidikan']=='S3'){echo "selected"; } ?> value="S3">S3</option>
                        </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">Nomor Telepon</label>
                      <div class="col-md-3">
                      <input type="text" class="form-control" name="no_telp" value="<?php echo $tampil['no_telp'] ?>">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-md-2 form-control-label" for="text-input"></label>
                      <div class="col-md-5">
                        <button type="submit" name="update" class="btn btn-primary">UPDATE</button>
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
	if(isset($_POST['update'])){

    $nuptk        = $_GET['id'];
    $nm_guru	    = $_POST['nm_guru'];
	  $jenkel    		= $_POST['jenkel'];
    $alamat    		= $_POST['alamat'];
    $tmpt_lahir   = $_POST['tmpt_lahir'];
    $tgl_lahir	  = $_POST['tgl_lahir'];
	  $pendidikan   = $_POST['pendidikan'];
    $no_tlp       = $_POST['no_telp'];

    $update = mysqli_query($koneksi,"UPDATE guru SET nm_guru='$nm_guru', jenkel='$jenkel', alamat='$alamat',
                                                     tmpt_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir',
                                                     pendidikan='$pendidikan', no_telp='$no_tlp'
                                     WHERE nuptk='$nuptk'");

    if($update){
      echo "<script>alert('Data BERHASIL di Update!');window.location='guru.php';</script>";
    }else{
      echo "<script>alert('Data GAGAL di Update!');window.location='guru.php';</script>";
    }
  }
?>
