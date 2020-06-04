<div class="container">
  <div class="row justify-content-center">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <div class="row">>
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2"><?= $judul; ?></h1>
                <p class="mb-4">Masukan email anda agar anda dapat mengakses akun anda kembali</p>
              </div>
              <form class="user">
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" aria-describedby="email" placeholder="Enter Email...">
                </div>
                <a href="login.html" class="btn btn-info btn-user btn-block">
                  Reset Password
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('Auth/register'); ?>">Buat Akun!</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?= base_url('Auth/index'); ?>">Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>