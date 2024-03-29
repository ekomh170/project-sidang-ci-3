<div class="container-fluid mb-2">
	<h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
	<?php if ($this->session->flashdata('berhasil')) : ?>
	<?php endif; ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<span style="float: right;">
				<form method="post" action="<?= base_url() ?>Mahasiswa" class="form-inline">
					<input class="form-control mr-1" type="search" placeholder="Cari Data Mahasiswa" name="cari_mhs" aria-label="search">
					<button class="btn btn-outline-dark my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
				</form>
			</span>
			<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") { ?>
				<div class="col col-4">
					<div class="input-group input-group-sm hidden-xs" style="width: 150px;">
						<a href="<?= base_url(); ?>Mahasiswa/tambah" class="btn btn-block btn-dark" style="background-color: darkblue;"><b>+ Data Baru</b></a>
					</div>
				</div>
			<?php } ?>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered text-center" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th width="7%">No</th>
							<th width="14%">Nim</th>
							<th width="14%">Nama</th>
							<th width="14%">Tahun Akademik</th>
							<th width="14%">Jurusan</th>
							<th width="13%">Kelas</th>
							<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4" || $this->session->userdata('id_role') == "6") { ?>
								<th witdh="18%" class="text-center">Aksi</th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($join as $mhs) :
							?>
							<tr>
								<td><?= ++$offset; ?></td>
								<td><?= cetak($mhs->nim_mhs); ?></td>
								<td><?= cetak($mhs->nama); ?></td>
								<td><?= cetak($mhs->nama_tahun_akademik); ?></td>
								<td><?= cetak($mhs->nama_jurusan); ?></td>
								<td><?= cetak($mhs->nama_kelas); ?></td>
								<?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") { ?>
									<td class="text-center">
										<!--izin Akses-->
										<?php if ($mhs->status == 'Tidak Aktif') { ?>
											<?= anchor(base_url('mahasiswa/user/') . $mhs->nim_mhs, '<button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-lock"></i></button>') ?> <b> | </b>
										<?php } ?>
										<!--nonaktif-->
										<?php if ($mhs->status == 'Aktif') { ?>
											<?= anchor(base_url('mahasiswa/nonaktif/') . $mhs->nim_mhs, '<button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-ban"></i></button>') ?> <b>|</b>
										<?php } ?>
										<!--crud-->
										<a href="<?= base_url(); ?>Mahasiswa/detail/<?= encrypt_url($mhs->nim_mhs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-info-circle"></i></button></a> <b>|</b>
										<a href="<?= base_url(); ?>Mahasiswa/edit/<?= encrypt_url($mhs->nim_mhs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-edit"></i></button></a> <b>|</b>
										<a href="<?= base_url(); ?>Mahasiswa/hapus/<?= encrypt_url($mhs->nim_mhs); ?>" class="tombol-hapus"><button type="button" class="btn btn-dark btn-circle tombol-hapus" style="background-color: darkblue;"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>

									</td>
								<?php } ?>
								<?php if ($this->session->userdata('id_role') == "6") { ?>
									<td class="text-center">
										<a href="<?= base_url(); ?>Mahasiswa/detail/<?= encrypt_url($mhs->nim_mhs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-info-circle"></i></button></a>
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
					<a href="<?= base_url(); ?>Mahasiswa/print"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-print"></i></button></a> |
					<a href="<?= base_url(); ?>Mahasiswa/pdf"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-pdf"></i></button></a> |
					<a href="<?= base_url(); ?>Mahasiswa/excel"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-excel"></i></button></a>
				</div>
			</div>
		</div>
	</div>