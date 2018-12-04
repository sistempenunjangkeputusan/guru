<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      //Menentukan Title Yang Akan Ditampilkan
      $title = "Guru";

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
            <h1 class="page-header">GURU</h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">
              <a href="guru_add.php"><i class="fa fa-plus fa-fw"></i> Tambah Guru</a>
              </div>

              <div class="panel-body">
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>NO.</th>
                      <th>NAMA GURU</th>
                      <th>JENIS KELAMIN</th>
                      <th>ALAMAT</th>
                      <th>Nomor Telepon</th>
                      <th>PILIHAN</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      include 'koneksi.php';
                      $no = 1;

                      $data = mysqli_query($koneksi,'SELECT * FROM guru');
                      while ($tampil=mysqli_fetch_array($data)){
                    ?>
                    <tr class="odd gradeX">
                      <td align="center"><?php echo $no++; ?>.</td>
                      <td><?php echo $tampil['nm_guru']; ?></td>
                      <td><?php echo $tampil['jenkel']; ?></td>
                      <td><?php echo $tampil['alamat']; ?></td>
                      <td><?php echo $tampil['no_telp']; ?></td>
                      <td align="center">
                        <a href="guru_detail.php?id=<?php echo $tampil['nuptk']; ?>" class="btn btn-info">Detail</a>
                        <a href="guru_edit.php?id=<?php echo $tampil['nuptk']; ?>" class="btn btn-warning">Edit</a>
                        <a onclick="if(confirm('Yakin Ingin Menghapus Data Ini ???')){ location.href='guru_hapus.php?id=<?php echo $tampil['nuptk']; ?>' }" class="btn btn-danger">Hapus</a>
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
