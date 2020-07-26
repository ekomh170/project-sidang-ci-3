<?php

class KrsDetail_model extends CI_Model
{
	public function GetDataKrsDetail($limit, $offset, $cari_krs)
	{
		$this->db->select('mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');

		if ($cari_krs != '') {
			$this->db->like('nim_mhs', $cari_krs);
			$this->db->or_like('nama', $cari_krs);
			$this->db->or_like('nama_jurusan', $cari_krs);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllKrsDetail($cari_krs)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');

		if ($cari_krs != '') {
			$this->db->like('nim_mhs', $cari_krs);
			$this->db->or_like('nama', $cari_krs);
			$this->db->or_like('nama_jurusan', $cari_krs);
		}

		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataKrsDetail()
	{
		$count_krs = $this->db->count_all('krs_detail');
		$helper    = 1 + $count_krs;
		$date      = date('s');
		
		$id_krs    = "KRS" . "-" . $helper . $date;
		$nim_mhs   = $this->input->post('nim_mhs', true);
		$id_dosen  = $this->input->post('id_dosen', true);
		$status  = $this->input->post('status', true);

		$dosen_krs = $this->db->get_where('krs_detail',
			['nim_mhs' => $nim_mhs,
			'id_dosen' => $id_dosen]
		)->row_array();

		$isi_dosen = $dosen_krs['id_dosen'] == null;
		if ($isi_dosen == false) {
			$data = $dosen_krs['id_dosen'] == $id_dosen;
			if ($data = true) {
				$id_mhs = encrypt_url($nim_mhs);
				$this->session->set_flashdata('gagal', 'File Dosen dan Mata Kuliah Tidak Boleh Sama');
				redirect(base_url('KrsDetail/detail/') . $id_mhs);
			}
		}

		$data = array(
			'id_krs'   => $id_krs,
			'nim_mhs'  => $nim_mhs,
			'id_dosen' => $id_dosen,
			'status' => $status,
		);

		$this->db->insert('krs_detail', $data);

		$total_nilai_sks = $this->Tambahan_model->TotalNilaiSks($nim_mhs);
		$nilai_total_sks = implode($total_nilai_sks);

		$count_krs_2 = $this->Tambahan_model->CountKrs($nim_mhs);
		$count_krs = implode($count_krs_2);

		if ($nilai_total_sks == $nilai_total_sks) {
			$sql = $this->db->query("SELECT SUM(nilai_krs) * 3 FROM krs_detail WHERE nim_mhs = '$nim_mhs'")->row_array();
			$sql2 = implode($sql);
			$sql3 = $sql2 / $nilai_total_sks;
			$data_krs_detail = [
				'sks_total' => $count_krs,
				'nilai_total_sks' => $nilai_total_sks,
				'ipk' => $sql3
			];
		}

		if (!$nilai_total_sks) {
			$data_krs_detail = [
				'sks_total' => $count_krs,
				'nilai_total_sks' => $nilai_total_sks
			];
		}

		$this->db->where('nim_mhs', $nim_mhs);
		$this->db->update('tb_ipk', $data_krs_detail);

		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Krs", "Menambah Data", $id_krs, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataKrsDetail($id_krs,$nim_mhs)
	{
		$this->db->delete('krs_detail', ['id_krs' => $id_krs]);

		$total_nilai_sks = $this->Tambahan_model->TotalNilaiSks($nim_mhs);
		$nilai_total_sks = implode($total_nilai_sks);

		$count_krs_2 = $this->Tambahan_model->CountKrs($nim_mhs);
		$count_krs = implode($count_krs_2);

		if ($nilai_total_sks == $nilai_total_sks) {
			$sql = $this->db->query("SELECT SUM(nilai_krs) * 3 FROM krs_detail WHERE nim_mhs = '$nim_mhs'")->row_array();
			$sql2 = implode($sql);
			$sql3 = $sql2 / $nilai_total_sks;

			$data_krs_detail = [
				'sks_total' => $count_krs,
				'nilai_total_sks' => $nilai_total_sks,
				'ipk' => $sql3
			];
		}

		if (!$nilai_total_sks) {
			$data_krs_detail = [
				'sks_total' => $count_krs,
				'nilai_total_sks' => $nilai_total_sks
			];
		}

		$this->db->where('nim_mhs', $nim_mhs);
		$this->db->update('tb_ipk', $data_krs_detail);

		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Krs", "Hapus Data", $id_krs, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}


	public function UbahDataKrsDetail()
	{
		$id_krs   = $this->input->post('id_krs', true);
		$nim_mhs   = $this->input->post('nim_mhs', true);
		$id_dosen  = $this->input->post('id_dosen', true);
		$krs  = $this->input->post('nilai_krs', true);
		$status  = $this->input->post('status', true);

		if ($krs > 3) {
			$grade = 'A';
		} elseif ($krs >  2) {
			$grade = 'B';
		} elseif ($krs >  1) {
			$grade = 'C';
		} elseif ($krs >  0) {
			$grade = 'D';
		} elseif ($krs > -1) {
			$grade = 'E';
		}

		// $dosen_krs = $this->db->get_where('krs_detail',
		// 	['nim_mhs' => $nim_mhs,
		// 	'id_dosen' => $id_dosen]
		// )->row_array();

		// $isi_dosen = $dosen_krs['id_dosen'] == null;
		// if ($isi_dosen == false) {
		// 	$data = $dosen_krs['id_dosen'] == $id_dosen;
		// 	if ($data = true) {
		// 		log_message('error','File Dosen dan Mata Kuliah Tidak Boleh Double di setiap Data Krs Mahasiswa!!');
		// 		die;
		// 	}
		// }

		$data = [
			"id_krs" => $id_krs,
			"nim_mhs"  => $nim_mhs,
			"id_dosen"  => $id_dosen,
			"nilai_krs" => $krs,
			"grade" => $grade,
			"status" => $status
		];

		$this->db->where('id_krs', $id_krs);
		$this->db->update('krs_detail', $data);

		$total_nilai_sks = $this->Tambahan_model->TotalNilaiSks($nim_mhs);
		$nilai_total_sks = implode($total_nilai_sks);

		$count_krs_2 = $this->Tambahan_model->CountKrs($nim_mhs);
		$count_krs = implode($count_krs_2);

		if ($nilai_total_sks == $nilai_total_sks) {
			$sql = $this->db->query("SELECT SUM(nilai_krs) * 3 FROM krs_detail WHERE nim_mhs = '$nim_mhs'")->row_array();
			$sql2 = implode($sql);
			$sql3 = $sql2 / $nilai_total_sks;
			$data_krs_detail = [	
				'sks_total' => $count_krs,
				'nilai_total_sks' => $nilai_total_sks,
				'ipk' => $sql3
			];
		}

		if (!$nilai_total_sks) {
			$data_krs_detail = [	
				'sks_total' => $count_krs,
				'nilai_total_sks' => $nilai_total_sks
			];
		}

		$this->db->where('nim_mhs', $nim_mhs);
		$this->db->update('tb_ipk', $data_krs_detail);

		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Krs", "Menambah Data", $id_krs, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function DetailDataKrsDetail($nim_mhs)
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


	public function KrsDataKrsDetail($nim_mhs)
	{
		$this->db->select('krs_detail.id_krs, mahasiswa.nim_mhs, mahasiswa.nama, tb_dosen.nama_dosen, tb_jurusan.nama_jurusan, tb_matkul.nama_matkul, krs_detail.nilai_krs, krs_detail.grade, krs_detail.status');
		$this->db->from('krs_detail');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = krs_detail.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = krs_detail.id_dosen', 'left');
		$this->db->join('tb_matkul', 'tb_matkul.id_matkul = tb_dosen.id_matkul', 'left');
		$this->db->where('krs_detail.nim_mhs', $nim_mhs);

		$query = $this->db->get();
		return $query->result();
	}

	public function KrsDataKrsDetailDosen($nim_mhs,$id_dosen)
	{
		$this->db->select('krs_detail.id_krs, mahasiswa.nim_mhs, mahasiswa.nama, tb_dosen.nama_dosen, tb_jurusan.nama_jurusan, tb_matkul.nama_matkul, krs_detail.nilai_krs, krs_detail.grade, krs_detail.status');
		$this->db->from('krs_detail');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = krs_detail.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = krs_detail.id_dosen', 'left');
		$this->db->join('tb_matkul', 'tb_matkul.id_matkul = tb_dosen.id_matkul', 'left');
		$this->db->where('krs_detail.nim_mhs', $nim_mhs);
		$this->db->where('tb_dosen.nama_dosen', $id_dosen);

		$query = $this->db->get();
		return $query->result();
	}

	public function inputSelectDataKrsDetail($id_krs)
	{
		$this->db->select('*');
		$this->db->from('krs_detail');
		$this->db->join('tb_dosen', 'tb_dosen.id_dosen = krs_detail.id_dosen', 'left');
		$this->db->join('tb_matkul', 'tb_matkul.id_matkul = tb_dosen.id_matkul', 'left');
		$this->db->where('krs_detail.id_krs', $id_krs);

		$query = $this->db->get();
		return $query->row_array();
	}
}
