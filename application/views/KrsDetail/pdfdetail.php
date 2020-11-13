<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pdf Data Krs Detail Mahasiswa</title>
</head>
<body>
  <div class="container">
    <center>
      <div>
        <div>
          <div>
            <div>
              <h2><b><?= $judul; ?></b></h2>
              <div>
                <span><b>NIM Mahasiswa : </b><?= cetak($data['nim_mhs']); ?></span><br>
                <span><b>Nama Mahasiswa : </b><?= cetak($data['nama']); ?></span><br>
                <span><b>Nama Fakultas : </b><?= cetak($data['nama_fakultas']); ?></span><br>
                <span><b>Nama Jurusan : </b><?= cetak($data['nama_jurusan']); ?></span><br>
                <span><b>Tahun Akademik : </b><?= cetak($data['nama_tahun_akademik']); ?></span><br>
                <span><b>Status: </b><?= $data['status']; ?></span><br><br>
                <br>
              </div>
            </div>
          </div>
        </div>
      </div>
    </center>
  </div>
  <div>
    <div>
      <div>
        <div>
          <div>
            <table  width="100%" border="1" cellspacing="3">
              <tr>
                <th>No</th>
                <th>Nama Dosen</th>
                <th>Mata Kuliah</th>
                <th>Nilai SKS</th>
                <th>Predikat</th>
                <th>Status</th>
              </tr>
              <?php
              $no = 1;
              foreach ($nilai as $nl) : ?>
                <tr>
                  <td><?= $no; ?></td>
                  <td><?= cetak($nl->nama_dosen); ?></td>
                  <td><?= cetak($nl->nama_matkul); ?></td>
                  <td><?= cetak($nl->nilai_krs); ?></td>
                  <td><?= cetak($nl->grade); ?></td>
                  <td><?= cetak($nl->status); ?></td>
                </tr>
                <?php $no++ ?>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>