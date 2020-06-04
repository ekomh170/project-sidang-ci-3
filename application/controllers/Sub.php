<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sub extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Sub_model');
	}

	public function index($offset = NULL)
	{
		$text_sub = "";
		if ($this->input->post('submit') != NULL) {
			$text_sub = $this->input->post('cari_sub');
			$this->session->set_userdata(array("cari_sub" => $text_sub));
		} else {
			if ($this->session->userdata('cari_sub') != NULL) {
				$text_sub = $this->session->userdata('cari_sub');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = 'http://localhost/db-mahasiswa-ci/Sub/index';
		$config['total_rows']  = $this->Sub_model->CountAllSub($text_sub);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);


		$data['judul']  = 'Pengaturan Sub Menu';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['Sub']    = $this->Sub_model->getDataSub($limit, $offset, $text_sub);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Sub/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result();

		$this->form_validation->set_rules('id_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('title', 'Nama Sub', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon/Lambang', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Sub/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Sub_model->TambahDataSub();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Sub');
		}
	}

	public function hapus($id)
	{
		$id_sub = decrypt_url($id);
		$this->Sub_model->HapusDataSub($id_sub);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Sub');
	}

	public function ubah($id)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['menu'] = $this->db->get('user_menu')->result();

		$id_sub                = decrypt_url($id);
		$data['user_sub_menu'] = $this->Sub_model->IdentitasDataSub($id_sub);

		$this->form_validation->set_rules('id_menu', 'Nama Menu', 'required');
		$this->form_validation->set_rules('title', 'Nama Sub', 'required');
		$this->form_validation->set_rules('url', 'URL', 'required');
		$this->form_validation->set_rules('icon', 'Icon/Lambang', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Sub/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Sub_model->UbahDataSub();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Sub');
		}
	}
}
