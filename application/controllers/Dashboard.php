<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		$data['judul']     = 'Dashboard';
		$data['judul2']    = 'Login Berhasil';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['mahasiswa'] = $this->Dashboard_model->hitungJumlahMahasiswa();
		$data['dosen']     = $this->Dashboard_model->hitungJumlahDosen();
		$data['fakultas']  = $this->Dashboard_model->hitungJumlahFakultas();
		$data['jurusan']   = $this->Dashboard_model->hitungJumlahJurusan();
		$data['pengguna']  = $this->Dashboard_model->hitungJumlahPengguna();
		$data['matkul']    = $this->Dashboard_model->hitungJumlahMatkul();
		$data['kelas']     = $this->Dashboard_model->hitungJumlahKelas();
		$data['ruangan']   = $this->Dashboard_model->hitungJumlahRuangan();
		$data['ipk']       = $this->Dashboard_model->hitungJumlahIpk();
		$data['krs']       = $this->Dashboard_model->hitungJumlahKrs();
		$data['nilai']     = $this->Dashboard_model->hitungJumlahInputNilai();
		$data['tn']        = $this->Dashboard_model->hitungJumlahTranskripNilai();
		$data['ta']        = $this->Dashboard_model->hitungJumlahTahunAkademik();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Dashboard/index', $data);
		$this->load->view('templates/tb_footer');
	}
}
