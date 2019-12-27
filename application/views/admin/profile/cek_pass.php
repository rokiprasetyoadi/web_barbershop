<div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Ubah Password
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " method="POST" enctype="multipart/form-data" action="<?= site_url() ?>admin/profile/edit_pass">
                                    <div class="form-group" hidden>
                                        <label for="admin_id" class="control-label col-lg-3">admin_id</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="admin_id" name="admin_id" type="text"  value="<?php echo $this->session->userdata('admin_id') ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="admin_password" class="control-label col-lg-3">Password Lama</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="admin_password" name="admin_password" type="password" />
                                        </div>
                                    </div>

                                    <div class="form-group ">
                                        <label for="admin_password" class="control-label col-lg-3">Password Baru</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="admin_password1" name="admin_password1" type="password" />
                                        </div>
                                    </div>
                                    <?= $this->session->flashdata('pesan'); ?>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <button class="btn btn-default" type="button">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>