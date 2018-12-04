<?php
  session_start();
  include 'admin/koneksi.php';

  //Mengambil Data Dari Form Login
  $username = $_POST['username'];
  $password = $_POST['password'];

  //Cek Username & Password di Database
  $data = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username' AND password='$password'");
  $cek = mysqli_num_rows($data);

  if($cek > 0) {
    $_SESSION['username'] = $username;
    
	  $_SESSION['status'] = "login";
	  header("location:admin/index.php");
  } else {
	  header("location:index.php?pesan=gagal");
  }
?>