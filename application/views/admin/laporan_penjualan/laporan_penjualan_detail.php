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
                                <?php foreach($detail as $row){ ?>

                                <div class="pull-right">
                                    <div class="col-md-12 col-sm-12 pull-left">
                                        <p>Phone: <?php echo $row->customers_nohp ?><br>
                                            Email : <?php echo $row->customers_email ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row invoice-to">
                            <div class="col-md-4 col-sm-4 pull-left">
                                <h4>Nota Penjualan:</h4>
                                <h2><?php echo $row->customers_nama ?></h2>
                                <p>
                                    <?php echo $row->customers_alamat ?> ,
                                    <?php echo $row->customers_kota ?><br>
                                    <?php echo $row->customers_provinsi ?><br>
                                    <?php echo $row->customers_negara ?></br>
                                    <?php echo $row->customers_kodepos ?>
                                </p>
                            </div>
                            <div class="col-md-4 col-sm-5 pull-right">
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">No Faktur #</div>
                                    <div class="col-md-8 col-sm-7"><?php echo $row->jual_nofak ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4 col-sm-5 inv-label">Tanggal #</div>
                                    <div class="col-md-8 col-sm-7"><?php echo $row->jual_tgl ?></div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 inv-label">
                                        <h3>TOTAL PEMBAYARAN</h3>
                                    </div>
                                    <div class="col-md-12">
                                        <h1 class="amnt-value">Rp. 3120.00</h1>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <table class="table table-invoice" >
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Item Description</th>
                                <th class="text-center">Unit Cost</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>
                                    <h4>Service One</h4>
                                    <p>Service Four Description Lorem ipsum dolor sit amet.</p>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-center">4</td>
                                <td class="text-center">$1300.00</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>
                                    <h4>Service Two</h4>
                                    <p>Service Four Description Lorem ipsum dolor sit amet.</p>
                                </td>
                                <td class="text-center">2</td>
                                <td class="text-center">5</td>
                                <td class="text-center">$1300.00</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>
                                    <h4>Service Three</h4>
                                    <p>Service Four Description Lorem ipsum dolor sit amet.</p>
                                </td>
                                <td class="text-center">1</td>
                                <td class="text-center">9</td>
                                <td class="text-center">$1300.00</td>
                            </tr>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-8 col-xs-7 payment-method">
                                <h4>Payment Method</h4>
                                <p>1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <p>2. Pellentesque tincidunt pulvinar magna quis rhoncus.</p>
                                <p>3. Cras rhoncus risus vitae congue commodo.</p>
                                <br>
                                <h3 class="inv-label itatic">Thank you for your business</h3>
                            </div>
                            <div class="col-md-4 col-xs-5 invoice-block pull-right">
                                <ul class="unstyled amounts">
                                    <li class="grand-total">Grand Total : $7145</li>
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
        <?php } ?>