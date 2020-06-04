<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Log_model extends CI_Model
{

  public function save_log($param)
  {
    $sql        = $this->db->insert_string('tb_log', $param);
    $ex         = $this->db->query($sql);
    return $this->db->affected_rows($sql);
  }

  public function AmbilDataLog()
  {
    $this->db->select('tb_log.id_log, tb_log.log_time, tb_log.log_user, user_role.role, tb_log.log_tipe, tb_log.log_aksi, tb_log.log_item, tb_log.log_assign_to, tb_log.log_assign_type');
    $this->db->from('tb_log');
    $this->db->join('user_role', 'tb_log.log_role = user_role.id');
    $query = $this->db->get();
    return $query->result();
  }

  public function DeleteAllData()
  {
    $this->db->truncate('tb_log');
  }

  public function DeleteData($id_log)
  {
    $this->db->get_where('tb_log', ['id_log' => $id_log])->row_array();
  }
}    
