<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
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
          <label for="id_dosen"><b>Nama Dosen / Mata Kuliah :</b></label>
          <select class="form-control" id="id_dosen" name="id_dosen">
            <option value="">--Pilih Dosen / Mata Kuliah--</option>
            <?php foreach ($dosen as $dosen) { ?>
              <?php if ($dosen->status == "Aktif") { ?>
                <option value="<?= $dosen->id_dosen ?>"><?= $dosen->nama_dosen ?> / <?= $dosen->nama_matkul ?></option>
            <?php }
            } ?>
          </select>
          <small class="form-text text-danger"><b><u><?= form_error('id_dosen') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="status"><b>Status :</b></label>
          <select class="form-control" id="status" name="status">
            <option value="">--Pilih Status--</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
          <small class="form-text text-danger"><b><u><?= form_error('status') ?></u></b></small>
        </div>
        <span style="float: left;">
          <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
        </span>
      </form>
      <span style="float: right;">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('KrsDetail/detail/') . encrypt_url($data['nim_mhs']); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>