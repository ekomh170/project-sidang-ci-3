<div class="container-fluid mb-2">
    <h1 class="text-dark font-weight-bold text-center mb-2"><?= $judul; ?></h1>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
    <?php if ($this->session->flashdata('berhasil')) : ?>
    <?php endif; ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span style="float: right;">
                <form method="post" action="<?= base_url() ?>Menu" class="form-inline">
                    <input class="form-control mr-1" type="search" placeholder="Cari Data Menu" name="cari_mn" aria-label="search">
                    <button class="btn btn-outline-info my-1 my-sm-0" type="submit" name="submit" value="submit"><i class="fa fa-search"></i></button>
                </form>
            </span>
            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                <a href="<?= base_url(); ?>Menu/tambah" class="btn btn-block btn-dark bg-info"><b>+ Data Baru</b></a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="6%">No</th>
                            <th width="40%" class="text-center">Menu</th>
                            <th witdh="40%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($menu as $mn) : ?>
                            <tr>
                                <td><?= ++$offset ?></td>
                                <td><?= $mn->menu; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url(); ?>Menu/ubah/<?= encrypt_url($mn->id); ?>"><button type="button" class="btn btn-success btn-circle btn-lg"><i class="fas fa-fw fa-check-circle"></i></button></a></i></a> <b>|</b>
                                    <a href="<?= base_url(); ?>Menu/hapus/<?= encrypt_url($mn->id); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle btn-lg tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a></a>
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