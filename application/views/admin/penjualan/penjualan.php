<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Penjualan
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
                                    <th>No Faktur</th>
                                    <th>Tanggal</th>
                                    <th>Admin</th>
                                    <th>Customer</th>
                                    <th>Pembayaran</th>
                                    <th>Detail</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($penjualan as $data):?>
                                <tr class="">
                                    <td><?php echo $data->jual_nofak; ?></td>
                                    <td><?php echo $data->jual_tgl; ?></td>
                                    <td><?php echo $data->admin_nama; ?></td>
                                    <td><?php echo $data->customers_nama; ?></td>
                                    <td><?php echo $data->jual_pembayaran_id; ?></td>
                                    <td><a class="detail" href="<?= site_url(); ?>admin/penjualan/detail/<?= $data->jual_nofak ?>">Detail</a></td>
                                    <td><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/penjualan/delete/<?= $data->jual_nofak ?>')" href="#!">Delete</a></td>
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