<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Ruangan</title>
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
			<th width="10%"><center>No</center></th>
			<th width="25%"><center>Kode Ruangan</center></th>
			<th width="25%"><center>Nama Ruangan</center></th>
			<th width="25%"><center>Jenis Ruangan</center></th>
		</tr>
		<?php
		$no=1;
		foreach ($ruangan as $rgn) :
			?>
			<tr>
				<td width="10%"><center><?= $no++; ?></center></td>
				<td width="25%"><center><?= cetak($rgn->id_ruangan); ?></center></td>
				<td width="25%"><center><?= cetak($rgn->nama_ruangan); ?></center></td>
				<td width="25%"><center><?= cetak($rgn->nama_jr); ?></center></td>
			</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>