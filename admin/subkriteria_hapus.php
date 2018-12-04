<?php
  include 'koneksi.php';

  $kd_subkriteria = $_GET['id'];

  $query          = "SELECT * FROM subkriteria WHERE kd_subkriteria='$kd_subkriteria'";
  $sql            = mysqli_query($koneksi,$query);
  $data           = mysqli_fetch_array($sql);
  
  $delete = mysqli_query($koneksi,"DELETE FROM subkriteria WHERE kd_subkriteria='$kd_subkriteria'");

  if ($delete){
    echo "<script>alert('Data BERHASIL di Hapus!');window.location='subkriteria.php';</script>";
  }else{
    echo "<script>alert('Data GAGAL di Hapus!');window.location='subkriteria.php';</script>";
  }
?>