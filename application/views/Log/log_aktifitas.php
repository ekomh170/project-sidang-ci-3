<div class="container-fluid mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>User</th>
              <th>Role</th>
              <th>Nama Data</th>
              <th>Aksi</th>
              <th>Kode Data</th>
              <?php if ($this->session->userdata('id_role') == "1") { ?>
                <th>Aksi</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($tb_log as $lg) :
              ?>
              <tr>
                <td><?= $lg->id_log; ?></td>
                <td><?= $lg->log_time; ?></td>
                <td><?= $lg->log_user; ?></td>
                <td><?= $lg->role; ?></td>
                <td><?= $lg->log_tipe; ?></td>
                <td><?= $lg->log_aksi; ?></td>
                <td><?= $lg->log_item; ?></td>
                <?php if ($this->session->userdata('id_role') == "1") { ?>
                  <td class="text-center">
                    <a href="<?= base_url(); ?>Log/delete/<?= $lg->id_log; ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini ??');"><button type="button" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></button></a>
                  </td>
                <?php } ?>
              </tr>
              <?php $no++ ?>
            <?php endforeach; ?>
          </tbody>
          <?php if ($this->session->userdata('id_role') == "1") { ?>
            <a href="<?= base_url(); ?>Log/AllDelete/?>"><button type="button" class="btn btn-danger">Reset Data Aktifitas</button></a>
          <?php } ?>
          <br><br>
        </table>
      </div>
    </div>
  </div>
</div>