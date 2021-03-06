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
<!-- Shop #4
===
=== === === === === === === === === === === === === === -->
<section id="shop" class="shop shop-3 bg-white">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-3">
        <!-- Search
============================================= -->
        <div class="widget widget-search">
          <div class="widget--content">
            <form class="form-search" method="post" action="<?= base_url() ?>toko">
              <div class="input-group">
                <input type="text" class="form-control" name="cari" placeholder="Search here.." autofocus>
                <span class="input-group-btn">
                  <button class="btn" name="submit" type="submit" value="formCari"><i class="fa fa-search"></i></button>
                </span>
              </div>
              <!-- /input-group -->
            </form>
          </div>
        </div>
        <!-- .widget-search end -->

        <!-- Categories
============================================= -->
        <div class="widget widget-categories">
          <div class="widget--title">
            <h5>kategori</h5>
          </div>
          <div class="widget--content">
            <ul class="list-unstyled">
              <?php foreach ($kategori as $kat) : ?>
                <li>
                  <a href="<?= base_url('toko/category/' . $kat['kategori_id']) ?>"><?= ucwords($kat['kategori_nama']) ?></a>
                </li>
              <?php endforeach ?>
            </ul>
          </div>
        </div>
        <!-- .widget-categories end -->

        <!-- Filter
============================================= -->
        <div class="widget widget-filter">
          <div class="widget--title">
            <h5>Pricing Filter</h5>
          </div>
          <div class="widget--content">
            <div id="slider-range"></div>
            <p>
              <input type="text" id="amount" readonly>
              <a class="btn btn--secondary btn--bordered btn--rounded" href="#">Filter</a>
            </p>
          </div>
        </div>
        <!-- .widget-filter end -->
      </div>
      <!-- .col-md-3 end -->
      <div class="col-xs-12 col-sm-12 col-md-9">

        <div class="row">
          <?php foreach ($barang as $b) : ?>
            <!-- Product -->
            <div class="col-xs-12 col-sm-6 col-md-4 product-item">
              <?php echo form_open('toko/cart/add'); ?>

              <div class="product--img">
                <img src="<?= base_url('./assets/upload/barang/') . $b['barang_image'] ?>" alt="Product" />
                <div class="product--hover">
                  <div class="product--action">
                    <input type="hidden" name="barang_id" value="<?php echo $b['barang_id']; ?>" />
                    <input type="hidden" name="barang_nama" value="<?php echo $b['barang_nama']; ?>" />
                    <input type="hidden" name="barang_harjul" value="<?php echo $b['barang_harjul']; ?>" />
                    <input type="hidden" name="barang_image" value="<?php echo $b['barang_image']; ?>" />
                    <input type="hidden" name="qty" value="1" />
                    <input type="hidden" name="c_cart_id" value="<?php echo $carts['cart_id']; ?>" />
                    <?php echo form_hidden('customers_id', $customers['customers_id']); ?>
                    <?php echo form_hidden('email_tmp', $customers['customers_email']); ?>
                    <?php echo form_hidden('barang_stok', $b['barang_stok']); ?>
                    <button type="submit">Add To Cart</button>
                  </div>
                </div>
                <!-- .product-overlay end -->
              </div>
              <!-- .product-img end -->

              <div class="product--content">
                <div class="product--title">
                  <h3><a href="<?= base_url('/toko/product/' . strtolower($b['barang_nama'])) ?>"><?= $b['barang_nama'] ?></a></h3>
                </div>
                <!-- .product-title end -->
                <div class="product--price">
                  <span><?= rupiah($b['barang_harjul']) ?></span>
                </div>
                <div class="product--title">
                  <span>Stok : <?= $b['barang_stok'] ?></span>
                </div>
                <!-- .product-price end -->
              </div>


              <?php echo form_close(); ?>
            </div>
            <!-- .product-bio end -->
          <?php endforeach ?>
          <!-- .product end -->
        </div>
        <!-- .row end -->
        <div class="row">
          <!-- Tampilkan pagination-->
          <?= $this->pagination->create_links(); ?>
          <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
      </div>
      <!-- .col-md-9 end -->
    </div>
    <!-- .row end -->
  </div>
  <!-- .container end -->
</section>
<!-- #shop end -->
