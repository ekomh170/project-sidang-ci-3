<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_matkul" value="<?= $tb_matkul['id_matkul']; ?>">
        <div class="form-group">
          <label for="nama_matkul"><b>Nama matkul : </b></label>
          <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" placeholder="Masukan Nama" value="<?= $tb_matkul['nama_matkul'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nama_matkul') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="id_jurusan"><b>Jurusan : </b></label>
          <select class="form-control" id="id_jurusan" name="id_jurusan">
            <option value="">--Pilih Jurusan--</option>
            <?php if ($inputSelect['id_jurusan']) { ?>
              <option selected value="<?= $inputSelect['id_jurusan'] ?>"><?= $inputSelect['nama_jurusan'] ?></option>
            <?php } ?>
            <?php foreach ($jurusan as $value) { ?>
              <?php if ($value->id_jurusan != $inputSelect['id_jurusan']) { ?>
                <?php if ($value->status == "Aktif") { ?>
                  <option value="<?= $value->id_jurusan ?>"><?= $value->nama_jurusan ?></option>
                <?php } } } ?>
              </select>
              <small class="form-text text-danger"><b><u><?= form_error('id_jurusan') ?></u></b></small>
            </div>
            <div class="form-group">
              <label for="status"><b>Status : </b></label>
              <select class="form-control" id="status" name="status" value="<?= $tb_matkul['status'] ?>">
                <option value="">--Pilih Status--</option>
                <?php if ($tb_matkul['status']) { ?>
                  <option selected value="<?= $tb_matkul['status'] ?>"><?= $tb_matkul['status'] ?></option>
                <?php } ?>
                <?php foreach ($inputSelectStatus as $status => $data) { ?>
                  <?php if ($data != $tb_matkul['status']) { ?>
                    <option value="<?= $data ?>"><?= $data ?></option>
                  <?php } } ?>
                </select>
                <small class="form-text text-danger"><b><u><?= form_error('status') ?></u></b></small>
              </div>
              <span style="float: left;">
                <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
              </span>
            </form>
            <span style="float: right;">
              <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('matkul/index'); ?>">Kembali</a></button>
            </span>
          </div>
        </div>
      </div>