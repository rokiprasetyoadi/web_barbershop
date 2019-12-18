<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Pembayaran
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
                                    <th>Bukti Pembayaran</th>
                                    <th>Status Pembayaran</th>
                                    <th>Ubah Status</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($pembayaran as $row):?>
                                <tr class="">
                                    <td><?= $i++ ?></td>
                                    <td><?php echo $row->jual_nofak ?></td>
                                    <td><?php echo $row->customers_nama ?></td>
                                    <td><a href="<?= base_url('assets/upload/bukti_pembayaran/'.$row->pembayaran_bukti) ?>" data-fancybox data-caption="Bukti Pembayaran"> <img style="height: 50px; width: 50px;" src="<?= base_url('assets/upload/bukti_pembayaran/'.$row->pembayaran_bukti) ?>"></a></td>
                                    <td><?php echo $row->jual_status ?></td>
                                    <td><a class="update" href="<?= site_url(); ?>admin/pembayaran/edit/<?php echo $row->pembayaran_id ?>">Ubah Status</a></td>
                                    <td><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/pembayaran/delete/<?= $row->pembayaran_id ?>')" href="#!">Delete</a></td>
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