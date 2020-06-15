  <div class="container">
    <center>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h4 class="card-header text-center font-weight-bold"><?= $judul; ?></h4>
              <div class="card-body">
                <h4 class="card-title text-left"><span class="font-weight-bold">Nama : </span><?= $mahasiswa['nama']; ?></h4>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Panggilan : </span><?= $mahasiswa['nama_panggilan']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nim Mahasiswa: </span><?= $mahasiswa['nim_mhs']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik: </span><?= $mahasiswa['nama_tahun_akademik']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= $mahasiswa['nama_jurusan']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Kelas : </span><?= $mahasiswa['nama_kelas']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Jenis Kelamin : </span><?= $mahasiswa['jenis_kelamin']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Agama : </span><?= $mahasiswa['agama']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tempat Lahir : </span><?= $mahasiswa['tmpt_lahir']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tanggal Lahir : </span><?= $mahasiswa['tanggal_lahir']; ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Alamat : </span><?= $mahasiswa['alamat']; ?></h6>
                <h6 class="card-text text-left mb-4"><span class="font-weight-bold">Nomer Telpon : </span><?= $mahasiswa['no_telp']; ?></h6>
                <h6 class="card-text text-center mb-4"><img class="rounded-circle" src="<?= base_url('assets/foto/mahasiswa/') . $mahasiswa['image'] ?>" height="200" width="200"></h6>
                <span style="float:right;">
                  <a href="<?= base_url(); ?>mahasiswa" class="btn btn-info"> Kembali </a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>