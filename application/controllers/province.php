<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Province extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
	parent::__construct();
	$this->load->model('md_province');
	$this->tblName = $this->config->item('tmst_province');
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

	    $data['results'] = $this->md_province->MDL_Select();

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title'] = sprintf("%s", $nm_title);
	    $data['url_view'] = sprintf("%sprovince/CTRL_View/", site_url());
	    $data['page'] = 'province/view';
	    $data['plugin'] = 'province/plugin';
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
		redirect('province');
	    } elseif ($this->input->post('btn_submit')) {
		$isDuplicated = $this->md_province->MDL_isPermInsert($this->input->post('province_code'));
		if ($isDuplicated) {
		    $this->md_province->MDL_Insert();
		    redirect('province');
		} else {
		    $data['id'] = $this->input->post('province_code');
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

		//$data['id'] = $this->md_job_grade->MDL_getAutoID();
		$AryCountry = $this->CTRL_Option_Country();
		$data['country'] = '';
		$data['option_country'] = $AryCountry;


		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Add New", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url_cek_field'] = sprintf("%s%s/province_code", site_url(), "province/CTRL_CekField");
		$data['url'] = 'province/CTRL_New';
		$data['page'] = 'province/form';
		$data['plugin'] = 'province/plugin';
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
		redirect('province');
	    } elseif ($this->input->post('btn_submit')) {
		$id = $this->input->post('id');
		$this->md_province->MDL_Update($id);
		redirect('province');
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

		$hasil = $this->md_province->MDL_SelectID($id);
		$data['id'] = $hasil->id;
		$data['province_code'] = $hasil->province_code;
		$data['province_name'] = $hasil->province_name;

		$AryCountry = $this->CTRL_Option_Country();
		$data['country'] = $hasil->country_code;
		$data['option_country'] = $AryCountry;

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Update", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url_cek_field'] = sprintf("%s%s/province_code/%s", site_url(), "province/CTRL_CekField", $hasil->province_code);
		$data['url'] = 'province/CTRL_Edit/' . $id;
		$data['url_del'] = 'province/CTRL_Delete/' . $id;
		$data['page'] = 'province/form_edit';
		$data['plugin'] = 'province/plugin';
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
	    $this->md_province->MDL_Delete($id);
	    redirect('province');
	}
    }

    public function CTRL_Option_Country() {
	$this->load->model('md_country');
	$AryCountry = $this->md_country->MDL_Select();
	$option[''] = 'Choose a Country...';
	foreach ($AryCountry as $row) {
	    $option[$row->country_code] = $row->country_name;
	}
	return $option;
    }

}
