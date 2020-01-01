<?php
    if($page == 'add')
    { ?>
        <!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Supplier
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/supplier/add">
                                    <div class="form-group ">
                                        <label for="supplier_id" class="control-label col-lg-3">Id Supplier</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="supplier_id" name="supplier_id" type="text" value="<?= $kode; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_nama" class="control-label col-lg-3">Nama</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_nama" name="supplier_nama" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_email" class="control-label col-lg-3">E-Mail</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_email" name="supplier_email" type="email" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_nohp" class="control-label col-lg-3">No Hp</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_nohp" name="supplier_nohp" type="number" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_alamat" class="control-label col-lg-3">Alamat</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_alamat" name="supplier_alamat" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_keterangan" class="control-label col-lg-3">Keterangan</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_keterangan" name="supplier_keterangan" type="text" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/supplier" class="btn btn-default" type="cancel">Cancel</a>
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
                            Edit Supplier
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/supplier/edit/'.$row->supplier_id); ?>">

                                    <div class="form-group ">
                                        <label for="supplier_id" class="control-label col-lg-3">Id Supplier</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_id" name="supplier_id" type="text" value="<?= $row->supplier_id; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_nama" class="control-label col-lg-3">Nama</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_nama" name="supplier_nama" type="text" value="<?= $row->supplier_nama; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_email" class="control-label col-lg-3">E-Mail</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_email" name="supplier_email" type="email" value="<?= $row->supplier_email; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_nohp" class="control-label col-lg-3">No Hp</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_nohp" name="supplier_nohp" type="number" value="<?= $row->supplier_nohp; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_alamat" class="control-label col-lg-3">Alamat</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_alamat" name="supplier_alamat" type="text" value="<?= $row->supplier_alamat; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="supplier_keterangan" class="control-label col-lg-3">Keterangan</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="supplier_keterangan" name="supplier_keterangan" type="text" value="<?= $row->supplier_keterangan; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" name="edit" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/supplier" class="btn btn-default" type="cancel">Cancel</a>
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