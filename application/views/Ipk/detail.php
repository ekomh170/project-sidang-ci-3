<div class="container">
  <center>
    <div class="col-xl-6 col-lg-8 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="card">
            <h4 class="card-header text-center font-weight-bold"><?= $judul; ?></h4>
            <div class="card-body">
              <h4 class="card-text text-left"><span class="font-weight-bold">NIM Mahasiswa : </span><?= $data['nim_mhs']; ?></h4>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Mahasiswa : </span><?= $data['nama']; ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Fakultas : </span><?= $data['nama_fakultas']; ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= $data['nama_jurusan']; ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik : </span><?= $data['nama_tahun_akademik']; ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Status : </span><?= $data['status']; ?></h6>
              <span style="float: right;">
                <a href="<?= base_url(); ?>Ipk" class="btn btn-info"> Kembali </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Kode Ipk</th>
                <th>Jumlah SKS</th>
                <th>Nilai Seluruh Sks</th>
                <th>Nilai Total Bobot</th>
                <th>Nilai Ipk</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($nilai as $nl) : ?>
                <td><?= $no; ?></td>
                <td><?= $nl->id_ipk; ?></td>
                <td><?= $nl->sks_total; ?></td>
                <td><?= $nl->nilai_total_sks; ?></td>
                <td><?= $nl->bobot_total; ?></td>
                <td><?= $nl->ipk; ?></td>
                <td>
                  <a href="<?= base_url(); ?>Ipk/ubah/<?= encrypt_url($nl->id_ipk); ?>"><button type="button" class="btn btn-success btn-circle"><i class="fas fa-fw fa-check-circle"></i></button></a> <b>|</b>
                  <a href="<?= base_url(); ?>Ipk/hapus/<?= encrypt_url($nl->id_ipk); ?>" class="tombol-hapus"><button type="button" class="btn btn-danger btn-circle tombol-hapus"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
                </td>
            </tbody>
            <?php $no++ ?>
          <?php endforeach; ?>
          </table>
          <?php echo $this->pagination->create_links(); ?>
        </div>
      </div>
    </div>
  </div>
</div>

</div>