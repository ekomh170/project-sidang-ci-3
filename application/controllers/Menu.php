<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Menu_model');
	}

	public function index($offset = NULL)
	{
		$text_mn = "";
		if ($this->input->post('submit') != NULL) {
			$text_mn = $this->input->post('cari_mn');
			$this->session->set_userdata(array("cari_mn" => $text_mn));
		} else {
			if ($this->session->userdata('cari_mn') != NULL) {
				$text_mn = $this->session->userdata('cari_mn');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Menu/index';
		$config['total_rows']  = $this->Menu_model->CountAllMenu($text_mn);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);


		$data['judul']  = 'Pengaturan Menu';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu']   = $this->Menu_model->GetDataMenu($limit, $offset, $text_mn);
		$data['offset'] = $this->uri->segment(3);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Menu/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('menu', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Menu_model->TambahDataMenu();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Menu');
		}
	}

	public function hapus($id)
	{
		$id_menu = decrypt_url($id);
		$this->Menu_model->HapusDataMenu($id_menu);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Menu');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id_menu           = decrypt_url($id);
		$data['user_menu'] = $this->Menu_model->IdentitasDataMenu($id_menu);

		$this->form_validation->set_rules('menu', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Menu/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Menu_model->UbahDataMenu();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Menu');
		}
	}
}
