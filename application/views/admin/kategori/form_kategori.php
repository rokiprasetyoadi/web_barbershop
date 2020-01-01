<?php
    if($page == 'add')
    { ?>
        <!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Kategori
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/kategori/add">
                                    <div class="form-group ">
                                        <label for="kategori_id" class="control-label col-lg-3">Id Kategori</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="kategori_id" type="text" value="<?= $kode; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="kategori_nama" class="control-label col-lg-3">Nama Kategori</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="kategori_nama" name="kategori_nama" type="text" required/>
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
                            Edit Kategori
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/kategori/edit/'.$row->kategori_id); ?>">
                                    <div class="form-group ">
                                        <label for="kategori_id" class="control-label col-lg-3">Id Kategori</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="kategori_id" type="text" value="<?= $row->kategori_id; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_kategori_id" class="control-label col-lg-3">Nama Kategori</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" name="kategori_nama" value="<?= $row->kategori_nama; ?>" type="text" required/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" name="edit" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/kategori" class="btn btn-default" type="cancel">Cancel</a>
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