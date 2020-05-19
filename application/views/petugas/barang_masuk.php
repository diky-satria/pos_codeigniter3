<div class="row mt-4 mb-2">
	<div class="col-md-2">
	<form action="<?php echo base_url() ?>petugas/barang_masuk" method="post">
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
				<h4 class="mb-4 text-gray-800">Barang Masuk</h4>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode Barcode</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form method="post" action="<?php echo base_url() ?>petugas/barang_masuk">
                        <?php if(!$barcode): ?>
                            <tr>
                               <td colspan="4"><center><h4>Kosong</h4></center></td>
                            </tr> 
                        <?php else: ?>
                            <tr>
                                <td>
                                    <input type="text" class="form-control" style="border:0px solid;" name="kode" value="<?php echo $barang->barcode ?>">
                                </td>
                                <td><?php echo $barang->nama_barang ?></td>
                                <td><input type="number" min="1" style="width:80px;" class="form-control" name="jumlah" required></td>
                                <td>
                                    <button type="submit" name="konfirmasi" class="btn btn-sm btn-success">Konfirmasi</button>
                                </td>
                            </tr>
                        <?php endif; ?>
                            </form>
                        </tbody>
                    </table>
			</div>
		</div>
	</div>
</div>