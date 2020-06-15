<?php

class Tambahan_model extends CI_Model
{

/// FORM DATA MHS
	public function TambahKrsMhsForm($nim_mhs)
	{
		$this->db->select('mahasiswa.nim_mhs, mahasiswa.nama');
		$this->db->from('mahasiswa');

		$this->db->where('mahasiswa.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}
/// FORM DATA MHS

	public function UbahKrsMhsForm($id_krs)
	{
		$this->db->select('krs_detail.id_krs, krs_detail.nim_mhs, mahasiswa.nama, krs_detail.nilai_krs, krs_detail.status');
		$this->db->from('krs_detail');
		$this->db->join('mahasiswa', 'krs_detail.nim_mhs = mahasiswa.nim_mhs', 'left');

		$this->db->where('krs_detail.id_krs', $id_krs);
		$query = $this->db->get();
		return $query->row_array();
	}

//FORM DATA DOSEN/MATKUL
	public function TambahDataMatkulForm()
	{
		$this->db->select('*');
		$this->db->from('tb_dosen');
		$this->db->join('tb_matkul', 'tb_matkul.id_matkul = tb_dosen.id_matkul', 'left');

		$query = $this->db->get();
		return $query->result();
	}
//FORM DATA DOSEN/MATKUL

	public function UbahNilaiMhsForm($id_nilai)
	{
		$this->db->select('tb_nilai.id_nilai, tb_nilai.nim_mhs, mahasiswa.nama, tb_nilai.nilai_presensi, tb_nilai.nilai_tugas, tb_nilai.nilai_uts, tb_nilai.nilai_uas, tb_nilai.total_nilai, tb_nilai.status');
		$this->db->from('tb_nilai');
		$this->db->join('mahasiswa', 'tb_nilai.nim_mhs = mahasiswa.nim_mhs', 'left');

		$this->db->where('tb_nilai.id_nilai', $id_nilai);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function UbahIpkMhsForm($id_ipk)
	{
		$this->db->select('tb_ipk.id_ipk, tb_ipk.nim_mhs, mahasiswa.nama, tb_ipk.sks_total, tb_ipk.bobot_total, tb_ipk.nilai_total_sks, tb_ipk.ipk');
		$this->db->from('tb_ipk');
		$this->db->join('mahasiswa', 'tb_ipk.nim_mhs = mahasiswa.nim_mhs', 'left');

		$this->db->where('tb_ipk.id_ipk', $id_ipk);
		$query = $this->db->get();
		return $query->row_array();
	}
//// KRS TO IPK
	public function TotalNilaiSks($nim_mhs)
	{
		$this->db->select_sum('krs_detail.nilai_krs');
		$this->db->from('krs_detail');
		$this->db->where('krs_detail.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->row_array();
	}

	public function CountKrs($nim_mhs)
	{
		$this->db->select('count(*) as allcount');
		$this->db->from('krs_detail');
		$this->db->Where('krs_detail.nim_mhs', $nim_mhs);
		$query  = $this->db->get();
		return $query->row_array();
	}
//// KRS TO IPK
 
/// FORM NILAI SELECT KRS == DOSEN 
	public function selectKrsDosen($nim_mhs)
	{
		$this->db->select('krs_detail.id_krs, tb_dosen.id_dosen ,tb_dosen.nama_dosen, tb_matkul.nama_matkul, tb_dosen.status');
		$this->db->from('krs_detail');
		$this->db->join('tb_dosen', 'krs_detail.id_dosen = tb_dosen.id_dosen', 'left');
		$this->db->join('tb_matkul', 'tb_dosen.id_matkul = tb_matkul.id_matkul', 'left');
		$this->db->where('krs_detail.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->result();
	}
/// FORM NILAI SELECT KRS == DOSEN
 
/// PERHITUNG TABEL IPK 
	public function aritmatikaIpk($nim_mhs)
	{
		$kill = (int)3; 
		$this->db->select('krs_detail.nilai_krs,',$kill);
		$this->db->from('krs_detail');
		$this->db->where('krs_detail.nim_mhs', $nim_mhs);
		$query = $this->db->get();
		return $query->result();
	}

/// STATUS INPUT SELECT
	public function inputSelectDataStatus()
	{
		$datastatus = array("Aktif", "Tidak Aktif");
		return $datastatus;

	}

	public function inputSelectDataAgama()
	{
		$dataagama = array("Islam", "Protestan", "Katolik", "Hindu", "Buddha", "Khonghucu");
		return $dataagama;
	}	
}
