<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pdf Data Transkip Nilai Mahasiswa yang sudah mulai di rekap</title>
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
            <table width="100%" border="1" cellspacing="3">
              <tr>
                <th><center>No</center></th>
                <th><center>Nama Dosen</center></th>
                <th><center>Nama Mata Kuliah</center></th>
                <th><center>Nilai SKS</center></th>
                <th><center>Nilai Akhir</center></th>
              </tr>
              <?php
              $no = 1;
              foreach ($nilai as $tn) : ?>
                <tr>
                  <td width="20%"><center><?= $no; ?></center></td>
                  <td><center><?= cetak($tn->nama_dosen); ?></center></td>
                  <td><center><?= cetak($tn->nama_matkul); ?></center></td>
                  <td><center><?= cetak($tn->nilai_krs); ?></center></td>
                  <td><center><?= cetak($tn->nilai_akhir); ?></center></td>
                  <!--<td><?= $tn->status; ?></td>-->
                </tr>
                <?php $no++ ?>
              <?php endforeach; ?>
              <?php foreach ($ipk as $value) : ?>
                <tr>
                  <th><center>Total Nilai SKS :</center></th>
                  <td><center><?= cetak($value->sks_total); ?></center></td>
                  <td><center><?= cetak($value->nilai_total_sks); ?></center></td>
                  <td><center><?= cetak($value->bobot_total); ?></center></td>             
                </tr>
                <tr>
                  <th class="center"><center>Nilai Index Prestasi Kelulusan : </center></th>
                  <td><center><?= cetak($value->ipk); ?></center></td>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>