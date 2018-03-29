<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Branch extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
	parent::__construct();
	$this->load->model('md_branch');
	$this->tblName = $this->config->item('tmst_branch');
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
	    
	    $data['results'] = $this->md_branch->MDL_Select();

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title'] = sprintf("%s", $nm_title);
	    $data['url_view'] = sprintf("%sbranch/CTRL_View/", site_url());
	    $data['page'] = 'Branch/view';
	    $data['plugin'] = 'Branch/plugin';
	    $this->load->view('template_admin', $data);
	}
    }

    public function CTRL_SelectData() {
	if ($this->auth->Auth_isPerm()) {
	    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	    $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	    $sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'id';
	    $order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
	    $item = isset($_POST['item']) ? mysql_real_escape_string($_POST['item']) : '';

	    $data = $this->md_branch->MDL_Select_DGtabel($page, $rows, $sort, $order, $item);

	    echo json_encode($data);
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
		redirect('branch');
	    } elseif ($this->input->post('btn_submit')) {
		$isDuplicated = $this->md_branch->MDL_isPermInsert($this->input->post('id'));
		if ($isDuplicated) {
		    $this->md_branch->MDL_Insert();
		    redirect('branch');
		} else {
		    $data['id'] = $this->input->post('id');
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

		$AryInvoiceSign = $this->CTRL_Option_InvoiceSign();
		$data['invoice_signature'] = '';
		$data['option_invoice_signature'] = $AryInvoiceSign;

		$AryCompany = $this->CTRL_Option_Company();
		$data['company_id'] = '';
		$data['option_company'] = $AryCompany;
		$data['id'] = $this->md_branch->MDL_getAutoID();

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Add New", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url'] = 'branch/CTRL_New';
		$data['page'] = 'Branch/form';
		$data['plugin'] = 'Branch/plugin';
		$this->load->view('template_admin', $data);
	    }
	}
    }

    public function CTRL_Edit($id) {
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
		redirect('branch');
	    } elseif ($this->input->post('btn_submit')) {
		$id = $this->input->post('id');
		$this->md_branch->MDL_Update($id);
		redirect('branch');
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

		$hasil = $this->md_branch->MDL_SelectID($id);
		$data['id'] = $hasil->id;
		$data['branch'] = $hasil->branch;
		$data['address'] = $hasil->address;
		$data['phone'] = $hasil->phone;
		$data['email'] = $hasil->email;
		$data['fax'] = $hasil->fax;
		$data['company_id'] = $hasil->company_id;
		$data['invoice_signature'] = $hasil->authorized_sign;

		$AryCompany = $this->CTRL_Option_Company();
		$data['option_company'] = $AryCompany;

		$AryInvoiceSign = $this->CTRL_Option_InvoiceSign();
		$data['option_invoice_signature'] = $AryInvoiceSign;

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Update", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);
		$data['url'] = 'branch/CTRL_Edit/' . $id;
		$data['url_del'] = 'branch/CTRL_Delete/' . $id;
		$data['page'] = 'Branch/form_edit';
		$data['plugin'] = 'Branch/plugin';
		$this->load->view('template_admin', $data);
	    }
	}
    }

    public function CTRL_Delete($id) {
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
	    $isDeleted = $this->md_branch->MDL_isPermDelete($id);
	    if ($isDeleted) {
		$this->md_branch->MDL_Delete($id);
		redirect('branch');
	    } else {
		$data['page'] = 'error_delete';
		$this->load->view('template_admin', $data);
	    }
	}
    }

    public function CTRL_View($id) {
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

	    $AryCompany = $this->CTRL_Option_Company();

	    $hasil = $this->md_branch->MDL_SelectID($id);
	    $data['id'] = $hasil->id;
	    $data['branch'] = $hasil->branch;
	    $data['address'] = $hasil->address;
	    $data['phone'] = $hasil->phone;
	    $data['email'] = $hasil->email;
	    $data['fax'] = $hasil->fax;
	    $data['company'] = @$AryCompany[$hasil->company_id];

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title_head'] = sprintf("%s - %s", $nm_title, $data['branch']);
	    $data['title'] = sprintf("%s", $nm_title);

	    $data['page'] = 'Branch/form_view';
	    $data['plugin'] = 'Branch/plugin';
	    $this->load->view('template_popupwindow', $data);
	}
    }

    public function CTRL_Option_Company() {
	$this->load->model('md_company');
	$AryCompany = $this->md_company->MDL_Select();
	$option[''] = 'Choose a Company...';
	foreach ($AryCompany as $row) {
	    $option[$row->id] = $row->name;
	}
	return $option;
    }

    public function CTRL_Option_InvoiceSign() {
	$this->load->model('md_employee');
	$AryInvoiceSign = $this->md_employee->MDL_Select();
	$option[''] = 'Choose a Employee...';
	foreach ($AryInvoiceSign as $row) {
	    $option[$row->emp_id] = $row->emp_name;
	}
	return $option;
    }

}
