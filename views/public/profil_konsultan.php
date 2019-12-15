<section class="bg-gray">
	<div class="container">
		<header class="text-center">
			<h2 class="lined text-uppercase">Profil Konsultan</h2>
		</header>
		<div class="row">
			<?php foreach ($konsultan as $item_konsultan):?>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-4 mb-4">
                    <div class="card" align="center">
                    	<div>
                    		<?php if($item_konsultan->gambar_konsultan != ''){?>
                    			<div class="profile-image" style="background-image: url('<?php echo base_url().'assets/content/konsultan/'.$item_konsultan->gambar_konsultan; ?>')"></div>
                    		<?php }?>
                    		<?php if($item_konsultan->gambar_konsultan == ''){?>
                    			<img class="default-profile" src="<?php echo base_url()."assets/content/user.png"; ?>">
                    		<?php }?>
                    	</div>
                    	<div class="card-body">
                    		<h4 class="font-weight-bold"><?php echo $item_konsultan->nama_konsultan; ?></h4>
                    		<?php if($item_konsultan->status_konsultan == 'available'){ ?>
                    			<small class="status-available"><?php echo ucwords($item_konsultan->status_konsultan); ?></small>
                    		<?php } ?>
                    		<?php if($item_konsultan->status_konsultan == 'unavailable'){ ?>
                    			<small class="status-unavailable"><?php echo ucwords($item_konsultan->status_konsultan); ?></small>
                    		<?php } ?>
                    		<div class="content-line mt-3 mb-3"></div>
                    		<h4 class="font-weight-bold">Bidang Jurusan</h4>
                    		<p><?php echo $item_konsultan->bidang_kejuruan; ?></p>
                    		<h4 class="font-weight-bold">Lulusan</h4>
                    		<p><?php echo $item_konsultan->lulusan_konsultan; ?></p>
                    	</div>
                    </div>
                  </div>
			<?php endforeach; ?>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4">
				<?php echo $links; ?>
			</div>
		</div>
	</div>
</section>
<section class="bg-dark pt-4 pb-4">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
						<h5 class="copyright-text font-weight-bold">ALAMAT</h5>
						<p class="copyright-text mb-4">Innovation Factory, Lantai 2, Jl. Prof. Dr. Herman Yohanes No.112, Terban, Gondokusuman, Yogyakarta.</p>
						<h5 class="copyright-text font-weight-bold">EMAIL</h5>
						<p class="copyright-text mb-4">Sahabatskripsijogja@gmail.com</p>
						<h5 class="copyright-text font-weight-bold">MEDIA SOSIAL</h5>
						<a href="https://web.facebook.com/Tugas-Kuliah-Jogja-1890805040980198/" class="social"><i class="fab fa-facebook" aria-hidden="true"></i></a>
						<a href="https://twitter.com/sahabatskripsi1" class="social"><i class="fab fa-twitter" aria-hidden="true"></i></a>
						<a href="https://www.instagram.com/sahabatskripsijogja/" class="social"><i class="fab fa-instagram" aria-hidden="true"></i></a>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 mt-4" align="center">
						<div class="footer-logo">
							<img src="<?php echo base_url().'assets/content/logo-small.png'?>">
						</div>
						<div class="footer-line mt-4"></div>
						<p class="copyright-text mt-4">&copy; <?php echo date("Y") ?> SAHABAT SKRIPSI JOGJA</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>