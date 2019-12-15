    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                KELOLA KONSULTAN
                                <button type="button" class="btn bg-orange waves-effect pull-right" style="margin-top:-6px;" data-toggle="modal" data-target="#tambahKonsultan">TAMBAH KONSULTAN</button>
                            </h2>
                            <div class="modal fade" id="tambahKonsultan" tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange">
                                            <h4 class="modal-title" id="largeModalLabel">TAMBAH KONSULTAN</h4>
                                        </div>
                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'kelola_konsultan/tambah_konsultan'; ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Gambar Konsultan</label><br>
                                                    <div id="error_format" class="alert alert-danger" style="display:none" role="alert"  align="center">Format file harus PNG/JPG/JPEG.</div>
                                                    <div id="error_size" class="alert alert-danger" style="display:none" role="alert" align="center">Ukuran file lebih dari 1MB.</div>
                                                    <div class="form-group">
                                                        <input type="file" id="gambar_konsultan" name="gambar_konsultan" accept="image/*" onchange="preview_gambar(event)">
                                                        <div class="help-info">Format PNG/JPG/JPEG ukuran max 1MB</div>
                                                    </div>
                                                    <div id="preview_lampiran" style="display:none" align="center">
                                                        <div class="preview-card">
                                                            <div class="image-middle">
                                                                <img id="gambar_lampiran" style="max-height:240px" width="100%" height="auto">
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn bg-orange waves-effect" onclick="del_preview()"><i class="material-icons">delete</i></button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Nama Konsultan</label>
                                                    <div class="form-line">
                                                        <input type="text" id="nama_konsultan" class="form-control" name="nama_konsultan" placeholder="Nama Konsultan" maxlength="255" required/>
                                                    </div>
                                                    <div class="help-info">Max 255 huruf</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Lulusan Konsultan</label>
                                                    <div class="form-line">
                                                        <input type="text" id="lulusan_konsultan" class="form-control" name="lulusan_konsultan" placeholder="Lulusan Konsultan" maxlength="255" required/>
                                                    </div>
                                                    <div class="help-info">Max 255 huruf</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Email Konsultan</label>
                                                    <div class="form-line">
                                                        <input type="text" id="email_konsultan" class="form-control" name="email_konsultan" placeholder="Email Konsultan" maxlength="50" required/>
                                                    </div>
                                                    <div class="help-info">Max 50 huruf</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Bidang Kejuruan</label><br>
                                                    <input type="radio" class="with-gap radio-col-orange" id="saintek" name="bidang_kejuruan" value="saintek"/>
                                                    <label for="saintek">Saintek</label>
                                                    <input type="radio" class="with-gap radio-col-orange" id="soshum" name="bidang_kejuruan" value="soshum"/>
                                                    <label for="soshum">Soshum</label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Status</label><br>
                                                    <input type="radio" class="with-gap radio-col-orange" id="available" name="status_konsultan" value="available"/>
                                                    <label for="available">Available</label>
                                                    <input type="radio" class="with-gap radio-col-orange" id="unavailable" name="status_konsultan" value="unavailable"/>
                                                    <label for="unavailable">Unavailable</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="tutup_tambah_konsultan()">TUTUP</button>
                                                <input type="submit" class="btn bg-orange waves-effect" value="TAMBAH KONSULTAN">
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
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Lulusan</th>
                                            <th>Bidang</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($konsultan as $item_konsultan): ?>
                                            <tr>
                                                <?php if($item_konsultan->gambar_konsultan != ''){?>
                                                    <td align="center">
                                                        <img src="<?php echo base_url()."assets/content/konsultan/".$item_konsultan->gambar_konsultan; ?>" style="max-height:80px" width="auto" height="100%">
                                                    </td>
                                                <?php } ?>
                                                <?php if($item_konsultan->gambar_konsultan == ''){?>
                                                    <td  align="center">
                                                        <img src="<?php echo base_url()."assets/content/user.png"; ?>" style="max-height:80px" width="auto" height="100%">
                                                    </td>
                                                <?php } ?>
                                                <td><?php echo $item_konsultan->nama_konsultan; ?></td>
                                                <td><?php echo $item_konsultan->lulusan_konsultan; ?></td>
                                                <td><?php echo $item_konsultan->bidang_kejuruan; ?></td>
                                                <td><?php echo $item_konsultan->email; ?></td>
                                                <td><?php echo $item_konsultan->password; ?></td>
                                                <td><?php echo $item_konsultan->status_konsultan; ?></td>
                                                <td align="center">
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#ubahKonsultan'.$item_konsultan->id_konsultan; ?>"><i class="material-icons">create</i></button>
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#hapusKonsultan'.$item_konsultan->id_konsultan; ?>"><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="<?php echo 'ubahKonsultan'.$item_konsultan->id_konsultan; ?>"  tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">UBAH KONSULTAN</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'kelola_konsultan/ubah_konsultan/'.$item_konsultan->id_konsultan; ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Gambar Konsultan</label><br>
                                                                    <input type="hidden" id="<?php echo 'gambar_lama'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'gambar_lama'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->gambar_konsultan; ?>">
                                                                    <input type="hidden" id="<?php echo 'gambar_baru'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'gambar_baru'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->gambar_konsultan; ?>">
                                                                    <div id="<?php echo 'error_format'.$item_konsultan->id_konsultan; ?>" class="alert alert-danger" style="display:none" role="alert"  align="center">Format file harus PNG/JPG/JPEG.</div>
                                                                    <div id="<?php echo 'error_size'.$item_konsultan->id_konsultan; ?>" class="alert alert-danger" style="display:none" role="alert" align="center">Ukuran file lebih dari 1MB.</div>
                                                                    <div class="form-group">
                                                                        <input type="file" id="<?php echo 'gambar_konsultan'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'gambar_konsultan'.$item_konsultan->id_konsultan; ?>" accept="image/*" onchange="<?php echo 'preview_ubah_gambar(event, '.$item_konsultan->id_konsultan.')'; ?>">
                                                                        <div class="help-info">Format PNG/JPG/JPEG ukuran max 1MB</div>
                                                                    </div>
                                                                    <div id="<?php echo 'preview_lampiran'.$item_konsultan->id_konsultan; ?>" style="display:none" align="center">
                                                                        <div class="preview-card">
                                                                            <div class="image-middle">
                                                                                <img id="<?php echo 'gambar_lampiran'.$item_konsultan->id_konsultan; ?>" style="max-height:240px" width="100%" height="auto">
                                                                            </div>
                                                                        </div>
                                                                        <button type="button" class="btn bg-orange waves-effect" onclick="<?php echo 'del_preview_ubah('.$item_konsultan->id_konsultan.')'; ?>"><i class="material-icons">delete</i></button>
                                                                    </div>
                                                                    <div id="<?php echo 'preview_lampiran_lama'.$item_konsultan->id_konsultan; ?>" align="center">
                                                                        <?php if($item_konsultan->gambar_konsultan != ''){?>
                                                                            <div class="preview-card">
                                                                                <div class="image-middle">
                                                                                    <img src="<?php echo base_url()."assets/content/konsultan/".$item_konsultan->gambar_konsultan; ?>" style="max-height:240px" width="100%" height="auto">
                                                                                </div>
                                                                            </div>
                                                                            <button type="button" class="btn bg-orange waves-effect" onclick="<?php echo 'del_preview_lama('.$item_konsultan->id_konsultan.')'; ?>"><i class="material-icons">delete</i></button>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Nama Konsultan</label>
                                                                    <div class="form-line">
                                                                        <input type="hidden" id="<?php echo 'nama_lama'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->nama_konsultan; ?>">
                                                                        <input type="text" id="<?php echo 'nama_konsultan'.$item_konsultan->id_konsultan; ?>" class="form-control" name="<?php echo 'nama_konsultan'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->nama_konsultan; ?>" placeholder="Nama Konsultan" maxlength="255" required/>
                                                                    </div>
                                                                    <div class="help-info">Max 255 huruf</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Lulusan Konsultan</label>
                                                                    <div class="form-line">
                                                                        <input type="hidden" id="<?php echo 'lulusan_lama'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->lulusan_konsultan; ?>">
                                                                        <input type="text" id="<?php echo 'lulusan_konsultan'.$item_konsultan->id_konsultan; ?>" class="form-control" name="<?php echo 'lulusan_konsultan'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->lulusan_konsultan; ?>" placeholder="Lulusan Konsultan" maxlength="255" required/>
                                                                    </div>
                                                                    <div class="help-info">Max 255 huruf</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Email Konsultan</label>
                                                                    <div class="form-line">
                                                                        <input type="hidden" id="<?php echo 'email_lama'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->email; ?>">
                                                                        <input type="text" id="<?php echo 'email_konsultan'.$item_konsultan->id_konsultan; ?>" class="form-control" name="<?php echo 'email_konsultan'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->email; ?>" maxlength="50" required/>
                                                                    </div>
                                                                    <div class="help-info">Max 50 huruf</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Bidang Kejuruan</label><br>
                                                                    <input type="hidden" id="<?php echo 'bidang_lama'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->bidang_kejuruan; ?>">
                                                                    <?php if($item_konsultan->bidang_kejuruan == 'saintek'){?>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'saintek'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'bidang_kejuruan'.$item_konsultan->id_konsultan; ?>" value="saintek" checked="checked"/>
                                                                        <label for="<?php echo 'saintek'.$item_konsultan->id_konsultan; ?>">Saintek</label>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'soshum'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'bidang_kejuruan'.$item_konsultan->id_konsultan; ?>" value="soshum"/>
                                                                        <label for="<?php echo 'soshum'.$item_konsultan->id_konsultan; ?>">Soshum</label>
                                                                    <?php } ?>
                                                                    <?php if($item_konsultan->bidang_kejuruan == 'soshum'){?>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'saintek'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'bidang_kejuruan'.$item_konsultan->id_konsultan; ?>" value="saintek"/>
                                                                        <label for="<?php echo 'saintek'.$item_konsultan->id_konsultan; ?>">Saintek</label>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'soshum'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'bidang_kejuruan'.$item_konsultan->id_konsultan; ?>" value="soshum" checked="checked"/>
                                                                        <label for="<?php echo 'soshum'.$item_konsultan->id_konsultan; ?>">Soshum</label>
                                                                    <?php } ?>
                                                                </div>
                                                                <div class="form-group">
                                                                    <input type="hidden" id="<?php echo 'status_lama'.$item_konsultan->id_konsultan; ?>" value="<?php echo $item_konsultan->status_konsultan; ?>">
                                                                    <?php if($item_konsultan->status_konsultan == 'available'){?>
                                                                        <label class="form-label">Status</label><br>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'available'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'status_konsultan'.$item_konsultan->id_konsultan; ?>" value="available" checked="checked"/>
                                                                        <label for="<?php echo 'available'.$item_konsultan->id_konsultan; ?>">Available</label>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'unavailable'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'status_konsultan'.$item_konsultan->id_konsultan; ?>" value="unavailable"/>
                                                                        <label for="<?php echo 'unavailable'.$item_konsultan->id_konsultan; ?>">Unavailable</label>
                                                                    <?php } ?>
                                                                    <?php if($item_konsultan->status_konsultan == 'unavailable'){?>
                                                                        <label class="form-label">Status</label><br>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'available'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'status_konsultan'.$item_konsultan->id_konsultan; ?>" value="available"/>
                                                                        <label for="<?php echo 'available'.$item_konsultan->id_konsultan; ?>">Available</label>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'unavailable'.$item_konsultan->id_konsultan; ?>" name="<?php echo 'status_konsultan'.$item_konsultan->id_konsultan; ?>" value="unavailable" checked="checked"/>
                                                                        <label for="<?php echo 'unavailable'.$item_konsultan->id_konsultan; ?>">Unavailable</label>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="<?php echo 'tutup_ubah_konsultan('.$item_konsultan->id_konsultan.')'; ?>">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="UBAH KONSULTAN">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="<?php echo 'hapusKonsultan'.$item_konsultan->id_konsultan; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">HAPUS KONSULTAN</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" method="POST" action="<?php echo base_url().'kelola_konsultan/hapus_konsultan/'.$item_konsultan->id_konsultan; ?>">
                                                            <div class="modal-body" align="center">
                                                                <h5>Apakah anda yakin ingin menghapus konsultan ini?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="HAPUS KONSULTAN">
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