<?php

class Nilai_model extends CI_Model
{
	public function GetDataNilai($limit, $offset, $cari_krs)
	{
		$this->db->select('mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan');
		$this->db->from('mahasiswa');
		$this->db->order_by('nama', 'asc');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');

		if ($cari_krs != '') {
			$this->db->like('nim_mhs', $cari_krs);
			$this->db->or_like('nama', $cari_krs);
			$this->db->or_like('nama_jurusan', $cari_krs);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllNilai($cari_krs)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');

		if ($cari_krs != '') {
			$this->db->like('nim_mhs', $cari_krs);
			$this->db->or_like('nama', $cari_krs);
			$this->db->or_like('nama_jurusan', $cari_krs);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function DetailDataNilai($nim_mhs)
	{
		$this->db->select('mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan, tb_fakultas.nama_fakultas, tb_tahun_akademik.nama_tahun_akademik, mahasiswa.status');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_fakultas', 'tb_jurusan.id_fakultas = tb_fakultas.id_fakultas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');
		$this->db->where('mahasiswa.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function NilaiDataNilai($nim_mhs)
	{
		$this->db->select('tb_nilai.id_nilai, mahasiswa.nim_mhs, mahasiswa.nama, tb_dosen.nama_dosen, tb_jurusan.nama_jurusan, tb_matkul.nama_matkul, tb_nilai.nilai_presensi ,tb_nilai.nilai_tugas, tb_nilai.nilai_uts, tb_nilai.nilai_uas, tb_nilai.total_nilai, tb_nilai.nilai_akhir, tb_nilai.grade, tb_nilai.status');
		$this->db->from('tb_nilai');
		$this->db->order_by('nama_dosen', 'asc');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = tb_nilai.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('krs_detail', 'tb_nilai.id_krs = krs_detail.id_krs', 'left');
		$this->db->join('tb_dosen', 'krs_detail.id_dosen = tb_dosen.id_dosen', 'left');
		$this->db->join('tb_matkul', 'tb_matkul.id_matkul = tb_dosen.id_matkul', 'left');
		$this->db->where('tb_nilai.nim_mhs', $nim_mhs);

		$query = $this->db->get();
		return $query->result();
	}

	public function NilaiDataNilaiDosen($nim_mhs,$id_dosen)
	{
		$data = $this->Tambahan_model->KrsDataKrsDetailDosen($nim_mhs,$id_dosen);		
		$this->db->select('tb_nilai.id_nilai, mahasiswa.nim_mhs, mahasiswa.nama, tb_dosen.nama_dosen, tb_jurusan.nama_jurusan, tb_matkul.nama_matkul, tb_nilai.nilai_presensi ,tb_nilai.nilai_tugas, tb_nilai.nilai_uts, tb_nilai.nilai_uas, tb_nilai.total_nilai, tb_nilai.nilai_akhir, tb_nilai.grade, tb_nilai.status');
		$this->db->from('tb_nilai');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = tb_nilai.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('krs_detail', 'tb_nilai.id_krs = krs_detail.id_krs', 'left');
		$this->db->join('tb_dosen', 'krs_detail.id_dosen = tb_dosen.id_dosen', 'left');
		$this->db->join('tb_matkul', 'tb_matkul.id_matkul = tb_dosen.id_matkul', 'left');
		$this->db->where('tb_nilai.nim_mhs', $nim_mhs);
		$this->db->where('tb_nilai.id_krs', $data['id_krs']);

		$query = $this->db->get();
		return $query->result();
	}


	public function TambahDataKrsDetail()
	{
		$count_nil = $this->db->count_all('tb_nilai');
		$helper    = 1 + $count_nil;
		$date      = date('s');

		$id_nilai    = "NLI" . "-" . $helper . $date;
		$nim_mhs   = $this->input->post('nim_mhs', true);
		$id_krs  = $this->input->post('id_krs', true);
		$status  = $this->input->post('status', true);

		$dosen_nilai = $this->db->get_where('tb_nilai',
			['nim_mhs' => $nim_mhs,
			'id_krs'  => $id_krs 
		])->row_array();

		$isi_dosen = $dosen_nilai['id_krs'] == null;
		if ($isi_dosen == false) {
			$data = $dosen_nilai['id_krs'] == $id_krs;
			if ($data = true) {
				echo "File Dosen dan Mata Kuliah Tidak Boleh Double di setiap Data Krs Mahasiswa!!";
				die;
			}
		}

		$data = array(
			'id_nilai'   => $id_nilai,
			'nim_mhs'    => $nim_mhs,
			'id_krs'   => $id_krs,
			'status'   	 => $status,
		);

		$this->db->insert('tb_nilai', $data);

		$count_nln_2 = $this->Tambahan_model->CountNilai($nim_mhs);
		$count_nln = implode($count_nln_2);

		$data_nln_to_ipk = [
			'bobot_total' => $count_nln,
		];

		$this->db->where('nim_mhs', $nim_mhs);
		$this->db->update('tb_ipk', $data_nln_to_ipk);

		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Nilai", "Menambah Data", $id_nilai, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataKrsDetail($id_nilai)
	{
		$this->db->delete('tb_nilai', ['id_nilai' => $id_nilai]);

		$count_nln_2 = $this->Tambahan_model->CountNilai($nim_mhs);
		$count_nln = implode($count_nln_2);

		$data_nln_to_ipk = [
			'bobot_total' => $count_nln,
		];

		$this->db->where('nim_mhs', $nim_mhs);
		$this->db->update('tb_ipk', $data_nln_to_ipk);

		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Nilai", "Hapus Data", $id_nilai, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}


	public function UbahDataKrsDetail()
	{
		$id_nilai  = $this->input->post('id_nilai', true);
		$nim_mhs   = $this->input->post('nim_mhs', true);
		$id_krs    = $this->input->post('id_krs', true);
		$status    = $this->input->post('status', true);
		$a         = $this->input->post('nilai_presensi', true);
		$b         = $this->input->post('nilai_tugas', true);
		$c         = $this->input->post('nilai_uts', true);
		$d         = $this->input->post('nilai_uas', true);
		$jumlah    = $a + $b + $c + $d;
		$data_jmlh = number_format($jumlah) / 40;

		if ($data_jmlh > 9) {
			$grade = 'A';
		} elseif ($data_jmlh >= 8 && $data_jmlh > 7) {
			$grade = "B";
		} elseif ($data_jmlh >= 6 && $data_jmlh > 5) {
			$grade = "C";
		} else {
			$grade = "D";
		}

		$data = [
			"id_nilai"   	 => $id_nilai,
			"nim_mhs"    	 => $nim_mhs,
			"id_krs"   		 => $id_krs,
			"nilai_presensi" => $a,
			"nilai_tugas"    => $b,
			"nilai_uts"      => $c,
			"nilai_uas"      => $d,
			"total_nilai"    => $jumlah,
			"nilai_akhir"    => $data_jmlh,
			"grade"          => $grade,
			"status"   	 	 => $status,
		];

		$this->db->where('id_nilai',  $this->input->post('id_nilai'));
		$this->db->update('tb_nilai', $data);

		$count_nln_2 = $this->Tambahan_model->CountNilai($nim_mhs);
		$count_nln = implode($count_nln_2);

		$data_nln_to_ipk = [
			'bobot_total' => $count_nln,
		];

		$this->db->where('nim_mhs', $nim_mhs);
		$this->db->update('tb_ipk', $data_nln_to_ipk);

		$id_nilai = $this->input->post('id_nilai', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Nilai", "Ubah Data", $id_nilai, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function inputSelectDataKrsDetail($id)
	{
		$this->db->select('*');
		$this->db->from('tb_nilai');
		$this->db->join('krs_detail', 'tb_nilai.id_krs = krs_detail.id_krs', 'left');
		$this->db->join('tb_dosen', 'krs_detail.id_dosen = tb_dosen.id_dosen', 'left');
		$this->db->join('tb_matkul', 'tb_dosen.id_matkul = tb_matkul.id_matkul', 'left');
		$this->db->where('tb_nilai.id_nilai', $id);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function getNilaiPrint()
	{
		$this->db->select('mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		
		$query = $this->db->get();
		return $query->result();
	}
}
