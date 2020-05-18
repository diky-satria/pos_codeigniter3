<h4 class="mt-4 mb-3">Dashboard</h4>
<div class="row">
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/petugas" class="text-decoration-none">
	        <div class="card bg-primary text-white mb-4">
	            <div class="card-body">Petugas
	            	<div class="display-4"><b><?php echo $count_petugas ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/barang" class="text-decoration-none">
	        <div class="card bg-primary text-white mb-4">
	            <div class="card-body">Barang
	            	<div class="display-4"><b><?php echo $count_barang ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/supplier" class="text-decoration-none">
	        <div class="card bg-primary text-white mb-4">
	            <div class="card-body">Supplier
	            	<div class="display-4"><b><?php echo $count_supplier ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
</div>