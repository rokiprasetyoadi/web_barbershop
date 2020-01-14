<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title">
    <div class="container-fluid bg-overlay bg-overlay-dark">
        <div class="bg-section">
            <img src="<?= base_url() ?>assets/web_profile/images/page-titles/1.jpg" alt="Background" />
        </div>
        <div class="row">
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="title1">
                </div>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #page-title end -->


<!-- Columns Section
============================================= -->
<section>
    <!--One Half-->
    <div class="container " >
        <div class="row">
            <h4 class="text-capitalize text--center mb-80">M y A c c o u n t</h4>
            <?= $this->session->flashdata('editprofile'); ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1 col-xs-offset-2" >
                <form class="mb-0 text-black" role="form" method="post" action="<?= base_url('account/myaccount'); ?>">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8 font-15">
                              <div class="time-panel">
                                  <a href="<?= base_url(); ?>myaccount" class="active"><i class="fa fa-user"></i> Akun Profile</a>
                              </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 font-15">
                              <div class="time-panel">
                                  <a href="<?= base_url(); ?>editaccount" class="active"><i class="fa fa-user"></i> Edit Akun Profile</a>
                              </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 font-15">
                              <div class="time-panel">
                                <?php $id = $this->session->userdata('id') ?>
                                  <a href="<?= base_url(); ?>order/<?php $id ?>" class="active"><i class="fa fa-cart-arrow-down"></i> Order</a>
                              </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 font-15">
                              <div class="time-panel">
                                  <a href="<?= base_url(); ?>changepassword" class="active"><i class="fa fa-key"></i> Ubah Password</a>
                              </div>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 font-15">
                              <div class="time-panel">
                                  <a href="<?= base_url(); ?>logout" class="active"><i class="fa fa-dashboard"></i> Logout</a>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-4">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap:" value="<?= $customers['customers_nama']; ?>" readonly>
                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-4">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" placeholder="Email:" value="<?= $customers['customers_email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                              <label>Alamat</label>
                              <input type="text" class="form-control" name="alamat" placeholder="Alamat:" value="<?= $customers['customers_alamat']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-4">
                              <label>Kota</label>
                              <input type="text" class="form-control" name="alamat" placeholder="Alamat:" value="<?= $customers['customers_kota']; ?>" readonly>
                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-4">
                              <label>Provinsi</label>
                              <input type="text" class="form-control" name="alamat" placeholder="Alamat:" value="<?= $customers['customers_provinsi']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-6">
                              <label>Negara</label>
                              <input type="text" class="form-control" name="alamat" placeholder="Alamat:" value="<?= $customers['customers_negara']; ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-4">
                              <label>Kode Pos</label>
                              <input type="text" class="form-control" name="alamat" placeholder="Alamat:" value="<?= $customers['customers_kodepos']; ?>" readonly>
                            </div>

                           <div class="col-xs-8 col-sm-8 col-md-4">
                             <label>Nomor Handphone</label>
                             <input type="text" class="form-control" name="alamat" placeholder="Alamat:" value="<?= $customers['customers_nohp']; ?>" readonly>
                           </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix mb-30">
    </div>
</section>
