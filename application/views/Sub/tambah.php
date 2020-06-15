<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('Sub/tambah'); ?>
      <div class="form-group">
        <label for="id_menu"><b>Nama Menu :</b></label>
        <select class="form-control" id="id_menu" name="id_menu">
          <option value="">--Pilih Menu--</option>
          <?php foreach ($menu as $value) { ?>
            <option value="<?= $value->id ?>"><?= $value->menu ?></option>
          <?php } ?>
        </select>
        <small class="form-text text-danger"><b><u><?= form_error('id_menu') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="title"><b>Nama Sub :</b></label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Nama Sub">
        <small class="form-text text-danger"><b><u><?= form_error('title') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="url"><b>URL :</b></label>
        <input type="text" class="form-control" id="url" name="url" placeholder="Masukan URL">
        <small class="form-text text-danger"><b><u><?= form_error('url') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="icon"><b>Icon/Lambang :</b></label>
        <input type="text" class="form-control" id="icon" name="icon" placeholder="Masukan Nama Icon/Lambang">
        <small class="form-text text-danger"><b><u><?= form_error('icon') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="keterangan"><b>Keterangan :</b></label>
        <textarea class="form-control" aria-label="With textarea" id="keterangan" name="keterangan" placeholder="Masukan Keterangan"></textarea>
        <small class="form-text text-danger"><b><u><?= form_error('keterangan') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="status"><b>Status : </b></label>
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
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Sub/index'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>