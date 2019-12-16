<!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Status Pembayaran
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?php echo site_url('admin/pembayaran/edit/'.$row->pembayaran_id); ?>">
                                    <div class="form-group ">
                                        <label for="pembayaran_id" class="control-label col-lg-3">Id Pembayaran</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="pembayaran_id" name="pembayaran_id" type="text" value="<?= $row->pembayaran_id; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pembayaran_id" class="control-label col-lg-3">No Faktur</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="jual_nofak" name="jual_nofak" type="text" value="<?= $row->jual_nofak; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="customers" class="control-label col-lg-3">Customer</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="customers_nama" name="customers_nama" type="text" value="<?= $row->customers_nama; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="pembayaran_status" class="control-label col-lg-3">Status Pembayaran</label>
                                        <div class="col-lg-6">
                                            <select name="pembayaran_status">

                                                <option value="<?= $row->pembayaran_status; ?>"><?= $row->pembayaran_status; ?></option>

                                                <option value="">-- PILIH STATUS PEMBAYARAN --</option>
                                              <option value="Sudah Bayar">Sudah Bayar</option>
                                              <option value="Belum Bayar">Belum Bayar</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" name="edit" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/pembayaran" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->