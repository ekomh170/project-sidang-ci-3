<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class TahunAkademik extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('TahunAkademik_model');
	}

	public function index($offset = NULL)
	{
		$text_ta = "";
		if ($this->input->post('submit') != NULL) {
			$text_ta = $this->input->post('cari_ta');
			$this->session->set_userdata(array("cari_ta" => $text_ta));
		} else {
			if ($this->session->userdata('cari_ta') != NULL) {
				$text_ta = $this->session->userdata('cari_ta');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'TahunAkademik/index';
		$config['total_rows']  = $this->TahunAkademik_model->CountAllTahunAkademik($text_ta);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul']         = 'Data Tahun Akademik';
		$data['user']          = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['TahunAkademik'] = $this->TahunAkademik_model->GetDataTahunAkademik($limit, $offset, $text_ta);
		$data['offset']        = $this->uri->segment(3);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('TahunAkademik/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah()
	{
		$data['judul'] = 'Form Tambah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama_tahun_akademik', 'Nama Tahun Akademik', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('TahunAkademik/tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->TahunAkademik_model->TambahDataTahunAkademik();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect('TahunAkademik');
		}
	}

	public function hapus($id_tahun_akademik)
	{
		$id = decrypt_url($id_tahun_akademik);
		$this->TahunAkademik_model->HapusDataTahunAkademik($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('TahunAkademik');
	}

	public function ubah($id_tahun_akademik)
	{
		$data['judul'] = 'Form Ubah Data';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($id_tahun_akademik);
		$data['TahunAkademik'] = $this->TahunAkademik_model->IdentitasDataTahunAkademik($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		$this->form_validation->set_rules('nama_tahun_akademik', 'Nama Tahun Akademik', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('TahunAkademik/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->TahunAkademik_model->UbahDataTahunAkademik();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect('TahunAkademik');
		}
	}

	public function print(){
		$data['tahunakademik'] = $this->TahunAkademik_model->getTahunAkademikPrint();
		$data['judul'] = 'Data Tahun Akademik Institut Agama Islam Tazkia';

		$this->load->view('TahunAkademik/print', $data);
	}

	public function pdf(){
		$data['tahunakademik'] = $this->TahunAkademik_model->getTahunAkademikPrint();
		$data['judul'] = 'Data Tahun Akademik Institut Agama Islam Tazkia';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-tahun-akademik.pdf";
		$this->pdf->load_view('TahunAkademik/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Kode Tahun Akademik');
		$sheet->setCellValue('C1', 'Nama Tahun Akademik');
		$sheet->setCellValue('D1', 'Status');

		$tahunakademik = $this->TahunAkademik_model->getTahunAkademikPrint();
		$array = json_decode(json_encode($tahunakademik), true);
		$no = 1;
		$baris = 2;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['id_tahun_akademik']);
			$sheet->setCellValue('C'.$baris, $row['nama_tahun_akademik']);
			$sheet->setCellValue('D'.$baris, $row['status']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-tahun-akademik';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

}
