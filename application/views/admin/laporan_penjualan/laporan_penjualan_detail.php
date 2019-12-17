<div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body invoice">
                        <div class="invoice-header">
                            <div class="invoice-title col-md-6 col-xs-12">
                                <h1>Nota Sevenhead</h1>
                                <img class="logo-print" src="images/bucket-logo.png" alt="">
                            </div>
                            <div class="invoice-info col-md-6 col-xs-12">
                            </div>
                        </div>
                        <div class="row invoice-to">
                            <div class="col-md-4 col-sm-5 pull-left">
                                <h4><b>Nota Penjualan:</b></h4>

                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Pembeli #</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['customers_nama']; ?></div></br>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-8 col-sm-5 inv-label">Alamat Pengiriman Barang #</div>
                                    <div class="col-md-8 col-sm-7">
                                    <table>
                                        <tr>
                                            <th>Penerima</th>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><?= $dtl['jual_penerima']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><?= $dtl['jual_tlp']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><?= $dtl['jual_alamat']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Kode Pos</th>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><?= $dtl['jual_kodepos']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-8 col-sm-5 inv-label">Pengiriman #</div>
                                    <div class="col-md-8 col-sm-7">
                                    <table>
                                        <tr>
                                            <th>Kurir</th>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><?= $dtl['jual_kurir']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Layanan</th>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td><?= $dtl['jual_layanan']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Biaya Kirim</th>
                                            <td>&nbsp;</td>
                                            <td>:</td>
                                            <td>&nbsp;</td>
                                            <td>Rp. <?php echo number_format($dtl['jual_biaya']); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                </div>
                                <br>
                            </div>
                            <div class="col-md-4 col-sm-5 pull-right">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">No Faktur #</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['jual_nofak']; ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Tanggal #</div>
                                    <div class="col-md-8 col-sm-7"><?= $dtl['jual_tgl']; ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Status Pembayaran #</div>
                                    <div style="color: red;" class="col-md-8 col-sm-7"><?= $dtl['jual_status']; ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 inv-label">
                                        <h3>TOTAL PEMBAYARAN</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <h1 class="amnt-value">Rp.<?php echo number_format($dtl['jual_total']); ?></h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table class="table table-invoice" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Barang</th>
                                <th class="text-center">Harga</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $i=1;
                                foreach($detail as $data):?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td>
                                    <h4><?php echo $data->barang_nama ?></h4>
                                </td>
                                <td class="text-center">Rp. <?php echo number_format($data->barang_harjul) ?></td>
                                <td class="text-center"><?php echo $data->detailjual_qty ?></td>
                                <td class="text-center">Rp. <?php echo number_format($data->detailjual_subtotal) ?></td>
                            </tr>
                            <?php endforeach; ?>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8 col-xs-7 payment-method">
                                <h4>Metode Pembayaran</h4>
                                <p>1. Pembeli melakukan pembayaran melalui bank</p>
                                <p>2. Pembeli melakukan upload bukti pembayaran</p>
                                <p>3. Pemilik toko melakukan verifikasi pembayaran</p>
                                <p>4. Barang akan dikirim</p>
                                <br>
                                <h3 class="inv-label itatic">Selamat Berbelanja & Terima Kasih</h3>
                            </div>
                            <div class="col-md-4 col-xs-5 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                    <li><b>Sub Total : Rp <?php echo number_format($dtl['jual_cart_total']); ?></li>
                                    <li><b>Biaya Kirim : Rp <?php echo number_format($dtl['jual_biaya']); ?></b></li>
                                    <li class="grand-total">Grand Total : Rp <?php echo number_format($dtl['jual_total']); ?></li>
                                </ul>
                            </div>
                        </div>

                        <div class="text-center invoice-btn">
                            <a class="btn btn-success btn-lg"><i class="fa fa-check"></i> Submit Invoice </a>
                            <a href="#" target="_blank" class="btn btn-primary btn-lg"><i class="fa fa-print"></i> Print </a>
                        </div>

                    </div>
                </section>
            </div>
        </div>