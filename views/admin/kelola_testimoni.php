    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KELOLA TESTIMONI
                                <button type="button" class="btn bg-orange waves-effect pull-right" style="margin-top:-6px;" data-toggle="modal" data-target="#kelolaTestimoni">KELOLA TESTIMONI</button>
                            </h2>
                            <div class="modal fade" id="kelolaTestimoni" tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange">
                                            <h4 class="modal-title" id="largeModalLabel">KELOLA TESTIMONI</h4>
                                        </div>
                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'kelola_testimoni/kelola_testimoni'; ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Gambar Testimoni</label><br>
                                                    <div class="alert bg-orange" role="alert" align="center">Maksimal 30 file berformat PNG/JPG/JPEG dengan ukuran maksimal per-file 1MB.</div>
                                                    <div id="error_maksimum_testimoni" class="alert alert-danger" style="display:none" role="alert" align="center">Jumlah file melebihi batas maksimum.</div>
                                                    <div id="error_format_testimoni" class="alert alert-danger" style="display:none" role="alert"  align="center">Format file harus PNG/JPG/JPEG.</div>
                                                    <div id="error_size_testimoni" class="alert alert-danger" style="display:none" role="alert" align="center">Ukuran file lebih dari 1MB.</div>
                                                    <div class="form-line">
                                                        <div class="custom-file">
                                                            <input type="file" id="testimoni" name="gambar_testimoni[]" accept="image/*" multiple>
                                                            <button type="button" id="upload_cleaner" class="btn bg-orange waves-effect pull-right custom-clear" style="display:none" onclick="clear_upload_testimoni()"><i class="material-icons">delete</i></button>
                                                        </div>
                                                        <input type="hidden" id="total_testimoni" value="<?php echo $total_testimoni; ?>">
                                                        <input type="hidden" id="total_sementara" value="<?php echo $total_testimoni; ?>">
                                                        <div id="total" class="help-info"><?php echo 'File terunggah : '.$total_testimoni; ?></div>
                                                    </div>
                                                    <div class="multi-preview row clearfix" align="center">
                                                        <div class="preview-testimoni"></div>
                                                        <?php $x = 0; ?>
                                                        <?php foreach ($testimoni as $item_testimoni): ?>
                                                            <div id="<?php echo 'preview_testimoni_lama'.$x; ?>" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                                <input type="hidden" name="<?php echo 'id_testimoni'.$x; ?>" value="<?php echo $item_testimoni->id; ?>">
                                                                <input type="hidden" id="<?php echo 'testimoni_lama'.$x; ?>" name="<?php echo 'testimoni_lama'.$x; ?>" value="<?php echo $item_testimoni->nama; ?>">
                                                                <input type="hidden" id="<?php echo 'testimoni_baru'.$x; ?>" name="<?php echo 'testimoni_baru'.$x; ?>" value="<?php echo $item_testimoni->nama; ?>">
                                                                <div class="preview-card">
                                                                    <div class="image-middle">
                                                                        <img src="<?php echo base_url()."assets/content/testimoni/".$item_testimoni->nama; ?>" class="multi-image">
                                                                    </div>
                                                                </div>
                                                                <button type="button" class="btn bg-orange waves-effect" id="<?php echo 'del_testimoni'.$x; ?>" onclick="<?php echo 'del_testimoni('.$x.')'; ?>"><i class="material-icons">delete</i></button>
                                                            </div>
                                                            <?php $x++; ?>
                                                        <?php endforeach; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="tutup_ubah_testimoni()">TUTUP</button>
                                                <input type="submit" class="btn bg-orange waves-effect" value="UBAH TESTIMONI">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if(!empty($pesan)){ ?>
                            <div class="alert bg-orange" role="alert" align="center">
                                <?php echo $pesan; ?>
                            </div>
                        <?php } ?>
                        <div class="body">
                            <div class="row">
                                <?php foreach ($testimoni as $item_testimoni):?>
                                <div class="col-xs-6 col-md-4">
                                    <div class="thumbnail">
                                        <img class="img-responsive" src="<?php echo base_url()."assets/content/testimoni/".$item_testimoni->nama; ?>">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>