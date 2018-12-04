<?php
  include 'koneksi.php';

  $kd_kriteria = $_GET['id'];

  $query       = "SELECT * FROM kriteria WHERE kd_kriteria='$kd_kriteria'";
  $sql         = mysqli_query($koneksi,$query);
  $data        = mysqli_fetch_array($sql);
  
  $delete = mysqli_query($koneksi,"DELETE FROM kriteria WHERE kd_kriteria='$kd_kriteria'");

  if ($delete){
    echo "<script>alert('Data BERHASIL di Hapus!');window.location='kriteria.php';</script>";
  }else{
    echo "<script>alert('Data GAGAL di Hapus!');window.location='kriteria.php';</script>";
  }
?>