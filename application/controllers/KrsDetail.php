<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class KrsDetail extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		pass_block();

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
		$config['base_url']    = base_url().'KrsDetail/index';
		$config['total_rows']  = $this->KrsDetail_model->CountAllKrsDetail($text_krs);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination     = $this->pagination->initialize($config);

		$data['judul']  = 'Penilaian KRS';
		$data['user']   = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset'] = $this->uri->segment(3);
		$data['data']   = $this->KrsDetail_model->GetDataKrsDetail($limit, $offset, $text_krs);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('KrsDetail/index', $data);
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
		$data['dosen']     = $this->Tambahan_model->TambahDataMatkulForm();

		$this->form_validation->set_rules('id_dosen', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('KrsDetail/Tambah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->KrsDetail_model->TambahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'Ditambahkan');
			redirect(base_url('KrsDetail/detail/') . $nim_mhs);
		}
	}


	public function ubah($id_krs)
	{
		check_role_dosen_op_penilaian();
		$data['judul'] = 'Form Ubah Data';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($id_krs);
		$data['data']  = $this->Tambahan_model->UbahKrsMhsForm($id);
		$data['inputSelect']  = $this->KrsDetail_model->inputSelectDataKrsDetail($id);
		$data['inputSelectStatus'] = $this->Tambahan_model->inputSelectDataStatus();

		//get id mhs
		$ls = $this->Tambahan_model->UbahKrsMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		//get id mhs

		$this->db->order_by('nama_dosen', 'asc');
		$data['dosen'] = $this->Tambahan_model->TambahDataMatkulForm();

		$this->form_validation->set_rules('id_dosen', 'Nama Dosen', 'required');
		$this->form_validation->set_rules('nim_mhs', 'Nama Mahasiswa', 'required');
		$this->form_validation->set_rules('nilai_krs', 'Nilai SKS', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('layout/tb_header', $data);
			$this->load->view('layout/sidebar', $data);
			$this->load->view('layout/topbar', $data);
			$this->load->view('KrsDetail/ubah', $data);
			$this->load->view('layout/tb_footer');
		} else {
			$this->KrsDetail_model->UbahDataKrsDetail();
			$this->session->set_flashdata('berhasil', 'DiUbah');
			redirect(base_url('KrsDetail/detail/') . $id_mhs);
		}
	}

	public function hapus($id_krs)
	{
		check_role_dosen_op_penilaian();
		$id = decrypt_url($id_krs);

		//get id mhs
		$ls = $this->Tambahan_model->UbahKrsMhsForm($id);
		$nim_mhs = $ls['nim_mhs'];
		$id_mhs  = encrypt_url($nim_mhs);
		//get id mhs

		$this->KrsDetail_model->HapusDataKrsDetail($id,$nim_mhs);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect(base_url('KrsDetail/detail/') . $id_mhs);
	}

	public function detail($nim_mhs)
	{
		$data['judul'] = 'Hasil Penilaian KRS';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$id            = decrypt_url($nim_mhs);
		$data['data']  = $this->KrsDetail_model->DetailDataKrsDetail($id);

		if ($this->session->userdata('id_role') != "3") {
			$data['nilai'] = $this->KrsDetail_model->krsDataKrsDetail($id);
		}

		if ($this->session->userdata('id_role') == "3") {
			$data['nilai'] = $this->KrsDetail_model->krsDataKrsDetailDosen($id,$this->session->userdata('nama_dosen'));
		}

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('KrsDetail/detail', $data);
		$this->load->view('layout/tb_footer');
	}

	public function tmbltambah($nim_mhs)
	{
		$id_mhs = decrypt_url($nim_mhs);
		$data_cek = $this->db->get_where('tb_dosen', ['nama_dosen' => $this->session->userdata('nama_dosen')])->row_array();
		$dsn_cek = $this->db->get_where('krs_detail', ['nim_mhs' => $id_mhs])->row_array();
		if ($dsn_cek['id_dosen'] == null) {
			$count_krs = $this->db->count_all('krs_detail');
			$helper    = 1 + $count_krs;
			$date      = date('s');

			$id_krs    = "KRS" . "-" . $helper . $date;

			$data = [
				'id_krs'   => $id_krs,
				'nim_mhs'  => $id_mhs,
				'id_dosen' => $data_cek['id_dosen'],
				'status'   => "Aktif"
			];

			$this->db->insert('krs_detail', $data);
			$this->session->set_flashdata('berhasil', 'Berhasil Menambah Data:)');
			redirect(base_url('KrsDetail/detail/') . $nim_mhs);

			if ($this->db->affected_rows() > 0) {
				$assign_to   = '';
				$assign_type = '';
				activity_log("Data Krs", "Menambah Data", $id_krs, $assign_to, $assign_type);
				return true;
			} else {
				return false;
			}
		} else {
			redirect(base_url('KrsDetail/detail/') . $nim_mhs);
		}
	}

	public function print(){
		$data['krs_detail'] = $this->KrsDetail_model->getKrsDetailPrint();
		$data['judul'] 		= 'Data Krs Detail Institut Agama Islam Tazkia';

		$this->load->view('KrsDetail/print', $data);
	}

	public function printdetail($nim_mhs)
	{
		$id            = decrypt_url($nim_mhs);
		$data['judul'] = 'Hasil Penilaian KRS';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data']  = $this->KrsDetail_model->DetailDataKrsDetail($id);

		if ($this->session->userdata('id_role') != "3") {
			$data['nilai'] = $this->KrsDetail_model->krsDataKrsDetail($id);
		}

		$this->load->view('KrsDetail/printdetail', $data);
	}

	public function pdf(){
		$data['krsdetail'] = $this->KrsDetail_model->getKrsDetailPrint();
		$data['judul'] = 'Data Krs Detail Institut Agama Islam Tazkia';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-krs-detail.pdf";
		$this->pdf->load_view('KrsDetail/pdf', $data);
	}

	public function pdfdetail($nim_mhs)
	{
		$id            = decrypt_url($nim_mhs);
		$data['judul'] = 'Hasil Penilaian KRS';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data']  = $this->KrsDetail_model->DetailDataKrsDetail($id);
		$data_mhs  = $this->KrsDetail_model->DetailDataKrsDetail($id);

		if ($this->session->userdata('id_role') != "3") {
			$data['nilai'] = $this->KrsDetail_model->krsDataKrsDetail($id);
		}

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = $data_mhs['nama']. "-laporan-data-krs-detail.pdf";
		$this->pdf->load_view('KrsDetail/pdfdetail', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nomor Induk Mahasiswa');
		$sheet->setCellValue('C1', 'Nama Mahasiswa');
		$sheet->setCellValue('E1', 'Nama Jurusan');

		$mahasiswa = $this->KrsDetail_model->getKrsDetailPrint();
		$array = json_decode(json_encode($mahasiswa), true);
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
		$filename = 'laporan-data-krs-detail-mahasiswa';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function exceldetail($nim_mhs){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$id = decrypt_url($nim_mhs);

		$data_mhs  = $this->KrsDetail_model->DetailDataKrsDetail($id);
		$sheet->setCellValue('A1', "NIM Mahasiswa : ".  $data_mhs['nim_mhs']);
		$sheet->setCellValue('A2', "Nama Mahasiswa : ". $data_mhs['nama']);
		$sheet->setCellValue('A3', "Nama Fakultas : ". $data_mhs['nama_fakultas']);
		$sheet->setCellValue('A4', "Nama Jurusan : ". $data_mhs['nama_jurusan']);
		$sheet->setCellValue('A5', "Nama Tahun Akademik : ". $data_mhs['nama_tahun_akademik']);
		$sheet->setCellValue('A6', "Status : ". $data_mhs['status']);

		$sheet->setCellValue('A7', 'No');
		$sheet->setCellValue('B7', 'Nama Dosen');
		$sheet->setCellValue('C7', 'Mata Kuliah');
		$sheet->setCellValue('D7', 'Nilai SKS');
		$sheet->setCellValue('E7', 'Predikat');

		$krs = $this->KrsDetail_model->krsDataKrsDetail($id);
		$array = json_decode(json_encode($krs), true);
		$no = 1;
		$baris = 8;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['nama_dosen']);
			$sheet->setCellValue('C'.$baris, $row['nama_matkul']);
			$sheet->setCellValue('D'.$baris, $row['nilai_krs']);
			$sheet->setCellValue('E'.$baris, $row['grade']);
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
