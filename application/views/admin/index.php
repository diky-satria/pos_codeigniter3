<h4 class="mt-4 mb-3">Dashboard</h4>
<div class="row">
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/petugas" class="text-decoration-none">
	        <div class="card text-white mb-4" style="background-color:#52527a;">
	            <div class="card-body">Petugas
	            	<div class="display-4"><b><?php echo $count_petugas ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/barang" class="text-decoration-none">
	        <div class="card text-white mb-4" style="background-color:#00a3cc;">
	            <div class="card-body">Barang
	            	<div class="display-4"><b><?php echo $count_barang ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/supplier" class="text-decoration-none">
	        <div class="card text-white mb-4" style="background-color:#cc8800;">
	            <div class="card-body">Supplier
	            	<div class="display-4"><b><?php echo $count_supplier ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/penjualan_collapse" class="text-decoration-none">
	        <div class="card text-white mb-4" style="background-color:#993333;">
	            <div class="card-body">Penjualan collpase
	            	<div class="display-4"><b><?php echo $count_collapse ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/diskon" class="text-decoration-none">
	        <div class="card text-white mb-4" style="background-color:#339933;">
	            <div class="card-body">Diskon
	            	<div class="display-4"><b><?php echo $diskon->diskon ?>%</b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/barang_masuk" class="text-decoration-none">
	        <div class="card text-white mb-4" style="background-color:#2952a3;">
	            <div class="card-body">Barang masuk
	            	<div class="display-4"><b><?php echo $count_barang_masuk ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
    <div class="col-xl-3 col-md-6">
	    <a href="<?php echo base_url() ?>admin/riwayat_barang_masuk" class="text-decoration-none">
	        <div class="card text-white mb-4" style="background-color:#cc00cc;">
	            <div class="card-body">Riwayat barang masuk
	            	<div class="display-4"><b><?php echo $count_riwayat ?></b></div>
	            </div>
	        </div>
	    </a>
    </div>
</div>