<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?=$judul;?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
        <input type="hidden" name="nim_mhs" value="<?=$mahasiswa['nim_mhs'];?>" required>
        <div class="form-group">
          <label for="nama"><b>Nama :</b></label>
          <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama" value="<?=$mahasiswa['nama']?>">
          <small class="form-text text-danger"><b><u><?=form_error('nama')?></u></b></small>
        </div>
        <div class="form-group">
          <label for="nama_panggilan"><b>Nama Panggilan :</b></label>
          <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="Masukan Nama Panggilan/Pendek" value="<?=$mahasiswa['nama_panggilan']?>">
          <small class="form-text text-danger"><b><u><?=form_error('nama_panggilan')?></u></b></small>
        </div>
        <div class="form-group">
          <label for="Kelas"><b>Jurusan :</b></label>
          <select class="form-control" id="id_jurusan" name="id_jurusan">
            <option value="">--Pilih Jurusan--</option>
            <?php if ($inputSelect['id_jurusan']) {?>
              <option selected value="<?=$inputSelect['id_jurusan']?>"><?=$inputSelect['nama_jurusan']?></option>
            <?php }?>
            <?php foreach ($jurusan as $value) {?>
              <?php if ($value->id_jurusan != $inputSelect['id_jurusan']) {?>
                <?php if ($value->status == "Aktif") {?>
                  <option value="<?=$value->id_jurusan?>"><?=$value->nama_jurusan?></option>
                <?php }}}?>
              </select>
              <small class="form-text text-danger"><b><u><?=form_error('id_jurusan')?></u></b></small>
            </div>
            <div class="form-group">
              <label for="id_kelas"><b>Kelas :</b></label>
              <select class="form-control" id="id_kelas" name="id_kelas">
                <option value="">--Pilih Kelas--</option>
                <?php if ($inputSelect['id_kelas']) {?>
                  <option selected value="<?=$inputSelect['id_kelas']?>"><?=$inputSelect['nama_kelas']?></option>
                <?php }?>
                <?php foreach ($kelas as $value) {?>
                  <?php if ($value->id_kelas != $inputSelect['id_kelas']) {?>
                    <?php if ($value->status == "Aktif") {?>
                      <option value="<?=$value->id_kelas?>"><?=$value->nama_kelas?></option>
                    <?php }}}?>
                  </select>
                  <small class="form-text text-danger"><b><u><?=form_error('id_jurusan')?></u></b></small>
                </div>
                <div class="form-group">
                  <label for="id_tahun_akademik"><b>Tahun Akademik :</b></label>
                  <select class="form-control" id="id_tahun_akademik" name="id_tahun_akademik">
                    <option value="">--Pilih Tahun Akademik--</option>
                    <?php if ($inputSelect['id_tahun_akademik']) {?>
                      <option selected value="<?=$inputSelect['id_tahun_akademik']?>"><?=$inputSelect['nama_tahun_akademik']?></option>
                    <?php }?>
                    <?php foreach ($tahun_akademik as $value) {?>
                      <?php if ($value->id_tahun_akademik != $inputSelect['id_tahun_akademik']) {?>
                        <?php if ($value->status == "Aktif") {?>
                          <option value="<?=$value->id_tahun_akademik?>"><?=$value->nama_tahun_akademik?></option>
                        <?php }}}?>
                      </select>
                      <small class="form-text text-danger"><b><u><?=form_error('id_jurusan')?></u></b></small>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin :</legend>
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
                      </div>
                      <small class="form-text text-danger"><b><u><?=form_error('jenis_kelamin')?></u></b></small>
                    </div>
                    <div class="form-group">
                      <label for="agama"><b>Agama :</b></label>
                      <select class="form-control" id="agama" name="agama">
                        <option value="">--Pilih Agama--</option>
                        <option selected value="<?=$inputSelect['agama']?>"><?=$inputSelect['agama']?></option>
                        <?php foreach ($inputSelectAgama as $agama => $data) {?>
                          <?php if ($data != $inputSelect['agama']) {?>
                            <option value="<?="$data"?>"><?=$data?></option>
                          <?php }}?>
                        </select>
                        <small class="form-text text-danger"><b><u><?=form_error('agama')?></u></b></small>
                      </div>
                      <div class="form-group">
                        <label for="tmpt_lahir"><b>Tempat Lahir : </b></label>
                        <input type="tmpt_lahir" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Masukan Nilai tmpt_lahir" value="<?=$mahasiswa['tmpt_lahir']?>">
                        <small class="form-text text-danger"><b><u><?=form_error('tmpt_lahir')?></u></b></small>
                      </div>
                      <div class="form-group">
                        <label for="tanggal_lahir"><b>Tanggal Lahir :</b></label>
                        <input type="date" min="1000-01-01" max="2004-01-01" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?=$mahasiswa['tanggal_lahir']?>">
                        <small class="form-text text-danger"><b><u><?=form_error('tanggal_lahir')?></u></b></small>
                      </div>
                      <div class="form-group">
                        <label for="alamat"><b>Alamat :</b></label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?=$mahasiswa['alamat']?>">
                        <small class="form-text text-danger"><b><u><?=form_error('alamat')?></u></b></small>
                      </div>
                      <div class="form-group">
                        <label for="no_telp"><b>Nomor Telpon :</b></label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="<?=$mahasiswa['no_telp']?>">
                        <small class="form-text text-danger"><b><u><?=form_error('no_telp')?></u></b></small>
                      </div>
                      <p><b>Upload Foto :</b></p>
                      <div class="col-sm-2">
                        <img src="<?=base_url('assets/foto/users/') . $mahasiswa['image']?>" class="img-thumbnail img-profile rounded-circle">
                      </div>
                      <div class="col-mb-2">
                        <div class="custom-file mb-2">
                          <input type="file" name="image">
                          <small class="form-text text-dark"><u>Note : Jika Tidak Ingin Mengubah Gambar Kosong Kan Saja Form Upload Foto</u></small>
                        </div>
                      </div>
                      <span style="float: left; margin-top: 10px;">
                        <button type="submit" name="edit" value="edit" class="btn btn-success">Ubah</button>
                      </span>
                    </form>
                    <span style="float: right; margin-top: 10px;">
                      <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?=base_url('Mahasiswa');?>">Kembali</a></button>
                    </span>
                  </div>
                </div>
              </div>