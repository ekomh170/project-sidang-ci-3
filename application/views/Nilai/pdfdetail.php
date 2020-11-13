<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pdf Data Nilai Akhir Mahasiswa</title>
</head>
<body>
  <div>
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
                <th>Nilai Presensi</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Total Nilai</th>
                <th>Nilai Akhir</th>
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
                  <td><?= cetak($nl->nilai_presensi); ?></td>
                  <td><?= cetak($nl->nilai_tugas); ?></td>
                  <td><?= cetak($nl->nilai_uts); ?></td>
                  <td><?= cetak($nl->nilai_uas); ?></td>
                  <td><?= cetak($nl->total_nilai); ?></td>
                  <td><?= cetak($nl->nilai_akhir); ?></td>
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
</body>
</html>