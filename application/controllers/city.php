<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class City extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
	parent::__construct();
	$this->load->model('md_city');
	$this->tblName = $this->config->item('tmst_city');
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

	    $data['results'] = $this->md_city->MDL_Select();

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title'] = sprintf("%s", $nm_title);
	    $data['url_view'] = sprintf("%scity/CTRL_View/", site_url());
	    $data['page'] = 'city/view';
	    $data['plugin'] = 'city/plugin';
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
			redirect('city');
	    } elseif ($this->input->post('btn_submit')) {
		$isDuplicated = $this->md_city->MDL_isPermInsert($this->input->post('city_code'));
		if ($isDuplicated) {
		    $this->md_city->MDL_Insert();
		    redirect('city');
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

		$AryProvince = $this->CTRL_Option_Province();
		$data['province'] = '';
		$data['option_province'] = $AryProvince;


		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Add New", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url_cek_field'] = sprintf("%s%s/province_code", site_url(), "city/CTRL_CekField");
		$data['url'] = 'city/CTRL_New';
		$data['page'] = 'city/form';
		$data['plugin'] = 'city/plugin';
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
		redirect('city');
	    } elseif ($this->input->post('btn_submit')) {
		$id = $this->input->post('id');
		$this->md_city->MDL_Update($id);
		redirect('city');
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

		$hasil = $this->md_city->MDL_SelectID($id);

		$data['id'] = $hasil->id;
		$data['city_code'] = $hasil->city_code;
		$data['city_name'] = $hasil->city_name;
		$data['postal_code'] = $hasil->postal_code;
		
		$AryCityType = $this->CTRL_Option_City_Type();
		$data['city_type'] = $hasil->type;
		$data['option_city_type'] = $AryCityType;

		$AryProvince = $this->CTRL_Option_Province();
		$data['province'] = $hasil->province_code;
		$data['option_province'] = $AryProvince;

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Update", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url_cek_field'] = sprintf("%s%s/province_code/%s", site_url(), "city/CTRL_CekField", $hasil->city_code);
		$data['url'] = 'city/CTRL_Edit/' . $id;
		$data['url_del'] = 'city/CTRL_Delete/' . $id;
		$data['page'] = 'city/form_edit';
		$data['plugin'] = 'city/plugin';
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
	    $this->md_city->MDL_Delete($id);
	    redirect('city');
	}
    }
    
    public function CTRL_Option_City_Type() {
	$this->load->model('md_city');
	$AryCityType = $this->md_city->MDL_Select();
	foreach ($AryCityType as $row) {
	    $option[$row->type] = $row->type;
	}
	return $option;
    }

    public function CTRL_Option_Province() {
	$this->load->model('md_province');
	$AryProvince = $this->md_province->MDL_Select();
	$option[''] = 'Choose a Province...';
	foreach ($AryProvince as $row) {
	    $option[$row->province_code] = $row->province_name;
	}
	return $option;
    }

}
