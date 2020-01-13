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
            <?= $this->session->flashdata('passwordbener'); ?>
            <?= $this->session->flashdata('passwordsama'); ?>
            <?= $this->session->flashdata('passwordlama'); ?>
            <?= $this->session->flashdata('passwordsuccess'); ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1 col-xs-offset-2" >
                <form class="mb-0" role="form" method="post" action="<?= base_url('changepassword'); ?>" accept-charset="utf-8">
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
                                  <a href="<?= base_url(); ?>order" class="active"><i class="fa fa-cart-arrow-down"></i> Order</a>
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
                          <div class="col-xs-6 col-sm-6 col-md-6">
                              <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                              <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                          </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                              <input type="submit" value="Reset Password" name="submit" class="btn btn--secondary btn--rounded btn--block">
                          </div>
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
