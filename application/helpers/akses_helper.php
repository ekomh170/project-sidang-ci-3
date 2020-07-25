<?php

function cek_login()
{
	$ci = get_instance();

	if (!$ci->session->userdata('email')) {
		redirect('Auth/index');
	}
}

function check_role_admin()
{
	$ci =& get_instance();

	$ci->load->model('Tambahan_model');
	$userData = $ci->Tambahan_model->getUserData();

	$cek_id_role = $userData['id_role'] == "1" || $userData['id_role'] == "6";

	if ($cek_id_role == FALSE) {
		redirect('Profile');
	}

}

function check_role_dosen_op_penilaian()
{
	$ci =& get_instance();

	$ci->load->model('Tambahan_model');
	$userData = $ci->Tambahan_model->getUserData();

	$cek_id_role = $userData['id_role'] == "1" || $userData['id_role'] == "3" || $userData['id_role'] == "5" || $userData['id_role'] == "6";

	if ($cek_id_role == FALSE) {
		redirect('Profile');
	}
}

function check_role_admin_op_pendataan()
{
	$ci =& get_instance();

	$ci->load->model('Tambahan_model');
	$userData = $ci->Tambahan_model->getUserData();

	$cek_id_role = $userData['id_role'] == "1" || $userData['id_role'] == "4" || $userData['id_role'] == "6";
	
	if ($cek_id_role == FALSE) {
		redirect('Profile');
	}

}

function pass_block()
{
	$ci =& get_instance();
	
	$ci->load->model('Tambahan_model');
	$userData = $ci->Tambahan_model->getUserData();

	$pass_block = decrypt_url($userData['password_asli']) == '1234';

	if ($pass_block == TRUE) {
		redirect('Auth/resetpassword');
	}
}

function cek_login_1()
{
	$ci = get_instance();

	if ($ci->session->userdata('email')) {
		redirect('Dashboard');
	}
}
