<?php

class Mahasiswa extends CI_Controller {

	public function __construct() {
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Mahasiswa_model');
	}

	public function index($offset = NULL) {
		$text_mhs = "";
		if ($this->input->post('submit') != NULL) {
			$text_mhs = $this->input->post('cari_mhs');
			$this->session->set_userdata(array("cari_mhs" => $text_mhs));
		} else {
			if ($this->session->userdata('cari_mhs') != NULL) {
				$text_mhs = $this->session->userdata('cari_mhs');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url() . 'Mahasiswa/index';
		$config['total_rows'] = $this->Mahasiswa_model->CountAllMahasiswa($text_mhs);
		$config['per_page'] = $limit;
		$config['num_links'] = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul'] = 'Data Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['join'] = $this->Mahasiswa_model->getMahasiswa($limit, $offset, $text_mhs);
		$data['krs'] = $this->db->get('krs_detail')->result();
		//PENUTUP PAGINATION

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Mahasiswa/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah() {
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan'] = $this->db->get('tb_jurusan')->result();
		$this->db->order_by('nama_kelas', 'asc');
		$data['kelas'] = $this->db->get('tb_kelas')->result();
		$this->db->order_by('nama_tahun_akademik', 'asc');
		$data['tahun_akademik'] = $this->db->get('tb_tahun_akademik')->result();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomer Telepon', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Mahasiswa/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Mahasiswa_model->TambahDataMahasiswa();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Mahasiswa');
		}
	}

	public function hapus($nim_mhs) {
		$id = decrypt_url($nim_mhs);
		$this->Mahasiswa_model->HapusDataMahasiswa($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Mahasiswa');
	}

	public function detail($nim_mhs) {
		$data['judul'] = 'Data Lengkap Mahasiswa';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($nim_mhs);
		$data['mahasiswa'] = $this->Mahasiswa_model->InfoDataDetail($id);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Mahasiswa/detail', $data);
		$this->load->view('layout/tb_footer');
	}

	public function edit($nim_mhs) {
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($nim_mhs);
		$data['mahasiswa'] = $this->Mahasiswa_model->IdentitasDataMahasiswa($id);
		$data['inputSelect'] = $this->Mahasiswa_model->inputSelectDataMahasiswa($id);
		$data['inputSelectAgama'] = $this->Tambahan_model->inputSelectDataAgama();

		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan'] = $this->db->get('tb_jurusan')->result();
		$this->db->order_by('nama_kelas', 'asc');
		$data['kelas'] = $this->db->get('tb_kelas')->result();
		$this->db->order_by('nama_tahun_akademik', 'asc');
		$data['tahun_akademik'] = $this->db->get('tb_tahun_akademik')->result();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomer Telepon', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Mahasiswa/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Mahasiswa_model->UbahDataMahasiswa();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Mahasiswa');
		}
	}

	public function user($nim_mhs) {
		$data_mhs = $this->db->get_where('mahasiswa', ['nim_mhs' => $nim_mhs])->row_array();

		$count_mahasiswa = $this->db->count_all('user');
		$helper = 1 + $count_mahasiswa;

		$stripped = str_replace('', '', $data_mhs['nama_panggilan'] . "0" . $helper);
		$email = $stripped . '@tazkia.ac.id';

		$data = array(
			'nama' => $data_mhs['nama'],
			'nama_panggilan' => $data_mhs['nama_panggilan'],
			'email' => $email,
			'image' => $data_mhs['image'],
			'password' => password_hash('1234', PASSWORD_DEFAULT),
			'password_asli' => encrypt_url('1234'),
			'id_role' => '2',
			'status' => 'Aktif',
			'data_created' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('user', $data);

		$data_update_user = array(
			'email' => $email,
			'status' => 'Aktif',
			'id_role' => '2',
		);

		$this->db->where(array('nim_mhs' => $nim_mhs));
		$this->db->update('mahasiswa', $data_update_user);
		($data_update_user);
		$this->session->set_flashdata('berhasil', 'DiIzinkan Akses');
		redirect(base_url('Mahasiswa'));
	}

	public function nonaktif($nim_mhs) {
		$data_mhs = $this->db->get_where('mahasiswa', ['nim_mhs' => $nim_mhs])->row_array();

		$data = array(
			'email' => '',
			'status' => 'Tidak Aktif',
			'id_role' => '2',
		);

		$this->db->where(array('nim_mhs' => $nim_mhs));
		$this->db->update('mahasiswa', $data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('Mahasiswa'));
	}

	public function print(){
		$data['mahasiswa'] = $this->Mahasiswa_model->getMahasiswaPrint();
		$data['judul'] = 'Data Mahasiswa Institut Agama Islam Tazkia';

		$this->load->view('Mahasiswa/print', $data);
	}

	public function printdetail($nim_mhs){
		$id = decrypt_url($nim_mhs);
		$data['mahasiswa'] = $this->Mahasiswa_model->InfoDataDetail($id);
		$data['judul'] = 'Data Lengkap Mahasiswa Institut Agama Islam Tazkia';

		$this->load->view('Mahasiswa/printdetail', $data);
	}
}