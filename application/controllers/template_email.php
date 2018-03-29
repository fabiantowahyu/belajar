<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_email extends CI_Controller {
	private $tblName;
	private $field;

	public function __construct() {
		parent::__construct();
		$this->load->model('md_template_email');
		$this->tblName = $this->config->item('tmst_template_email');
		$this->field = 'id';
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
			$this->breadcrumbs->add($nm_menu, base_url());
			$breadcrum = $this->breadcrumbs->output();
			$data['breadcrum'] = $breadcrum;
			/* end */
			
				$data['results'] = $this->md_template_email->MDL_Select();
			
			
			$nm_title = $this->auth->Auth_getNameMenu();
			$data['title'] = sprintf("%s",$nm_title);
			$data['url_view'] = sprintf("%stemplate_email/CTRL_View/",site_url());
			$data['page'] = 'TemplateEmail/view';
			$data['plugin'] = 'TemplateEmail/plugin';
			$this->load->view('template_admin', $data);
		}
	}

	public function CTRL_New() {
		if(!$this->auth->Auth_isPerm()) {
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('add')) {
			$data['action'] = 'add';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} else {
			if ($this->input->post('close')) {
				redirect('template_email');
			} elseif ($this->input->post('btn_submit')) {
				$this->md_template_email->MDL_Insert();
				redirect('template_email');
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
				$this->breadcrumbs->add($nm_menu, base_url().$url_menu);
				$this->breadcrumbs->add('Add New', current_url());
				$breadcrum = $this->breadcrumbs->output();
				$data['breadcrum'] = $breadcrum;
				/* end */
				
				//$this->load->helper('plugin_helper');
				$data['content'] = '';
				
				$Arytype = $this->CTRL_Option_Type();
				$data['type'] = '';
				$data['option_type'] = $Arytype;
				
				//$data['id'] = $this->md_template_email->MDL_getAutoID();
				
				$nm_title = $this->auth->Auth_getNameMenu();
				$data['title_head'] = sprintf("%s - Add New",$nm_title);
				$data['title'] = sprintf("%s",$nm_title);
				
				$data['url'] = 'template_email/CTRL_New';
				$data['page'] = 'TemplateEmail/form';
				$data['plugin'] = 'TemplateEmail/plugin';
				$this->load->view('template_admin', $data);
			}
		}
    }

	public function CTRL_Edit($id='') {
		if(!$this->auth->Auth_isPerm()) {
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('edit')) {
			$data['action'] = 'edit';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)) {
			$data['id'] = $id;
			$data['page'] = 'error_invalidID';
			$this->load->view('template_admin', $data);
		} else {
			if ($this->input->post('close')) {
				redirect('template_email');
			} elseif ($this->input->post('btn_submit')) {
				$id = $this->input->post('id');
				$this->md_template_email->MDL_Update($id);
				redirect('template_email');
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
				$this->breadcrumbs->add($nm_menu, base_url().$url_menu);
				$this->breadcrumbs->add('Update', current_url());
				$breadcrum = $this->breadcrumbs->output();
				$data['breadcrum'] = $breadcrum;
				/* end */
								
				
				$hasil = $this->md_template_email->MDL_SelectID($id);
				$data['id'] = $hasil->id;
				$data['name'] = $hasil->name;
				$data['type'] = $hasil->type;
				$data['status'] = $hasil->status;
				$data['content'] = $hasil->content;
				
				$Arytype = $this->CTRL_Option_Type();
				$data['option_type'] = $Arytype;
				
				
				$nm_title = $this->auth->Auth_getNameMenu();
				$data['title_head'] = sprintf("%s - Update",$nm_title);
				$data['title'] = sprintf("%s",$nm_title);
				
				$data['url_add_param'] = sprintf("%stemplate_email/CTRL_Add_Parameter/%s",site_url(),$hasil->id);
				$data['url_edit_param'] = sprintf("%stemplate_email/CTRL_Edit_Parameter/",site_url());
				
				$data['url'] = 'template_email/CTRL_Edit/'.$id;
				$data['url_del'] = 'template_email/CTRL_Delete/'.$id;
				$data['page'] = 'TemplateEmail/form_edit';
				$data['plugin'] = 'TemplateEmail/plugin';
				$this->load->view('template_admin', $data);
			}
		}
    }

	public function CTRL_Delete($id) {
		if(!$this->auth->Auth_isPerm()) {
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('delete')) {
			$data['action'] = 'delete';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)) {
			$data['id'] = $id;
			$data['page'] = 'error_invalidID';
			$this->load->view('template_admin', $data);
		} else {
			$isDeleted = $this->md_template_email->MDL_isPermDelete($id);
			if($isDeleted) {
				$this->md_template_email->MDL_Delete($id);
				redirect('template_email');
			} else {
				$data['page'] = 'error_delete';
				$this->load->view('template_admin', $data);
			}
		}
    }

	public function CTRL_View($id='') {
		if(!$this->auth->Auth_isPerm()) {
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('list')) {
			$data['action'] = 'list';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)) {
			$data['id'] = $id;
			$data['page'] = 'error_invalidID';
			$this->load->view('template_admin', $data);
		} else {

			$AryCompany = $this->CTRL_Option_Company();
			
			$hasil = $this->md_branch->MDL_SelectID($id);
			$data['id'] = $hasil->id;
			$data['branch'] = $hasil->branch;
			$data['address'] = $hasil->address;
			$data['phone'] = $hasil->phone;
			$data['email'] = $hasil->email;
			$data['fax'] = $hasil->fax;
			$data['company'] = $AryCompany[$hasil->company_id];
			
			$nm_title = $this->auth->Auth_getNameMenu();
			$data['title_head'] = sprintf("%s - %s",$nm_title,$data['branch']);
			$data['title'] = sprintf("%s",$nm_title);

			$data['page'] = 'Branch/form_view';
			$data['plugin'] = 'Branch/plugin';
			$this->load->view('template_popupwindow', $data);
		}
    }
	
	public function CTRL_Option_Type() {
		$this->load->model('md_ref_json');
		$AryData = $this->md_ref_json->MDL_Select_MasterType('TMPEMAIL_TYPE');
		$option[''] = 'Choose a Type...';
		foreach($AryData as $row) {
			$option[$row->id] = $row->name;
		}

		return $option;
	}
	
}
