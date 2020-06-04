<?php
class Dashboard_model extends CI_Model
{
	public function hitungJumlahMahasiswa()
	{
		$query = $this->db->count_all('mahasiswa');
		return $query;
	}

	public function hitungJumlahDosen()
	{
		$query = $this->db->count_all('tb_dosen');
		return $query;
	}

	public function hitungJumlahFakultas()
	{
		$query  = $this->db->count_all('tb_fakultas');
		return $query;
	}

	public function hitungJumlahJurusan()
	{
		$query = $this->db->count_all('tb_jurusan');
		return $query;
	}

	public function hitungJumlahPengguna()
	{
		$query = $this->db->count_all('user');
		return $query;
	}

	public function hitungJumlahMatkul()
	{
		$query = $this->db->count_all('tb_matkul');
		return $query;
	}

	public function hitungJumlahKelas()
	{
		$query = $this->db->count_all('tb_kelas');
		return $query;
	}

	public function hitungJumlahRuangan()
	{
		$query = $this->db->count_all('tb_ruangan');
		return $query;
	}

	public function hitungJumlahIpk()
	{
		$query = $this->db->count_all('tb_ipk');
		return $query;
	}

	public function hitungJumlahKrs()
	{
		$query = $this->db->count_all('krs_detail');
		return $query;
	}

	public function hitungJumlahTranskripNilai()
	{
		$query = $this->db->count_all('tb_transkrip_nilai');
		return $query;
	}

	public function hitungJumlahInputNilai()
	{
		$query = $this->db->count_all('tb_nilai');
		return $query;
	}

	public function hitungJumlahTahunAkademik()
	{
		$query = $this->db->count_all('tb_tahun_akademik');
		return $query;
	}
}
