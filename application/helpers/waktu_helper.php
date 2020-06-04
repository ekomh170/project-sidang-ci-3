<?php

// fungsi untuk menampilkan waktu dan tanggal
function waktu()
{
        $array_hari = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
        $array_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
        $hari = $array_hari[date('N')];
        $bulan = $array_bulan[date('n')];
        $tanggal = date('j');
        $tahun = date('Y');

        return $hari . ', ' . $tanggal . ' ' . $bulan . ' ' . $tahun;
}

// fungsi untuk mengubah format tanggal mejadi format tanggal Indonesia
function tgl_indonesia($tgl)
{

        $tanggal = substr($tgl, 8, 2);

        $nama_bulan = array(
                "Januari", "Februari", "Maret", "April", "Mei",
                "Juni", "Juli", "Agustus", "September",
                "Oktober", "November", "Desember"
        );

        $bulan = $nama_bulan[substr($tgl, 5, 2) - 1];
        $tahun = substr($tgl, 0, 4);

        return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

// fungsi untuk mengubah susunan format tanggal 
function ubah_tgl($tanggal)
{
        $pisah   = explode('/', $tanggal);
        $larik   = array($pisah[2], $pisah[0], $pisah[1]);
        $satukan = implode('-', $larik);
        return $satukan;
}

function ubah_tgl2($tanggal)
{
        $pisah   = explode('-', $tanggal);
        $larik   = array($pisah[1], $pisah[2], $pisah[0]);
        $satukan = implode('/', $larik);
        return $satukan;
}
