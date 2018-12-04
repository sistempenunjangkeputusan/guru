<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">Penilaian Guru</a>
  </div>

  <!-- cek Login -->
  <?php
    session_start();
    if($_SESSION['status']!="login"){
      header("location:../index.php?pesan=belum_login");
    }
  ?>

  <ul class="nav navbar-top-links navbar-right">
    <li class="dropdown">
      <?php
        //Mengambil Data Sesuai Session
        include 'koneksi.php';

        $username = $_SESSION['username'];
        $hasil = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$username'");
        while($tampil = mysqli_fetch_array($hasil)) {
      ?>

      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        <!-- Menampilkan Nama Admin -->
        <?php echo $tampil['nm_admin'];?> <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
      </a>

      <?php
        }
      ?>

      <ul class="dropdown-menu dropdown-user">
        <!-- <li>
          <a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
        </li>
        <li>
          <a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
        </li>
        <li class="divider"></li> -->
        <li>
          <a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
        </li>
      </ul>
    </li>
  </ul>

  <div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
      <ul class="nav" id="side-menu">
        <li>
          <a href="index.php"><i class="fa fa-home fa-fw"></i> Home</a>
        </li>
        <li>
          <a href="guru.php"><i class="fa fa-users fa-fw"></i> Guru</a>
        </li>
        <li>
          <a href="kriteria.php"><i class="fa fa-tasks fa-fw"></i> Kriteria</a>
        </li>
        <li>
          <a href="subkriteria.php"><i class="fa fa-bar-chart-o  fa-fw"></i> Sub Kriteria</a>
        </li>
        <li>
          <a href="penilaian.php"><i class="fa fa-check-circle-o  fa-fw"></i> Penilaian Guru</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
