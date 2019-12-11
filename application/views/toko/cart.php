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
    <?php
    $total_items = $this->cart->total_items();
    if ($cart = $this->cart->contents()) {
        ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="shop-cart-heading">
                    You have <span class="total-item"><?php echo $total_items ?></span> items
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="cart-table table-responsive">
                    <table class="table">
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
                        <?php
                        // Create form and send all values in "shopping/update_cart" function.
                        $grand_total = 0;
                        $i = 1;

                        foreach ($cart as $item) :
                            $grand_total = $grand_total + $item['subtotal'];
                            ?>
                            <input type="hidden" name="cart[<?= $item['id']; ?>][barang_id]" value="<?= $item['id']; ?>" />
                            <input type="hidden" name="cart[<?= $item['id']; ?>][rowid]" value="<?= $item['rowid']; ?>" />
                            <input type="hidden" name="cart[<?= $item['id']; ?>][barang_nama]" value="<?= $item['name']; ?>" />
                            <input type="hidden" name="cart[<?= $item['id']; ?>][barang_harjul]" value="<?= $item['price']; ?>" />
                            <input type="hidden" name="cart[<?= $item['id']; ?>][barang_image]" value="<?= $item['gambar']; ?>" />
                            <input type="hidden" name="cart[<?= $item['id']; ?>][qty]" value="<?= $item['qty']; ?>" />
                            <tr class="cart-product">
                                <td></td>
                                <td class="cart-product-item">

                                    <div class="cart-product-img">
                                        <a href="#">
											<img src="<?= base_url('./assets/upload/barang/').$item['gambar'] ?>" alt="product"/>
										</a>
                                    </div>

                                    <div class="cart-product-name">
                                        <h6><a href="#"><?= $item['name'] ?></a></h6>
                                    </div>
                                </td>
                                <td class="cart-product-price"><?= $item['price'] ?></td>
                                <td class="cart-product-quantity">
                                    <div class="product-quantity">
                                        <input type="text" name="cart[<?php echo $item['id']; ?>][qty]" value="<?php echo $item['qty']; ?>">
                                    </div>
                                </td>
                                <td class="cart-product-total"><?php echo rupiah($item['subtotal']) ?></td>
                                <td>
                                    <div class="cart-product-remove">
                                        <a href="<?= base_url() ?>toko/cart/delete/<?= $item['rowid']; ?>"><i class="lnr lnr-cross"></i>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
							<?php endforeach; ?>
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
                    <form class="form-inline pull-left">
                        <input type="text" class="form-control mb-0" id="coupon" placeholder="Coupon Code" />
                        <button type="submit" class="btn btn--secondary">Apply</button>
                    </form>
                    <div class="cart-total-amount text-right">
                        Subtotal : <span class=""><?php echo rupiah($grand_total); ?></span>
                    </div>
                    <!-- .cart-total-amount end -->
                </div>
            </div>
            <!-- .col-md-6 end -->
        </div>
        <!-- .row end -->
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <a class="btn btn--secondary btn--rounded pull-right" href="#">Checkout</a>
            </div>
        </div>
        <?php
        } else {?>
            <h3>Your cart is empty</h3>
        <?php
        }
        ?>
    </div>
    <!-- .container end -->
</section>
<!-- #shopcart end -->