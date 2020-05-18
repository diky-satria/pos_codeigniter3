<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '<div class="container">
	
		<div class="row">
			<div class="col-md">
				<div class="card bg-gray mb-3">
					<div class="card-body">
						<h3 class="mb-4 text-gray-800">Data Pembelian</h3>

						<div class="row">
							<div class="col-md-4">
								<table class="table">
									<tr>
										<td>Tanggal</td>
										<td>:</td>
										<td>'.$pembelian->tanggal_beli.'</td>
								</tr>
							</table>
						</div>
						<div class="col-md-4">
							<table class="table">
								<tr>
									<td>Kode &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>:</td>
									<td>'.$pembelian->kode_penjualan.'</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-md-4">
							<table class="table">
								<tr>
									<td>Kasir &nbsp;&nbsp;&nbsp;&nbsp;</td>
									<td>:</td>
									<td>'.$pembelian->kasir.'</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-md-4">
							<table class="table">
								<tr>
									<td>Pembeli</td>
									<td>:</td>
									<td>'.$pembelian->pembeli.'</td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<table border="1" cellspacing="0" cellpadding="7" style="margin-top:20px;">
								<thead>
									<tr>
										<th style="width:50px;">No</th>
										<th style="width:150px;">Kode Barcode</th>
										<th style="width:150px;">Nama Barang</th>
										<th style="width:150px;">Harga</th>
										<th>Jumlah</th>
										<th style="width:150px;">Sub-Total</th>
										
									</tr>
								</thead>
								<tbody>';

							

								$no=1;
								foreach($penjualan as $p):
								$html .='<tr>
										<td>'.$no++.'</td>
										<td>'.$p->kode_barcode.'</td>
										<td>'.$p->nama_barang.'</td>
										<td>'.number_format($p->harga_pembelian, '0','.','.').'</td>
										<td>'.$p->jumlah_pembelian.'</td>
										<td>'.number_format($p->total_pembelian, '0','.','.').'</td>
										
									</tr>';
								endforeach;
						
								$html .='
								</tbody>
							</table>
							
							<table border="0" cellspacing="0" cellpadding="5" style="margin-left:410px;">
								<thead>
									<tr>
										<td colspan="5" style="text-align:right;">Total</td>
										<td>:</td>
										<td>'.number_format($pembelian->sub_total, '0','.','.').'</td>
									<tr>
								</thead>
								<tbody>
									<tr>
										<td colspan="5" style="text-align:right;">Diskon</td>
										<td>:</td>
										<td>'.$pembelian->diskon.'</td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;">Potongan diskon</td>
										<td>:</td>
										<td>'.number_format($pembelian->potongan_diskon, '0','.','.').'</td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;"><b>Sub-Total</b></td>
										<td><b>:</b></td>
										<td><b>'.number_format($pembelian->total, '0','.','.').'</b></td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;">Bayar</td>
										<td>:</td>
										<td>'.number_format($pembelian->bayar, '0','.','.').'</td>
									</tr>
									<tr>
										<td colspan="5" style="text-align:right;">Kembali</td>
										<td>:</td>
										<td>'.number_format($pembelian->kembali, '0','.','.').'</td>
									</tr>
								</tbody>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>';

$mpdf->WriteHTML($html);
$mpdf->Output('struk.pdf', \Mpdf\Output\Destination::INLINE);