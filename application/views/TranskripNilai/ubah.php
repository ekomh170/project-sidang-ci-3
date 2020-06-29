<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_transkrip_nilai" value="<?= $data['id_transkrip_nilai']; ?>" required>
        <div class="form-group">
          <label for="nim_mhs"><b>Nama Mahasiswa : </b></label>
          <select class="form-control" id="nim_mhs" name="nim_mhs">
            <option value="">--Pilih Mahasiswa--</option>
            <?php if ($inputSelect['nim_mhs']) { ?>
              <option selected value="<?= $inputSelect['nim_mhs']?>"><?= $inputSelect['nama']?></option>
            <?php } ?>
            <?php foreach ($mahasiswa as $value) { ?>
              <?php if ($value->nim_mhs != $inputSelect['nim_mhs']) { ?>
                <?php if ($value->status == "Aktif") { ?>
                  <option value="<?= $value->nim_mhs ?>"><?= $value->nama ?></option>
                <?php } } } ?>
              </select>
              <small class="form-text text-danger"><b><u><?= form_error('nim_mhs') ?></u></b></small>
            </div>
            <div class="form-group">
              <label for="status"><b>Status :</b></label>
              <select class="form-control" id="status" name="status">
                <option value="">--Pilih Status--</option>
                <?php if ($data['status']) { ?>
                  <option selected value="<?= $data['status']?>"><?= $data['status']?></option>
                <?php } ?>
                <?php foreach ($inputSelectStatus as $status => $isi) { ?>
                  <?php if ($isi != $data['status']) { ?>
                    <option value="<?= $isi ?>"><?= $isi ?></option>
                  <?php } } ?>
                </select>
                <small class="form-text text-danger"><b><u><?= form_error('status') ?></u></b></small>
              </div>
              <span style="float: left;">
                <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
              </span>
            </form>
            <span style="float: right">
              <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('TranskripNilai'); ?>">Kembali</a></button>
            </span>
          </div>
        </div>
      </div>