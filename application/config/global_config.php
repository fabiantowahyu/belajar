<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  | DECLARE VARIABEL GLOBAL
  | -------------------------------------------------------------------
  |
 */
$config['isMaintenance'] = 0;
$config['website_title'] = "LS-Pro";
$config['isAdmin'] = "danang.samekto@carsurin.com";
$config['themes'] = "default";
$config['company'] = "CMPY00001";
$config['printing_company'] = "PCMY00001";
$config['filepath_logo'] = realpath('./file_upload/logo');
$config['filepath_avatar'] = realpath('./file_upload/avatar');
$config['filepath_education'] = realpath('./file_upload/education');
$config['filepath_family'] = realpath('./file_upload/family');
$config['filepath_avatar_tumbs'] = realpath('./file_upload/avatar/thumbnails');
$config['filepath_signature'] = realpath('./file_upload/signature');
/*$config['filepath_registration'] = realpath('./file_upload/registration');
$config['filepath_licences'] = realpath('./file_upload/licences');
$config['filepath_complaint'] = realpath('./file_upload/complaint');*/
$config['filepath_client_document'] = realpath('./file_upload/client_document');
$config['separator'] = sprintf("%s\%s", '', ''); //Windows
//$config['separator'] = sprintf("%s/%s",'',''); //Linux

date_default_timezone_set("Asia/Jakarta");

// Config Email
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = 465;
$config['smtp_user'] = 'no-reply@carsurin.com';
$config['smtp_pass'] = 'C4rS!@#*()';
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = TRUE;

$dbPrefix = 'belajar.';

$config['tmst_address'] = $dbPrefix . 'tmst_address';
$config['tmst_branch'] = $dbPrefix . 'tmst_branch';
$config['tmst_city'] = $dbPrefix . 'tmst_city';
$config['tmst_client'] = $dbPrefix . 'tmst_client';
$config['tmst_cust_address'] = $dbPrefix . 'tmst_client_address';
$config['tmst_cust_pic'] = $dbPrefix . 'tmst_client_pic';
$config['tmst_commodity'] = $dbPrefix . 'tmst_commodity';
$config['tmst_company'] = $dbPrefix . 'tmst_company';
$config['tmst_costcenter'] = $dbPrefix . 'tmst_costcenter';
$config['tmst_country'] = $dbPrefix . 'tmst_country';
$config['tmst_employee'] = $dbPrefix . 'tmst_employee';
$config['tmst_empstatus'] = $dbPrefix . 'tmst_empstatus';
$config['tmst_global_setting'] = $dbPrefix . 'tmst_global_setting';
$config['tmst_group'] = $dbPrefix . 'tmst_group';
$config['tmst_group_det'] = $dbPrefix . 'tmst_group_detail';
$config['tmst_job_grade'] = $dbPrefix . 'tmst_job_grade';
$config['tmst_menu'] = $dbPrefix . 'tmst_menu';
$config['tmst_position'] = $dbPrefix . 'tmst_position';
$config['tmst_ppn'] = $dbPrefix . 'tmst_ppn';
$config['tmst_province'] = $dbPrefix . 'tmst_province';
$config['tmst_requestapproval'] = $dbPrefix . 'tmst_requestapproval';
$config['tmst_requestapproval_detail'] = $dbPrefix . 'tmst_requestapproval_detail';
$config['tmst_template_email'] = $dbPrefix . 'tmst_template_email';
$config['tmst_typevar'] = $dbPrefix . 'tmst_typevar';
$config['tmst_users'] = $dbPrefix . 'tmst_users';
$config['tmst_users_group'] = $dbPrefix . 'tmst_users_group';
$config['tmst_importer'] = $dbPrefix . 'tmst_importer';
$config['tmst_loading_port'] = $dbPrefix . 'tmst_loading_port';
$config['tmst_port_destination'] = $dbPrefix . 'tmst_port_destination';

$config['tbl_user'] = $config['tmst_users'];
$config['tmst_users'] = $dbPrefix . 'v_users';

$config['ttrs_lse'] = $dbPrefix . 'ttrs_lse';
$config['ttrs_exporters_statement'] = $dbPrefix . 'ttrs_exporters_statement';
$config['ttrs_lse_survres_hs'] = $dbPrefix . 'ttrs_lse_survres_hs';
$config['ttrs_lse_survres_royalty'] = $dbPrefix . 'ttrs_lse_survres_royalty';
$config['ttrs_lse_survres_cal'] = $dbPrefix . 'ttrs_lse_survres_cal';
$config['ttrs_approvedby'] = $dbPrefix . 'ttrs_approvedby';
$config['tmst_client_document'] = $dbPrefix . 'tmst_client_document';


$config['template_forgot_password'] = 14;
$config['template_LSE'] = 1;

/* End of file tabel.php */
/* Location: ./application/config/tabel.php */
