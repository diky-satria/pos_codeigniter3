<div class="row my-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<?php echo $this->session->flashdata('pesan') ?>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				diskon
			</div>
			<div class="card-body">
				<form method="post" action="<?php echo base_url() ?>admin/diskon">
					<div class="form-group">
						<label>Diskon</label>
						<input type="number" min="0" name="diskon" value="<?php echo $diskon->diskon ?>" class="form-control">
						<small id="emailHelp" class="form-text text-danger"><?php echo form_error('diskon'); ?></small>
					</div>			
					<button type="submit" name="ubah" class="btn btn-sm btn-primary">ubah</button>
				</form>
			</div>
		</div>
	</div>
</div>