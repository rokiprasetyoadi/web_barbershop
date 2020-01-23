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
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1 col-xs-offset-2" >
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-xs-8 col-sm-8 col-md-8 font-15">
                              <div class="time-panel">
                                  <a href="<?= base_url(); ?>myaccount" class="active"><i class="fa fa-user"></i> Akun Profile</a>
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
                      <?= $this->session->flashdata('pesan'); ?>
                      <form class="mb-0" role="form" method="post" action="<?= base_url('account/myaccount/editbio'); ?>" accept-charset="utf-8">
                        <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap:" id="nama" value="<?= $customers['customers_nama']; ?>" readonly>
                              <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <input type="email" id="email" class="form-control" name="email" placeholder="Email:" value="<?= $customers['customers_email']; ?>" readonly>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-8 col-sm-8 col-md-8">
                              <input type="text" id="alamat" class="form-control" name="alamat" placeholder="Alamat:" value="<?= $customers['customers_alamat']; ?>" readonly>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <input type="hidden" class="form-control" name="nama_provinsi" id="nama_provinsi" placeholder="Provinsi:" value="<?= $customers['customers_provinsi']; ?>">
                              <select class="form-control" name="province_id" id="provinsi_id" disabled>
                                <?php if ($customers['customers_provinsi'] != null):?>
                                <option value="<?= $customers['provinsi_id']; ?>"><?= $customers['customers_provinsi']; ?></option>
                              <?php endif; ?>
                                <option value="">-- Pilih Provinsi --</option>
                              </select>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <input type="hidden" class="form-control" name="kotakab" id="kotakab" placeholder="Kabupaten:" value="<?= $customers['customers_kota']; ?>">
                              <select class="form-control" name="kabupaten_id" id="city_id" disabled>
                                <?php if ($customers['customers_kota'] != null): ?>
                                <option value="<?= $customers['kota_id']; ?>"><?= $customers['customers_kota']; ?></option>
                                <?php endif; ?>
                                <option value="">-- Pilih Kab/Kota --</option>
                              </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <input type="text" id="kodepos" class="form-control" name="kodepos" placeholder="Kode Pos:" value="<?= $customers['customers_kodepos']; ?>" readonly>
                              <?= form_error('kodepos', '<small class="text-danger">', '</small>'); ?>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <input type="text" id="nohp" class="form-control" name="nohp" placeholder="No. Hp:" value="<?= $customers['customers_nohp']; ?>" readonly>
                              <?= form_error('nohp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <a id="openedit" class="btn btn--secondary btn--rounded btn--block ">Edit</a>
                              <a id="cancel" class="btn btn--secondary btn--rounded btn--block" >Cancel</a>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                              <button name="save" id="save" type="submit" class="btn btn--secondary btn--rounded btn--block">Save</button>
                          </div>
                        </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    <div class="clearfix mb-30">
    </div>
</section>
