<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Edit Sub Kriteria";

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
            <h1 class="page-header">EDIT SUB KRITERIA</h1>
          </div>
        </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              <a href="subkriteria.php"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
            </div>
            <?php
              include 'koneksi.php';

              $kd_subkriteria	= $_GET['id'];
              $query            = mysqli_query($koneksi, "SELECT * FROM subkriteria WHERE kd_subkriteria='$kd_subkriteria'");
              $tampil           = mysqli_fetch_array($query);
            ?>

            <div class="panel-body">
              <div class="row">
                <div class="col-lg-12">
                  <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" id="text-input" name="kd_subkriteria" value="<?php echo $tampil['kd_subkriteria']; ?>">

                    <div class="form-group">
                      <label class="col-md-3 form-control-label" for="text-input">NAMA SUB KRITERIA</label>
                      <div class="col-md-9">
                        <input type="text" id="text-input" name="nm_subkriteria" class="form-control" value="<?php echo $tampil['nm_subkriteria']; ?>" required>
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
                      <label class="col-md-3 form-control-label" for="text-input">RANGE AWAL</label>
                      <div class="col-md-9">
                        <input type="text" id="text-input" name="rn_awal" class="form-control" value="<?php echo $tampil['rn_awal']; ?>" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-3 form-control-label" for="text-input">RANGE AKHIR</label>
                      <div class="col-md-9">
                        <input type="text" id="text-input" name="rn_akhir" class="form-control" value="<?php echo $tampil['rn_akhir']; ?>" required>
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

    $kd_subkriteria = $_GET['id'];
    $nm_subkriteria	= $_POST['nm_subkriteria'];
    $rn_awal    		= $_POST['rn_awal'];
    $rn_akhir    		= $_POST['rn_akhir'];

    $update = mysqli_query($koneksi,"UPDATE subkriteria SET nm_subkriteria='$nm_subkriteria',
                                                            rn_awal='$rn_awal', rn_akhir='$rn_akhir'
                                     WHERE kd_subkriteria='$kd_subkriteria'");

    if($update){
      echo "<script>alert('Data BERHASIL di Update!');window.location='subkriteria.php';</script>";
    }else{
      echo "<script>alert('Data GAGAL di Update!');window.location='subkriteria.php';</script>";
    }
  }
?>
