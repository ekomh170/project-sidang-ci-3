<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Nilai extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('Nilai_model');
		$this->load->model('KrsDetail_model');
	}

	public function index($offset = NULL)
	{
		check_role_dosen_op_penilaian();
		$text_krs = "";
		if ($this->input->post('submit') != NULL) {
			$text_krs = $this->input->post('cari_krs');
			$this->session->set_userdata(array("cari_krs" => $text_krs));
		} else {
			if ($this->session->userdata('cari_krs') != NULL) {
				$text_krs = $this->session->userdata('cari_krs');
			}
		}


		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Nilai/index';
		$config['total_rows']  = $this->Nilai_model->CountAllNilai($text_krs);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination     = $this->pagination->initialize($config);

		$data['judul']  = 'Penilaian Nilai Akhir';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['data']   = $this->Nilai_model->GetDataNilai($limit, $offset, $text_krs);


		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Nilai/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tambah($nim_mhs)
	{
		check_role_dosen_op_penilaian();
		$data['judul']     = 'Form Tambah Data';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($nim_mhs);
		$data['data']  = $this->Tambahan_model->TambahKrsMhsForm($id);

		$this->db->order_by('nama_dosen', 'asc');
		$data['dosen']     = $this->Tambahan_model->selectKrsDosen($id);

		$this->form_validation->set_rules('id_krs', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Nilai/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Nilai_model->TambahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect(base_url('Nilai/detail/') . $nim_mhs);
		}
	}


	public function ubah($id_nilai)
	{
		check_role_dosen_op_penilaian();
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            			   = decrypt_url($id_nilai);
		$data['data']  			   = $this->Tambahan_model->UbahNilaiMhsForm($id);
		$data['inputSelect']  	   = $this->Nilai_model->inputSelectDataKrsDetail($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		// getdatamhs
		$ls = $this->Tambahan_model->UbahNilaiMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		// getdatamhs

		$this->db->order_by('nama_dosen', 'asc');
		$data['dosen']     = $this->Tambahan_model->selectKrsDosen($nim_mhs);

		$this->form_validation->set_rules('id_krs', 'Nama Krs', 'required');
		// $this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		// $this->form_validation->set_rules('nilai_presensi', 'Nilai Presensi', 'required');
		// $this->form_validation->set_rules('nilai_tugas', 'Nilai Tugas', 'required');
		// $this->form_validation->set_rules('nilai_uts', 'Nilai UTS', 'required');
		// $this->form_validation->set_rules('nilai_uas', 'Nilai UAS', 'required');
		// $this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('Nilai/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->Nilai_model->UbahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect(base_url('Nilai/detail/') . $id_mhs);
		}
	}

	public function hapus($id_nilai)
	{
		check_role_dosen_op_penilaian();
		$id = decrypt_url($id_nilai);
		// getdatamhs
		$ls = $this->Tambahan_model->UbahNilaiMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		// getdatamhs

		$this->Nilai_model->HapusDataKrsDetail($id);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect(base_url('Nilai/detail/') . $id_mhs);
	}

	public function detail($nim_mhs)
	{
		$data['judul'] = 'Hasil Penilaian Nilai Akhir';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($nim_mhs);
		$data['data']  = $this->Nilai_model->DetailDataNilai($id);

		if ($this->session->userdata('id_role') != "3") {
			$data['nilai'] = $this->Nilai_model->NilaiDataNilai($id);
		}

		if ($this->session->userdata('id_role') == "3") {
			$id_dosen = $this->session->userdata('nama_dosen');
			$data['nilai'] = $this->Nilai_model->NilaiDataNilaiDosen($id,$this->session->userdata('nama_dosen'));
		}
		

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Nilai/detail', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tmbltambah($nim_mhs)
	{
		$id_mhs = decrypt_url($nim_mhs);
		$data_dsn = $this->db->get_where('tb_dosen', ['nama_dosen' => $this->session->userdata('nama_dosen')])->row_array();
		$dsn_cek = $this->db->get_where('tb_nilai', ['nim_mhs' => $id_mhs])->row_array();
		if ($dsn_cek['id_krs'] == null) {
			$krs_data = $this->db->get_where('krs_detail', [
				'id_dosen' => $data_dsn['id_dosen'],
				'nim_mhs' => $id_mhs,
			])->row_array();

			if ($krs_data['id_krs'] == null) {
				redirect(base_url('Nilai/detail/') . $nim_mhs);
			}

			$count_nil = $this->db->count_all('tb_nilai');
			$helper    = 1 + $count_nil;
			$date      = date('s');

			$id_nilai    = "NLI" . "-" . $helper . $date;

			$data = [
				'id_nilai' => $id_nilai,
				'nim_mhs'  => $id_mhs,
				'id_krs'   => $krs_data['id_krs'],
				'status'   => "Aktif"
			];

			$this->db->insert('tb_nilai', $data);
			$this->session->set_flashdata('berhasil', 'Berhasil Menambah Data:)');
			redirect(base_url('Nilai/detail/') . $nim_mhs);

			if ($this->db->affected_rows() > 0) {
				$assign_to   = '';
				$assign_type = '';
				activity_log("Data Krs", "Menambah Data", $krs_data['id_krs'], $assign_to, $assign_type);
				return true;
			} else {
				return false;
			}
		} else {
			redirect(base_url('KrsDetail/detail/') . $nim_mhs);
		}
	}

	public function print(){
		$data['nilai'] = $this->Nilai_model->getNilaiPrint();
		$data['judul'] = 'Data Nilai Mahasiswa Institut Agama Islam Tazkia yang sudah mulai di rekap';

		$this->load->view('Nilai/print', $data);
	}

	public function printdetail($nim_mhs)
	{
		$id            = decrypt_url($nim_mhs);
		$data['judul'] = 'Hasil Penilaian Nilai Akhir';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data']  = $this->Nilai_model->DetailDataNilai($id);

		if ($this->session->userdata('id_role') != "3") {
			$data['nilai'] = $this->Nilai_model->NilaiDataNilai($id);
		}

		$this->load->view('Nilai/printdetail', $data);
	}

	public function pdf(){
		$data['nilai'] = $this->Nilai_model->getNilaiPrint();
		$data['judul'] = 'Data Nilai Mahasiswa Institut Agama Islam Tazkia yang sudah mulai di rekap';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-nilai.pdf";
		$this->pdf->load_view('Nilai/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nomor Induk Mahasiswa');
		$sheet->setCellValue('C1', 'Nama Mahasiswa');
		$sheet->setCellValue('E1', 'Nama Jurusan');

		$nilai = $this->Nilai_model->getNilaiPrint();
		$array = json_decode(json_encode($nilai), true);
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
		$filename = 'laporan-data-nilai-mahasiswa';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function pdfdetail($nim_mhs)
	{
		$id            = decrypt_url($nim_mhs);
		$data['judul'] = 'Hasil Penilaian Nilai';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data']  = $this->Nilai_model->DetailDataNilai($id);
		$data_mhs = $this->Nilai_model->DetailDataNilai($id);

		if ($this->session->userdata('id_role') != "3") {
			$data['nilai'] = $this->Nilai_model->NilaiDataNilai($id);
		}

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = $data_mhs['nama']. "-laporan-data-nilai-akhir.pdf";
		$this->pdf->load_view('Nilai/pdfdetail', $data);
	}

	public function exceldetail($nim_mhs){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$id = decrypt_url($nim_mhs);

		$data_mhs = $this->Nilai_model->DetailDataNilai($id);
		$sheet->setCellValue('A1', "NIM Mahasiswa : ".  $data_mhs['nim_mhs']);
		$sheet->setCellValue('A2', "Nama Mahasiswa : ". $data_mhs['nama']);
		$sheet->setCellValue('A3', "Nama Fakultas : ". $data_mhs['nama_fakultas']);
		$sheet->setCellValue('A4', "Nama Jurusan : ". $data_mhs['nama_jurusan']);
		$sheet->setCellValue('A5', "Nama Tahun Akademik : ". $data_mhs['nama_tahun_akademik']);
		$sheet->setCellValue('A6', "Status : ". $data_mhs['status']);

		$sheet->setCellValue('A7', 'No');
		$sheet->setCellValue('B7', 'Nama Dosen');
		$sheet->setCellValue('C7', 'Mata Kuliah');
		$sheet->setCellValue('E7', 'Nilai Presensi');
		$sheet->setCellValue('F7', 'Nilai Tugas');
		$sheet->setCellValue('G7', 'Nilai UTS');
		$sheet->setCellValue('H7', 'Nilai UAS');
		$sheet->setCellValue('I7', 'Total Nilai');
		$sheet->setCellValue('J7', 'Nilai Akhir');
		$sheet->setCellValue('K7', 'Predikat');
		$sheet->setCellValue('L7', 'Status');

		$nilai = $this->Nilai_model->NilaiDataNilai($id);
		$array = json_decode(json_encode($nilai), true);
		$no = 1;
		$baris = 8;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['nama_dosen']);
			$sheet->setCellValue('C'.$baris, $row['nama_matkul']);
			$sheet->setCellValue('E'.$baris, $row['nilai_presensi']);
			$sheet->setCellValue('F'.$baris, $row['nilai_tugas']);
			$sheet->setCellValue('G'.$baris, $row['nilai_uts']);
			$sheet->setCellValue('H'.$baris, $row['nilai_uas']);
			$sheet->setCellValue('I'.$baris, $row['total_nilai']);
			$sheet->setCellValue('J'.$baris, $row['nilai_akhir']);
			$sheet->setCellValue('K'.$baris, $row['grade']);
			$sheet->setCellValue('L'.$baris, $row['status']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = $data_mhs['nama']. '-xlaporan-data-krs-detail-mahasiswa';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
