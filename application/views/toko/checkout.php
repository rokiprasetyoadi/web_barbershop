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


<section id="checkoutSummary" class="checkout-summary pt-30 pb-30">
    <div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="checkout-summary-box">
                    <div class="checkout-summary-heading">
                        <h3>Order Summary</h3>
                    </div>
                    <ul class="list-unstyled mb-0">
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
                        <li>
                            <b><?= $item['qty']; ?></b> × <b><?= rupiah($item['barang_harjul']); ?></b> <?= $item['barang_nama']; ?> <span><?= rupiah($item['c_price']); ?></span>
                        </li>
                      <?php endforeach;
                      }?>
                      <input type="hidden" name="kodefaktur" value="<?= $kodefaktur; ?>">
                      <input type="hidden" name="tprice" value="<?= $tprice; ?>">
                    </ul>
                    <?php
                      if (!$keranjang) {
                      } else {
                          ?>
                    <div class="checkout-cart-total">
                        Total<span class="cart-product-total"><?= rupiah($tprice); ?></span>
                    </div>
                  <?php
                      } ?>
                </div>
            </div>
            <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<!-- #checkoutSummary end -->

<!-- Ongkir begin -->

<?php
if (!$keranjang) {
                          null;
                      } else {
                          ?>
<section id="checkoutPayment" class="payment-methods pt-30 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="checkout-payment-box">
                    <div class="checkout-summary-heading">
                        <h3>Alamat Pengiriman</h3>
                    </div>
                    <div class="form-group">
                      <p>Nama Penerima :</p>
                      <input class="form-control" type="text" name="penerima" value="<?= $customers['customers_nama']; ?>" readonly>
                    </div>
                    <div class="form-group">
                      <p>Alamat :</p>
                      <input class="form-control" type="text" name="jalan" value="<?= set_value('jalan'); ?>">
                      <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <p>Kecamatan :</p>
                      <input class="form-control" type="text" name="kecamatan" value="<?= set_value('kecamatan'); ?>">
                      <?= form_error('kecamatan', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <p>Kabupaten/Kota :</p>
                      <input class="form-control" type="text" name="kabupaten" value="<?= set_value('kabupaten'); ?>">
                      <?= form_error('kabupaten', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <p>Provinsi :</p>
                      <input class="form-control" type="text" name="provinsi" value="<?= set_value('provinsi'); ?>">
                      <?= form_error('provinsi', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <p>Kodepos :</p>
                      <input class="form-control" type="text" name="kodepos" value="<?= set_value('kodepos'); ?>">
                      <?= form_error('kodepos', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <p>Nomer Hp :</p>
                      <input class="form-control" type="text" name="nohp" value="<?= set_value('nohp'); ?>">
                      <?= form_error('nohp', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>

    <!-- .container end -->
</section>


<section id="checkoutPayment" class="payment-methods pt-0 pb-30">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="checkout-payment-box">
                    <div class="checkout-summary-heading">
                        <h3>Pilih Jasa Pengiriman + Cek Ongkir</h3>
                    </div>
                        <fieldset class="radiogroup mb-0">
                          <div class="input-group">
                            <input type="hidden" value="1" min="1" class="form-control" id="berat" name="berat">
                          </div>

                          <div class="form-group" hidden>
                          <select class="form-control provinsi" name="provasal" id="sel1" required>
                            <option value=""> Pilih Provinsi</option>
                          </select>
                          </div>

                          <div class="form-group" hidden>
                          <select class="form-control" name="kotaasal" id="sel2" required>
                            <option value="160"> Pilih Kota</option>
                          </select>
                          </div>

                          <p>Lokasi Tujuan :</p>


                          <div class="form-group">
                          <select class="form-control" name="provtujuan" id="sel11" required>
                            <option value=""> Pilih Provinsi</option>
                          </select>
                          </div>

                          <div class="form-group ">
                          <select class="form-control" name="kotatujuan" id="sel22" disabled>
                            <option value=""> Pilih Kota</option>
                          </select>
                          </div>

                          <div class="form-group">
                          <select class="form-control" name="kurir" id="kurir" disabled>
                            <option value=""> Pilih Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS Indonesia</option>
                          </select>
                          </div>

                          <div id="hasil"></div>
                        </fieldset>
                </div>
            </div>
        </div>
        <!-- .row end -->
    </div>

    <!-- .container end -->
</section>
<?php
                      } ?>

<!-- Ongkir end -->

<!-- checkout Payment
============================================= -->
<?php
  if (!$keranjang) {
      null;
  } else {
      ?>
<section id="checkoutPayment" class="payment-methods pt-0">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="checkout-payment-box">
                    <div class="checkout-summary-heading">
                        <h3>Payment Method</h3>
                    </div>
                        <fieldset class="radiogroup mb-0">
                            <div class="input-radio">
                                <span class="input-option"><b>Mandiri - 0700 000 899 922</b></span>
                                <label class="label-radio">
									                <input type="radio" name="bank" value="0700-000-899-922">
									                <div class="radio-indicator"></div>
								                </label>
                            </div>

                            <div class="input-radio">
                                <span class="input-option"><b>BRI - 034 101 000 743 303</b></span>
                                <label class="label-radio">
                									<input type="radio" name="bank" value="034-101-000-743-303" required>
                									<div class="radio-indicator"></div>
                								</label>
                            </div>
                            <div class="input-radio">
                                <span class="input-option"><b>BNI - 023 827 2088</b></span>
                                <label class="label-radio">
                									<input type="radio" name="bank" value="023-827-2088" required>
                									<div class="radio-indicator"></div>
                								</label>
                            </div>
                        </fieldset>
                </div>
            </div>
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="submit" value="Place Order" name="submit" class="btn btn--secondary btn--rounded pull-right mt-40">
            </div>
        </div>
        <!-- .row end -->
    </div>
    <!-- .container end -->
</section>
<?php
  }?>
  </form>
<!-- #checkoutPayment end -->
