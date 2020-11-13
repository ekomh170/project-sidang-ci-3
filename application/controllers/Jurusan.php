<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Jurusan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Jurusan_model');
	}


	public function index($offset = NULL)
	{
		$text_jrs = "";
		if ($this->input->post('submit') != NULL) {
			$text_jrs = $this->input->post('cari_jrs');
			$this->session->set_userdata(array("cari_jrs" => $text_jrs));
		} else {
			if ($this->session->userdata('cari_jrs') != NULL) {
				$text_jrs = $this->session->userdata('cari_jrs');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Jurusan/index';
		$config['total_rows']  = $this->Jurusan_model->CountAllJurusan($text_jrs);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination      = $this->pagination->initialize($config);


		$data['judul']   = 'Data Jurusan';
		$data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']  = $this->uri->segment(3);
		$data['jurusan'] = $this->Jurusan_model->GetDataJurusan($limit, $offset, $text_jrs);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Jurusan/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		$data['judul']              = 'Form Tambah Data';
		$data['user']               = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->db->order_by('nama_fakultas', 'asc');
		$data['fakultas']           = $this->db->get('tb_fakultas')->result();
		$this->db->order_by('nama_lengkap_jp', 'asc');
		$data['jenjang_pendidikan'] = $this->db->get('tb_jenjang_pendidikan')->result();

		$this->form_validation->set_rules('nama_jurusan', 'Nama', 'required');
		$this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
		$this->form_validation->set_rules('id_jenjang_pendidikan', 'Nama Jenjang Pendidikan', 'required');
		$this->form_validation->set_rules('penjelasan', 'Isi Penjelasan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Jurusan/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Jurusan_model->TambahDataJurusan();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Jurusan');
		}
	}

	public function hapus($id_jurusan)
	{
		$id = decrypt_url($id_jurusan);
		$this->Jurusan_model->HapusDataJurusan($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Jurusan');
	}

	public function ubah($id_jurusan)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id                 = decrypt_url($id_jurusan);
		$data['tb_jurusan'] = $this->Jurusan_model->IdentitasDataJurusan($id);
		$data['inputSelect'] = $this->Jurusan_model->inputSelectDataJurusan($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$this->db->order_by('nama_fakultas', 'asc');
		$data['fakultas']           = $this->db->get('tb_fakultas')->result();
		$this->db->order_by('nama_lengkap_jp', 'asc');
		$data['jenjang_pendidikan'] = $this->db->get('tb_jenjang_pendidikan')->result();

		$this->form_validation->set_rules('nama_jurusan', 'Nama', 'required');
		$this->form_validation->set_rules('id_fakultas', 'Nama Fakultas', 'required');
		$this->form_validation->set_rules('id_jenjang_pendidikan', 'Nama Jenjang Pendidikan', 'required');
		$this->form_validation->set_rules('penjelasan', 'Isi Penjelasan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Jurusan/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Jurusan_model->UbahDataJurusan();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Jurusan');
		}
	}

	function print(){
		$data['jurusan'] = $this->Jurusan_model->getJurusanPrint();
		$data['judul'] = 'Data Jurusan Institut Agama Islam Tazkia';

		$this->load->view('Jurusan/print', $data);
	}

	public function pdf(){
		$data['jurusan'] = $this->Jurusan_model->getJurusanPrint();
		$data['judul'] = 'Data Jurusan Institut Agama Islam Tazkia';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-jurusan.pdf";
		$this->pdf->load_view('Jurusan/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Kode Jurusan');
		$sheet->setCellValue('C1', 'Nama Jurusan');
		$sheet->setCellValue('D1', 'Nama Fakultas');
		$sheet->setCellValue('E1', 'Nama Pendidikan');
		$sheet->setCellValue('F1', 'Nama Singkatan Pendidikan');

		$jurusan = $this->Jurusan_model->getJurusanPrint();
		$array = json_decode(json_encode($jurusan), true);
		$no = 1;
		$baris = 2;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['id_jurusan']);
			$sheet->setCellValue('C'.$baris, $row['nama_jurusan']);
			$sheet->setCellValue('D'.$baris, $row['nama_fakultas']);
			$sheet->setCellValue('E'.$baris, $row['nama_lengkap_jp']);
			$sheet->setCellValue('F'.$baris, $row['nama_jp']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-jurusan';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
