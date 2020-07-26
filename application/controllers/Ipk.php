<?php
class Ipk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		pass_block();

		$this->load->model('Ipk_model');
	}

	public function index($offset = NULL)
	{
		check_role_dosen_op_penilaian();
		$text_ipk = "";
		if ($this->input->post('submit') != NULL) {
			$text_ipk = $this->input->post('cari_ipk');
			$this->session->set_userdata(array("cari_ipk" => $text_ipk));
		} else {
			if ($this->session->userdata('cari_ipk') != NULL) {
				$text_ipk = $this->session->userdata('cari_ipk');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Ipk/index';
		$config['total_rows']  = $this->Ipk_model->CountAllIpk($text_ipk);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination     = $this->pagination->initialize($config);

		$data['judul']  = 'Penilaian IPK';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['data']   = $this->Ipk_model->GetDataIpk($limit, $offset, $text_ipk);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Ipk/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		check_role_dosen_op_penilaian();
		$data['judul']     = 'Form Tambah Data';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('nama', 'asc');
		$data['mahasiswa'] = $this->db->get('mahasiswa')->result();

		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required|is_unique[tb_ipk.nim_mhs]');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Ipk/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Ipk_model->TambahDataIpk();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Ipk');
		}
	}

	public function hapus($id_ipk)
	{
		check_role_dosen_op_penilaian();
		$id = decrypt_url($id_ipk);
		$this->Ipk_model->HapusDataIpk($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Ipk');
	}


	public function ubah($id_ipk)
	{
		check_role_dosen_op_penilaian();
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_ipk);
		$data['data']  = $this->Tambahan_model->UbahIpkMhsForm($id);

		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('sks_total', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('bobot_total', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('nilai_total_sks', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('ipk', 'Nama Mahasiswa', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Ipk/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Ipk_model->UbahDataIpk();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Ipk');
		}
	}
	public function detail($nim_mhs)
	{
		$data['judul'] = 'Hasil Penilaian Ipk';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($nim_mhs);
		$data['data']  = $this->Ipk_model->DetailDataIpk($id);
		$data['nilai']  = $this->Ipk_model->NilaiDataIpk($id);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Ipk/detail', $data);
		$this->load->view('layout/tb_footer');
	}
}
