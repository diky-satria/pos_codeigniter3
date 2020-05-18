<div class="row my-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Barang
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
			                <th>No</th>
			                <th>Barcode</th>
			                <th>Nama Barang</th>
			                <th>Satuan</th>
			                <th>Stok</th>
			                <th>Supplier</th>
			                <th>Harga Beli</th>
			                <th>Harga Jual</th>
			                <th>Untung</th>
			                <th>Opsi</th>
			            </tr>
					</thead>
					<tbody>
					<?php 
						$no = 1;
						foreach($barang as $b):
					 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $b->barcode ?></td>
							<td><?php echo $b->nama_barang ?></td>
							<td><?php echo $b->satuan ?></td>
							<td><?php echo $b->stok ?></td>
							<td><?php echo $b->supplier ?></td>
							<td><?php echo number_format($b->harga_beli, '0','.','.') ?></td>
							<td><?php echo number_format($b->harga_jual, '0','.','.') ?></td>
							<td><?php echo number_format($b->untung, '0','.','.') ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/ubah_barang/<?php echo $b->id_barang ?>" class="btn btn-sm btn-success">Ubah</a>
								<a href="<?php echo base_url() ?>admin/hapus_barang/<?php echo $b->id_barang ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_barang" class="btn btn-sm btn-primary">Tambah</a>
			</div>
		</div>
	</div>
</div>