<div class="container">
  <div class="row justify-content-center">
    <?php if ($this->session->userdata('id_role') == "1") { ?>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h3 class="card-header"><b><?= $judul; ?></b></h3>
              <div class="card-body">
                <h4 class="card-title"><b>Nama Lengkap : </b><?= $this->session->userdata('nama'); ?></h4>
                <h6 class="card-title"><b>Nama Panggilan : </b><?= $this->session->userdata('nama_panggilan'); ?></h6>
                <h6 class="card-text"><b>Email : </b><?= $this->session->userdata('email'); ?></h6>
                <!-- <h6 class="card-text"><b>Kode Role : </b><?= $this->session->userdata('id_role'); ?></h6> -->
                <!-- <h6 class="card-text"><b>Status : </b><?= $this->session->userdata('is_active'); ?></h6> -->
                <!-- <h6 class="card-text"><b>Kapan Di Buat : </b><?= $this->session->userdata('data_created'); ?></h6> -->
                <br>
                <h6 class="card-text text-center"><img src="<?= base_url('assets/img/') . $user['image']; ?>" height="200" width="200" class="img-profile rounded-circle"></h6>
                <br>
                <a href="<?= base_url('Profile/edit') ?>" class="btn btn-info"> Ubah Profile </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($this->session->userdata('id_role') == "2") { ?>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h3 class="card-header"><b><?= $judul; ?></b></h3>
              <div class="card-body">
                <h4 class="card-title"><b>Nama Lengkap : </b><?= $this->session->userdata('nama'); ?></h4>
                <h6 class="card-title"><b>Nama Panggilan : </b><?= $this->session->userdata('nama_panggilan'); ?></h6>
                <h6 class="card-text"><b>Email : </b><?= $this->session->userdata('email'); ?></h6>
                <h6 class="card-text"><b>Kode Jurusan : </b><?= $this->session->userdata('id_jurusan'); ?></h6>
                <h6 class="card-text"><b>Kode Kelas : </b><?= $this->session->userdata('id_kelas') ?></h6>
                <h6 class="card-text"><b>Jenis Kelamin : </b><?= $this->session->userdata('jenis_kelamin'); ?></h6>
                <h6 class="card-text"><b>Tempat Lahir : </b><?= $this->session->userdata('tmpt_lahir'); ?></h6>
                <h6 class="card-text"><b>Tanggal Lahir : </b><?= $this->session->userdata('tanggal_lahir'); ?></h6>
                <h6 class="card-text"><b>Nomer Telpon : </b><?= $this->session->userdata('no_telp'); ?></h6>
                <!-- <h6 class="card-text"><b>Kapan Di Buat : </b><?= $this->session->userdata('data_created'); ?></h6> -->
                <br>
                <h6 class="card-text text-center"><img src="<?= base_url('assets/img/') . $user['image']; ?>" height="200" width="200" class="img-profile rounded-circle"></h6>
                <br>
                <a href="<?= base_url('Profile/edit') ?>" class="btn btn-info"> Ubah Profile </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($this->session->userdata('id_role') == "3") { ?>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h3 class="card-header"><b><?= $judul; ?></b></h3>
              <div class="card-body">
                <h4 class="card-title"><b>Nama Lengkap : </b><?= $this->session->userdata('nama'); ?></h4>
                <h6 class="card-title"><b>Nama Panggilan : </b><?= $this->session->userdata('nama_panggilan'); ?></h6>
                <h6 class="card-text"><b>Email : </b><?= $this->session->userdata('email'); ?></h6>
                <h6 class="card-text"><b>Kode Dosen : </b><?= $this->session->userdata('id_dosen'); ?></h6>
                <h6 class="card-text"><b>Kode Mata Kuliah : </b><?= $this->session->userdata('id_matkul') ?></h6>
                <!--  <h6 class="card-text"><b>Kapan Di Buat : </b><?= $this->session->userdata('data_created'); ?></h6> -->
                <br>
                <h6 class="card-text text-center"><img src="<?= base_url('assets/img/') . $user['image']; ?>" height="200" width="200" class="img-profile rounded-circle"></h6>
                <br>
                <a href="<?= base_url('Profile/edit') ?>" class="btn btn-info"> Ubah Profile </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <<?php } ?> </div> </div>