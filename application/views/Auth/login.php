<div class="container">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <div class="row justify-content-center">
    <div class="col-lg-7">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-4">
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <img src="<?= base_url('assets/img/icon/login.png') ?>" class="img-responsive center-block mb-2 rounded-circle bg-white" width="150" height="150" alt="logo">
                  <h4 class="text-white mb-4 font-weight-bold"><?= $judul; ?></h4>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" action="<?= base_url('Auth'); ?>" method="post">
                  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Alamat Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Masukan Password">
                    <?= form_error('password', '<small class="form-text text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="sumbit" style="background-color: orange; color: white;" class="btn btn btn-user btn-block mb-3">
                    Login
                  </button>
                </form>
                <hr>
                <a href="<?= base_url('Home')?>" style="text-decoration:none"><button class="btn btn-danger btn-user btn-block">Halaman Utama</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
