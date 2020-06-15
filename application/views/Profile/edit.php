<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800"><b><?= $judul; ?></b></h1>
  <div class="row">
    <div class="col-lg-8">
      <?= form_open_multipart('Profile/edit'); ?>
      <div class="form-group row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
        <div class="col-sm-10">
          <input type="nama" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="nama_panggilan" class="col-sm-2 col-form-label">Nama Panggilan</label>
        <div class="col-sm-10">
          <input type="nama" class="form-control" id="nama_panggilan" name="nama_panggilan" value="<?= $user['nama_panggilan']; ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nama_panggilan') ?></u></b></small>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2">Foto</div>
        <div class="col-sm-10">
          <div class="row">
            <div class="col-sm-3">
              <img src="<?= base_url('assets/foto/users/') . $user['image']; ?>" class="img-thumbnail img-profile rounded-circle">
            </div>
            <div class="col-sm-9">
              <div class="custom-file">
                <input type="file" src="<?= base_url('assets/foto/users/') . $user['image']; ?>" id="image" name="image" required>
              </div>
            </div>
            <div class="form-group row justify-content-end">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-info">Ubah</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>