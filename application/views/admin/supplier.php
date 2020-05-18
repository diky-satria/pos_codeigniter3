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
				Supplier
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
			                <th>No</th>
			                <th>Nama</th>
			                <th>Email</th>
			                <th>Telepon</th>
			                <th>Alamat</th>
			                <th>Opsi</th>
			            </tr>
					</thead>
					<tbody>
					<?php 
						$no = 1;
						foreach($supplier as $s):
					 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $s->nama_supplier ?></td>
							<td><?php echo $s->email_supplier ?></td>
							<td><?php echo $s->telepon_supplier ?></td>
							<td><?php echo $s->alamat_supplier ?></td>
							<td>
								<a href="<?php echo base_url() ?>admin/ubah_supplier/<?php echo $s->id_supplier ?>" class="btn btn-sm btn-success">Ubah</a>
								<a href="<?php echo base_url() ?>admin/hapus_supplier/<?php echo $s->id_supplier ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_supplier" class="btn btn-sm btn-primary">Tambah</a>
			</div>
		</div>
	</div>
</div>