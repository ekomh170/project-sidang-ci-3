<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		cek_login_role();
	}
	
	public function index()
	{
		$data['judul'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Profile/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function edit()
	{
		$data['judul'] = 'Ubah Profile';
		$data['user']  = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Profile/edit', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$email          = $this->input->post('email');
			$nama           = $this->input->post('nama');
			$nama_panggilan = $this->input->post('nama_panggilan');
			$image          = $_FILES['image'];
			if ($image = '') {
			} else {
				$config['upload_path']   = 'assets/foto/users';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['overwrite']     = true;
				$config['max_filename']  = 255;
				$config['max_size']      = 25600;
				$config['width']         = '100';
				$config['height']        = '100';


				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('image')) {
					echo "Upload Gagal";
				} else {
					$image = $this->upload->data('file_name');
				}
			}

			$this->db->set('image', $image);
			$this->db->set('nama_panggilan', $nama_panggilan);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('berhasil', 'Profile Telah Diubah');
			redirect('Auth/logout');
		}
	}
}
