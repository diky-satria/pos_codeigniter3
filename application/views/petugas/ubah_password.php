<div class="row mt-4 mb-3">
	<div class="col-md-5">
		<div class="card">
            <div class="card-header bg-secondary text-white">
                Ubah password
            </div>
			<div class="card-body">
            <?php echo $this->session->flashdata('pesan') ?>
                <form action="<?php echo base_url() ?>petugas/ubah_password" method="post">
    				<div class="form-group">
                        <label>Password lama</label>
                        <input type="password" name="password_lama" class="form-control" value="<?php echo set_value('password_lama'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('password_lama'); ?></small>
                    </div>
                    <div class="form-group">
                        <label>Password baru</label>
                        <input type="password" name="password_baru" class="form-control" value="<?php echo set_value('password_baru'); ?>">
                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('password_baru'); ?></small>
                    </div>
                    <div class="form-group">
                        <label>Konfirmasi password baru</label>
                        <input type="password" name="konfirmasi_password" class="form-control">
                        <small id="emailHelp" class="form-text text-danger"><?php echo form_error('konfirmasi_password'); ?></small>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Ubah</button>
                </form>
			</div>
		</div>
	</div>
</div>