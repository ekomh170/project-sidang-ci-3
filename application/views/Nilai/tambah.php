<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><b><?= $judul; ?></b></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nim_mhs"><b>Nim Mahasiswa :</b></label>
          <input type="text" class="form-control" id="nim_mhs" name="nim_mhs" placeholder="Masukan Nim Mahasiswa" value="<?= $data['nim_mhs']; ?>" readonly>
          <small class="form-text text-danger"><b><u><?= form_error('nim_mhs') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nama"><b>Nama Mahasiswa :</b></label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama Mahasiswa" value="<?= $data['nama']; ?>" readonly>
        </div>
        <div class="form-group">
          <label for="id_krs"><b>Nama Dosen : </b></label>
          <select class="form-control" id="id_krs" name="id_krs">
            <option value="">--Pilih Dosen--</option>
            <?php foreach ($dosen as $value) { ?>
              <?php if ($value->status == "Aktif") { ?>
                <option value="<?= $value->id_krs ?>"><?= $value->nama_dosen ?></option>
            <?php }
            } ?>
          </select>
          <small class="form-text text-danger"><b><u><?= form_error('id_krs') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="status"><b>Status :</b></label>
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
      </form>
      <span style="float: right;">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Nilai/detail/') . encrypt_url($data['nim_mhs']); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>