<div class="container">
  <div class="flash-data" data-flashdata="<?= $this->session->flashdata('berhasil'); ?>"></div>
  <?php if ($this->session->flashdata('berhasil')) : ?>
  <?php endif; ?>
  <center>
    <div class="col-xl-6 col-lg-8 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="card">
            <h4 class="card-header text-center"><b><?= $judul; ?></b></h4>
            <div class="card-body">
              <h4 class="card-text text-left"><b>NIM Mahasiswa : </b><?= cetak($data['nim_mhs']); ?></h4>
              <h6 class="card-text text-left"><b>Nama Mahasiswa : </b><?= cetak($data['nama']); ?></h6>
              <h6 class="card-text text-left"><b>Nama Fakultas : </b><?= cetak($data['nama_fakultas']); ?></h6>
              <h6 class="card-text text-left"><b>Nama Jurusan : </b><?= cetak($data['nama_jurusan']); ?></h6>
              <h6 class="card-text text-left"><b>Tahun Akademik : </b><?= cetak($data['nama_tahun_akademik']); ?></h6>
              <h6 class="card-text text-left"><b>Status: </b><?= $data['status']; ?></h6>
              <br>
              <?php if ($this->session->userdata('id_role') != "2"): ?>
                <div>
                  <span style="float:left;">
                    <a href="<?= base_url(); ?>KrsDetail/printdetail/<?= encrypt_url($data['nim_mhs']); ?>"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-print"></i></button></a> |
                    <a href="<?= base_url(); ?>KrsDetail/pdfdetail/<?= encrypt_url($data['nim_mhs']); ?>"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-pdf"></i></button></a> |
                    <a href="<?= base_url(); ?>KrsDetail/exceldetail/<?= encrypt_url($data['nim_mhs']); ?>"><button type="button" target="_BLANK" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-file-excel"></i></button></a>
                  </span>
                </div>
                <span style="float: right;">
                  <a href="<?= base_url(); ?>KrsDetail" class="btn btn-dark" style="background-color: darkblue;"> Kembali </a>
                <?php endif ?>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </center>
</div>
<div class="container">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4"): ?>
      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>KrsDetail/tambah/<?= encrypt_url($data['nim_mhs']); ?>" class=" btn btn-block btn-dark" style="background-color: darkblue;"><b>+ Data Baru</b></a>
      </div>
    <?php endif ?>
    <?php if ($this->session->userdata('id_role') == "3"): ?>
      <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
        <a href="<?= base_url(); ?>KrsDetail/tmbltambah/<?= encrypt_url($data['nim_mhs']); ?>" class=" btn btn-block btn-dark bg-info"><b>+ Tambah Nilai</b></a>
      </div>
    <?php endif ?>
  </div>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered text-center" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dosen</th>
                <th>Mata Kuliah</th>
                <th>Nilai SKS</th>
                <th>Predikat</th>
                <th>Status</th>
                <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") { ?>
                  <th class="text-center">Aksi</th>
                <?php } ?>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                $no = 1;
                foreach ($nilai as $nl) : ?>
                  <td><?= $no; ?></td>
                  <td><?= cetak($nl->nama_dosen); ?></td>
                  <td><?= cetak($nl->nama_matkul); ?></td>
                  <td><?= cetak($nl->nilai_krs); ?></td>
                  <td><?= cetak($nl->grade); ?></td>
                  <td><?= cetak($nl->status); ?></td>
                  <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "3" || $this->session->userdata('id_role') == "5") { ?>
                    <td>
                      <center>
                       <a href="<?= base_url(); ?>KrsDetail/ubah/<?= encrypt_url($nl->id_krs); ?>"><button type="button" class="btn btn-dark btn-circle" style="background-color: darkblue;"><i class="fas fa-fw fa-edit"></i></button></a> 
                        <?php if ($this->session->userdata('id_role') == "1" || $this->session->userdata('id_role') == "4"): ?>
                        <b>|</b>
                       <a href="<?= base_url(); ?>KrsDetail/hapus/<?= encrypt_url($nl->id_krs); ?>" class="tombol-hapus"><button type="button" class="btn btn-dark btn-circle tombol-hapus" style="background-color: darkblue;"><i class="fas fa-fw fa-trash tombol-hapus"></i></button></a>
                     <?php endif ?>
                   </center>
                 </td>
               <?php } ?>
             </tr>
           </tbody>
           <?php $no++ ?>
         <?php endforeach; ?>
       </table>
     </div>
   </div>
 </div>
</div>
</div>
</div>