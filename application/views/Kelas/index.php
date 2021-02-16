<div class="container-fluid mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <span style="float: right;">
        <form method="post" action="<?= base_url() ?>Kelas" class="form-inline">
          <input class="form-control mr-1" type="search" placeholder="Cari Data Kelas" name="cari_kls" aria-label="search">
          <button class="btn btn-outline-dark my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
        </form>
      </span>
      <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") { ?>
        <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
          <a href="<?= base_url(); ?>Kelas/tambah" class="btn btn-block btn-dark" style="background-color: darkblue;"><b>+ Data Baru</b></a>
        </div>
      <?php } ?>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode Kelas</th>
              <th>Nama Kelas</th>
              <th>Nama Ruangan</th>
              <th>Status</th>
              <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") { ?>
                <th class="text-center">Aksi</th>
              <?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($tb_kelas as $kelas) :
              ?>
              <tr>
                <td><?= ++$offset; ?></td>
                <td><?= cetak($kelas->id_kelas); ?></td>
                <td><?= cetak($kelas->nama_kelas); ?></td>
                <td><?= cetak($kelas->nama_ruangan); ?></td>
                <td><?= cetak($kelas->status); ?></td>
                <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4") { ?>
                  <td class="text-center">
                    <a href="<?= base_url(); ?>Kelas/ubah/<?= encrypt_url($kelas->id_kelas); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-edit"></i></button></a> <b>|</b>
                    <a href="<?= base_url(); ?>Kelas/hapus/<?= encrypt_url($kelas->id_kelas); ?>" class="tombol-hapus"><button type="button" class="btn btn-dark btn-circle tombol-hapus" style="background-color: darkblue;"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
                  </td>
                <?php } ?>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <?php echo $this->pagination->create_links(); ?>
      </div>
    </div>
    <div class="card-header py-3">
      <div class="col col-4">
       <a href="<?= base_url(); ?>Kelas/print"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-print"></i></button></a> |
       <a href="<?= base_url(); ?>Kelas/pdf"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-pdf"></i></button></a> |
       <a href="<?= base_url(); ?>Kelas/excel"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-excel"></i></button></a>
     </div>
   </div>
 </div>
</div>