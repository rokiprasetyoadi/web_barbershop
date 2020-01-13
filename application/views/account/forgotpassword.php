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
            <h4 class="text-capitalize text--center">Forgot Password</h4>
            <div class="col-xs-12 col-sm-12 col-md-12 col-md-offset-4 col-xs-offset-2">
                <form class="mb-0" role="form" method="post" action="<?= base_url('account/forgotpassword'); ?>">
                    <div class="col-md-6">
                        <div class="row">
                          <div class="row inline-block">
                            <div class="col-xs-8 col-sm-8 col-md-10">
                            <?= $this->session->flashdata('pesan'); ?>
                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-10">
                              <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email:" value="<?= set_value('email'); ?>" required>
                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-10">
                                <input type="submit" value="Reset Password" name="submit" class="btn btn--secondary btn--rounded btn--block">
                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-10">
                                <p><a href="<?= base_url('login') ?>">Kembali ke login</a></p>
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
