<?php

class Sub_model extends CI_Model
{
	public function GetDataSub($limit, $offset, $cari_sub)
	{
		$this->db->select('user_sub_menu.id, user_sub_menu.id_menu, user_menu.menu, user_sub_menu.title, user_sub_menu.status');
		$this->db->from('user_sub_menu');
		$this->db->join('user_menu', 'user_sub_menu.id_menu = user_menu.id', 'right');
		if ($cari_sub != '') {
			// $this->db->like('user_sub_menu.id', $cari_sub);
			$this->db->or_like('user_menu.menu', $cari_sub);
			$this->db->or_like('title', $cari_sub);
			$this->db->or_like('status', $cari_sub);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllSub($cari_sub)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('user_sub_menu');
		$this->db->join('user_menu', 'user_menu.id = user_sub_menu.id', 'left');

		if ($cari_sub != '') {
			// $this->db->like('user_sub_menu.id', $cari_sub);
			$this->db->or_like('user_menu.menu', $cari_sub);
			$this->db->or_like('title', $cari_sub);
			$this->db->or_like('status', $cari_sub);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataSub()
	{
		$id      = $this->input->post('id', true);
		$id_menu = $this->input->post('id_menu', true);
		$title   = $this->input->post('title', true);
		$url     = $this->input->post('url', true);
		$icon    = $this->input->post('icon', true);
		$keterangan    = $this->input->post('keterangan', true);
		$status  = $this->input->post('status', true);

		$data = array(
			'id'      => $id,
			'id_menu' => $id_menu,
			'title'   => $title,
			'url'     => $url,
			'icon'    => $icon,
			'keterangan' => $keterangan,
			'status'  => $status
		);

		$this->db->insert('user_sub_menu', $data);
		$id_menu = $this->input->post('id_menu', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Sub", "Menambah Data", $id_menu, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataSub($id)
	{
		$this->db->delete('user_sub_menu', ['id' => $id]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Sub", "Hapus Data", $id, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataSub($id)
	{
		return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
	}

	public function inputSelectDataSub($id)
	{
	    $this->db->select('*');
		$this->db->from('user_sub_menu');
		$this->db->join('user_menu', 'user_sub_menu.id_menu = user_menu.id', 'right');
		$this->db->where('user_sub_menu.id', $id);

		$query = $this->db->get();
		return $query->row_array();
	}


	public function CariDataSub()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('title', $cari);
		$this->db->or_like('url', $cari);
		return $this->db->get('user_sub_menu')->result_array();
	}

	public function UbahDataSub()
	{
		$data = [
			"id"      => $this->input->post('id', true),
			"id_menu" => $this->input->post('id_menu', true),
			"title"   => $this->input->post('title', true),
			"url"     => $this->input->post('url', true),
			"icon"    => $this->input->post('icon', true),
			"keterangan"    => $this->input->post('keterangan', true),
			"status"  => $this->input->post('status', true)
		];

		$this->db->where('id',  $this->input->post('id'));
		$this->db->update('user_sub_menu', $data);
		$id_menu = $this->input->post('id_menu', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Sub", "Ubah Data", $id_menu, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
