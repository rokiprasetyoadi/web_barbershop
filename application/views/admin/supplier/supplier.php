<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Supplier
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="adv-table editable-table ">
                            <div class="clearfix">
                                <div class="btn-group">
                                    <a class="btn btn-primary" href="<?= site_url() ?>admin/supplier/add">
                                        Add New &nbsp;<i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-info" href="<?= site_url() ?>admin/supplier/print">
                                        Print &nbsp;<i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>E-mail</th>
                                    <th>No.HP</th>
                                    <th>Alamat</th>
                                    <th>Keterangan</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($supplier as $row):?>
                                <tr class="">
                                    <td><?= $i++ ?></td>
                                    <td><?php echo $row->supplier_nama ?></td>
                                    <td><?php echo $row->supplier_email ?></td>
                                    <td><?php echo $row->supplier_nohp ?></td>
                                    <td><?php echo $row->supplier_alamat ?></td>
                                    <td><?php echo $row->supplier_keterangan ?></td>
                                    <td style="text-align: center;"><a class="edit" href="<?= site_url(); ?>admin/supplier/edit/<?= $row->supplier_id ?>"><i class="fa fa-edit"></i></a></td>
                                    <td style="text-align: center;"><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/supplier/delete/<?= $row->supplier_id ?>')" href="#!" ><i class="fa fa-trash-o"></i></a></td>
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