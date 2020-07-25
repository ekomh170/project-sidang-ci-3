<div class="container">
  <div class="row justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">>
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <img src="<?= base_url('assets/img/logo3.png') ?>" class="img-responsive center-block mb-2 rounded-circle" width="150" height="150" alt="logo">
                <h1 class="h4 text-gray-900 mb-2"><b><?= $judul; ?></b></h1>
                <p class="mb-4"><b>Reset Password</b> agar anda bisa mengakses akun anda</p>
                <?= $this->session->flashdata('message'); ?>
              </div>
              <form class="user" action="<?= base_url('Auth/resetpassword'); ?>" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password_lama" name="password_lama" aria-describedby="password_lama" placeholder="Masukan Password Lama">
                  <?= form_error('password_lama', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" id="password_baru" name="password_baru" aria-describedby="password_baru" placeholder="Masukan Password Baru">
                  <?= form_error('password_baru', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="sumbit" class="btn btn-info btn-user btn-block">
                  Reset Password
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>