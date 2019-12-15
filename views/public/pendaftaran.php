<section class="bg-gray">
	<div class="container">
		<header class="text-center">
			<h2 class="lined text-uppercase">Pendaftaran Peserta</h2>
		</header>
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="card mt-4 mb-4">
					<div class="card-body">
                        <?php if(!empty($pesan)){ ?>
                            <div class="alert alert-success" role="alert" align="center">
                                <?php echo $pesan; ?>
                            </div>
                        <?php } ?>
						<form method="POST" action="<?php echo base_url().'pendaftaran/kirim_pendaftaran'; ?>">
							<div class="input-group mb-3">
								<label class="font-weight-bold">Nama Lengkap</label>
								<input type="text" id="nama" class="register-form" name="nama_pendaftar" placeholder="Nama Lengkap" autocomplete="off" required>
							</div>
							<div class="input-group mb-3">
								<label class="font-weight-bold">Universitas</label>
								<input type="text" id="univ" class="register-form" name="universitas_pendaftar" placeholder="Universitas" autocomplete="off" required>
							</div>
                            <div class="input-group mb-3">
                                <label class="font-weight-bold">Tahun Angkatan</label>
                                <input type="text" id="thak" class="register-form" name="angkatan_pendaftar" placeholder="Tahun Angkatan" autocomplete="off" onkeypress="return number_only(event)" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" id="mail" class="register-form" name="email_pendaftar" placeholder="Email" autocomplete="off" required>
                            </div>
                            <div class="input-group mb-3">
                                <label class="font-weight-bold">No. Telpon</label>
                                <input type="text" id="telp" class="register-form" name="telepon_pendaftar" placeholder="No. Telepon" onkeypress="return number_only(event)" autocomplete="off" required>
                            </div>
                            <div class="input-group mb-3">
                            	<label class="font-weight-bold w-100">Bidang Kejuruan</label>
                            	<div class="input-group-prepend range-form">
                            		<label class="input-group-text" for="inputGroupSelect01">Pilih</label>
                            	</div>
                            	<select class="custom-select" id="inputGroupSelect01" name="bidang_pendaftar" onchange="bidang_jurusan(this)" required>
                            		<option value=""></option>
                            		<option value="saintek">Saintek</option>
                            		<option value="soshum">Soshum</option>
                            	</select>
                            </div>
                            <div id="konsultan_saintek" style="display:none">
                            	<div class="input-group mb-3">
                            		<label class="font-weight-bold w-100">Konsultan</label>
                            		<div class="input-group-prepend range-form">
                            			<label class="input-group-text" for="inputGroupSelect02">Pilih</label>
                            		</div>
                            		<select class="custom-select" id="inputGroupSelect02" name="konsultan_saintek">
                            			<option value=""></option>
                            			<?php foreach ($konsultan as $item_konsultan):?>
                            				<?php if($item_konsultan->bidang_kejuruan == 'saintek' && $item_konsultan->status_konsultan == 'available'){ ?>
                            					<option value="<?php echo $item_konsultan->id_konsultan; ?>"><?php echo 'Nama : '.$item_konsultan->nama_konsultan.' | Lulusan : '.$item_konsultan->lulusan_konsultan; ?></option>
                            				<?php } ?>
                            			<?php endforeach; ?>
                            		</select>
                            	</div>
                            </div>
                            <div id="konsultan_soshum" style="display:none">
                            	<div class="input-group mb-3">
                            		<label class="font-weight-bold w-100">Konsultan</label>
                            		<div class="input-group-prepend range-form">
                            			<label class="input-group-text" for="inputGroupSelect03">Pilih</label>
                            		</div>
                            		<select class="custom-select" id="inputGroupSelect03" name="konsultan_soshum">
                            			<option value=""></option>
                            			<?php foreach ($konsultan as $item_konsultan):?>
                            				<?php if($item_konsultan->bidang_kejuruan == 'soshum' && $item_konsultan->status_konsultan == 'available'){ ?>
                            					<option value="<?php echo $item_konsultan->id_konsultan; ?>"><?php echo 'Nama : '.$item_konsultan->nama_konsultan.' | Lulusan : '.$item_konsultan->lulusan_konsultan; ?></option>
                            				<?php } ?>
                            			<?php endforeach; ?>
                            		</select>
                            	</div>
                            </div>
                            <div class="input-group mt-5">
                                <div class="row justify-content-center w-100">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                        <h4 class="lined font-weight-bold">Paket Tempat</h4>
                                    </div>
                                    <?php foreach ($paket_tempat as $item_tempat):?>
                                        <input type="hidden" name="<?php echo 'nama_tempat'.$item_tempat->id_paket; ?>" id="<?php echo 'nama_tempat'.$item_tempat->id_paket; ?>" value="<?php echo $item_tempat->nama_paket; ?>">
                                        <input type="hidden" id="<?php echo 'harga_tempat'.$item_tempat->id_paket; ?>" value="<?php echo $item_tempat->harga_paket; ?>">
                                        <div class="col-12 col-md-3">
                                            <div class="card mt-3 mb-3">
                                                <div class="card-header" align="center">
                                                    <h5 class="font-weight-bold"><?php echo $item_tempat->nama_paket; ?></h5>
                                                    <h5><?php echo 'Rp. '.number_format($item_tempat->harga_paket, 0, ',', '.'); ?></h5>
                                                </div>
                                                <div class="card-body" align="center">
                                                    <p class="package-text"><?php echo $item_tempat->deskripsi_paket; ?></p>
                                                </div>
                                                <div class="card-footer" align="center">
                                                    <label class="check-card">
                                                        <input type="checkbox" name="tempat[]" value="<?php echo $item_tempat->id_paket; ?>" onclick="total_tempat()">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="input-group mt-5">
                                <div class="row justify-content-center w-100">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                                        <h4 class="lined font-weight-bold">Paket Bimbingan</h4>
                                    </div>
                                    <?php foreach ($paket_bimbingan as $item_bimbingan):?>
                                        <input type="hidden" name="<?php echo 'nama_bimbingan'.$item_bimbingan->id_paket; ?>" id="<?php echo 'nama_bimbingan'.$item_bimbingan->id_paket; ?>" value="<?php echo $item_bimbingan->nama_paket; ?>">
                                        <input type="hidden" id="<?php echo 'harga_bimbingan'.$item_bimbingan->id_paket; ?>" value="<?php echo $item_bimbingan->harga_paket; ?>">
                                        <div class="col-12 col-md-3">
                                            <div class="card mt-3 mb-3">
                                                <div class="card-header" align="center">
                                                    <h5 class="font-weight-bold"><?php echo $item_bimbingan->nama_paket; ?></h5>
                                                    <h5><?php echo 'Rp. '.number_format($item_bimbingan->harga_paket, 0, ',', '.'); ?></h5>
                                                </div>
                                                <div class="card-body" align="center">
                                                    <p class="package-text"><?php echo $item_bimbingan->deskripsi_paket; ?></p>
                                                </div>
                                                <div class="card-footer" align="center">
                                                    <label class="check-card">
                                                        <input type="checkbox" name="bimbingan[]" value="<?php echo $item_bimbingan->id_paket; ?>" onclick="total_bimbingan()">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <div class="input-group mt-5">
                            	<label class="font-weight-bold">Keterangan Pendaftaran</label>
                            	<textarea class="register-form form-text" id="ketr" name="keterangan_pendaftar" required></textarea>
                            </div>
                            <div class="input-group">
                            	<h4 class="register-total mt-3">Total Pembayaran :</h4>
                            	<h2 class="register-total mb-3" id="total_pembayaran">Rp.0</h2>
                                <input type="hidden" id="total_semetara_tempat" value="0">
                                <input type="hidden" id="total_semetara_bimbingan" value="0">
                            	<input type="hidden" id="total_pendaftaran" name="total_pendaftar" value="">
                            </div>
                            <div class="content-line mb-4"></div>
                            <div class="mt-3" align="center">
                                <div id="error_empty" class="alert alert-danger" style="display:none" role="alert"  align="center">Harap isi semua formulir</div>
                            	<button type="button" class="content-button ml-1" onclick="daftar()">DAFTAR PESERTA</button>
                            	<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            			<div class="modal-content">
                            				<div class="modal-header">
                            					<h5 class="modal-title" id="exampleModalLongTitle">KONFIRMASI PENDAFTARAN</h5>
                            				</div>
                            				<div class="modal-body">
                            					<h5>Apakah semua data yang anda isi sudah benar?</h5>
                            					<h5>Pendaftaran anda akan kami proses dalam kurun waktu 1 x 24 jam</h5>
                            				</div>
                            				<div class="modal-footer">
                                                <button type="button" class="close-button" data-dismiss="modal">BATAL</button>
                            					<input type="submit" class="content-button" value="DAFTAR PESERTA">
                            				</div>
                            			</div>
                            		</div>
                            	</div>
                            </div>
                       	</form>
                   	</div>
                </div>
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