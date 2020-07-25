<div class="container-fluid mb-2">
	<h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
	<?php if ($this->session->flashdata('berhasil')) : ?>
	<?php endif; ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<span style="float: right;">
				<form method="post" action="<?= base_url() ?>Ipk" class="form-inline">
					<input class="form-control mr-1" type="search" placeholder="Cari Data Ipk" name="cari_ipk" aria-label="search">
					<button class="btn btn-outline-info my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
				</form>
			</span>
			<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4"): ?>
			<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
				<a href="<?= base_url(); ?>Ipk/tambah" class="btn btn-block btn-dark bg-info">
					<b>+ Data Baru</b>
				</a>
			</div>
		<?php endif ?>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>No</th>
						<th>Nim Mahasiswa</th>
						<th>Nama Mahasiswa</th>
						<th>Nama Jurusan</th>
						<th witdh="18%" class="text-center">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $ipk) : ?>
						<tr>
							<td><?= ++$offset; ?></td>
							<td><?= cetak($ipk->nim_mhs); ?></td>
							<td><?= cetak($ipk->nama); ?></td>
							<td><?= cetak($ipk->nama_jurusan); ?></td>
							<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") { ?>
								<td class="text-center">
									<!--crud-->
									<a href="<?= base_url(); ?>Ipk/detail/<?= encrypt_url($ipk->nim_mhs); ?>"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></button></a><b> | </b>
									<a href="<?= base_url(); ?>Ipk/ubah/<?= encrypt_url($ipk->id_ipk); ?>"><button type="button" class="btn btn-success btn-circle"><i class="fas fa-fw fa-check-circle"></i></button></a> <b>|</b>
									<a href="<?= base_url(); ?>Ipk/hapus/<?= encrypt_url($ipk->id_ipk); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
									<!--crud-->
								</td>
							<?php } ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
</div>
</div>