<?php

function activity_log($tipe, $aksi, $item, $assign_to, $assign_type)
{
    $CI = &get_instance();

    $param['log_user'] = $CI->session->userdata('email');
    $param['log_role'] = $CI->session->userdata('id_role');
    $param['log_tipe'] = $tipe; //asset, asesoris, komponen, inventori
    $param['log_aksi'] = $aksi; //membuat, menambah, menghapus, mengubah,
    $param['log_item'] = $item; //nama item
    $param['log_assign_to'] = $assign_to; //target
    $param['log_assign_type'] = $assign_type; //target

    //load model log
    $CI->load->model('Log_model');

    //save to database
    $CI->Log_model->save_log($param);
}
