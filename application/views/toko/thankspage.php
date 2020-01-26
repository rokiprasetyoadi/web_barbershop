<!doctype html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="pqxGO0pSTrA6qFvPLvQN2ulUaJq5Hp6ZIX4dkGux">
        <meta name="google-signin-client_id" content="704146349293-dakhlg982po8sfk1aitrgjp26131goc9.apps.googleusercontent.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito:100,300,600,800,900" rel="stylesheet" type="text/css">
	    <link rel="canonical" href="http://schema.org/ClothingStore" />
        <meta name="robots" content="all" />
        <link href="<?= base_url(''); ?>/assets/thanks/41f28ba254f4e963460ce58eb490090a.css" type="text/css" rel="stylesheet" />
        	<title>Thankspage | SEVENHEAD</title>
    </head>
    <body>


        <div id="content">
            <div id="thankspage">
	<div class="container">
		<div class="row">
		<div class="col-12">
			<div class="heading text-center">
			<div class="wrapper-icon m-auto">
				<a href="<?= base_url(''); ?>">
					<img class="progressive-image" width="280px" height="75px" src="<?= base_url('assets/web_profile/images/logo/thankspage-logo.png'); ?>" alt=" Logo Sevenhead">
				</a>
			</div>
			<h1 class="text-info mt-2 text-uppercase h2">Terimakasih</h1>
			<h3 class="mb-0"> <?= $customers['customers_nama']; ?></h3>
			<p class="mb-0"><?= $ongkir['jual_alamat']; ?></p>
      <br>
						<a data-toggle="collapse" href="#detail-pesanan" role="button" aria-expanded="false" aria-controls="detail-pesanan" class="text-uppercase txtdetail collapsed">Detail Pesanan</a>
			<div class=" mt-4 collapse " id="detail-pesanan">
				<div class="">
					<table class="table table-hover table-detail bg-muda">
						<tbody>
							<tr>
								<td><b>ITEM</b></td>
								<td><b>QTY</b></td>
								<td colspan="5"><b>HARGA</b></td>
							</tr>
              <?php foreach ($detil_barang as $db): ?>
								<tr>
									<td class="text-left">
										<h2 class="h5 mb-0"><?= $db['barang_nama']; ?></h2>
									</td>
									<td>
										<p class="m-0">
											<?= $db['detailjual_qty']; ?><br>
										</p>
									</td>
									<td align="right" colspan="5">
										<p class="m-0" style="color:red ; font-weight:bold;"><?= rupiah($db['barang_harjul']); ?></p>
									</td>
								</tr>
              <?php endforeach; ?>
						<tr>
							<td class="set-td text-left" colspan="5">
							<p class="m-0">Jumlah </p>
							</td>
							<td class="set-td  text-right">&nbsp; : </td>
							<td class="text-right set-td ">
							<p class="m-0"> <?= rupiah($ongkir['jual_cart_total']); ?></p>
							</td>
						</tr>
						<tr>
							<td class=" set-td b-none text-left" colspan="5">
							<p class="m-0">Diskon </p>
							</td>
							<td class="set-td  b-none text-right">&nbsp; : </td>
							<td class=" set-td  b-none text-right" >
							<p class="m-0"> <?= rupiah("0"); ?></p>
							</td>
						</tr>
						<tr>
							<td class="set-td text-left b-none" colspan="5">
							<p class="m-0">Ongkir </p>
							</td>
							<td class="set-td b-none text-right">&nbsp; : </td>
							<td class="set-td b-none text-right" >
							<p class="m-0"><?= rupiah($ongkir['jual_biaya']); ?></p>
							</td>
						</tr>
						<tr>
							<td class=" text-left b-none" colspan="5">
							<p class="font-weight-semi-bold text-uppercase h5 m-0">Total </p>
							</td>
							<td class=" b-none text-right">&nbsp; : </td>
							<td class=" b-none text-right">
							<p class="font-weight-semi-bold h5 m-0" align="right"> <?= rupiah($ongkir['jual_total']); ?></p>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
			</div>
			<div class="body-thx">
			<div class="my-3">
				<div class="row">
				<div class="col-lg-6 py-1">
					<div class="bg-muda">
					<h2 class="mb-0 p-2 text-center font-weight-semi-bold text-uppercase h4">NO FAKTUR : <?= $ongkir['jual_nofak']; ?></h2>
					</div>
				</div>
				<div class="col-lg-6 py-1">
					<div class="bg-muda">
					<h2 class="h4 mb-0 p-2 text-center font-weight-semi-bold text-uppercase">TOTAL : <?= rupiah($ongkir['jual_total']); ?></h2>
					</div>
				</div>
				</div>
				<div class="row">
				<div class="col-lg-12">
					<p class="bg-info text-white text-center p-1 mb-1 mt-3">Segera lakukan pembayaran Anda
					sebelum tanggal : <span class="font-weight-semi-bold"> 24 January 2020</span> jam <span class="font-weight-semi-bold"> 23:14</span></p>
				</div>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12">
			<div class="row list-bank" style="width: 100%;">
			<div class="col">
				<div class="wrapper-bank" align="center">
				<div class="wrapper-image bank-logo">
					<img src="https://s3-ap-southeast-1.amazonaws.com/iwzl/iwzl-new/bank/051017100552_Untitled-2.png"
					alt="BCA">
				</div>
				<p class="mb-0 font-weight-semi-bold ">SEVENHEAD</p>
				<input style="width:100%;border:none" class="text-center mb-0 h5 text-7750773464" value="7750773464"
					readonly="">
				<button type="button" class="btn btn-sm py-1 btn-default" onclick="toClip('.text-7750773464','')">Salin/Copy</button>
				</div>
			</div>
			<div class="col">
				<div class="wrapper-bank" align="center">
				<div class="wrapper-image bank-logo">
					<img src="https://s3-ap-southeast-1.amazonaws.com/iwzl/iwzl-new/bank/051017100623_Untitled-4.png"
					alt="Bank Mandiri">
				</div>
				<p class="mb-0 font-weight-semi-bold ">SEVENHEAD</p>
				<input style="width:100%;border:none" class="text-center mb-0 h5 text-1300005800936" value="1300005800936"
					readonly="">
				<button type="button" class="btn btn-sm py-1 btn-default" onclick="toClip('.text-1300005800936','')">Salin/Copy</button>
				</div>
			</div>

			<div class="col">
				<div class="wrapper-bank" align="center">
				<div class="wrapper-image bank-logo">
					<img src="https://s3-ap-southeast-1.amazonaws.com/iwzl/iwzl-new/bank/051017100606_Untitled-3.png"
					alt="BNI">
				</div>
				<p class="mb-0 font-weight-semi-bold ">SEVENHEAD</p>
				<input style="width:100%;border:none" class="text-center mb-0 h5 text-435329496" value="435329496"
					readonly="">
				<button type="button" class="btn btn-sm py-1 btn-default" onclick="toClip('.text-435329496','')">Salin/Copy</button>
				</div>
			</div>
			<div class="col">
				<div class="wrapper-bank" align="center">
				<div class="wrapper-image bank-logo">
					<img src="https://s3-ap-southeast-1.amazonaws.com/iwzl/iwzl-new/bank/051017100524_Untitled-1.png"
					alt="BRI">
				</div>
				<p class="mb-0 font-weight-semi-bold ">SEVENHEAD</p>
				<input style="width:100%;border:none" class="text-center mb-0 h5 text-076201016658530" value="076201016658530"
					readonly="">
				<button type="button" class="btn btn-sm py-1 btn-default" onclick="toClip('.text-076201016658530','')">Salin/Copy</button>
				</div>
			</div>
			</div>
		</div>
		<div class="col-12">
			<div class="text-center mt-3">
				<p>Harap transfer sesuai dengan nominal <b>"TOTAL" </b> ke salah satu bank diatas!</p>
				<p class="mb-0">Setelah transfer , Segera <b>Konfirmasi Pembayaran. </b> Perbedaan nilai transfer akan
					menghambat proses verifikasi!</p>
				<div class="col-12">
					<a class="btn btn-lg btn-info btn-konfirmasi mb-3" href="<?= base_url('account/order/bayar/'.$ongkir['jual_nofak']); ?>">Konfirmasi Pembayaran</a>
        </div>
        <br/>
				<p class="text-danger">Pemesanan dianggap batal jika tidak melakukan pembayaran selama 10 jam</p>
				<p hidden class="font-weight-semi-bold">Jika invoice tidak masuk ke email kotak masuk utama, periksa ke kotak masuk Spam atau Update</p>
				<a class="text-dark" href="<?= base_url(''); ?>"><< Kembali ke Home</a>
			</div>
		</div>
	</div>
</div>
        </div>


        <script src="<?= base_url(''); ?>/assets/thanks/e9a855169b08f75d5f2a6f3166db22e5.js" type="text/javascript"></script>

        <script src="https://apis.google.com/js/platform.js?onload=init" async defer></script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-105356626-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-105356626-3');
        </script>

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '273047753553816');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=273047753553816&ev=PageView&noscript=1"/>
        </noscript>
        <!-- End Facebook Pixel Code -->

        <script>
	function toClip(el, text) {
		var copyText = $(el);
		copyText.select();
		document.execCommand("copy");
		if (text != '') {
			alert(text);
		}
	}
  	fbq('track', 'Purchase');
</script>
    </body>
</html>
