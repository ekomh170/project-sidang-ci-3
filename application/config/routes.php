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
|    example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|    https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|    $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|    $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|    $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:    my-controller/index    -> my_controller/index
|        my-controller/my-method    -> my_controller/my_method
 */
// SYSTEM AWAL
$route['default_controller']   = 'Home';
$route['404_override']         = 'Eror';
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

$route['Ipk-CI']       = "Ipk";
$route['Krs-CI']       = "KrsDetail";
$route['Transkrip-CI'] = "TranskripNilai";
$route['Nilai-CI']     = "Nilai";

$route['Dashboard-CI'] = "Dashboard";
$route['Pengguna-CI']  = "Pengguna";
$route['Profile-CI']   = "Profile";

$route['Rl-CI'] = "Role";

$route['Regis-CI'] = "Auth/register";
$route['Login-CI'] = "Auth";
$route['ResetAkun-CI'] = "Auth/resetpassword";

$route['HomeLogin-CI'] = "Home/loginhome";
$route['HomeUtama-CI'] = "Home";

// $route['Auth'] = "Eror";
// ROUTEKU

///////////////////////////////////////////////////ROUTES SESUAI ROLE KU //////////////////////////////////////

// //Mahasiswa ROUTE
// $route['Mhs-CI/:any'] = "Mhs-CI/tambah";
// $route['Mhs-CI/:any'] = "Mhs-CI/ubah/$1";
// $route['Mhs-CI/:any'] = "Mhs-CI/detail/$1";
// $route['Mhs-CI/:any'] = "Mhs-CI/hapus/$1";
// //Mahasiswa ROUTE

// //DOSEN ROUTE
// $route['Dsn-CI/:any'] = "Dsn-CI/tambah";
// $route['Dsn-CI/:any'] = "Dsn-CI/ubah/$1";
// $route['Dsn-CI/:any'] = "Dsn-CI/detail/$1";
// $route['Dsn-CI/:any'] = "Dsn-CI/hapus/$1";
// //DOSEN ROUTE

// //Fakultas ROUTE
// $route['Fks-CI/:any'] = "Fks-CI/tambah";
// $route['Fks-CI/:any'] = "Fks-CI/ubah/$1";
// $route['Fks-CI/:any'] = "Fks-CI/hapus/$1";
// //Fakultas ROUTE

// //Jurusan ROUTE
// $route['Jrs-CI/:any'] = "Jrs-CI/tambah";
// $route['Jrs-CI/:any'] = "Jrs-CI/ubah/$1";
// $route['Jrs-CI/:any'] = "Jrs-CI/hapus/$1";
// //Jurusan ROUTE

// //TahunAkademik ROUTE
// $route['Ta-CI/:any'] = "Ta-CI/tambah";
// $route['Ta-CI/:any'] = "Ta-CI/ubah/$1";
// $route['Ta-CI/:any'] = "Ta-CI/hapus/$1";
// //TahunAkademik ROUTE

// //Matkul ROUTE
// $route['Ma-CI/:any'] = "Ma-CI/tambah";
// $route['Ma-CI/:any'] = "Ma-CI/ubah/$1";
// $route['Ma-CI/:any'] = "Ma-CI/hapus/$1";
// //Matkul ROUTE

// //Kelas ROUTE
// $route['Kls-CI/:any'] = "Kls-CI/tambah";
// $route['Kls-CI/:any'] = "Kls-CI/ubah/$1";
// $route['Kls-CI/:any'] = "Kls-CI/hapus/$1";
// //Kelas ROUTE

// //Ruangan ROUTE
// $route['Rgn-CI/:any'] = "Rgn-CI/tambah";
// $route['Rgn-CI/:any'] = "Rgn-CI/ubah/$1";
// $route['Rgn-CI/:any'] = "Rgn-CI/detail/$1";
// $route['Rgn-CI/:any'] = "Rgn-CI/ubah/$1";
// //Ruangan ROUTE

// //Role ROUTE
// $route['Rl-CI/:any'] = "Rl-CI/tambah";
// $route['Rl-CI/:any'] = "Rl-CI/ubah/$1";
// $route['Rl-CI/:any'] = "Rl-CI/hapus/$1";
// //Role ROUTE

// //Ipk ROUTE
// $route['Ipk-CI/:any'] = "Ipk-CI/tambah";
// $route['Ipk-CI/:any'] = "Ipk-CI/ubah/$1";
// $route['Ipk-CI/:any'] = "Ipk-CI/detail/$1";
// $route['Ipk-CI/:any'] = "Ipk-CI/hapus/$1";
// //Ipk ROUTE

// //KrsDetail ROUTE
// $route['Krs-CI/:any'] = "Krs-CI/tambah";
// $route['Krs-CI/:any'] = "Krs-CI/ubah/$1";
// $route['Krs-CI/:any'] = "Krs-CI/detail/$1";
// $route['Krs-CI/:any'] = "Krs-CI/hapus/$1";
// //KrsDetail ROUTE

// //TranskripNilai ROUTE
// $route['Transkrip-CI/:any'] = "Transkrip-CI/tambah";
// $route['Transkrip-CI/:any'] = "Transkrip-CI/ubah/$1";
// $route['Transkrip-CI/:any'] = "Transkrip-CI/detail/$1";
// $route['Transkrip-CI/:any'] = "Transkrip-CI/hapus/$1";
// //TranskripNilai ROUTE

// //Nilai ROUTE
// $route['Nilai-CI/:any'] = "Nilai-CI/tambah";
// $route['Nilai-CI/:any'] = "Nilai-CI/ubah/$1";
// $route['Nilai-CI/:any'] = "Nilai-CI/detail/$1";
// $route['Nilai-CI/:any'] = "Nilai-CI/hapus/$1";
// //Nilai ROUTE