<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under  MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files ( "Software"), to deal
 * in  Software without restriction, including without limitation  rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of  Software, and to permit persons to whom  Software is
 * furnished to do so, subject to  following conditions:
 *
 *  above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of  Software.
 *
 *  SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO  WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL 
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OR
 * LIABILITY, WHER IN AN ACTION OF CONTRACT, TORT OR ORWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH  SOFTWARE OR  USE OR OR DEALINGS IN
 *  SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

$lang['form_validation_required']              = '{field} Harus Di Isi !!';
$lang['form_validation_isset']                 = '{field} harus memiliki nilai.';
$lang['form_validation_valid_email']           = '{field} harus mengandung alamat email yang valid.';
$lang['form_validation_valid_emails']          = '{field} harus berisi semua alamat email yang valid.';
$lang['form_validation_valid_url']             = '{field} harus mengandung URL yang valid.';
$lang['form_validation_valid_ip']              = '{field} harus mengandung IP yang valid.';
$lang['form_validation_valid_base64']          = '{field} harus mengandung string Base64 yang valid.';
$lang['form_validation_min_length']            = '{field} panjangnya paling tidak {param} karakter.';
$lang['form_validation_max_length']            = '{field} tidak boleh melebihi {param} karakter.';
$lang['form_validation_exact_length']          = '{field} panjangnya harus tepat {param}.';
$lang['form_validation_alpha']                 = '{field} hanya boleh mengandung karakter alfabet.';
$lang['form_validation_alpha_numeric']         = '{field} hanya boleh mengandung karakter alfanumerik.';
$lang['form_validation_alpha_numeric_spaces']  = '{field} hanya boleh berisi karakter dan spasi alfa-numerik.';
$lang['form_validation_alpha_dash']            = '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan garis putus-putus.';
$lang['form_validation_numeric']               = '{field} Harus Menggunakan Angka.';
$lang['form_validation_is_numeric']            = '{field} hanya boleh berisi karakter numerik.';
$lang['form_validation_integer']               = '{field} harus mengandung bilangan bulat.';
$lang['form_validation_regex_match']           = '{field} tidak dalam format yang benar.';
$lang['form_validation_matches']               = '{field} tidak cocok dengan bidang {param}.';
$lang['form_validation_differs']               = '{field} harus berbeda dari bidang {param}.';
$lang['form_validation_is_unique']             = '{field} harus mengandung nilai unik.';
$lang['form_validation_is_natural']            = '{field} hanya boleh mengandung digit.';
$lang['form_validation_is_natural_no_zero']    = '{field} hanya boleh berisi angka dan harus lebih besar dari nol.';
$lang['form_validation_decimal']               = '{field} harus mengandung angka desimal.';
$lang['form_validation_less_than']             = '{field} harus mengandung angka kurang dari {param}.';
$lang['form_validation_less_than_equal_to']    = '{field} harus mengandung angka kurang dari atau sama dengan {param}.';
$lang['form_validation_greater_than']          = '{field} harus mengandung angka yang lebih besar dari {param}.';
$lang['form_validation_greater_than_equal_to'] = '{field} harus mengandung angka yang lebih besar atau sama dengan {param}.';
$lang['form_validation_error_message_not_set'] = 'Tidak dapat mengakses pesan kesalahan yang sesuai dengan nama bidang Anda {bidang}.';
$lang['form_validation_in_list']               = 'harus salah satu dari: {param}.';
