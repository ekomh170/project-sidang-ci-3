<div class="container-fluid mb-2">
	<h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
	<?php if ($this->session->flashdata('berhasil')) : ?>
	<?php endif; ?>
	<br>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<span style="float: right;">
				<form method="post" action="<?= base_url() ?>TranskripNilai" class="form-inline">
					<input class="form-control mr-1" type="search" placeholder="Cari Data Transkrip Nilai" name="cari_tn" aria-label="search">
					<button class="btn btn-outline-dark my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
				</form>
			</span>
			<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4"): ?>
			<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
				<a href="<?= base_url(); ?>TranskripNilai/tambah" class="btn btn-block btn-dark" style="background-color: darkblue;">
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
					<?php
					$no = 1;
					foreach ($data as $tn) :
						?>
						<tr>
							<td><?= ++$offset; ?></td>
							<td><?= cetak($tn->nim_mhs); ?></td>
							<td><?= cetak($tn->nama); ?></td>
							<td><?= cetak($tn->nama_jurusan); ?></td>
							<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5" || $this->session->userdata('id_role') == "4") { ?>
								<td class="text-center">
									<!--crud-->
									<a href="<?= base_url(); ?>TranskripNilai/detail/<?= encrypt_url($tn->nim_mhs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-info-circle"></i></button></a><b> | </b>
									<a href="<?= base_url(); ?>TranskripNilai/ubah/<?= encrypt_url($tn->id_transkrip_nilai); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-edit"></i></button></a><b> | </b>
									<a href="<?= base_url(); ?>TranskripNilai/hapus/<?= encrypt_url($tn->id_transkrip_nilai); ?>" class="tombol-hapus"><button type="button" class="btn btn-dark btn-circle tombol-hapus" style="background-color: darkblue;"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
									<!--crud-->
								</td>
							<?php } ?>
							<?php if ($this->session->userdata('id_role') == "6") { ?>
								<td class="text-center">
									<a href="<?= base_url(); ?>TranskripNilai/detail/<?= encrypt_url($tn->nim_mhs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-info-circle"></i></button></a>
								</td>
							<?php } ?>
							
						</tr>
						<?php $no++ ?>
					<?php endforeach; ?>
				</tbody>
			</table>
			<?php echo $this->pagination->create_links(); ?>
		</div>
	</div>
	<div class="card-header py-3">
		<div class="col col-4">
			<a href="<?= base_url(); ?>TranskripNilai/print"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-print"></i></button></a> |
			<a href="<?= base_url(); ?>TranskripNilai/pdf"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-pdf"></i></button></a> |
			<a href="<?= base_url(); ?>TranskripNilai/excel"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-excel"></i></button></a>
		</div>
	</div>
</div>
</div>