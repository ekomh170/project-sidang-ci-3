<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('TranskripNilai/tambah'); ?>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="nim_mhs"><b>Nama Mahasiswa : </b></label>
        <select class="form-control" id="nim_mhs" name="nim_mhs">
          <option value="">--Pilih Mahasiswa--</option>
          <?php foreach ($mahasiswa as $value) { ?>
            <?php if ($value->status == "Aktif") { ?>
              <option value="<?= $value->nim_mhs ?>"><?= $value->nama ?></option>
          <?php }
          } ?>
        </select>
        <small class="form-text text-danger"><b><u><?= form_error('nim_mhs') ?></u></b></small>
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
      <?= form_close(); ?>
      <span style="float: right;">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('TranskripNilai'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>