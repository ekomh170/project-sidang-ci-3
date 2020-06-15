<div class="container-fluid mb-2">
    <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul ?></h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
    <?php if ($this->session->flashdata('berhasil')) : ?>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span style="float: right;">
                <form method="post" action="<?= base_url() ?>Sub" class="form-inline">
                    <input class="form-control mr-1" type="search" placeholder="Cari Data Sub" name="cari_sub" aria-label="search">
                    <button class="btn btn-outline-info my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
                </form>
            </span>
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <a href="<?= base_url(); ?>Sub/tambah" class="btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Menu</th>
                            <th>Nama Sub</th>
                            <th>Status</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($Sub as $sb) : ?>
                            <tr>
                                <td><?= ++$offset; ?></td>
                                <td><?= $sb->menu; ?></td>
                                <td><?= $sb->title; ?></td>
                                <td><?= $sb->status; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url(); ?>Sub/ubah/<?= encrypt_url($sb->id); ?>"><button type="button" class="btn btn-success btn-circle"><i class="fas fa-fw fa-check-circle"></i></button></a></a> <b>|</b>
                                    <a href="<?= base_url(); ?>Sub/hapus/<?= encrypt_url($sb->id); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a></a>
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