<?php
  include 'koneksi.php';

  $kd_nilai = $_GET['id'];

  $query = "SELECT * FROM nilai WHERE kd_nilai='$kd_nilai'";
  $sql   = mysqli_query($koneksi,$query);
  $data  = mysqli_fetch_array($sql);
  
  $delete = mysqli_query($koneksi,"DELETE FROM nilai WHERE kd_nilai='$kd_nilai'");

  if ($delete){
    echo "<script>alert('Data BERHASIL di Hapus!');window.location='penilaian.php';</script>";
  }else{
    echo "<script>alert('Data GAGAL di Hapus!');window.location='penilaian.php';</script>";
  }
?>