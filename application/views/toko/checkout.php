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
                        <li>
                            <b><?= $item['qty']; ?></b> × <b><?= rupiah($item['barang_harjul']); ?></b> <?= $item['barang_nama']; ?> <span><?= rupiah($item['c_price']); ?></span>
                        </li>
                      <?php endforeach;
                      }?>
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
<section id="checkoutPayment" class="payment-methods pt-0">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="checkout-payment-box">
                    <div class="checkout-summary-heading">
                        <h3>Pilih Jasa Pengiriman + Cek Ongkir</h3>
                    </div>
                    <form class=" mb-0">
                        <fieldset class="radiogroup mb-0">
                          <div class="input-group">
                           <div class="input-group-append">
                              <span class="input-group-text">Berat</span>
                            </div>
                            <input type="number" value="1" min="1" class="form-control" id="berat" name="berat">
                            <div class="input-group-append">
                              <span class="input-group-text">Kg</span>
                            </div>
                          </div>

                          <div class="form-group">

                          </div>

                          <p>Lokasi Asal :</p>
                          <div class="form-group">
                          <select class="form-control" id="sel1">
                            <option value=""> Pilih Provinsi</option>
                          </select>
                          </div>

                          <div class="form-group">
                          <select class="form-control" id="sel2" disabled>
                            <option value=""> Pilih Kota</option>
                          </select>
                          </div>

                          <p>Lokasi Tujuan :</p>


                          <div class="form-group">
                          <select class="form-control" id="sel11">
                            <option value=""> Pilih Provinsi</option>
                          </select>
                          </div>

                          <div class="form-group">
                          <select class="form-control" id="sel22" disabled>
                            <option value=""> Pilih Kota</option>
                          </select>
                          </div>

                          <div class="form-group">
                          <select class="form-control" id="kurir" disabled>
                            <option value=""> Pilih Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="tiki">TIKI</option>
                            <option value="pos">POS Indonesia</option>
                          </select>
                          </div>

                          <div id="hasil"></div>
                        </fieldset>
                    </form>
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
                    <form class=" mb-0">
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
                									<input type="radio" name="bank" value="034-101-000-743-303">
                									<div class="radio-indicator"></div>
                								</label>
                            </div>
                            <div class="input-radio">
                                <span class="input-option"><b>BNI - 023 827 2088</b></span>
                                <label class="label-radio">
                									<input type="radio" name="bank" value="023-827-2088">
                									<div class="radio-indicator"></div>
                								</label>
                            </div>
                        </fieldset>
                    </form>
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
  } ?>
<!-- #checkoutPayment end -->
