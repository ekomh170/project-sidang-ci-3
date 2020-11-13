<div class="container">
  <center>
    <div class="col-xl-6 col-lg-8 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="card">
            <h4 class="card-header text-center font-weight-bold"><?= $judul; ?></h4>
            <div class="card-body">
              <h4 class="card-text text-left"><span class="font-weight-bold">NIM Mahasiswa : </span><?= cetak($data['nim_mhs']); ?></h4>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Mahasiswa : </span><?= cetak($data['nama']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Fakultas : </span><?= cetak($data['nama_fakultas']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= cetak($data['nama_jurusan']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik : </span><?= cetak($data['nama_tahun_akademik']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Status : </span><?= cetak($data['status']); ?></h6>
              <br>
              <?php if ($this->session->userdata('id_role') != "2"): ?>
                <span style="float: left;">
                  <div>
                    <span style="float:left;">
                      <a href="<?= base_url(); ?>Ipk/printdetail/<?= encrypt_url($data['nim_mhs']); ?>"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-print"></i></button></a> |
                      <a href="<?= base_url(); ?>Ipk/pdfdetail/<?= encrypt_url($data['nim_mhs']); ?>"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-pdf"></i></button></a> |
                      <a href="<?= base_url(); ?>Ipk/exceldetail/<?= encrypt_url($data['nim_mhs']); ?>"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-excel"></i></button></a>
                    </span>
                  </div>
                </span>
                <span style="float: right;">
                  <a href="<?= base_url(); ?>Ipk" class="btn btn-dark" style="background-color: darkblue;"> Kembali </a>
                </span>
              <?php endif ?>
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
                <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") { ?>
                  <th>Aksi</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              foreach ($nilai as $nl) : ?>
                <td><?= $no; ?></td>
                <td><?= cetak($nl->id_ipk); ?></td>
                <td><?= cetak($nl->sks_total); ?></td>
                <td><?= cetak($nl->nilai_total_sks); ?></td>
                <td><?= cetak($nl->bobot_total); ?></td>
                <td><?= cetak($nl->ipk); ?></td>
                <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") { ?>
                  <td>
                    <a href="<?= base_url(); ?>Ipk/ubah/<?= encrypt_url($nl->id_ipk); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-check-circle"></i></button></a> <b>|</b>
                    <a href="<?= base_url(); ?>Ipk/hapus/<?= encrypt_url($nl->id_ipk); ?>" class="tombol-hapus"><button type="button" class="btn btn-dark btn-circle tombol-hapus" style="background-color: darkblue;"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
                  </td>
                <?php } ?>
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