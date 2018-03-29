<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Monthly_report_lse extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->load->model('md_admin');
	$this->load->model('md_manage_group');
	$this->load->model('md_dashboard_view');
	$this->load->model('md_grap_report_lse');
    }

     public function index() {
	if ($this->auth->Auth_isPerm()) {
	    /* Bread crum */
	    $this->load->model('md_ref_json');
	    $params = $this->router->fetch_class();
	    $hasil = $this->md_ref_json->MDL_SelectMenu($params);
	    $parentt = $hasil->parentt;
	    $nm_menu = $hasil->custom_title;
	    $path_icon = $hasil->path_icon;
	    $this->breadcrumbs->add($parentt, '#', $path_icon);
	    $this->breadcrumbs->add($nm_menu, base_url());
	    $breadcrum = $this->breadcrumbs->output();
	    $data['breadcrum'] = $breadcrum;
	    /* end */

	    $result_company = $this->md_admin->MDL_Select_Company();
	    $data['company_name'] = $result_company->company_name;
	    $data['vission'] = $result_company->vission;
	    $data['mission'] = $result_company->mission;

	    $data['charts1'] = $this->report_lse();

	    $data['userid'] = $this->session->userdata('userid');
	    $data['username'] = $this->session->userdata('username');
	    $data['previlege'] = $this->session->userdata('table');
	    //var_dump($data['userid']);die();
	    $data['user_access'] = $this->md_admin->MDL_GetGroupID($data['userid']);

	    $data['group'] = $this->md_manage_group->MDL_Select();
	    $data['dashboard_view'] = $this->md_dashboard_view->MDL_Select_View();
	    $data['active_group'] = $this->session->userdata('active_group') ? $this->session->userdata('active_group') : '1';
	    $data['active_view_left'] = $this->md_dashboard_view->MDL_Select_View_ID($data['active_group'], "L");
	    $data['active_view_right'] = $this->md_dashboard_view->MDL_Select_View_ID($data['active_group'], "R");

	    $user_group = $this->md_manage_group->MDL_Select_UserID($data['userid']);
	    $data['user_group'] = $user_group->group_id;
	    $data['dashboard_left'] = $this->md_dashboard_view->MDL_Select_View_ID($data['user_group'], "L");
	    $data['dashboard_right'] = $this->md_dashboard_view->MDL_Select_View_ID($data['user_group'], "R");
	    $data['file'] = './file_upload/registration/';

	    $data['url'] = '';
	    $data['page'] = 'Monthly_report_lse/view';
	    $data['plugin'] = 'Monthly_report_lse/plugin';
	    $this->load->view('template_admin', $data);
	} else {
	    $this->load->view('template_admin', $data);
	}
    }

    public function maintenance() {
	$this->load->view('maintenance');
    }

    public function report_lse() {

	$data['year'] = strlen($this->input->post('year')) ? $this->input->post('year') : date("Y");

	$report_lse = $this->md_grap_report_lse->MDL_SelectLSE($data['year']);
	$data['lse_total'] = $this->md_grap_report_lse->MDL_LSETotal($data['year']);
	$temp = "";
	$rev = "";
	$report = "";
	$sumReport = "";
	$flag1 = "";

	//sumorder
	foreach ($report_lse as $row) {
	    $order = $row->TotalInput;
	    $month = $row->bulan;
	    $temp[] = "[$month, $order]";
	    $rev[] = "[$month]";
	    $report[] = "$order";
	    $flag1++;
	}
	$data['report'] = $report;
	if ($temp == NULL) {
	    $jstime[] = "[0, 0]";
	    $data['temp'] = $jstime;
	    $data['rev'] = $jstime;
	} else {
	    $data['temp'] = $temp;
	    $data['rev'] = $rev;
	}
	    $reports = $report;
	$i = 0;
	if ($report != "") {
	    foreach ($reports as $n) {
		if (!isset($report[$i])) {
		    $report[$i] = 0;
		    $reportRev[$i] = 0;
		}
		$sumReport[] = $report[$i] ;
		$i++;
	    }
	}
		$data['sumReport'] = $sumReport;
		return $data;
    }

}
