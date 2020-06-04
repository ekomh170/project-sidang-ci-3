<?php

class Home extends CI_Controller
{
	public function index()
	{
		cek_login_1();
		$data['judul'] = 'Halaman Utama';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/home_header', $data);
		$this->load->view('Home/index');
		$this->load->view('templates/home_footer');
	}

	public function loginhome()
	{
		cek_login_1();
		$data['judul'] = 'UJI KOMPETENSI 2020';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('templates/home_header', $data);
		$this->load->view('Home/login_home');
		$this->load->view('templates/home_footer');
	}
}
