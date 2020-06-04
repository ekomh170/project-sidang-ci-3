<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_nilai" value="<?= $data['id_nilai']; ?>" required>
        <div class="form-group">
          <label for="nim_mhs"><b>Nim Mahasiswa :</b></label>
          <input type="text" class="form-control" id="nim_mhs" name="nim_mhs" placeholder="Masukan Nim Mahasiswa" value="<?= $data['nim_mhs']; ?>" readonly>
          <small class="form-text text-danger"><b><u><?= form_error('nim_mhs') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nama"><b>Nama Mahasiswa :</b></label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Mahasiswa" value="<?= $data['nama']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="id_krs"><b>Nama Dosen : </b></label>
          <select class="form-control" id="id_krs" name="id_krs">
            <option value="">--Pilih Dosen--</option>
            <?php foreach ($dosen as $dosen) { ?>
              <?php if ($dosen->status == "Aktif") { ?>
                <option value="<?= $dosen->id_krs ?>"><?= $dosen->nama_dosen ?></option>
            <?php }
            } ?>
          </select>
          <small class="form-text text-danger"><b><u><?= form_error('id_dosen') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nilai_presensi"><b>Nilai Presensi :</b></label>
          <input type="text" class="form-control" id="nilai_presensi" name="nilai_presensi" placeholder="Masukan Nilai Presensi" value="<?= $data['nilai_presensi'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nilai_presensi') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nilai_tugas"><b>Nilai Tugas :</b></label>
          <input type="text" class="form-control" id="nilai_tugas" name="nilai_tugas" placeholder="Masukan Nilai Tugas" value="<?= $data['nilai_tugas'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nilai_tugas') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nilai_uts"><b>Nilai Uts:</b></label>
          <input type="text" class="form-control" id="nilai_uts" name="nilai_uts" placeholder="Masukan Nilai UTS" value="<?= $data['nilai_uts'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nilai_uts') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nilai_uas"><b>Nilai Uas :</b></label>
          <input type="text" class="form-control" id="nilai_uas" name="nilai_uas" placeholder="Masukan Nilai UAS" value="<?= $data['nilai_uas'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nilai_uas') ?></u></b></small>
        </div>
        <?php if ($this->session->userdata('id_role') == "1") { ?>
          <div class="form-group">
            <label for="status"><b>Status :</b></label>
            <select class="form-control" id="status" name="status">
              <option value="">--Pilih Status--</option>
              <option value="Aktif">Aktif</option>
              <option value="Tidak Aktif">Tidak Aktif</option>
            </select>
          </div>
        <?php } ?>
        <span style="float: left;">
          <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
        </span>
      </form>
      <span style="float: right;">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Nilai/detail/') . encrypt_url($data['nim_mhs']); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>