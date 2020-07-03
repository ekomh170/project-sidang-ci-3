<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?=$judul;?></h1>
  <div class="card">
    <div class="card-body">
      <?=form_open_multipart('Dosen/tambah');?>
      <div class="form-group">
        <label for="nama_dosen" class="font-weight-bold">Nama Dosen :</label>
        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" placeholder="Masukan Nama Dosen">
        <small class="form-text text-danger"><b><u><?=form_error('nama_dosen')?></u></b></small>
      </div>
      <div class="form-group">
        <label for="nama_panggilan" class="font-weight-bold">Nama Panggilan :</label>
        <input type="text" class="form-control" id="nama_panggilan" name="nama_panggilan" placeholder="Masukan Nama Panggilan">
        <small class="form-text text-danger"><b><u><?=form_error('nama_panggilan')?></u></b></small>
      </div>
      <div class="form-group">
        <label for="id_matkul" class="font-weight-bold">Mata Kuliah :</label>
        <select class="form-control" id="id_matkul" name="id_matkul">
          <option value="">--Pilih Mata Kuliah--</option>
          <?php foreach ($tb_matkul as $value) {
	?>
            <?php if ($value->status == "Aktif") {?>
              <option value="<?=$value->id_matkul?>"><?=$value->nama_matkul?></option>
          <?php }
}?>
        </select>
        <small class="form-text text-danger"><b><u><?=form_error('id_matkul')?></u></b></small>
      </div>
      <div class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 font-weight-bold">Jenis Kelamin :</legend>
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
          <small class="form-text text-danger"><b><u><?=form_error('jenis_kelamin')?></u></b></small>
        </div>
      </div>
      <div class="form-group">
        <label for="agama" class="font-weight-bold">Agama :</label>
        <select class="form-control" id="agama" name="agama">
          <option value="">--Pilih Agama--</option>
          <option value="Islam">Islam</option>
          <option value="Kristen">Kristen</option>
          <option value="Katolik">Katolik</option>
          <option value="Hindu">Hindu</option>
          <option value="Buddha">Buddha</option>
          <option value="Konghucu">Konghucu</option>
        </select>
        <small class="form-text text-danger"><b><u><?=form_error('agama')?></u></b></small>
      </div>
      <div class="form-group">
        <label for="tmpt_lahir" class="font-weight-bold">Tempat Lahir :</label>
        <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" placeholder="Masukan Tempat Lahir">
        <small class="form-text text-danger"><b><u><?=form_error('tmpt_lahir')?></u></b></small>
      </div>
      <div class="form-group">
        <label for="tanggal_lahir" class="font-weight-bold">Tanggal Lahir :</label>
        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Masukan Tanggal Lahir">
        <small class="form-text text-danger"><b><u><?=form_error('tanggal_lahir')?></u></b></small>
      </div>
      <div class="form-group">
        <label for="no_telp" class="font-weight-bold">Nomer Telpon :</label>
        <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telpon">
        <small class="form-text text-danger"><b><u><?=form_error('no_telp')?></u></b></small>
      </div>
      <div class="form-group">
        <label for="alamat" class="font-weight-bold">Alamat :</label>
        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
        <small class="form-text text-danger"><b><u><?=form_error('alamat')?></u></b></small>
      </div>
      <p class="font-weight-bold">Upload Foto :</p>
      <div class="custom-file mb-4">
        <input type="file" name="image" class="mb-2">
        <small class="form-text text-dark"><u>Note : Jika Tidak Ingin Menambahkan gambar akan dicarikan gambar default/acak</u></small>
      </div>
      <span style="float: left; margin-top: 10px;">
        <button type="submit" name="tambah" value="tambah" class="btn btn-success">Tambah</button>
      </span>
      <?=form_close();?>
      <span style="float: right; margin-top: 10px;">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?=base_url('Dosen');?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>