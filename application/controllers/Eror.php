<?php

class Eror extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'Halaman Tidak Ditemukan';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('Eror/index', $data);
	}
}
