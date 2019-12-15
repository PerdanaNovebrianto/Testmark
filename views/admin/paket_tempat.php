    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PAKET TEMPAT
                                <button type="button" class="btn bg-orange waves-effect pull-right" style="margin-top:-6px;" data-toggle="modal" data-target="#tambahTempat">TAMBAH PAKET</button>
                            </h2>
                            <div class="modal fade" id="tambahTempat" tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-orange">
                                            <h4 class="modal-title" id="largeModalLabel">TAMBAH KABAR</h4>
                                        </div>
                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'paket_tempat/tambah_paket'; ?>">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">Nama Paket</label>
                                                    <div class="form-line">
                                                        <input type="text" id="nama_paket" class="form-control" name="nama_paket" placeholder="Nama Paket" maxlength="30" required/>
                                                    </div>
                                                    <div class="help-info">Max 30 huruf</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Harga Paket</label>
                                                    <div class="form-line">
                                                        <input type="text" id="harga_paket" class="form-control" name="harga_paket" placeholder="Harga Paket" maxlength="10" onkeypress="return number_only(event)" required/>
                                                    </div>
                                                    <div class="help-info">Max 10 angka</div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="form-label">Deskripsi Paket</label>
                                                    <div class="form-line">
                                                        <input type="text" id="deskripsi_paket" class="form-control" name="deskripsi_paket" placeholder="Deskripsi Paket" maxlength="200" required/>
                                                    </div>
                                                    <div class="help-info">Max 200 huruf</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="tutup_tambah_paket('paket')">TUTUP</button>
                                                <input type="submit" class="btn bg-orange waves-effect" value="TAMBAH PAKET">
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
                                            <th>Nama</th>
                                            <th>Harga</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($paket as $item_paket): ?>
                                            <tr>
                                                <td><?php echo $item_paket->nama_paket; ?></td>
                                                <td><?php echo 'Rp. '.number_format($item_paket->harga_paket, 0, ',', '.'); ?></td>
                                                <td><?php echo $item_paket->deskripsi_paket; ?></td>
                                                <td align="center">
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#ubahPaket'.$item_paket->id_paket; ?>"><i class="material-icons">create</i></button>
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#hapusPaket'.$item_paket->id_paket; ?>"><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="<?php echo 'ubahPaket'.$item_paket->id_paket; ?>"  tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">UBAH PAKET</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'paket_tempat/ubah_paket/'.$item_paket->id_paket; ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label class="form-label">Nama Paket</label>
                                                                    <div class="form-line">
                                                                        <input type="hidden" id="<?php echo 'nama_lama'.$item_paket->id_paket; ?>" value="<?php echo $item_paket->nama_paket; ?>"/>
                                                                        <input type="text" id="<?php echo 'nama_paket'.$item_paket->id_paket; ?>" class="form-control" name="<?php echo 'nama_paket'.$item_paket->id_paket; ?>" value="<?php echo $item_paket->nama_paket; ?>" placeholder="Nama Paket" maxlength="30" required/>
                                                                    </div>
                                                                    <div class="help-info">Max 30 huruf</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Harga Paket</label>
                                                                    <div class="form-line">
                                                                        <input type="hidden" id="<?php echo 'harga_lama'.$item_paket->id_paket; ?>" value="<?php echo $item_paket->harga_paket; ?>"/>
                                                                        <input type="text" id="<?php echo 'harga_paket'.$item_paket->id_paket; ?>" class="form-control" name="<?php echo 'harga_paket'.$item_paket->id_paket; ?>" value="<?php echo $item_paket->harga_paket; ?>" placeholder="Harga Paket" maxlength="10" onkeypress="return number_only(event)" required/>
                                                                    </div>
                                                                    <div class="help-info">Max 10 angka</div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label">Deskripsi Paket</label>
                                                                    <div class="form-line">
                                                                        <input type="hidden" id="<?php echo 'deskripsi_lama'.$item_paket->id_paket; ?>" value="<?php echo $item_paket->deskripsi_paket; ?>"/>
                                                                        <input type="text" id="<?php echo 'deskripsi_paket'.$item_paket->id_paket; ?>" class="form-control" name="<?php echo 'deskripsi_paket'.$item_paket->id_paket; ?>" value="<?php echo $item_paket->deskripsi_paket; ?>" placeholder="Deskripsi Paket" maxlength="200" required/>
                                                                    </div>
                                                                    <div class="help-info">Max 200 huruf</div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="<?php echo 'tutup_ubah_paket('.$item_paket->id_paket.')'; ?>">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="UBAH PAKET">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="<?php echo 'hapusPaket'.$item_paket->id_paket; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">HAPUS PAKET</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" method="POST" action="<?php echo base_url().'paket_tempat/hapus_paket/'.$item_paket->id_paket; ?>">
                                                            <div class="modal-body" align="center">
                                                                <h5>Apakah anda yakin ingin menghapus paket ini?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="HAPUS PAKET">
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