 <h1 class="text-center font-weight-bold"><?= $judul; ?></h1>
 <hr class="sidebar-divider">
 <div class="container">
 	<center>
 		<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>

 		<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>

 		<?php if (!$this->uri->segment(2) == 'index2'): ?> 				
 			<a href="<?=base_url('Dokumentasi/index3');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Cara Penggunaan Fungsi Menu</span></button></li></a>
 		</center>
 	<?php endif ?>
 	<?php if ($this->session->userdata('id_role') == "1"): ?>
 		<center>
 			<div class="col-xl-6 col-lg-1 col-md-6">
 				<div class="card o-hidden border-0 shadow-lg my-5">
 					<div class="card-body p-0">
 						<div class="card">
 							<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
 							<div class="card-body">
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dashboard</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Users</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profie</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Master Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Pengaturan Role</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</center>
 	<?php endif ?>
 	<?php if ($this->session->userdata('id_role') == "2"): ?>
 		<center>
 			<div class="col-xl-6 col-lg-8 col-md-6">
 				<div class="card o-hidden border-0 shadow-lg my-5">
 					<div class="card-body p-0">
 						<div class="card">
 							<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
 							<div class="card-body">
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profile</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Krs Detail</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Transkrip Nilai</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Nilai</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Ipk</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</center>
 	<?php endif ?>
 	<?php if ($this->session->userdata('id_role') == "3"): ?>
 		<center>
 			<div class="col-xl-6 col-lg-8 col-md-6">
 				<div class="card o-hidden border-0 shadow-lg my-5">
 					<div class="card-body p-0">
 						<div class="card">
 							<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
 							<div class="card-body">
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profie</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian IPK</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian KRS</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Transkrip Nilai</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian Nilai</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</center>
 	<?php endif ?>
 	<?php if ($this->session->userdata('id_role') == "4"): ?>
 		<center>
 			<div class="col-xl-6 col-lg-8 col-md-6">
 				<div class="card o-hidden border-0 shadow-lg my-5">
 					<div class="card-body p-0">
 						<div class="card">
 							<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
 							<div class="card-body">
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profie</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Users</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Mahasiswa</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Dosen</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Fakultas</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Jurusan</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Tahun Akademik</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Mata Kuliah</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Kelas</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Ruangan</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</center>
 	<?php endif ?>
 	<?php if ($this->session->userdata('id_role') == "5"): ?>
 		<center>
 			<div class="col-xl-6 col-lg-8 col-md-6">
 				<div class="card o-hidden border-0 shadow-lg my-5">
 					<div class="card-body p-0">
 						<div class="card">
 							<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
 							<div class="card-body">
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profile</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian IPK</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian KRS</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Transkrip Nilai</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian Nilai</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</center>
 	<?php endif ?>
 	<?php if ($this->session->userdata('id_role') == "6"): ?>
 		<center>
 			<div class="col-xl-6 col-lg-8 col-md-6">
 				<div class="card o-hidden border-0 shadow-lg my-5">
 					<div class="card-body p-0">
 						<div class="card">
 							<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
 							<div class="card-body">
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dashboard</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Users</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profie</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Master Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Pengaturan Role</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 		</center>
 	<?php endif ?>
 </div>