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
              <a href="#">
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
                  <i class="fa fa-files-o"></i> <span>Kelola Driver</span>
                </a>
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
            Tambah member
            <!-- <small>Preview</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Insert</a></li>
            <li class="active">Tambah member</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-push-3 col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Tambah member</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="<?php echo base_url()."karyawan_add/do_insert"; ?>" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label>ID Karyawan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan ID Member" name="id_karyawan" required>
                    </div>
                    <div class="form-group">
                      <label>Nama karyawan</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nama member" name="nama_karyawan" required>
                    </div>
                    <div class="form-group">
                      <label>Divisi</label>
                      <select class="form-control" name="divisi">
                     
                        <?php foreach ($data as $d) {
                          echo "<option value='$d[id_divisi]'>$d[nama_divisi]</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan password" name="password" required>
                    </div>
                   
                    <div class="form-group">
                      <label>akses sebagai</label><br>
                        <span class="label label-info">pilih 1 untuk admin dan pilih 2 untuk karyawan </span>

                       <select class="form-control" name="status_akses">
                        <option>1</option>
                        <option>2</option>
                   
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Nomer HP</label>
                      <textarea class="form-control" rows="1" placeholder="Masukkan Nomer HP" name="nomerhp"></textarea>
                    </div>

                    <!-- <div class="form-group">
                      <label>Gambar Makanan/Minuman</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Gambar Makanan/Minuman" name="gambar_makanan">
                    </div> -->
                    <!-- PENTING!!! -->
                   
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->
            </div><!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
            </div><!--/.col (right) -->
          </div>   <!-- /.row -->
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
    <!-- FastClick -->
    <script src="<?php echo base_url()."assets/admin/" ?>plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url()."assets/admin/" ?>dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url()."assets/admin/" ?>dist/js/demo.js"></script>
  </body>
</html>
