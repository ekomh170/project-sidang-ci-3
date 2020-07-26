<?php

class Ruangan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Ruangan_model');
	}


	public function index($offset = NULL)
	{
		$text_rgn = "";
		if ($this->input->post('submit') != NULL) {
			$text_rgn = $this->input->post('cari_rgn');
			$this->session->set_userdata(array("cari_rgn" => $text_rgn));
		} else {
			if ($this->session->userdata('cari_rgn') != NULL) {
				$text_rgn = $this->session->userdata('cari_rgn');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Ruangan/index';
		$config['total_rows']  = $this->Ruangan_model->CountAllRuangan($text_rgn);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul']      = 'Data Ruangan';
		$data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']     = $this->uri->segment(3);
		$data['tb_ruangan'] = $this->Ruangan_model->GetDataRuangan($limit, $offset, $text_rgn);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Ruangan/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('nama_jr', 'asc');
		$data['jenis_ruangan'] = $this->db->get('tb_ruangan_jenis')->result();

		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'required');
		$this->form_validation->set_rules('id_jenis_ruangan', 'Jenis Ruangan', 'required');
		$this->form_validation->set_rules('lantai', 'Lantai', 'required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Ruangan/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Ruangan_model->TambahDataRuangan();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Ruangan');
		}
	}

	public function hapus($id_ruangan)
	{
		$id = decrypt_url($id_ruangan);
		$this->db->delete('tb_ruangan', ['id_ruangan' => $id]);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Ruangan');
	}

	public function detail($id_ruangan)
	{
		$data['judul'] = 'Data Lengkap Ruangan';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_ruangan);
		$data['ruangan'] = $this->Ruangan_model->InfoDataRuangan($id);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Ruangan/detail', $data);
		$this->load->view('layout/tb_footer');
	}

	public function ubah($id_ruangan)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id              = decrypt_url($id_ruangan);
		$data['ruangan'] = $this->Ruangan_model->IdentitasDataRuangan($id);
		$data['inputSelect'] = $this->Ruangan_model->inputSelectDataRuangan($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$this->db->order_by('nama_jr', 'asc');
		$data['jenis_ruangan'] = $this->db->get('tb_ruangan_jenis')->result();

		$this->form_validation->set_rules('nama_ruangan', 'Nama Ruangan', 'required');
		$this->form_validation->set_rules('id_jenis_ruangan', 'Jenis Ruangan', 'required');
		$this->form_validation->set_rules('lantai', 'Lantai', 'required');
		$this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Ruangan/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Ruangan_model->UbahDataRuangan();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Ruangan');
		}
	}
}
