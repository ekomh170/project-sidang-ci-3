<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class LogLogin_model extends CI_Model
{

    public function save_log($param)
    {
        $sql        = $this->db->insert_string('tb_log_login', $param);
        $ex         = $this->db->query($sql);
        return $this->db->affected_rows($sql);
    }

    public function AmbilDataLogLogin()
    {   
        $this->db->select('tb_log_login.id_log, tb_log_login.log_time, tb_log_login.log_user, tb_log_login.log_role,tb_log_login.log_tipe, user_role.role, tb_log_login.log_tipe, tb_log_login.log_desc, tb_log_login.log_status');
        $this->db->from('tb_log_login');
        $this->db->join('user_role', 'tb_log_login.log_role = user_role.id');
        $query = $this->db->get();
        return $query->result();
    }

    public function DeleteAllLogin()
    {
        $this->db->truncate('tb_log_login');
    }

    public function DeleteDatalogin($id_log)
    {
        $this->db->get_where('tb_log_login', ['id_log' => $id_log])->row_array($id_log);
    }
}
