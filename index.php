<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LOGIN ADMIN</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin/assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="admin/assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <div class="image">
            <img src="admin/assets/images/smaht1.jpg" class="img-responsive center-block" alt="SMA Hang Tuah 1" width="200" height="200">
          </div>
          <div class="login-panel panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title" align="center">SILAKAN LOGIN</h3>
            </div>

            <div class="panel-body">
              <!-- Notifikasi Login -->
            <?php
              if(isset($_GET['pesan'])) {
                if($_GET['pesan'] == "gagal") {
                  echo
                    "<div class='alert alert-warning'>
                      <center>Username atau Password Salah</center>
                    </div>";
                } else if($_GET['pesan'] == "logout") {
                  echo
                    "<div class='alert alert-success'>
                      <center>Anda Berhasil Logout</center>
                    </div>";
                } else if($_GET['pesan'] == "belum_login") {
                  echo
                    "<div class='alert alert-danger'>
                      <center>Anda Belum Login</center>
                    </div>";
                }
              }
            ?>
              <form role="form" method="POST" action="login.php">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="Masukkan Username" name="username" type="text">
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Masukkan Password" name="password" type="password">
                  </div>

                  <!-- Change this to a button or input when using this as a form -->
                  <input type="submit" class="btn btn-lg btn-success btn-block" value="LOGIN">
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script src="admin/assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin/assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin/assets/dist/js/sb-admin-2.js"></script>
  </body>
</html>
