<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin();
		$this->load->model('Role_model');
	}

	public function index($offset = NULL)
	{
		$text_rl = "";
		if ($this->input->post('submit') != NULL) {
			$text_rl = $this->input->post('cari_rl');
			$this->session->set_userdata(array("cari_rl" => $text_rl));
		} else {
			if ($this->session->userdata('cari_rl') != NULL) {
				$text_rl = $this->session->userdata('cari_rl');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Role/index';
		$config['total_rows']  = $this->Role_model->CountAllRole($text_rl);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);


		$data['judul']  = 'Pengaturan Role Akses';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['role']   = $this->Role_model->GetDataRole($limit, $offset, $text_rl);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Role/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Role/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Role_model->TambahDataRole();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Role');
		}
	}

	public function hapus($id)
	{
		$id_role = decrypt_url($id);
		$this->Role_model->HapusDataRole($id_role);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Role');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$id_role = decrypt_url($id);
		$data['user_role'] = $this->Role_model->IdentitasDataRole($id_role);

		$this->form_validation->set_rules('role', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Role/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Role_model->UbahDataRole();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Role');
		}
	}
}
