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
            <h4 class="text-capitalize text--center">M y A c c o u n t</h4>
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
                                <h4 class="heading--title" name="nama">Hai, <?= $customers['customers_nama']; ?></h4>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Email :  <?= $customers['customers_email']; ?></h6>
                            </div>
                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <h6 class="heading--title" name="email">Alamat :  <?= $customers['customers_alamat']; ?>
                                  <?php if ($customers['customers_alamat']==null): ?>
                                  <?php echo "Anda belum mengisi kolom ini" ?>
                                  <?php endif; ?>
                                </h6>
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

                            <div class="col-xs-8 col-sm-8 col-md-8">
                                <input type="submit" value="Edit" name="edit" class="btn btn--secondary btn--rounded btn--block">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <p>Seng kanan digae history pembelian?</p>
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
