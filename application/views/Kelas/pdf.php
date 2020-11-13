<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Kelas</title>
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
			<th width="7%"><center>Kode Kelas</center></th>
			<th width="14%"><center>Nama Kelas</center></th>
			<th width="21%"><center>Nama Ruangan</center></th>
			<th><center>Status</center></th>
		</tr>
		<?php
		$no=1;
		foreach ($kelas as $kls) :
			?>
			<tr>
				<td width="7%"><center><?= $no++; ?></center></td>
				<td width="14%"><center><?= cetak($kls->id_kelas); ?></center></td>
				<td width="21%"><center><?= cetak($kls->nama_kelas); ?></center></td>
				<td ><center><?= cetak($kls->nama_ruangan); ?></center></td>
				<td width="25%"><center><?= cetak($kls->status); ?></center></td>
			</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>