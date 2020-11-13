<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Transkrip Nilai yang sudah mulai di rekap</title>
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
	<table width="100%" border="1" cellspacing="3">
		<tr>
			<th width="10%"><center>No</center></th>
			<th width="25%"><center>Nim Mahasiswa</center></th>
			<th width="25%"><center>Nama Mahasiswa</center></th>
			<th width="25%"><center>Nama Jurusan</center></th>
		</tr>
		<?php
		$no=1;
		foreach ($transkripnilai as $tn) :
			?>
			<tr>
				<td width="10%"><center><?= $no++; ?></center></td>
				<td width="25%"><center><?= cetak($tn->nim_mhs); ?></center></td>
				<td width="25%"><center><?= cetak($tn->nama); ?></center></td>
				<td width="25%"><center><?= cetak($tn->nama_jurusan); ?></center></td>
			</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>