<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumentasi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data['judul']    = 'Dokumentasi';
		$data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('title', 'asc');
		$this->db->where('status = ', "Aktif");
		$data['sub_menu'] = $this->db->get('user_sub_menu')->result();
		
		$this->db->order_by('role', 'asc');
		$this->db->where(!'role = ', "Belum Diset");
		$data['role'] = $this->db->get('user_role')->result();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Dokumentasi/index', $data);
		$this->load->view('templates/tb_footer');
	}
}
