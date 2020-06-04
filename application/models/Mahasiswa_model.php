<?php

class Mahasiswa_model extends CI_Model
{
	public function getMahasiswa($limit, $offset, $cari_mhs = '')
	{
		$this->db->select('mahasiswa.nim_mhs, mahasiswa.image, mahasiswa.nama, tb_jurusan.nama_jurusan, tb_kelas.nama_kelas, tb_tahun_akademik.nama_tahun_akademik, mahasiswa.jenis_kelamin, mahasiswa.status');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');

		if ($cari_mhs != '') {
			$this->db->like('nim_mhs', $cari_mhs);
			$this->db->or_like('nama', $cari_mhs);
			$this->db->or_like('nama_jurusan', $cari_mhs);
			$this->db->or_like('nama_kelas', $cari_mhs);
			$this->db->or_like('nama_tahun_akademik', $cari_mhs);
			$this->db->or_like('jenis_kelamin', $cari_mhs);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllMahasiswa($cari_mhs = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');

		if ($cari_mhs != '') {
			$this->db->like('nim_mhs', $cari_mhs);
			$this->db->or_like('nama', $cari_mhs);
			$this->db->or_like('nama_jurusan', $cari_mhs);
			$this->db->or_like('nama_kelas', $cari_mhs);
			$this->db->or_like('nama_tahun_akademik', $cari_mhs);
			$this->db->or_like('jenis_kelamin', $cari_mhs);
		}

		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataMahasiswa()
	{
		$count_mahasiswa   = $this->db->count_all('mahasiswa');
		$helper            = 1 + $count_mahasiswa;
		$date              = date('d' . 'm' . 'y');

		$nim_mhs           = "10" . $date . $helper;
		$image             = $_FILES['image'];
		$nama              = $this->input->post('nama', true);
		$nama_panggilan    = $this->input->post('nama_panggilan', true);
		$id_jurusan        = $this->input->post('id_jurusan', true);
		$id_kelas          = $this->input->post('id_kelas', true);
		$id_tahun_akademik = $this->input->post('id_tahun_akademik', true);
		$jenis_kelamin     = $this->input->post('jenis_kelamin', true);
		$agama             = $this->input->post('agama', true);
		$tmpt_lahir        = $this->input->post('tmpt_lahir', true);
		$tanggal_lahir     = $this->input->post('tanggal_lahir', true);
		$alamat            = $this->input->post('alamat', true);
		$no_telp           = $this->input->post('no_telp', true);
		$status            = "Tidak Aktif";
		if ($image = '') {
		} else {
			$config['upload_path']   = 'assets/img/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['overwrite']     = true;
			$config['max_filename']  = 255;
			$config['max_size']      = 25600;
			$config['width']         = '100';
			$config['height']        = '100';

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				echo "Upload Gagal";
				die();
			} else {
				$image = $this->upload->data('file_name');
			}

			$data = array(
				'nim_mhs'           => $nim_mhs,
				'image'             => $image,
				'nama'              => $nama,
				'nama_panggilan'    => $nama_panggilan,
				'id_jurusan'        => $id_jurusan,
				'id_kelas'          => $id_kelas,
				'id_tahun_akademik' => $id_tahun_akademik,
				'jenis_kelamin'     => $jenis_kelamin,
				'agama'             => $agama,
				'tmpt_lahir'        => $tmpt_lahir,
				'tanggal_lahir'     => $tanggal_lahir,
				'alamat'            => $alamat,
				'no_telp'           => $no_telp,
				'status'            => $status
			);
		}

		$this->db->insert('mahasiswa', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Mahasiswa", "Menambah Data", $nim_mhs, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataMahasiswa($nim_mhs)
	{
		$this->db->delete('mahasiswa', ['nim_mhs' => $nim_mhs]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Mahasiswa", "Hapus Data", $nim_mhs, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function InfoDataDetail($nim_mhs)
	{
		$this->db->select('*');
		$this->db->from('mahasiswa');
		$this->db->join('tb_jurusan', 'mahasiswa.id_jurusan = tb_jurusan.id_jurusan', 'left');
		$this->db->join('tb_kelas', 'mahasiswa.id_kelas = tb_kelas.id_kelas', 'left');
		$this->db->join('tb_tahun_akademik', 'mahasiswa.id_tahun_akademik = tb_tahun_akademik.id_tahun_akademik', 'left');
		$this->db->where('nim_mhs', $nim_mhs);

		$query  = $this->db->get();
		return $query->row_array();
	}

	public function IdentitasDataMahasiswa($nim_mhs)
	{
		return $this->db->get_where('mahasiswa', ['nim_mhs' => $nim_mhs])->row_array();
	}

	public function UbahDataMahasiswa()
	{
		$nim_mhs           = $this->input->post('nim_mhs', true);
		$image             = $_FILES['image'];
		$nama              = $this->input->post('nama', true);
		$nama_panggilan    = $this->input->post('nama_panggilan', true);
		$id_jurusan        = $this->input->post('id_jurusan', true);
		$id_kelas          = $this->input->post('id_kelas', true);
		$id_tahun_akademik = $this->input->post('id_tahun_akademik', true);
		$jenis_kelamin     = $this->input->post('jenis_kelamin', true);
		$agama             = $this->input->post('agama', true);
		$tmpt_lahir        = $this->input->post('tmpt_lahir', true);
		$alamat            = $this->input->post('alamat', true);
		$tanggal_lahir     = $this->input->post('tanggal_lahir', true);
		$no_telp           = $this->input->post('no_telp', true);
		if ($image = '') {
		} else {
			$config['upload_path']   = 'assets/foto/mahasiswa/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['overwrite']     = true;
			$config['max_filename']  = 255;
			$config['max_size']      = 25600;
			$config['width']         = '100';
			$config['height']        = '100';


			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('image')) {
				echo "Upload Gagal";
				die();
			} else {
				$image = $this->upload->data('file_name');
			}

			$data = array(
				'nim_mhs'           => $nim_mhs,
				'image'             => $image,
				'nama'              => $nama,
				'nama_panggilan'    => $nama_panggilan,
				'id_jurusan'        => $id_jurusan,
				'id_kelas'          => $id_kelas,
				'id_tahun_akademik' => $id_tahun_akademik,
				'jenis_kelamin'     => $jenis_kelamin,
				'agama'             => $agama,
				'tmpt_lahir'        => $tmpt_lahir,
				'tanggal_lahir'     => $tanggal_lahir,
				'alamat'            => $alamat,
				'no_telp'           => $no_telp
			);
		}

		$this->db->where('nim_mhs', $nim_mhs);
		$this->db->update('mahasiswa', $data);
		$nim_mhs = $this->input->post('nim_mhs', true);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Mahasiswa", "Ubah Data", $nim_mhs, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
