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
				Penjualan collapse
			</div>
			<div class="card-body">
				<table class="table table-striped table-bordered" style="width:100%">
				    <thead>
				        <tr>
				            <th>No</th>
				            <th>Kode Penjualan</th>
				            <th>Tanggal</th>
				            <th>Barcode</th>
				            <th>Nama</th>
				            <th>Jumlah</th>
				            <th>Kasir</th>
				            <th>Collapse</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php $no =1; ?>
				    <?php foreach($collapse as $c): ?>
				        <tr>
				            <td><?php echo $no++ ?></td>
				            <td><?php echo $c->kode_penjualan ?></td>
				            <td><?php echo date('d-M-Y H:i:s', strtotime($c->tanggal_input)) ?></td>
				            <td><?php echo $c->kode_barcode ?></td>
				            <td><?php echo $c->nama_barang ?></td>
				            <td><?php echo $c->jumlah_pembelian ?></td>
				            <td><?php echo $c->kasir ?></td>
				            <td>
				            	<a onclick="return confirm('Lanjutkan >>>')" href="<?php echo base_url() ?>admin/kembalikan_barang?id=<?php echo $c->id_penjualan ?>&barcode=<?php echo $c->kode_barcode ?>&jumlah=<?php echo $c->jumlah_pembelian ?>" class="btn btn-sm btn-danger">Kembalikan</a>
				            </td>
				        </tr>
				    <?php endforeach; ?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>