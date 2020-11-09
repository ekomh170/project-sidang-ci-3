<ul style="background-color: darkorange;" class="navbar-nav bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-graduation-cap"></i>
    </div>
    <div class="sidebar-brand-text mx-3">SIADAWA</div>
  </a>
  <hr class="sidebar-divider">
  <center>
    <div class="mb-2">
      <img class="img-profile rounded-circle" src="<?=base_url('assets/foto/users/') . $user['image'];?>" height="75" width="75">
    </div>
    <a href="<?= base_url('Profile')?>"><button style="background-color: darkorange" class="btn btn mb-2"><div class="mb-4 d-none d-lg-inline text-white-600 small text-white font-weight-bold"><?=$user['nama_panggilan'];?></div></button></a>
  </center>
  <hr class="sidebar-divider">

  <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "6") {?>
    <!-- =============================================== ADMIN =======================================-->
    <!-- Admin -->
    <?php if ($this->uri->segment(1) != 'Dashboard'): ?>
      <li class="nav-item">
      <?php endif?>
      <?php if ($this->uri->segment(1) == 'Dashboard'): ?>
        <li class="nav-item active">
        <?php endif?>
        <a class="nav-link pb-1" href="<?=base_url('Dashboard');?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span><b>Dashboard</b></span></a>
          <hr class="sidebar-divider">
        </li>
        <?php if ($this->uri->segment(1) != 'Pengguna'): ?>
          <li class="nav-item">
          <?php endif?>
          <?php if ($this->uri->segment(1) == 'Pengguna'): ?>
            <li class="nav-item active">
            <?php endif?>
            <a class="nav-link pb-1" href="<?=base_url('Pengguna');?>">
              <i class="fas fa-fw fa-user"></i>
              <span><b>Data Users</b></span></a>
              <hr class="sidebar-divider">
            </li>
            <?php if ($this->uri->segment(1) != 'Profile'): ?>
              <li class="nav-item">
              <?php endif?>
              <?php if ($this->uri->segment(1) == 'Profile'): ?>
                <li class="nav-item active">
                <?php endif?>
                <a class="nav-link pb-1" href="<?=base_url('Profile');?>">
                  <i class="fas fa-fw fa-user"></i>
                  <span><b>Profile</b></span></a>
                  <hr class="sidebar-divider">
                </li>
                <?php if ($this->uri->segment(1) != 'Auth'): ?>
                  <li class="nav-item">
                  <?php endif?>
                  <?php if ($this->uri->segment(1) == 'Auth'): ?>
                    <li class="nav-item active">
                    <?php endif?>
                    <a class="nav-link pb-1" href="<?=base_url('Auth/register');?>">
                      <i class="fas fa-fw fa-user-plus"></i>
                      <span><b>Register Admin</b></span></a>
                      <hr class="sidebar-divider">
                    </li>
                    <?php if ($this->uri->segment(1) == 'Mahasiswa' || $this->uri->segment(1) == 'Dosen' || $this->uri->segment(1) == 'Fakultas' || $this->uri->segment(1) == 'Jurusan' || $this->uri->segment(1) == 'TahunAkademik' || $this->uri->segment(1) == 'Matkul' || $this->uri->segment(1) == 'Kelas'|| $this->uri->segment(1) == 'Ruangan'): ?>
                    <li class="nav-item active">
                      <?php else: ?>
                        <li class="nav-item">
                        <?php endif ?>
                        <a class="nav-link collapsed pb-1" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                          <i class="fas fa-fw fa-folder"></i>
                          <span><b>Master Data Mhs</b></span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-heade text-dark">
                              <center>
                                <h5>Menu</h5>
                              </center>
                            </h6>
                            <!-- Mahasiswa -->
                            <?php if ($this->uri->segment(1) == 'Mahasiswa'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Mahasiswa">Mahasiswa</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Mahasiswa'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Mahasiswa">Mahasiswa</a>
                            <?php endif?>
                            <!-- Mahasiswa -->

                            <!-- Dosen -->
                            <?php if ($this->uri->segment(1) == 'Dosen'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Dosen">Dosen</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Dosen'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Dosen">Dosen</a>
                            <?php endif?>
                            <!-- Dosen -->

                            <!-- Fakultas -->
                            <?php if ($this->uri->segment(1) == 'Fakultas'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Fakultas">Fakultas</a>
                            <?php endif?> 
                            <?php if ($this->uri->segment(1) != 'Fakultas'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Fakultas">Fakultas</a>
                            <?php endif?>
                            <!-- Fakultas -->

                            <!-- Jurusan -->
                            <?php if ($this->uri->segment(1) == 'Jurusan'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Jurusan">Jurusan</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Jurusan'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Jurusan">Jurusan</a>
                            <?php endif?>
                            <!-- Jurusan -->

                            <!-- Tahun Akademik -->
                            <?php if ($this->uri->segment(1) == 'TahunAkademik'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>TahunAkademik">Tahun Akademik</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'TahunAkademik'): ?>
                              <a class="collapse-item" href="<?=base_url();?>TahunAkademik">Tahun Akademik</a>
                            <?php endif?>
                            <!-- Tahun Akademik -->

                            <!-- Matkul -->
                            <?php if ($this->uri->segment(1) == 'Matkul'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Matkul">Mata Kuliah</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Matkul'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Matkul">Mata Kuliah</a>
                            <?php endif?>
                            <!-- Matkul -->

                            <!-- Kelas -->
                            <?php if ($this->uri->segment(1) == 'Kelas'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Kelas">Kelas</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Kelas'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Kelas">Kelas</a>
                            <?php endif?>
                            <!-- Kelas -->

                            <!-- Ruangan -->
                            <?php if ($this->uri->segment(1) == 'Ruangan'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Ruangan">Ruangan</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Ruangan'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Ruangan">Ruangan</a>
                            <?php endif?>
                            <!-- Ruangan -->
                          </div>
                        </div>
                        <hr class="sidebar-divider">
                      </li>
                      <?php if ($this->uri->segment(1) == 'KrsDetail' || $this->uri->segment(1) == 'Nilai' ||  $this->uri->segment(1) == 'Ipk' || $this->uri->segment(1) == 'TranskripNilai'): ?>
                        <li class="nav-item active">
                          <?php else: ?>
                            <li class="nav-item">
                          <?php endif?>
                        <a class="nav-link collapsed pb-1" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                          <i class="fas fa-fw fa-folder"></i>
                          <span><b>Penilaian Data Mhs</b></span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                          <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-heade text-dark">
                              <center>
                                <h5>Menu</h5>
                              </center>
                            </h6>
                            <!-- Krs Detail -->
                            <?php if ($this->uri->segment(1) == 'KrsDetail'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>KrsDetail">Penilaian KRS</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'KrsDetail'): ?>
                              <a class="collapse-item" href="<?=base_url();?>KrsDetail">Penilaian KRS</a>
                            <?php endif?>
                            <!-- KrsDetail -->

                            <!-- Nilai -->
                            <?php if ($this->uri->segment(1) == 'Nilai'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Nilai">Penilaian Nilai Akhir</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Nilai'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Nilai">Penilaian Nilai Akhir</a>
                            <?php endif?>
                            <!-- Nilai -->   

                            <!-- IPK -->
                            <?php if ($this->uri->segment(1) == 'Ipk'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>Ipk">Penilaian IPK</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'Ipk'): ?>
                              <a class="collapse-item" href="<?=base_url();?>Ipk">Penilaian IPK</a>
                            <?php endif?>
                            <!-- IPK -->

                            <!-- Transkrip Nilai -->
                            <?php if ($this->uri->segment(1) == 'TranskripNilai'): ?>
                              <a class="collapse-item active btn-light text-dark" href="<?=base_url();?>TranskripNilai">Transkrip Nilai</a>
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'TranskripNilai'): ?>
                              <a class="collapse-item" href="<?=base_url();?>TranskripNilai">Transkrip Nilai</a>
                            <?php endif?>
                            <!-- Transkrip Nilai -->

                          </div>
                        </div>
                        <hr class="sidebar-divider">
                      </li>

                      <!-- =============================================== ADMIN =======================================-->
                    <?php }?>

                    <?php if ($this->session->userdata('id_role') == "2") {?>
                      <!-- =============================================== MAHASISWA =======================================-->
                      <!-- Mahasiswa -->
                      <?php if ($this->uri->segment(1) == 'Profile'): ?>
                        <li class="nav-item active">
                        <?php endif?>
                        <?php if ($this->uri->segment(1) != 'Profile'): ?>
                          <li class="nav-item">
                          <?php endif?>
                          <a class="nav-link pb-1" href="<?=base_url('Profile');?>">
                            <i class="fas fa-fw fa-user"></i>
                            <span><b>Profile</b></span></a>
                            <hr class="sidebar-divider">
                          </li>
                          <?php if ($this->uri->segment(1) == 'KrsDetail'): ?>
                            <li class="nav-item active">
                            <?php endif?>
                            <?php if ($this->uri->segment(1) != 'KrsDetail'): ?>
                              <li class="nav-item">
                              <?php endif?>
                              <a class="nav-link pb-1" href="<?=base_url('KrsDetail/detail/') . encrypt_url($this->session->userdata('nim_mhs'));?>">
                                <i class="fas fa-fw fa-tasks"></i>
                                <span><b>Hasil Krs Detail</b></span></a>
                                <hr class="sidebar-divider">
                              </li>
                              <?php if ($this->uri->segment(1) == 'TranskripNilai'): ?>
                                <li class="nav-item active">
                                <?php endif?>
                                <?php if ($this->uri->segment(1) != 'TranskripNilai'): ?>
                                  <li class="nav-item">
                                  <?php endif?>
                                  <a class="nav-link pb-1" href="<?=base_url('TranskripNilai/detail/') . encrypt_url($this->session->userdata('nim_mhs'));?>">
                                    <i class="fas fa-fw fa-tasks"></i>
                                    <span><b>Hasil Transkrip Nilai</b></span></a>
                                    <hr class="sidebar-divider">
                                  </li>
                                  <?php if ($this->uri->segment(1) == 'Nilai'): ?>
                                    <li class="nav-item active">
                                    <?php endif?>
                                    <?php if ($this->uri->segment(1) != 'Nilai'): ?>
                                      <li class="nav-item">
                                      <?php endif?>
                                      <a class="nav-link pb-1" href="<?=base_url('Nilai/detail/') . encrypt_url($this->session->userdata('nim_mhs'));?>">
                                        <i class="fas fa-fw fa-tasks"></i>
                                        <span><b>Hasil Nilai</b></span></a>
                                        <hr class="sidebar-divider">
                                      </li>
                                      <?php if ($this->uri->segment(1) == 'Ipk'): ?>
                                        <li class="nav-item active">
                                        <?php endif?>
                                        <?php if ($this->uri->segment(1) != 'Ipk'): ?>
                                          <li class="nav-item">
                                          <?php endif?>
                                          <a class="nav-link pb-1" href="<?=base_url('Ipk/detail/') . encrypt_url($this->session->userdata('nim_mhs'));?>">
                                            <i class="fas fa-fw fa-tasks"></i>
                                            <span><b>Hasil Ipk</b></span></a>
                                            <hr class="sidebar-divider">
                                          </li>
                                          <!-- ======================================================== MAHASISWA =======================================-->
                                        <?php }?>


                                        <?php if ($this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") {?>
                                          <!-- ======================================= DOSEN DAN OPERATOR PENILAIAN ========================================-->
                                          <!-- Dosen -->
                                          <?php if ($this->uri->segment(1) == 'Profile'): ?>
                                            <li class="nav-item active">
                                            <?php endif?>
                                            <?php if ($this->uri->segment(1) != 'Profile'): ?>
                                              <li class="nav-item">
                                              <?php endif?>
                                              <a class="nav-link pb-1" href="<?=base_url('Profile');?>">
                                                <i class="fas fa-fw fa-user"></i>
                                                <span><b>Profile</b></span></a>
                                                <hr class="sidebar-divider">
                                              </li>
                                              <?php if ($this->uri->segment(1) == 'KrsDetail'): ?>
                                                <li class="nav-item active">
                                                <?php endif?>
                                                <?php if ($this->uri->segment(1) != 'KrsDetail'): ?>
                                                  <li class="nav-item">
                                                  <?php endif?>
                                                  <a class="nav-link pb-1" href="<?=base_url('KrsDetail');?>">
                                                    <i class="fas fa-fw fa-tasks"></i>
                                                    <span><b>Penilaian KRS</b></span></a>
                                                    <hr class="sidebar-divider">
                                                  </li>
                                                  <?php if ($this->uri->segment(1) == 'Nilai'): ?>
                                                    <li class="nav-item active">
                                                    <?php endif?>
                                                    <?php if ($this->uri->segment(1) != 'Nilai'): ?>
                                                      <li class="nav-item">
                                                      <?php endif?>
                                                      <a class="nav-link pb-1" href="<?=base_url('Nilai');?>">
                                                        <i class="fas fa-fw fa-tasks"></i>
                                                        <span><b>Penilaian Nilai</b></span></a>
                                                        <hr class="sidebar-divider">
                                                      </li>
                                                      <!-- ==================================== DOSEN DAN OPERATOR PENILAIAN ========================================-->
                                                    <?php }?>

                                                    <?php if ($this->session->userdata('id_role') == "4") {?>
                                                      <!-- ==================================== OPERATOR INFORMASI ================================================== -->
                                                      <!-- Dosen -->
                                                      <?php if ($this->uri->segment(1) == 'Profile'): ?>
                                                        <li class="nav-item active">
                                                        <?php endif?>
                                                        <?php if ($this->uri->segment(1) != 'Profile'): ?>
                                                          <li class="nav-item">
                                                          <?php endif?>
                                                          <a class="nav-link pb-1" href="<?=base_url('Profile');?>">
                                                            <i class="fas fa-fw fa-user"></i>
                                                            <span><b>Profile</b></span></a>
                                                            <hr class="sidebar-divider">
                                                          </li>
                                                          <?php if ($this->uri->segment(1) != 'Pengguna'): ?>
                                                            <li class="nav-item">
                                                            <?php endif?>
                                                            <?php if ($this->uri->segment(1) == 'Pengguna'): ?>
                                                              <li class="nav-item active">
                                                              <?php endif?>
                                                              <a class="nav-link pb-1" href="<?=base_url('Pengguna');?>">
                                                                <i class="fas fa-fw fa-user"></i>
                                                                <span><b>Data Users</b></span></a>
                                                                <hr class="sidebar-divider">
                                                              </li>
                                                              <?php if ($this->uri->segment(1) == 'Mahasiswa'): ?>
                                                                <li class="nav-item active">
                                                                <?php endif?>
                                                                <?php if ($this->uri->segment(1) != 'Mahasiswa'): ?>
                                                                  <li class="nav-item">
                                                                  <?php endif?>
                                                                  <a class="nav-link pb-1" href="<?=base_url('Mahasiswa');?>">
                                                                    <i class="fas fa-fw fa-table"></i>
                                                                    <span><b>Data Mahasiswa</b></span></a>
                                                                    <hr class="sidebar-divider">
                                                                  </li>
                                                                  <?php if ($this->uri->segment(1) == 'Dosen'): ?>
                                                                    <li class="nav-item active">
                                                                    <?php endif?>
                                                                    <?php if ($this->uri->segment(1) != 'Dosen'): ?>
                                                                      <li class="nav-item">
                                                                      <?php endif?>
                                                                      <a class="nav-link pb-1" href="<?=base_url('Dosen');?>">
                                                                        <i class="fas fa-fw fa-table"></i>
                                                                        <span><b>Data Dosen</b></span></a>
                                                                        <hr class="sidebar-divider">
                                                                      </li>
                                                                      <?php if ($this->uri->segment(1) == 'Fakultas'): ?>
                                                                        <li class="nav-item active">
                                                                        <?php endif?>
                                                                        <?php if ($this->uri->segment(1) != 'Fakultas'): ?>
                                                                          <li class="nav-item">
                                                                          <?php endif?>
                                                                          <a class="nav-link pb-1" href="<?=base_url('Fakultas');?>">
                                                                            <i class="fas fa-fw fa-table"></i>
                                                                            <span><b>Data Fakultas</b></span></a>
                                                                            <hr class="sidebar-divider">
                                                                          </li>
                                                                          <?php if ($this->uri->segment(1) == 'Jurusan'): ?>
                                                                            <li class="nav-item active">
                                                                            <?php endif?>
                                                                            <?php if ($this->uri->segment(1) != 'Jurusan'): ?>
                                                                              <li class="nav-item">
                                                                              <?php endif?>
                                                                              <a class="nav-link pb-1" href="<?=base_url('Jurusan');?>">
                                                                                <i class="fas fa-fw fa-table"></i>
                                                                                <span><b>Data Jurusan</b></span></a>
                                                                                <hr class="sidebar-divider">
                                                                              </li>
                                                                              <?php if ($this->uri->segment(1) == 'TahunAkademik'): ?>
                                                                                <li class="nav-item active">
                                                                                <?php endif?>
                                                                                <?php if ($this->uri->segment(1) != 'TahunAkademik'): ?>
                                                                                  <li class="nav-item">
                                                                                  <?php endif?>
                                                                                  <a class="nav-link pb-1" href="<?=base_url('TahunAkademik');?>">
                                                                                    <i class="fas fa-fw fa-table"></i>
                                                                                    <span><b>Data Tahun Akademik</b></span></a>
                                                                                    <hr class="sidebar-divider">
                                                                                  </li>
                                                                                  <?php if ($this->uri->segment(1) == 'Matkul'): ?>
                                                                                    <li class="nav-item active">
                                                                                    <?php endif?>
                                                                                    <?php if ($this->uri->segment(1) != 'Matkul'): ?>
                                                                                      <li class="nav-item">
                                                                                      <?php endif?>
                                                                                      <a class="nav-link pb-1" href="<?=base_url('Matkul');?>">
                                                                                        <i class="fas fa-fw fa-table"></i>
                                                                                        <span><b>Data Mata Kuliah</b></span></a>
                                                                                        <hr class="sidebar-divider">
                                                                                      </li>
                                                                                      <?php if ($this->uri->segment(1) == 'Kelas'): ?>
                                                                                        <li class="nav-item active">
                                                                                        <?php endif?>
                                                                                        <?php if ($this->uri->segment(1) != 'Kelas'): ?>
                                                                                          <li class="nav-item">
                                                                                          <?php endif?>
                                                                                          <a class="nav-link pb-1" href="<?=base_url('Kelas');?>">
                                                                                            <i class="fas fa-fw fa-table"></i>
                                                                                            <span><b>Data Kelas</b></span></a>
                                                                                            <hr class="sidebar-divider">
                                                                                          </li>
                                                                                          <?php if ($this->uri->segment(1) == 'Ruangan'): ?>
                                                                                            <li class="nav-item active">
                                                                                            <?php endif?>
                                                                                            <?php if ($this->uri->segment(1) != 'Ruangan'): ?>
                                                                                              <li class="nav-item">
                                                                                              <?php endif?>
                                                                                              <a class="nav-link pb-1" href="<?=base_url('Ruangan');?>">
                                                                                                <i class="fas fa-fw fa-table"></i>
                                                                                                <span><b>Data Ruangan</b></span></a>
                                                                                                <hr class="sidebar-divider">
                                                                                              </li>
                                                                                              <?php if ($this->uri->segment(1) == 'TranskripNilai'): ?>
                                                                                                <li class="nav-item active">
                                                                                                <?php endif?>
                                                                                                <?php if ($this->uri->segment(1) != 'TranskripNilai'): ?>
                                                                                                  <li class="nav-item">
                                                                                                  <?php endif?>
                                                                                                  <a class="nav-link pb-1" href="<?=base_url('TranskripNilai');?>">
                                                                                                    <i class="fas fa-fw fa-tasks"></i>
                                                                                                    <span><b>Transkrip Nilai</b></span></a>
                                                                                                    <hr class="sidebar-divider">
                                                                                                  </li>
                                                                                                  <?php if ($this->uri->segment(1) == 'Ipk'): ?>
                                                                                                    <li class="nav-item active">
                                                                                                    <?php endif?>
                                                                                                    <?php if ($this->uri->segment(1) != 'Ipk'): ?>
                                                                                                      <li class="nav-item">
                                                                                                      <?php endif?>
                                                                                                      <a class="nav-link pb-1" href="<?=base_url('Ipk');?>">
                                                                                                        <i class="fas fa-fw fa-tasks"></i>
                                                                                                        <span><b>Penilaian IPK</b></span></a>
                                                                                                        <hr class="sidebar-divider">
                                                                                                      </li>
                                                                                                      <!-- =============================================== OPERATOR INFORMASI ======================================== -->

                                                                                                    <?php }?>

                                                                                                    <?php if ($this->uri->segment(1) == 'Dokumentasi'): ?>
                                                                                                      <li class="nav-item active">
                                                                                                      <?php endif?>
                                                                                                      <?php if ($this->uri->segment(1) != 'Dokumentasi'): ?>
                                                                                                        <li class="nav-item">
                                                                                                        <?php endif?>
                                                                                                        <a class="nav-link" href="<?=base_url('Dokumentasi/index');?>">
                                                                                                          <i class="fas fa-fw fa-book"></i>
                                                                                                          <span><b>Dokumentasi</b></span></a>
                                                                                                        </li>
                                                                                                        <hr class="sidebar-divider d-none d-md-block">

                                                                                                        <li class="nav-item">
                                                                                                          <a class="nav-link" href="<?=base_url('Auth/logout');?>">
                                                                                                            <i class="fas fa-fw fa-sign-out-alt"></i>
                                                                                                            <span><b>Keluar</b></span></a>
                                                                                                          </li>
                                                                                                          <hr class="sidebar-divider d-none d-md-block">
                                                                                                          <div class="text-center d-none d-md-inline">
                                                                                                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                                                                                          </div>
                                                                                                        </ul>