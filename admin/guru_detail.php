<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Detail Guru";

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
            <h1 class="page-header">DETAIL GURU</h1>
            <a class="btn" href="guru.php"><span class="glyphicon glyphicon-arrow-left"></span>  Kembali</a>
          </div>
        </div>

        <?php
          include 'koneksi.php';

          $nuptk    = $_GET['id'];
          $det      = mysqli_query($koneksi,"SELECT * FROM guru WHERE nuptk='$nuptk'")or die(mysqli_error());
          while($d  = mysqli_fetch_array($det)){
        ?>

        <table class="table">
          <tr>
            <th class="col-md-3" style="text-align: left">NUPTK</th>
            <td style="text-align: left"><?php echo $d['nuptk'] ?></td>
          </tr>
          <tr>
            <th class="col-md-3" style="text-align: left">NAMA GURU</th>
            <td style="text-align: left"><?php echo $d['nm_guru'] ?></td>
          </tr>
          <tr>
            <th class="col-md-3" style="text-align: left">JENIS KELAMIN</th>
            <td style="text-align: left"><?php echo $d['jenkel'] ?></td>
          </tr>
          <tr>
            <th class="col-md-3" style="text-align: left">ALAMAT</th>
            <td style="text-align: left"><?php echo $d['alamat'] ?></td>
          </tr>
          <tr>
            <th class="col-md-3" style="text-align: left">TEMPAT, TANGGAL LAHIR</th>
            <td style="text-align: left"><?php echo $d['tmpt_lahir'] ?>, <?php $tgl_lahir = $d['tgl_lahir'];
                                                                          echo date('d M Y', strtotime($tgl_lahir)); ?></td>
          </tr>
          <tr>
            <th class="col-md-3" style="text-align: left">PENDIDIKAN</th>
            <td style="text-align: left"><?php echo $d['pendidikan'] ?></td>
          </tr>
          <tr>
            <th class="col-md-3" style="text-align: left">MULAI TUGAS</th>
            <td style="text-align: left"><?php $mulai_tugas = $d['mulai_tugas'];
                                          /*echo date('d M Y', strtotime($mulai_tugas));*/ ?></td>
          </tr>
        </table>
        <?php
          }
        ?>
      </div>
    </div>

    <?php
      //Memanggil File Js
      include 'js.php';
    ?>

    <script>
      $(document).ready(function() {
        $('#dataTables-example').DataTable({
          responsive: true
        });
      });
    </script>
  </body>
</html>
