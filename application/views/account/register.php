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
        <div class="row ">
            <h4 class="text-capitalize text--center">R E G I S T E R</h4>
            <div class="col-xs-12 col-sm-12 col-md-12 col-md-offset-4 col-xs-offset-2" >
                <form class="mb-0" action="<?= base_url('account/register') ?>" method="post" >
                    <div class="col-md-6">
                        <div class="row inline-block">
                            <input type="hidden" name="registrasi">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap:" value="<?= set_value('nama'); ?>" required>
                                <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="email" class="form-control" name="email" placeholder="Email:" value="<?= set_value('email'); ?>" required>
                                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="password" class="form-control" name="password1" placeholder="Password:" required>
                                <?= form_error('password1', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="password" class="form-control" name="password2" placeholder="Konfirmasi Password:" required>
                                <?= form_error('password2', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="submit" value="Register" name="submit" class="btn btn--secondary btn--rounded btn--block">
                            </div>

                            <p class="col-xs-12 col-sm-12 col-md-12 mt-20">Sudah memiliki akun?  <a href="<?= base_url('account/login') ?>">Login</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix mb-30">
    </div>
</section>
