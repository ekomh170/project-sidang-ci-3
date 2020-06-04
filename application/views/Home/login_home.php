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