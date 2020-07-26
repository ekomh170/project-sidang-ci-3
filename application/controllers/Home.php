<?php

class Home extends CI_Controller
{
	public function index()
	{
		cek_login_1();
		$data['judul'] = 'UJI KOMPETENSI 2020';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('Home/index', $data);
	}
}
