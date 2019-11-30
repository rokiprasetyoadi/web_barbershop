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
            <h4 class="text-capitalize text--center">L o g i n</h4>
                                <?= $this->session->flashdata('pesan'); ?>
            <?= $this->session->flashdata('messagesuccess'); ?>
            <?= $this->session->flashdata('message'); ?>
            <?= $this->session->flashdata('messageforgot'); ?>
            <?= $this->session->flashdata('messagelogin'); ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1 col-xs-offset-2" >
                <form class="mb-0" role="form" method="post" action="<?= base_url('account/login'); ?>">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email:" value="<?= set_value('email'); ?>" required>
                                <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password:" required>
                                <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                            </div>

                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="submit" value="Login" name="submit" class="btn btn--secondary btn--rounded btn--block">
                            </div>

                            <p class="col-xs-12 col-sm-12 col-md-12 mt-10"><a href="<?= base_url('forgot')?>">
                                Lupa password ?
                            </a></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p>Atau, login dengan</p>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <a href="#" class="btn btn--secondary btn--rounded btn--block">
                                    <i class="fa fa-facebook"></i>   Facebook
                                </a>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8 mt-20">
                                <a href="#" class="btn btn--secondary btn--rounded btn--block">
                                    <i class="fa fa-google-plus"></i>   Google
                                </a>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-10">
                                <p>Belum punya akun ? <a href="<?= base_url('register') ?>">Register</a></p>
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
