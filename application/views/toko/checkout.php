<!-- Page Title #1
============================================= -->
<section id="page-title" class="page-title bg-overlay bg-overlay-dark bg-parallax">
  <div class="bg-section">
    <img src="<?= base_url() ?>assets/web_profile/images/page-titles/3.jpg" alt="Background" />
  </div>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
        <div class="title1">

        </div>
        <!-- .col-md-12 end -->
      </div>
      <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #page-title end -->

<!-- Checkout Summary
============================================= -->
<form class="" action="<?php echo base_url('toko/transaksi') ?>" method="post">
  <div class="row">
          <div class="col-lg-6 col-sm-12">
              <div class="list-cart">
                  <h2 class="text-info mt-2 mb-3 pt-30 h5 font-weight-semi-bold text-uppercase">Detail Pesanan</h2>
                  <div class="head-table mb-1 d-flex">
                      <div class="roww btn-kembali m-0 m-2 text-right">
                          <a class="small" href="<?= base_url('toko'); ?>">
                              &lt; Belanja produk lainnya
                          </a>
                      </div>
                  </div>

                  <div class="wrapper-cart-list">
                      <table class="table table-hover table-cart-list" id="table-cart">
                        <tbody>


                      <?php
                  if (!$keranjang) {
                      echo "<h1>Tambahkan barang ke keranjang dulu</h1>";
                      $k = true;
                  } else {
                      ?>
                  <?php foreach ($keranjang as $item): ?>
                    <input type="hidden" name="kuantitas" value="<?= $item['qty']; ?>">
                    <input type="hidden" name="idbarang" value="<?= $item['barang_id'] ?>">
                    <input type="hidden" name="harjul" value="<?= $item['barang_harjul']; ?>">
                    <input type="hidden" name="namabarang" value="<?= $item['barang_nama']; ?>">
                    <input type="hidden" name="cprice" value="<?= $item['c_price']; ?>">
                    <?php echo form_hidden('c_cart_id', $item['c_cart_id']); ?>

                          <tr>
                            <td class="b-none" width="100px">
                                <div class="wrapper-image-cart">
                                    <img width="80px" height="80px" src="<?= base_url('assets/upload/barang/'.$item['barang_image']); ?>">
                                </div>
                            </td>
                            <td class="b-none" width="50%">
                                <h5><b>Jenis</b></h5>
                                  <p class="m-0">Nama Barang: <?= $item['barang_nama']; ?></p>
                                  <p class="m-0"><b>Qty : <?= $item['qty']; ?></b></p>
                            </td>
                            <td class="b-none text-right">
                    					<p class="m-0 text-harga price-product harga-akhir font-weight-bold"><?= rupiah($item['barang_harjul']); ?></p>
                            </td>
                          </tr>
                        <?php endforeach;
                  }?>
                        <input type="hidden" name="kodefaktur" value="<?= $kodefaktur; ?>">
                        <input type="hidden" name="tprice" value="<?= $tprice; ?>">
                        </tbody>
                      </table>
                      <table class="table table-default">
                        <tbody>
                          <tr>
                              <td class="set-td text-left" width="60%">
                                  <p class="m-0">Jumlah </p>
                              </td>
                              <td class="text-right set-td ">
                                  <p class="m-0" id="subtotal"> <?= rupiah($tprice); ?></p>
                              </td>
                          </tr>
                          <tr>
                              <td class="set-td text-left b-none">
                              <p class="m-0">Ongkos Kirim (250 gr)</p>
                              </td>

                              <td class="set-td b-none text-right">
                                  <p class="m-0" id="ongkir-cart">33.000</p>
                              </td>
                          </tr>
                          <tr>
                              <td class=" text-left b-none">
                                  <p class="font-weight-bold m-0 h5 text-uppercase">Total </p>
                              </td>

                              <td class=" b-none text-right">
                                  <p class="font-weight-bold m-0 h5" align="right" id="total"><?= rupiah($tprice); ?></p>
                              </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <div class="col-lg-5 col-sm-12">
              <div>
                  <div class="d-flex wrapper-form-header mb-3">
                      <h2 class="text-info mt-2 font-weight-semi-bold h5 pt-30">DATA PENGIRIMAN</h2>
                    </div>
                        <div class="form-group mb-2">
                            <label for="nama" class="small mb-0">Nama Lengkap*</label>
                            <div class="d-flex">
                                <input type="text" class="form-control form-control-sm border-top-0 border-left-0 border-right-0 rounded-0" name="nmkonsumen" id="nmkonsumen" placeholder="" required="" value="<?= $customers['customers_nama']; ?>">
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6mb-2">
                            <label for="nohp" class="small mb-0">No. Whatsapp *</label>
                            <input type="number" class="form-control form-control-sm border-top-0 border-left-0 border-right-0 rounded-0" name="nohp" id="nohp" placeholder="" required="" value="<?= $customers['customers_nohp']; ?>">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6mb-2">
                          <label for="email" class="small mb-0">Email*</label>
                            <input type="email" class="form-control form-control-sm border-top-0 border-left-0 border-right-0 rounded-0" name="email" id="email" placeholder="" required="" value="<?= $customers['customers_email']; ?>">
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <input type="hidden" name="nmprovinsi" id="nmprovinsi">
                            <label for="nama" class="mb-0">Provinsi*</label>
                            <select class="form-control" name="idprovinsi" id="idprovinsi">
                                <option value="<?= $customers['provinsi_id']; ?>"><?= $customers['customers_provinsi']; ?></option>
                            </select>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                          <input type="hidden" name="nmprovinsi" id="nmprovinsi">
                            <label for="nama" class="mb-0">Kota / Kabupaten / Kecamatan*</label>
                            <select class="form-control" name="idkota" id="idkota">
                                <option value="<?= $customers['kota_id']; ?>"><?= $customers['customers_provinsi']; ?><?= $customers['customers_kota']; ?></option>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="alamat" class="small mb-0">Alamat*</label>
                            <input type="text" class="form-control form-control-sm border-top-0 border-left-0 border-right-0 rounded-0" name="alamat" id="alamat" placeholder="" required="" value="<?= $customers['customers_alamat']; ?>, <?= $customers['customers_kodepos']; ?>">
                        </div>
                      <button class="btn btn-info btn-lg w-100 mt-3 mb-2 text-white btn-checkout text-uppercase" type="submit">Place Order</button>
              </div>
          </div>
      </div>

  </form>
<!-- #checkoutPayment end -->
