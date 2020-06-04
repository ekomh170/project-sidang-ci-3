<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user_menu['id']; ?>">
        <div class="form-group">
          <label for="menu"><b>Nama Menu :</b></label>
          <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukan Nama Menu" value="<?= $user_menu['menu'] ?>">
          <small class="form-text text-danger"><b><u><?= form_error('menu') ?></u></b></small>
        </div>
        <span style="float: left;">
          <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
        </span>
      </form>
      <span style="float: right;">
        <button type="submit" class="btn btn-success"><a style="text-decoration: none; color: white;" href="<?= base_url('Menu/index'); ?>">Kembali</a></button>
      </span>
    </div>
  </div>
</div>