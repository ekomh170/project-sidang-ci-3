<div class="container-fluid mb-2">
    <h1 class="text-dark font-weight-bold text-center mb-4"><?= $judul; ?></h1>
    <form action="<?= base_url('Role/roleAccess/') ?>" method="post">
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
        <?php if ($this->session->flashdata('berhasil')) : ?>
        <?php endif; ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark"> Role : <?= $role['role']; ?></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th width="6%">No</th>
                                <th width="40%" class="text-center">Menu</th>
                                <th class="text-center">Status</th>
                                <th witdh="40%" class="text-center">Akses</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($menu as $mn) :
                                $id_menu = $mn['id_menu'];
                                $title = $mn['title'];
                                $status  = $mn['status'];

                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $title; ?></td>
                                    <td><?= $status; ?></td>
                                    <td class="text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $id_menu); ?> data-role="<?= $role['id'] ?>" data-menu="<?= $id_menu ?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php $no++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </form>
</div>