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

<!-- Shop Cart
============================================= -->
<section id="shopcart" class="shop shop-cart bg-white">
    <div class="container">

        <div class="row">
          <p style="font-size:20px;">Jasa Pengiriman : <?= $ongkir['jual_kurir']; ?></p>
          <p style="font-size:20px">Service : <?= $ongkir['jual_layanan']; ?></p>
          <p style="font-size:30px; color:black;">No Faktur : <?= $ongkir['jual_nofak']; ?></p>
          <table class="table" style="color:black;">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ID Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Qty</th>
                <th scope="col">Harga per item</th>
                <th scope="col">Sub Total</th>

              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach ($detil_barang as $db): ?>
              <tr>
                <th scope="row" style="font-size:15px;"><?= $no; ?></th>
                <td style="font-size:15px; color:black;"><?= $db['detailjual_barang_id']; ?></td>
                <td style="font-size:15px;"><?= $db['barang_nama']; ?></td>
                <td style="font-size:15px;"><?= $db['detailjual_qty']; ?></td>
                <td style="font-size:15px;"><?= rupiah($db['barang_harjul']); ?></td>
                <td style="font-size:15px;"><?= rupiah($db['detailjual_subtotal']); ?></td>
              </tr>
              <?php $no++ ?>
              <?php endforeach; ?>

              <tr>
                <td style="text-align:center; font-size:18px; color:black;" colspan="6">Total : <?= rupiah($ongkir['jual_cart_total']); ?></td>
              </tr>
              <tr>
                <td style="text-align:center; font-size:18px; color:black;" colspan="6">Ongkir : <?= rupiah($ongkir['jual_biaya']); ?></td>
              </tr>
            </tbody>
          </table>
          <h5>Total Bayar : <?= rupiah($ongkir['jual_total']); ?></h5>
        </div>

        <!-- part upload bukti bayar -->

          <div class="row">
            <form action="<?= base_url('account/order/upload'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <a href="<?= base_url('assets/upload/bukti_pembayaran/'.$gambarbukti['pembayaran_bukti']) ?>" data-fancybox data-caption="Bukti Pembayaran">
                <img height="200" width="200" src="<?= base_url('assets/upload/bukti_pembayaran/'.$gambarbukti['pembayaran_bukti']) ?>">
            </a> <br>
              <label>Upload bukti bayar : </label>
              <input type="hidden" name="kdfaktur" value="<?= $ongkir['jual_nofak']; ?>">
              <input type="file" name="pembayaran_bukti" required>
            </div>

            <div class="form-group">
              <button class="btn btn--secondary btn--rounded pull-left" name="upload" type="submit" value="uploadbukti">Submit</button>
            </div>
            </form>
            <div class="form-group">

            </div>

          </div>


    </div>
    <!-- .container end -->
</section>
<!-- #shopcart end -->
