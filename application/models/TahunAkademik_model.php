<?php

class TahunAkademik_model extends CI_Model
{
	public function GetDataTahunAkademik($limit, $offset, $cari_ta = '')
	{
		$this->db->select('*');
		$this->db->from('tb_tahun_akademik');

		if ($cari_ta != '') {
			$this->db->like('nama_tahun_akademik', $cari_ta);
			$this->db->or_like('semester', $cari_ta);
			$this->db->or_like('status', $cari_ta);
		}

		$this->db->limit($limit, $offset);
		$query  = $this->db->get();
		return $query->result();
	}

	public function CountAllTahunAkademik($cari_ta = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_tahun_akademik');

		if ($cari_ta != '') {
			$this->db->like('nama_tahun_akademik', $cari_ta);
			$this->db->or_like('status', $cari_ta);
		}

		$query   = $this->db->get();
		$result  = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataTahunAkademik()
	{
		$tb_tahun_akademik   = $this->db->count_all('tb_tahun_akademik');
		$helper            = 1 + $tb_tahun_akademik;
		$date              = date('s');

		$id_tahun_akademik   = "TA" . '-' . $helper . $date;
		$nama_tahun_akademik = $this->input->post('nama_tahun_akademik', true);
		$status              = $this->input->post('status', true);

		$data = array(
			'id_tahun_akademik'   => $id_tahun_akademik,
			'nama_tahun_akademik' => $nama_tahun_akademik,
			'status'              => $status
		);

		$this->db->insert('tb_tahun_akademik', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Tahun Akademik", "Menambahkan Data", $id_tahun_akademik, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataTahunAkademik($id_tahun_akademik)
	{
		$this->db->delete('tb_tahun_akademik', ['id_tahun_akademik' => $id_tahun_akademik]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Tahun Akademik", "Hapus Data", $id_tahun_akademik, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataTahunAkademik($id_tahun_akademik)
	{
		return $this->db->get_where('tb_tahun_akademik', ['id_tahun_akademik' => $id_tahun_akademik])->row_array();
	}

	public function UbahDataTahunAkademik()
	{
		$data = [
			"id_tahun_akademik"   => $this->input->post('id_tahun_akademik', true),
			"nama_tahun_akademik" => $this->input->post('nama_tahun_akademik', true),
			"status" => $this->input->post('status', true),
		];

		$this->db->where('id_tahun_akademik', $this->input->post('id_tahun_akademik'));
		$this->db->update('tb_tahun_akademik', $data);
		$id_tahun_akademik = $this->input->post('id_tahun_akademik', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Tahun Akademik", "Ubah Data", $id_tahun_akademik, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
