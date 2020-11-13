<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Fakultas</title>
</head>
<body>
	<h1><center><?= $judul; ?></center></h1>
	<span style="float: left;">
		<h4>Pukul : <?php print date('H:i:s');?></h4>
	</span>
	<span style="float: right">
		<h4>Tanggal : <?=waktu();?></h4>
	</span>
	<br><br><br><br>
	<table  width="100%" border="1" cellspacing="3">
		<tr>
			<th width="7%"><center>No</center></th>
			<th width="7%"><center>Kode Fakultas</center></th>
			<th width="14%"><center>Nama Fakultas</center></th>
			<th width="21%"><center>Keterangan</center></th>
			<th><center>Status</center></th>
		</tr>
		<?php
		$no=1;
		foreach ($fakultas as $fks) :
			?>
			<tr>
				<td width="7%"><center><?= $no++; ?></center></td>
				<td width="14%"><center><?= cetak($fks->id_fakultas); ?></center></td>
				<td width="25%"><center><?= cetak($fks->nama_fakultas); ?></center></td>
				<td width="25%"><center><?= cetak($fks->keterangan); ?></center></td>
				<td ><center><?= cetak($fks->status); ?></center></td>
			</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>