<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('TahunAkademik/tambah'); ?>
      <div class="form-group">
        <label for="nama_tahun_akademik"><b>Nama Tahun Akademik :</b></label>
        <input type="text" class="form-control" id="nama_tahun_akademik" name="nama_tahun_akademik" placeholder="Masukan Nama">
        <small class="form-text text-danger"><b><u><?= form_error('nama_tahun_akademik') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="semester"><b>Semester :</b></label>
        <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukan Semester">
        <small class="form-text text-danger"><b><u><?= form_error('semester') ?></u></b></small>
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
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('TahunAkademik/index'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>