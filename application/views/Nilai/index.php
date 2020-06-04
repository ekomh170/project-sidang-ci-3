<div class="container-fluid mb-2">
	<h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
	<div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
	<?php if ($this->session->flashdata('berhasil')) : ?>
	<?php endif; ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<span style="float: right;">
				<form method="post" action="<?= base_url() ?>Nilai" class="form-inline">
					<input class="form-control mr-1" type="search" placeholder="Cari Data Nilai" name="cari_krs" aria-label="search">
					<button class="btn btn-outline-info my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
				</form>
			</span>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nim</th>
							<th>Nama Mahasiswa</th>
							<th>Nama Jurusan</th>
							<th witdh="18%" class="text-center">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data as $krs) :
						?>
							<tr>
								<td><?= ++$offset; ?></td>
								<td><?= $krs->nim_mhs; ?></td>
								<td><?= $krs->nama; ?></td>
								<td><?= $krs->nama_jurusan; ?></td>
								<td class="text-center">
									<!--crud-->
									<a href="<?= base_url(); ?>Nilai/detail/<?= encrypt_url($krs->nim_mhs); ?>"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></button></a>
									<!--crud-->
								</td>
							</tr>
							<?php $no++ ?>
						<?php endforeach; ?>
					</tbody>
				</table>
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
</div>