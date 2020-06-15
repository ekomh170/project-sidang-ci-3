<?php

class Nilai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Nilai_model');
	}

	public function index($offset = NULL)
	{
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
		$config['base_url']    = base_url().'Nilai/index';
		$config['total_rows']  = $this->Nilai_model->CountAllNilai($text_krs);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination     = $this->pagination->initialize($config);

		$data['judul']  = 'Penilaian Nilai Akhir';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['data']   = $this->Nilai_model->GetDataNilai($limit, $offset, $text_krs);


		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Nilai/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function tambah($nim_mhs)
	{
		$data['judul']     = 'Form Tambah Data';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($nim_mhs);
		$data['data']  = $this->Tambahan_model->TambahKrsMhsForm($id);

		$this->db->order_by('nama_dosen', 'asc');
		$data['dosen']     = $this->Tambahan_model->selectKrsDosen($id);

		$this->form_validation->set_rules('id_krs', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Nilai/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Nilai_model->TambahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect(base_url('Nilai/detail/') . $nim_mhs);
		}
	}


	public function ubah($id_nilai)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($id_nilai);
		$data['data']  = $this->Tambahan_model->UbahNilaiMhsForm($id);
		$data['inputSelect']  = $this->Nilai_model->inputSelectDataKrsDetail($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		// getdatamhs
		$ls = $this->Tambahan_model->UbahNilaiMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		// getdatamhs

		$this->db->order_by('nama_dosen', 'asc');
		$data['dosen']     = $this->Tambahan_model->selectKrsDosen($nim_mhs);

		$this->form_validation->set_rules('id_krs', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('nilai_presensi', 'Nilai Presensi', 'required');
		$this->form_validation->set_rules('nilai_tugas', 'Nilai Tugas', 'required');
		$this->form_validation->set_rules('nilai_uts', 'Nilai UTS', 'required');
		$this->form_validation->set_rules('nilai_uas', 'Nilai UAS', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Nilai/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Nilai_model->UbahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect(base_url('Nilai/detail/') . $id_mhs);
		}
	}

	public function hapus($id_nilai)
	{
		$id = decrypt_url($id_nilai);

		// getdatamhs
		$ls = $this->Tambahan_model->UbahNilaiMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		// getdatamhs

		$this->Nilai_model->HapusDataKrsDetail($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect(base_url('Nilai/detail/') . $id_mhs);
	}

	public function detail($nim_mhs)
	{
		$data['judul'] = 'Hasil Penilaian Nilai Akhir';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($nim_mhs);
		$data['data']  = $this->Nilai_model->DetailDataNilai($id);
		$data['nilai'] = $this->Nilai_model->NilaiDataNilai($id);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Nilai/detail', $data);
		$this->load->view('templates/tb_footer');
	}
}
