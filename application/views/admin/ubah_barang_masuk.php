<div class="row mt-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/barang_masuk" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row my-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Ubah Barang masuk
			</div>
			<div class="card-body">
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

                        <form method="post" action="<?php echo base_url() ?>admin/ubah_barang_masuk/<?php echo $barang_masuk->id_barang_masuk ?>">
                            <tr>
                            	<input type="hidden" name="id" value="<?php echo $barang_masuk->id_barang_masuk ?>">
                                <td><input type="text" class="form-control" style="border:0px solid;" name="kode" value="<?php echo $barang_masuk->kode_barcode ?>"></td>
                                <td><?php echo $barang_masuk->nama_barang ?></td>
                                <td><input type="number" min="1" style="width:80px;" value="<?php echo $barang_masuk->jumlah ?>" class="form-control" name="jumlah" required></td>
                                <td>
                                    <button type="submit" name="ubah" class="btn btn-sm btn-success">Ubah</button>
                                </td>
                            </tr>
                        </form>
                        </tbody>
                    </table>
			</div>
		</div>
	</div>
</div>