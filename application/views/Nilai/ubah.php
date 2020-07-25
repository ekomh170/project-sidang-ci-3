<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id_nilai" value="<?= $data['id_nilai']; ?>" required>
        <?php if ($inputSelect['id_dosen']) { ?>
          <input type="hidden" name="id_krs" value="<?= $inputSelect['id_krs']; ?>" required>
        <?php } ?>
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
          <label for="id_krs"><b>Nama Dosen \ Mata Kuliah : </b></label>
          <?php if ($inputSelect['id_dosen']) { ?>
            <input type="text" class="form-control" placeholder="Masukan Nama Dosen \ Mata Kuliah" value="<?= $inputSelect['nama_dosen']; ?>" readonly>
          <?php } ?>
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
              <?php if ($data['status']) { ?>
                <option selected value="<?= $data['status']?>"><?= $data['status']?></option>
              <?php } ?>
              <?php foreach ($inputSelectStatus as $status => $isi) { ?>
                <?php if ($isi != $data['status']) { ?>
                  <option value="<?= $isi ?>"><?= $isi ?></option>
                <?php } } ?>                
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