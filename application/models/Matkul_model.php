<?php

class matkul_model extends CI_Model
{
	public function GetDataMatkul($limit, $offset, $cari_mtl = '')
	{
		$this->db->select('tb_matkul.id_matkul, tb_matkul.nama_matkul, tb_jurusan.nama_jurusan');
		$this->db->from('tb_matkul');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_matkul.id_jurusan', 'left');

		if ($cari_mtl != '') {
			$this->db->like('id_matkul', $cari_mtl);
			$this->db->or_like('nama_matkul', $cari_mtl);
			$this->db->or_like('nama_jurusan', $cari_mtl);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CoutAllMatkul($cari_mtl = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_matkul');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_matkul.id_jurusan', 'left');

		if ($cari_mtl != '') {
			$this->db->like('id_matkul', $cari_mtl);
			$this->db->or_like('nama_matkul', $cari_mtl);
			$this->db->or_like('nama_jurusan', $cari_mtl);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataMatkul()
	{
		$count_matkul = $this->db->count_all('tb_matkul');
		$helper = 1 + $count_matkul;
		$date = date('s');

		$id_matkul = "MK" . "-" . "0" . $helper . "-" . $date;
		$nama_matkul = $this->input->post('nama_matkul', true);
		$status = $this->input->post('status', true);
		$id_jurusan = $this->input->post('id_jurusan', true);

		$data = array(
			'id_matkul' => $id_matkul,
			'nama_matkul' => $nama_matkul,
			'status' => $status,
			'id_jurusan' => $id_jurusan
		);

		$this->db->insert('tb_matkul', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to  = '';
			$assign_type = '';
			activity_log("Data Mata Kuliah", "Menambah Data", $id_matkul, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataMatkul($id_matkul)
	{
		$this->db->delete('tb_matkul', ['id_matkul' => $id_matkul]);
		if ($this->db->affected_rows() > 0) {
			$assign_to  = '';
			$assign_type = '';
			activity_log("Data Mata Kuliah", "Hapus Data", $id_matkul, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataMatkul($id_matkul)
	{
		return $this->db->get_where('tb_matkul', ['id_matkul' => $id_matkul])->row_array();
	}

	public function inputSelectDataMatkul($id_matkul)
	{
	    $this->db->select('*');
		$this->db->from('tb_matkul');
		$this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_matkul.id_jurusan', 'left');
		$this->db->where('tb_matkul.id_matkul', $id_matkul);

		$query = $this->db->get();
		return $query->row_array();
	}

	public function CariDataMatkul()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('nama_matkul', $cari);
		$this->db->or_like('id_matkul', $cari);
		return $this->db->get('tb_matkul')->result_array();
	}

	public function UbahDataMatkul()
	{
		$data = [
			"id_matkul" => $this->input->post('id_matkul', true),
			"nama_matkul" => $this->input->post('nama_matkul', true),
			"status" => $this->input->post('status', true),
			"id_jurusan" => $this->input->post('id_jurusan', true)
		];

		$this->db->where('id_matkul',  $this->input->post('id_matkul'));
		$this->db->update('tb_matkul', $data);
		$id_matkul = $this->input->post('id_matkul');
		if ($this->db->affected_rows() > 0) {
			$assign_to  = '';
			$assign_type = '';
			activity_log("Data Mata Kuliah", "Ubah Data", $id_matkul, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
