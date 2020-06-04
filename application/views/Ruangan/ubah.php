<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_ruangan" value="<?= $ruangan['id_ruangan']; ?>" required>
        <div class="form-group">
          <label for="nama_ruangan"><b>Nama Ruangan :</b></label>
          <input type="text" class="form-control" id="nama_ruangan" name="nama_ruangan" placeholder="Masukan Nama" value="<?= $ruangan['nama_ruangan']; ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nama_ruangan') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="id_jenis_ruangan"><b>Jenis Ruangan :</b></label>
          <select class="form-control" id="id_jenis_ruangan" name="id_jenis_ruangan">
            <option value="">--Pilih Ruangan--</option>
            <?php foreach ($jenis_ruangan as $value) { ?>
              <?php if ($value->status == "AKTIF") { ?>
                <option value="<?= $value->id_jenis_ruangan ?>"><?= $value->nama_jr ?></option>
            <?php }
            } ?>
          </select>
          <small class="form-text text-danger"><b><u><?= form_error('id_jenis_ruangan') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="lantai"><b>Lantai :</b></label>
          <input type="text" class="form-control" id="lantai" name="lantai" placeholder="Masukan Lokasi Lantai" value="<?= $ruangan['lantai']; ?>">
          <small class="form-text text-danger"><b><u><?= form_error('lantai') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="kapasitas"><b>Kapasitas :</b></label>
          <input type="text" class="form-control" id="kapasitas" name="kapasitas" placeholder="Masukan Berapa Jumlah Kapasitas" value="<?= $ruangan['kapasitas']; ?>">
          <small class="form-text text-danger"><b><u><?= form_error('kapasitas') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="keterangan"><b>Keterangan :</b></label>
          <textarea class="form-control" aria-label="With textarea" id="keterangan" name="keterangan" placeholder="Masukan Keterangan"><?= $ruangan['keterangan'] ?></textarea>
          <small class="form-text text-danger"><b><u><?= form_error('keterangan') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="id_jenis_ruangan"><b>Status :</b></label>
          <select class="form-control" id="status" name="status">
            <option value="">--Pilih Status--</option>
            <option value="Aktif">Aktif</option>
            <option value="Tidak Aktif">Tidak Aktif</option>
          </select>
          <small class="form-text text-danger"><b><u><?= form_error('status') ?></u></b></small>
        </div>
        <br><br>
        <span style="float: left;">
          <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
        </span>
      </form>
      <span style="float: right">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Ruangan/index'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>