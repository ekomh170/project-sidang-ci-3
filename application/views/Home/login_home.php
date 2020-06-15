<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $judul; ?></title>

  <!-- Font Awesome Icons -->
  <link href="<?= base_url('assets/templates/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="<?= base_url('assets/templates/'); ?>vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="<?= base_url('assets/home/'); ?>css/creative.min.css" rel="stylesheet">
  
  <!-- Custom Loader Screen Css--> 
  <link href="<?= base_url('assets/myassets/'); ?>css/style.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/templates/'); ?>vendor/sweetalret2/dist/sweetalert2.min.css">

</head>
<!-- loader -->
<div id="haraptunggu"></div>
<!-- loader -->
<body id="page-top">
 
  <header class="masthead">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
    <?php if ($this->session->flashdata('berhasil')) : ?>
    <?php endif; ?>
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold"><span class="text1">Aplikasi Informasi dan Penilaian Mahasiswa</span></h1>
          <br>
        </div>
        <div class="col-lg-8 align-self-baseline">
          <!-- <p class="text-white-75 font-weight-light mb-5">Ayo Belajar Karena Pendidikan adalah senjata paling mematikan di dunia, karena dengan pendidikan, Anda dapat mengubah dunia</p> -->
          <a class="btn btn-info btn-xl js-scroll-trigger" href="<?= base_url('Auth'); ?>">Login</a>
        </div>
      </div>
    </div>
  </header>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/templates/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/templates/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="<?= base_url('assets/templates/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="<?= base_url('assets/templates/'); ?>vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Sweet Alert 2-->
  <script src="<?= base_url('assets/templates/'); ?>vendor/sweetalret2/dist/sweetalert2.min.js"></script>
  <!-- Sweet Alert 2-->

  <script src="<?= base_url('assets/myassets/'); ?>js/loadscreen.js"></script>

  <!-- Sweet Alert 2-->
  <script type="text/javascript">
    const flashData = $('.flash-data').data('flashdata');

    if (flashData) {
      Swal.fire({
        icon: 'success',
        title: "Logout Berhasil",
        text: "Anda Berhasil " + flashData,
            // timer: 1500,
            showConfirmButton: true,
            type: 'success',
          });
    }

  </script>
  <!-- Sweet Alert 2-->

  <?php if ($this->uri->segment('4') == "loginhome") { ?>
    <script src="<?= base_url('assets/'); ?>home/js/creative.min.js"></script>
  <?php } ?>
</body>
</html>