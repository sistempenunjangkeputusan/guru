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
                      <th>NILAI</th>
                      <th>PILIHAN</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                      include 'koneksi.php';
                      $no = 1;

                      $data = mysqli_query($koneksi,'SELECT nilai.kd_nilai, guru.nm_guru, kriteria.nm_kriteria,
                                                            subkriteria.nm_subkriteria, nilai.nilai
                                                     FROM nilai
                                                     JOIN guru ON nilai.nuptk = guru.nuptk
                                                     JOIN kriteria ON nilai.kd_kriteria = kriteria.kd_kriteria
                                                     JOIN subkriteria ON nilai.kd_subkriteria = subkriteria.kd_subkriteria');
                      while ($tampil=mysqli_fetch_array($data)){
                    ?>

                    <tr class="odd gradeX">
                      <td align="center"><?php echo $no++; ?>.</td>
                      <td><?php echo $tampil['nm_guru']; ?></td>
                      <td><?php echo $tampil['nm_kriteria']; ?></td>
                      <td><?php echo $tampil['nm_subkriteria']; ?></td>
                      <td align="center"><?php echo $tampil['nilai']; ?></td>
                      <td align="center">
                        <a onclick="if(confirm('Yakin Ingin Menghapus Data Ini ???')){ location.href='penilaian_hapus.php?id=<?php echo $tampil['kd_nilai']; ?>' }" class="btn btn-danger">Hapus</a>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
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
