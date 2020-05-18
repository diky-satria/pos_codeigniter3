<?php

require_once __DIR__ . '/../../../vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$html = '<div class="container">
			<!-- Page Heading -->
			<h4 style="text-align:center;">Laporan penjualan dari <b style="color:red;"><i>'.date('d-M-Y', strtotime($tglm)).'</i></b> sampai <b style="color:red;"><i>'.date('d-M-Y', strtotime($tgla)).'</i></b></h4>

			<table border="1" cellspacing="0" cellpadding="5" style="width:100%">
			    <thead>
			        <tr>
			            <th>No</th>
			            <th>Kode Penjualan</th>
			            <th>Nama Pelanggan</th>
			            <th>Tanggal Pembelian</th>
			            <th>Total</th>
			        </tr>
			    </thead>
			    <tbody>';
			    $no=1;
			    $total =0;
			    foreach($laporan as $l):
			        $html .='<tr>
			            <td>'.$no++.'</td>
			            <td>'.$l->kode_penjualan.'</td>
			            <td>'.$l->pembeli.'</td>
			            <td>'.date('d-M-Y', strtotime($l->tanggal_beli)).'</td>
			            <td>'.number_format($l->total).'</td>
			        </tr>';
			            $total = $total + $l->total;
			        endforeach;
			        $html .='<tr>
			            <th colspan="4"><center>Total</center></th>
			            <td><b>'.number_format($total).'</b></td>
			        </tr>

			    </tbody>
			</table>
		</div>';

$mpdf->WriteHTML($html);
$mpdf->Output('laporan_pertanggal.pdf', \Mpdf\Output\Destination::INLINE);