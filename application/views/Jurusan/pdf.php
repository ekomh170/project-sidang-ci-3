<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Jurusan</title>
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
			<th width="14%"><center>Kode Jurusan</center></th>
			<th width="21%"><center>Nama Jurusan</center></th>
			<th><center>Nama Fakultas</center></th>
			<th width="25%"><center>Nama Pendidikan</center></th>
		<?php
		$no=1;
		foreach ($jurusan as $jrs) :
			?>
			<tr>
				<td width="7%"><center><?= $no++; ?></center></td>
				<td width="14%"><center><?= cetak($jrs->id_jurusan); ?></center></td>
				<td width="21%"><center><?= cetak($jrs->nama_jurusan); ?></center></td>
				<td ><center><?= cetak($jrs->nama_fakultas); ?></center></td>
				<td width="25%"><center><?= cetak($jrs->nama_lengkap_jp); ?> (<?= $jrs->nama_jp; ?>)</center></td>
			</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>