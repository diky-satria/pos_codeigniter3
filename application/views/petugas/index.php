<div class="row mt-4 mb-2">
	<div class="col-md-2">
	<form action="<?php echo base_url() ?>petugas" method="post">
		<div class="form-group">
			<input type="text" name="kodepj" class="form-control" value="<?php echo $kode ?>" readonly>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<input type="text" name="barcode" class="form-control" autofocus>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<button type="submit" name="tambahkan" class="btn btn-primary">Tambahkan</button>
		</div>
	</form>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-4 text-gray-800">Data Penjualan</h4>
					<table class="table">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Barcode</th>
								<th>Nama Barang</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$sub_total = 0;
							$p_diskon = 0;
							$total = 0;
							$no = 1;
							foreach($barang as $b):
						 ?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $b->kode_barcode ?></td>
								<td><?php echo $b->nama_barang ?></td>
								<td><?php echo number_format($b->harga_pembelian, '0','.','.') ?></td>
								<td><?php echo $b->jumlah_pembelian ?></td>
								<td><?php echo number_format($b->total_pembelian, '0','.','.') ?></td>
								<td>
									<a href="<?php echo base_url() ?>petugas/kurang_penjualan?kode=<?php echo $b->kode_penjualan ?>&id=<?php echo $b->id_penjualan ?>&barcode=<?php echo $b->kode_barcode ?>&harga=<?php echo $b->harga_pembelian ?>" class="btn btn-sm btn-success"><i class="fas fa-minus" title="kurang"></i></a>
									<a href="<?php echo base_url() ?>petugas/tambah_penjualan?kode=<?php echo $b->kode_penjualan ?>&id=<?php echo $b->id_penjualan ?>&barcode=<?php echo $b->kode_barcode ?>&harga=<?php echo $b->harga_pembelian ?>" class="btn btn-sm btn-success"><i class="fas fa-plus" title="tambah"></i></a>
									<a onclick="return confirm('Lanjutkan >>>')" class="btn btn-sm btn-danger" href="<?php echo base_url() ?>petugas/hapus_penjualan?id=<?php echo $b->id_penjualan ?>&kode=<?php echo $b->kode_penjualan ?>&barcode=<?php echo $b->kode_barcode ?>&jumlah=<?php echo $b->jumlah_pembelian ?>"><i class="fas fa-trash-alt" title="hapus"></i></a>
								</td>
							</tr>
						<?php 
							$sub_total = $sub_total + $b->total_pembelian;
							$p_diskon = $sub_total * $diskon->diskon / 100;
							$total = $sub_total - $p_diskon;
						 ?>
						<?php endforeach; ?>
							<form method="post" style="border:0px;" action="<?php echo base_url() ?>petugas">

							<input type="hidden" name="kodekode" value="<?php echo $kode ?>">
							<tr>
								<th colspan="5" style="text-align:right;">Sub-Total</th>
								<td>
									<input type="text" name="sub_total" id="total" class="form-control" value="<?php echo $sub_total ?>" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Diskon</th>
								<td>
									<input type="text" value="<?php echo $diskon->diskon ?>%" name="diskon" class="form-control" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Potongan Diskon</th>
								<td>
									<input type="text" value="<?php echo $p_diskon ?>" name="p_diskon" class="form-control" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;color:red;">Total</th>
								<td>
									<input type="text" value="<?php echo $total ?>" onkeyup="hitung()"  name="total" id="sub_total" class="form-control" readonly>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Bayar</th>
								<td>
									<input type="number" id="bayar" onkeyup="hitung()" name="bayar" class="form-control" required>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Pembeli</th>
								<td>
									<input type="text" id="pembeli" name="pembeli" class="form-control" required>
								</td>
								<td></td>
							</tr>
							<tr>
								<td colspan="5"></td>
								<td>
									<button type="submit" id="cetak" name="cetak" class="btn btn-block btn-primary">Bayar</button>
								</td>
								<td></td>
							</tr>
							<tr>
								<th colspan="5" style="text-align:right;">Kembali</th>
								<td>
									<input type="text" value="0" id="kembali" name="kembali" class="form-control" readonly>
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