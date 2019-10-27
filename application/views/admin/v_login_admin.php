<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2019 14:06:39 GMT -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="<?= base_url('assets/adm/images/logo_favicon.png') ?>">

    <title>SevenHead</title>

    <!--Core CSS -->
    <link href="<?php echo base_url('assets/adm/bs3/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/adm/css/bootstrap-reset.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/adm/font-awesome/css/font-awesome.css') ?>" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url('assets/adm/css/style.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/adm/css/style-responsive.css') ?>" rel="stylesheet" />
    
</head>

  <body class="login-body" style="background: #EFEFEF;">

    <div class="container">

      <form class="form-signin" method="post" action="<?php echo base_url('admin/Login_admin/aksi_login'); ?>">
        <h2 class="form-signin-heading"><b>Login</b></h2>
        <div class="login-wrap">
            <div class="user-login-info" style="background: white;">
              <?= $this->session->flashdata('pesan'); ?>
                <input type="email" class="form-control" placeholder="Email" required="required" name="admin_email" autofocus>
                <input type="password" class="form-control" placeholder="Password" required="required" name="admin_password" style="margin-top: 10px;">
            
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
          </div>
        </div>
      </form>

    </div>



    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
    <script src="<?php echo base_url('assets/adm/js/jquery.js') ?>"></script>
    <script src="<?php echo base_url('assets/adm/bs3/js/bootstrap.min.js') ?>"></script>

  </body>

<!-- Mirrored from bucketadmin.themebucket.net/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Sep 2019 14:06:39 GMT -->
</html>
