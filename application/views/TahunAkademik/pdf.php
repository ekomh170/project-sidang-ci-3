<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Tahun Akademik</title>
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
			<th width="14%"><center>Kode Tahun Akademik</center></th>
			<th width="21%"><center>Nama Tahun Akademik</center></th>
			<th><center>Status</center></th>
		</tr>
		<?php
		$no=1;
		foreach ($tahunakademik as $ta) :
		?>
		<tr>
			<td width="7%"><center><?= $no++; ?></center></td>
			<td><center><?= cetak($ta->id_tahun_akademik); ?></center></td>
			<td><center><?= cetak($ta->nama_tahun_akademik); ?></center></td>
			<td width="20%"><center><?= cetak($ta->status); ?></center></td>
		</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>