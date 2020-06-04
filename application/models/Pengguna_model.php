<?php

class Pengguna_model extends CI_Model
{
	public function GetData()
	{
		$query = $this->db->get('user');
		return $query->result_array();
	}

	public function GetDataPengguna($limit, $offset, $cari_usr = '')
	{
		$this->db->select('user.id, user.nama, user.nama_panggilan, user.email, user.image, user.password, user.password_asli, user.password_asli, user_role.role, user.status, user.data_created');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.id_role');

		if ($cari_usr != '') {
			$this->db->or_like('email', $cari_usr);
			$this->db->or_like('role', $cari_usr);
			$this->db->or_like('status', $cari_usr);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllPengguna($cari_usr = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('user');
		$this->db->join('user_role', 'user_role.id = user.id_role');

		if ($cari_usr != '') {
			$this->db->like('email', $cari_usr);
			$this->db->or_like('role', $cari_usr);
			$this->db->or_like('status', $cari_usr);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function HapusDataPengguna($id)
	{
		$this->db->delete('user', ['id' => $id]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Pengguna", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
