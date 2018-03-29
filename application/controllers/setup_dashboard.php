<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setup_dashboard extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->load->model('md_admin');
	$this->load->model('md_manage_group');
	$this->load->model('md_dashboard_view');
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
	    //$this->breadcrumbs->add('Spring Tutorial', base_url().'tutorials/spring-tutorials');
	    $breadcrum = $this->breadcrumbs->output();
	    $data['breadcrum'] = $breadcrum;
	    /* end */

	    $result_company = $this->md_admin->MDL_Select_Company();
	    $data['company_name'] = $result_company->company_name;
	    $data['vission'] = $result_company->vission;
	    $data['mission'] = $result_company->mission;
	    $data['userid'] = $this->session->userdata('userid');
	    $data['username'] = $this->session->userdata('username');
	    $data['previlege'] = $this->session->userdata('table');
	    $user_group = $this->md_manage_group->MDL_Select_UserID($data['userid']);


	    $data['group'] = $this->md_manage_group->MDL_Select();
	    $data['dashboard_view'] = $this->md_dashboard_view->MDL_Select_View();
	    $data['active_group'] = $this->session->userdata('active_group') ? $this->session->userdata('active_group') : '1';
	    $data['active_view_left'] = $this->md_dashboard_view->MDL_Select_View_ID($data['active_group'], "L");
	    $data['active_view_right'] = $this->md_dashboard_view->MDL_Select_View_ID($data['active_group'], "R");



	    $data['user_group'] = $user_group->group_id;
	    $data['dashboard_left'] = $this->md_dashboard_view->MDL_Select_View_ID($data['user_group'], "L");
	    $data['dashboard_right'] = $this->md_dashboard_view->MDL_Select_View_ID($data['user_group'], "R");
	    $data['file'] = './file_upload/registration/';


	    $data['page'] = 'setup_dashboard/view';
	    $data['plugin'] = 'setup_dashboard/plugin';
	    $this->load->view('template_admin', $data);
	} else {
	    $this->load->view('template_admin', $data);
	}
    }

    public function maintenance() {
	$this->load->view('maintenance');
    }

    public function CTRL_Upload_Data() {
	$file = array();
	$file['expired_date'] = $this->input->post('expired_date');
	$file['fieldname'] = $this->input->post('fieldname');
	$file['userid'] = $this->input->post('userid');
	$file['file'] = $_FILES["name"]["name"];

	$is_userid = $this->md_file_expired->MDL_Select_ID($file['userid']);
	if ($is_userid) {
	    $this->md_file_expired->MDL_Update($file);
	} else {
	    $this->md_file_expired->MDL_Insert($file);
	}
	$status = TRUE;
	if ($file['file']) {
	    $config = array();
	    $config['upload_path'] = './file_upload/registration';
	    $config['allowed_types'] = 'pdf|doc|docx|jpeg|jpg';
	    $config['max_size'] = '1024';
	    $config['encrypt_name'] = TRUE;
	    $this->load->library('upload', $config);
	    $is_upload = $this->upload->do_upload('name');
	    if (!$is_upload) {
		$status = FALSE;
		print("
					<script language=\"javascript\">
						alert('An error occured, please try again');
						document.referrer = 'admin';
						location.href = document.referrer;
					</script>
				");
	    } else {
		$status = FALSE;
		$current_file = $this->md_registration->MDL_SelectByField($file);
		$path = './file_upload/registration/';
		if ($current_file->$file['fieldname']) {
		    if (file_exists($path . $current_file->$file['fieldname'])) {
			chmod($path . $current_file->$file['fieldname'], 0777);
			unlink($path . $current_file->$file['fieldname']);
		    }
		}
		$result = $this->upload->data();
		$file['file'] = $result['file_name'];
		$this->md_registration->MDL_UpdateByField($file);
		print("
					<script language=\"javascript\">
						alert('Your document has been saved');
						location.href = document.referrer;
					</script>
				");
	    }
	}

	if ($status) {
	    print("
					<script language=\"javascript\">
						alert('Your document has been saved');
						location.href = document.referrer;
					</script>");
	}
    }

    public function CTRL_SetFilterGroup() {
		$active_group = $this->input->post('user_group');
		$this->session->set_userdata('active_group', $active_group);
		redirect(base_url() . 'setup_dashboard');
    }

    public function CTRL_AddDashboardView() {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} else {
	    $group_id = $this->input->post('group_id');
	    $view_id = $this->input->post('view_id');
	    $position = $this->input->post('position');

	    $view = $this->md_dashboard_view->MDL_Select_View_Previlege($group_id, $view_id);
	    if ($view) {
		print("
					<script language=\"javascript\">
						alert('View already set');
						location.href = document.referrer;
					</script>");
	    } else {
		$data = array(
		    "group_id" => $group_id,
		    "view_id" => $view_id,
		    "status" => 1,
		    "position" => $position
		);
		$this->md_dashboard_view->MDL_Insert_Previlege($data);
		print("
					<script language=\"javascript\">
						alert('View activated');
						location.href = document.referrer;
					</script>");
	    }
	}
    }

    public function CTRL_DeleteView() {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} elseif (!$this->auth->Auth_isPrivButton('delete')) {
	    $data['action'] = 'delete';
	    $data['page'] = 'error_sysmenu';
	    $this->load->view('template_admin', $data);
	} else {
	    $id = $this->uri->segment(3);
	    $this->md_dashboard_view->MDL_DeletePrevilege($id);

	    print("
					<script language=\"javascript\">
						alert('Previlege has been deleted');
						location.href = document.referrer;
					</script>");
	}
    }

}
