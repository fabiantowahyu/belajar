<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
	parent::__construct();
	$this->load->model('md_country');
	$this->tblName = $this->config->item('tmst_country');
	$this->field = 'id';
    }

    public function index() {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} elseif (!$this->auth->Auth_isPrivButton('list')) {
	    $data['action'] = 'list';
	    $data['page'] = 'error_sysmenu';
	    $this->load->view('template_admin', $data);
	} else {
	    /* Bread crum */
	    $this->load->model('md_ref_json');
	    $params = $this->router->fetch_class();
	    $hasil = $this->md_ref_json->MDL_SelectMenu($params);
	    $parentt = $hasil->parentt;
	    $nm_menu = $hasil->custom_title;
	    $path_icon = $hasil->path_icon;
	    $this->breadcrumbs->add($parentt, '#', $path_icon);
	    $this->breadcrumbs->add($nm_menu, current_url());
	    $breadcrum = $this->breadcrumbs->output();
	    $data['breadcrum'] = $breadcrum;
	    /* end */

	    $data['results'] = $this->md_country->MDL_Select();

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title'] = sprintf("%s", $nm_title);
	    $data['url_view'] = sprintf("%scountry/CTRL_View/", site_url());
	    $data['page'] = 'country/view';
	    $data['plugin'] = 'country/plugin';
	    $this->load->view('template_admin', $data);
	}
    }

    public function CTRL_New() {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} elseif (!$this->auth->Auth_isPrivButton('add')) {
	    $data['action'] = 'add';
	    $data['page'] = 'error_sysmenu';
	    $this->load->view('template_admin', $data);
	} else {
	    if ($this->input->post('close')) {
		redirect('country');
	    } elseif ($this->input->post('btn_submit')) {
		$isDuplicated = $this->md_country->MDL_isPermInsert($this->input->post('country_code'));
		if ($isDuplicated) {
		    $this->md_country->MDL_Insert();
		    redirect('country');
		} else {
		    $data['id'] = $this->input->post('country_code');
		    $data['page'] = 'error_duplicated';
		    $this->load->view('template_admin', $data);
		}
	    } else {
		/* Bread crum */
		$this->load->model('md_ref_json');
		$params = $this->router->fetch_class();
		$hasil = $this->md_ref_json->MDL_SelectMenu($params);
		$parentt = $hasil->parentt;
		$nm_menu = $hasil->custom_title;
		$url_menu = $hasil->url_menu;
		$path_icon = $hasil->path_icon;
		$this->breadcrumbs->add($parentt, '#', $path_icon);
		$this->breadcrumbs->add($nm_menu, base_url() . $url_menu);
		$this->breadcrumbs->add('Add New', current_url());
		$breadcrum = $this->breadcrumbs->output();
		$data['breadcrum'] = $breadcrum;
		/* end */

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Add New", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url_cek_field'] = sprintf("%s%s/costcenter_code", site_url(), "country/CTRL_CekField");
		$data['url'] = 'country/CTRL_New';
		$data['page'] = 'country/form';
		$data['plugin'] = 'country/plugin';
		$this->load->view('template_admin', $data);
	    }
	}
    }

    public function CTRL_Edit($id = '') {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} elseif (!$this->auth->Auth_isPrivButton('edit')) {
	    $data['action'] = 'edit';
	    $data['page'] = 'error_sysmenu';
	    $this->load->view('template_admin', $data);
	} elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field)) {
	    $data['id'] = $id;
	    $data['page'] = 'error_invalidID';
	    $this->load->view('template_admin', $data);
	} else {
	    if ($this->input->post('close')) {
		redirect('country');
	    } elseif ($this->input->post('btn_submit')) {
		$id = $this->input->post('id');
		$this->md_country->MDL_Update($id);
		redirect('country');
	    } else {
		/* Bread crum */
		$this->load->model('md_ref_json');
		$params = $this->router->fetch_class();
		$hasil = $this->md_ref_json->MDL_SelectMenu($params);
		$parentt = $hasil->parentt;
		$nm_menu = $hasil->custom_title;
		$url_menu = $hasil->url_menu;
		$path_icon = $hasil->path_icon;
		$this->breadcrumbs->add($parentt, '#', $path_icon);
		$this->breadcrumbs->add($nm_menu, base_url() . $url_menu);
		$this->breadcrumbs->add('Update', current_url());
		$breadcrum = $this->breadcrumbs->output();
		$data['breadcrum'] = $breadcrum;
		/* end */

		$hasil = $this->md_country->MDL_SelectID($id);
		$data['id'] = $hasil->id;
		$data['country_code'] = $hasil->country_code;
		$data['country_name'] = $hasil->country_name;

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Update", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url_cek_field'] = sprintf("%s%s/country_code/%s", site_url(), "country/CTRL_CekField", $hasil->country_code);
		$data['url'] = 'country/CTRL_Edit/' . $id;
		$data['url_del'] = 'country/CTRL_Delete/' . $id;
		$data['page'] = 'country/form_edit';
		$data['plugin'] = 'country/plugin';
		$this->load->view('template_admin', $data);
	    }
	}
    }

    public function CTRL_Delete($id = '') {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} elseif (!$this->auth->Auth_isPrivButton('delete')) {
	    $data['action'] = 'delete';
	    $data['page'] = 'error_sysmenu';
	    $this->load->view('template_admin', $data);
	} elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field)) {
	    $data['id'] = $id;
	    $data['page'] = 'error_invalidID';
	    $this->load->view('template_admin', $data);
	} else {
	    $id = $this->input->post('id');
	    $isDeleted = $this->md_country->MDL_isPermDelete($id);

	    if ($isDeleted) {
		$this->md_country->MDL_Delete($id);
		redirect('country');
	    } else {
		$data['page'] = 'error_delete';
		$this->load->view('template_admin', $data);
	    }
	}
    }

    public function CTRL_View($id = '') {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} elseif (!$this->auth->Auth_isPrivButton('list')) {
	    $data['action'] = 'list';
	    $data['page'] = 'error_sysmenu';
	    $this->load->view('template_admin', $data);
	} elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field)) {
	    $data['id'] = $id;
	    $data['page'] = 'error_invalidID';
	    $this->load->view('template_admin', $data);
	} else {
	    $hasil = $this->md_job_grade->MDL_SelectID($id);
	    $data['id'] = $hasil->id;
	    $data['grade_code'] = $hasil->grade_code;
	    $data['grade_name'] = $hasil->grade_name;

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title_head'] = sprintf("%s", $nm_title);
	    $data['title'] = sprintf("%s", $nm_title);
	    $data['page'] = 'JobGrade/form_view';
	    $data['plugin'] = 'JobGrade/plugin';
	    $this->load->view('template_popupwindow', $data);
	}
    }

    public function CTRL_Option_Currency() {
	$this->load->model('md_ref_json');
	$AryCurrency = $this->md_ref_json->MDL_Select_MasterType('CURRENCY');
	$option[''] = 'Choose a Currency...';
	foreach ($AryCurrency as $row) {
	    $option[$row->id] = $row->name;
	}

	return $option;
    }

}
