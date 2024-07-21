<!DOCTYPE html>
<html lang="EN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Keterlambatan Siswa</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="dist/css/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="dist/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!--jquery-ui-->
    <link rel="stylesheet" href="plugins/jQueryUI/jquery-ui.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS fixed TO GET A FIXED HEADER AND SIDEBAR LAYOUT -->
  <!-- the fixed layout is not compatible with sidebar-mini -->
  <?php include 'koneksi.php';
  session_start();
  if (isset($_SESSION['a_user'])) {
    $sqluser = "select username from admin where username='".$_SESSION['a_user']."'";
    $hasiluser = $conn->query($sqluser);
    if ($hasiluser->num_rows>=1) {
      # code...
  ?>
  <body class="hold-transition skin-blue fixed sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a href="home.php?r=beranda" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">SMA</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">Keterlambatan Siswa</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="logo UH copy.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['c_nama']?></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="logo UH copy.jpg" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['c_nama']?>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="home.php?r=beranda" class="btn btn-default btn-flat">Beranda</a>
                    </div>
                    <div class="pull-right">
                      <a href="logout.php" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <!-- =============================================== -->

      <!-- Left side column. contains the sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="" class="logo UH copy.jpg" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['c_nama']?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Siswa</span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                if ($_SESSION['b_level']=='admin') {?>
                <li><a href="home.php?r=input_siswa"><i class="fa fa-circle-o"></i> Input Siswa</a></li>
                <?php
                }
                ?>
                <li><a href="home.php?r=data_siswa"><i class="fa fa-circle-o"></i> Lihat Data Siswa</a></li>
                <?php
                if ($_SESSION['b_level']=='admin') {?>
                <li><a href="home.php?r=import_siswa"><i class="fa fa-circle-o"></i> Import Data Siswa</a></li>
                <li><a href="home.php?r=kenaikan_kelulusan_siswa"><i class="fa fa-circle-o"></i> Kenaikan Dan Kelulusan</a></li>
                <?php
                }
                ?>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Kelas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                if ($_SESSION['b_level']=='admin') {?>
                <li><a href="home.php?r=input_kelas"><i class="fa fa-circle-o"></i> Input Kelas</a></li>
                <?php
                }
                ?>
                <li><a href="home.php?r=data_kelas"><i class="fa fa-circle-o"></i> Data Kelas</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-terminal fa-stack"></i>
                <span>Transaksi</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="home.php?r=input_siswa_terlambat"><i class="fa fa-circle-o"></i> Input Siswa Terlambat</a></li>
                <li><a href="home.php?r=laporan_siswa_terlambat"><i class="fa fa-circle-o"></i> Laporan Siswa Terlambat</a></li>
              </ul>
            </li>
            <?php
            if ($_SESSION['b_level']=='admin') {?>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-wrench"></i>
                <span>Admin </span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="home.php?r=tambah_admin"><i class="fa fa-circle-o"></i> Input Admin Baru</a></li>
                <li><a href="home.php?r=lihat_admin"><i class="fa fa-circle-o"></i> Lihat Admin</a></li>
              </ul>
            </li>
            <?php
          }
            ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- =============================================== -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <?php include 'content.php';?>
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>SMA 1 SANDUBAYA SELONG | Create by Gusti Bagus Heryadi Firdaus
        </strong>
      </footer>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->
    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!--jquery-ui-->
    <script src="plugins/jQueryUI/jquery-ui.js"></script>
    <!--table2excell-->
    <script src="plugins/jquery.table2excel/jquery.table2excel.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
        });
      });
    </script>
    <script>
    $( function() {
    $( "#tgl" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
    } );
    </script>
    <script>
    $( function() {
    $( "#tgl1" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
    } );
    </script>
    <script>
    $( function() {
    $( "#tgl2" ).datepicker({ dateFormat: 'dd/mm/yy' }).val();
    } );
    </script>

    <script>
      $(function() {
        $( "#nistelat" ).autocomplete({
          source: 'search.php',

        });
    });
    </script>
    <script>
    $(function() {
        $("button").click(function(){
        $("#table2excel").table2excel({
          exclude: ".noExl",
            name: "Excel Document Name"
        });
         });
      });
    </script>
  </body>
  <?php
    }
    else{
      echo "<script>window.alert('Anda Harus Masuk Terlebih Dahulu');window.location=('login.php')</script>";
    }
  }
  else{
    echo "<script>window.alert('Anda Harus Masuk Terlebih Dahulu');window.location=('login.php')</script>";
  }
  ?>

  <?php $conn->close()?>
</html>
