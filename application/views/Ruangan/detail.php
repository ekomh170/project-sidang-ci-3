<div class="container">
  <center>
    <div class="col-xl-6 col-lg-8 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="card">
            <h4 class="card-header text-center"><span class="font-weight-bold"><?= cetak($judul); ?></span></h4>
            <div class="card-body">
              <h4 class="card-title text-left"><span class="font-weight-bold">Kode Ruangan : </span><?= cetak($ruangan['id_ruangan']); ?></h4>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Ruangan : </span><?= cetak($ruangan['nama_ruangan']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Jenis Ruangan : </span><?= cetak($ruangan['nama_jr']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Lantai : </span><?= cetak($ruangan['lantai']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Kapasitas : </span><?= cetak($ruangan['kapasitas']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Keterangan : </span><?= cetak($ruangan['keterangan']); ?></h6>
              <span style="float:right;">
                <a href="<?= base_url(); ?>Ruangan" class="btn btn-info"> Kembali </a>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
</div>