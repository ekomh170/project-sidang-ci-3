<?php

class TranskripNilai_model extends CI_Model
{
	public function GetDataTranskripNilai($limit, $offset, $cari_tn)
	{
		$this->db->select('tb_transkrip_nilai.id_transkrip_nilai, tb_transkrip_nilai.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan');
		$this->db->from('tb_transkrip_nilai');
		$this->db->order_by('nama', 'asc');
		$this->db->join('mahasiswa', 'tb_transkrip_nilai.nim_mhs = mahasiswa.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');


		if ($cari_tn != '') {
			$this->db->like('id_transkrip_nilai', $cari_tn);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllTranskripNilai($cari_tn)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_transkrip_nilai');
		$this->db->join('mahasiswa', 'tb_transkrip_nilai.nim_mhs = mahasiswa.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');

		if ($cari_tn != '') {
			$this->db->like('id_transkrip_nilai', $cari_tn);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataTranskripNilai()
	{
		$count_tn = $this->db->count_all('tb_transkrip_nilai');
		$helper   = 1 + $count_tn;
		$date     = date('s');

		$id_tn    = "TN" . "-" . $helper . $date;
		$nim_mhs  = $this->input->post('nim_mhs', true);
		$status  = $this->input->post('status', true);

		$data = array(
			'id_transkrip_nilai' => $id_tn,
			'nim_mhs'            => $nim_mhs,
			'status'            => $status,
		);

		$this->db->insert('tb_transkrip_nilai', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Transkrip Nilai", "Menambah Data", $id_tn, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function DetailDataTranskripNilai($nim_mhs)
	{
		$this->db->select('tb_transkrip_nilai.id_transkrip_nilai, mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan, tb_fakultas.nama_fakultas, tb_tahun_akademik.nama_tahun_akademik, mahasiswa.status');
		$this->db->from('tb_transkrip_nilai');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = tb_transkrip_nilai.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('tb_fakultas', 'tb_jurusan.id_fakultas = tb_fakultas.id_fakultas', 'left');
		$this->db->join('tb_tahun_akademik', 'tb_tahun_akademik.id_tahun_akademik = mahasiswa.id_tahun_akademik', 'left');
		$this->db->where('tb_transkrip_nilai.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function NilaiDataTranskripNilai($nim_mhs)
	{
		$this->db->select('krs_detail.id_krs, mahasiswa.nim_mhs, mahasiswa.nama, tb_dosen.nama_dosen, tb_jurusan.nama_jurusan, tb_matkul.nama_matkul, krs_detail.nilai_krs, tb_nilai.nilai_akhir');
		$this->db->from('krs_detail');
		$this->db->order_by('nama_dosen', 'asc');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = krs_detail.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('tb_dosen', 'krs_detail.id_dosen = tb_dosen.id_dosen', 'left');
		$this->db->join('tb_nilai', 'krs_detail.id_krs = tb_nilai.id_krs', 'left');	
		$this->db->join('tb_matkul', 'tb_matkul.id_matkul = tb_dosen.id_matkul', 'left');
		$this->db->where('krs_detail.nim_mhs', $nim_mhs);

		$query = $this->db->get();
		return $query->result();
	}

	public function IpkDataTranskripNilai($nim_mhs)
	{
		$this->db->select('*');
		$this->db->from('tb_ipk');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = tb_ipk.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('tb_transkrip_nilai', 'tb_ipk.nim_mhs = tb_transkrip_nilai.nim_mhs', 'left');
		$this->db->where('tb_ipk.nim_mhs', $nim_mhs);

		$query = $this->db->get();
		return $query->result();
	}

	public function HapusDataTranskripNilai($id_transkrip_nilai)
	{
		$this->db->delete('tb_transkrip_nilai', ['id_transkrip_nilai' => $id_transkrip_nilai]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Transkrip Nilai", "Hapus Data", $id_transkrip_nilai, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function UbahDataTranskripNilai()
	{
		$data = [
			"id_transkrip_nilai" => $this->input->post('id_transkrip_nilai', true),
			"nim_mhs"     		 => $this->input->post('nim_mhs', true),
			"status" 			 => $this->input->post('status', true),
		];

		$this->db->where('id_transkrip_nilai',  $this->input->post('id_transkrip_nilai'));
		$this->db->update('tb_transkrip_nilai', $data);
		$id_transkrip_nilai = $this->input->post('id_transkrip_nilai', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data TranskripNilai", "Menambah Data", $id_transkrip_nilai, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function inputSelectDataTranskripNilai($id_transkrip_nilai)
	{
		$this->db->select('*');
		$this->db->from('tb_transkrip_nilai');
		$this->db->join('mahasiswa', 'tb_transkrip_nilai.nim_mhs = mahasiswa.nim_mhs', 'left');
		$this->db->where('tb_transkrip_nilai.id_transkrip_nilai', $id_transkrip_nilai);
		
		$query = $this->db->get();
		return $query->row_array();
	}

	public function getTnPrint()
	{
		$this->db->select('tb_transkrip_nilai.id_transkrip_nilai, tb_transkrip_nilai.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan');
		$this->db->from('tb_transkrip_nilai');
		$this->db->join('mahasiswa', 'tb_transkrip_nilai.nim_mhs = mahasiswa.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');

		$query = $this->db->get();
		return $query->result();
	}
}
