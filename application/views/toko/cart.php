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
        <?= form_open('toko/chekout'); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="shop-cart-heading">
                    You have <span class="total-item"></span> items
                    <?= $this->session->flashdata('messcart'); ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="cart-table table-responsive">
                    <table class="table" id="keranjang">
                        <thead>
                            <tr class="cart-product">
                                <th></th>
                                <th class="cart-product-item">Name</th>
                                <th class="cart-product-price">Price</th>
                                <th class="cart-product-quantity">Quantity</th>
                                <th class="cart-product-total">Total</th>
                                <th class="cart-product-remove"></th>
                                <th></th>
                            </tr>
                        </thead>


                        <tbody>

                            <?php if (!$keranjang) {
                                echo "
                                <tr>
                                    <td></td>
                                    <td class='cart-product-item' align='center' colspan='5'>
                                        <small class='small text-muted'>Kosong</small>
                                    </td>
                                    <td></td>
                                </tr>";
                                $k = TRUE;
                            } else { ?>
                                <?php echo form_hidden('c_detail_id', $keranjang[0]['c_detail_id']); ?>
                                <?php foreach ($keranjang as $item) { ?>
                                    <?php echo form_hidden('barang_harjul', $item['barang_harjul']); ?>

                                    <?php echo form_hidden('c_cart_id', $item['c_cart_id']); ?>
                                    <tr class="cart-product">
                                        <td></td>
                                        <td class="cart-product-item">

                                            <div class="cart-product-img">
                                                <a href="#">
                                                    <img src="<?= base_url('./assets/upload/barang/') . $item['barang_image'] ?>" alt="product" />
                                                </a>
                                            </div>

                                            <div class="cart-product-name">
                                                <h6><a href="#"><?= $item['barang_nama'] ?></a></h6>
                                            </div>
                                            <?php echo form_hidden('barang_id', $item['barang_id']); ?>
                                            <div id="outstok" class="pesan-stok-<?= $item['barang_id'] ?>">
                                            </div>
                                        </td>
                                        <td class="price cart-product-price"><?= rupiah($item['barang_harjul']) ?></td>
                                        <td class="cart-product-quantity">
                                            <div class="product-quantity">
                                                <input class="qty" type="text" name="qty" value="<?= $item['qty'] ?>">
                                                <?php echo form_hidden('name', $item['qty']); ?>
                                                <?php echo form_hidden('idp', $item['barang_id']); ?>
                                            </div>
                                        </td>
                                        <td class="cart-product-total"><?= rupiah($item['c_price']) ?></td>
                                        <td>
                                            <div class="cart-product-remove">
                                                <a href="<?= base_url('toko/cart/delcart') . "/" . $item['c_detail_id'] ?>"><i class="lnr lnr-cross"></i></a>
                                            </div>
                                        </td>



                                        <td></td>
                                    </tr>
                                <?php }; ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- .cart-table end -->
            </div>
            <!-- .col-md-12 end -->
        </div>
        <!-- .row end -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="cart-product-action">
                    <?php if (!$keranjang) { ?>
                        <div class="cart-total-amount text-right col-xs-12 col-sm-12 col-md-12">
                            Subtotal : <span class="">0</span>
                        </div>
                        <!-- .cart-total-amount end -->
                    <?php } else { ?>
                        <div class="cart-total-amount text-right col-xs-12 col-sm-12 col-md-12">
                            Subtotal : <span class=""><?= rupiah($tprice); ?>
                                <input type="hidden" id="anua" value="<?= $tprice ?>"></span>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- .col-md-6 end -->
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <a class="btn btn--secondary btn--rounded pull-left" href="<?= base_url() ?>toko/cart/delcart/all" style="margin-right: 10px;">Delete Items</a>
                <button class="updatecart btn btn--secondary btn--rounded pull-left" value="refresh">Update</button>
                <button class="btn btn--secondary btn--rounded pull-right" type="submit">Checkout</button>
            </div>
        </div>
        <?=
            form_close();
        ?>
    </div>
    <!-- .container end -->
</section>
<!-- #shopcart end -->