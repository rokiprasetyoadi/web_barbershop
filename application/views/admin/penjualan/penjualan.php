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
                                    <a class="btn btn-info" href="<?= site_url() ?>admin/penjualan/print">
                                        Print &nbsp;<i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>No Faktur</th>
                                    <th>Customer</th>
                                    <th>Total Pembelian</th>
                                    <th>Status Pembayaran</th>
                                    <th>Tanggal</th>
                                    <th>Detail Pembelian</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($penjualan as $data):?>
                                <tr class="">
                                    <td><?php echo $data->jual_nofak; ?></td>  
                                    <td><?php echo $data->customers_nama; ?></td>
                                    <td>Rp.<?php echo number_format($data->jual_total); ?></td>
                                    <td><?php echo $data->jual_status; ?></td>
                                    <td><?php echo $data->jual_tgl; ?></td>
                                    <td style="text-align: center;"><a class="detail" href="<?= site_url(); ?>admin/penjualan/detail/<?= $data->jual_nofak ?>"><i class="fa fa-info"></i></a></td>
                                    <td style="text-align: center;"><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/penjualan/delete/<?= $data->jual_nofak ?>')" href="#!"><i class="fa fa-trash-o"></i></a></td>
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