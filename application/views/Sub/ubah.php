<div class="container mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
  <div class="card">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $user_sub_menu['id']; ?>">
        <div class="form-group">
          <label for="id_menu"><b>Nama Menu :</b></label>
          <select class="form-control" id="id_menu" name="id_menu">
            <option value="">--Pilih Menu--</option>
            <?php  if ($inputSelect['id']) { ?>
              <option selected value="<?= $inputSelect['id']?>"><?= $inputSelect['menu']?></option>
            <?php } ?>
            <?php foreach ($menu as $value) { ?>
              <?php if ($value->menu != $inputSelect['menu']) { ?>
                <option value="<?= $value->id ?>"><?= $value->menu ?></option>
              <?php } } ?>
            </select>
            <small class="form-text text-danger"><b><u><?= form_error('id_menu') ?></u></b></small>
          </div>
          <div class="form-group">
            <label for="title"><b>Nama Sub :</b></label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $user_sub_menu['title'] ?>" placeholder="Masukan Nama Sub">
            <small class="form-text text-danger"><b><u><?= form_error('title') ?></u></b></small>
          </div>
          <div class="form-group">
            <label for="url"><b>URL :</b></label>
            <input type="text" class="form-control" id="url" name="url" value="<?= $user_sub_menu['url'] ?>" placeholder="Masukan Judul">
            <small class="form-text text-danger"><b><u><?= form_error('url') ?></u></b></small>
          </div>
          <div class="form-group">
            <label for="icon"><b>Icon/Lambang :</b></label>
            <input type="text" class="form-control" id="icon" name="icon" value="<?= $user_sub_menu['icon'] ?>" placeholder="Masukan Nomer Icon/Lambang">
            <small class="form-text text-danger"><b><u><?= form_error('icon') ?></u></b></small>
          </div>
          <div class="form-group">
            <label for="status"><b>Status : </b></label>
            <select class="form-control" id="status" name="status">
              <option value="">--Pilih Status--</option>
              <?php if ($user_sub_menu['status']) { ?>
                <option selected value="<?= $user_sub_menu['status']?>"><?= $user_sub_menu['status']?></option>
              <?php } ?>
              <?php foreach ($inputSelectStatus as $status => $data) { ?>
                <?php if ($data != $user_sub_menu['status']) { ?>
                  <option value="<?= $data ?>"><?= $data ?></option>
                <?php } } ?>
              </select>
              <small class="form-text text-danger"><b><u><?= form_error('status') ?></u></b></small>
            </div>
            <div class="form-group">
              <label for="keterangan"><b>Keterangan :</b></label>
              <textarea class="form-control" aria-label="With textarea" id="keterangan" name="keterangan" placeholder="Masukan Keterangan"><?= $user_sub_menu['keterangan']?></textarea>
              <small class="form-text text-danger"><b><u><?= form_error('keterangan') ?></u></b></small>
            </div>
            <span style="float: left;">
              <button type="submit" name="ubah" value="ubah" class="btn btn-success">Ubah</button>
            </span>
          </form>
          <span style="float: right;">
            <button type="submit" class="btn btn-success text-white"><a style="text-decoration: none; color: white;" href="<?= base_url('Sub/index'); ?>">Kembali</a></button>
          </span>
        </div>
      </div>
    </div>