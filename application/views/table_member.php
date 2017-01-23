<?php session_start();
  if (!isset($_SESSION["berhasil_login"])) {
    redirect('login');
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="<?php echo base_url("/assets/image/icon.png") ?>" />
    <title>Sanpeko Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/admin/" ?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/admin/" ?>plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/admin/" ?>dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/admin/" ?>dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url("")."home_admin"; ?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><center><b>G</b></center></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Sanpeko's</b> Admin</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url()."assets/admin/" ?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs">Sanpeko Admin</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url()."assets/admin/" ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    <p>
                      Sanpeko
                      <small>Admin</small>
                    </p>
                  </li>
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-right">
                      <a href="<?php echo base_url()."login/proses_logout"; ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url()."assets/admin/" ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Sanpeko</p>
            </div>
          </div>
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
              <a href=<?php echo base_url()."home_admin";  ?>
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li >
            <li class=" treeview">
                <a href=<?php echo base_url()."kelola_karyawan";?>
                  <i class="fa fa-laptop"></i> <span>Kelola Karyawan</span>
                </a>
            </li>
           <li class=" treeview">
                <a href=<?php echo base_url()."kelola_pinjaman"; ?>
                  <i class="fa fa-files-o"></i> <span>Kelola Peminjaman</span>
                </a>
            </li>
              <li class=" treeview">
                <a href=<?php echo base_url()."kelola_driver"; ?>
                  <i class="fa glyphicon-scale"></i> <span>Kelola Driver</span>
                </a>
            </li>

            </li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Tabel  Karyawan
            <small>KelolaKaryawan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Kelola  Karyawan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <a href= "<?php echo base_url()."karyawan_add";?>"><button type="submit" class="btn btn-primary"> + Tambah  Karyawan</button></a>

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Kelola  Karyawan</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>id</th>
                        <th>nama</th>
                        <th>Divisi</th>
                        <th>Nomor Hp</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($data as $d) { ?>
                      <tr>
                        <td><?php echo $d['id_karyawan']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['nama_divisi']; ?></td>
                        <td><?php echo $d['no_hp_karyawan']; ?></td>
                        <td>
                          <a href="<?php echo base_url()."kelola_karyawan/edit_menu/".$d['id_karyawan']; ?>">Edit</a>
                          <a href="<?php echo base_url()."kelola_karyawan/do_delete/".$d['id_karyawan']; ?>">Delete</a>
                        </td>
                      </tr>
                      <?php } ?>
                    </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <!-- <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.0
        </div> -->
        <!-- <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved. -->
        <b>Sanpeko  2016</b>
      </footer>

      <!-- Control Sidebar -->

      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url()."assets/admin/" ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url()."assets/admin/" ?>bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="<?php echo base_url()."assets/admin/" ?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url()."assets/admin/" ?>plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="<?php echo base_url()."assets/admin/" ?>plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="<?php echo base_url()."assets/admin/" ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/admin/" ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."assets/admin/" ?>dist/js/demo.js"></script>
    <!-- page script -->
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
  </body>
</html>
