<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="achmad.zahrudin">
    <meta name="description" content="Welcome Simpatis">

    <title><?= $title; ?></title>
    <!-- icon web-->
    <link rel="shortcut icon" href="<?= base_url()."assets/dist/img/logo1.ico";?>" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?= base_url()."assets/plugins/bootstrap/css/bootstrap.min.css";  ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url()."assets/dist/css/AdminLTE.min.css";  ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url()."assets/dist/css/skins/skin-black.css";  ?>">
    <!-- Load Costume Style -->
    <link rel="stylesheet" href="<?php echo base_url()."assets/dist/css/wellcome-style.css";?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
  <body class="hold-transition skin-black layout-top-nav">
  	<div class="wrapper">
      <!-- Header -->
  	  <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <?= anchor(base_url(),'<img style="max-width: 50px" src="'.base_url().'assets/dist/img/logo-ico.png">  KONICA MINOLTA',['class'=>'logo']) ?>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </div>

            <!-- Navbar Menu -->
              <div class="collapse navbar-collapse navbar-custom-menu" id="navbar-collapse">
                <ul class="nav navbar-nav">
                  <?php foreach ($infomenu as $info) { ?>
                    <li><?= anchor($info->url, $info->judul); ?></li>
                  <?php } ?>
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <!-- hidden-xs hides the username on small devices so only the image appears. -->
                      <span>Log in</span>
                    </a>
                    <ul class="dropdown-menu">
                      <!-- Menu Body -->
                      <li class="user-body">
                        <?=form_open('autentikasi')?>
                          <div class="form-group has-feedback">
                            <?= form_input('username', set_value('username'), ['class' => 'form-control','placeholder' =>'Username']); ?>
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                          </div>
                          <div class="form-group has-feedback">
                            <?= form_password('password', set_value('password'), ['class' => 'form-control','placeholder' =>'Password']); ?>
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                          </div>
                          <div class="row">
                            <div class="col-xs-1"></div>
                            <div class="col-xs-6">
                              <div class="checkbox icheck">
                                <label>
                                  <?= anchor('welcome.php#lupapassword','Lupas Password',['data-toggle'=>'modal'])?>
                                </label>
                              </div>
                            </div><!-- /.col -->
                            <div class="col-xs-4">
                              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                            </div><!-- /.col -->
                          </div>
                        <?=form_close()?>
                      </li>
                      <!-- Menu Footer-->
                      <li class="user-footer">
                        <div align="center">
                          <?= anchor('walcome.php#daftar','Daftar Baru',['data-toggle'=>'modal'])?>        
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-custom-menu -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Carousel -->
                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                      <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                      <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="item active">
                        <img src="<?php echo base_url()."assets/dist/img/banner-1.png"; ?>" alt="First slide">
                        <div class="carousel-caption">
                          
                        </div>
                      </div>
                      <div class="item">
                        <img src="<?php echo base_url()."assets/dist/img/banner-2.png"; ?>" alt="Second slide" >
                        <div class="carousel-caption">
                          
                        </div>
                      </div>
                      <div class="item">
                        <img src="<?php echo base_url()."assets/dist/img/banner-3.png"; ?>" alt="Third slide">
                        <div class="carousel-caption">
                          
                        </div>
                      </div>
                    </div>
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                      <span class="fa fa-angle-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                      <span class="fa fa-angle-right"></span>
                    </a>
                  </div>
      <!-- End of Corousel -->
      <!-- Konten Row -->
      <div class="box">
        <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <img class="img-circle" src="<?= base_url().'assets/dist/img/bizhubc360.png' ?>" alt="Generic placeholder image" width="140" height="140">
            <h2>Tentang Produk</h2>
            <p>Spesifisikasi , System Tambahan, dan Pengetahuan Bizhub C360 Series</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="img-circle" src="<?= base_url().'assets/dist/img/driver_software.png' ?>" alt="Generic placeholder image" width="140" height="140">
            <h2>Dukungan Software</h2>
            <p>Download Driver dan Software Utilitas untuk Bizhub C360 Series</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <img class="img-circle" src="<?= base_url().'assets/dist/img/service.png' ?>" alt="Generic placeholder image" width="140" height="140">
            <h2>Dukungan Pakar</h2>
            <p>Solusi pakar dalam perbaikan trouble / permasalah Bizhub C360 Series</p>
            <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
        </div><!-- /.container -->
      </div>

      <!-- Modal -->
      <div id="daftar" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4>Daftar Baru</h4>
            </div>
            <div class="modal-body">
              <p>Silahkan Hubungi Konica Minolta Helpdesk di +62-21-420-3888 atau di +62-21-424-8809</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>

      <div id="lupapassword" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <?= form_button('tutup','&times;',['class'=>'close','data-dismiss'=>'modal']); ?>
              <h4>Lupa Password</h4>
            </div>
            <?= form_open('autentikasi/lupapassword');?>
            <div class="modal-body">
              <div class="form-group">
                <?= form_label('Masukkan Email','email',['class'=>'label-control']);?>
                <?= form_input('email', set_value('value'), ['class'=>'form-control']);?>
              </div>
            </div>
            <div class="modal-footer">
              <?= form_submit('lupapassword', 'Lupa Password',['class'=>'btn btn-info']);?>
            </div>
            <? form_close();?>
          </div>
        </div>
      </div>
      <!-- End Of Modal -->

      <footer class="main-footer">
        <div class="container">
        <strong>Copyright &copy; 2017 <a href="mailto:achmad.zahrudin@perdana.biz">Achmad.Zahrudin&#64;Konica Minolta</a>.</strong> All rights reserved.
        </div>
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?= base_url()."assets/plugins/jQuery/jQuery-2.1.4.min.js";  ?>"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?= base_url()."assets/plugins/bootstrap/js/bootstrap.min.js";  ?>"></script>
    <!-- FastClick -->
    <script src="<?= base_url()."assets/plugins/fastclick/fastclick.min.js";  ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url()."assets/dist/js/app.min.js";  ?>"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?= base_url()."assets/plugins/slimScroll/jquery.slimscroll.min.js";  ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url()."assets/disassets/t/js/demo.js";  ?>"></script>
  </body>
</html>
