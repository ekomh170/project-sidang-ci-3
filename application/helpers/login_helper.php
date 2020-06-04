<?php

function login_helper($tipe = "", $str = "")
{
    $CI = &get_instance();

    if (strtolower($tipe) == "login") {
        $log_tipe   = "login";
    } elseif (strtolower($tipe) == "logout") {
        $log_tipe   = "logout";
    } else {
        $log_tipe  = 0;
    }

    // paramter
    $param['log_user']      = $CI->session->userdata('email');
    $param['log_role']      = $CI->session->userdata('id_role');
    $param['log_tipe']      = $log_tipe;
    $param['log_desc']      = $str;

    //load model log
    $CI->load->model('LogLogin_model');

    //save to database
    $CI->LogLogin_model->save_log($param);
}
