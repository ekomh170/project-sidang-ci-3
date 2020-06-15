<div class="container">
    <center>
        <div class="col-xl-6 col-lg-8 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="card">
                        <h4 class="card-header text-center font-weight-bold"><?= $judul; ?></h4>
                        <div class="card-body">
                            <h5 class="card-title text-left"><span class="font-weight-bold">Nama Lengkap : </span><?= $tb_dosen['nama_dosen']; ?></h5>
                            <h5 class="card-title text-left"><span class="font-weight-bold">Nama Panggilan : </span><?= $tb_dosen['nama_panggilan'] ?></h5>
                            <h6 class="card-text text-left"><span class="font-weight-bold">Kode Dosen : </span ><?= $tb_dosen['id_dosen']; ?></h6>
                            <h6 class="card-text text-left"><span class="font-weight-bold">Kode Mata Kuliah : </span><?= $tb_dosen['nama_matkul']; ?></h6>
                            <h6 class="card-text text-left"><span class="font-weight-bold">Jenis Kelamin : </span><?= $tb_dosen['jenis_kelamin']; ?></h6>
                            <h6 class="card-text text-left"><span class="font-weight-bold">Agama : </span><?= $tb_dosen['agama']; ?></h6>
                            <h6 class="card-text text-left"><span class="font-weight-bold">Tempat Lahir : </span><?= $tb_dosen['tmpt_lahir']; ?></h6>
                            <h6 class="card-text text-left"><span class="font-weight-bold">Tanggal Lahir : </span><?= $tb_dosen['tanggal_lahir']; ?></h6>
                            <h6 class="card-text text-left"><span class="font-weight-bold">Alamat : </span><?= $tb_dosen['alamat']; ?></h6>
                            <h6 class="card-text text-left mb-4"><span class="font-weight-bold">Nomor Telpon : </span><?= $tb_dosen['no_telp']; ?></h6>
                            <h6 class="card-text text-center mb-4"><img class="rounded-circle" src="<?= base_url('assets/foto/dosen') . $tb_dosen['image'] ?>" height="200" width="200"></h6>
                            <span style="float: right;">
                                <a href="<?= base_url(); ?>dosen" class="btn btn-info"> Kembali </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </center>
</div>