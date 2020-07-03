<?php

class Dosen_model extends CI_Model {
	public function GetDataDosen() {
		$query = $this->db->get('tb_dosen');
		return $query->result_array();
	}

	public function getDosen($limit, $offset, $cari_dosen = '') {
		$this->db->select('tb_dosen.id_dosen, tb_dosen.nama_dosen, tb_matkul.nama_matkul,tb_dosen.jenis_kelamin, tb_dosen.status');
		$this->db->from('tb_dosen');
		$this->db->join('tb_matkul', 'tb_dosen.id_matkul = tb_matkul.id_matkul', 'left');

		if ($cari_dosen != '') {
			$this->db->like('id_dosen', $cari_dosen);
			$this->db->or_like('nama_dosen', $cari_dosen);
			$this->db->or_like('nama_matkul', $cari_dosen);
			$this->db->or_like('jenis_kelamin', $cari_dosen);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CoutAllDosen($cari_dosen = '') {
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_dosen');
		$this->db->join('tb_matkul', 'tb_dosen.id_matkul = tb_matkul.id_matkul', 'left');

		if ($cari_dosen != '') {
			$this->db->like('id_dosen', $cari_dosen);
			$this->db->or_like('nama_dosen', $cari_dosen);
			$this->db->or_like('nama_matkul', $cari_dosen);
			$this->db->or_like('jenis_kelamin', $cari_dosen);
		}

		$query = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataDosen() {
		$count_dosen = $this->db->count_all('tb_dosen');
		$helper = 1 + $count_dosen;
		$year = date('Y');
		$month = date('m');
		$day = date('d');
		$second = date('s');
		$dateimage = date('d' . '-' . 'm' . '-' . 'y');

		$id_dosen = "0" . "20" . $helper . $month . $day . $second;
		$nama_dosen = $this->input->post('nama_dosen', true);
		$nama_panggilan = $this->input->post('nama_panggilan', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$agama = $this->input->post('agama', true);
		$tmpt_lahir = $this->input->post('tmpt_lahir', true);
		$tanggal_lahir = $this->input->post('tanggal_lahir', true);
		$alamat = $this->input->post('alamat', true);
		$no_telp = $this->input->post('no_telp', true);
		$id_matkul = $this->input->post('id_matkul', true);
		$status = "Tidak Aktif";
		$image = $_FILES['image'];
		if ($image = '') {
		} else {
			$config['upload_path'] = 'assets/foto/dosen/';
			$config['allowed_types'] = 'jpg|png|jpeg';
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
					die();
				} else {
					$image = $this->upload->data('file_name');
				}
			} else {
				$image = 'index.png';
			}

			$data = array(
				'id_dosen' => $id_dosen,
				'nama_dosen' => $nama_dosen,
				'nama_panggilan' => $nama_panggilan,
				'jenis_kelamin' => $jenis_kelamin,
				'agama' => $agama,
				'tmpt_lahir' => $tmpt_lahir,
				'tanggal_lahir' => $tanggal_lahir,
				'alamat' => $alamat,
				'no_telp' => $no_telp,
				'image' => $image,
				'id_matkul' => $id_matkul,
				'status' => $status,
			);
		}

		$this->db->insert('tb_dosen', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to = '';
			$assign_type = '';
			activity_log("Data Dosen", "Menambah Data", $id_dosen, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataDosen($id_dosen) {
		$this->db->delete('tb_dosen', ['id_dosen' => $id_dosen]);
		if ($this->db->affected_rows() > 0) {
			$assign_to = '';
			$assign_type = '';
			activity_log("Data Dosen", "Hapus Data", $id_dosen, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function InfoDataDetail($id_dosen) {
		$this->db->select('*');
		$this->db->from('tb_dosen');
		$this->db->join('tb_matkul', 'tb_dosen.id_matkul = tb_matkul.id_matkul', 'left');

		$this->db->where('id_dosen', $id_dosen);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function IdentitasDataDosen($id_dosen) {
		return $this->db->get_where('tb_dosen', ['id_dosen' => $id_dosen])->row_array();
	}

	public function UbahDataDosen() {
		$dateimage = date('d' . '-' . 'm' . '-' . 'y');
		$id_dosen = $this->input->post('id_dosen', true);
		$image = $_FILES['image'];
		$nama_dosen = $this->input->post('nama_dosen', true);
		$nama_panggilan = $this->input->post('nama_panggilan', true);
		$jenis_kelamin = $this->input->post('jenis_kelamin', true);
		$agama = $this->input->post('agama', true);
		$tmpt_lahir = $this->input->post('tmpt_lahir', true);
		$alamat = $this->input->post('alamat', true);
		$no_telp = $this->input->post('no_telp', true);
		$tanggal_lahir = $this->input->post('tanggal_lahir', true);
		$id_matkul = $this->input->post('id_matkul', true);

		$dosen = $this->Dosen_model->IdentitasDataDosen($id_dosen);

		if ($image = '') {
		} else {
			$config['upload_path'] = 'assets/foto/dosen/';
			$config['allowed_types'] = 'jpg|png|jpeg';
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
				if ($dosen['image'] != null) {
					$image = $dosen['image'];
				} else {
					$image = 'index.png';
				}
			}

			$data = array(
				'id_dosen' => $id_dosen,
				'image' => $image,
				'nama_dosen' => $nama_dosen,
				'nama_panggilan' => $nama_panggilan,
				'jenis_kelamin' => $jenis_kelamin,
				'agama' => $agama,
				'tmpt_lahir' => $tmpt_lahir,
				'alamat' => $alamat,
				'no_telp' => $no_telp,
				'tanggal_lahir' => $tanggal_lahir,
				'id_matkul' => $id_matkul,
			);
		}

		$this->db->where('id_dosen', $id_dosen);
		$this->db->update('tb_dosen', $data);
		$id_dosen = $this->input->post('id_dosen');
		if ($this->db->affected_rows() > 0) {
			$assign_to = '';
			$assign_type = '';
			activity_log("Data Dosen", "Ubah Data", $id_dosen, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
