<?php 
	$filename = "laporan_penjualan_pertanggal-(".date('d-m-Y').").xls";
	header("content-disposition: attachment; filename= '$filename'");
	header("content-type: application/vdn.mc-exel");
 ?>
<!-- Page Heading -->
<h4 class="mb-4 text-gray-800">Laporan penjualan dari <b style="color:red;"><i><?php echo $tglm ?></i></b> sampai <b style="color:red;"><i><?php echo $tgla  ?></i></b></h4>

<table id="example" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Penjualan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php $no=1; ?>
        <?php $total =0; ?>
        <?php foreach($laporan as $l): ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $l->kode_penjualan ?></td>
                <td><?php echo $l->pembeli ?></td>
                <td><?php echo date('d-M-Y', strtotime($l->tanggal_beli)) ?></td>
                <td><?php echo number_format($l->total) ?></td>
            </tr>
            <?php 
                 $total = $total + $l->total;
            ?>
            <?php endforeach; ?>
            <tr>
                <th colspan="4"><center>Total</center></th>
                <td><b><?php echo number_format($total) ?></b></td>
            </tr>
    </tbody>
</table>