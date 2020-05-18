<div class="row mt-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/supplier" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row my-3">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Tambah supplier
			</div>
			<div class="card-body">
			<form action="<?php echo base_url() ?>admin/tambah_supplier" method="post">
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" value="<?php echo set_value('nama'); ?>">
					<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama'); ?></small>
				</div>
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?php echo set_value('email'); ?>">
					<small id="emailHelp" class="form-text text-danger"><?php echo form_error('email'); ?></small>
				</div>	
				<div class="form-group">
					<label>Telepon</label>
					<input type="text" name="telepon" class="form-control" value="<?php echo set_value('telepon'); ?>">
					<small id="emailHelp" class="form-text text-danger"><?php echo form_error('telepon'); ?></small>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat" rows="3"><?php echo set_value('alamat'); ?></textarea>
					<small id="emailHelp" class="form-text text-danger"><?php echo form_error('alamat'); ?></small>
				</div>
				<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
			</form>
			</div>
		</div>
	</div>
</div>