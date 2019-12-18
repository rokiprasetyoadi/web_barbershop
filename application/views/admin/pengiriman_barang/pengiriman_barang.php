<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Pengiriman Barang
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group pull-right">
                                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="#">Print</a></li>
                                        <li><a href="#">Save as PDF</a></li>
                                        <li><a href="#">Export to Excel</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Faktur</th>
                                    <th>Customer</th>
                                    <th>Status Pembayaran</th>
                                    <th>Kurir</th>
                                    <th>Layanan</th>
                                    <th>Biaya Kirim</th>
                                    <th>Resi</th>
                                    <th>Edit Pengiriman</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($pengiriman as $row):?>
                                <tr class="">
                                    <td><?= $i++ ?></td>
                                    <td><?php echo $row->jual_nofak ?></td>
                                    <td><?php echo $row->customers_nama ?></td>
                                    <td><?php echo $row->jual_status; ?></td>
                                    <td><?php echo $row->jual_kurir; ?></td>
                                    <td><?php echo $row->jual_layanan; ?></td>
                                    <td>Rp. <?php echo number_format($row->jual_biaya); ?></td>
                                    <td><?php echo $row->jual_resi; ?></td>
                                    <td><a class="edit" href="<?= site_url(); ?>admin/pengiriman_barang/edit/<?= $row->pembayaran_id ?>">Edit</a></td>
                                    <td><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/pengiriman_barang/delete/<?= $row->pembayaran_id ?>')" href="#!">Delete</a></td>
                                </tr>
                                <?php endforeach; ?>
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>

<!-- Content End -->