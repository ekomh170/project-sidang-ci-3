<?php

class Ruangan_model extends CI_Model
{
	public function GetDataRuangan($limit, $offset, $cari_rgn)
	{
		$this->db->select('tb_ruangan.id_ruangan, tb_ruangan_jenis.nama_jr, tb_ruangan.nama_ruangan');
		$this->db->from('tb_ruangan');
		$this->db->join('tb_ruangan_jenis', 'tb_ruangan.id_jenis_ruangan = tb_ruangan_jenis.id_jenis_ruangan', 'left');

		if ($cari_rgn != '') {
			$this->db->like('id_ruangan', $cari_rgn);
			$this->db->or_like('nama_jr', $cari_rgn);
			$this->db->or_like('nama_ruangan', $cari_rgn);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllRuangan($cari_rgn)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_ruangan');
		$this->db->join('tb_ruangan_jenis', 'tb_ruangan.id_jenis_ruangan = tb_ruangan_jenis.id_jenis_ruangan', 'left');

		if ($cari_rgn != '') {
			$this->db->like('id_ruangan', $cari_rgn);
			$this->db->or_like('nama_jr', $cari_rgn);
			$this->db->or_like('nama_ruangan', $cari_rgn);
		}

		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataRuangan()
	{
		$count_rgn   	   = $this->db->count_all('tb_ruangan');
		$helper            = 1 + $count_rgn;
		$date              = date('s');

		$id_ruangan       = "RGN" . "-" . $helper . $date;
		$id_jenis_ruangan = $this->input->post('id_jenis_ruangan', true);
		$nama_ruangan     = $this->input->post('nama_ruangan', true);
		$lantai           = $this->input->post('lantai', true);
		$kapasitas        = $this->input->post('kapasitas', true);
		$keterangan       = $this->input->post('keterangan', true);
		$status           = $this->input->post('status', true);

		$data = array(
			'id_ruangan'       => $id_ruangan,
			'id_jenis_ruangan' => $id_jenis_ruangan,
			'nama_ruangan'     => $nama_ruangan,
			'lantai'           => $lantai,
			'kapasitas'        => $kapasitas,
			'keterangan'       => $keterangan,
			'status'           => $status
		);

		$this->db->insert('tb_ruangan', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Ruangan", "Menambah Data", $id_ruangan, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function InfoDataRuangan($id_ruangan)
	{
		$this->db->select('*');
		$this->db->from('tb_ruangan');
		$this->db->join('tb_ruangan_jenis', 'tb_ruangan.id_jenis_ruangan = tb_ruangan_jenis.id_jenis_ruangan', 'left');

		$this->db->where('id_ruangan', $id_ruangan);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function IdentitasDataRuangan($id_ruangan)
	{
		return $this->db->get_where('tb_ruangan', ['id_ruangan' => $id_ruangan])->row_array();
	}

	public function inputSelectDataRuangan($id_ruangan)
	{
		$this->db->select('*');
		$this->db->from('tb_ruangan');
		$this->db->join('tb_ruangan_jenis', 'tb_ruangan.id_jenis_ruangan = tb_ruangan_jenis.id_jenis_ruangan', 'left');

		$this->db->where('id_ruangan', $id_ruangan);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function UbahDataRuangan()
	{
		$data = [
			"id_ruangan"       => $this->input->post('id_ruangan', true),
			"id_jenis_ruangan" => $this->input->post('id_jenis_ruangan', true),
			"nama_ruangan"     => $this->input->post('nama_ruangan', true),
			"lantai"           => $this->input->post('lantai', true),
			"kapasitas"        => $this->input->post('kapasitas', true),
			"keterangan"       => $this->input->post('keterangan', true),
			"status"           => $this->input->post('status', true)
		];

		$this->db->where('id_ruangan',  $this->input->post('id_ruangan'));
		$this->db->update('tb_ruangan', $data);
		$id_ruangan = $this->input->post('id_ruangan');
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Ruangan", "Ubah Data", $id_ruangan, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
