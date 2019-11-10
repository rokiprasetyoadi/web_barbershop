
<!--main content start-->
<section id="main-content">
<section class="wrapper">

<!--mini statistics start-->
<div class="row" hidden>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="gauge-canvas">
                        <h4 class="widget-h">Monthly Expense</h4>
                        <canvas width=160 height=100 id="gauge"></canvas>
                    </div>
                    <ul class="gauge-meta clearfix">
                        <li id="gauge-textfield" class="pull-left gauge-value"></li>
                        <li class="pull-right gauge-title">Safe</li>
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <div class="daily-visit">
                        <h4 class="widget-h">Daily Visitors</h4>
                        <div id="daily-visit-chart" style="width:100%; height: 100px; display: block">

                        </div>
                        <ul class="chart-meta clearfix">
                            <li class="pull-left visit-chart-value">3233</li>
                            <li class="pull-right visit-chart-title"><i class="fa fa-arrow-up"></i> 15%</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <h4 class="widget-h">Top Advertise</h4>
                    <div class="sm-pie">
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-3">
        <section class="panel">
            <div class="panel-body">
                <div class="top-stats-panel">
                    <h4 class="widget-h">Daily Sales</h4>
                    <div class="bar-stats">
                        <ul class="progress-stat-bar clearfix">
                            <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                            <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                            <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                        </ul>
                        <ul class="bar-legend">
                            <li><span class="bar-legend-pointer pink"></span> New York</li>
                            <li><span class="bar-legend-pointer green"></span> Los Angels</li>
                            <li><span class="bar-legend-pointer yellow-b"></span> Dallas</li>
                        </ul>
                        <div class="daily-sales-info">
                            <span class="sales-count">1200 </span> <span class="sales-label">Products Sold</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!--mini statistics end-->
    <div class="row" hidden>
    <div class="col-md-8">
        <!--earning graph start-->
        <section class="panel">
            <header class="panel-heading">
                Earning Graph <span class="tools pull-right">
            <a href="javascript:;" class="fa fa-chevron-down"></a>
            <a href="javascript:;" class="fa fa-cog"></a>
            <a href="javascript:;" class="fa fa-times"></a>
            </span>
            </header>
            <div class="panel-body">

                <div id="graph-area" class="main-chart">
                </div>
                <div class="region-stats">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="region-earning-stats">
                                This year total earning <span>$68,4545,454</span>
                            </div>
                            <ul class="clearfix location-earning-stats">
                                <li class="stat-divider">
                                    <span class="first-city">$734503</span>
                                    Rocky Mt,NC </li>
                                <li class="stat-divider">
                                    <span class="second-city">$734503</span>
                                    Dallas/FW,TX </li>
                                <li>
                                    <span class="third-city">$734503</span>
                                    Millville,NJ </li>
                            </ul>
                        </div>
                        <div class="col-md-5">
                            <div id="world-map" class="vector-stat">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--earning graph end-->
    </div>
    </div>

        <?php
                if($page == 'add')
                {
                ?>
        <!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Tambah Barang
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="<?= site_url() ?>admin/barang/add">
                                    <div class="form-group ">
                                        <label for="barang_id" class="control-label col-lg-3">Id Barang</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_id" name="barang_id" type="text" value="<?= $kode; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_kategori_id" class="control-label col-lg-3">Kategori</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_kategori_id" name="barang_kategori_id" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_nama" class="control-label col-lg-3">Nama Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_nama" name="barang_nama" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul_grosir" class="control-label col-lg-3">Harga Grosir</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul_grosir" name="barang_harjul_grosir" type="number" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul" class="control-label col-lg-3">Harga Ecer</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul" name="barang_harjul" type="number" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_image" class="control-label col-lg-3">Foto</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_image" name="barang_image" type="file" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_stok" class="control-label col-lg-3">Stok</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_stok" name="barang_stok" type="number" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_min_stok" class="control-label col-lg-3">Minimal Stok Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_min_stok" name="barang_min_stok" type="number" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/barang" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->

    <?php }
                else
                {
                ?>
                <!-- Content Start -->
        <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Edit Barang
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <form class="cmxform form-horizontal " id="signupForm" method="post" action="<?php echo site_url('admin/barang/edit/'.$row->barang_id); ?>">
                                    <div class="form-group ">
                                        <label for="barang_id" class="control-label col-lg-3">Id Barang</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_id" name="barang_id" type="text" value="<?= $row->barang_id; ?>" readonly />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_kategori_id" class="control-label col-lg-3">Kategori</label>
                                        <div class="col-lg-6">
                                            <input class=" form-control" id="barang_kategori_id" name="barang_kategori_id" value="<?= $row->barang_kategori_id; ?>" type="text" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_nama" class="control-label col-lg-3">Nama Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_nama" name="barang_nama" type="text" value="<?= $row->barang_nama; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul_grosir" class="control-label col-lg-3">Harga Grosir</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul_grosir" name="barang_harjul_grosir" type="number" value="<?= $row->barang_harjul_grosir; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_harjul" class="control-label col-lg-3">Harga Ecer</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_harjul" name="barang_harjul" type="number" value="<?= $row->barang_harjul; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_image" class="control-label col-lg-3">Foto</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_image" name="barang_image" type="file" value="<?= $row->barang_image; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_stok" class="control-label col-lg-3">Stok</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_stok" name="barang_stok" type="number" value="<?= $row->barang_stok; ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="barang_min_stok" class="control-label col-lg-3">Minimal Stok Barang</label>
                                        <div class="col-lg-6">
                                            <input class="form-control " id="barang_min_stok" name="barang_min_stok" type="number" value="<?= $row->barang_min_stok; ?>" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-offset-3 col-lg-6">
                                            <button class="btn btn-primary" name="edit" type="submit">Save</button>
                                            <a href="<?= site_url() ?>admin/barang" class="btn btn-default" type="cancel">Cancel</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        <!-- Content End -->
                <?php } ?>

</div>
</section>
</section>
<!--main content end-->