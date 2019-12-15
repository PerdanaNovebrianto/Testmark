<section class="bg-gray">
	<div class="container">
		<header class="text-center">
			<h2 class="lined text-uppercase">Kabar</h2>
		</header>
		<div class="row">
			<?php foreach ($kabar as $item_kabar):?>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mt-4 mb-4">
                    <div class="card">
                    	<div class="card-header bg-white">
                    		<h4 class="font-weight-bold"><?php echo $item_kabar->judul_kabar; ?></h4>
                    		<p class="text-gray mb-0"><?php echo 'Ditambahkan pada : '.$item_kabar->tanggal_kabar; ?></p>
                    	</div>
                        <?php if($item_kabar->lampiran_kabar != ''){?>
                            <?php $ext_file = pathinfo($item_kabar->lampiran_kabar, PATHINFO_EXTENSION); ?>
                            <?php if($ext_file == ''){ ?>
                                <div class="embed-responsive embed-responsive-16by9 post-card">
                                    <iframe src="<?php echo 'https://www.youtube.com/embed/'.$item_kabar->lampiran_kabar; ?>" class="embed-responsive-item" allowfullscreen></iframe>
                                </div>
                            <?php } ?>
                            <?php if($ext_file != ''){ ?>
                                <div class="post-card">
                                    <div class="image-middle">
                                        <img src="<?php echo base_url()."assets/content/kabar/".$item_kabar->lampiran_kabar; ?>" style="max-height:480px" width="100%" height="auto">
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="card-body">
                            <?php
                                $string_lines = $item_kabar->deskripsi_kabar;
                                $lines = preg_split('/\n|\r/', $string_lines);
                                $num_lines = count($lines);
                                if($num_lines >= 5){
                                    echo '<div id="preview_text'.$item_kabar->id_kabar.'">';
                                        echo '<textarea class="content-text" rows="4" readonly>'.$item_kabar->deskripsi_kabar.'</textarea>';
                                        echo '...<br><button type="button" id="show_more" class="content-button mt-3 mb-3" onclick="show_more('.$item_kabar->id_kabar.')">SHOW</button>';
                                    echo '</div>';
                                    echo '<div id="full_text'.$item_kabar->id_kabar.'">';
                                        echo '<div id="responsive_text">';
                                            echo '<textarea class="content-text" readonly>'.$item_kabar->deskripsi_kabar.'</textarea>';
                                            echo '<br><button type="button" id="show_less" class="content-button mt-3 mb-3" onclick="show_less('.$item_kabar->id_kabar.')">HIDE</button>';
                                        echo '</div>';
                                    echo '</div>';
                                }
                                if($num_lines < 5){
                                    echo '<div id="responsive_text">';
                                        echo '<textarea class="content-text" readonly>'.$item_kabar->deskripsi_kabar.'</textarea>';
                                    echo '</div>';
                                }
                            ?>
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