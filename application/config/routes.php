<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
// SYSTEM AWAL
$route['default_controller'] = 'Home';
$route['404_override'] = 'Eror';
$route['translate_uri_dashes'] = TRUE;
// SYSTEM AWAL

// ROUTEKU
$route['Mhs-CI'] = "Mahasiswa";
$route['Dsn-CI'] = "Dosen";
$route['Fks-CI'] = "Fakultas";
$route['Jrs-CI'] = "Jurusan";
$route['Ta-CI']  = "TahunAkademik";
$route['Ma-CI']  = "Matkul";
$route['Kls-CI'] = "Kelas";
$route['Rgn-CI'] = "Ruangan";

$route['Ipk-CI'] = "Ipk";
$route['Krs-CI'] = "KrsDetail";
$route['Transkrip-CI'] = "TranskripNilai";
$route['Nilai-CI'] = "Nilai";

$route['Dashboard-CI'] = "Dashboard";
$route['Pengguna-CI'] = "Pengguna";
$route['Profile-CI'] = "Profile";

$route['Role-CI'] = "Role";

$route['Regis-CI'] = "Auth/register";
// ROUTEKU

///////////////////////////////////////////////////ROUTES SESUAI ROLE KU //////////////////////////////////////

//Mahasiswa ROUTE
$route['Mahasiswa/:any'] = "Mahasiswa/ubah/$1";
$route['Mahasiswa/:any'] = "Mahasiswa/ubah/$1";
$route['Mahasiswa/:any'] = "Mahasiswa/ubah/$1";
$route['Mahasiswa/:any'] = "Mahasiswa/ubah/$1";
//Mahasiswa ROUTE

//DOSEN ROUTE
$route['Dosen/:any'] = "Dosen/ubah/$1";
$route['Dosen/:any'] = "Dosen/ubah/$1";
$route['Dosen/:any'] = "Dosen/ubah/$1";
$route['Dosen/:any'] = "Dosen/ubah/$1";
//DOSEN ROUTE

//Fakultas ROUTE
$route['Fakultas/:any'] = "Fakultas/ubah/$1";
$route['Fakultas/:any'] = "Fakultas/ubah/$1";
//Fakultas ROUTE

//Jurusan ROUTE
$route['Jurusan/:any'] = "Jurusan/ubah/$1";
$route['Jurusan/:any'] = "Jurusan/ubah/$1";
//Jurusan ROUTE

//TahunAkademik ROUTE
$route['TahunAkademik/:any'] = "TahunAkademik/ubah/$1";
$route['TahunAkademik/:any'] = "TahunAkademik/ubah/$1";
//TahunAkademik ROUTE

//Matkul ROUTE
$route['Matkul/:any'] = "Matkul/ubah/$1";
$route['Matkul/:any'] = "Matkul/ubah/$1";
//Matkul ROUTE

//Kelas ROUTE
$route['Kelas/:any'] = "Kelas/ubah/$1";
$route['Kelas/:any'] = "Kelas/ubah/$1";
//Kelas ROUTE

//Ruangan ROUTE
$route['Ruangan/:any'] = "Ruangan/ubah/$1";
$route['Ruangan/:any'] = "Ruangan/ubah/$1";
$route['Ruangan/:any'] = "Ruangan/ubah/$1";
//Ruangan ROUTE

//Role ROUTE
$route['Role/:any'] = "Role/ubah/$1";
$route['Role/:any'] = "Role/ubah/$1";
//Role ROUTE

//Ipk ROUTE
$route['Ipk/:any'] = "Ipk/ubah/$1";
$route['Ipk/:any'] = "Ipk/ubah/$1";
$route['Ipk/:any'] = "Ipk/ubah/$1";
//Ipk ROUTE

//KrsDetail ROUTE
$route['KrsDetail/:any'] = "KrsDetail/ubah/$1";
$route['KrsDetail/:any'] = "KrsDetail/ubah/$1";
$route['KrsDetail/:any'] = "KrsDetail/ubah/$1";
//KrsDetail ROUTE

//TranskripNilai ROUTE
$route['TranskripNilai/:any'] = "TranskripNilai/ubah/$1";
$route['TranskripNilai/:any'] = "TranskripNilai/ubah/$1";
$route['TranskripNilai/:any'] = "TranskripNilai/ubah/$1";
//TranskripNilai ROUTE

//Nilai ROUTE
$route['Nilai/:any'] = "Nilai/ubah/$1";
$route['Nilai/:any'] = "Nilai/ubah/$1";
$route['Nilai/:any'] = "Nilai/ubah/$1";
//Nilai ROUTE