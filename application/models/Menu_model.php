<?php

class Menu_model extends CI_Model
{
	public function GetDataMenu($limit, $offset, $cari_mn = '')
	{
		$this->db->select('user_menu.id, user_menu.menu');
		$this->db->from('user_menu');

		if ($cari_mn != '') {
			$this->db->like('id', $cari_mn);
			$this->db->or_like('menu', $cari_mn);
		}

		$this->db->limit($limit, $offset);
		$query  = $this->db->get();
		return $query->result();
	}

	public function CountAllMenu($cari_mn = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('user_menu');

		if ($cari_mn != '') {
			$this->db->like('id', $cari_mn);
			$this->db->or_like('menu', $cari_mn);
		}

		$query   = $this->db->get();
		$result  = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataMenu()
	{
		$id   = $this->input->post('id', true);
		$menu = $this->input->post('menu', true);

		$data = array(
			'id'   => $id,
			'menu' => $menu
		);

		$this->db->insert('user_menu', $data);
		$id_menu = $this->input->post('id', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Menu", "Menambahkan Data", $menu, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataMenu($id)
	{
		$this->db->delete('user_menu', ['id' => $id]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Menu", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataMenu($id)
	{
		return $this->db->get_where('user_menu', ['id' => $id])->row_array();
	}

	public function UbahDataMenu()
	{
		$data = [
			"id"   => $this->input->post('id', true),
			"menu" => $this->input->post('menu', true)
		];

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('user_menu', $data);
		$menu = $this->input->post('menu', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Menu", "Ubah Data", $menu, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
