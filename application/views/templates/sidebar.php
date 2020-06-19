<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
  <hr class="sidebar-divider">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Siadafa</div>
  </a>
  <hr class="sidebar-divider">
  <center>
    <div class="mb-2">
      <img class="img-profile rounded-circle" src="<?= base_url('assets/foto/users/') . $user['image']; ?>" height="75" width="75">
    </div>
    <button class="btn btn-info mb-2"><div class="mb-4 d-none d-lg-inline text-white-600 small text-white font-weight-bold"><?= $user['nama']; ?></div></button>
  </center>
  <!-- query Menu-->
  <?php
  $id_role = $this->session->userdata('id_role');
  $queryMenu = "SELECT `user_menu`.`id`, `menu`
  FROM `user_menu` JOIN `user_akses_menu` 
  ON `user_menu`.`id` = `user_akses_menu`.`id_menu`
  WHERE `user_akses_menu`.`id_role` = $id_role
  ORDER BY `user_akses_menu`.`id_menu` ASC  
  ";
  $menu = $this->db->query($queryMenu)->result_array();
  ?>

  <!-- Menu Looping -->
  <?php foreach ($menu as $m) : ?>

    <!-- Siapkan Sub Menu Sesuai Menu  Yang di Butuhkan-->
    <?php
    $Idmenu = $m['id'];
    $querySubMenu = "SELECT *
    FROM  `user_sub_menu`
    WHERE `id_menu` = $Idmenu
    AND `status` = 'Aktif'
    ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>

    <?php foreach ($subMenu as $sm) : ?>
      <?php if ($judul == $sm['title']) : ?>
        <li class="nav-item active">
          <?php else : ?>
            <li class="nav-item">
            <?php endif;  ?>
            <a class="nav-link pb-1" href="<?= base_url($sm['url']); ?>">
              <i class="fas fa-<?= ($sm['icon']); ?>"></i>
              <span><b><?= ($sm['title']); ?></b></span></a>
            </li>
            <hr class="sidebar-divider">

          <?php endforeach ?>

        <?php endforeach; ?>
        
        <?php if ($this->session->userdata('id_role') == "2") { ?>
          <li class="nav-item">
            <a class="nav-link pb-1" href="<?= base_url('KrsDetail/detail/') . encrypt_url($this->session->userdata('nim_mhs')); ?>">
              <i class="fas fa-fw fa-tasks"></i>
              <span><b>Hasil Krs Detail</b></span></a>
              <hr class="sidebar-divider">
            </li>
            <li class="nav-item">
              <a class="nav-link pb-1" href="<?= base_url('TranskripNilai/detail/') . encrypt_url($this->session->userdata('nim_mhs')); ?>">
                <i class="fas fa-fw fa-tasks"></i>
                <span><b>Hasil Transkrip Nilai</b></span></a>
                <hr class="sidebar-divider">
              </li>
              <li class="nav-item">
                <a class="nav-link pb-1" href="<?= base_url('Nilai/detail/') . encrypt_url($this->session->userdata('nim_mhs')); ?>">
                  <i class="fas fa-fw fa-tasks"></i>
                  <span><b>Hasil Nilai</b></span></a>
                  <hr class="sidebar-divider">
                </li>
                <li class="nav-item">
                  <a class="nav-link pb-1" href="<?= base_url('Ipk/detail/') . encrypt_url($this->session->userdata('nim_mhs')); ?>">
                    <i class="fas fa-fw fa-tasks"></i>
                    <span><b>Hasil Ipk</b></span></a>
                    <hr class="sidebar-divider">
                  </li>
                <?php } ?>
                <!-- 
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url('Dokumentasi'); ?>">
                    <i class="fas fa-fw fa-book"></i>
                    <span><b>Dokumentasi</b></span></a>
                  </li> 
                  <hr class="sidebar-divider"> --> 
                  <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
                      <i class="fas fa-fw fa-sign-out-alt"></i>
                      <span><b>Keluar</b></span></a>
                    </li>
                    <hr class="sidebar-divider d-none d-md-block">
                    <div class="text-center d-none d-md-inline">
                      <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>
                  </ul>