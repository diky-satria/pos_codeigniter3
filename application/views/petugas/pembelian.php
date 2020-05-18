<div class="row mt-4 mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-4 text-gray-800">Bukti Pembelian</h4>
					<div class="row">
						<div class="col-md-4">
							<table class="table table-sm">
								<tr>
									<td>Tanggal</td>
									<td>:</td>
									<td><?php echo $pembelian->tanggal_beli ?></td>
								</tr>
								<tr>
									<td>Kode</td>
									<td>:</td>
									<td><?php echo $pembelian->kode_penjualan ?></td>
								</tr>
							</table>
						</div>
						<div class="col-md-4">
							
						</div>
						<div class="col-md-4">
							<table class="table table-sm">
								<tr>
									<td>Kasir</td>
									<td>:</td>
									<td><?php echo $pembelian->kasir ?></td>
								</tr>
								<tr>
									<td>Pembeli</td>
									<td>:</td>
									<td><?php echo $pembelian->pembeli ?></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="row">
						<div class="col-md">
							<table class="table">
								<thead>
									<tr>
										<th>No</th>
										<th>Kode Barcode</th>
										<th>Nama Barang</th>
										<th>Harga</th>
										<th>Jumlah</th>
										<th>Sub-Total</th>
										
									</tr>
								</thead>
								<tbody>
								<?php $no=1; ?>
								<?php foreach($penjualan as $p): ?>
									<tr>
										<td><?php echo $no++; ?></td>
										<td><?php echo $p->kode_barcode ?></td>
										<td><?php echo $p->nama_barang ?></td>
										<td><?php echo number_format($p->harga_pembelian, '0','.','.') ?></td>
										<td><?php echo $p->jumlah_pembelian ?></td>
										<td><?php echo number_format($p->total_pembelian, '0','.','.') ?></td>
										
									</tr>
								<?php endforeach; ?>
									<form method="post">

									<tr>
										<th colspan="5" style="text-align:right;">Sub-Total</th>
										<td>
											<input type="text" name="sub_total" id="total" class="form-control" value="<?php echo number_format($pembelian->sub_total, '0','.','.') ?>" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Diskon</th>
										<td>
											<input type="text" value="<?php echo $pembelian->diskon ?>" name="diskon" class="form-control" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Potongan Diskon</th>
										<td>
											<input type="text" value="<?php echo number_format($pembelian->potongan_diskon, '0','.','.') ?>" name="p_diskon" class="form-control" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Total</th>
										<td>
											<input type="text" value="<?php echo number_format($pembelian->total, '0','.','.') ?>"   name="total" id="sub_total" class="form-control" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Bayar</th>
										<td>
											<input type="text" id="bayar" name="bayar" class="form-control" value="<?php echo number_format($pembelian->bayar, '0','.','.') ?>" readonly>
										</td>
										<td></td>
									</tr>
									<tr>
										<td colspan="5"></td>
										<td>
											<a href="<?php echo base_url() ?>petugas/struk?kode=<?php echo $pembelian->kode_penjualan ?>" target="_blank" class="btn btn-block btn-success">Cetak Struk</a>
										</td>
										<td></td>
									</tr>
									<tr>
										<th colspan="5" style="text-align:right;">Kembali</th>
										<td>
											<input type="text" id="kembali" name="kembali" class="form-control" value="<?php echo number_format($pembelian->kembali, '0','.','.') ?>" readonly>
										</td>
										<td></td>
									</tr>

									</form>

								</tbody>
							</table>
							
						</div>
					</div>
			</div>
		</div>
	</div>
</div>