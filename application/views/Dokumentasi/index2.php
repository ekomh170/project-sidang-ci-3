 <h1 class="text-center font-weight-bold"><?= $judul; ?></h1>
 <hr class="sidebar-divider">
 <div class="container">
 	<?php if ($this->session->userdata('id_role') == "1"): ?>
 		<center>
 			<div class="col-xl-6 col-lg-8 col-md-6">
 				<div class="card o-hidden border-0 shadow-lg my-5">
 					<div class="card-body p-0">
 						<div class="card">
 							<h4 class="card-header text-center font-weight-bold"><?= $judul2; ?></h4>
 							<div class="card-body">
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dashboard</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span> Dashboard adalah jenis antarmuka pengguna grafis yang sering memberikan pandangan sekilas tentang indikator kinerja utama yang relevan dengan tujuan atau proses bisnis tertentu. Dalam penggunaan lain, "dasbor" adalah nama lain untuk "laporan kemajuan" atau "laporan."  Dan Juga Dashboard Adalah Halaman utama yang menampilkan informasi tentang data data yang</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Users</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span> Penampung yang menyimpan data - data user yang memiliki akses login pada Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profie</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Profile yang berfungsi Untuk menunjukan data users yang sedang login dan juga mempermudah user untuk melihat biodata diri nya sendiri</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Master Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Adalah Sebuah Menu Yang Menyimpan Data Informasi Seperti Mahasiswa, Dosen, Fakultas, Jurusan, Tahun Akademik, Mata Kuliah, Kelas dan Ruangan</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Adalah Sebuah Menu Yang Menyimpan Data Penilaian Seperti Krs, Nilai Akhir, IPK,dan Transkrip Nilai</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Dokumentasi Berfungsi sebagai panduan atau tutorial user saat login dan ingin menggunakan Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa saat Login</h6>
 							</div>	
 						</div>
 					</div>
 					<div class="card-footer">
 						<center>
 							<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>
 							<?php if (!$this->uri->segment(2) == 'index2'): ?> 				
 								<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>
 							<?php endif ?>
 						</center>
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
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Profile yang berfungsi Untuk menunjukan data users yang sedang login dan juga mempermudah user untuk melihat biodata diri nya sendiri</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Krs Detail</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Keterangan : </span>Hasil Krs Adalah Menu Yang Berfungsi untuk menampilkan pencapaian KRS (Kartu Rencana Studi) berdasarkan mahasiswa yang login</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Nilai</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Keterangan : </span>Hasil Nilai Adalah Menu Yang Berfungsi untuk menampilkan pencapaian Nilai berdasarkan mahasiswa yang login</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Ipk</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Keterangan : </span>Hasil Ipk Adalah Menu Yang Berfungsi untuk menampilkan pencapaian Ipk (Indeks prestasi) berdasarkan mahasiswa yang login</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Hasil Transkrip Nilai</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Keterangan : </span>Hasil Transkrip Nilai Adalah Menu Yang Berfungsi untuk menampilkan pencapaian Transkrip Nilai berdasarkan mahasiswa yang login</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Dokumentasi Berfungsi sebagai panduan atau tutorial user saat login dan ingin menggunakan Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa saat Login</h6>
 							</div>
 						</div>
 					</div>
 					<div class="card-footer">
 						<center>
 							<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>
 							<?php if (!$this->uri->segment(2) == 'index2'): ?> 				
 								<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>
 							<?php endif ?>
 						</center>
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
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Profile yang berfungsi Untuk menunjukan data users yang sedang login dan juga mempermudah user untuk melihat biodata diri nya sendiri</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian IPK</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Menu Penilaian IPK adalah menu untuk menampung kumpulan data nilai IPK mahasiswa yang ingin di nilai oleh dosen</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian KRS</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Menu Penilaian IPK adalah menu untuk menampung kumpulan data nilai KRS mahasiswa yang ingin di nilai oleh dosen</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Dokumentasi Berfungsi sebagai panduan atau tutorial user saat login dan ingin menggunakan Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa saat Login</h6>
 							</div>
 						</div>
 					</div>
 					<div class="card-footer">
 						<center>
 							<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>
 							<?php if (!$this->uri->segment(2) == 'index2'): ?> 				
 								<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>
 							<?php endif ?>
 						</center>
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
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Profile yang berfungsi Untuk menunjukan data users yang sedang login dan juga mempermudah user untuk melihat biodata diri nya sendiri</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Users</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span> Penampung yang menyimpan data - data user yang memiliki akses login pada Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Master Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Adalah Sebuah Menu Yang Menyimpan Data Informasi Seperti Mahasiswa, Dosen, Fakultas, Jurusan, Tahun Akademik, Mata Kuliah, Kelas dan Ruangan</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Adalah Sebuah Menu Yang Menyimpan Data Penilaian Seperti Krs, Nilai Akhir, IPK,dan Transkrip Nilai</h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Dokumentasi Berfungsi sebagai panduan atau tutorial user saat login dan ingin menggunakan Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa saat Login</h6>

 							</div>
 						</div>
 					</div>
 					<div class="card-footer">
 						<center>
 							<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>
 							<?php if (!$this->uri->segment(2) == 'index2'): ?> 				
 								<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>
 							<?php endif ?>
 						</center>
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
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Profile yang berfungsi Untuk menunjukan data users yang sedang login dan juga mempermudah user untuk melihat biodata diri nya sendiri</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian IPK</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : Berfungsi untuk mendata nilai untuk mahasiswa tugas nya sama dengan dosen tetapi dia lebih kompleks</span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian KRS</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Transkrip Nilai</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span></h6>

 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Dokumentasi Berfungsi sebagai panduan atau tutorial user saat login dan ingin menggunakan Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa saat Login</h6>

 							</div>
 						</div>
 					</div>
 					<div class="card-footer">
 						<center>
 							<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>
 							<?php if (!$this->uri->segment(2) == 'index2'): ?> 				
 								<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>
 							<?php endif ?>
 						</center>
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
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span> Dashboard adalah jenis antarmuka pengguna grafis yang sering memberikan pandangan sekilas tentang indikator kinerja utama yang relevan dengan tujuan atau proses bisnis tertentu. Dalam penggunaan lain, "dasbor" adalah nama lain untuk "laporan kemajuan" atau "laporan."  Dan Juga Dashboard Adalah Halaman utama yang menampilkan informasi tentang data data yang</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Data Users</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span> Penampung yang menyimpan data - data user yang memiliki akses login pada Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Profie</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Profile yang berfungsi Untuk menunjukan data users yang sedang login dan juga mempermudah user untuk melihat biodata diri nya sendiri</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Master Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Adalah Sebuah Menu Yang Menyimpan Data Informasi Seperti Mahasiswa, Dosen, Fakultas, Jurusan, Tahun Akademik, Mata Kuliah, Kelas dan Ruangan</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Penilaian Data Mhs</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Adalah Sebuah Menu Yang Menyimpan Data Penilaian Seperti Krs, Nilai Akhir, IPK,dan Transkrip Nilai</h6>
 								<h6 class="card-text text-left"><span class="font-weight-bold">Nama Menu : </span>Dokumentasi</h6>
 								<h6 class="card-text text-left mb-4"><span class="font-weight-bold">Keterangan : </span>Dokumentasi Berfungsi sebagai panduan atau tutorial user saat login dan ingin menggunakan Aplikasi Sistem Informasi Mahasiswa Dan Penilaian Mahasiswa saat Login</h6>
 							</div>
 						</div>
 					</div>
 					<div class="card-footer">
 						<center>
 							<a href="<?=base_url('Dokumentasi/index');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Role Hak Akses Menu</span></button></li></a>
 							<?php if (!$this->uri->segment(2) == 'index2'): ?> 				
 								<a href="<?=base_url('Dokumentasi/index2');?>" style="text-decoration:none"><li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-warning btn-icon-split"><span class="icon text-white-50"><i class="fas fa-cog"></i></span><span class="text">Fungsi Menu</span></button></li></a>
 							<?php endif ?>
 						</center>
 					</div>
 				</div>			
 			</div>	
 		</center>
 	<?php endif ?>
 </div>