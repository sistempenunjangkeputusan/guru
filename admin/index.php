<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Home";

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
            <h1 class="page-header">HOME</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">
                      <?php
                        $a=mysqli_query($koneksi,"SELECT COUNT(nuptk) AS Jumlah FROM guru");
                        $b=mysqli_fetch_array($a);
                        echo $b['Jumlah'];
                      ?>
                    </div>
                    <div>Jumlah Guru</div>
                  </div>
                </div>
              </div>
              <a href="guru.php">
                <div class="panel-footer">
                  <span class="pull-left">Lihat</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">
                      <?php
                        $a=mysqli_query($koneksi,"SELECT COUNT(kd_kriteria) AS Jumlah FROM kriteria");
                        $b=mysqli_fetch_array($a);
                        echo $b['Jumlah'];
                      ?>
                    </div>
                    <div>Jumlah Kriteria</div>
                  </div>
                </div>
              </div>
              <a href="kriteria.php">
                <div class="panel-footer">
                  <span class="pull-left">Lihat</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="panel panel-yellow">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-bar-chart-o fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                    <div class="huge">
                      <?php
                        $a=mysqli_query($koneksi,"SELECT COUNT(kd_subkriteria) AS Jumlah FROM subkriteria");
                        $b=mysqli_fetch_array($a);
                        echo $b['Jumlah'];
                      ?>
                    </div>
                    <div>Jumlah Sub Kriteria</div>
                  </div>
                </div>
              </div>
              <a href="subkriteria.php">
                <div class="panel-footer">
                  <span class="pull-left">Lihat</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
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
