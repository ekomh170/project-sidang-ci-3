<div class="container">
  <div class="row justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">>
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <img src="<?= base_url('assets/img/icon/refresh2.png') ?>" class="img-responsive center-block mb-2 rounded-circle" width="150" height="150" alt="logo">
                <h1 class="h4 text-white mb-2"><b><?= $judul; ?></b></h1>
                <p class="text-light mb-1">Reset Password agar anda bisa mengakses akun anda </p>
                <p class="text-light mt-1 mb-4"> Form Ini juga Berfungsi Untuk Merubah Password agar lebih aman </p>
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
                <button type="sumbit" style="background-color: orange; color: white;" class="btn btn btn-user btn-block">
                  Reset Password
                </button>
              </form>
              <hr>
              <button onclick="backpageror()" class="btn btn-danger btn-user btn-block" style="text-decoration:none">Kembali</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
