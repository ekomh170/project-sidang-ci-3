<div class="container-fluid">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <h2 class="text-dark text-center font-weight-bold">Data Informasi Mahasiswa dan Penilaian Mahasiswa</h2>
  <hr>
  <div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a class="text-xs font-weight-bold text-primary text-uppercase" style="text-decoration: none;" href="<?= base_url('Mahasiswa'); ?>">Jumlah Data Mahasiswa</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $mahasiswa ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a class="text-xs font-weight-bold text-primary text-uppercase" style="text-decoration: none;" href="<?= base_url('Dosen'); ?>">Jumlah Data Dosen</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $dosen ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a class="text-xs font-weight-bold text-success text-uppercase" style="text-decoration: none;" href="<?= base_url('Fakultas'); ?>">Jumlah Data Fakultas</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $fakultas ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a class="text-xs font-weight-bold text-success text-uppercase" style="text-decoration: none;" href="<?= base_url('Jurusan'); ?>">Jumlah Data Jurusan</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jurusan ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a class="text-xs font-weight-bold text-danger text-uppercase" style="text-decoration: none;" href="<?= base_url('Pengguna'); ?>">Jumlah User Telah Tedaftar</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengguna ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a class="text-xs font-weight-bold text-danger text-uppercase" style="text-decoration: none;" href="<?= base_url('Matkul'); ?>">Jumlah Data Mata kuliah</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $matkul ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a class="text-xs font-weight-bold text-warning text-uppercase" style="text-decoration: none;" href="<?= base_url('Kelas'); ?>">Jumlah Data Kelas</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $kelas ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a class="text-xs font-weight-bold text-warning text-uppercase" style="text-decoration: none;" href="<?= base_url('Ruangan'); ?>">Jumlah Data Ruangan</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ruangan ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><a class="text-xs font-weight-bold text-success text-uppercase" style="text-decoration: none;" href="<?= base_url('TranskripNilai'); ?>">Jumlah Data Transkrip Nilai</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tn ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><a class="text-xs font-weight-bold text-warning text-uppercase" style="text-decoration: none;" href="<?= base_url('Ipk'); ?>">Jumlah Data Ipk</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ipk ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a class="text-xs font-weight-bold text-primary text-uppercase" style="text-decoration: none;" href="<?= base_url('KrsDetail'); ?>">Jumlah Data KRS</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $krs ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1"><a class="text-xs font-weight-bold text-danger text-uppercase" style="text-decoration: none;" href="<?= base_url('Nilai'); ?>">Jumlah Data Nilai</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $nilai ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-4"></div>
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a class="text-xs font-weight-bold text-primary text-uppercase" style="text-decoration: none;" href="<?= base_url('TahunAkademik'); ?>">Jumlah Data Tahun Akademik</a></div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $ta ?></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-file fa-2x text-dark-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>