<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengguna extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		cek_login();
		check_role_admin_op_pendataan();
		pass_block();

		$this->load->model('Pengguna_model');
	}

	public function index($offset = NULL)
	{
		$text_usr = "";
		if ($this->input->post('submit') != NULL) {
			$text_usr = $this->input->post('cari_usr');
			$this->session->set_userdata(array("cari_usr" => $text_usr));
		} else {
			if ($this->session->userdata('cari_usr') != NULL) {
				$text_usr = $this->session->userdata('cari_usr');
			}
		}

		//UNTUK PAGINATION SAMPAI  --->--->  TULISAN PENUTUP PAGINATION
		$limit = 5;
		if (!is_null($offset)) {
		}

		//config
		$config['uri_segment'] = 3;
		$config['base_url']    = base_url().'Pengguna/index';
		$config['total_rows']  = $this->Pengguna_model->CountAllPengguna($text_usr);
		$config['per_page']    = $limit;
		$config['num_links']   = 3;

		//initialize
		$pagination = $this->pagination->initialize($config);

		$data['judul']     = 'Data Users';
		$data['user']      = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$data['offset']    = $this->uri->segment(3);
		$data['data_user'] = $this->Pengguna_model->GetDataPengguna($limit, $offset, $text_usr);

		$this->load->view('layout/tb_header', $data);
		$this->load->view('layout/sidebar', $data);
		$this->load->view('layout/topbar', $data);
		$this->load->view('Pengguna/index', $data);
		$this->load->view('layout/tb_footer');
	}

	public function hapus($id)
	{
		$id_akun = decrypt_url($id);
		$this->Pengguna_model->HapusDataPengguna($id_akun);
		$this->session->set_flashdata('berhasil', 'Dihapus');
		redirect('Pengguna');
	}

	public function nonaktif($id)
	{
		$data_user = $this->db->get_where('user', ['id' => $id])->row_array();

		$data = array(
			'status'        => 'Tidak Aktif',
			'password'      => '1234',
			'password_asli' => '1234'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('user', $data);
		($data);
		$this->session->set_flashdata('berhasil', 'Data Dinonaktifkan');
		redirect(base_url('Pengguna'));
	}

	public function aktif($id)
	{
		$data_user = $this->db->get_where('user', ['id' => $id])->row_array();

		$data = array(
			'status' => 'Aktif'
		);
		$this->db->where(array('id' => $id));
		$this->db->update('user', $data);
		($data);
		$this->session->set_flashdata('berhasil', 'Data Diaktifkan');
		redirect(base_url('Pengguna'));
	}

	public function print(){
		$data['data_user'] = $this->Pengguna_model->getPenggunaPrint();
		$data['judul'] = 'Data Users Institut Agama Islam Tazkia';

		$this->load->view('Pengguna/print', $data);
	}

	public function pdf(){
		$data['pengguna'] = $this->Pengguna_model->getPenggunaPrint();
		$data['judul'] = 'Data User Institut Agama Islam Tazkia';

		$this->load->library('pdf');
		$this->pdf->setPaper('A4', 'landscape');
		$this->pdf->filename = "laporan-data-user.pdf";
		$this->pdf->load_view('Pengguna/pdf', $data);
	}

	public function excel(){		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Nama Mahasiswa');
		$sheet->setCellValue('C1', 'Email');
		$sheet->setCellValue('D1', 'Role/Hak Akses');
		$sheet->setCellValue('E1', 'Akun Dibuat'); 

		$Pengguna = $this->Pengguna_model->getPenggunaPrint();
		$array = json_decode(json_encode($Pengguna), true);
		$no = 1;
		$baris = 2;

		foreach($array as $row) 
		{
			$sheet->setCellValue('A'.$baris, $no++);
			$sheet->setCellValue('B'.$baris, $row['nama']);
			$sheet->setCellValue('C'.$baris, $row['email']);
			$sheet->setCellValue('D'.$baris, $row['role']);
			$sheet->setCellValue('E'.$baris, $row['data_created']);
			$baris++;
		}

		$writer = new xlsx($spreadsheet);
		$filename = 'laporan-data-user';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
