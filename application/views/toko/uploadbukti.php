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
          <p>Jasa Pengiriman : <?= $ongkir['jual_kurir']; ?></p>
          <p>Service : <?= $ongkir['jual_layanan']; ?></p>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">ID Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Qty</th>
                <th scope="col">Sub Total</th>

              </tr>
            </thead>
            <tbody>
              <?php $no=1; ?>
              <?php foreach ($detil_barang as $db): ?>
              <tr>
                <th scope="row"><?= $no; ?></th>
                <td><?= $db['detailjual_barang_id']; ?></td>
                <td><?= $db['barang_nama']; ?></td>
                <td><?= $db['detailjual_qty']; ?></td>
                <td><?= rupiah($db['detailjual_subtotal']); ?></td>
              </tr>

              <?php $no++ ?>
              <?php endforeach; ?>
            </tbody>
          </table>
          <h5>Ongkir : <?= rupiah($ongkir['jual_biaya']); ?></h5>
          <h5>Total Bayar : <?= rupiah($ongkir['jual_total']); ?></h5>
        </div>

        <!-- part upload bukti bayar -->

          <div class="row">
            <form action="<?= base_url('account/order/upload'); ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label>Upload bukti bayar : </label>
              <input type="hidden" name="kdfaktur" value="<?= $ongkir['jual_nofak']; ?>">
              <input type="file" name="pembayaran_bukti" required>
            </div>
            <div class="form-group">
              <button class="btn btn--secondary btn--rounded pull-left" name="upload" type="submit" value="uploadbukti">Submit</button>
            </div>
            </form>
          </div>


    </div>
    <!-- .container end -->
</section>
<!-- #shopcart end -->
