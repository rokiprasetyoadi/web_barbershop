<!-- page start-->
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Detail Barang Masuk
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="col-md-5 col-sm-5 pull-left">
                                <div class="btn-group" style="margin-bottom: 20px;">
                                    <a class="btn btn-danger" href="<?= site_url() ?>admin/barang_masuk">
                                        Kembali &nbsp;<i class="fa fa-undo"></i>
                                    </a>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Nota</div>
                                    <div class="col-md-8 col-sm-7"><?= $row['brgmasuk_nota'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier Nama</div>
                                    <div class="col-md-8 col-sm-7"><?= $row['supplier_nama'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier Email</div>
                                    <div class="col-md-8 col-sm-7"><?= $row['supplier_email'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier No Hp</div>
                                    <div class="col-md-8 col-sm-7"><?= $row['supplier_nohp'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier Alamat</div>
                                    <div class="col-md-8 col-sm-7"><?= $row['supplier_alamat'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Keterangan</div>
                                    <div class="col-md-8 col-sm-7"><?= $row['supplier_keterangan'] ?></div>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-5 pull-right">
                                <a style="float: right;" class="btn btn-info" href="<?= site_url() ?>admin/barang_masuk/printdtl/<?= $row['brgmasuk_nota'] ?>">
                                            Print &nbsp;<i class="fa fa-print"></i>
                                </a>
                            </div>

                            <div class="col-md-6 col-sm-5 pull-right" style="background-color: #FAFAFA; margin-top: 15px;">
                                <label ><h4>Tambah Barang</h4></label>
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/barang_masuk/aksi_edit">
                                    <div class="form-group" hidden>
                                        <label for="detailmasuk_brgmasuk_nota" class="control-label col-lg-3">Nota</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="detailmasuk_brgmasuk_nota" name="detailmasuk_brgmasuk_nota" value="<?= $row['brgmasuk_nota'] ?>" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="detailmasuk_barang_id" class="control-label col-lg-3"> Barang</label>
                                        <div class="col-lg-6">
                                            <select name="detailmasuk_barang_id" required>
                                                <option value="">-- PILIH BARANG --</option>

                                                <?php foreach($barang as $k):?>
                                              <option value="<?= $k['barang_id']; ?>"><?= $k['barang_nama']; ?></option>
                                              <?php endforeach;?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="detailmasuk_harpok" class="control-label col-lg-3">Harga</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="detailmasuk_harpok" name="detailmasuk_harpok" type="number" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="detailmasuk_jumlah" class="control-label col-lg-3">Jumlah</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="detailmasuk_jumlah" name="detailmasuk_jumlah" type="number" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix">
                                <div style="margin-top: 15px;"></div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Pokok</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($detail_brg as $data):?>
                                <tr class="">
                                    <td><?= $data->detailmasuk_barang_id ?></td>
                                    <td><?= $data->barang_nama ?></td>
                                    <td><?= $data->detailmasuk_harpok ?></td>
                                    <td><?= $data->detailmasuk_jumlah ?></td>
                                    <td><?= $data->detailmasuk_subtotal ?></td>
                                    <td><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/barang_masuk/delete_brg/<?= $data->detailmasuk_barang_id ?>')" href="#!">Delete</a></td>
                                </tr>
                                <?php endforeach; ?>
        
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="col-lg-offset-3 col-lg-6">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->