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
      <?php foreach ($selectexp as $tgl): ?>
      <?= form_hidden('paktur', $tgl['jual_nofak']); ?>
    <?php endforeach; ?>r
        <div class="row">
            <h4 class="text-capitalize text--center mb-80">M y A c c o u n t</h4>
            <?= $this->session->flashdata('editprofile'); ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-md-offset-1 col-xs-offset-2" >
                <form class="mb-0 text-black" role="form" method="post" action="<?= base_url('account/order'); ?>">
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
                            <?= $this->session->flashdata('pesan'); ?>
                    				<div class="panel panel-primary">
                    					<div class="panel-heading">
                    						<h3 class="panel-title">Order list</h3>
                    					</div>
                              <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th>No. Faktur</th>
                                  <th>Tanggal Transaksi</th>
                                  <th>Status</th>
                                  <th>Total</th>
                                  <th>Menu</th>
                                </tr>
                              </thead>
                              <?php foreach ($pesanan as $pesan): ?>
                              <tbody>
                                <tr>
                                  <?php // FIXME: alur proses batal pemesanan?>
                                  <td> <a href="<?= base_url('account/order/bayar/'.$pesan['jual_nofak']); ?>"><?= $pesan['jual_nofak']; ?></td></a>
                                  <td><?= date('d F Y', strtotime($pesan['jual_tgl'])); ?></td>
                                  <td><?= $pesan['jual_status']; ?></td>
                                  <td><?php $hasil = $pesan['jual_total'] + $pesan['jual_biaya']; echo rupiah($hasil); ?></td>
                                  <td> <a href="<?= base_url('account/order/batalPesan/'.$pesan['jual_nofak']); ?>" onclick="javascript:return confirm('yakin ingin membatalkan pemesanan?')" class="btn btn-warning btn-sm">Batalkan</a> </td>
                                </tr>
                              </tbody>
                              <?php endforeach; ?>
                              </table>
                    				</div>
                    			</div>
                </form>
            </div>
        </div>
    </div>
    <div class="clearfix mb-30">
    </div>
</section>
