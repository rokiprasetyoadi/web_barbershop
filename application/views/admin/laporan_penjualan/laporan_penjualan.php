<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Laporan Penjualan
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
                                    <a class="btn btn-info" href="<?= site_url() ?>admin/laporan_penjualan/print">
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
                                    <th>Tanggal</th>
                                    <th>Detail</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($laporan as $data):?>
                                <tr class="">
                                    <td><?php echo $data->jual_nofak; ?></td>
                                    <td><?php echo $data->customers_nama; ?></td>
                                    <td></td>
                                    <td><?php echo $data->jual_tgl; ?></td>
                                    <td style="text-align: center;"><a class="detail" href="<?= site_url(); ?>admin/laporan_penjualan/detail/<?= $data->jual_nofak ?>"><i class="fa fa-info"></i></a></td>
                                    <td style="text-align: center;"><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/laporan_penjualan/delete/<?= $data->jual_nofak ?>')" href="#!"><i class="fa fa-trash-o"></i></a></td>
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