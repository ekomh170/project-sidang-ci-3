<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <?= form_open_multipart('matkul/tambah'); ?>
      <div class="form-group">
        <label for="nama_matkul"><b>Nama matkul :</b></label>
        <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Masukan Nama Mata Kuliah">
        <small class="form-text text-danger"><b><u><?= form_error('nama_matkul') ?></u></b></small>
      </div>
      <div class="form-group">
        <label for="id_jurusan"><b>Jurusan : </b></label>
        <select class="form-control" id="id_jurusan" name="id_jurusan">
          <option value="">--Pilih Jurusan--</option>
          <?php foreach ($jurusan as $value) { ?>
            <?php if ($value->status == "Aktif") { ?>
              <option value="<?= $value->id_jurusan ?>"><?= $value->nama_jurusan ?></option>
          <?php }
          } ?>
        </select>
        <small class="form-text text-danger"><b><u><?= form_error('id_jurusan') ?></u></b></small>
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
      <span style="float: right">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Matkul'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>