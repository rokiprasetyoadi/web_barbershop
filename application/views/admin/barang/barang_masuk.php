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
                                    <th>Nota</th>
                                    <th>Supplier Id</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Detail</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tbl_brgmsk as $data):?>
                                <tr class="">
                                    <td><?= $data['brgmasuk_nota'] ?></td>
                                    <td><?= $data['brgmasuk_supplier_id'] ?></td>
                                    <td><?= $data['brgmasuk_keterangan'] ?></td>
                                    <td><?= $data['brgmasuk_tgl'] ?></td>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalDetailBarang<?= $data['brgmasuk_nota']; ?>">Detail</button></td>
                                    <td><a class="edit" href="<?= site_url(); ?>admin/barang_masuk/edit/<?= $data['brgmasuk_nota'] ?>">Edit</a></td>
                                    <td><a class="delete" onclick="deleteConfirm('<?= base_url(); ?>admin/barang_masuk/delete/<?= $data['brgmasuk_nota'] ?>')" href="#!">Delete</a></td>
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

<!-- Modal -->
    <?php foreach($tbl_brgmsk as $data): ?>
    <div class="modal fade" id="modalDetailBarang<?= $data['brgmasuk_nota']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"><b> Detail Barang Masuk <?= $data['brgmasuk_nota'] ?> </b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
            <tr>
                <th>Id Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
            <tr>
                <?php foreach($tbl_brgmasuk as $data): ?>
                <td><?= $data['detailmasuk_barang_id'] ?></td>
                <td><?= $data['detailmasuk_harpok'] ?></td>
                <td><?= $data['detailmasuk_stok'] ?></td>
                <td><?= $data['detailmasuk_jumlah'] ?></td>
                <td><?= $data['detailmasuk_subtotal'] ?></td>
            </tr>
            <?php endforeach; ?>
            </table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>