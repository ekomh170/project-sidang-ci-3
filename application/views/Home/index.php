<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top py-3" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="#page-top"><?= $judul ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
        </li>
        <?php if (!$this->session->userdata('id_role')) { ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Home/loginhome">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="">Form Pendaftaran</a>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('id_role' == 1)) { ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url('Dashboard'); ?>">Kembali Ke Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url('Auth/logout'); ?>">Logout</a>
          </li>
        <?php } ?>
        <?php if ($this->session->userdata('id_role' == 2 || 3 | 4)) { ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url('Profile'); ?>">Kembali Ke Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="<?= base_url('Auth/logout'); ?>">Logout</a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<!-- Masthead -->
<header class="masthead">
  <div class="container h-100">
    <div class="row h-100 align-items-center justify-content-center text-center">
      <div class="col-lg-10 align-self-end">
        <h1 class="text-uppercase text-white font-weight-bold">Judul</h1>
        <br>
      </div>
      <div class="col-lg-8 align-self-baseline">
        <p class="text-white-75 font-weight-light mb-5">Ayo Belajar Karena Pendidikan adalah senjata paling mematikan di dunia, karena dengan pendidikan, Anda dapat mengubah dunia</p>
        <a class="btn btn-info btn-xl js-scroll-trigger" href="#about">Kata Motivasi</a>
      </div>
    </div>
  </div>
</header>

<!-- About -->
<section class="page-section bg-info" id="about">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h2 class="text-white mt-0">Kata Kata Motivasi</h2>
        <hr class="divider light my-4">
        <p class="text-white-50 mb-4">“Baik untuk merayakan kesuksesan, tapi hal yang lebih penting adalah untuk mengambil pelajaran dari kegagalan.(Bill Gates)</p>
        <p class="text-white-50 mb-4">“Orang-orang yang berhenti belajar akan menjadi pemilik masa lalu. Orang-orang yang masih terus belajar, akan menjadi pemilik masa depan”(Mario Teguh)</p>
        <p class="text-white-50 mb-4">“Belajar memang bukan satu-satunya tujuan hidup kita. Tetapi kalau itu saja kita tidak sanggup atasi, lantas apa yang akan kita capai”(Shim Shangmin)</p>
        <a class="btn btn-light btn-xl js-scroll-trigger" href="#services">Ayo Mulai!</a>
      </div>
    </div>
  </div>
</section>

<!-- Services -->
<section class="page-section" id="services">
  <div class="container">
    <h2 class="text-center mt-0">Layanan Yang Tersedia</h2>
    <br>
    <div class="row">
      <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
          <i class="fas fa-4x fa-gem text-info mb-4"></i>
          <h3 class="h4 mb-2">Ruang Belajar Gratis</h3>
          <p class="text-muted mb-0"></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
          <i class="fas fa-4x fa-laptop-code text-info mb-4"></i>
          <h3 class="h4 mb-2">Web Selalu Di Perbarui</h3>
          <p class="text-muted mb-0"></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
          <i class="fas fa-4x fa-globe text-info mb-4"></i>
          <h3 class="h4 mb-2">Tempat Diskusi</h3>
          <p class="text-muted mb-0"></p>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 text-center">
        <div class="mt-5">
          <i class="fas fa-4x fa-heart text-info mb-4"></i>
          <h3 class="h4 mb-2">Open Source</h3>
          <p class="text-muted mb-0"></p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="page-section" id="contact">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 text-center">
        <h2 class="mt-0">Hubungi Jika Berminat</h2>
        <br>
        <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
        <div>082246105463</div>
      </div>
      <div class="col-lg-4 mr-auto text-center">
        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>

        <a class="d-block" href="mailto:contact@yourwebsite.com">contact@belajaryok.com</a>
      </div>
    </div>
  </div>
</section>