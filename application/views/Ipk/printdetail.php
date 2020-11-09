<!DOCTYPE html>
<html>
<head>
  <title>Print Data Tahun Akademik</title>
  <link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
  <link href="<?=base_url('assets/layout/');?>css/sb-admin-2.css" rel="stylesheet">
</head>
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