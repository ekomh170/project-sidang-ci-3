<div class="container-fluid mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <span style="float: right;">
        <form method="post" action="<?= base_url() ?>Dosen" class="form-inline">
          <input class="form-control mr-1" type="search" placeholder="Cari Data Dosen" name="cari_dosen" aria-label="search">
          <button class="btn btn-outline-dark my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
        </form>
      </span>
      <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") { ?>
        <div>
          <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
            <a href="<?= base_url(); ?>Dosen/tambah" class="btn btn-block btn-dark" style="background-color: darkblue;"><b>+ Data Baru</b>
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Dosen</th>
              <th>Nama Dosen</th>
              <th>Mata Kuliah</th>
              <th>Jenis Kelamin</th>
              <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4" || $this->session->userdata('id_role') == "6") { ?>
                <th class="text-center">Aksi</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($join as $dsn) :
              ?>
              <tr>
                <td><?= ++$offset; ?></td>
                <td><?= cetak($dsn->id_dosen); ?></td>
                <td><?= cetak($dsn->nama_dosen); ?></td>
                <td><?= cetak($dsn->nama_matkul); ?></td>
                <td><?= cetak($dsn->jenis_kelamin); ?></td>
                <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") { ?>
                  <td class="text-center">
                    <!--izin Akses-->
                    <?php if ($dsn->status == 'Tidak Aktif') { ?>
                      <?= anchor(base_url('dosen/user/') . $dsn->id_dosen, '<button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-lock"></i></button>') ?> <b> | </b>
                    <?php } ?>
                    <!--nonaktif-->
                    <?php if ($dsn->status == 'Aktif') { ?>
                      <?= anchor(base_url('dosen/nonaktif/') . $dsn->id_dosen, '<button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-ban"></i></button>') ?> <b>|</b>
                    <?php } ?>
                    <!--CRUD-->
                    <a href="<?= base_url(); ?>Dosen/detail/<?= encrypt_url($dsn->id_dosen); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-info-circle"></i></button></a> <b>|</b>
                    <a href="<?= base_url(); ?>Dosen/edit/<?= encrypt_url($dsn->id_dosen); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-edit"></i></button></a> <b>|</b>
                    <a href="<?= base_url(); ?>Dosen/hapus/<?= encrypt_url($dsn->id_dosen); ?>" class="tombol-hapus"><button type="button" class="btn btn-dark btn-circle tombol-hapus" style="background-color: darkblue;"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
                  </td>
                <?php } ?>
                <?php if ($this->session->userdata('id_role') == "6") { ?>
                  <td class="text-center">
                    <a href="<?= base_url(); ?>Dosen/detail/<?= encrypt_url($dsn->id_dosen); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-info-circle"></i></button></a>
                  </td>
                <?php } ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php
        echo $this->pagination->create_links();
        ?>
      </div>
    </div>
    <div class="card-header py-3">
     <a href="<?= base_url(); ?>Dosen/print"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-print"></i></button></a> |
     <a href="<?= base_url(); ?>Dosen/pdf"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-pdf"></i></button></a> |
     <a href="<?= base_url(); ?>Dosen/excel"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-excel"></i></button></a>
   </div>
 </div>
</div>