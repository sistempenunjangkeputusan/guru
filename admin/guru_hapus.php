<?php
  include 'koneksi.php';

  $nuptk = $_GET['id'];

  $query = "SELECT * FROM guru WHERE nuptk='$nuptk'";
  $sql   = mysqli_query($koneksi,$query);
  $data  = mysqli_fetch_array($sql);
  
  $delete = mysqli_query($koneksi,"DELETE FROM guru WHERE nuptk='$nuptk'");

  if ($delete){
    echo "<script>alert('Data BERHASIL di Hapus!');window.location='guru.php';</script>";
  }else{
    echo "<script>alert('Data GAGAL di Hapus!');window.location='guru.php';</script>";
  }
?>