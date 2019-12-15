    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KELOLA KABAR
                                <button type="button" class="btn bg-orange waves-effect pull-right" style="margin-top:-6px;" data-toggle="modal" data-target="#tambahKabar">TAMBAH KABAR</button>
                            </h2>
                            <div class="modal fade" id="tambahKabar" tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange">
                                            <h4 class="modal-title" id="largeModalLabel">TAMBAH KABAR</h4>
                                        </div>
                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'kelola_kabar/tambah_kabar'; ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">Judul Kabar</label>
                                                    <div class="form-line">
                                                        <input type="text" id="judul_kabar" class="form-control" name="judul_kabar" placeholder="Judul Kabar" maxlength="255" required/>
                                                    </div>
                                                    <div class="help-info">Max 255 huruf</div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Lampiran Kabar</label><br>
                                                    <input type="radio" class="with-gap radio-col-orange" id="lampiran_gambar_kabar" name="jenis_lampiran" value="gambar" onclick="pilih_lampiran('kabar', 1)"/>
                                                    <label for="lampiran_gambar_kabar">Gambar</label>
                                                    <input type="radio" class="with-gap radio-col-orange" id="lampiran_video_kabar" name="jenis_lampiran" value="video" onclick="pilih_lampiran('kabar', 2)"/>
                                                    <label for="lampiran_video_kabar">Video</label>
                                                    <div id="error_format_kabar" class="alert alert-danger" style="display:none" role="alert"  align="center">Format file harus PNG/JPG/JPEG.</div>
                                                    <div id="error_size_kabar" class="alert alert-danger" style="display:none" role="alert" align="center">Ukuran file lebih dari 2MB.</div>
                                                    <div class="form-group">
                                                        <div id="gambar_kabar" class="form-line" style="display:none">
                                                            <input type="file" id="file_gambar_kabar" name="gambar_kabar" accept="image/*" onchange="preview_gambar_lampiran(event, 'kabar')">
                                                            <div class="help-info">Format PNG/JPG/JPEG ukuran max 2MB</div>
                                                        </div>
                                                        <div id="video_kabar" class="form-group" style="display:none">
                                                            <div class="form-line">
                                                                <input type="text" id="file_video_kabar" class="form-control" name="video_kabar" placeholder="Link Video Youtube" onchange="preview_video_lampiran(event, 'kabar')">
                                                            </div>
                                                            <div class="help-info">Link Video Youtube</div>
                                                        </div>
                                                    </div>
                                                    <div id="preview_lampiran_kabar" style="display:none" align="center">
                                                        <div class="preview-card">
                                                            <div class="image-middle">
                                                                <img id="gambar_lampiran_kabar" style="max-height:240px" width="100%" height="auto">
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn bg-orange waves-effect" onclick="del_preview_lampiran('kabar')"><i class="material-icons">delete</i></button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Deskripsi Kabar</label>
                                                    <div class="form-line">
                                                        <textarea id="deskripsi_kabar" class="form-control no-resize" name="deskripsi_kabar" rows="4" placeholder="Deskripsi Kabar" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="tutup_tambah_kabar('kabar')">TUTUP</button>
                                                <input type="submit" class="btn bg-orange waves-effect" value="TAMBAH KABAR">
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Judul</th>
                                            <th>Lampiran</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kabar as $item_kabar): ?>
                                            <tr>
                                                <td><?php echo $item_kabar->tanggal_kabar; ?></td>
                                                <td><?php echo $item_kabar->judul_kabar; ?></td>
                                                <?php if($item_kabar->lampiran_kabar != ''){?>
                                                    <?php $ext_file = pathinfo($item_kabar->lampiran_kabar, PATHINFO_EXTENSION); ?>
                                                    <?php if($ext_file == ''){ ?>
                                                        <td align="center">
                                                            <img src="<?php echo 'https://img.youtube.com/vi/'.$item_kabar->lampiran_kabar.'/hqdefault.jpg'; ?>" style="max-height:100px" width="auto" height="100%">
                                                        </td>
                                                    <?php } ?>
                                                    <?php if($ext_file != ''){ ?>
                                                        <td align="center">
                                                            <img src="<?php echo base_url()."assets/content/kabar/".$item_kabar->lampiran_kabar; ?>" style="max-height:100px" width="auto" height="100%">
                                                        </td>
                                                    <?php } ?>
                                                <?php } ?>
                                                <?php if($item_kabar->lampiran_kabar == ''){?>
                                                    <td>
                                                        <div tyle="max-height:100px" width="auto" height="100%"></div>
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <textarea class="content-text" rows="5" readonly><?php echo $item_kabar->deskripsi_kabar; ?></textarea>
                                                </td>
                                                <td align="center">
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#ubahKabar'.$item_kabar->id_kabar; ?>"><i class="material-icons">create</i></button>
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#hapusKabar'.$item_kabar->id_kabar; ?>"><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="<?php echo 'ubahKabar'.$item_kabar->id_kabar; ?>"  tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">UBAH KABAR</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'kelola_kabar/ubah_kabar/'.$item_kabar->id_kabar; ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="form-label">Judul Kabar</label>
                                                                    <div class="form-line">
                                                                        <input type="hidden" id="<?php echo 'judul_kabar_lama'.$item_kabar->id_kabar; ?>" value="<?php echo $item_kabar->judul_kabar; ?>">
                                                                        <input type="text" id="<?php echo 'judul_kabar'.$item_kabar->id_kabar; ?>" class="form-control" name="<?php echo 'judul_kabar'.$item_kabar->id_kabar; ?>" value="<?php echo $item_kabar->judul_kabar; ?>" placeholder="Judul Kabar" maxlength="100" required/>
                                                                    </div>
                                                                    <div class="help-info">Max 100 huruf</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Lampiran Kabar</label><br>
                                                                    <input type="hidden" id="<?php echo 'lampiran_kabar_lama'.$item_kabar->id_kabar; ?>" name="<?php echo 'lampiran_kabar_lama'.$item_kabar->id_kabar; ?>" value="<?php echo $item_kabar->lampiran_kabar; ?>">
                                                                    <input type="hidden" id="<?php echo 'lampiran_kabar_baru'.$item_kabar->id_kabar; ?>" name="<?php echo 'lampiran_kabar_baru'.$item_kabar->id_kabar; ?>" value="<?php echo $item_kabar->lampiran_kabar; ?>">
                                                                    <?php if($item_kabar->lampiran_kabar != ''){?>
                                                                        <?php $ext_file = pathinfo($item_kabar->lampiran_kabar, PATHINFO_EXTENSION); ?>
                                                                        <?php if($ext_file != ''){?>
                                                                            <input type="hidden" name="<?php echo 'jenis_lampiran_lama'.$item_kabar->id_kabar; ?>" id="<?php echo 'jenis_lampiran_lama'.$item_kabar->id_kabar; ?>" value="gambar">
                                                                        <?php } ?>
                                                                        <?php if($ext_file == ''){?>
                                                                            <input type="hidden" name="<?php echo 'jenis_lampiran_lama'.$item_kabar->id_kabar; ?>" id="<?php echo 'jenis_lampiran_lama'.$item_kabar->id_kabar; ?>" value="video">
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'lampiran_gambar_kabar'.$item_kabar->id_kabar; ?>" name="<?php echo 'jenis_lampiran_baru'.$item_kabar->id_kabar; ?>" value="gambar" onclick="<?php echo 'pilih_ubah_lampiran('.$item_kabar->id_kabar.', 1)'; ?>"/>
                                                                    <label for="<?php echo 'lampiran_gambar_kabar'.$item_kabar->id_kabar; ?>">Gambar</label>
                                                                    <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'lampiran_video_kabar'.$item_kabar->id_kabar; ?>" name="<?php echo 'jenis_lampiran_baru'.$item_kabar->id_kabar; ?>" value="video" onclick="<?php echo 'pilih_ubah_lampiran('.$item_kabar->id_kabar.', 2)'; ?>"/>
                                                                    <label for="<?php echo 'lampiran_video_kabar'.$item_kabar->id_kabar; ?>">Video</label>
                                                                    <div id="<?php echo 'error_format_kabar'.$item_kabar->id_kabar; ?>" class="alert alert-danger" style="display:none" role="alert"  align="center">Format file harus PNG/JPG/JPEG.</div>
                                                                    <div id="<?php echo 'error_size_kabar'.$item_kabar->id_kabar; ?>" class="alert alert-danger" style="display:none" role="alert" align="center">Ukuran file lebih dari 2MB.</div>
                                                                    <div class="form-group">
                                                                        <div id="<?php echo 'gambar_kabar'.$item_kabar->id_kabar; ?>" class="form-line" style="display:none">
                                                                            <input type="file" id="<?php echo 'file_gambar_kabar'.$item_kabar->id_kabar; ?>" name="<?php echo 'gambar_kabar'.$item_kabar->id_kabar; ?>" accept="image/*" onchange="<?php echo 'preview_ubah_gambar_lampiran(event, '.$item_kabar->id_kabar.')'; ?>">
                                                                            <div class="help-info">Format PNG/JPG/JPEG ukuran max 2MB</div>
                                                                        </div>
                                                                        <div id="<?php echo 'video_kabar'.$item_kabar->id_kabar; ?>" class="form-group" style="display:none">
                                                                            <div class="form-line">
                                                                                <input type="text" id="<?php echo 'file_video_kabar'.$item_kabar->id_kabar; ?>" class="form-control" name="<?php echo 'video_kabar'.$item_kabar->id_kabar; ?>" placeholder="Link Video Youtube" onchange="<?php echo 'preview_ubah_video_lampiran(event, '.$item_kabar->id_kabar.')'; ?>">
                                                                            </div>
                                                                            <div class="help-info">Link Video Youtube</div>
                                                                        </div>
                                                                    </div>
                                                                    <div id="<?php echo 'preview_lampiran_kabar_lama'.$item_kabar->id_kabar; ?>" align="center">
                                                                        <?php if($item_kabar->lampiran_kabar != ''){?>
                                                                            <div class="preview-card">
                                                                                <div class="image-middle">
                                                                                    <?php if($ext_file != ''){?>
                                                                                        <img src="<?php echo base_url()."assets/content/kabar/".$item_kabar->lampiran_kabar; ?>" style="max-height:240px" width="100%" height="auto">
                                                                                    <?php } ?>
                                                                                    <?php if($ext_file == ''){?>
                                                                                        <img src="<?php echo 'https://img.youtube.com/vi/'.$item_kabar->lampiran_kabar.'/hqdefault.jpg'; ?>" style="max-height:240px" width="100%" height="auto">
                                                                                    <?php } ?>
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn bg-orange waves-effect" onclick="<?php echo 'del_preview_lampiran_lama('.$item_kabar->id_kabar.')'; ?>"><i class="material-icons">delete</i></button>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div id="<?php echo 'preview_lampiran_kabar'.$item_kabar->id_kabar; ?>" style="display:none" align="center">
                                                                        <div class="preview-card">
                                                                            <div class="image-middle">
                                                                                <img id="<?php echo 'gambar_lampiran_kabar'.$item_kabar->id_kabar; ?>" style="max-height:240px" width="100%" height="auto">
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" class="btn bg-orange waves-effect" onclick="<?php echo 'del_preview_ubah_lampiran('.$item_kabar->id_kabar.')'; ?>"><i class="material-icons">delete</i></button>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Deskripsi Kabar</label>
                                                                    <div class="row clearfix">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <div class="form-line">
                                                                                    <input type="hidden" id="<?php echo 'deskripsi_kabar_lama'.$item_kabar->id_kabar; ?>" value="<?php echo $item_kabar->deskripsi_kabar; ?>">
                                                                                    <textarea rows="4" id="<?php echo 'deskripsi_kabar'.$item_kabar->id_kabar; ?>" class="form-control no-resize" name="<?php echo 'deskripsi_kabar'.$item_kabar->id_kabar; ?>" placeholder="Deskripsi Kabar"><?php echo $item_kabar->deskripsi_kabar; ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="<?php echo 'tutup_ubah_kabar('.$item_kabar->id_kabar.')'; ?>">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="UBAH KABAR">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="<?php echo 'hapusKabar'.$item_kabar->id_kabar; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">HAPUS KABAR</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" method="POST" action="<?php echo base_url().'kelola_kabar/hapus_kabar/'.$item_kabar->id_kabar; ?>">
                                                            <div class="modal-body" align="center">
                                                                <h5>Apakah anda yakin ingin menghapus kabar ini?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="HAPUS KABAR">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>