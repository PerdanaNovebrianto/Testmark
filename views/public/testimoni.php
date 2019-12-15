<section class="bg-gray">
	<div class="container">
		<header class="text-center">
			<h2 class="lined text-uppercase">Testimoni</h2>
		</header>
		<div class="row">
			<?php foreach ($testimoni as $item_testimoni):?>
				<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 mt-4 mb-4">
                    <div class="card">
                        <div class="testimoni-card">
                            <div class="image-middle">
                                <img src="<?php echo base_url()."assets/content/testimoni/".$item_testimoni->nama; ?>" style="max-height:360px; padding:2px;" width="100%" height="auto">
                            </div>
                        </div>
                    </div>
				</div>
			<?php endforeach; ?>
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