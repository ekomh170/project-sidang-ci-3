<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Jurusan/tambah'); ?>
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="form-group">
        <label for="nama_jurusan"><b>Nama Jurusan :</b></label>
        <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Masukan Nama" value="<?= set_value('nama_jurusan'); ?>">
        <small class="form-text text-danger"><b><u><?= form_error('nama_jurusan') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="id_fakultas"><b>Nama Fakultas :</b></label>
        <select class="form-control" id="id_fakultas" name="id_fakultas">
          <option value="">--Pilih Fakultas--</option>
          <?php foreach ($fakultas as $value) { ?>
            <?php if ($value->status == "Aktif") { ?>
              <option value="<?= $value->id_fakultas ?>"><?= $value->nama_fakultas ?></option>
          <?php }
          } ?>
        </select>
        <small class="form-text text-danger"><b><u><?= form_error('id_fakultas') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="id_jenjang_pendidikan"><b>Jenjang Pendidikan :</b></label>
        <select class="form-control" id="id_jenjang_pendidikan" name="id_jenjang_pendidikan">
          <option value="">--Pilih Jenjang Pendidikan--</option>
          <?php foreach ($jenjang_pendidikan as $value) { ?>
            <?php if ($value->status == "Aktif") { ?>
              <option value="<?= $value->id_jenjang_pendidikan ?>"><?= $value->nama_lengkap_jp ?></option>
          <?php }
          } ?>
        </select>
        <small class="form-text text-danger"><b><u><?= form_error('id_jenjang_pendidikan') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="penjelasan"><b>Isi Penjelasan :</b></label>
        <textarea class="form-control" id="penjelasan" name="penjelasan" placeholder="Masukan Isi Penjelasan" rows="3"><?= set_value('penjelasan'); ?></textarea>
        <small class="form-text text-danger"><b><u><?= form_error('penjelasan') ?></u></b></small>
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
      <span style="float: right">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Jurusan'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>