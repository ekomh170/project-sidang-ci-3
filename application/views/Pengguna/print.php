<!DOCTYPE html>
<html>
<head>
  <title>Print Data Users</title>
  <link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
  <link href="<?=base_url('assets/layout/');?>css/sb-admin-2.css" rel="stylesheet">
</head>
<body>
  <div class="container-fluid mb-2 mt-4">
    <div class="text-center">
      <img src="<?= base_url('assets/img/logo/img.png') ?>" class="img-responsive center-block mb-2" width="250" height="250" alt="logo">
    </div>
    <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Role</th>
                <th class="text-center">Dibuat</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no=1; 
              foreach ($data_user as $du) : ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td class="text-center"><?= cetak($du->nama); ?></td>
                  <td class="text-center"><?= cetak($du->email); ?></td>
                  <td class="text-center"><?= cetak($du->role); ?></td>
                  <td class="text-center"><?= cetak($du->data_created); ?></td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url('assets/layout/');?>js/sb-admin-2.min.js"></script>

<script>
  window.print();
</script>
