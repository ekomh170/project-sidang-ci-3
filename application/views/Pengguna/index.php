<div class="container-fluid mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <span style="float: right;">
        <form method="post" action="<?= base_url() ?>Pengguna" class="form-inline">
          <input class="form-control mr-1" type="search" placeholder="Cari Data Users" name="cari_usr" aria-label="search">
          <button class="btn btn-outline-info my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
        </form>
      </span>
      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>Pengguna/tambah" class="btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Email</th>
              <th class="text-center">Role</th>
              <th class="text-center">Status</th>
              <th class="text-center">Dibuat</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_user as $du) : ?>
              <tr>
                <td><?= ++$offset; ?></td>
                <td class="text-center"><?= $du->nama; ?></td>
                <td class="text-center"><?= $du->email; ?></td>
                <td class="text-center"><?= $du->role; ?></td>
                <td class="text-center"><?= $du->status; ?></td>
                <td class="text-center"><?= $du->data_created; ?></td>
                <td class="text-center">
                  <!--Izin Akses-->
                  <?php if ($this->session->userdata('id_role') == "1") { ?>
                    <?php if ($du->status == 'Tidak Aktif') { ?>
                      <?= anchor(base_url('Pengguna/aktif/') . $du->id, '<button type="button" class="btn btn-warning btn-circle"><i class="fas fa-lock"></i></button>') ?>
                    <?php } ?>
                    <!--nonaktif-->
                    <?php if ($du->status == 'Aktif') { ?>
                      <?= anchor(base_url('Pengguna/nonaktif/') . $du->id, '<button type="button" class="btn btn-warning btn-circle"><i class="fas fa-ban"></i></button>') ?>
                  <?php }
                  } ?> <b>|</b>
                  <!--Hapus-->
                  <a href="<?= base_url(); ?>Pengguna/hapus/<?= encrypt_url($du->id); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
  </div>
</div>