<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

	public function print(){
		$data['ipk'] = $this->Ipk_model->getIpkPrint();
		$data['judul'] = 'Data Ipk Mahasiswa Institut Agama Islam Tazkia yang sudah mulai di rekap';

		$this->load->view('Ipk/print', $data);
	}

	public function printdetail($nim_mhs)
	{
		$data['judul'] = 'Hasil Penilaian Ipk';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id = decrypt_url($nim_mhs);
		$data['data']  = $this->Ipk_model->DetailDataIpk($id);
		$data['nilai']  = $this->Ipk_model->NilaiDataIpk($id);

		$this->load->view('Ipk/printdetail', $data);
	}

	public function pdf(){
		$data['ipk'] = $this->Ipk_model->getIpkPrint();
		$data['judul'] = 'Data Ipk Mahasiswa Institut Agama Islam Tazkia yang sudah mulai di rekap';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-ipk.pdf";
		$this->pdf->load_view('Ipk/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nomor Induk Mahasiswa');
		$sheet->setCellValue('C1', 'Nama Mahasiswa');
		$sheet->setCellValue('E1', 'Nama Jurusan');

		$ipk = $this->Ipk_model->getIpkPrint();
		$array = json_decode(json_encode($ipk), true);
		$no = 1;
		$baris = 2;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['nim_mhs']);
			$sheet->setCellValue('C'.$baris, $row['nama']);
			$sheet->setCellValue('E'.$baris, $row['nama_jurusan']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-ipk';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function pdfdetail($nim_mhs)
	{
		$id            = decrypt_url($nim_mhs);
		$data['judul'] = 'Hasil Penilaian IPK';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data']  = $this->Ipk_model->DetailDataIpk($id);
		$data['ipk']  = $this->Ipk_model->NilaiDataIpk($id);
		$data_mhs  = $this->Ipk_model->DetailDataIpk($id);


		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = $data_mhs['nama']. "-laporan-data-Ipk.pdf";
		$this->pdf->load_view('Ipk/pdfdetail', $data);
	}

	public function exceldetail($nim_mhs){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$id = decrypt_url($nim_mhs);

		$data_mhs  = $this->Ipk_model->DetailDataIpk($id);
		$sheet->setCellValue('A1', "NIM Mahasiswa : ".  $data_mhs['nim_mhs']);
		$sheet->setCellValue('A2', "Nama Mahasiswa : ". $data_mhs['nama']);
		$sheet->setCellValue('A3', "Nama Fakultas : ". $data_mhs['nama_fakultas']);
		$sheet->setCellValue('A4', "Nama Jurusan : ". $data_mhs['nama_jurusan']);
		$sheet->setCellValue('A5', "Nama Tahun Akademik : ". $data_mhs['nama_tahun_akademik']);
		$sheet->setCellValue('A6', "Status : ". $data_mhs['status']);

		$sheet->setCellValue('A7', 'No');
		$sheet->setCellValue('B7', 'Kode Ipk');
		$sheet->setCellValue('C7', 'Jumlah SKS');
		$sheet->setCellValue('D7', 'Nilai Seluruh Sks');
		$sheet->setCellValue('E7', 'Nilai Total Bobot');
		$sheet->setCellValue('F7', 'Nilai Ipk');

		$krs = $this->KrsDetail_model->krsDataKrsDetail($id);
		$array = json_decode(json_encode($krs), true);
		$no = 1;
		$baris = 8;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['id_ipk']);
			$sheet->setCellValue('C'.$baris, $row['sks_total']);
			$sheet->setCellValue('D'.$baris, $row['nilai_total_sks']);
			$sheet->setCellValue('E'.$baris, $row['bobot_total']);
			$sheet->setCellValue('F'.$baris, $row['ipk']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = $data_mhs['nama']. '-laporan-data-krs-detail-mahasiswa';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
