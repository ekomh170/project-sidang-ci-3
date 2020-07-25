<div class="container">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <center>
    <div class="col-xl-6 col-lg-8 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="card">
            <h4 class="card-header text-center"><span class="font-weight-bold"><?= $judul; ?></span></h4>
            <div class="card-body">
              <h4 class="card-text text-left"><span class="font-weight-bold">NIM Mahasiswa : </span><?= cetak($data['nim_mhs']); ?></h4>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Mahasiswa : </span><?= cetak($data['nama']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Fakultas : </span><?= cetak($data['nama_fakultas']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= cetak($data['nama_jurusan']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik : </span><?= cetak($data['nama_tahun_akademik']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Status : </span><?= cetak($data['status']); ?></h6>
              <?php if ($this->session->userdata('id_role') != "2"): ?>
                <span style="float: right;">
                  <a href="<?= base_url(); ?>Nilai" class="btn btn-info"> Kembali </a>
                </span>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
       <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4"): ?>
       <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>Nilai/tambah/<?= encrypt_url($data['nim_mhs']); ?>" class=" btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
      </div>
    <?php endif ?>
    <?php if ($this->session->userdata('id_role') == "3"): ?>
      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>Nilai/tmbltambah/<?= encrypt_url($data['nim_mhs']); ?>" class=" btn btn-block btn-dark bg-info"><b>+ Tambah Nilai</b></a>
      </div>
    <?php endif ?>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Dosen</th>
            <th>Mata Kuliah</th>
            <th>Presensi</th>
            <th>Tugas</th>
            <th>UTS</th>
            <th>UAS</th>
            <th>Total Nilai</th>
            <th>Nilai Akhir</th>
            <th>Predikat</th>
            <th>Status</th>
            <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") { ?>
              <th>Aksi</th>
            <?php } ?>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($nilai as $nl) : ?>
            <td><?= $no; ?></td>
            <td><?= cetak($nl->nama_dosen); ?></td>
            <td><?= cetak($nl->nama_matkul); ?></td>
            <td><?= cetak($nl->nilai_presensi); ?></td>
            <td><?= cetak($nl->nilai_tugas); ?></td>
            <td><?= cetak($nl->nilai_uts); ?></td>
            <td><?= cetak($nl->nilai_uas); ?></td>
            <td><?= cetak($nl->total_nilai); ?></td>
            <td><?= cetak($nl->nilai_akhir); ?></td>
            <td><?= cetak($nl->grade); ?></td>
            <td><?= cetak($nl->status); ?></td>
            <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") { ?>
              <td>
                <a href="<?= base_url(); ?>Nilai/ubah/<?= encrypt_url($nl->id_nilai); ?>"><button type="button" class="btn btn-success btn-circle"><i class="fas fa-fw fa-check-circle"></i></button></a> <b>|</b>
                <a href="<?= base_url(); ?>Nilai/hapus/<?= encrypt_url($nl->id_nilai); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
              </td>
            <?php } ?>
          </tbody>
          <?php $no++ ?>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
</div>
</div>