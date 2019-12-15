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
        <link href="<?php echo base_url().'assets/admin/plugins/bootstrap-select/css/bootstrap-select.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/css/themes/all-themes.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/css/style.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/css/custom.css'?>" rel="stylesheet">
    </head>
    <body class="theme-orange">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="preloader">
                    <div class="spinner-layer pl-orange">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <p>Please wait...</p>
            </div>
        </div>
        <!-- End Page Loader -->
        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>
        <!-- End Overlay Sidebars -->
        <!-- Top Bar -->
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="<?php echo base_url().'kelola_kabar'; ?>">ADMIN - SAHABAT SKRIPSI</a>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                                <i class="material-icons">settings</i>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">PENGATURAN</li>
                                <li class="body" style="height: 96px;">
                                    <ul class="menu" style="height: 96px;">
                                        <li>
                                            <a href="<?php echo base_url().'pengaturan'; ?>">
                                                <div class="icon-circle bg-orange">
                                                    <i class="material-icons">settings</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>PENGATURAN</h4>
                                                    <p>Ubah Password Admin</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url().'admin/proses_keluar'; ?>">
                                                <div class="icon-circle bg-orange">
                                                    <i class="material-icons">exit_to_app</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4>LOGOUT</h4>
                                                    <p>Menuju Halaman Login</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Top Bar -->
        <!-- Left Sidebar -->
        <section>
            <aside id="leftsidebar" class="sidebar">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <a href="<?php echo base_url().'kelola_kabar'; ?>">
                                <i class="material-icons">event</i>
                                <span>Kelola Kabar</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'kelola_testimoni'; ?>">
                                <i class="material-icons">thumb_up</i>
                                <span>Kelola Testimoni</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'kelola_konsultan'; ?>">
                                <i class="material-icons">account_box</i>
                                <span>Kelola Data Konsultan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url().'kelola_pengguna'; ?>">
                                <i class="material-icons">account_box</i>
                                <span>Kelola Data Pengguna</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">attach_money</i>
                                <span>Kelola Paket</span>
                            </a>
                            <ul class="ml-menu">
                                <li>
                                    <a href="<?php echo base_url().'paket_tempat'; ?>">Paket Tempat</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url().'paket_bimbingan'; ?>">Paket Bimbingan</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Footer -->
                <div class="legal">
                    <div class="copyright">&copy; <?php echo date("Y") ?> <a href="javascript:void(0);">Sahabat Skripsi</a>.</div>
                </div>
                <!-- End Footer -->
            </aside>
        </section>
        <!-- End Left Sidebar -->