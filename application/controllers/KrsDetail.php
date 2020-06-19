<?php

class KrsDetail extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('KrsDetail_model');
	}

	public function index($offset = NULL)
	{
		cek_login_role();
		$text_krs = "";
		if ($this->input->post('submit') != NULL) {
			$text_krs = $this->input->post('cari_krs');
			$this->session->set_userdata(array("cari_krs" => $text_krs));
		} else {
			if ($this->session->userdata('cari_krs') != NULL) {
				$text_krs = $this->session->userdata('cari_krs');
			}
		}


		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'KrsDetail/index';
		$config['total_rows']  = $this->KrsDetail_model->CountAllKrsDetail($text_krs);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination     = $this->pagination->initialize($config);

		$data['judul']  = 'Penilaian KRS';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['data']   = $this->KrsDetail_model->GetDataKrsDetail($limit, $offset, $text_krs);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('KrsDetail/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function tambah($nim_mhs)
	{
		cek_login_role();
		$data['judul']     = 'Form Tambah Data';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($nim_mhs);
		$data['data']  = $this->Tambahan_model->TambahKrsMhsForm($id);

		$this->db->order_by('nama_dosen', 'asc');
		$data['dosen']     = $this->Tambahan_model->TambahDataMatkulForm();

		$this->form_validation->set_rules('id_dosen', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('KrsDetail/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->KrsDetail_model->TambahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect(base_url('KrsDetail/detail/') . $nim_mhs);
		}
	}


	public function ubah($id_krs)
	{
		cek_login_role();
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($id_krs);
		$data['data']  = $this->Tambahan_model->UbahKrsMhsForm($id);
		$data['inputSelect']  = $this->KrsDetail_model->inputSelectDataKrsDetail($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		//get id mhs
		$ls = $this->Tambahan_model->UbahKrsMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		//get id mhs

		$this->db->order_by('nama_dosen', 'asc');
		$data['dosen'] = $this->Tambahan_model->TambahDataMatkulForm();

		$this->form_validation->set_rules('id_dosen', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('nilai_krs', 'Nilai SKS', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('KrsDetail/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->KrsDetail_model->UbahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect(base_url('KrsDetail/detail/') . $id_mhs);
		}
	}

	public function hapus($id_krs)
	{
		cek_login_role();
		$id = decrypt_url($id_krs);

		//get id mhs
		$ls = $this->Tambahan_model->UbahKrsMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		//get id mhs

		$this->KrsDetail_model->HapusDataKrsDetail($id,$nim_mhs);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect(base_url('KrsDetail/detail/') . $id_mhs);
	}

	public function detail($nim_mhs)
	{
		cek_login();
		$data['judul'] = 'Hasil Penilaian KRS';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($nim_mhs);
		$data['data']  = $this->KrsDetail_model->DetailDataKrsDetail($id);
		$data['nilai'] = $this->KrsDetail_model->krsDataKrsDetail($id);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('KrsDetail/detail', $data);
		$this->load->view('templates/tb_footer');
	}
}
