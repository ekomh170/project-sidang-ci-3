<?php

class Kelas_model extends CI_Model
{
	public function GetDatakelas($limit, $offset, $cari_kls = '')
	{
		$this->db->select('tb_kelas.id_kelas, tb_kelas.nama_kelas, tb_kelas.status, tb_ruangan.nama_ruangan');
		$this->db->from('tb_kelas');
		$this->db->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_kelas.id_ruangan', 'left');

		if ($cari_kls != '') {
			$this->db->like('id_kelas', $cari_kls);
			$this->db->or_like('nama_kelas', $cari_kls);
			$this->db->or_like('nama_ruangan', $cari_kls);
			$this->db->or_like('tb_kelas.status', $cari_kls);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllkelas($cari_kls = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_kelas');
		$this->db->join('tb_ruangan', 'tb_ruangan.id_ruangan = tb_kelas.id_ruangan', 'left');

		if ($cari_kls != '') {
			$this->db->like('id_kelas', $cari_kls);
			$this->db->or_like('nama_kelas', $cari_kls);
			$this->db->or_like('nama_ruangan', $cari_kls);
			$this->db->or_like('tb_kelas.status', $cari_kls);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataKelas()
	{
		$count_kelas = $this->db->count_all('tb_kelas');
		$helper      = 1 + $count_kelas;
		$date        = date('s');
		$id_kelas    = "KLS" . "-" . "0" . $helper . "-" . $date;
		$nama_kelas  = $this->input->post('nama_kelas', true);
		$status      = $this->input->post('status', true);
		$id_ruangan  = $this->input->post('id_ruangan', true);

		$data = array(
			'id_kelas'   => $id_kelas,
			'nama_kelas' => $nama_kelas,
			'status'     => $status,
			'id_ruangan' => $id_ruangan
		);

		$this->db->insert('tb_kelas', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Kelas", "Menambah Data", $id_kelas, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataKelas($id_kelas)
	{
		$this->db->delete('tb_kelas', ['id_kelas' => $id_kelas]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Kelas", "Hapus Data", $id_kelas, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataKelas($id_kelas)
	{
		return $this->db->get_where('tb_kelas', ['id_kelas' => $id_kelas])->row_array();
	}

	public function CariDataKelas()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('nama_kelas', $cari);
		return $this->db->get('tb_kelas')->result_array();
	}

	public function UbahDataKelas()
	{
		$data = [
			"id_kelas"   => $this->input->post('id_kelas', true),
			"nama_kelas" => $this->input->post('nama_kelas', true),
			"status"     => $this->input->post('status', true),
			"id_ruangan" => $this->input->post('id_ruangan', true)
		];

		$this->db->where('id_kelas',  $this->input->post('id_kelas'));
		$this->db->update('tb_kelas', $data);
		$id_kelas = $this->input->post('id_kelas');
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Kelas", "Ubah Data", $id_kelas, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
