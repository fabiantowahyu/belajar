<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Change_password extends CI_Controller {

	public function __construct() {
		parent::__construct();
		//date_default_timezone_set("Asia/Jakarta");
		$this->load->model('md_chg_password');
	}

	public function index()	{
		if(!$this->auth->Auth_isPerm()) {
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('list')) {
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
						
			$id = $this->session->userdata['userid'];
			$hasil = $this->md_chg_password->MDL_SelectID($id);
			
			$data['userid'] = $hasil->userid;
			$data['username'] = $hasil->username;
			
			$nm_title = $this->auth->Auth_getNameMenu();
			$data['title'] = sprintf("%s - Update",$nm_title);
			$data['url'] = 'change_password/CTRL_Edit/'.$id;
			$data['page'] = 'ChangePassword/form';
			$data['plugin'] = 'ChangePassword/plugin';
			$this->load->view('template_admin', $data);
		}
	}

	public function CTRL_Edit($id) {
		if(!$this->auth->Auth_isPerm()) {
			$this->load->view('error_akses');
		} else {
			if ($this->input->post('btn_submit')) {
				$this->md_chg_password->MDL_Update($id);
				redirect('admin');
			} else {
				redirect('change_password');
			}
		}
    }

}
