<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Request_approval extends CI_Controller{
	private $tblName;
	private $field;

	public function __construct(){
		parent::__construct();
		$this->load->model('md_request_approval');
		$this->tblName = $this->config->item('tmst_requestapproval');
		$this->field = 'id';
	}

	public function index(){
		if(!$this->auth->Auth_isPerm()){
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('list')){
			$data['action'] = 'list';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} else{
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
					
			$data['results'] = $this->md_request_approval->MDL_Select();
			
			$nm_title = $this->auth->Auth_getNameMenu();
			$data['title'] = sprintf("%s",$nm_title);
			$data['page'] = 'request_approval/view';
			$data['plugin'] = 'request_approval/plugin';
			$this->load->view('template_admin', $data);
		}
	}

	public function CTRL_Edit($id=''){
		if(!$this->auth->Auth_isPerm()){
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('edit')){
			$data['action'] = 'edit';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)){
			$data['id'] = $id;
			$data['page'] = 'error_invalidID';
			$this->load->view('template_admin', $data);
		} else{
			if($this->input->post('close')){
				redirect('request_approval');
			} elseif($this->input->post('btnsubmit')){
				$id = $this->input->post('id');
				$this->md_request_approval->MDL_Update($id);
				redirect('request_approval');
			} else{
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
				$this->breadcrumbs->add('Update', base_url());
				$breadcrum = $this->breadcrumbs->output();
				$data['breadcrum'] = $breadcrum;
				/* end */

				$hasil = $this->md_request_approval->MDL_SelectID($id);
				$data['id'] = $hasil->id;
				$data['request_name'] = $hasil->request_name;
				$data['remark'] = $hasil->remark;
				
				
				$AryEmpApp = $this->CTRL_Option_Requester();
				$data['emp_app'] = strlen($this->input->post('emp_app')) ? $this->input->post('emp_app') : '';
				$data['option_emp_app'] = $AryEmpApp;


				$ApprovedByEmpID = $this->md_request_approval->MDL_Select_UserID($id,$data['emp_app'],1);
				$data['is_required1'] = isset($ApprovedByEmpID->is_required) ? $ApprovedByEmpID->is_required : '';
				$ApprovedByEmpID = isset($ApprovedByEmpID->approved_by) ? explode(',', $ApprovedByEmpID->approved_by) : '';
				$Aryapprovalby = $this->CTRL_Option_approvalby();
				$data['approvalby'] = isset($ApprovedByEmpID[0]) ? $ApprovedByEmpID[0] : '';
				$data['option_approvalby'] = $Aryapprovalby;

				$ApprovedByEmpID_2 = $this->md_request_approval->MDL_Select_UserID($id,$data['emp_app'],2);
				$data['is_required2'] = isset($ApprovedByEmpID_2->is_required) ? $ApprovedByEmpID_2->is_required : '';
				$ApprovedByEmpID_2 = isset($ApprovedByEmpID_2->approved_by) ? explode(',', $ApprovedByEmpID_2->approved_by) : '';
				$Aryapprovalby2 = $this->CTRL_Option_approvalby();
				$data['approvalby2'] = isset($ApprovedByEmpID_2[0]) ? $ApprovedByEmpID_2[0] : '';
				$data['option_approvalby2'] = $Aryapprovalby2;
				
				$ApprovedByEmpID_3 = $this->md_request_approval->MDL_Select_UserID($id,$data['emp_app'],3);
				$data['is_required3'] = isset($ApprovedByEmpID_3->is_required) ? $ApprovedByEmpID_3->is_required : '';
				$ApprovedByEmpID_3 = isset($ApprovedByEmpID_3->approved_by) ? explode(',', $ApprovedByEmpID_3->approved_by) : '';
				$Aryapprovalby3 = $this->CTRL_Option_approvalby();
				$data['approvalby3'] = isset($ApprovedByEmpID_3[0]) ? $ApprovedByEmpID_3[0] : '';
				$data['option_approvalby3'] = $Aryapprovalby3;

				$Aryapprovalby_subs_1 = $this->CTRL_Option_approvalby();
				$data['approvalby_subs_1'] = isset($ApprovedByEmpID[1]) ? $ApprovedByEmpID[1] : '';
				$data['option_approvalby_subs_1'] = $Aryapprovalby_subs_1;

				$Aryapprovalby_subs_2 = $this->CTRL_Option_approvalby();
				$data['approvalby_subs_2'] = isset($ApprovedByEmpID_2[1]) ? $ApprovedByEmpID_2[1] : '';
				$data['option_approvalby_subs_2'] = $Aryapprovalby_subs_2;

				$Aryapprovalby_subs_3 = $this->CTRL_Option_approvalby();
				$data['approvalby_subs_3'] = isset($ApprovedByEmpID_3[1]) ? $ApprovedByEmpID_3[1] : '';
				$data['option_approvalby_subs_3'] = $Aryapprovalby_subs_3;


				if($this->input->post('searchNotMember')){
					$search_not_member = $this->input->post('search_not_member');
					$search_member = '';
				} elseif($this->input->post('searchMember')){
					$search_not_member = '';
					$search_member = $this->input->post('search_member');
				} else{
					$search_not_member = '';
					$search_member = '';
				}
				
				$data['search_not_member'] = $search_not_member;
				$data['search_member'] = $search_member;
				
				$AryNotMember = $this->CTRL_Option_NotMember($id,$search_not_member);
				$AryMember = $this->CTRL_Option_Member($id,$search_member);
				$data['option_not_member'] = $AryNotMember;
				$data['option_member'] = $AryMember;
				
				$nm_title = $this->auth->Auth_getNameMenu();
				$data['title'] = sprintf("%s - Setting",$nm_title);
				$data['url'] = 'request_approval/CTRL_Edit/'.$id;
				$data['page'] = 'request_approval/form_edit';
				$data['plugin'] = 'request_approval/plugin';
				$this->load->view('template_admin', $data);
			}
		}
	}
	
	// Febriyanto
	public function CTRL_View_Detail($id){
		if(!$this->auth->Auth_isPerm()){
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('edit')){
			$data['action'] = 'edit';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)){
			$data['id'] = $id;
			$data['page'] = 'error_invalidID';
			$this->load->view('template_admin', $data);
		} else{
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
			$this->breadcrumbs->add('Detail', base_url());
			$breadcrum = $this->breadcrumbs->output();
			$data['breadcrum'] = $breadcrum;
			/* end */
			
			$hasil = $this->md_request_approval->MDL_SelectID($id);
			$data['id'] = $hasil->id;
			$data['request_name'] = $hasil->request_name;
			$data['remark'] = $hasil->remark;
			
			$data['results_approval'] = $this->md_request_approval->MDL_SelectID_RequestApprovalDetail($id);
			
			/*echo "<pre>";
			print_r($data['results_approval']);
			echo "</pre>";
			die();*/
			
			$nm_title = $this->auth->Auth_getNameMenu();
			$data['title'] = sprintf("%s - Detail",$nm_title);
			$data['url'] = 'request_approval/CTRL_Add_Detail/'.$id;
			$data['urlback'] = 'request_approval/';
			$data['page'] = 'request_approval/form_view_detail';
			$data['plugin'] = 'request_approval/plugin';
			$this->load->view('template_admin', $data);
		}
	}
	
	// Febriyanto
	public function CTRL_Add_Detail($id){
		if(!$this->auth->Auth_isPerm()){
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('edit')){
			$data['action'] = 'edit';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)){
			$data['id'] = $id;
			$data['page'] = 'error_invalidID';
			$this->load->view('template_admin', $data);
		} else{
			if($this->input->post('close')){
				redirect('request_approval');
			} elseif($this->input->post('btnsubmit')){
				
				/*echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				die();*/
				
				$res = $this->md_request_approval->MDL_Update_Detail();
				
				if($res){
					$this->session->set_flashdata('msg', array('title'=>'Success!','message' => 'Data Succesfully Saved ','class' => 'alert alert-success'));	
				}
				
				redirect('request_approval/CTRL_View_Detail/'.$id);
				
			} else{
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
				$this->breadcrumbs->add('Update', base_url());
				$breadcrum = $this->breadcrumbs->output();
				$data['breadcrum'] = $breadcrum;
				/* end */
				
				// header request approval
				$hasil = $this->md_request_approval->MDL_SelectID($id);
				$data['id'] = $hasil->id;
				$data['request_name'] = $hasil->request_name;
				$data['remark'] = $hasil->remark;
				
				
				$AryEmpApp = $this->CTRL_Option_Requester();
				$data['option_emp_app'] = $AryEmpApp;

				$Aryapprovalby = $this->CTRL_Option_approvalby();
				$data['option_approvalby'] = $Aryapprovalby;

				$Aryapprovalby2 = $this->CTRL_Option_approvalby();
				$data['option_approvalby2'] = $Aryapprovalby2;
				
				$Aryapprovalby3 = $this->CTRL_Option_approvalby();
				$data['option_approvalby3'] = $Aryapprovalby3;

				$Aryapprovalby_subs_1 = $this->CTRL_Option_approvalby();
				$data['option_approvalby_subs_1'] = $Aryapprovalby_subs_1;

				$Aryapprovalby_subs_2 = $this->CTRL_Option_approvalby();
				$data['option_approvalby_subs_2'] = $Aryapprovalby_subs_2;

				$Aryapprovalby_subs_3 = $this->CTRL_Option_approvalby();
				$data['option_approvalby_subs_3'] = $Aryapprovalby_subs_3;

				$search_not_member = $this->input->post('search_not_member');
				$data['search_not_member'] = $search_not_member;
				
				$AryNotMember = $this->CTRL_Option_NotMember($id,$search_not_member);
				$data['option_not_member'] = $AryNotMember;
				$data['option_member'] = array();
				
				/*echo "<pre>";
				print_r($data['option_member']);
				echo "</pre>";
				die();*/
				
				$nm_title = $this->auth->Auth_getNameMenu();
				$data['title'] = sprintf("%s - Add Detail",$nm_title);
				$data['url'] = 'request_approval/CTRL_Add_Detail/'.$id;
				$data['page'] = 'request_approval/form_add_detail';
				$data['plugin'] = 'request_approval/plugin';
				$this->load->view('template_admin', $data);
			}
		}
	}
	
	// Febriyanto
	public function CTRL_Edit_Detail($id,$emp_id){
		if(!$this->auth->Auth_isPerm()){
			$this->load->view('error_akses');
		} elseif(!$this->auth->Auth_isPrivButton('edit')){
			$data['action'] = 'edit';
			$data['page'] = 'error_sysmenu';
			$this->load->view('template_admin', $data);
		} elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)){
			$data['id'] = $id;
			$data['page'] = 'error_invalidID';
			$this->load->view('template_admin', $data);
		} else{
			if($this->input->post('close')){
				redirect('request_approval');
			} elseif($this->input->post('btnsubmit')){
				
				/*echo "<pre>";
				print_r($_POST);
				echo "</pre>";
				die();*/
				
				$res = $this->md_request_approval->MDL_Update_Detail();
				
				if($res){
					$this->session->set_flashdata('msg', array('title'=>'Success!','message' => 'Data Succesfully Saved ','class' => 'alert alert-success'));	
				}
				redirect('request_approval/CTRL_Edit_Detail/'.$id.'/'.$emp_id);
				
			} else{
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
				$this->breadcrumbs->add('Update', base_url());
				$breadcrum = $this->breadcrumbs->output();
				$data['breadcrum'] = $breadcrum;
				/* end */
				
				$data['id'] = $id;
				$data['emp_id'] = $emp_id;

				$hasil = $this->md_request_approval->MDL_SelectID($id);
				$data['request_name'] = $hasil->request_name;
				$data['remark'] = $hasil->remark;
				
				$reg_emp_name = $this->md_request_approval->MDL_getEmployeeName($emp_id);
				$data['reg_emp_name'] = $reg_emp_name;

				$ApprovedByEmpID = $this->md_request_approval->MDL_Select_UserID($id,$emp_id,1);
				$data['is_required1'] = isset($ApprovedByEmpID->is_required) ? $ApprovedByEmpID->is_required : '';
				$ApprovedByEmpID = isset($ApprovedByEmpID->approved_by) ? explode(',', substr($ApprovedByEmpID->approved_by,0,-1)) : '';
				$Aryapprovalby = $this->CTRL_Option_approvalby();
				$data['approvalby'] = isset($ApprovedByEmpID[0]) ? $ApprovedByEmpID[0] : '';
				$data['option_approvalby'] = $Aryapprovalby;

				$ApprovedByEmpID_2 = $this->md_request_approval->MDL_Select_UserID($id,$emp_id,2);
				$data['is_required2'] = isset($ApprovedByEmpID_2->is_required) ? $ApprovedByEmpID_2->is_required : '';
				$ApprovedByEmpID_2 = isset($ApprovedByEmpID_2->approved_by) ? explode(',', substr($ApprovedByEmpID_2->approved_by,0,-1)) : '';
				$Aryapprovalby2 = $this->CTRL_Option_approvalby();
				$data['approvalby2'] = isset($ApprovedByEmpID_2[0]) ? $ApprovedByEmpID_2[0] : '';
				$data['option_approvalby2'] = $Aryapprovalby2;
				
				$ApprovedByEmpID_3 = $this->md_request_approval->MDL_Select_UserID($id,$emp_id,3);
				$data['is_required3'] = isset($ApprovedByEmpID_3->is_required) ? $ApprovedByEmpID_3->is_required : '';
				$ApprovedByEmpID_3 = isset($ApprovedByEmpID_3->approved_by) ? explode(',', substr($ApprovedByEmpID_3->approved_by,0,-1)) : '';
				$Aryapprovalby3 = $this->CTRL_Option_approvalby();
				$data['approvalby3'] = isset($ApprovedByEmpID_3[0]) ? $ApprovedByEmpID_3[0] : '';
				$data['option_approvalby3'] = $Aryapprovalby3;

				$Aryapprovalby_subs_1 = $this->CTRL_Option_approvalby();
				$data['approvalby_subs_1'] = isset($ApprovedByEmpID[1]) ? $ApprovedByEmpID[1] : '';
				$data['option_approvalby_subs_1'] = $Aryapprovalby_subs_1;


				$Aryapprovalby_subs_2 = $this->CTRL_Option_approvalby();
				$data['approvalby_subs_2'] = isset($ApprovedByEmpID_2[1]) ? $ApprovedByEmpID_2[1] : '';
				$data['option_approvalby_subs_2'] = $Aryapprovalby_subs_2;

				$Aryapprovalby_subs_3 = $this->CTRL_Option_approvalby();
				$data['approvalby_subs_3'] = isset($ApprovedByEmpID_3[1]) ? $ApprovedByEmpID_3[1] : '';
				$data['option_approvalby_subs_3'] = $Aryapprovalby_subs_3;
				
				/*echo "<pre>";
				print_r($data['results_approval']);
				echo "</pre>";
				die();*/

				$nm_title = $this->auth->Auth_getNameMenu();
				$data['title'] = sprintf("%s - Edit Detail",$nm_title);
				$data['url'] = 'request_approval/CTRL_Edit_Detail/'.$id.'/'.$emp_id;
				$data['page'] = 'request_approval/form_edit_detail';
				$data['plugin'] = 'request_approval/plugin';
				$this->load->view('template_admin', $data);
			}
		}
	}
	
	public function CTRL_Option_NotMember($gid,$item){

		$option = array();
		$AryData = $this->md_request_approval->MDL_Select_NotMember($gid,$item);
		//$option[''] = 'Choose a Company...';
		foreach($AryData as $row){
			$option[$row->emp_id] = $row->emp_name;
		}

		return $option;
	}
	
	public function CTRL_Option_Member($gid,$item){

		$option = array();
		$AryData = $this->md_request_approval->MDL_Select_Member($gid,$item);
		//$option[''] = 'Choose a Company...';
		foreach($AryData as $row){
			$option[$row->emp_id] = $row->emp_name;
		}

		return $option;
	}
	
	public function CTRL_Option_Requester(){
		$this->load->model('md_request_approval');
		$AryEmpApp = $this->md_request_approval->MDL_Select_User();
		$option[''] = 'Choose a user...';
		foreach($AryEmpApp as $row){
			$option[$row->emp_id] = $row->emp_name;
		}
		return $option;
	}

	public function CTRL_Option_approvalby(){
		$this->load->model('md_request_approval');
		$Aryapprovalby = $this->md_request_approval->MDL_Select_User();
		$option[''] = 'Choose a user...';
		foreach($Aryapprovalby as $row){
			$option[$row->emp_id] = $row->emp_name;
		}
		return $option;
	}
	
}
