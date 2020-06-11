<?php

class Matkul extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Matkul_model');
	}

	public function index($offset = NULL)
	{
		$text_mtl = "";
		if ($this->input->post('submit') != NULL) {
			$text_mtl = $this->input->post('cari_mtl');
			$this->session->set_userdata(array("cari_mtl" => $text_mtl));
		} else {
			if ($this->session->userdata('cari_mtl') != NULL) {
				$text_mtl = $this->session->userdata('cari_mtl');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Matkul/index';
		$config['total_rows']  = $this->Matkul_model->CoutAllMatkul($text_mtl);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul']     = 'Data Mata Kuliah';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']    = $this->uri->segment(3);
		$data['tb_matkul'] = $this->Matkul_model->GetDataMatkul($limit, $offset, $text_mtl);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Matkul/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function tambah()
	{
		$data['judul']   = 'Form Tambah Data';
		$data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan'] = $this->db->get('tb_jurusan')->result();

		$this->form_validation->set_rules('nama_matkul', 'Nama', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Nama Jurusan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('matkul/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Matkul_model->TambahDataMatkul();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('matkul');
		}
	}

	public function hapus($id_matkul)
	{
		$id = decrypt_url($id_matkul);
		$this->Matkul_model->HapusDataMatkul($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('matkul');
	}

	public function ubah($id_matkul)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_matkul);
		$data['tb_matkul'] = $this->Matkul_model->IdentitasDataMatkul($id);

		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan'] = $this->db->get('tb_jurusan')->result();


		$this->form_validation->set_rules('nama_matkul', 'Nama', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Nama Jurusan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('matkul/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Matkul_model->UbahDataMatkul();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('matkul');
		}
	}
}
