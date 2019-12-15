<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>Chat | Sahabat Skripsi</title>
        <!-- Icon-->
        <link rel="icon" href="<?php echo base_url().'assets/content/logo-small.png'?>" type="image/x-icon">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
        <!-- CSS -->
        <link href="<?php echo base_url().'assets/admin/plugins/bootstrap/css/bootstrap.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/plugins/node-waves/waves.css'?>" rel="stylesheet">
        <link href="<?php echo base_url().'assets/admin/plugins/animate-css/animate.css'?>" rel="stylesheet">
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
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="<?php echo base_url().$tipe; ?>">CHAT - SAHABAT SKRIPSI</a>
                </div>
            </div>
        </nav>
        <!-- End Top Bar -->
        <!-- Left Sidebar -->
        <section>
            <aside id="leftsidebar" class="sidebar">
                <!-- User Info -->
                <div class="user-info">
                    <div class="image">
                        <?php if($tipe == 'konsultan'){?>
                            <div class="profile-image" style="background-image: url('<?php echo base_url().'assets/content/konsultan/'.$gambar; ?>')"></div>
                        <?php } ?>
                        <?php if($tipe == 'pengguna'){?>
                            <img src="<?php echo base_url().'assets/content/user-white.png'; ?>" width="48" height="48" alt="User" />
                        <?php } ?>
                    </div>
                    <div class="info-container">
                        <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama; ?></div>
                        <div class="email"><?php echo $email; ?></div>
                        <div class="btn-group user-helper-dropdown">
                            <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="<?php echo base_url().$tipe.'/proses_keluar'; ?>"><i class="material-icons">input</i>Sign Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End User Info -->
                <div class="menu">
                    <?php if($tipe == 'konsultan'){?>
                        <ul class="list">
                            <?php foreach ($pengguna as $item_pengguna):?>
                                <input type="hidden" id="<?php echo 'nama'.$item_pengguna->id; ?>" value="<?php echo $item_pengguna->nama; ?>">
                                <input type="hidden" id="<?php echo 'gambar'.$item_pengguna->id; ?>" value="">
                                <input type="hidden" id="tipe_penerima" value="pengguna">
                                    <li class="pilihPenerima" id="<?php echo $item_pengguna->id; ?>">
                                        <a href="javascript:void(0);">
                                            <div class="list-profile-image" style="background-image: url('<?php echo base_url().'assets/content/user.png'; ?>')"></div>
                                            <span style="padding-top:2px;"><?php echo $item_pengguna->nama; ?></span>
                                        </a>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php } ?>
                    <?php if($tipe == 'pengguna'){?>
                        <ul class="list">
                            <?php foreach ($konsultan as $item_konsultan):?>
                                <input type="hidden" id="<?php echo 'nama'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->nama_konsultan; ?>">
                                <input type="hidden" id="<?php echo 'gambar'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->gambar_konsultan; ?>">
                                <input type="hidden" id="tipe_penerima" value="konsultan">
                                    <li class="pilihPenerima" id="<?php echo $item_konsultan->id_konsultan; ?>">
                                        <a href="javascript:void(0);">
                                            <?php if($item_konsultan->gambar_konsultan != ''){?>
                                                <div class="list-profile-image" style="background-image: url('<?php echo base_url().'assets/content/konsultan/'.$item_konsultan->gambar_konsultan; ?>')"></div>
                                            <?php } ?>
                                            <?php if($item_konsultan->gambar_konsultan == ''){?>
                                                <div class="list-profile-image" style="background-image: url('<?php echo base_url().'assets/content/user.png'; ?>')"></div>
                                            <?php } ?>
                                            <span style="padding-top:2px;"><?php echo $item_konsultan->nama_konsultan; ?></span>
                                        </a>
                                    </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php } ?>
                </div>
                <!-- Footer -->
                <div class="legal" align="right">
                    <div class="copyright">&copy; <?php echo date("Y") ?> <a href="javascript:void(0);">Sahabat Skripsi</a>.</div>
                </div>
                <!-- End Footer -->
            </aside>
        </section>
        <!-- End Left Sidebar -->
        <section class="content">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="chat_section">
                        <div class="card">
                            <div class="body">
                                <div class="panel panel-default panel-post">
                                    <div class="panel-heading" style="padding-bottom:0px;">
                                        <div class="media">
                                            <div class="media-left">
                                                <div class="list-profile-image" id="gambar_penerima"></div>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading" id="nama_penerima"></h4>
                                                <p id="tipe"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="chat-card" id="chat_box">
                                            <div id="chat_view"></div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="form-group" style="margin-bottom:0px;">
                                            <input type="hidden" id="pengirim" value="<?php echo $tipe.$id; ?>">
                                            <input type="hidden" id="penerima" value="">
                                            <div class="row">
                                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                    <div class="form-line">
                                                        <input type="text" id="pesan" class="form-control" placeholder="Ketik pesan...">
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <button type="button" class="btn bg-orange waves-effect custom-sending" id="kirim">KIRIM</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <!-- JavaScript -->
        <script src="<?php echo base_url().'assets/admin/plugins/jquery/jquery.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/plugins/bootstrap/js/bootstrap.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/plugins/bootstrap-select/js/bootstrap-select.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/plugins/node-waves/waves.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/js/admin.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/js/demo.js'?>"></script>
        <script src="<?php echo base_url().'assets/admin/js/chat.js'?>"></script>
    </body>
</html>