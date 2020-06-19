<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function index()
	{
		cek_login_1();
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['judul'] = 'Form Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			//Jika Validasi Berhasil
			$this->login();
		}
	}

	private function login()
	{
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		$user     = $this->Tambahan_model->DataProfileUser($email);
		if ($user['id_role'] == '2') {
			$data_mhs = $this->Tambahan_model->DataProfileMahasiswa($email);
		} elseif($user['id_role'] == '3') {
			$data_dsn = $this->Tambahan_model->DataProfileDosen($email);
		}

		// jika usernya ada
		if ($user) {
			// jika usernya ada aktif
			if ($user['status'] == "Aktif") {
				//cek password
				if (password_verify($password, $user['password'])) {

					$data = [
						//data table user
						'nama'           => $user['nama'],
						'nama_panggilan' => $user['nama_panggilan'],
						'email'          => $user['email'],
						'image'          => $user['image'],
						'id_role'        => $user['id_role'],
						'id'             => $user['id'],
						'role'        	 => $user['role'],
						'status'         => $user['status'],
					];

					if ($user['id_role'] == 2) {
						$data_mhs = [
						//data table mahasiswa
							'nim_mhs'       => $data_mhs['nim_mhs'],
							'nama_jurusan'  => $data_mhs['nama_jurusan'],
							'nama_kelas'    => $data_mhs['nama_kelas'],
							'nama_tahun_akademik' => $data_mhs['nama_tahun_akademik
							'],
							'jenis_kelamin' => $data_mhs['jenis_kelamin'],
							'agama'         => $data_mhs['agama'],
							'tmpt_lahir'    => $data_mhs['tmpt_lahir'],
							'tanggal_lahir' => $data_mhs['tanggal_lahir'],
							'alamat'        => $data_mhs['alamat'],
							'no_telp'       => $data_mhs['no_telp'],
						];

					}elseif ($user['id_role'] == 3) {
						$data_dsn = [
						//data table dosen
							'nama_dosen' 	=> $data_dsn['nama_dosen'],
							'nama_matkul' 	=> $data_dsn['nama_matkul'],
							'jenis_kelamin' => $data_dsn['jenis_kelamin'],
							'tmpt_lahir'    => $data_dsn['tmpt_lahir'],
							'tanggal_lahir' => $data_dsn['tanggal_lahir'],
							'no_telp'       => $data_dsn['no_telp'],
						];
					}
					
					$this->session->set_userdata($data);

					if ($user['id_role'] == 2) {
						$this->session->set_userdata($data_mhs);
					} elseif ($user['id_role'] == 3){
						$this->session->set_userdata($data_dsn);
					}

					login_helper("Login", "Login");
					if ($user['id_role'] == 1) {
						$this->session->set_flashdata('berhasil', 'Mendapatkan Hak Akses Login');
						redirect('Dashboard');
					} else {
						if ($user['password_asli'] == '1234') {
							redirect('Auth/resetpassword');
						} else {
							$this->session->set_flashdata('berhasil', 'Mengganti Password Dan Mendapatkan Hak Akses Login');
							redirect('Profile');
						}
					}
				} else {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password</div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Aktif!</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email Tidak Terdaftar!</div>');
			redirect('Auth');
		}
	}

	public function register()
	{
		cek_login_role();
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('nama_panggilan', 'Nama Panggilan', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('id_role', 'Role Akses', 'required');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		$this->db->order_by('role', 'asc');
		$data['role'] = $this->db->get('user_role')->result();

		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Form Buat Akun';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/register');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'nama'           => htmlspecialchars($this->input->post('nama', true)),
				'nama_panggilan' => htmlspecialchars($this->input->post('nama_panggilan', true)),
				'email'          => htmlspecialchars($this->input->post('email', true)),
				'image'          => 'index.png',
				'password'       => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'password_asli'  => $this->input->post('password1'),
				'id_role'        => htmlspecialchars($this->input->post('id_role', true)),
				'status'         => "Aktif",
				'data_created'   => date('Y-m-d H:i:s')
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('berhasil', 'Selamat Anda Berhasil Membuat Akun!.Silahkan Login');
			redirect('Dashboard');
		}
	}


	public function resetpassword()
	{
		//validasi
		$this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim');
		//ngambil data dari view
		if ($this->form_validation->run() == FALSE) {
			$data['judul'] = 'Form Lupa Password';
			$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/resetpassword', $data);
			$this->load->view('templates/auth_footer');
		} else {
			//buat input data si lama dana baru
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			//cek data reset password
			$cek = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
			if (!password_verify($password_lama, $cek['password'])) {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Salah Password</div>');
				redirect('Auth/resetpassword');
			} else {
				if ($password_lama == $password_baru) {
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru Tidak boleh sama dengan password lama</div>');
					redirect('Auth/resetpassword');
				} else {
					$password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash); //buat set data di table user(password)
					$this->db->set('password_asli', $password_hash); //buat set data di table user(password_asli)
					$this->db->where('email', $this->session->userdata('email'));
					$this->db->update('user');
					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil mendapatkan akses</div>');
					redirect('Profile');
				}
			}
		}
	}

	public function logout()
	{
		login_helper("Logout", "Logout");

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('id_role');

		$this->session->set_flashdata('berhasil', 'Keluar Dari Akun Anda');
		redirect('Home/loginhome');
	}
}
