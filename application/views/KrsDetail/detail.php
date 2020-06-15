<div class="container">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <center>
    <div class="col-xl-6 col-lg-8 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="card">
            <h4 class="card-header text-center"><b><?= $judul; ?></b></h4>
            <div class="card-body">
              <h4 class="card-text text-left"><b>NIM Mahasiswa : </b><?= $data['nim_mhs']; ?></h4>
              <h6 class="card-text text-left"><b>Nama Mahasiswa : </b><?= $data['nama']; ?></h6>
              <h6 class="card-text text-left"><b>Nama Fakultas : </b><?= $data['nama_fakultas']; ?></h6>
              <h6 class="card-text text-left"><b>Nama Jurusan : </b><?= $data['nama_jurusan']; ?></h6>
              <h6 class="card-text text-left"><b>Tahun Akademik : </b><?= $data['nama_tahun_akademik']; ?></h6>
              <h6 class="card-text text-left"><b>Status: </b><?= $data['status']; ?></h6>
              <span style="float: right;">
                <a href="<?= base_url(); ?>KrsDetail" class="btn btn-info"> Kembali </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>KrsDetail/tambah/<?= encrypt_url($data['nim_mhs']); ?>" class=" btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dosen</th>
                  <th>Mata Kuliah</th>
                  <th>Nilai SKS</th>
                  <th>Predikat</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <?php
                  $no = 1;
                  foreach ($nilai as $nl) : ?>
                    <td><?= $no; ?></td>
                    <td><?= $nl->nama_dosen; ?></td>
                    <td><?= $nl->nama_matkul; ?></td>
                    <td><?= $nl->nilai_krs; ?></td>
                    <td><?= $nl->grade; ?></td>
                    <td><?= $nl->status; ?></td>
                    <td>
                      <a href="<?= base_url(); ?>KrsDetail/ubah/<?= encrypt_url($nl->id_krs); ?>"><button type="button" class="btn btn-success btn-circle"><i class="fas fa-fw fa-check-circle"></i></button></a> <b>|</b>
                      <a href="<?= base_url(); ?>KrsDetail/hapus/<?= encrypt_url($nl->id_krs); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
                    </td>
                </tr>
              </tbody>
              <?php $no++ ?>
            <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>