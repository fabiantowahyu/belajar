<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Profile extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
	parent::__construct();
	$this->load->model('md_menubox');
	$this->load->model('md_profile');
	$this->tblName = $this->config->item('tmst_employee');
	$this->field = 'emp_id';
    }

    public function index() {

	/* Bread crum */
	$this->breadcrumbs->add('Profile', current_url(), 'fa fa-user');
	$breadcrum = $this->breadcrumbs->output();
	$data['breadcrum'] = $breadcrum;

	$hasil = $this->md_profile->MDL_SelectIDEmployee();
	$data['employee_name'] = $hasil->first_name . ' ' . $hasil->middle_name . ' ' . $hasil->last_name;
	$data['username'] = $hasil->username;
	$data['branch_id'] = $hasil->branch;
	$data['avatar'] = $this->md_menubox->MDL_getPicture_User();
	$data['join_date'] = date("d F Y", strtotime($hasil->join_date));
	$data['last_login'] = date("d F Y - H:i:s", strtotime($hasil->last_login));
	$data['email'] = $hasil->email;
	$data['phone'] = $hasil->phone;
	$data['hp'] = $hasil->hp;
	$data['address'] = $hasil->address;

	$data['birth_date'] = date("d F Y", strtotime($hasil->birth_date));
	$data['birth_place'] = $hasil->birth_place;

	$data['marital_status'] = $hasil->marital_status;
	$data['marital_date'] = date("d F Y", strtotime($hasil->marital_date));
	$data['marital_place'] = $hasil->marital_place;

	$data['religion'] = $hasil->religion;

	$nm_title = $this->auth->Auth_getNameMenu();
	$data['title'] = sprintf("%s", 'Profile');
	$data['url_view'] = sprintf("%sprofile/CTRL_View/", site_url());
	$data['page'] = 'Profile/view_employee';
	$data['plugin'] = 'Profile/plugin';
	$this->load->view('template_admin', $data);
    }

}
