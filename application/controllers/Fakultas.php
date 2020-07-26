<?php

class Fakultas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Fakultas_model');
	}

	public function index($offset = NULL)
	{
		$text_fks = "";
		if ($this->input->post('submit') != NULL) {
			$text_fks = $this->input->post('cari_fks');
			$this->session->set_userdata(array("cari_fks" => $text_fks));
		} else {
			if ($this->session->userdata('cari_fks') != NULL) {
				$text_fks = $this->session->userdata('cari_fks');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Fakultas/index';
		$config['total_rows']  = $this->Fakultas_model->CountAllFakultas($text_fks);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination          = $this->pagination->initialize($config);

		$data['judul']       = 'Data Fakultas';
		$data['user']        = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']      = $this->uri->segment(3);
		$data['tb_fakultas'] = $this->Fakultas_model->GetDataFakultas($limit, $offset, $text_fks);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('fakultas/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('fakultas/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Fakultas_model->TambahDataFakultas();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Fakultas');
		}
	}

	public function hapus($id_fakultas)
	{
		$id = decrypt_url($id_fakultas);
		$this->Fakultas_model->HapusDataFakultas($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Fakultas');
	}

	public function ubah($id_fakultas)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_fakultas);
		$data['tb_fakultas'] = $this->Fakultas_model->IdentitasDataFakultas($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('fakultas/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Fakultas_model->UbahDataFakultas();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Fakultas');
		}
	}
}
