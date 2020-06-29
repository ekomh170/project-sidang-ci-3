<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_ipk" value="<?= $data['id_ipk']; ?>" required>
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
          <label for="sks_total"><b>Total Sks :</b></label>
          <input type="text" class="form-control" id="sks_total" name="sks_total" placeholder="Masukan Total SKS" value="<?= $data['sks_total'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('sks_total') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="bobot_total"><b>Total Bobot :</b></label>
          <input type="text" class="form-control" id="bobot_total" name="bobot_total" placeholder="Masukan Total Bobot" value="<?= $data['bobot_total'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('bobot_total') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nilai_total_sks"><b>Total Nilai SKS:</b></label>
          <input type="text" class="form-control" id="nilai_total_sks" name="nilai_total_sks" placeholder="Masukan Total Nilai SKS" value="<?= $data['nilai_total_sks'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('nilai_total_sks') ?></u></b></small>
        </div>
        <div class="form-group">
          <label for="ipk"><b>Nilai IPK</b></label>
          <input type="text" class="form-control" id="ipk" name="ipk" placeholder="Masukan Nilai IPK" value="<?= $data['ipk'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('ipk') ?></u></b></small>
        </div>
        <span style="float: left;">
          <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
        </span>
      </form>
      <span style="float: right">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Ipk'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>