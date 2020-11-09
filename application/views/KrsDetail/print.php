<!DOCTYPE html>
<html>
<head>
	<title>Print Data Krs Detail Mahasiswa</title>
	<link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
	<link href="<?=base_url('assets/layout/');?>css/sb-admin-2.css" rel="stylesheet">
</head>
<body>
	<div class="container-fluid mb-2 mt-4">
		<div class="text-center">
			<img src="<?= base_url('assets/img/logo/img.png') ?>" class="img-responsive center-block mb-2" width="250" height="250" alt="logo">
		</div>
		<h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
		<div class="card shadow mb-4">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>No</th>
								<th>Nim Mahasiswa</th>
								<th>Nama Mahasiswa</th>
								<th>Nama Jurusan</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($krs_detail as $krs) :
							?>
							<tr>
								<td><?= $no++; ?></td>
								<td><?= cetak($krs->nim_mhs); ?></td>
								<td><?= cetak($krs->nama); ?></td>
								<td><?= cetak($krs->nama_jurusan); ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<?php echo $this->pagination->create_links(); ?>
				</div>
			</div>	
		</div>
	</div>
</body>
</html>

<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url('assets/layout/');?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?=base_url('assets/layout/');?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/layout/');?>js/demo/datatables-demo.js"></script>

<script>
	window.print();
</script>
