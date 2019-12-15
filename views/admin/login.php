<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?php echo $judul_halaman; ?></title>
        <!-- Icon-->
        <link rel="icon" href="<?php echo base_url().'assets/content/logo-small.png'?>" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- CSS -->
        <link href="<?php echo base_url().'assets/admin/plugins/bootstrap/css/bootstrap.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/plugins/node-waves/waves.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/plugins/animate-css/animate.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/css/style.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/css/custom.css'?>" rel="stylesheet">
    </head>
    <body class="login-page">
        <div class="login-box">
            <div class="logo" align="center">
                <img class="logo-image" src="<?php echo base_url().'assets/content/logo.png'?>">
            </div>
            <div class="card" align="center">
                <div class="bg-orange" style="padding:20px;">
                    <h1>LOGIN</h1>
                </div>
                <div class="body">
                    <?php if(!empty($pesan)){ ?>
                        <div class="alert bg-red" role="alert" align="center">
                            <?php echo $pesan; ?>
                        </div>
                    <?php } ?>
                    <form id="sign_in" method="POST" action="<?php echo base_url().$tipe_login.'/proses_masuk'; ?>">
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">person</i>
                            </span>
                            <div class="form-line">
                                <input type="text" class="form-control" name="username" placeholder="Username" minlength="8" maxlength="16" required autofocus>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="material-icons">lock</i>
                            </span>
                            <div class="form-line">
                                <input type="password" class="form-control" name="password" placeholder="Password" minlength="8" maxlength="16" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button class="btn btn-block bg-orange waves-effect" type="submit">SIGN IN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- JavaScript -->
        <script src="<?php echo base_url().'assets/admin/plugins/jquery/jquery.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/plugins/bootstrap/js/bootstrap.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/plugins/node-waves/waves.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/plugins/jquery-validation/jquery.validate.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/js/admin.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/js/pages/examples/sign-in.js'?>"></script>
    </body>
</html>