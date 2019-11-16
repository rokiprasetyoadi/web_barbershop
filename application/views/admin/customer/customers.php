<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Customer
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
                                    <th>Id Customers</th>
                                    <th>Nama</th>
                                    <th>E-mail</th>
                                    <th>Alamat</th>
                                    <th>No.HP</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Status</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($customers as $row):?>
                                <tr class="">
                                    <td><?= $row['customers_id'] ?></td>
                                    <td><?= $row['customers_nama'] ?></td>
                                    <td><?= $row['customers_email'] ?></td>
                                    <td><?= $row['customers_alamat'] ?></td>
                                    <td><?= $row['customers_nohp'] ?></td>
                                    <td><?= $row['customers_created'] ?></td>
                                    <td><?= $row['customers_status'] ?></td>
                                    <td><a class="delete" href="<?= base_url(); ?>admin/customers/delete/<?= $row['customers_id'] ?>">Delete</a></td>
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