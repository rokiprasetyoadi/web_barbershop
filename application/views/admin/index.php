<!--mini statistics start-->
<div class="row">
    <div class="col-md-3">
        <a href="<?= site_url() ?>admin/customers">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon orange"><i class="fa fa-users"></i></span>
            <div class="mini-stat-info">
                <span><?= $total_customers['tot_cst']; ?></span>
                Customers Aktif
            </div>
        </a>
        </div>
    </div>
    <div class="col-md-3">
        <a href="<?= site_url() ?>admin/barang">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon tar"><i class="fa fa-tag"></i></span>
            <div class="mini-stat-info">
                <span><?= $total_barang['tot_brg']; ?></span>
                Barang
            </div>
        </a>
        </div>
    </div>
    <div class="col-md-3">
        <a href="<?= site_url() ?>admin/penjualan">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon pink"><i class="fa fa-shopping-cart"></i></span>
            <div class="mini-stat-info">
                <span><?= $total_transaksi['tot_jual']; ?></span>
                Transaksi
            </div>
        </a>
        </div>
    </div>
    <div class="col-md-3">
        <a href="<?= site_url() ?>admin/pengiriman_barang">
        <div class="mini-stat clearfix">
            <span class="mini-stat-icon green"><i class="fa fa-truck"></i></span>
            <div class="mini-stat-info">
                <span><?= $total_pengiriman['tot_kirim']; ?></span>
                Pengiriman Barang
            </div>
        </a>
        </div>
    </div>
</div>
<!--mini statistics end-->