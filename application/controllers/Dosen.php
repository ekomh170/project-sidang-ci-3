<?php

class Dosen extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Dosen_model');
	}


	public function index($offset = NULL)
	{
		$text_dosen = "";
		if ($this->input->post('submit') != NULL) {
			$text_dosen = $this->input->post('cari_dosen');
			$this->session->set_userdata(array("cari_dosen" => $text_dosen));
		} else {
			if ($this->session->userdata('cari_dosen') != NULL) {
				$text_dosen = $this->session->userdata('cari_dosen');
			}
		}


		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url(). 'Dosen/index';
		$config['total_rows']  = $this->Dosen_model->CoutAllDosen($text_dosen);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);


		$data['judul']      = 'Data Dosen';
		$data['user']       = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']     = $this->uri->segment(3);
		$data['join']       = $this->Dosen_model->getDosen($limit, $offset, $text_dosen);
		$data['pagination'] = $pagination;

		//PENUTUP PAGINATION

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Dosen/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['tb_matkul'] = $this->db->get('tb_matkul')->result();

		$this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
		$this->form_validation->set_rules('id_matkul', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis_kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Dosen/Tambah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Dosen_model->TambahDataDosen();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('dosen');
		}
	}

	public function detail($id_dosen)
	{
		$data['judul'] = 'Data Lengkap Dosen';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_dosen);
		$data['tb_dosen'] = $this->Dosen_model->InfoDataDetail($id);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Dosen/detail', $data);
		$this->load->view('templates/tb_footer');
	}

	public function hapus($id_dosen)
	{
		$id = decrypt_url($id_dosen);
		$this->Dosen_model->HapusDataDosen($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('dosen');
	}

	public function edit($id_dosen)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_dosen);
		$data['tb_dosen'] = $this->Dosen_model->IdentitasDataDosen($id);

		$data['tb_matkul'] = $this->db->get('tb_matkul')->result();

		$this->form_validation->set_rules('nama_dosen', 'Nama', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis kelamin', 'required');
		$this->form_validation->set_rules('id_matkul', 'Nama Matkul', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomer Telpon', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('dosen/ubah', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$this->Dosen_model->UbahDataDosen();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('dosen');
		}
	}

	public function user($id_dosen)
	{
		$data_dsn    = $this->db->get_where('tb_dosen', ['id_dosen' => $id_dosen])->row_array();
		$count_dosen = $this->db->count_all('user');
		$helper      = 1 + $count_dosen;
		$stripped    = str_replace(' ', '', $data_dsn['nama_panggilan'] . "0" . $helper);
		$email       = $stripped . '@dosentazkia.ac.id';


		$data = array(
			'nama'           => $data_dsn['nama'],
			'nama_panggilan' => $data_dsn['nama_panggilan'],
			'email'          => $email,
			'image'          => $data_dsn['image'],
			'password'       => password_hash('1234', PASSWORD_DEFAULT),
			'password_asli'  => '1234',
			'id_role'        => '3',
			'status'         => 'Aktif',
			'data_created'   => date('Y-m-d H:i:s')
		);

		$this->db->insert('user', $data);

		$data_update_user = array(
			'email'   => $email,
			'status'  => 'Tidak Aktif',
			'id_role' => '3'
		);

		$this->db->where(array('id_dosen' => $id_dosen));
		$this->db->update('tb_dosen', $data_update_user);
		($data_update_user);
		$this->session->set_flashdata('berhasil', 'Data Telah Dizinkan');
		redirect('Dosen');
	}

	public function nonaktif($id_dosen)
	{
		$data_dsn = $this->db->get_where('tb_dosen', ['id_dosen' => $id_dosen])->row_array();

		$stripped = str_replace('', '', $data_dsn['nama']);
		$email = $stripped . '@tazkia.ac.id';

		$data = array(
			'email'   => '',
			'status'  => '0',
			'id_role' => '0'
		);
		$this->db->where(array('id_dosen' => $id_dosen));
		$this->db->update('tb_dosen', $data);
		($data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('Dosen'));
	}
}
