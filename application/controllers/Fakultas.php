<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Fakultas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Fakultas_model');
	}

	public function index($offset = NULL)
	{
		$text_fks = "";
		if ($this->input->post('submit') != NULL) {
			$text_fks = $this->input->post('cari_fks');
			$this->session->set_userdata(array("cari_fks" => $text_fks));
		} else {
			if ($this->session->userdata('cari_fks') != NULL) {
				$text_fks = $this->session->userdata('cari_fks');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Fakultas/index';
		$config['total_rows']  = $this->Fakultas_model->CountAllFakultas($text_fks);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination          = $this->pagination->initialize($config);

		$data['judul']       = 'Data Fakultas';
		$data['user']        = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']      = $this->uri->segment(3);
		$data['tb_fakultas'] = $this->Fakultas_model->GetDataFakultas($limit, $offset, $text_fks);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('fakultas/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('fakultas/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Fakultas_model->TambahDataFakultas();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('Fakultas');
		}
	}

	public function hapus($id_fakultas)
	{
		$id = decrypt_url($id_fakultas);
		$this->Fakultas_model->HapusDataFakultas($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Fakultas');
	}

	public function ubah($id_fakultas)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_fakultas);
		$data['tb_fakultas'] = $this->Fakultas_model->IdentitasDataFakultas($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$this->form_validation->set_rules('nama_fakultas', 'Nama Fakultas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('fakultas/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Fakultas_model->UbahDataFakultas();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('Fakultas');
		}
	}

	function print(){
		$data['fakultas'] = $this->Fakultas_model->getFakultasPrint();
		$data['judul'] = 'Data Fakultas Institut Agama Islam Tazkia';

		$this->load->view('Fakultas/print', $data);
	}

	public function pdf(){
		$data['fakultas'] = $this->Fakultas_model->getFakultasPrint();
		$data['judul'] = 'Data Fakultas Institut Agama Islam Tazkia';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-fakultas.pdf";
		$this->pdf->load_view('Fakultas/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama Fakultas');
		$sheet->setCellValue('C1', 'Keterangan');
		$sheet->setCellValue('D1', 'Status');

		$fakultas = $this->Fakultas_model->getFakultasPrint();
		$array = json_decode(json_encode($fakultas), true);
		$no = 1;
		$baris = 2;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['nama_fakultas']);
			$sheet->setCellValue('C'.$baris, $row['keterangan']);
			$sheet->setCellValue('D'.$baris, $row['status']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-fakultas';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
