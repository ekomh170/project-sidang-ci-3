<?php 

class Dokumentasi_model extends CI_Model
{
	public function rolegetdata()
	{
		$this->db->select('*');
		$this->db->from('user_role');
		$this->db->where('user_role.id !=', 5);
		$this->db->where('user_role.id !=', 7);
		$this->db->where('user_role.id !=', 8);

		$query = $this->db->get();
		return $query->result_array();	
	}
}