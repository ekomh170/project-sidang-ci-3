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
					<button class="btn btn-outline-dark my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
				</form>
			</span>
			<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4"): ?>
			<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
				<a href="<?= base_url(); ?>Ipk/tambah" class="btn btn-block btn-dark" style="background-color: darkblue;">
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
						<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5" || $this->session->userdata('id_role') == "4" || $this->session->userdata('id_role') == "6") { ?>
							<th witdh="18%" class="text-center">Aksi</th>
						<?php } ?>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($data as $ipk) : ?>
						<tr>
							<td><?= ++$offset; ?></td>
							<td><?= cetak($ipk->nim_mhs); ?></td>
							<td><?= cetak($ipk->nama); ?></td>
							<td><?= cetak($ipk->nama_jurusan); ?></td>
							<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5" || $this->session->userdata('id_role') == "4") { ?>
								<td class="text-center">
									<!--crud-->
									<a href="<?= base_url(); ?>Ipk/detail/<?= encrypt_url($ipk->nim_mhs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-info-circle"></i></button></a><b> | </b>
									<a href="<?= base_url(); ?>Ipk/ubah/<?= encrypt_url($ipk->id_ipk); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-edit"></i></button></a> <b>|</b>
									<a href="<?= base_url(); ?>Ipk/hapus/<?= encrypt_url($ipk->id_ipk); ?>" class="tombol-hapus"><button type="button" class="btn btn-dark btn-circle tombol-hapus" style="background-color: darkblue;"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
									<!--crud-->
								</td>
							<?php } ?>
							<?php if ($this->session->userdata('id_role') == "6") { ?>
								<td class="text-center">
									<a href="<?= base_url(); ?>Ipk/detail/<?= encrypt_url($ipk->nim_mhs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-info-circle"></i></button></a>	
								</td>
							<?php } ?>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
	<div class="card-header py-3">
		<div class="col col-4">
			<a href="<?= base_url(); ?>Ipk/print"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-print"></i></button></a> |
			<a href="<?= base_url(); ?>Ipk/pdf"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-pdf"></i></button></a> |
			<a href="<?= base_url(); ?>Ipk/excel"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-excel"></i></button></a>
		</div>
	</div>
</div>
</div>