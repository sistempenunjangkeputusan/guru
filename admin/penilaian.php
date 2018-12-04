<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Penilaian Guru";

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
            <h1 class="page-header">PENILAIAN GURU</h1>
          </div>
        </div>

        <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <a href="penilaian_add.php"><i class="fa fa-plus fa-fw"></i> Tambah Penilaian Guru</a>
              </div>
              
              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>NO.</th>
                      <th>NAMA GURU</th>
                      <th>KRITERIA</th>
                      <th>SUB KRITERIA</th>
                      <th>PILIHAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="odd gradeX">
                      <td align="center">1</td>
                      <td>Budi</td>
                      <td>Pengajaran</td>
                      <td>Baik</td>
                      <td align="center">
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                    <tr class="odd gradeX">
                      <td align="center">2</td>
                      <td>Handoko</td>
                      <td>Pengajaran</td>
                      <td>Baik</td>
                      <td align="center">
                        <a href="#" class="btn btn-primary">Detail</a>
                        <a href="#" class="btn btn-warning">Edit</a>
                        <a href="#" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
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
      $(document).ready(function() {
        $('#dataTables-example').DataTable({
          responsive: true
        });
      });
    </script>
  </body>
</html>
