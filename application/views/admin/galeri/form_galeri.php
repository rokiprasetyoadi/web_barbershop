<!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Foto Galeri
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/galeri/add">
                                    <div class="form-group ">
                                        <label for="galeri_id" class="control-label col-lg-3">Id Galeri</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="galeri_id" name="galeri_id" type="text" value="<?= $kode; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="galeri_nama" class="control-label col-lg-3">Nama</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="galeri_nama" name="galeri_nama" type="text" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="galeri_image" class="control-label col-lg-3">Foto</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="galeri_image" name="galeri_image" type="file" required/>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="galeri_keterangan" class="control-label col-lg-3">Keterangan</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="galeri_keterangan" name="galeri_keterangan" type="text"/>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/galeri" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->