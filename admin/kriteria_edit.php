<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Edit Kriteria";

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
            <h1 class="page-header">EDIT KRITERIA</h1>
          </div>
        </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="kriteria.php"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
            </div>
            <?php
              include 'koneksi.php';

              $kd_kriteria	= $_GET['id'];
              $query        = mysqli_query($koneksi, "SELECT * FROM kriteria WHERE kd_kriteria='$kd_kriteria'");
              $tampil       = mysqli_fetch_array($query);
            ?>

            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">KODE KRITERIA</label>
                      <div class="col-md-10">
                        <input type="text" id="text-input" name="kd_kriteria" value="<?php echo $tampil['kd_kriteria']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">NAMA KRITERIA</label>
                      <div class="col-md-10">
                        <input type="text" id="text-input" name="nm_kriteria" class="form-control" value="<?php echo $tampil['nm_kriteria']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-2 form-control-label" for="text-input">BOBOT</label>
                      <div class="col-md-10">
                        <input type="text" id="text-input" name="bobot" class="form-control" value="<?php echo $tampil['bobot']; ?>" required>
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
  </body>
</html>

<?php
	if(isset($_POST['update'])){

    $kd_kriteria  = $_GET['id'];
    $nm_kriteria	= $_POST['nm_kriteria'];
	  $bobot    		= $_POST['bobot'];

    $update = mysqli_query($koneksi,"UPDATE kriteria SET nm_kriteria='$nm_kriteria', bobot='$bobot'
                                     WHERE kd_kriteria='$kd_kriteria'");

    if($update){
      echo "<script>alert('Data BERHASIL di Update!');window.location='kriteria.php';</script>";
    }else{
      echo "<script>alert('Data GAGAL di Update!');window.location='kriteria.php';</script>";
    }
  }
?>
