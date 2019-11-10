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
            <form class="form-search">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search here..">
                <span class="input-group-btn">
                  <button class="btn" type="button"><i class="fa fa-search"></i></button>
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
              <?php foreach ($kategori as $kat): ?>
              <li>
                  <a href="<?= base_url(); ?>toko/<?= strtolower($kat['kategori_nama']) ?>"><?= $kat['kategori_nama'] ?></a>
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
          <!-- Product #1 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/1.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Sharp Shear</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$35.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

          <!-- Product #2 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/2.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Flat Comb</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$5.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

          <!-- Product #3 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/3.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Fade Clipper</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$105.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

          <!-- Product #4 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/4.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Gel Cream</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$7.5</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

          <!-- Product #5 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/5.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Beard Razor</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$89.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

          <!-- Product #6 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/6.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Shaving Brush</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$19.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

          <!-- Product #7 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/7.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Shave Cream</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$24.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

          <!-- Product #8 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/8.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Hair Dryer</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$35.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->


          <!-- Product #9 -->
          <div class="col-xs-12 col-sm-6 col-md-4 product-item">
            <div class="product--img">
              <img src="<?= base_url() ?>assets/web_profile/images/shop/grid/9.jpg" alt="Product" />
              <div class="product--hover">
                <div class="product--action">
                  <a href="#">Add To Cart</a>
                </div>
              </div>
              <!-- .product-overlay end -->
            </div>
            <!-- .product-img end -->
            <div class="product--content">
              <div class="product--title">
                <h3><a href="#">Pre Shave</a></h3>
              </div>
              <!-- .product-title end -->
              <div class="product--price">
                <span>$30.00</span>
              </div>
              <!-- .product-price end -->
            </div>
            <!-- .product-bio end -->
          </div>
          <!-- .product end -->

        </div>
        <!-- .row end -->
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 clearfix mt-50 text--center">
            <ul class="pagination">
              <li class="active"><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li>
                <a class="pagination-next" href="#" aria-label="Next">
                  <span aria-hidden="true">next <i class="fa fa-angle-right"></i></span>
                </a>
              </li>
            </ul>
          </div>
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
