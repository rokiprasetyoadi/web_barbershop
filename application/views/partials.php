<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/hairy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Sep 2019 04:28:23 GMT -->

<head>
    <!-- Document Meta
    ============================================= -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--IE Compatibility Meta-->
    <meta name="author" content="zytheme" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description"
        content="Hairy is a pixel perfect creative barber html5 tempalte  based on designed with great attention to details, flexibility and performance. It is ultra professional, smooth and sleek, with a clean modern layout.">
    <link href="<?= base_url() ?>assets/web_profile/images/favicon/favicon.png" rel="icon">

    <!-- Fonts
    ============================================= -->
    <link href='http://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i,900%7COpen+Sans:300,300i,400,400i,600,600i,700,700i,800,800i' rel='stylesheet' type='text/css'>

    <!-- Stylesheets
    ============================================= -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css"><link href="<?= base_url() ?>assets/web_profile/css/external.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/web_profile/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url() ?>assets/web_profile/css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="assets/web_profile/js/html5shiv.js"></script>
      <script src="assets/web_profile/js/respond.min.js"></script>
    <![endif]-->

    <!-- Document Title
    ============================================= -->
    <title>Hairy | Barber Html5 Template</title>
</head>

<body>
    <div class="preloader">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper" class="wrapper clearfix">
        <header id="navbar-spy" class="header header-topbar header-transparent header-fixed">
            <div id="top-bar" class="top-bar">
                <div class="container">
                    <div class="bottom-bar-border">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6 top--contact hidden-xs">
                                <ul class="list-inline mb-0 ">
                                    <li>
                                        <i class="lnr lnr-clock"></i><span>Setiap Hari 10.00 - 22.00 wib</span>
                                    </li>
                                    <li>
                                        <i class="lnr lnr-phone-handset"></i> <span>(04) 491 570 110</span>
                                    </li>
                                </ul>
                            </div><!-- .col-md-6 end -->
                            <div class="col-xs-12 col-sm-6 col-md-6 top--info text-right text-center-xs">
                                <span class="top--login"><i class="lnr lnr-exit"></i><a href="<?= base_url() ?>login">Login</a> / <a
                                        href="<?= base_url() ?>register">Register</a></span>
                                <span class="top--social">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="gplus" href="#"><i class="fa fa-google-plus"></i></a>
                                    <a class="instagram" href="#"><i class="fa fa-instagram"></i></a>
                                </span>
                            </div><!-- .col-md-6 end -->
                        </div>
                    </div>
                </div>
            </div>
            <nav id="primary-menu" class="navbar navbar-fixed-top">
                <div class="container">
                    <div class="">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target="#navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="logo" href="index.html">
                                <img class="logo-light"
                                    src="<?= base_url() ?>assets/web_profile/images/logo/logo-light.png"
                                    alt="Hairy Logo">
                                <img class="logo-dark"
                                    src="<?= base_url() ?>assets/web_profile/images/logo/logo-light.png"
                                    alt="Hairy Logo">
                            </a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-right" id="navbar-collapse-1">
                            <ul class="nav navbar-nav nav-pos-right nav-bordered-right snavbar-left">
                                <!-- Home Menu -->
                                <li class="active">
                                    <a href="#" class="menu-item">home</a>
                                </li>
                                <!-- li end -->
                                <!-- Pages Menu -->
                                <li>
                                    <a href="#service1" class="link-hover" data-hover="pages">Layanan</a>
                                </li>
                                <!-- li end -->
                                <!-- Gallery Menu-->
                                <li>
                                    <a href="#" class="menu-item">Gallery</a>
                                </li>
                                <!-- li end -->
                                <!-- shop Menu -->
                                <li>
                                    <a href="<?= base_url('shop/ShopList') ?>" class="menu-item">Shop</a>
                                </li>
                                <!-- li end -->
                            </ul>
                            <!-- Module Cart -->
                            <div class="module module-cart pull-left">
                                <div class="module-icon cart-icon">
                                    <i class="lnr lnr-store"></i>
                                    <span class="title">shop cart</span>
                                    <label class="module-label">2</label>
                                </div>
                                <div class="module-content module-box cart-box">
                                    <div class="cart-overview">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="#">
                                                    <img class="img-responsive"
                                                        src="<?= base_url() ?>assets/web_profile/images/shop/thumb/1.jpg"
                                                        alt="product" />
                                                </a>
                                                <div class="product-meta">
                                                    <h5 class="product-title"><a href="#">Gel Cream</a></h5>
                                                    <p class="product-price">1 × $7.50</p>
                                                </div>
                                                <a class="cart-cancel" href="#">cancel</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="img-responsive"
                                                        src="<?= base_url() ?>assets/web_profile/images/shop/thumb/2.jpg"
                                                        alt="product" />
                                                </a>
                                                <div class="product-meta">
                                                    <h5 class="product-title"><a href="#">Hair Dryer</a></h5>
                                                    <p class="product-price">2 × $35.00</p>
                                                </div>
                                                <a class="cart-cancel" href="#">cancel</a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <img class="img-responsive"
                                                        src="<?= base_url() ?>assets/web_profile/images/shop/thumb/3.jpg"
                                                        alt="product" />
                                                </a>
                                                <div class="product-meta">
                                                    <h5 class="product-title"><a href="#">Beard Razor</a></h5>
                                                    <p class="product-price">1 × $39.00</p>
                                                </div>
                                                <a class="cart-cancel" href="#">cancel</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="cart-total">
                                        <div class="total-desc">
                                            Subtotal:
                                        </div>
                                        <div class="total-price">
                                            $100.50
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                    <div class="cart--control">
                                        <a class="btn btn--primary btn--bordered btn--rounded btn--block" href="#">View
                                            Cart & Checkout</a>
                                    </div>
                                </div>
                            </div>
                            <!-- .module-cart end -->
                            <!-- Module Search -->
                            <div class="module module-search pull-left">
                                <div class="module-icon search-icon">
                                    <i class="lnr lnr-magnifier"></i>
                                    <span class="title">search</span>
                                </div>
                                <div class="module-content module-fullscreen module--search-box">
                                    <div class="pos-vertical-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-8 col-md-offset-2">
                                                    <form class="form-search">
                                                        <input type="text" class="form-control" placeholder="Search..">
                                                        <button class="btn" type="button"><i
                                                                class="lnr lnr-magnifier"></i></button>
                                                    </form>
                                                    <!-- .form-search end -->
                                                </div>
                                                <!-- .col-md-8 end -->
                                            </div>
                                            <!-- .row end -->
                                        </div>
                                        <!-- .container end -->
                                    </div>
                                    <a class="module-cancel" href="#"><i class="lnr lnr-cross"></i></a>
                                </div>
                            </div>
                            <!-- .module-search end -->
                            <!-- Module Cart -->
                            <div class="module module-cart pull-left hidden">
                                <div class="module-icon">
                                    <a class="btn btn--white btn--bordered btn--rounded" href="#">Book Online</a>
                                </div>
                            </div>
                            <!-- .module-cart end -->
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                </div>
                <!-- /.container-fluid -->
            </nav>

        </header>

        <?= $contents ?>

        <!-- Footer #5
============================================= -->
        <footer id="footer" class="footer">
            <!-- Widget Section
	============================================= -->
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-about">
                            <div class="footer--widget-content">
                                <img class="mb-20" src="<?= base_url() ?>assets/web_profile/images/logo/logo-light.png"
                                    alt="logo">
                                <p>Barbershop kami buka setiap hari</p>
                                <div class="work--schedule clearfix">
                                    <ul class="list-unstyled">
                                        <li>Senin - Minggu <span>10.00 - 22.00 WIB</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                        <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-contact">
                            <div class="footer--widget-title">
                                <h5>Alamat</h5>
                            </div>
                            <div class="footer--widget-content">
                                <ul class="list-unstyled mb-0">
                                    <li><i class="fa fa-map-marker"></i> Jalan.</li>
                                    <li><i class="fa fa-phone"></i> 0000000 </li>
                                    <li><i class="fa fa-envelope-o"></i> email@email.com</li>
                                </ul>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                        <div class="col-xs-12 col-sm-6 col-md-4 footer--widget-contact">
                            <div class="footer--widget-title">
                                <h5>Subscribe</h5>
                            </div>
                            <div class="footer--widget-content">
                                <form class="form--newsletter">
                                    <input type="email" name="email" class="form-control" placeholder="Email address">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <!-- .col-md-4 end -->

                    </div>
                    <!-- row end -->
                </div>
                <!-- .container end -->
            </div>
            <!-- .footer-widget end -->
            <!-- Copyrights
	============================================= -->
            <div class="footer--copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <span>&copy; 2017, All rights reserved.</span>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                            <div class="social">
                                <a class="share-twitter" href="#"><i class="fa fa-twitter"></i></a>
                                <a class="share-facebook" href="#"><i class="fa fa-facebook"></i></a>
                                <a class="share-linkedin" href="#"><i class="fa fa-linkedin"></i></a>
                                <a class="share-pinterest" href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .container end -->
            </div>
        </footer>
    </div>
    <!-- #wrapper end -->
    <!-- Footer Scripts
============================================= -->
    <script src="<?= base_url() ?>assets/web_profile/js/jquery-2.2.4.min.js"></script>
    <script src="<?= base_url() ?>assets/web_profile/js/plugins.js"></script>
    <script src="<?= base_url() ?>assets/web_profile/js/functions.js"></script>


    <script type="text/javascript"> window.$crisp=[];window.CRISP_WEBSITE_ID="eb520ee9-b0f5-4ddf-be58-578ef5d25fff";(function(){ d=document;s=d.createElement("script"); s.src="https://client.crisp.chat/l.js"; s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})(); </script>
</body>


<!-- Mirrored from demo.zytheme.com/hairy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 20 Sep 2019 04:34:57 GMT -->

</html>
