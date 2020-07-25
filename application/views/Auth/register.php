<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <img src="<?= base_url('assets/img/logo3.png') ?>" class="img-responsive center-block mb-2 rounded-circle" width="150" height="150" alt="logo">
              <h4 class="text-gray-900 mb-4 font-weight-bold"><?= $judul; ?></h4>
            </div>
            <form class="user" method="post" action="<?= base_url('Auth/register') ?>">
              <div class="form-group">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                <?= form_error('nama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama_panggilan" name="nama_panggilan" placeholder="Nama Panggilan" value="<?= set_value('nama_panggilan'); ?>">
                <?= form_error('nama_panggilan', '<small class="form-text text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
              </div>
              <div class="form-group">
                <select class="form-control form-control" id="id_role" name="id_role" placeholder="Pilih Role">
                  <option value="">--Pilih Role Akses--</option>
                  <?php foreach ($role as $value) { ?>
                    <option value="<?= $value->id ?>"><?= $value->role ?></option>
                  <?php } ?>
                  <?= form_error('id_role', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                </select>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                  <?= form_error('password1', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Konfirmasi Password">
                  <?= form_error('password2', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-info btn-user btn-block">
                Buat Akun
              </button>
            </form>
            <hr>
            <button onclick="backpageror()" class="btn btn-danger btn-user btn-block">Kembali</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>