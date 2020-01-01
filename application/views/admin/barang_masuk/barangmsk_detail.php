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
                            <div class="col-md-5 col-sm-5 pull-left">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Nota</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['brgmasuk_nota'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['supplier_nama'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier Email</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['supplier_email'] ?></div>
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-5 pull-right">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier No Hp</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['supplier_nohp'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Supplier Alamat</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['supplier_alamat'] ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label"># Keterangan</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['supplier_keterangan'] ?></div>
                                </div>
                                <br>
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