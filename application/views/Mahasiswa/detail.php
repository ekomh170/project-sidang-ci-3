  <div class="container">
    <center>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h4 class="card-header text-center font-weight-bold"><?= $judul; ?></h4>
              <div class="card-body">
                <h4 class="card-title text-left"><span class="font-weight-bold">Nama : </span><?= cetak($mahasiswa['nama']); ?></h4>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Panggilan : </span><?= cetak($mahasiswa['nama_panggilan']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nim Mahasiswa: </span><?= cetak($mahasiswa['nim_mhs']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik: </span><?= cetak($mahasiswa['nama_tahun_akademik']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= cetak($mahasiswa['nama_jurusan']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Kelas : </span><?= cetak($mahasiswa['nama_kelas']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Jenis Kelamin : </span><?= cetak($mahasiswa['jenis_kelamin']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Agama : </span><?= cetak($mahasiswa['agama']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tempat Lahir : </span><?= cetak($mahasiswa['tmpt_lahir']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tanggal Lahir : </span><?= cetak($mahasiswa['tanggal_lahir']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Alamat : </span><?= cetak($mahasiswa['alamat']); ?></h6>
                <h6 class="card-text text-left mb-4"><span class="font-weight-bold">Nomer Telpon : </span><?= cetak($mahasiswa['no_telp']); ?></h6>
                <h6 class="card-text text-center mb-4"><img class="rounded-circle" src="<?= base_url('assets/foto/users/') . $mahasiswa['image'] ?>" height="200" width="200"></h6>
                <span style="float:left;">
                  <a href="<?= base_url(); ?>Mahasiswa/printdetail/<?= encrypt_url($mahasiswa['nim_mhs']); ?>" target="_BLANK" class="btn btn-dark" style="background-color: darkblue;"> Print </a>
                </span>
                <span style="float:right;">
                  <a href="<?= base_url(); ?>Mahasiswa" class="btn btn-dark" style="background-color: darkblue;"> Kembali </a>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>