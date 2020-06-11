<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laptop-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Siadafa</div>
  </a>
  <hr class="sidebar-divider">

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

      <?php endforeach ?>

    <?php endforeach; ?>
    <?php if ($this->session->userdata('id_role') == "1") { ?>
      <li class="nav-item">
        <a class="nav-link collapsed pb-1" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-table"></i>
          <span><b>Master Data</b></span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-heade text-dark">
              <center>
                <h5>Menu</h5>
              </center>
            </h6>
            <a class="collapse-item" href="<?= base_url(); ?>Mahasiswa">Mahasiswa</a>
            <a class="collapse-item" href="<?= base_url(); ?>Dosen">Dosen</a>
            <a class="collapse-item" href="<?= base_url(); ?>Fakultas">Fakultas</a>
            <a class="collapse-item" href="<?= base_url(); ?>Jurusan">Jurusan</a>
            <a class="collapse-item" href="<?= base_url(); ?>TahunAkademik">Tahun Akademik</a>
            <a class="collapse-item" href="<?= base_url(); ?>Matkul">Mata Kuliah</a>
            <a class="collapse-item" href="<?= base_url(); ?>Kelas">Kelas</a>
            <a class="collapse-item" href="<?= base_url(); ?>Ruangan">Ruangan</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed pb-1" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-folder"></i>
          <span><b>Menu Control Akses</b></span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-heade text-dark">
              <center>
                <h5>Menu</h5>
              </center>
            </h6>
            <a class="collapse-item" href="<?= base_url(); ?>Menu">Pengaturan Menu</a>
            <a class="collapse-item" href="<?= base_url(); ?>Role">Pengaturan Role</a>
            <a class="collapse-item" href="<?= base_url(); ?>Sub">Pengaturan Sub</a>
          </div>
        </div>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('Dokumentasi'); ?>">
        <i class="fas fa-fw fa-book"></i>
        <span><b>Dokumentasi</b></span></a>
    </li>
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