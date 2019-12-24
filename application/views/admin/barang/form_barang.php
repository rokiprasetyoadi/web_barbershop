<?php
    if($page == 'add')
    { ?>
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
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/barang/add">
                                    <div class="form-group ">
                                        <label for="barang_id" class="control-label col-lg-3">Id Barang</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_id" name="barang_id" type="text" value="<?= $kode; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_kategori_id" class="control-label col-lg-3">Kategori</label>
                                        <div class="col-lg-6">
                                            <select name="barang_kategori_id">
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
                                            <input class="form-control " id="barang_nama" name="barang_nama" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul_grosir" class="control-label col-lg-3">Harga Grosir</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul_grosir" name="barang_harjul_grosir" type="number" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul" class="control-label col-lg-3">Harga Ecer</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul" name="barang_harjul" type="number" />
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
                                            <input class="form-control " id="barang_stok" name="barang_stok" type="number" />
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
                                            <a href="<?= site_url() ?>admin/barang" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->

    <?php }
                else
                {
                ?>
                <!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Barang
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/barang/edit/'.$row->barang_id); ?>">
                                    <div class="form-group ">
                                        <label for="barang_id" class="control-label col-lg-3">Id Barang</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_id" name="barang_id" type="text" value="<?= $row->barang_id; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_kategori_id" class="control-label col-lg-3">Kategori</label>
                                        <div class="col-lg-6">
                                            <select name="barang_kategori_id">
                                                <option value="<?= $row->barang_kategori_id; ?>"><?= $row->kategori_nama; ?></option>
                                                <option value="">-- PILIH KATEGORI LAIN --</option>
                                                <?php foreach($kategori as $k):?>
                                              <option value="<?= $k['kategori_id']; ?>"><?= $k['kategori_nama']; ?></option>
                                              <?php endforeach;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_nama" class="control-label col-lg-3">Nama Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_nama" name="barang_nama" type="text" value="<?= $row->barang_nama; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul_grosir" class="control-label col-lg-3">Harga Grosir</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul_grosir" name="barang_harjul_grosir" type="number" value="<?= $row->barang_harjul_grosir; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul" class="control-label col-lg-3">Harga Ecer</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul" name="barang_harjul" type="number" value="<?= $row->barang_harjul; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_image" class="control-label col-lg-3">Foto</label>
                                        <div class="col-lg-1">
                                            <a href="<?= base_url('assets/upload/barang/'.$row->barang_image) ?>" data-fancybox data-caption="Foto Barang"> <img style="height: 75px; width: 75px;" src="<?= base_url('assets/upload/barang/'.$row->barang_image) ?>"></a>
                                        </div>
                                        <div class="col-lg-5">
                                            <input class="form-control " id="barang_image" name="barang_image" type="file" value="<?= $row->barang_image; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_stok" class="control-label col-lg-3">Stok</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_stok" name="barang_stok" type="number" value="<?= $row->barang_stok; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_min_stok" class="control-label col-lg-3">Minimal Stok Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_min_stok" name="barang_min_stok" type="number" value="<?= $row->barang_min_stok; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" name="edit" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/barang" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->
                <?php } ?>