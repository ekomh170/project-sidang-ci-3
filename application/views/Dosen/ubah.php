<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id_dosen" value="<?= $tb_dosen['id_dosen']; ?>" required>
        <div class="form-group">
          <label for="nama_dosen"><b>Nama Dosen :</b></label>
          <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Masukan Nama Dosen" value="<?= $tb_dosen['nama_dosen'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nama_dosen') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nama_panggilan"><b>Nama Panggilan :</b></label>
          <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" value="<?= $tb_dosen['nama_panggilan'] ?>" placeholder="Masukan Nama Panggilan">
          <small class="form-text text-danger"><b><u><?= form_error('nama_panggilan') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="id_matkul"><b>Mata Kuliah :</b></label>
          <select class="form-control" id="id_matkul" name="id_matkul">
            <option value="">--Pilih Mata Kuliah--</option>
            <?php if ($inputSelect['id_matkul']) { ?>
              <option selected value="<?= $inputSelect['id_matkul'] ?>"><?= $inputSelect['nama_matkul'] ?> / <?= $inputSelect['nama_jurusan'] ?></option>
            <?php } ?>
            <?php foreach ($tb_matkul as $value) { ?>
              <?php if ($value->id_matkul != $inputSelect['id_matkul']) { ?>
                <?php if ($value->status == "Aktif") { ?>
                  <option value="<?= $value->id_matkul ?>"><?= $value->nama_matkul ?> / <?=$value->nama_jurusan?></option>
                <?php } } } ?>
              </select>
              <small class="form-text text-danger"><b><u><?= form_error('id_matkul') ?></u></b></small>
            </div>
            <div class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0"><b>Jenis Kelamin :</b></legend>
              </div>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-Laki" checked>
                  <label class="form-check-label" for="jenis_kelamin">
                    Laki - Laki
                  </label>
                </div>
              </div>
              <div class="form-check">
                <div class="col-sm-10">
                  <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                  <label class="form-check-label" for="jenis_kelamin">
                    Perempuan
                  </label>
                </div>
                <small class="form-text text-danger"><b><u><?= form_error('jenis_kelamin') ?></u></b></small>
              </div>
            </div>
            <div class="form-group">
              <label for="agama"><b>Agama :</b></label>
              <select class="form-control" id="agama" name="agama">
                <option value="">--Pilih Agama--</option>
                <?php if ($inputSelect['agama']) { ?>
                  <option selected value="<?= $inputSelect['agama'] ?>"><?= $inputSelect['agama'] ?></option>
                <?php } ?>
                <?php foreach ($inputSelectAgama as $agama => $data) { ?>
                  <?php if ($data != $inputSelect['agama']) { ?>
                    <option value="<?= $data ?>"><?= $data ?></option>
                  <?php } } ?>
                </select>
                <small class="form-text text-danger"><b><u><?= form_error('agama') ?></u></b></small>
              </div>
              <div class="form-group">
                <label for="tmpt_lahir"><b>Tempat Lahir :</b></label>
                <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="<?= $tb_dosen['tmpt_lahir'] ?>" placeholder="Masukan Tempat Lahir">
                <small class="form-text text-danger"><b><u><?= form_error('tmpt_lahir') ?></u></b></small>
              </div>
              <div class="form-group">
                <label for="tanggal_lahir"><b>Tanggal Lahir :</b></label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?= $tb_dosen['tanggal_lahir'] ?>" placeholder="Masukan Tanggal Lahir">
                <small class="form-text text-danger"><b><u><?= form_error('tanggal_lahir') ?></u></b></small>
              </div>
              <div class="form-group">
                <label for="no_telp"><b>No Telpon :</b></label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?= $tb_dosen['no_telp'] ?>" placeholder="Masukan Nomer Telpon">
                <small class="form-text text-danger"><b><u><?= form_error('no_telp') ?></u></b></small>
              </div>
              <div class="form-group">
                <label for="alamat"><b>Alamat :</b></label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $tb_dosen['alamat'] ?>" placeholder="Masukan Alamat">
                <small class="form-text text-danger"><b><u><?= form_error('alamat') ?></u></b></small>
              </div>
              <b>
                <p>Upload Foto :</p>
              </b>
              <div class="col-sm-2">
                <img src="<?= base_url('assets/foto/users/') . $tb_dosen['image'] ?>" class="img-thumbnail img-profile rounded-circle">
              </div>
              <div class="col-mb-2">
                <div class="custom-file mb-2">
                  <input type="file" name="image" class="mb-2">
                  <small class="form-text text-dark"><u>Note : Jika Tidak Ingin Mengubah Gambar Kosong Kan Saja Form Upload Foto</u></small>
                </div>
              </div>
              <div class="mb-3"></div>
              <span style="float: left;">
                <button type="submit" name="edit" value="edit" class="btn btn-success">Ubah</button>
              </span>
            </form>
            <span style="float: right">
              <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Dosen'); ?>">Kembali</a></button>
            </span>
          </div>
        </div>
      </div>