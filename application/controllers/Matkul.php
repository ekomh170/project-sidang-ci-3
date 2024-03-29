<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Matkul extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Matkul_model');
	}

	public function index($offset = NULL)
	{
		$text_mtl = "";
		if ($this->input->post('submit') != NULL) {
			$text_mtl = $this->input->post('cari_mtl');
			$this->session->set_userdata(array("cari_mtl" => $text_mtl));
		} else {
			if ($this->session->userdata('cari_mtl') != NULL) {
				$text_mtl = $this->session->userdata('cari_mtl');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Matkul/index';
		$config['total_rows']  = $this->Matkul_model->CoutAllMatkul($text_mtl);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul']     = 'Data Matkul';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']    = $this->uri->segment(3);
		$data['tb_matkul'] = $this->Matkul_model->GetDataMatkul($limit, $offset, $text_mtl);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Matkul/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		$data['judul']   = 'Form Tambah Data';
		$data['user']    = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan'] = $this->db->get('tb_jurusan')->result();

		$this->form_validation->set_rules('nama_matkul', 'Nama', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Nama Jurusan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('matkul/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Matkul_model->TambahDataMatkul();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Matkul');
		}
	}

	public function hapus($id_matkul)
	{
		$id = decrypt_url($id_matkul);
		$this->Matkul_model->HapusDataMatkul($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Matkul');
	}

	public function ubah($id_matkul)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_matkul);
		$data['tb_matkul'] = $this->Matkul_model->IdentitasDataMatkul($id);
		$data['inputSelect'] = $this->Matkul_model->inputSelectDataMatkul($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();
		
		$this->db->order_by('nama_jurusan', 'asc');
		$data['jurusan'] = $this->db->get('tb_jurusan')->result();

		$this->form_validation->set_rules('nama_matkul', 'Nama', 'required');
		$this->form_validation->set_rules('id_jurusan', 'Nama Jurusan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('matkul/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Matkul_model->UbahDataMatkul();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Matkul');
		}
	}
	function print(){
		$data['matkul'] = $this->Matkul_model->getMatkulPrint();
		$data['judul'] = 'Data Mata Kuliah Institut Agama Islam Tazkia';

		$this->load->view('Matkul/print', $data);
	}

	public function pdf(){
		$data['matkul'] = $this->Matkul_model->getMatkulPrint();
		$data['judul'] = 'Data Mata Kuliah Institut Agama Islam Tazkia';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-matkul.pdf";
		$this->pdf->load_view('Matkul/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Kode Mata Kuliah');
		$sheet->setCellValue('C1', 'Nama Mata Kuliah Nama');
		$sheet->setCellValue('D1', 'Nama Mata Jurusan');

		$matkul = $this->Matkul_model->getMatkulPrint();
		$array = json_decode(json_encode($matkul), true);
		$no = 1;
		$baris = 2;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['id_matkul']);
			$sheet->setCellValue('C'.$baris, $row['nama_matkul']);
			$sheet->setCellValue('D'.$baris, $row['nama_jurusan']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-mata-kuliah';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
