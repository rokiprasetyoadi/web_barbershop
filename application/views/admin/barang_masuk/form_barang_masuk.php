        <!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Barang Masuk
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/barang_masuk/add">
                                    <div class="form-group ">
                                        <label for="brgmasuk_nota" class="control-label col-lg-3">Id Nota</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="brgmasuk_nota" name="brgmasuk_nota" type="text" value="<?= $kode; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="brgmasuk_supplier_id" class="control-label col-lg-3">Supplier</label>
                                        <div class="col-lg-6">
                                            <select name="brgmasuk_supplier_id" required>
                                                <option value="">-- PILIH SUPPLIER --</option>
                                                <?php foreach($supplier as $k):?>
                                              <option value="<?= $k['supplier_id']; ?>"><?= $k['supplier_nama']; ?></option>
                                              <?php endforeach;?>
                                            </select>
                                            <a style="margin-left: 15px;" href="<?= site_url() ?>admin/supplier" class="btn btn-success" type="cancel">Tambah Data Supplier</a>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="brgmasuk_keterangan" class="control-label col-lg-3">Keterangan</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="brgmasuk_keterangan" name="brgmasuk_keterangan" type="text" />
                                        </div>
                                    </div>
                                    

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/barang_masuk" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->