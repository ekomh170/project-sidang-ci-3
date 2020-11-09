<!DOCTYPE html>
<html>
<head>
  <title>Print Data Mahasiswa</title>
  <link rel="icon" href="<?=base_url('assets/favicon/')?>favicon.ico">
  <link href="<?=base_url('assets/layout/');?>css/sb-admin-2.css" rel="stylesheet">
</head>
<body>  
  <div class="container">
    <center>
      <div class="col-xl-6 col-lg-8 col-md-6">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="card">
              <h4 class="card-header text-center font-weight-bold"><?= $judul; ?></h4>
              <div class="card-body">
                <h4 class="card-title text-left"><span class="font-weight-bold">Nama : </span><?= cetak($mahasiswa['nama']); ?></h4>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Panggilan : </span><?= cetak($mahasiswa['nama_panggilan']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nim Mahasiswa: </span><?= cetak($mahasiswa['nim_mhs']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik: </span><?= cetak($mahasiswa['nama_tahun_akademik']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= cetak($mahasiswa['nama_jurusan']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Nama Kelas : </span><?= cetak($mahasiswa['nama_kelas']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Jenis Kelamin : </span><?= cetak($mahasiswa['jenis_kelamin']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Agama : </span><?= cetak($mahasiswa['agama']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tempat Lahir : </span><?= cetak($mahasiswa['tmpt_lahir']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Tanggal Lahir : </span><?= cetak($mahasiswa['tanggal_lahir']); ?></h6>
                <h6 class="card-text text-left"><span class="font-weight-bold">Alamat : </span><?= cetak($mahasiswa['alamat']); ?></h6>
                <h6 class="card-text text-left mb-4"><span class="font-weight-bold">Nomer Telpon : </span><?= cetak($mahasiswa['no_telp']); ?></h6>
                <h6 class="card-text text-center mb-4"><img class="rounded-circle" src="<?= base_url('assets/foto/users/') . $mahasiswa['image'] ?>" height="200" width="200"></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </center>
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
