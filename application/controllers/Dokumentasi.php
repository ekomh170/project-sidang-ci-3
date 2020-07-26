<?php 

class Dokumentasi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		cek_login();
		pass_block();
		pass_block();

		$this->load->model('Dokumentasi_model');
	}

	public function index()
	{
		$data['judul'] = 'Cara Penggunaan Aplikasi Siadawa';
		$data['judul2'] = 'Fungsi Role Hak Akses Menu';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role'] = $this->Dokumentasi_model->rolegetdata();
		
		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Dokumentasi/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function index2()
	{
		$data['judul'] = 'Cara Penggunaan Aplikasi Siadawa';
		$data['judul2'] = 'Fungsi Menu';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Dokumentasi/index2', $data);
		$this->load->view('layout/tb_footer');
	}

	public function index3()
	{
		$data['judul'] = 'Cara Penggunaan Aplikasi Siadawa';
		$data['judul2'] = 'Cara Penggunaan Fungsi Menu';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Dokumentasi/index3', $data);
		$this->load->view('layout/tb_footer');
	}
}

?>