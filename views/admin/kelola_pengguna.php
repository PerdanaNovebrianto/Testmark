    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>KELOLA USER</h2>
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
                                            <th>Universitas</th>
                                            <th>Angkatan</th>
                                            <th>Telepon</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pengguna as $item_pengguna): ?>
                                            <tr>
                                                <td><?php echo $item_pengguna->nama; ?></td>
                                                <td><?php echo $item_pengguna->universitas; ?></td>
                                                <td><?php echo $item_pengguna->angkatan; ?></td>
                                                <td><?php echo $item_pengguna->phone; ?></td>
                                                <td><?php echo $item_pengguna->email; ?></td>
                                                <td><?php echo $item_pengguna->password; ?></td>
                                                <td><?php echo $item_pengguna->status; ?></td>
                                                <td align="center">
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#ubahPengguna'.$item_pengguna->id; ?>"><i class="material-icons">create</i></button>
                                                    <button type="button" class="btn bg-orange waves-effect" style="margin:2px;" data-toggle="modal" data-target="<?php echo '#hapusPengguna'.$item_pengguna->id; ?>"><i class="material-icons">delete</i></button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="<?php echo 'ubahPengguna'.$item_pengguna->id; ?>"  tabindex="-1" role="dialog" data-toggle="modal" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">UBAH PENGGUNA</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" enctype="multipart/form-data" method="POST" action="<?php echo base_url().'kelola_pengguna/ubah_pengguna/'.$item_pengguna->id; ?>">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="hidden" id="<?php echo 'status_lama'.$item_pengguna->id; ?>" value="<?php echo $item_pengguna->status; ?>">
                                                                    <?php if($item_pengguna->status == 'active'){?>
                                                                        <label class="form-label">Status</label><br>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'active'.$item_pengguna->id; ?>" name="<?php echo 'status'.$item_pengguna->id; ?>" value="active" checked="checked"/>
                                                                        <label for="<?php echo 'active'.$item_pengguna->id; ?>">Active</label>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'unactive'.$item_pengguna->id; ?>" name="<?php echo 'status'.$item_pengguna->id; ?>" value="unactive"/>
                                                                        <label for="<?php echo 'unactive'.$item_pengguna->id; ?>">Unactive</label>
                                                                    <?php } ?>
                                                                    <?php if($item_pengguna->status == 'unactive'){?>
                                                                        <label class="form-label">Status</label><br>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'active'.$item_pengguna->id; ?>" name="<?php echo 'status'.$item_pengguna->id; ?>" value="active"/>
                                                                        <label for="<?php echo 'active'.$item_pengguna->id; ?>">Active</label>
                                                                        <input type="radio" class="with-gap radio-col-orange" id="<?php echo 'unactive'.$item_pengguna->id; ?>" name="<?php echo 'status'.$item_pengguna->id; ?>" value="unactive" checked="checked"/>
                                                                        <label for="<?php echo 'unactive'.$item_pengguna->id; ?>">Unactive</label>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal" onclick="<?php echo 'tutup_ubah_pengguna('.$item_pengguna->id.')'; ?>">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="UBAH PENGGUNA">
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="<?php echo 'hapusPengguna'.$item_pengguna->id; ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-orange">
                                                            <h4 class="modal-title" id="largeModalLabel">HAPUS PENGGUNA</h4>
                                                        </div>
                                                        <form id="form_advanced_validation" method="POST" action="<?php echo base_url().'kelola_pengguna/hapus_pengguna/'.$item_pengguna->id; ?>">
                                                            <div class="modal-body" align="center">
                                                                <h5>Apakah anda yakin ingin menghapus pengguna ini?</h5>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">TUTUP</button>
                                                                <input type="submit" class="btn bg-orange waves-effect" value="HAPUS PENGGUNA">
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