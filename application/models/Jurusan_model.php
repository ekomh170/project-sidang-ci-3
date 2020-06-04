<?php

class Jurusan_model extends CI_Model
{
	public function GetDataJurusan($limit, $offset, $cari_jrs = '')
	{
		$this->db->select('tb_jurusan.id_jurusan, tb_jurusan.nama_jurusan, tb_fakultas.nama_fakultas, tb_jenjang_pendidikan.nama_jp');
		$this->db->from('tb_jurusan');
		$this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas = tb_jurusan.id_fakultas', 'left');
		$this->db->join('tb_jenjang_pendidikan', 'tb_jenjang_pendidikan.id_jenjang_pendidikan = tb_jurusan.id_jenjang_pendidikan', 'left');

		if ($cari_jrs != '') {
			$this->db->like('id_jurusan', $cari_jrs);
			$this->db->like('nama_jurusan', $cari_jrs);
			$this->db->like('nama_fakultas', $cari_jrs);
			$this->db->like('nama_jp', $cari_jrs);
		}

		$this->db->limit($limit, $offset);
		$query = $this->db->get();
		return $query->result();
	}

	public function CountAllJurusan($cari_jrs = '')
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('tb_jurusan');
		$this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas = tb_jurusan.id_fakultas', 'left');
		$this->db->join('tb_jenjang_pendidikan', 'tb_jenjang_pendidikan.id_jenjang_pendidikan = tb_jurusan.id_jenjang_pendidikan', 'left');

		if ($cari_jrs != '') {
			$this->db->like('id_jurusan', $cari_jrs);
			$this->db->like('nama_jurusan', $cari_jrs);
			$this->db->like('nama_fakultas', $cari_jrs);
			$this->db->like('nama_jp', $cari_jrs);
		}

		$query  = $this->db->get();
		$result = $query->result_array();
		return $result[0]['allcount'];
	}

	public function TambahDataJurusan()
	{
		$count_jurusan         = $this->db->count_all('tb_jurusan');
		$helper                = 1 + $count_jurusan;
		$date                  = date('s');

		$id_jurusan            = "JR" . "-" . "0" . $helper . "-" . $date;
		$nama_jurusan          = $this->input->post('nama_jurusan', true);
		$id_fakultas           = $this->input->post('id_fakultas', true);
		$id_jenjang_pendidikan = $this->input->post('id_jenjang_pendidikan', true);
		$penjelasan            = $this->input->post('penjelasan', true);
		$status                = $this->input->post('status', true);

		$data = array(
			'id_jurusan'            => $id_jurusan,
			'nama_jurusan'          => $nama_jurusan,
			'id_fakultas'           => $id_fakultas,
			'id_jenjang_pendidikan' => $id_jenjang_pendidikan,
			'penjelasan'            => $penjelasan,
			'status'                => $status
		);

		$this->db->insert('tb_jurusan', $data);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Jurusan", "Menambah Data", $id_jurusan, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function HapusDataJurusan($id_jurusan)
	{
		$this->db->delete('tb_jurusan', ['id_jurusan' => $id_jurusan]);
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Jurusan", "Hapus Data", $id_jurusan, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}

	public function IdentitasDataJurusan($id_jurusan)
	{
		return $this->db->get_where('tb_jurusan', ['id_jurusan' => $id_jurusan])->row_array();
	}

	public function CariDataJurusan()
	{
		$cari = $this->input->post('cari', true);
		$this->db->like('nama_jurusan', $cari);
		$this->db->or_like('id_jurusan', $cari);
		return $this->db->get('tb_jurusan')->result_array();
	}

	public function UbahDataJurusan()
	{
		$data = [
			"id_jurusan"            => $this->input->post('id_jurusan', true),
			"nama_jurusan"          => $this->input->post('nama_jurusan', true),
			"id_fakultas"           => $this->input->post('id_fakultas', true),
			"id_jenjang_pendidikan" => $this->input->post('id_jenjang_pendidikan', true),
			"penjelasan"            => $this->input->post('penjelasan', true),
			"status"                => $this->input->post('status', true)
		];

		$this->db->where('id_jurusan',  $this->input->post('id_jurusan'));
		$this->db->update('tb_jurusan', $data);
		$id_jurusan = $this->input->post('id_jurusan');
		if ($this->db->affected_rows() > 0) {
			$assign_to   = '';
			$assign_type = '';
			activity_log("Data Jurusan", "Ubah Data", $id_jurusan, $assign_to, $assign_type);
			return true;
		} else {
			return false;
		}
	}
}
