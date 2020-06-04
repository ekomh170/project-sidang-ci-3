<div class="container-fluid mb-2">
  <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <span style="float: right;">
        <form method="post" action="<?= base_url() ?>Matkul" class="form-inline">
          <input class="form-control mr-1" type="search" placeholder="Cari Data Matkul" name="cari_mtl" aria-label="search">
          <button class="btn btn-outline-info my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
        </form>
      </span>
      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>Matkul/tambah" class="btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
      </div>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Kode matkul</th>
              <th class="text-center">Nama Mata Kuliah</th>
              <th class="text-center">Nama Matkul Jurusan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($tb_matkul as $mpl) : ?>
              <tr>
                <td><?= ++$offset; ?></td>
                <td><?= $mpl->id_matkul; ?></td>
                <td><?= $mpl->nama_matkul; ?></td>
                <td><?= $mpl->nama_jurusan; ?></td>
                <td class="text-center">
                  <a href="<?= base_url(); ?>matkul/ubah/<?= encrypt_url($mpl->id_matkul); ?>"><button type="button" class="btn btn-success btn-circle"><i class="fas fa-fw fa-check-circle"></i></button></a></a> <b>|</b>
                  <a href="<?= base_url(); ?>matkul/hapus/<?= encrypt_url($mpl->id_matkul); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a></a>
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