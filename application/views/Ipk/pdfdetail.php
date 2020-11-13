<!DOCTYPE html>
<html>
<head>
  <title>Laporan Pdf Data Ipk Mahasiswa</title>
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
               <th>Kode Ipk</th>
               <th>Jumlah SKS</th>
               <th>Nilai Seluruh Sks</th>
               <th>Nilai Total Bobot</th>
               <th>Nilai Ipk</th>
             </tr>
             <?php
             $no = 1;
             foreach ($ipk as $ip) : ?>
             <tr>
               <td><?= $no; ?></td>
               <td><?= cetak($ip->id_ipk); ?></td>
               <td><?= cetak($ip->sks_total); ?></td>
               <td><?= cetak($ip->nilai_total_sks); ?></td>
               <td><?= cetak($ip->bobot_total); ?></td>
               <td><?= cetak($ip->ipk); ?></td>
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