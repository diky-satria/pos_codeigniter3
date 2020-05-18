<div class="row mt-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/barang" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row my-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Tambah Barang
			</div>
			<div class="card-body">
				<form method="post" action="<?php echo base_url() ?>admin/tambah_barang">
				  	<div class="row">
					  <div class="col-md-6">
					  	<div class="form-group">
						  	<label>Kode Barcode</label>
						  	<input type="text" name="barcode" class="form-control" value="<?php echo set_value('barcode'); ?>">
						  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('barcode'); ?></small>
						  </div>
						  <div class="form-group">
						  	<label>Nama Barang</label>
						  	<input type="text" name="nama_barang" class="form-control" value="<?php echo set_value('nama_barang'); ?>">
						  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
						  </div>
						  <div class="form-group">
						  	<label>Satuan</label>
						  	<select class="form-control" name="satuan">
						  		<option disabled selected>-- pilih --</option>
						  		<option value="pack">Pack</option>
						  		<option value="pcs">Pcs</option>
						  		<option value="lusin">Lusin</option>
						  	</select>
						  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('satuan'); ?></small>
						  </div>
						  <div class="form-group">
						  	<label>Stok</label>
						  	<input type="text" name="stok" class="form-control" value="<?php echo set_value('stok'); ?>">
						  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('stok'); ?></small>
						  </div>
					   </div>
				    	<div class="col-md-6">
				    		<div class="form-group">
						  	<label>Supplier</label>
						  	<select class="form-control" name="supplier">
						  		<option disabled selected>-- PILIH --</option>
						  		<?php foreach($supplier as $s): ?>
						  		<option value="<?php echo $s->nama_supplier ?>"><?php echo $s->nama_supplier ?></option>
						  		<?php endforeach; ?>
						  	</select>
						  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('supplier'); ?></small>
						  </div>
				    		<div class="form-group">
							  	<label>Harga Beli</label>
							  	<input type="text" onkeyup="sum()" id="harga_beli" name="harga_beli" class="form-control" value="<?php echo set_value('harga_beli'); ?>">
							  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('harga_beli'); ?></small>
							  </div>
							  <div class="form-group">
							  	<label>Harga Jual</label>
							  	<input type="text" onkeyup="sum()" id="harga_jual" name="harga_jual" class="form-control" value="<?php echo set_value('harga_jual'); ?>">
							  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('harga_jual'); ?></small>
							  </div>
							  <div class="form-group">
							  	<label>Untung</label>
							  	<input type="text" value="0" id="untung" name="untung" class="form-control" readonly>
							  </div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-md">
				    		<button type="submit" name="tambah" class="btn btn-sm btn-primary">Tambah</button>
				    	</div>
				    </div>
			 	 </form>
			</div>
		</div>
	</div>
</div>