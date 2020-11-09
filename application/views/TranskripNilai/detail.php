<div class="container">
  <center>
    <div class="col-xl-6 col-lg-8 col-md-6">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="card">
            <h4 class="card-header text-center"><b><?= $judul; ?></b></h4>
            <div class="card-body">
              <h4 class="card-text text-left"><span class="font-weight-bold">NIM Mahasiswa : </span><?= cetak($data['nim_mhs']); ?></h4>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Mahasiswa : </span><?= cetak($data['nama']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Fakultas : </span><?= cetak($data['nama_fakultas']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Nama Jurusan : </span><?= cetak($data['nama_jurusan']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Tahun Akademik : </span><?= cetak($data['nama_tahun_akademik']); ?></h6>
              <h6 class="card-text text-left"><span class="font-weight-bold">Status: </span><?= cetak($data['status']); ?></h6>
              <br>
              <?php if ($this->session->userdata('id_role') != "2"): ?>
                <span style="float: left;">
                  <a href="<?= base_url(); ?>TranskripNilai/printdetail/<?= encrypt_url($data['nim_mhs']);?>" class="btn btn-dark"  style="background-color: darkblue;"> Print </a>
                </span>
                <span style="float: right;">
                  <a href="<?= base_url(); ?>TranskripNilai" class="btn btn-dark"  style="background-color: darkblue;"> Kembali </a>
                </span>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>
  <div class="container">
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Dosen</th>
                  <th>Nama Mata Kuliah</th>
                  <th>Nilai SKS</th>
                  <th>Nilai Akhir</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($nilai as $tn) : ?>
                  <td><?= $no; ?></td>
                  <td><?= cetak($tn->nama_dosen); ?></td>
                  <td><?= cetak($tn->nama_matkul); ?></td>
                  <td><?= cetak($tn->nilai_krs); ?></td>
                  <td><?= cetak($tn->nilai_akhir); ?></td>
                  <!--<td><?= $tn->status; ?></td>-->
                </tbody>
                <?php $no++ ?>
              <?php endforeach; ?>
              <?php foreach ($ipk as $value) : ?>
                <tr>
                  <th colspan="2">Total Nilai SKS : </th>
                  <td class="center"><?= cetak($value->sks_total); ?></td>
                  <td class="center"><?= cetak($value->nilai_total_sks); ?></td>
                  <td class="center"><?= cetak($value->bobot_total); ?></td>             
                </tr>
                <tr>
                  <th colspan="4">Nilai Index Prestasi Kelulusan : </th>
                  <td class="text-center"><?= cetak($value->ipk); ?></td>
                </tr>
              <?php endforeach; ?>
            </table>
            <?php echo $this->pagination->create_links(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>