<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item nav-link text-dark"><button id="clock" class="btn btn-dark"><b>Pukul : </b><?php print date('H:i:s'); ?></button></li>
          <li class="nav-item nav-link text-dark"><button class="btn btn-dark"><b>Tanggal : </b><?= waktu(); ?></button></li>
          <li class="nav-item nav-link text-dark"><button type="submit" class="btn btn-dark btn-icon-split" value="Refresh Page" onClick="document.location.reload(true)"><span class="icon text-white-50"><i class="fas fa-sync-alt"></i></span><span class="text">Refresh Halaman</span></button></li>
        </ul>
      </div>
      <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small text-dark font-weight-bold"><?= $user['nama']; ?></span>
            <img class="img-profile rounded-circle" src="<?= base_url('assets/foto/users/') . $user['image']; ?>">
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="<?= base_url('Profile') ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profil
            </a>
            <a class="dropdown-item" href="<?= base_url('Auth/resetpassword') ?>">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Reset Password
            </a>
            <?php if ($this->session->userdata('id_role') == "1") { ?>
              <a class="dropdown-item" href="<?= base_url('Log/Log') ?>">
                <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                Laporan Aktifitas
              </a>
            <?php } ?>
            <a class="dropdown-item" href="<?= base_url('Log/LogLogin') ?>">
              <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
              Laporan Aktif
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Keluar
            </a>
          </div>
        </li>
      </ul>
    </nav>