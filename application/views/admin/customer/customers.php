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
                                    <a class="btn btn-info" href="<?= site_url() ?>admin/customers/print">
                                        Print &nbsp;<i class="fa fa-print"></i>
                                    </a>
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
                                    <?php 
                                    $i=1;
                                    foreach($customers as $row):?>
                                <tr class="">
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['customers_nama'] ?></td>
                                    <td><?= $row['customers_email'] ?></td>
                                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalKeteranganAlamat<?= $row['customers_id']; ?>">Detail</button></td>
                                    <td><?= $row['customers_nohp'] ?></td>
                                    <td><?= $row['customers_created'] ?></td>
                                    <td><?php if ($row['customers_status'] == 1) {
                                                            echo 'Aktif';
                                                        } else {
                                                            echo 'Tidak Aktif';
                                                        }
                                                        ?></td>
                                    <td style="text-align: center;"><a class="delete" onclick="deleteConfirm('<?= base_url(); ?>admin/customers/delete/<?= $row['customers_id'] ?>')" href="#!"><i class="fa fa-trash-o"></i></a></td>
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
<?php foreach($customers as $i):?>
<div class="modal fade" id="modalKeteranganAlamat<?= $i['customers_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"><b> Alamat <?= $i['customers_nama'] ?> </b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <table class="table table-bordered">
            <tr>
                <td>Alamat</td>
                <td><?= $i['customers_alamat'] ?></td>
            </tr>
            <tr>
                <td>Kota</td>
                <td><?= $i['customers_kota'] ?></td>
            </tr>
            <tr>
                <td>Provinsi</td>
                <td><?= $i['customers_provinsi'] ?></td>
            </tr>
            <tr>
                <td>Negara</td>
                <td><?= $i['customers_negara'] ?></td>
            </tr>
            <tr>
                <td>Kode Pos</td>
                <td><?= $i['customers_kodepos'] ?></td>
            </tr>
        </table>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
