<?php 

class Dokumentasi_model extends CI_Model
{
	public function rolegetdata()
	{
	    $query = $this->db->get('user_role');
	    return $query->result_array();
	}
}