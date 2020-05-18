<div class="row mt-3">
	<div class="col-md">
		<a href="<?php echo base_url() ?>admin/barang" class="btn btn-sm btn-dark">Kembali</a>
	</div>
</div>
<div class="row my-3">
	<div class="col-md">
		<div class="card">
			<div class="card-header bg-secondary text-white">
				Ubah Barang
			</div>
			<div class="card-body">
				<form method="post" action="<?php echo base_url() ?>admin/ubah_barang/<?php echo $barang->id_barang ?>">
				  	<div class="row">
					  <div class="col-md-6">
					  	<div class="form-group">
						  	<label>Kode Barcode</label>
						  	<input type="text" name="barcode" class="form-control" value="<?php echo $barang->barcode ?>" readonly>
						  </div>
						  <div class="form-group">
						  	<label>Nama Barang</label>
						  	<input type="text" name="nama_barang" class="form-control" value="<?php echo  $barang->nama_barang ?>">
						  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('nama_barang'); ?></small>
						  </div>
						  <div class="form-group">
						  	<label>Satuan</label>
						  	<select class="form-control" name="satuan">
						  		<option value="pack" <?php if($satuan == 'pack'){ echo 'selected'; } ?>>Pack</option>
						  		<option value="pcs" <?php if($satuan == 'pcs'){ echo 'selected'; } ?>>Pcs</option>
						  		<option value="lusin" <?php if($satuan == 'lusin'){ echo 'selected'; } ?>>Lusin</option>
						  	</select>
						  </div>
						  <div class="form-group">
						  	<label>Stok</label>
						  	<input type="text" name="stok" class="form-control" value="<?php echo $barang->stok ?>">
						  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('stok'); ?></small>
						  </div>
					   </div>
				    	<div class="col-md-6">
				    		<div class="form-group">
						  	<label>Supplier</label>
						  	<select class="form-control" name="supplier">
						  		<?php foreach($supplier as $s): ?>
						  		<option value="<?php echo $s->nama_supplier ?>" <?php if($sup == $s->nama_supplier){ echo 'selected'; } ?>><?php echo $s->nama_supplier ?></option>
						  		<?php endforeach; ?>
						  	</select>
						  </div>
				    		<div class="form-group">
							  	<label>Harga Beli</label>
							  	<input type="text" onkeyup="sum()" id="harga_beli" name="harga_beli" class="form-control" value="<?php echo $barang->harga_beli ?>">
							  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('harga_beli'); ?></small>
							  </div>
							  <div class="form-group">
							  	<label>Harga Jual</label>
							  	<input type="text" onkeyup="sum()" id="harga_jual" name="harga_jual" class="form-control" value="<?php echo $barang->harga_jual ?>">
							  	<small id="emailHelp" class="form-text text-danger"><?php echo form_error('harga_jual'); ?></small>
							  </div>
							  <div class="form-group">
							  	<label>Untung</label>
							  	<input type="text" value="<?php echo $barang->untung ?>" id="untung" name="untung" class="form-control" readonly>
							  </div>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-md">
				    		<button type="submit" class="btn btn-sm btn-primary">Ubah</button>
				    	</div>
				    </div>
			 	 </form>
			</div>
		</div>
	</div>
</div>