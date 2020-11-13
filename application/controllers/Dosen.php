<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dosen extends CI_Controller {

	public function __construct() {
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Dosen_model');
	}

	public function index($offset = NULL) {
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
		$config['base_url'] = base_url() . 'Dosen/index';
		$config['total_rows'] = $this->Dosen_model->CoutAllDosen($text_dosen);
		$config['per_page'] = $limit;
		$config['num_links'] = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul'] = 'Data Dosen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['join'] = $this->Dosen_model->getDosen($limit, $offset, $text_dosen);
		$data['pagination'] = $pagination;

		//PENUTUP PAGINATION

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Dosen/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah() {
		$data['judul'] = 'Form Tambah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('nama_matkul', 'asc');
		$data['tb_matkul'] = $this->db->get('tb_matkul')->result();

		$this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan Dosen', 'required');
		$this->form_validation->set_rules('id_matkul', 'Mata Kuliah', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomer Telepon', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Dosen/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Dosen_model->TambahDataDosen();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Dosen');
		}
	}

	public function detail($id_dosen) {
		$data['judul'] = 'Data Lengkap Dosen';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_dosen);
		$data['tb_dosen'] = $this->Dosen_model->InfoDataDetail($id);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Dosen/detail', $data);
		$this->load->view('layout/tb_footer');
	}

	public function hapus($id_dosen) {
		$id = decrypt_url($id_dosen);
		$this->Dosen_model->HapusDataDosen($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Dosen');
	}

	public function edit($id_dosen) {
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_dosen);
		$data['tb_dosen'] = $this->Dosen_model->IdentitasDataDosen($id);
		$data['inputSelect'] = $this->Dosen_model->InfoDataDetail($id);
		$data['inputSelectAgama'] = $this->Tambahan_model->inputSelectDataAgama();

		$this->db->order_by('nama_matkul', 'asc');
		$data['tb_matkul'] = $this->db->get('tb_matkul')->result();

		$this->form_validation->set_rules('nama_dosen', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan Dosen', 'required');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('id_matkul', 'Nama Matkul', 'required');
		$this->form_validation->set_rules('agama', 'Agama', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('tmpt_lahir', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('no_telp', 'Nomer Telpon', 'required|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('dosen/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Dosen_model->UbahDataDosen();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Dosen');
		}
	}

	public function user($id_dosen) {
		$data_dsn = $this->db->get_where('tb_dosen', ['id_dosen' => $id_dosen])->row_array();
		$count_dosen = $this->db->count_all('user');
		$helper = 1 + $count_dosen;
		$stripped = str_replace(' ', '', $data_dsn['nama_panggilan'] . "0" . $helper);
		$email = $stripped . '@dosentazkia.ac.id';

		$data = array(
			'nama' => $data_dsn['nama_dosen'],
			'nama_panggilan' => $data_dsn['nama_panggilan'],
			'email' => $email,
			'image' => $data_dsn['image'],
			'password' => password_hash('1234', PASSWORD_DEFAULT),
			'password_asli' => encrypt_url('1234'),
			'id_role' => '3',
			'status' => 'Aktif',
			'data_created' => date('Y-m-d H:i:s'),
		);

		$this->db->insert('user', $data);

		$data_update_user = array(
			'email' => $email,
			'status' => 'Aktif',
			'id_role' => '3',
		);

		$this->db->where(array('id_dosen' => $id_dosen));
		$this->db->update('tb_dosen', $data_update_user);
		$this->session->set_flashdata('berhasil', 'Data Telah Dizinkan');
		redirect('Dosen');
	}

	public function nonaktif($id_dosen) {
		$data_dsn = $this->db->get_where('tb_dosen', ['id_dosen' => $id_dosen])->row_array();

		$stripped = str_replace('', '', $data_dsn['nama_dosen']);
		$email = $stripped . '@tazkia.ac.id';

		$data = array(
			'email' => '',
			'status' => 'Tidak Aktif',
			'id_role' => '0',
		);
		$this->db->where(array('id_dosen' => $id_dosen));
		$this->db->update('tb_dosen', $data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('Dosen'));
	}

	function print(){
		$data['dosen'] = $this->Dosen_model->getDosenPrint();
		$data['judul'] = 'Data Dosen Institut Agama Islam Tazkia';

		$this->load->view('Dosen/print', $data);
	}

	public function printdetail($id_dosen){
		$id = decrypt_url($id_dosen);
		$data['tb_dosen'] = $this->Dosen_model->InfoDataDetail($id);
		$data['judul'] = 'Data Lengkap Dosen Institut Agama Islam Tazkia';

		$this->load->view('Dosen/printdetail', $data);
	}

	public function pdf(){
		$data['dosen'] = $this->Dosen_model->getDosenPrint();
		$data['judul'] = 'Data Dosen Institut Agama Islam Tazkia';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-dosen.pdf";
		$this->pdf->load_view('Dosen/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Kode Dosen');
		$sheet->setCellValue('C1', 'Nama Dosen');
		$sheet->setCellValue('D1', 'Mata Kuliah');
		$sheet->setCellValue('E1', 'Jenis Kelamin');

		$dosen = $this->Dosen_model->getDosenPrint();
		$array = json_decode(json_encode($dosen), true);
		$no = 1;
		$baris = 2;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['id_dosen']);
			$sheet->setCellValue('C'.$baris, $row['nama_dosen']);
			$sheet->setCellValue('D'.$baris, $row['nama_matkul']);
			$sheet->setCellValue('E'.$baris, $row['jenis_kelamin']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-dosen';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
