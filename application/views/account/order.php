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

                              <ul class="nav nav-tabs nav-justified">
                                 <li class="active"><a data-toggle="tab" href="#notpaid">Belum Bayar</a></li>
                                 <li><a data-toggle="tab" href="#proses">Proses</a></li>
                                 <li><a data-toggle="tab" href="#dikirim">Di Kirim</a></li>
                                 <li><a data-toggle="tab" href="#diterima">Di Terima</a></li>
                                 <li><a data-toggle="tab" href="#dibatalkan">Di Batalkan</a></li>
                                 <li><a data-toggle="tab" href="#reject">Di Rejected</a></li>
                               </ul>

                               <div class="tab-content">
                                 <div id="notpaid" class="tab-pane fade in active">
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
                                   <?php foreach ($notpaid as $np): ?>
                                   <tbody>
                                     <tr>
                                       <?php // FIXME: alur proses batal pemesanan?>
                                       <td> <a href="<?= base_url('account/order/bayar/'.$np['jual_nofak']); ?>"><?= $np['jual_nofak']; ?></td></a>
                                       <td><?= date('d F Y', strtotime($np['jual_tgl'])); ?></td>
                                       <td><?= $np['jual_status']; ?></td>
                                       <td><?php $hasil = $np['jual_total'] + $np['jual_biaya']; echo rupiah($hasil); ?></td>
                                       <td> <a href="<?= base_url('account/order/batalPesan/'.$np['jual_nofak']); ?>" onclick="javascript:return confirm('yakin ingin membatalkan pemesanan?')" class="btn btn-warning btn-sm">Batalkan</a> </td>
                                     </tr>
                                   </tbody>
                                   <?php endforeach; ?>
                                   </table>
                                 </div>
                                 <div id="proses" class="tab-pane fade">
                                   <table class="table table-bordered">
                                   <thead>
                                     <tr>
                                       <th>No. Faktur</th>
                                       <th>Tanggal Transaksi</th>
                                       <th>Status</th>
                                       <th>Total</th>
                                     </tr>
                                   </thead>
                                   <?php foreach ($proses as $proses): ?>
                                   <tbody>
                                     <tr>
                                       <?php // FIXME: alur proses batal pemesanan?>
                                       <td> <a href="<?= base_url('account/order/bayar/'.$proses['jual_nofak']); ?>"><?= $proses['jual_nofak']; ?></td></a>
                                       <td><?= date('d F Y', strtotime($proses['jual_tgl'])); ?></td>
                                       <td><?= $proses['jual_status']; ?></td>
                                       <td><?php $hasil = $proses['jual_total'] + $proses['jual_biaya']; echo rupiah($hasil); ?></td>
                                     </tr>
                                   </tbody>
                                   <?php endforeach; ?>
                                   </table>
                                 </div>
                                 <div id="dikirim" class="tab-pane fade">
                                   <table class="table table-bordered">
                                   <thead>
                                     <tr>
                                       <th>No. Faktur</th>
                                       <th>Tanggal Transaksi</th>
                                       <th>Status</th>
                                       <th>Total</th>
                                     </tr>
                                   </thead>
                                   <?php foreach ($kirim as $kirim): ?>
                                   <tbody>
                                     <tr>
                                       <?php // FIXME: alur kirim batal pemesanan?>
                                       <td> <a href="<?= base_url('account/order/bayar/'.$kirim['jual_nofak']); ?>"><?= $kirim['jual_nofak']; ?></td></a>
                                       <td><?= date('d F Y', strtotime($kirim['jual_tgl'])); ?></td>
                                       <td><?= $kirim['jual_status']; ?></td>
                                       <td><?php $hasil = $kirim['jual_total'] + $kirim['jual_biaya']; echo rupiah($hasil); ?></td>
                                     </tr>
                                   </tbody>
                                   <?php endforeach; ?>
                                   </table>
                                 </div>
                                 <div id="diterima" class="tab-pane fade">
                                   <table class="table table-bordered">
                                   <thead>
                                     <tr>
                                       <th>No. Faktur</th>
                                       <th>Tanggal Transaksi</th>
                                       <th>Status</th>
                                       <th>Total</th>
                                     </tr>
                                   </thead>
                                   <?php foreach ($terima as $terima): ?>
                                   <tbody>
                                     <tr>
                                       <?php // FIXME: alur terima batal pemesanan?>
                                       <td> <a href="<?= base_url('account/order/bayar/'.$terima['jual_nofak']); ?>"><?= $terima['jual_nofak']; ?></td></a>
                                       <td><?= date('d F Y', strtotime($terima['jual_tgl'])); ?></td>
                                       <td><?= $terima['jual_status']; ?></td>
                                       <td><?php $hasil = $terima['jual_total'] + $terima['jual_biaya']; echo rupiah($hasil); ?></td>
                                     </tr>
                                   </tbody>
                                   <?php endforeach; ?>
                                   </table>
                                 </div>

                                 <div id="dibatalkan" class="tab-pane fade">
                                   <table class="table table-bordered">
                                   <thead>
                                     <tr>
                                       <th>No. Faktur</th>
                                       <th>Tanggal Transaksi</th>
                                       <th>Status</th>
                                       <th>Total</th>
                                     </tr>
                                   </thead>
                                   <?php foreach ($batal as $batal): ?>
                                   <tbody>
                                     <tr>
                                       <?php // FIXME: alur batal batal pemesanan?>
                                       <td> <a href="<?= base_url('account/order/bayar/'.$batal['jual_nofak']); ?>"><?= $batal['jual_nofak']; ?></td></a>
                                       <td><?= date('d F Y', strtotime($batal['jual_tgl'])); ?></td>
                                       <td><?= $batal['jual_status']; ?></td>
                                       <td><?php $hasil = $batal['jual_total'] + $batal['jual_biaya']; echo rupiah($hasil); ?></td>
                                     </tr>
                                   </tbody>
                                   <?php endforeach; ?>
                                   </table>
                                 </div>

                                 <div id="reject" class="tab-pane fade">
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
                                   <?php foreach ($rejected as $rejected): ?>
                                   <tbody>
                                     <tr>
                                       <?php // FIXME: alur rejected rejected pemesanan?>
                                       <td> <a href="<?= base_url('account/order/bayar/'.$rejected['jual_nofak']); ?>"><?= $rejected['jual_nofak']; ?></td></a>
                                       <td><?= date('d F Y', strtotime($rejected['jual_tgl'])); ?></td>
                                       <td><?= $rejected['jual_status']; ?></td>
                                       <td><?php $hasil = $rejected['jual_total'] + $rejected['jual_biaya']; echo rupiah($hasil); ?></td>
                                       <td> <a href="<?= base_url('account/order/perpanjangBayar/'.$rejected['jual_nofak']); ?>" onclick="javascript:return confirm('yakin ingin memperpanjgan masa pembayaran?')" class="btn btn-warning btn-sm">Perpanjang</a> </td>
                                     </tr>
                                   </tbody>
                                   <?php endforeach; ?>
                                   </table>
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
