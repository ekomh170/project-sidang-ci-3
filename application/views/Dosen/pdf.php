<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Dosen</title>
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
			<th width="14%"><center>Kode Dosen</center></th>
			<th width="14%"><center>Nama Dosen</center></th>
			<th width="21%"><center>Mata Kuliah</center></th>
			<th><center>Jenis Kelamin</center></th>
		</tr>
		<?php
		$no=1;
		foreach ($dosen as $dsn) :
			?>
			<tr>
				<td width="7%"><center><?= $no++; ?></center></td>
				<td width="14%"><center><?= cetak($dsn->id_dosen); ?></center></td>
				<td width="21%"><center><?= cetak($dsn->nama_dosen); ?></center></td>
				<td ><center><?= cetak($dsn->nama_matkul); ?></center></td>
				<td width="25%"><center><?= cetak($dsn->jenis_kelamin); ?></center></td>
			</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>