<?php

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login_role();
		$this->load->model('Pengguna_model');
	}

	public function index($offset = NULL)
	{
		$text_usr = "";
		if ($this->input->post('submit') != NULL) {
			$text_usr = $this->input->post('cari_usr');
			$this->session->set_userdata(array("cari_usr" => $text_usr));
		} else {
			if ($this->session->userdata('cari_usr') != NULL) {
				$text_usr = $this->session->userdata('cari_usr');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = 'http://localhost/db-mahasiswa-ci/Pengguna/index';
		$config['total_rows']  = $this->Pengguna_model->CountAllPengguna($text_usr);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul']     = 'Data Users';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']    = $this->uri->segment(3);
		$data['data_user'] = $this->Pengguna_model->GetDataPengguna($limit, $offset, $text_usr);

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Pengguna/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function hapus($id)
	{
		$id_akun = decrypt_url($id);
		$this->Pengguna_model->HapusDataPengguna($id_akun);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Pengguna');
	}

	public function nonaktif($id)
	{
		$data_user = $this->db->get_where('user', ['id' => $id])->row_array();

		$data = array(
			'status'        => 'Tidak Aktif',
			'password'      => '1234',
			'password_asli' => '1234'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('user', $data);
		($data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('Pengguna'));
	}

	public function aktif($id)
	{
		$data_user = $this->db->get_where('user', ['id' => $id])->row_array();

		$data = array(
			'status' => 'Aktif'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('user', $data);
		($data);
		$this->session->set_flashdata('berhasil', 'Data Diaktifkan');
		redirect(base_url('Pengguna'));
	}
}
