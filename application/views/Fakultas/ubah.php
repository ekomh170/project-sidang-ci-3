<div class="container">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_fakultas" value="<?= $tb_fakultas['id_fakultas']; ?>" required>
        <div class="form-group">
          <label for="nama_fakultas"><b>Nama Fakultas :</b></label>
          <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" placeholder="Masukan Nama Fakultas" value="<?= $tb_fakultas['nama_fakultas'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nama_fakultas') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="keterangan"><b>Keterangan :</b></label>
          <textarea class="form-control" aria-label="With textarea" id="keterangan" name="keterangan" placeholder="Masukan Keterangan"><?= $tb_fakultas['keterangan'] ?></textarea>
          <small class="form-text text-danger"><b><u><?= form_error('keterangan') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="status"><b>Status:</b></label>
          <select class="form-control" id="status" name="status">
            <option value="">--Pilih Status--</option>
            <?php if ($tb_fakultas['status']) { ?>
              <option selected value="<?= $tb_fakultas['status']?>"><?= $tb_fakultas['status']?></option>
            <?php } ?>
            <?php foreach ($inputSelectStatus as $status => $data) { ?>
              <?php if ($data != $tb_fakultas['status']) { ?>
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
          <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Fakultas/index'); ?>">Kembali</a></button>
        </span>
      </div>
    </div>
  </div>