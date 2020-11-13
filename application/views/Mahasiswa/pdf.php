<!DOCTYPE html>
<html>
<head>
	<title>Laporan Pdf Data Mahasiswa</title>
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
			<th width="30"><center>Nomor induk Mahasiswa</center></th>
			<th width="20%"><center>Nama Mahasiswa</center></th>
			<th><center>Tahun Akademik</center></th>
			<th width="20%"><center>Jurusan</center></th>
			<th width="20%"><center>Kelas</center></th>
		</tr>
		<?php
		$no=1;
		foreach ($mahasiswa as $mhs) :
			?>
			<tr>
				<td width="7%"><center><?= $no++; ?></center></td>
				<td width="14%"><center><?= cetak($mhs->nim_mhs); ?></center></td>
				<td width="21%"><center><?= cetak($mhs->nama); ?></center></td>
				<td><center><?= cetak($mhs->nama_tahun_akademik); ?></center></td>
				<td width="25%"><center><?= cetak($mhs->nama_jurusan); ?></center></td>
				<td width="25%"><center><?= cetak($mhs->nama_kelas); ?></center></td>
			</tr>	
		<?php endforeach; ?>
	</table>
</body>
</html>