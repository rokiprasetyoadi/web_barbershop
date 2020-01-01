<!-- page start-->
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <header class="panel-heading">
                        Detail Barang Masuk
                        <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <div class="btn-group pull-right">
                                    <a class="btn btn-info" href="<?= site_url() ?>admin/barang_masuk/printdtl/<?= $dtl['brgmasuk_nota'] ?>">
                                        Print &nbsp;<i class="fa fa-print"></i>
                                    </a>
                                </div>
                        <div class="adv-table editable-table ">
                            <div>
                                <label>Supplier :</label>
                                <table class="table  table-hover general-table" style="width: 50%;">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><?= $dtl['supplier_nama']; ?></td>
                            </tr>
                            <tr>
                                <td>E-Mail</td>
                                <td>:</td>
                                <td><?= $dtl['supplier_email']; ?></td>
                            </tr>
                            <tr>
                                <td>No Hp</td>
                                <td>:</td>
                                <td><?= $dtl['supplier_nohp']; ?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td><?= $dtl['supplier_alamat']; ?></td>
                            </tr>
                            <tr>
                                <td>Keterangan </td>
                                <td>:</td>
                                <td><?= $dtl['supplier_keterangan']; ?></td>
                            </tr>
                        </table>
                            </div>
                            <div class="clearfix">
                                <div style="margin-top: 15px;"></div>
                            </div>
                            <div class="space15"></div>
                            <label>Barang Masuk :</label>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Id Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Pokok</th>
                                    <th>Stok</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($detail as $data):?>
                                <tr class="">
                                    <td><?= $data->detailmasuk_barang_id ?></td>
                                    <td><?= $data->barang_nama ?></td>
                                    <td><?= $data->detailmasuk_harpok ?></td>
                                    <td><?= $data->detailmasuk_stok ?></td>
                                    <td><?= $data->detailmasuk_jumlah ?></td>
                                    <td><?= $data->detailmasuk_subtotal ?></td>
                                </tr>
                                <?php endforeach; ?>
        
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- page end-->