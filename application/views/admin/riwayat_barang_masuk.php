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
				Riwayat barang masuk
			</div>
			<div class="card-body">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
				    <thead>
				        <tr>
				            <th>No</th>
				            <th>Kode Barcode</th>
				            <th>Nama</th>
				            <th>Jumlah</th>
				            <th>Oprator</th>
				            <th>Tanggal</th>
				            <th>Opsi</th>
				        </tr>
				    </thead>
				    <tbody>
				    <?php $no=1; ?>
				    <?php foreach($riwayat as $r): ?>
				        <tr>
				            <td><?php echo $no++ ?></td>
				            <td><?php echo $r->kode_barcode ?></td>
				            <td><?php echo $r->nama_barang ?></td>
				            <td><?php echo $r->jumlah ?></td>
				            <td><?php echo $r->kasir ?></td>
				            <td><?php echo date('d-M-Y H:i:s', strtotime($r->tanggal_masuk)) ?></td>
				            <td>
				                <a onclick="return confirm('Lanjutkan >>>')" href="<?php echo base_url() ?>admin/hapus_riwayat/<?php echo $r->id_barang_masuk ?>" class="btn btn-sm btn-danger">Hapus</a>
				            </td>
				        </tr>
				    <?php endforeach; ?>
				    </tbody>
				</table>
			</div>
		</div>
	</div>
</div>