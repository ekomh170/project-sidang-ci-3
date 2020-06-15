<?php

function cek_login()
{
	$ci = get_instance();

	if (!$ci->session->userdata('email')) {
		redirect('Auth/index');
	}
}

function cek_login_role()
{
	$ci = get_instance();

	if (!$ci->session->userdata('email')) {
		redirect('Auth/index');
	} else {
		$id_role = $ci->session->userdata('id_role');
		$menu = $ci->uri->segment(1);

		$queryMenu = $ci->db->get('user_menu', ['menu' => $menu])->row_array();
		$id_menu = $queryMenu['id'];

		$akses = $ci->db->get_where('user_akses_menu', [
			'id_role' => $id_role,
			'id_menu' => $id_menu
		]);

		if ($akses->num_rows() < 1) {
			redirect('Eror');
		}
	}
}

function check_access($id_role, $id_menu)
{
	$ci = get_instance();

	$ci->db->where('id_role', $id_role);
	$ci->db->where('id_menu', $id_menu);
	$result = $ci->db->get('user_akses_menu');

	if ($result->num_rows() > 0) {
		return "checked='checked'";
	}
}

// function cek_login_reset_password()
// {
// 	$ci = get_instance();
// 	// $email = $this->input->post('email');
// 	$data = $ci->db->get('tb_user')->result();

// 	if (!$data) {
// 		redirect('Auth');
// 	}	

// }

function cek_login_1()
{
	$ci = get_instance();

	if ($ci->session->userdata('email')) {
		redirect('Dashboard');
	}
}
