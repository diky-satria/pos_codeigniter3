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
				Petugas
			</div>
			<div class="card-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Username</th>
							<th>Role</th>
							<th>Opsi</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$no =1;
						foreach($petugas as $p):
					 ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $p->nama_user ?></td>
							<td><?php echo $p->email_user ?></td>
							<td><?php echo $p->username ?></td>
							<td>
								<?php if($p->role_user == 1): ?>
									<font>Admin</font>
								<?php else: ?>
									<font>Petugas</font>
								<?php endif; ?>
							</td>
							<td>
								<a onclick="return confirm('Yakin ingin menghapus ?')" href="<?php echo base_url() ?>admin/hapus_petugas/<?php echo $p->id_user ?>" class="btn btn-sm btn-danger">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<a href="<?php echo base_url() ?>admin/tambah_petugas" class="btn btn-sm btn-primary">Tambah</a>
			</div>
		</div>
	</div>
</div>