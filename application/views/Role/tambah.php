<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Role/tambah'); ?>
      <div class="form-group">
        <label for="role"><b>Nama Role :</b></label>
        <input type="text" class="form-control" id="role" name="role" placeholder="Masukan Nama Role">
        <small class="form-text text-danger"><b><u><?= form_error('role') ?></u></b></small>
      </div>
      <span style="float: left;">
        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
      </span>
      <?= form_close(); ?>
      <span style="float: right;">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Role/index'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>