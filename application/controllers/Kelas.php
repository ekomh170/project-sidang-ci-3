<?php

class Kelas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Kelas_model');
	}

	public function index($offset = NULL)
	{
		$text_kls = "";
		if ($this->input->post('submit') != NULL) {
			$text_kls = $this->input->post('cari_kls');
			$this->session->set_userdata(array("cari_kls" => $text_kls));
		} else {
			if ($this->session->userdata('cari_kls') != NULL) {
				$text_kls = $this->session->userdata('cari_kls');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Kelas/index';
		$config['total_rows']  = $this->Kelas_model->CountAllkelas($text_kls);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination       = $this->pagination->initialize($config);

		$data['judul']    = 'Data Kelas';
		$data['user']     = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']   = $this->uri->segment(3);
		$data['tb_kelas'] = $this->Kelas_model->GetDatakelas($limit, $offset, $text_kls);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('kelas/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		$data['judul']   = 'Form Tambah Data';
		$data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('nama_ruangan', 'asc');
		$data['ruangan'] = $this->db->get('tb_ruangan')->result();

		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('id_ruangan', 'Nama Ruang', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('kelas/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Kelas_model->TambahDatakelas();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Kelas');
		}
	}

	public function hapus($id_kelas)
	{
		$id = decrypt_url($id_kelas);
		$this->Kelas_model->HapusDatakelas($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Kelas');
	}

	public function ubah($id_kelas)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id               = decrypt_url($id_kelas);
		$data['tb_kelas'] = $this->Kelas_model->IdentitasDatakelas($id);
		$data['inputSelect'] = $this->Kelas_model->inputSelectDatakelas($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();
		
		$this->db->order_by('nama_ruangan', 'asc');
		$data['ruangan']  = $this->db->get('tb_ruangan')->result();

		$this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_rules('id_ruangan', 'Nama Ruang', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('kelas/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Kelas_model->UbahDatakelas();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Kelas');
		}
	}
}
