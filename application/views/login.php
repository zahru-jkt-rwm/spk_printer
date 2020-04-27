<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="achmad.zahrudin">
    <meta name="description" content="Login page Simpatis">

    <title>Simpatis - Login</title>

    <!-- icon web-->
    <link rel="shortcut icon" href="<?php echo base_url()."assets/dist/img/logo1.ico"?>" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url()."assets/plugins/bootstrap/css/bootstrap.css"?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()."assets/plugins/font-awesome/css/font-awesome.css"?>" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <!--<link href="assets/css/style.css" rel="stylesheet">-->
    <link href="<?php echo base_url()."assets/dist/css/login-style-responsif.css"?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/dist/css/login-style.css"?>">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    [endif]-->
  </head>

  <body>

      <!-- ** MAIN CONTENT ** -->

	  <div id="login-page">
	  	<div class="container">
	  		<div class="lg-lgin">
	  			<p class="lg-moto">GIVING SHAPE TO IDEAS</p>>
	  		</div>
	  		  <?= form_open('autentikasi', ['class' => 'form-login'] ); ?>
		      	<div class="head-lg">
		      		<img class="img-login" src="<?php echo base_url()."assets/dist/img/logo-big-ab.png"?>" align="center">
		      	</div>
		        <div class="login-wrap">
		        	<h2 class="form-login-heading">Silahkan Log In</h2>
		        	<div class="<?php if ($eror_login != "") {echo "alert alert-danger";}?>"><?= $eror_login; ?></div>
		            <?= form_input('username', set_value('username'), ['class' => 'form-control','placeholder' =>'User Name']); ?>
		            <?= form_error('username','<div class="alert-danger">','</div>');?>
		            <br>
		            <?= form_password('password', set_value('password'), ['class' => 'form-control','placeholder' =>'Password']); ?>
		            <?= form_error('password','<div class="alert-danger">','</div>');?>
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.php#contactadmin"> Lupa Password?</a>
		                </span>
		            </label>
		            <?= form_button($button); ?>
		            <hr>

		            <div class="registration">
		                Jika Anda tidak mempunyai akun,<br/>
		                <a data-toggle="modal" href="login.php#contactadmin">
		                    Silahkan Daftar.
		                </a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Lupa Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Silahkan Masukkan Email anda untuk melakukan reset password</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btdefault" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>

		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="contactadmin" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <h4 class="modal-title">Hubungi Konica Minolta Heldesk</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Silahkan Hubungi Konica Minolta Helpdesk di +62-21-420-3888 atau di +62-21-424-8809</p>
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btdefault" type="button">Tutup</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
			  <?= form_close(); ?>
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()."assets/plugins/jQuery/jQuery-2.1.4.min.js"?>"></script>
    <script src="<?php echo base_url()."assets/plugins/bootstrap/js/bootstrap.min.js"?>"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url()."assets/plugins/jQueryBackstretch/jquery.backstretch.min.js"?>"></script>
    <script>
        $.backstretch("<?php echo base_url()."assets/dist/img/login-bg.jpg"?>", {speed: 500});
    </script>


  </body>
</html>
