<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
		$data['judul'] = 'Data Transkrip Nilai Institut Agama Islam Tazkia yang sudah mulai di rekap';

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

	public function pdf(){
		$data['transkripnilai'] = $this->TranskripNilai_model->getTnPrint();
		$data['judul'] = 'Data Transkrip Nilai Institut Agama Islam Tazkia yang sudah mulai di rekap';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-transkrip-nilai.pdf";
		$this->pdf->load_view('TranskripNilai/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nomor Induk Mahasiswa');
		$sheet->setCellValue('C1', 'Nama Mahasiswa');
		$sheet->setCellValue('E1', 'Nama Jurusan');

		$transkripnilai = $this->TranskripNilai_model->getTnPrint();
		$array = json_decode(json_encode($transkripnilai), true);
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
		$filename = 'laporan-data-transkrip-nilai';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function pdfdetail($nim_mhs)
	{
		$id            = decrypt_url($nim_mhs);
		$data['judul'] = 'Hasil Penilaian Transkrip Nilai';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['data'] = $this->TranskripNilai_model->DetailDataTranskripNilai($id);
		$data['nilai'] = $this->TranskripNilai_model->NilaiDataTranskripNilai($id);
		$data['ipk'] = $this->TranskripNilai_model->IpkDataTranskripNilai($id);
		$data_mhs  = $this->TranskripNilai_model->DetailDataTranskripNilai($id);


		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = $data_mhs['nama']. "-laporan-data-transkrip-nilai";
		$this->pdf->load_view('TranskripNilai/pdfdetail', $data);
	} 

	public function exceldetail($nim_mhs){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$id = decrypt_url($nim_mhs);

		$data_mhs  = $this->TranskripNilai_model->DetailDataTranskripNilai($id);
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
		$sheet->setCellValue('E7', 'Nilai Akhir');
		$sheet->setCellValue('F7', 'Total Nilai SKS');
		$sheet->setCellValue('G7', 'SKS Total');
		$sheet->setCellValue('H7', 'Bobot Total');
		$sheet->setCellValue('I7', 'Nilai Ipk');

		$nilai = $this->TranskripNilai_model->NilaiDataTranskripNilai($id);
		$array = json_decode(json_encode($nilai), true);
		$no = 1;
		$baris = 8;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['nama_dosen']);
			$sheet->setCellValue('C'.$baris, $row['nama_matkul']);
			$sheet->setCellValue('D'.$baris, $row['nilai_krs']);
			$sheet->setCellValue('E'.$baris, $row['nilai_akhir']);
			$baris++;
		}

		$baris2 = 8;
		$ipk = $this->TranskripNilai_model->IpkDataTranskripNilai($id);
		$array2 = json_decode(json_encode($ipk), true);
		foreach ($array2 as $value) {
			$sheet->setCellValue('F'.$baris2, $value['nilai_total_sks']);
			$sheet->setCellValue('G'.$baris2, $value['sks_total']);
			$sheet->setCellValue('H'.$baris2, $value['bobot_total']);
			$sheet->setCellValue('I'.$baris2, $value['ipk']);
			$baris2++;
		}
		
		$writer = new xlsx($spreadsheet);
		$filename = $data_mhs['nama']. '-laporan-data-krs-detail-mahasiswa';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
