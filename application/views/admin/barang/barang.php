<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Barang
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
                                    <a class="btn btn-primary" href="<?= site_url() ?>admin/barang/add">
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
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Grosir</th>
                                    <th>Harga Ecer</th>
                                    <th>Stok</th>
                                    <th>Tanggal Input</th>
                                    <th>Tanggal Update</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tbl_barang as $data):?>
                                <tr class="">
                                    <td><?php echo $data->barang_id; ?></td>
                                    <td><?php echo $data->barang_nama; ?></td>
                                    <td><?php echo $data->barang_harjul_grosir; ?></td>
                                    <td><?php echo $data->barang_harjul; ?></td>
                                    <td><?php echo $data->barang_stok; ?></td>
                                    <td><?php echo $data->barang_tgl_input; ?></td>
                                    <td><?php echo $data->barang_tgl_update; ?></td>
                                    <td><a class="edit" href="<?= site_url(); ?>admin/barang/edit/<?= $data->barang_id ?>">Edit</a></td>
                                    <td><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/barang/delete/<?= $data->barang_id ?>')" href="#!">Delete</a></td>
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