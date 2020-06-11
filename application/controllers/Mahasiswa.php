<?php

class Mahasiswa extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Mahasiswa_model');
	}


	public function index($offset = NULL)
	{
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
		$config['base_url']    = 'http://localhost/db-mahasiswa-ci/Mahasiswa/index';
		$config['total_rows']  = $this->Mahasiswa_model->CountAllMahasiswa($text_mhs);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul']  = 'Data Mahasiswa';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['join']   = $this->Mahasiswa_model->getMahasiswa($limit, $offset, $text_mhs);
		$data['krs']    = $this->db->get('krs_detail')->result();
		//PENUTUP PAGINATION

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Mahasiswa/index', $data);
		$this->load->view('templates/tb_footer');
	}


	public function tambah()
	{
		$data['judul']          = 'Form Tambah Data';
		$data['user']           = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan']        = $this->db->get('tb_jurusan')->result();
		$this->db->order_by('nama_kelas', 'asc');
		$data['kelas']          = $this->db->get('tb_kelas')->result();
		$this->db->order_by('nama_tahun_akademik', 'asc');
		$data['tahun_akademik'] = $this->db->get('tb_tahun_akademik')->result();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('id_tahun_akademik', 'Tahun Akademik', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'tmpt_lahir', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_telp', 'No_telp', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Mahasiswa/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Mahasiswa_model->TambahDataMahasiswa();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('mahasiswa');
		}
	}


	public function hapus($nim_mhs)
	{
		$id = decrypt_url($nim_mhs);
		$this->Mahasiswa_model->HapusDataMahasiswa($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('mahasiswa');
	}

	public function detail($nim_mhs)
	{
		$data['judul'] = 'Data Lengkap Mahasiswa';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id                = decrypt_url($nim_mhs);
		$data['mahasiswa'] = $this->Mahasiswa_model->InfoDataDetail($id);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Mahasiswa/detail', $data);
		$this->load->view('templates/tb_footer');
	}

	public function edit($nim_mhs)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id                = decrypt_url($nim_mhs);
		$data['mahasiswa'] = $this->Mahasiswa_model->IdentitasDataMahasiswa($id);

		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan']        = $this->db->get('tb_jurusan')->result();
		$this->db->order_by('nama_kelas', 'asc');
		$data['kelas']          = $this->db->get('tb_kelas')->result();
		$this->db->order_by('nama_tahun_akademik', 'asc');
		$data['tahun_akademik'] = $this->db->get('tb_tahun_akademik')->result();

		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Jurusan', 'required');
		$this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'tmpt_lahir', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'tanggal_lahir Lahir', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('no_telp', 'No_telp', 'required|numeric');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Mahasiswa/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Mahasiswa_model->UbahDataMahasiswa();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Mahasiswa');
		}
	}

	public function user($nim_mhs)
	{
		$data_mhs = $this->db->get_where('mahasiswa', ['nim_mhs' => $nim_mhs])->row_array();

		$count_mahasiswa = $this->db->count_all('user');
		$helper = 1 + $count_mahasiswa;

		$stripped = str_replace('', '', $data_mhs['nama_panggilan'] . "0" . $helper);
		$email = $stripped . '@tazkia.ac.id';


		$data = array(
			'nama'           => $data_mhs['nama'],
			'nama_panggilan' => $data_mhs['nama_panggilan'],
			'email'          => $email,
			'image'          => $data_mhs['image'],
			'password'       => password_hash('1234', PASSWORD_DEFAULT),
			'password_asli'  => password_hash('1234', PASSWORD_DEFAULT),
			'id_role'        => '2',
			'status'         => 'Aktif',
			'data_created'   => date('Y-m-d H:i:s')
		);

		$this->db->insert('user', $data);

		$data_update_user = array(
			'email'   => $email,
			'status'  => 'Aktif',
			'id_role' => '2'
		);

		$this->db->where(array('nim_mhs' => $nim_mhs));
		$this->db->update('mahasiswa', $data_update_user);
		($data_update_user);
		$this->session->set_flashdata('berhasil', 'DiIzinkan Akses');
		redirect(base_url('mahasiswa'));
	}

	public function nonaktif($nim_mhs)
	{
		$data_mhs = $this->db->get_where('mahasiswa', ['nim_mhs' => $nim_mhs])->row_array();

		$data = array(
			'email'   => '',
			'status'  => 'Tidak Aktif',
			'id_role' => '2'
		);

		$this->db->where(array('nim_mhs' => $nim_mhs));
		$this->db->update('mahasiswa', $data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('mahasiswa'));
	}
}

	// public function penilaian($nim_mhs){
	// 	$data_mhs  = $this->db->get_where('mahasiswa', ['nim_mhs' => $nim_mhs])->row_array();
	// 	$count_krs = $this->db->count_all('krs_detail');
	// 	$helper    = 1 + $count_krs;
	// 	$date      = date('s');

	// 	if (!$data_mhs['id_krs']) { 
	// 		$id_krs = "KRS" . "-" . $helper . "-" . $date;
	// 	}

	// 	if ($data_mhs['id_krs']) { 
	// 		$id_krs = $data_mhs['id_krs'];
	// 	}

	// 	$data = array(
	// 		'id_krs'      => $id_krs,
	// 		'nim_mhs_mhs' => $data_mhs['nim_mhs'],
	// 		'id_jurusan'  => $data_mhs['id_jurusan'],
	// 		'id_matkul'   => $this->session->userdata('id_matkul'),
	// 		'id_dosen'    => $this->session->userdata('id_dosen'),
	// 		'status'      => "Tidak Aktif"
	// 	);

	// 	$this->db->insert('krs_detail', $data);

	// 	$data_update_mhs = array(
	// 		'id_krs' => $id_krs
	// 	);
	// 	$this->db->where(array('nim_mhs' => $nim_mhs));
	// 	$this->db->update('mahasiswa' , $data_update_mhs);
	// 	$this->session->set_flashdata('berhasil', 'DiIzinkan Akses');

	// 	if ($this->session->userdata('id_role') == 3) { 
	// 		redirect(base_url('KrsDetailDsn/') . $this->session->userdata('id_dosen') );
	// 	}
	// 	// if ($this->session->userdata('id_role') == 1) { 
	// 	// 	redirect(base_url('KrsDetail'));
	// 	// }
	// }
