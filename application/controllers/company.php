<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Company extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
	parent::__construct();
	$this->load->model('md_company');
	$this->tblName = $this->config->item('tmst_company');
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

	    $data['results'] = $this->md_company->MDL_Select();

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title'] = sprintf("%s", $nm_title);
	    $data['url_view'] = sprintf("%scompany/CTRL_View/", site_url());
	    $data['page'] = 'Company/view';
	    $data['plugin'] = 'Company/plugin';
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

	    $data = $this->md_company->MDL_Select_DGtabel($page, $rows, $sort, $order, $item);

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
		redirect('company');
	    } elseif ($this->input->post('btn_submit')) {
		$isDuplicated = $this->md_company->MDL_isPermInsert($this->input->post('id'));
		if ($isDuplicated) {
		    list($res, $msg) = $this->md_company->MDL_Insert();
		    if ($res) {
			redirect('company');
		    } else {
			$data['msg'] = $msg;
			$data['page'] = 'error_filetype';
			$this->load->view('template_admin', $data);
		    }
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

		$AryCompanyType = $this->CTRL_Option_CompanyType();
		$AryCurrency = $this->CTRL_Option_Currency();
		$AryTaxSign = $this->CTRL_Option_TaxSign();
		$AryInvoiceSign = $this->CTRL_Option_InvoiceSign();

		$data['type'] = '';
		$data['currency'] = '';
		$data['tax_signature'] = '';
		$data['invoice_signature'] = '';
		$data['option_type'] = $AryCompanyType;
		$data['option_currency'] = $AryCurrency;
		$data['option_tax_signature'] = $AryTaxSign;
		$data['option_invoice_signature'] = $AryInvoiceSign;
		$data['id'] = $this->md_company->MDL_getAutoID();

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Add New", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);

		$data['url'] = 'company/CTRL_New';
		$data['page'] = 'Company/form';
		$data['plugin'] = 'Company/plugin';
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
		redirect('company');
	    } elseif ($this->input->post('btn_upload')) {
		$this->md_company->MDL_UpdateFoto($id);
		redirect('company/CTRL_Edit/' . $id);
	    } elseif ($this->input->post('btn_submit')) {
		$id = $this->input->post('id');
		$this->md_company->MDL_Update($id);
		redirect('company');
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

		$hasil = $this->md_company->MDL_SelectID($id);
		$data['id'] = $hasil->id;
		$data['name'] = $hasil->name;
		$data['type'] = $hasil->type;
		$data['country'] = $hasil->country;
		$data['province'] = $hasil->province;
		$data['city'] = $hasil->city;
		$data['address'] = $hasil->address;
		$data['postal_code'] = $hasil->postal_code;
		$data['phone'] = $hasil->phone;
		$data['fax'] = $hasil->fax;
		$data['email'] = $hasil->email;
		$data['bank_account'] = $hasil->bank_account;
		$data['bank_name'] = $hasil->bank_name;
		$data['account_name'] = $hasil->account_name;
		$data['vission'] = $hasil->vission;
		$data['mission'] = $hasil->mission;
		$data['status'] = $hasil->status;
		$data['currency'] = $hasil->currency;
		$data['tax_country'] = $hasil->tax_country;
		$data['tax_file'] = $hasil->tax_file;
		$data['tax_signature'] = $hasil->tax_signature;
		$data['invoice_signature'] = $hasil->invoice_signature;

		$file_name = $hasil->file_name;
		if (strlen($file_name)) {
		    $ary = @explode(".", $file_name);
		    $type = $ary[count($ary) - 1];
		    $data['file_name'] = sprintf("file_upload/logo/%s.%s", $id, $type);
		} else {
		    $data['file_name'] = sprintf("file_upload/logo/no_photo.jpg");
		}

		//Define Select Box
		$AryCompanyType = $this->CTRL_Option_CompanyType();
		$AryCurrency = $this->CTRL_Option_Currency();
		$AryTaxSign = $this->CTRL_Option_TaxSign();
		$AryInvoiceSign = $this->CTRL_Option_InvoiceSign();

		$data['option_type'] = $AryCompanyType;
		$data['option_currency'] = $AryCurrency;
		$data['option_tax_signature'] = $AryTaxSign;
		$data['option_invoice_signature'] = $AryInvoiceSign;

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - Update", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);
		$data['url'] = 'company/CTRL_Edit/' . $id;
		$data['url_del'] = 'company/CTRL_Delete/' . $id;
		$data['page'] = 'Company/form_edit';
		$data['plugin'] = 'Company/plugin';
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
	    $isDeleted = $this->md_company->MDL_isPermDelete($id);
	    if ($isDeleted) {
		$this->md_company->MDL_Delete($id);
		redirect('company');
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

	    $AryCompanyType = $this->CTRL_Option_CompanyType();
	    $AryCurrency = $this->CTRL_Option_Currency();

	    $hasil = $this->md_company->MDL_SelectID($id);
	    $data['id'] = $hasil->id;
	    $data['name'] = sprintf("%s, %s", $hasil->name, $AryCompanyType[$hasil->type]);
	    //$data['type'] = $hasil->type;
	    $data['country'] = $hasil->country;
	    $data['province'] = $hasil->province;
	    $data['city'] = $hasil->city;
	    $data['address'] = $hasil->address;
	    $data['postal_code'] = $hasil->postal_code;
	    $data['phone'] = $hasil->phone;
	    $data['fax'] = $hasil->fax;
	    $data['email'] = $hasil->email;
	    $data['bank_account'] = $hasil->bank_account;
	    $data['bank_name'] = $hasil->bank_name;
	    $data['account_name'] = $hasil->account_name;
	    $data['vission'] = $hasil->vission;
	    $data['mission'] = $hasil->mission;
	    $data['status'] = ($hasil->status == 1) ? "Active" : "Not Active";
	    $data['cek_status'] = $hasil->status;
	    $data['currency'] = $AryCurrency[$hasil->currency];
	    $data['tax_country'] = $hasil->tax_country;
	    $data['tax_file'] = $hasil->tax_file;

	    $file_name = $hasil->file_name;
	    if (strlen($file_name)) {
		$ary = @explode(".", $file_name);
		$type = $ary[count($ary) - 1];
		$data['file_name'] = sprintf("file_upload/logo/%s.%s", $id, $type);
	    } else {
		$data['file_name'] = sprintf("file_upload/logo/no_photo.jpg");
	    }

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title_head'] = sprintf("%s - %s", $nm_title, $data['name']);
	    $data['title'] = sprintf("%s", $nm_title);

	    $data['page'] = 'Company/form_view';
	    $data['plugin'] = 'Company/plugin';
	    $this->load->view('template_popupwindow', $data);
	}
    }

    public function CTRL_Option_CompanyType() {
	$this->load->model('md_ref_json');
	$AryCompany = $this->md_ref_json->MDL_Select_MasterType('COMP_TYPE');
	$option[''] = 'Choose a Type...';
	foreach ($AryCompany as $row) {
	    $option[$row->id] = $row->name;
	}

	return $option;
    }

    public function CTRL_Option_Currency() {
	$this->load->model('md_ref_json');
	$AryCompany = $this->md_ref_json->MDL_Select_MasterType('CURRENCY');
	$option[''] = 'Choose a Currency...';
	foreach ($AryCompany as $row) {
	    $option[$row->id] = $row->name;
	}

	return $option;
    }

    public function CTRL_Option_TaxSign() {
	$this->load->model('md_employee');
	$AryTaxSign = $this->md_employee->MDL_Select();
	$option[''] = 'Choose a Employee...';
	foreach ($AryTaxSign as $row) {
	    $option[$row->emp_id] = $row->emp_name;
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
