<div class="row mt-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/supplier" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row my-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Ubah supplier
			</div>
			<div class="card-body">
			<form action="<?php echo base_url() ?>admin/ubah_supplier/<?php echo $supplier->id_supplier ?>" method="post">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $supplier->nama_supplier ?>">
					<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo $supplier->email_supplier ?>" readonly>
				</div>	
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" name="telepon" class="form-control" value="<?php echo $supplier->telepon_supplier ?>">
					<small id="emailHelp" class="form-text text-danger"><?php echo form_error('telepon'); ?></small>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat" rows="3"><?php echo $supplier->alamat_supplier ?></textarea>
					<small id="emailHelp" class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
				</div>
				<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
			</form>
			</div>
		</div>
	</div>
</div>