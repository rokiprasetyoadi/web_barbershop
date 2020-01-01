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
                                        Add New &nbsp;<i class="fa fa-plus"></i>
                                    </a>
                                </div>
                                <?= $this->session->flashdata('pesan'); ?>
                                <div class="btn-group pull-right">
                                    <a class="btn btn-danger" data-toggle="modal" data-target="#modalKeteranganStok">Cek Stok &nbsp;<i class="fa fa-tag"></i>
                                    </a>
                                    <a class="btn btn-info" href="<?= site_url() ?>admin/barang/print">
                                        Print &nbsp;<i class="fa fa-print"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Id Barang</th>
                                    <!--<th>Gambar</th>-->
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
                                    <!--<td><a href="<?= base_url('assets/upload/barang/'.$data->barang_image) ?>" data-fancybox data-caption="Barang"> <img style="height: 50px; width: 50px;" src="<?= base_url('assets/upload/barang/'.$data->barang_image) ?>"></a></td>-->
                                    <td><?php echo $data->barang_nama; ?></td>
                                    <td><?php echo $data->barang_harjul_grosir; ?></td>
                                    <td><?php echo $data->barang_harjul; ?></td>
                                    <td><?php echo $data->barang_stok; ?></td>
                                    <td><?php echo $data->barang_tgl_input; ?></td>
                                    <td><?php echo $data->barang_tgl_update; ?></td>
                                    <td style="text-align: center;"><a class="edit" href="<?= site_url(); ?>admin/barang/edit/<?= $data->barang_id ?>"><i class="fa fa-edit"></i></a></td>
                                    <td style="text-align: center;"><a class="delete" onclick="deleteConfirm('<?= site_url(); ?>admin/barang/delete/<?= $data->barang_id ?>')" href="#!"><i class="fa fa-trash-o"></i></a></td>
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
    <div class="modal fade bd-example-modal-xl" id="modalKeteranganStok" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"><b> Cek Stok &nbsp;<i class="fa fa-tag"></i></b></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                <thead>
                    <tr>
                        <th>Id Barang</th>
                        <th>Gambar</th>
                        <th>Nama Barang</th>
                        <th>Harga Grosir</th>
                        <th>Harga Ecer</th>
                        <th>Stok</th>
                        <th>Minimal Stok</th>
                        <th>Tanggal Input</th>
                        <th>Tanggal Update</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($stok_brg as $row):?>
                    <tr class="">
                        <td><?php echo $row->barang_id; ?></td>
                        <td><a href="<?= base_url('assets/upload/barang/'.$row->barang_image) ?>" data-fancybox data-caption="Barang"> <img style="height: 50px; width: 50px;" src="<?= base_url('assets/upload/barang/'.$row->barang_image) ?>"></a></td>
                        <td><?php echo $row->barang_nama; ?></td>
                        <td><?php echo $row->barang_harjul_grosir; ?></td>
                        <td><?php echo $row->barang_harjul; ?></td>
                        <td style="color: red;"><?php echo $row->barang_stok; ?></td>
                        <td><?php echo $row->barang_min_stok; ?></td>
                        <td><?php echo $row->barang_tgl_input; ?></td>
                        <td><?php echo $row->barang_tgl_update; ?></td>
                    </tr>
                <?php endforeach; ?>
            
                </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>