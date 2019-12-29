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
    <div class="container">
        <div class="row">
            <h4 class="text-capitalize text--center mb-80">M y A c c o u n t</h4>
            <?= $this->session->flashdata('editprofile'); ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1 col-xs-offset-2" >
                <form class="mb-0" role="form" method="post" action="<?= base_url('account/myaccount'); ?>">
                    <div class="col-md-6">
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
                                  <a href="#order" class="active"><i class="fa fa-cart-arrow-down"></i> Order</a>
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
                    <div class="col-md-6" id="akun-profil" >
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h4 class="heading--title" name="nama">Hai, <?= $customers['customers_nama']; ?></h4>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Email :  <?= $customers['customers_email']; ?></h6>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Alamat :  <?= $customers['customers_alamat']; ?></h6>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Kota :  <?= $customers['customers_kota']; ?></h6>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Provinsi :  <?= $customers['customers_provinsi']; ?></h6>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Negara :  <?= $customers['customers_negara']; ?></h6>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Kodepos :  <?= $customers['customers_kodepos']; ?></h6>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">No. Hp :  <?= $customers['customers_nohp']; ?></h6>
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
