<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct() {
		parent::__construct();
		cek_login();
		pass_block();
	}

	public function index() {
		$data['judul'] = 'Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('templates/tb_header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('Profile/index', $data);
		$this->load->view('templates/tb_footer');
	}

	public function edit() {
		$data['judul'] = 'Ubah Profile';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/tb_header', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('templates/topbar', $data);
			$this->load->view('Profile/edit', $data);
			$this->load->view('templates/tb_footer');
		} else {
			$dateimage = date('d' . '-' . 'm' . '-' . 'y');
			$email = $this->input->post('email');
			$nama = $this->input->post('nama');
			$nama_panggilan = $this->input->post('nama_panggilan');
			$image = $_FILES['image'];

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if ($image = '') {
			} else {
				$config['upload_path'] = 'assets/foto/users/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['overwrite'] = true;
				$config['max_filename'] = 255;
				$config['max_size'] = 25600;
				$config['width'] = '100';
				$config['height'] = '100';
				$config['file_name'] = $nama . '-' . $dateimage;

				$this->load->library('upload', $config);
				if (@$_FILES['image']['name'] != null) {
					if (!$this->upload->do_upload('image')) {
						echo "Upload Gagal";
					} else {
						$image = $this->upload->data('file_name');
					}
				} else {
					if ($user['image'] != null) {
						$image = $user['image'];
					} else {
						$image = 'index.png';
					}
				}
			}

			$this->db->set('image', $image);
			$this->db->set('nama_panggilan', $nama_panggilan);
			$this->db->where('email', $email);
			$this->db->update('user');
			$this->session->set_flashdata('berhasil', 'Profile Telah Berhasil Diubah');
			redirect('Profile');
		}
	}
}
