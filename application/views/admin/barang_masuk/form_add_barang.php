<!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Barang
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/barang_masuk/addbrg">
                                    <div class="form-group ">
                                        <label for="barang_id" class="control-label col-lg-3">Id Barang</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_id" name="barang_id" type="text" value="<?= $kode; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_kategori_id" class="control-label col-lg-3">Kategori</label>
                                        <div class="col-lg-6">
                                            <select name="barang_kategori_id" required>
                                                <option value="">-- PILIH KATEGORI --</option>
                                                <?php foreach($kategori as $k):?>
                                              <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori_nama']; ?></option>
                                              <?php endforeach;?>
                                            </select>
                                            <a style="margin-left: 15px;" href="<?= site_url() ?>admin/kategori" class="btn btn-success" type="cancel">Tambah Kategori</a>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_nama" class="control-label col-lg-3">Nama Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_nama" name="barang_nama" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul_grosir" class="control-label col-lg-3">Harga Grosir</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul_grosir" name="barang_harjul_grosir" type="number" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul" class="control-label col-lg-3">Harga Ecer</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul" name="barang_harjul" type="number" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_image" class="control-label col-lg-3">Foto</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_image" name="barang_image" type="file" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_stok" class="control-label col-lg-3">Stok</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_stok" name="barang_stok" type="number" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_min_stok" class="control-label col-lg-3">Minimal Stok Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_min_stok" name="barang_min_stok" type="number" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="javascript:window.history.go(-1);" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->