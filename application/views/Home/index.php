<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?=$judul;?></title>  <link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
  <link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap-grid.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap-reboot.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/bootstrap-reboot.min.css.map')?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/myassets/css/style2.css')?>">
  <link href="<?=base_url('assets/layout/');?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom Loader Screen Css-->
  <link href="<?=base_url('assets/myassets/');?>css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url('assets/layout/');?>vendor/sweetalret2/dist/sweetalert2.min.css">
</head>
<!-- loader -->
<div id="haraptunggu"></div>
<!-- loader -->
<body class="text-white">
  <div class="jumbotron" id="home" style="background-color: midnightblue">
    <div class="container mb-5">
      <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
      <?php if ($this->session->flashdata('berhasil')) : ?>
      <?php endif; ?>
      <div class="text-center">
        <img src="<?= base_url('assets/img/logo/img.png')?>"  class="rounded-circle img-thumbnail mb-5" width="250px" height="250px">
        <h2 class="mb-5">APLIKASI Informasi Dan Penilaian Mahasiswa (SIADAWA) Institut Tazkia/Institut Agama Islam Tazkia</h2>
        <center>
          <a href="<?= base_url('Auth')?>" style="text-decoration:none"><button type="button" class="btn btn-primary btn-lg btn-block mb-2" style="background-color: orange;">Login Ke Aplikasi</button></a>
        </center>
      </div>
    </div>
  </div>
  <section class="about" id="about">
    <div class="container">
      <div class="row mb-4">
        <div class="col text-center">
          <h2 class="mb-4">Pengembang : </h2>
          <img src="<?= base_url('assets/img/admin-dev.jpg')?>" class="rounded-circle img-thumbnail" width="200px" height="200px">
          <h1 class="display-4">Eko Muchamad Haryono</h1>
          <h3 class="lead">Hubungi Pengembang : </h3>
          <center>
            <a href="https://web.facebook.com/eko.m.haryono/" target="_BLANK"><button class="btn btn-primary"><i class="fab fa-facebook-f" aria-hidden="true"></i></button></a>
            <a href="https://api.whatsapp.com/send?phone=6282246105463" target="_BLANK"><button class="btn btn-success"><i class="fab fa-whatsapp" aria-hidden="true"></i></button></a>
            <a href="https://github.com/ekomh170" target="_BLANK"><button class="btn btn-dark"><i class="fab fa-github" aria-hidden="true"></i></button></a>
            <a href="https://www.instagram.com/ekomh_29/?hl=id" target="_BLANK"><button class="btn btn-warning"><i class="fab fa-instagram" aria-hidden="true"></i></button></a>
          </center>
        </div>
      </div>
    </div>
  </section>
</body>
<script src="<?=base_url('assets/layout/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/sweetalret2/dist/sweetalert2.min.js"></script>
<!-- Sweet Alert 2-->
<script src="<?=base_url('assets/myassets/');?>js/loadscreen.js"></script>
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
