<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="<?= base_url('TahunAkademik/ubah/') . $TahunAkademik['id_tahun_akademik'] ?>" method="post">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="id_tahun_akademik" value="<?= $TahunAkademik['id_tahun_akademik']; ?>">
        <div class="form-group">
          <label for="nama_tahun_akademik"><b>Nama Tahun Akademik :</b></label>
          <input type="text" class="form-control" id="nama_tahun_akademik" name="nama_tahun_akademik" placeholder="Masukan Nama" value="<?= $TahunAkademik['nama_tahun_akademik']; ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nama_tahun_akademik') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="semester"><b>Semester :</b></label>
          <input type="text" class="form-control" id="semester" name="semester" placeholder="Masukan Semester" value="<?= $TahunAkademik['semester']; ?>">
          <small class="form-text text-danger"><b><u><?= form_error('semester') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="status"><b>Status :</b></label>
          <select class="form-control" id="status" name="status">
            <option value="">--Pilih Status--</option>
            <?php if ($TahunAkademik['status']) { ?>
              <option selected value="<?= $TahunAkademik['status']?>"><?= $TahunAkademik['status']?></option>
            <?php } ?>
            <?php foreach ($inputSelectStatus as $status => $data) { ?>
              <?php if ($data != $TahunAkademik['status']) { ?>
                <option value="<?= $data ?>"><?= $data ?></option>
              <?php } } ?>
            </select>
            <small class="form-text text-danger"><b><u><?= form_error('status') ?></u></b></small>
          </div>
          <span style="float: left;">
            <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
          </span>
        </form>
        <span style="float: right">
          <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('TahunAkademik'); ?>">Kembali</a></button>
        </span>
      </div>
    </div>
  </div>