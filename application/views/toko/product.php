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

<!-- Shop Product Right Sidebar
============================================= -->
<section id="product" class="shop shop-product pb-60">
    <div class="container">
        <div class="row mb-100">
            <div class="col-xs-12 col-sm-12 col-md-6">
                <div class="product-img">
                    <img class="img-responsive" src="<?= base_url('./assets/upload/barang/') . $p['barang_image'] ?>" alt="product image">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-md-offset-1">
                <div class="product-title">
                    <h3><?= $p['barang_nama'] ?></h3>
                </div>
                <div class="product-review text-center-xs mb-40 nav-tabs">
                </div>
                <!--- .product-review end -->
                <!-- .product-title end -->
                <div class="product-meta mb-20">
                    <span class="product-available">
                        Availability: <span> <?= $p['barang_stok'] ?> in stock</span>
                    </span>
                </div>
                <div class="product-desc">
                    <p><?= $p['barang_desc'] ?> </p>
                </div>
                <div class="product-meta mb-20">
                    <span class="product-price">
                        Price: <span><?= rupiah($p['barang_harjul']) ?></span>
                    </span>
                    <!-- .product-price end -->
                    <div class="clearfix"></div>
                </div>
                <!-- .product-desc end -->
                <div class="product-action clearfix">
                    <?php echo form_open('toko/cart/add'); ?>
                    <div class="product-quantity pull-left">
                        <span>
                            <input type="hidden" name="barang_id" value="<?php echo $p['barang_id']; ?>" />
                            <input type="hidden" name="barang_nama" value="<?php echo $p['barang_nama']; ?>" />
                            <input type="hidden" name="barang_harjul" value="<?php echo $p['barang_harjul']; ?>" />
                            <input type="hidden" name="barang_image" value="<?php echo $p['barang_image']; ?>" />
                            <input type="hidden" name="c_cart_id" value="<?php echo $carts['cart_id']; ?>" />
                            <input type="text" name="qty" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))" value="1" id="pro-qunt" min="1" />
                            <!-- <input type="number"> -->
                        </span>
                    </div>
                    <div class="product-cta">
                        <button class="btn btn--secondary btn--rounded" type="submit">add to cart</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- .product-action end -->
                <div class="product-review text-center-xs nav-tabs">
                </div>
                <!-- .product-action end -->
                <div class="product-share mt-30">
                    <a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
                    <a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
                    <a class="share-google-plus" href="#"><i class="fa fa-google-plus"></i></a>
                    <a class="share-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                </div>
                <!-- .product-share end -->

            </div>
            <!-- .sidebar-full end -->
        </div>
        <!-- .row end -->

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="product-related shop-categories">
                    <div class="product-related-title">
                        <h5>New Products</h5>
                    </div>

                    <div class="row">
                        <?php foreach ($b as $bnew) { ?>

                            <!-- Product #1 -->
                            <?php echo form_open('toko/cart/add'); ?>
                            <div class="col-xs-12 col-sm-6 col-md-3 product-item">
                                <div class="product--img">
                                    <img src="<?= base_url('./assets/upload/barang/') . $bnew['barang_image'] ?>" alt="Product" />
                                    <div class="product--hover">
                                        <div class="product--action">
                                            <input type="hidden" name="barang_id" value="<?php echo $bnew['barang_id']; ?>" />
                                            <input type="hidden" name="barang_nama" value="<?php echo $bnew['barang_nama']; ?>" />
                                            <input type="hidden" name="barang_harjul" value="<?php echo $bnew['barang_harjul']; ?>" />
                                            <input type="hidden" name="barang_image" value="<?php echo $bnew['barang_image']; ?>" />
                                            <input type="hidden" name="qty" value="1" />
                                            <input type="hidden" name="c_cart_id" value="<?php echo $carts['cart_id']; ?>" />
                                            <button type="submit">Add To Cart</button>
                                        </div>
                                    </div>
                                    <!-- .product-overlay end -->
                                </div>
                                <!-- .product-img end -->
                                <div class=" product--content">
                                    <div class="product--title">
                                        <h3><a href="<?= base_url('/toko/product/' . strtolower($bnew['barang_nama'])) ?>"><?= $bnew['barang_nama'] ?></a></h3>
                                    </div>
                                    <!-- .product-title end -->
                                    <div class="product--price">
                                        <span><?= rupiah($bnew['barang_harjul']) ?></span>
                                    </div>
                                    <!-- .product-price end -->
                                </div>
                                <!-- .product-bio end -->
                            </div>
                            <!-- .product end -->
                            <?php echo form_close(); ?>

                        <?php } ?>

                    </div>
                    <!-- .row end -->
                </div>
                <!-- .product-related end  -->

            </div>
            <!-- .row col-md-12 -->
        </div>
        <!-- .row end -->

    </div>
    <!-- .container end -->
</section>
<!-- #product end -->