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
                                        Add New <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
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
                                    <th>Id Supplier</th>
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
                                    <?php foreach($supplier as $row):?>
                                <tr class="">
                                    <td><?php echo $row->supplier_id ?></td>
                                    <td><?php echo $row->supplier_nama ?></td>
                                    <td><?php echo $row->supplier_email ?></td>
                                    <td><?php echo $row->supplier_nohp ?></td>
                                    <td><?php echo $row->supplier_alamat ?></td>
                                    <td><?php echo $row->supplier_keterangan ?></td>
                                    <td><a class="edit" href="<?= site_url(); ?>admin/supplier/edit/<?= $row->supplier_id ?>">Edit</a></td>
                                    <td><a class="delete" href="<?= site_url(); ?>admin/supplier/delete/<?= $row->supplier_id ?>">Delete</a></td>
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