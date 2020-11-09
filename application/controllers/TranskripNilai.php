<?php
class TranskripNilai extends CI_Controller {
	public function __construct() {
		parent::__construct();
		cek_login();
		pass_block();

		$this->load->model('TranskripNilai_model');
	}

	public function index($offset = NULL) {
		check_role_dosen_op_penilaian();
		$text_tn = "";
		if ($this->input->post('submit') != NULL) {
			$text_tn = $this->input->post('cari_tn');
			$this->session->set_userdata(array("cari_tn" => $text_tn));
		} else {
			if ($this->session->userdata('cari_tn') != NULL) {
				$text_tn = $this->session->userdata('cari_tn');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url() . 'TranskripNilai/index';
		$config['total_rows'] = $this->TranskripNilai_model->CountAllTranskripNilai($text_tn);
		$config['per_page'] = $limit;
		$config['num_links'] = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul'] = 'Transkrip Nilai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['data'] = $this->TranskripNilai_model->GetDataTranskripNilai($limit, $offset, $text_tn);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('TranskripNilai/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah() {
		check_role_dosen_op_penilaian();
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('nama', 'asc');
		$data['mahasiswa'] = $this->db->get('mahasiswa')->result();

		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required|is_unique[tb_transkrip_nilai.nim_mhs]');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('TranskripNilai/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->TranskripNilai_model->TambahDataTranskripNilai();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('TranskripNilai');
		}
	}

	public function ubah($id_transkrip_nilai) {
		check_role_dosen_op_penilaian();
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_transkrip_nilai);
		$data['data'] = $this->db->get_where('tb_transkrip_nilai', ['id_transkrip_nilai' => $id])->row_array();
		$data['inputSelect'] = $this->TranskripNilai_model->inputSelectDataTranskripNilai($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$data['mahasiswa'] = $this->db->get('mahasiswa')->result();

		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required|is_unique[tb_transkrip_nilai.nim_mhs]');
		$this->form_validation->set_rules('status', 'Nama Mahasiswa', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('TranskripNilai/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->TranskripNilai_model->UbahDataTranskripNilai();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('TranskripNilai');
		}
	}

	public function detail($id_transkrip_nilai) {
		$data['judul'] = 'Hasil Penilaian Transkrip Nilai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_transkrip_nilai);
		$data['data'] = $this->TranskripNilai_model->DetailDataTranskripNilai($id);
		$data['nilai'] = $this->TranskripNilai_model->NilaiDataTranskripNilai($id);
		$data['ipk'] = $this->TranskripNilai_model->IpkDataTranskripNilai($id);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('TranskripNilai/detail', $data);
		$this->load->view('layout/tb_footer');
	}

	public function hapus($id_transkrip_nilai) {
		check_role_dosen_op_penilaian();
		$id = decrypt_url($id_transkrip_nilai);
		$this->TranskripNilai_model->HapusDataTranskripNilai($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('TranskripNilai');
	}

	public function print(){
		$data['transkripnilai'] = $this->TranskripNilai_model->getTnPrint();
		$data['judul'] = 'Data Transkrip Nilai Institut Agama Islam Tazkia';

		$this->load->view('TranskripNilai/print', $data);
	}

	public function printdetail($id_transkrip_nilai) {
		$data['judul'] = 'Hasil Penilaian Transkrip Nilai';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_transkrip_nilai);
		$data['data'] = $this->TranskripNilai_model->DetailDataTranskripNilai($id);
		$data['nilai'] = $this->TranskripNilai_model->NilaiDataTranskripNilai($id);
		$data['ipk'] = $this->TranskripNilai_model->IpkDataTranskripNilai($id);

		$this->load->view('TranskripNilai/printdetail', $data);
	}

}
