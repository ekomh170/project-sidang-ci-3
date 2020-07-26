<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?=$judul;?></title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap.min.css')?>">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap-grid.min.css')?>">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap-reboot.min.css')?>">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap-reboot.min.css.map')?>">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/style2.css')?>">

  <!-- Custom Loader Screen Css-->
  <link href="<?=base_url('assets/myassets/');?>css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/templates/');?>vendor/sweetalret2/dist/sweetalert2.min.css">
</head>
<!-- loader -->
<div id="haraptunggu"></div>
<!-- loader -->
<body>
  <div class="container mt-5">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
    <?php if ($this->session->flashdata('berhasil')) : ?>
    <?php endif; ?>
    <div class="shadow-sm p-3 mb-5 bg-white rounded">
      <div class="card bg-info mt-auto">
        <div class="card-body">
          <div class="container text-center">
            <div class="card bg-info mt-auto">
              <div class="card-body">
                <img src="<?= base_url('assets/img/admin-dev.jpg')?>" class="rounded-circle img-thumbnail" width="300px" height="300px">
                <div class="h4 text-white">Pengembang : </div>
                <div class="text2 h3 text-white">Eko Muchamad Haryono</div>
                <p class="text2 text-white">Gamers | Web Developer | Freelancer</p>
              </div>
            </div>
            <hr>
            <div class="card bg-info mt-auto">
              <div class="card-body">
                <div class="text h2 text-center text-white">APLIKASI INFORMASI</div>
                <div class="text h2 text-center text-white mb-3">DAN PENILAIAN MAHASISWA</div>
                <a href="<?= base_url('Auth')?>"><button type="button" class="btn btn-dark rounded-circle">Login Ke Aplikasi</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<!-- Bootstrap core JavaScript -->
<script src="<?=base_url('assets/templates/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/templates/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="<?=base_url('assets/templates/');?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?=base_url('assets/templates/');?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Sweet Alert 2-->
<script src="<?=base_url('assets/templates/');?>vendor/sweetalret2/dist/sweetalert2.min.js"></script>

<!-- Sweet Alert 2-->
<script src="<?=base_url('assets/myassets/');?>js/loadscreen.js"></script>
<!-- Sweet Alert 2-->

<script type="text/javascript">
 const flashData = $('.flash-data').data('flashdata');

 if (flashData) {
  Swal.fire({
    icon: 'success',
    title: "Logout Berhasil",
    text: "Anda Berhasil " + flashData,
    showConfirmButton: true,
  });
}
</script>
<!-- Sweet Alert 2-->
</html>