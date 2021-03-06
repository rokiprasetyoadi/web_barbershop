<!-- Content Start -->
<div class="row">
            <div class="col-sm-12">
                <section class="panel">
                    <header class="panel-heading">
                        Data Barang Masuk
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
                                    <a class="btn btn-primary" href="<?= site_url() ?>admin/barang_masuk/add">
                                        Add New &nbsp;<i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-info" href="<?= site_url() ?>admin/barang_masuk/print">
                                        Print &nbsp;<i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Nota</th>
                                    <th>Supplier</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Edit Supplier</th>
                                    <th>Barang Masuk</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($brgmasuk as $data):?>
                                <tr class="">
                                    <td><?= $data->brgmasuk_nota ?></td>
                                    <td><?= $data->supplier_nama ?></td>
                                    <td><?= $data->brgmasuk_keterangan ?></td>
                                    <td><?= $data->brgmasuk_tgl ?></td>
                                    <td style="text-align: center;"><a class="edit" href="<?= site_url(); ?>admin/barang_masuk/editsupplier/<?= $data->brgmasuk_nota ?>"><i class="fa fa-edit"></i></a></td>
                                    <td style="text-align: center;"><a class="edit" href="<?= site_url(); ?>admin/barang_masuk/edit/<?= $data->brgmasuk_nota ?>"><i class="fa fa-edit"></i></a></td>
                                    <td style="text-align: center;"><a class="delete" onclick="deleteConfirm('<?= base_url(); ?>admin/barang_masuk/delete/<?= $data->brgmasuk_nota ?>')" href="#!"><i class="fa fa-trash-o"></i></a></td>
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