<section class="content">
	<div class="container-fluid">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2>UBAH PASSWORD</h2>
					</div>
					<div class="body">
						<?php if(!empty($pesan)){ ?>
							<div class="alert alert-danger" role="alert" align="center">
								<?php echo $pesan; ?>
							</div>
						<?php } ?>
						<div id="empty_error" class="alert alert-danger" style="display:none" role="alert" align="center">Mohon isi semua form.</div>
						<div id="length_error" class="alert alert-danger" style="display:none" role="alert" align="center">Minimal 8 huruf.</div>
						<form id="form_advanced_validation" method="POST" action="<?php echo base_url().'pengaturan/ubah_password'; ?>">
							<div class="form-group form-float">
								<div class="form-line">
									<input type="password" class="form-control" id="old_password" name="old_password" minlength="8" maxlength="16" required>
									<label class="form-label">Password Lama</label>
								</div>
								<div class="help-info">Min. 8, Max. 16 huruf</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="password" class="form-control" id="new_password" name="new_password" minlength="8" maxlength="16" required>
									<label class="form-label">Password Baru</label>
								</div>
								<div class="help-info">Min. 8, Max. 16 huruf</div>
							</div>
							<div class="form-group form-float">
								<div class="form-line">
									<input type="password" class="form-control" id="conf_new_password" name="conf_new_password" minlength="8" maxlength="16" required>
									<label class="form-label">Konfirmasi Password Baru</label>
								</div>
								<div class="help-info">Min. 8, Max. 16 huruf</div>
							</div>
							<div align="right" style="padding-top:20px;">
								<button type="button" class="btn bg-orange waves-effect" onclick="conf_password()">UBAH PASSWORD</button>
							</div>
							<div class="modal fade" id="editPasswordModal" tabindex="-1" role="dialog">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header bg-orange">
											<h4 class="modal-title" id="largeModalLabel">KONFIRMASI UBAH PASSWORD</h4>
										</div>
										<div class="modal-body" align="center">
											<h5>Apakah anda yakin ingin mengubah password?</h5>
											<small>Anda akan kembali ke halaman login setelah melakukan pengubahan password.</small>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
											<input type="submit" class="btn bg-orange waves-effect" value="UBAH PASSWORD">
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
<script src="<?php echo base_url().'assets/admin/plugins/jquery/jquery.min.js'?>"></script>
<script src="<?php echo base_url().'assets/admin/js/custom-admin-pengaturan.js'?>"></script>