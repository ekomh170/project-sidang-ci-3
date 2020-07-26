<div class="container">
  <div class="row justify-content-center">
    <div class="flash-data" data-flashdata="<?=$this->session->flashdata('berhasil');?>"></div>
    <?php if ($this->session->flashdata('berhasil')): ?>
    <?php endif;?>
    <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4" || $this->session->userdata('id_role') == "5" || $this->session->userdata('id_role') == "6") {?>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h3 class="card-header"><b><?=$judul?></b></h3>
              <div class="card-body">
                <h4 class="card-title"><b>Nama Lengkap : </b><?= cetak($this->session->userdata('nama'))?></h4>
                <h6 class="card-text"><b>Nama Panggilan : </b><?=cetak($user['nama_panggilan']);?></h6>
                <h6 class="card-text"><b>Email : </b><?= cetak($this->session->userdata('email'))?></h6>
                <h6 class="card-text"><b>Nama Role : </b><?= cetak($this->session->userdata('role'))?></h6>
                <br>
                <h6 class="card-text text-center"><img src="<?=base_url('assets/foto/users/') . $user['image']?>" height="200" width="200" class="img-profile rounded-circle"></h6>
              </div>
              <br>
              <a href="<?=base_url('Profile/edit')?>" class="btn btn-info"> Ubah Profile </a>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <?php if ($this->session->userdata('id_role') == "2") {?>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h3 class="card-header"><b><?=$judul?></b></h3>
              <div class="card-body">
                <h4 class="card-title"><b>Nama Lengkap : </b><?= cetak($this->session->userdata('nama'))?></h4>
                <h6 class="card-text"><b>Nama Panggilan : </b><?=cetak($user['nama_panggilan']);?></h6>
                <h6 class="card-text"><b>Email : </b><?= cetak($this->session->userdata('email'))?></h6>
                <h6 class="card-text"><b>Jenis Kelamin : </b><?= cetak($this->session->userdata('jenis_kelamin'))?></h6>
                <h6 class="card-text"><b>Tempat Lahir : </b><?= cetak($this->session->userdata('tmpt_lahir'))?></h6>
                <h6 class="card-text"><b>Tanggal Lahir : </b><?= cetak($this->session->userdata('tanggal_lahir'))?></h6>
                <h6 class="card-text"><b>Nomer Telpon : </b><?= cetak($this->session->userdata('no_telp'))?></h6>
                <h6 class="card-text"><b>Nama Fakultas : </b><?= cetak($this->session->userdata('nama_fakultas'))?></h6>
                <h6 class="card-text"><b>Nama Jurusan : </b><?= cetak($this->session->userdata('nama_jurusan'))?></h6>
                <h6 class="card-text"><b>Nama Kelas : </b><?= cetak($this->session->userdata('nama_kelas'))?></h6>
                <h6 class="card-text"><b>Tahun Akademik : </b><?= cetak($this->session->userdata('nama_tahun_akademik'))?></h6>
                <h6 class="card-text"><b>Nama Role : </b><?= cetak($this->session->userdata('role'))?></h6>
              </div>
              <br>
              <h6 class="card-text text-center"><img src="<?=base_url('assets/foto/users/') . $user['image']?>" height="200" width="200" class="img-profile rounded-circle"></h6>
              <br>
              <a href="<?=base_url('Profile/edit')?>" class="btn btn-info"> Ubah Profile </a>
            </div>
          </div>
        </div>
      </div>
    <?php }?>
    <?php if ($this->session->userdata('id_role') == "3") {?>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h3 class="card-header"><b><?=$judul?></b></h3>
              <div class="card-body">
                <h4 class="card-title"><b>Nama Lengkap : </b><?= cetak($this->session->userdata('nama'))?></h4>
                <h6 class="card-title"><b>Nama Panggilan : </b><?=cetak($user['nama_panggilan']);?></h6>
                <h6 class="card-text"><b>Nama Mata Kuliah : </b><?= cetak($this->session->userdata('nama_matkul'))?></h6>
                <h6 class="card-text"><b>Email : </b><?= cetak($this->session->userdata('email'))?></h6>
                <h6 class="card-text"><b>Jenis Kelamin : </b><?= cetak($this->session->userdata('jenis_kelamin'))?></h6>
                <h6 class="card-text"><b>Tempat Lahir : </b><?= cetak($this->session->userdata('tmpt_lahir'))?></h6>
                <h6 class="card-text"><b>Tanggal Lahir : </b><?= cetak($this->session->userdata('tanggal_lahir'))?></h6>
                <h6 class="card-text"><b>Nomer Telpon : </b><?= cetak($this->session->userdata('no_telp'))?></h6>
                <h6 class="card-text"><b>Nama Role : </b><?= cetak($this->session->userdata('role'))?></h6>
              </div>
              <br>
              <h6 class="card-text text-center"><img src="<?=base_url('assets/foto/users/') . $user['image']?>" height="200" width="200" class="img-profile rounded-circle"></h6>
              <br>
              <a href="<?=base_url('Profile/edit')?>" class="btn btn-info"> Ubah Profile </a>
            </div>
          </div>
        </div>
      </div>
    <?php }?>
  </div>
</div>
