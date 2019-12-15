<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="robots" content="all,follow">
		<title><?php echo $judul_halaman; ?></title>
        <!-- Icon-->
        <link rel="icon" href="<?php echo base_url().'assets/content/logo-small.png'?>" type="image/x-icon">
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<!-- CSS-->
		<link rel="stylesheet" href="<?php echo base_url().'assets/public/vendor/bootstrap/css/bootstrap.min.css'?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/public/vendor/lightbox2/css/lightbox.min.css'?>">
		<link rel="stylesheet" href="<?php echo base_url().'assets/public/css/style.default.css'?>" id="theme-stylesheet">
		<link rel="stylesheet" href="<?php echo base_url().'assets/public/css/custom.css'?>">
	</head>
	<body>
		<!-- Navbar-->
		<header class="header sticky-top">
			<nav class="navbar navbar-expand-lg bg-dark border-bottom py-2">
				<div class="container">
					<a href="<?php echo base_url().'beranda'; ?>" class="navbar-brand py-1">
						<img src="<?php echo base_url().'assets/content/navbar-logo.png'?>" class="img-fluid navbar-logo">
					</a>
					<button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right">
						<span class="fas fa-bars"></span>
					</button>
					<div id="navbarSupportedContent" class="collapse navbar-collapse">
						<ul class="navbar-nav ml-auto px-3">
							<li class="nav-item"><a href="<?php echo base_url().'beranda'; ?>" class="nav-link">HOME</a></li>
							<li class="nav-item"><a href="<?php echo base_url().'kabar'; ?>" class="nav-link">KABAR</a></li>
							<li class="nav-item"><a href="<?php echo base_url().'testimoni'; ?>" class="nav-link">TESTIMONI</a></li>
							<li class="nav-item"><a href="<?php echo base_url().'profil_konsultan'; ?>" class="nav-link">PROFIL KONSULTAN</a></li>
							<li class="nav-item"><a href="<?php echo base_url().'pendaftaran'; ?>" class="nav-link">PENDAFTARAN PESERTA</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>