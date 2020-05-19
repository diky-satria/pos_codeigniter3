<div class="row mt-4">
	<div class="col-md">
		<div class="card">
			<div class="card-body">
				<h4 class="mb-4 text-gray-800">Riwayat Barang Masuk</h4>
                    <table class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Barcode</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Oprator</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1; ?>
                        <?php foreach($barang_masuk as $bm): ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $bm->kode_barcode ?></td>
                                <td><?php echo $bm->nama_barang ?></td>
                                <td><?php echo $bm->jumlah ?></td>
                                <td><?php echo $bm->kasir ?></td>
                                <td><?php echo date('d-M-Y H:i:s', strtotime($bm->tanggal_masuk)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
			</div>
		</div>
	</div>
</div>