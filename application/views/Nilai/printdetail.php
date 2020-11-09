<!DOCTYPE html>
<html>
<head>
  <title>Print Data Krs Detail</title>
  <link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
  <link href="<?=base_url('assets/layout/');?>css/sb-admin-2.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
    <?php if ($this->session->flashdata('berhasil')) : ?>
    <?php endif; ?>
    <center>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h4 class="card-header text-center"><span class="font-weight-bold"><?= $judul; ?></span></h4>
              <div class="card-body">
                <h4 class="card-text text-left"><span class="font-weight-bold">NIM Mahasiswa : </span><?= cetak($data['nim_mhs']); ?></h4>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Mahasiswa : </span><?= cetak($data['nama']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Fakultas : </span><?= cetak($data['nama_fakultas']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= cetak($data['nama_jurusan']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik : </span><?= cetak($data['nama_tahun_akademik']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Status : </span><?= cetak($data['status']); ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </center>
    <div class="container">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Dosen</th>
                  <th>Mata Kuliah</th>
                  <th>Presensi</th>
                  <th>Tugas</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th>Total Nilai</th>
                  <th>Nilai Akhir</th>
                  <th>Predikat</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($nilai as $nl) : ?>
                  <td><?= $no; ?></td>
                  <td><?= cetak($nl->nama_dosen); ?></td>
                  <td><?= cetak($nl->nama_matkul); ?></td>
                  <td><?= cetak($nl->nilai_presensi); ?></td>
                  <td><?= cetak($nl->nilai_tugas); ?></td>
                  <td><?= cetak($nl->nilai_uts); ?></td>
                  <td><?= cetak($nl->nilai_uas); ?></td>
                  <td><?= cetak($nl->total_nilai); ?></td>
                  <td><?= cetak($nl->nilai_akhir); ?></td>
                  <td><?= cetak($nl->grade); ?></td>
                  <td><?= cetak($nl->status); ?></td>
              </tbody>
              <?php $no++ ?>
            <?php endforeach; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?=base_url('assets/layout/');?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url('assets/layout/');?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?=base_url('assets/layout/');?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/layout/');?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url('assets/layout/');?>js/demo/datatables-demo.js"></script>

<script>
  window.print();
</script>
