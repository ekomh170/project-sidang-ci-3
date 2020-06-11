<?php

class Role_model extends CI_Model
{
	public function GetDataRole($limit, $offset, $cari_rl)
	{
		$this->db->select('user_role.id, user_role.role');
		$this->db->from('user_role');
		$this->db->where('user_role.id !=', 1);

		if ($cari_rl != '') {
			$this->db->like('id', $cari_rl);
			$this->db->or_like('role', $cari_rl);
			$this->db->where('user_role.id !=', 1);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllRole($cari_rl)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('user_role');
		$this->db->where('user_role.id !=', 1);

		if ($cari_rl != '') {
			$this->db->like('id', $cari_rl);
			$this->db->or_like('role', $cari_rl);
			$this->db->where('user_role.id !=', 1);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataRole()
	{
		$id   = $this->input->post('id', true);
		$role = $this->input->post('role', true);

		$data = array(
			'id'   => $id,
			'role' => $role
		);

		$this->db->insert('user_role', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Role", "Menambah Data", $role, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataRole($id)
	{
		$this->db->delete('user_role', ['id' => $id]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Role", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataRole($id)
	{
		return $this->db->get_where('user_role', ['id' => $id])->row_array();
	}



	public function CariDataRole()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('Role', $cari);
		$this->db->or_like('id', $cari);
		return $this->db->get('tb_jurusan')->result_array();
	}

	public function UbahDataRole()
	{
		$data = [
			"id"   => $this->input->post('id', true),
			"role" => $this->input->post('role', true)
		];

		$this->db->where('id',  $this->input->post('id'));
		$this->db->update('user_role', $data);
		$role = $this->input->post('role', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Role", "Ubah Data", $role, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
