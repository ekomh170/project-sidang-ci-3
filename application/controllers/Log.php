<?php
defined('BASEPATH') or exit('No direct script access allowed');

// =================================== >AKTIFITAS KEGIATAN <============================================================

class Log extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin();
		pass_block();

		$this->load->model('Log_model');
		$this->load->model('LogLogin_model');
	}

	public function Log()
	{
		$data['judul']  = 'Data Kegiatan Yang Dilakukan Akun';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('id_log', 'desc');
		$data['tb_log'] = $this->Log_model->AmbilDataLog();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Log/log_aktifitas', $data);
		$this->load->view('templates/tb_footer');
	}

	public function AllDelete()
	{
		$this->Log_model->DeleteAllData();
		redirect('Log/Log');
	}

	public function delete($id_log)
	{
		$this->Log_model->DeleteData($id_log);
		redirect('Log/Log');
	}

	//=================================== >AKTIFITAS Login <============================================================

	public function LogLogin()
	{
		$data['judul']        = 'Data Aktifitas Keluar Masuk Akun';
		$data['user']         = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('id_log', 'desc');
		$data['tb_log_login'] = $this->LogLogin_model->AmbilDataLogLogin();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Log/login_log', $data);
		$this->load->view('templates/tb_footer');
	}

	public function AllDeleteLogin()
	{
		$this->LogLogin_model->DeleteAllLogin();
		redirect('Log/LogLogin');
	}

	public function deletelogin($id_log)
	{
		$this->LogLogin_model->DeleteDataLogin($id_log);
		redirect('Log/LogLogin');
	}
}
