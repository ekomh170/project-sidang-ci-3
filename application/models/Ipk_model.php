<?php

class Ipk_model extends CI_Model
{
	public function GetDataIpk($limit, $offset, $cari_ipk)
	{
		$this->db->select('tb_ipk.id_ipk, mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan, tb_ipk.sks_total, tb_ipk.bobot_total, tb_ipk.nilai_total_sks, tb_ipk.ipk');
		$this->db->from('tb_ipk');
		$this->db->order_by('nama', 'asc');
		$this->db->join('mahasiswa', 'tb_ipk.nim_mhs = mahasiswa.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');

		if ($cari_ipk != '') {
			$this->db->like('id_ipk', $cari_ipk);
			$this->db->or_like('nim_mhs', $cari_ipk);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllIpk($cari_ipk)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_ipk');
		$this->db->join('mahasiswa', 'tb_ipk.nim_mhs = mahasiswa.nim_mhs', 'left');

		if ($cari_ipk != '') {
			$this->db->like('id_ipk', $cari_ipk);
			$this->db->or_like('nim_mhs', $cari_ipk);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataIpk()
	{
		$count_ipk = $this->db->count_all('tb_ipk');
		$helper    = 1 + $count_ipk;
		$date      = date('s');

		$id_ipk    = "IPK" . "-" . $helper . $date;
		$nim_mhs   = $this->input->post('nim_mhs', true);

		$data = array(
			'id_ipk'   => $id_ipk,
			'nim_mhs'  => $nim_mhs,
		);

		$this->db->insert('tb_ipk', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Ipk", "Menambah Data", $id_ipk, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function DetailDataIpk($nim_mhs)
	{
		$this->db->select('tb_ipk.id_ipk, mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan, tb_fakultas.nama_fakultas, tb_tahun_akademik.nama_tahun_akademik, mahasiswa.status');
		$this->db->from('tb_ipk');
		$this->db->join('mahasiswa', 'mahasiswa.nim_mhs = tb_ipk.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');
		$this->db->join('tb_fakultas', 'tb_jurusan.id_fakultas = tb_fakultas.id_fakultas', 'left');
		$this->db->join('tb_tahun_akademik', 'tb_tahun_akademik.id_tahun_akademik = mahasiswa.id_tahun_akademik', 'left');
		$this->db->where('mahasiswa.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}


	public function NilaiDataIpk($nim_mhs)
	{
		$this->db->select('tb_ipk.id_ipk, mahasiswa.nim_mhs, mahasiswa.nama, tb_ipk.sks_total, tb_ipk.bobot_total, tb_ipk.nilai_total_sks, tb_ipk.ipk');
		$this->db->from('tb_ipk');
		$this->db->join('mahasiswa', 'tb_ipk.nim_mhs = mahasiswa.nim_mhs', 'left');
		$this->db->where('tb_ipk.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->result();
	}

	public function HapusDataIpk($id_ipk)
	{
		$this->db->delete('tb_ipk', ['id_ipk' => $id_ipk]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Ipk", "Hapus Data", $id_ipk, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}



	public function UbahDataIpk()
	{
		$this->input->post('sks_total', true);
		$this->input->post('bobot_total', true);
		$this->input->post('nilai_total_sks', true);
		$this->input->post('ipk', true);

		$data = [
			"sks_total"       => $this->input->post('sks_total', true),
			"bobot_total"     => $this->input->post('bobot_total', true),
			"nilai_total_sks" => $this->input->post('nilai_total_sks', true),
			"ipk"             => $this->input->post('ipk', true),
		];

		$this->db->where('id_ipk',  $this->input->post('id_ipk'));
		$this->db->update('tb_ipk', $data);
		$id_ipk = $this->input->post('id_ipk', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Ipk", "Menambah Data", $id_ipk, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function getIpkPrint()
	{
		$this->db->select('tb_ipk.id_ipk, mahasiswa.nim_mhs, mahasiswa.nama, tb_jurusan.nama_jurusan, tb_ipk.sks_total, tb_ipk.bobot_total, tb_ipk.nilai_total_sks, tb_ipk.ipk');
		$this->db->from('tb_ipk');
		$this->db->join('mahasiswa', 'tb_ipk.nim_mhs = mahasiswa.nim_mhs', 'left');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = mahasiswa.id_jurusan', 'left');

		$query = $this->db->get();
		return $query->result();
	}
}
