<div class="row mt-4 mb-2">
	<div class="col-md-2">
	<form action="<?php echo base_url() ?>petugas/cek_barang" method="post">
		<div class="form-group">
			<input type="text" name="barcode" class="form-control" autofocus>
		</div>
	</div>
	<div class="col-md-2">
		<div class="form-group">
			<button type="submit" name="cek" class="btn btn-primary">Cek</button>
		</div>
	</form>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-4 text-gray-800">Cari Data Barang</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Barcode</th>
                                <th>Nama</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Supplier</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($barcode): ?>
                            <tr>
                                <td><?php echo $barang->barcode?></td>
                                <td><?php echo $barang->nama_barang ?></td>
                                <td><?php echo $barang->satuan ?></td>
                                <td><?php echo $barang->stok ?></td>
                                <td><?php echo $barang->supplier ?></td>
                                <td><?php echo number_format($barang->harga_jual, '0','.','.') ?></td>
                            </tr>
                        <?php else: ?>
                            	<tr>
                                    <td colspan="6"><center><h4>Kosong</h4></center></td>
                                </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
			</div>
		</div>
	</div>
</div>