<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
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
		$config['base_url']    = 'http://localhost/db-mahasiswa-ci/Role/index';
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

	public function roleAccess($id)
	{
		$data['judul'] = 'Role Akses';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['role']  = $this->db->get_where('user_role', ['id' => $id])->row_array();

		$this->db->where('status =', "Aktif");
		$data['menu'] = $this->db->get('user_sub_menu')->result_array();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Role/roleAccess', $data);
		$this->load->view('templates/tb_footer');
	}

	public function changeAccess()
	{
		$id_role = $this->input->post('roleId');
		$id_menu = $this->input->post('menuId');

		$data = [
			'id_role' => $id_role,
			'id_menu' => $id_menu
		];

		//cek data di database tb user akses menu
		$result = $this->db->get_where('user_akses_menu', $data);

		if ($result->num_rows() < 1) {
			//ini Insert data database tb user akses menu
			$this->db->insert('user_akses_menu', $data);
		} else {
			//ini delete data database tb user akses menu
			$this->db->delete('user_akses_menu', $data);
		}
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
		$this->Role_model->HapusDataRole($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Role');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['user_role'] = $this->Role_model->IdentitasDataRole($id);

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
