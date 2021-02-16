<?php

class Fakultas_model extends CI_Model
{
	public function GetDataFakultas($limit, $offset, $cari_fks = '')
	{
		$this->db->select('tb_fakultas.id_fakultas, tb_fakultas.nama_fakultas, tb_fakultas.keterangan, tb_fakultas.status');
		$this->db->from('tb_fakultas');
		$this->db->order_by('nama_fakultas', 'asc');

		if ($cari_fks != '') {
			$this->db->like('id_fakultas', $cari_fks);
			$this->db->or_like('nama_fakultas', $cari_fks);
			$this->db->or_like('keterangan', $cari_fks);
			$this->db->or_like('status', $cari_fks);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllFakultas($cari_fks = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_fakultas');

		if ($cari_fks != '') {
			$this->db->like('id_fakultas', $cari_fks);
			$this->db->or_like('nama_fakultas', $cari_fks);
			$this->db->or_like('keterangan', $cari_fks);
			$this->db->or_like('status', $cari_fks);
		}

		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataFakultas()
	{
		$count_fakultas = $this->db->count_all('tb_fakultas');
		$helper         = 1 + $count_fakultas;
		$date           = date('s');
		$id_fakultas    = "FKS" . "-" . "0" . $helper . $date;
		$nama_fakultas  = $this->input->post('nama_fakultas', true);
		$keterangan  	= $this->input->post('keterangan', true);
		$status         = $this->input->post('status', true);

		$data = array(
			'id_fakultas'   => $id_fakultas,
			'nama_fakultas' => $nama_fakultas,
			'keterangan'	=> $keterangan,
			'status'        => $status
		);

		$this->db->insert('tb_Fakultas', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Fakultas", "Menambah Data", $id_fakultas, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataFakultas($id_fakultas)
	{
		$this->db->delete('tb_fakultas', ['id_fakultas' => $id_fakultas]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Fakultas", "Hapus Data", $id_fakultas, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataFakultas($id_fakultas)
	{
		return $this->db->get_where('tb_fakultas', ['id_fakultas' => $id_fakultas])->row_array();
	}

	public function UbahDataFakultas()
	{
		$data = [
			"id_fakultas"   => $this->input->post('id_fakultas', true),
			"nama_fakultas" => $this->input->post('nama_fakultas', true),
			"keterangan" 	=> $this->input->post('keterangan', true),
			"status"        => $this->input->post('status', true)
		];

		$this->db->where('id_fakultas',  $this->input->post('id_fakultas'));
		$this->db->update('tb_fakultas', $data);
		$id_fakultas = $this->input->post('id_fakultas');
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Mata Kuliah", "Ubah Data", $id_fakultas, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function getFakultasPrint()
	{
		$this->db->select('tb_fakultas.id_fakultas, tb_fakultas.nama_fakultas, tb_fakultas.keterangan, tb_fakultas.status');
		$this->db->from('tb_fakultas');

		$query = $this->db->get();
		return $query->result();
	}
}
