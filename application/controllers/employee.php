<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Employee extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_employee');
        $this->tblName = $this->config->item('tmst_employee');
        $this->field = 'emp_id';
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

            $data['results'] = $this->md_employee->MDL_Select();

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s", $nm_title);
            $data['url_view'] = sprintf("%semployee/CTRL_View/", site_url());
            $data['page'] = 'Employee/view';
            $data['plugin'] = 'Employee/plugin';
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
                redirect('employee');
            } elseif ($this->input->post('btn_submit')) {
                $isDuplicated = $this->md_employee->MDL_isPermInsert($this->input->post('emp_id'));
                if ($isDuplicated) {
                    list($res, $msg) = $this->md_employee->MDL_Insert();
                    if ($res) {
                        redirect('employee');
                    } else {
                        $data['msg'] = $msg;
                        $data['page'] = 'error_filetype';
                        $this->load->view('template_admin', $data);
                    }
                } else {
                    $data['id'] = $this->input->post('emp_id');
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

                $AryGroup = $this->CTRL_Select_Group();
                $AryGender = $this->CTRL_Option_Gender();
                $AryPosition = $this->CTRL_Option_Position();
                $AryBranch = $this->CTRL_Option_Branch();
                $AryCurrency = $this->CTRL_Option_Currency();
                $AryGrade = $this->CTRL_Option_Grade();
                $AryMaritalStatus = $this->CTRL_Option_MaritalStatus();
                $data['role'] = '';
                $data['gender'] = '';
                $data['position'] = '';
                $data['branch_id'] = '';
                $data['grade_id'] = '';
                $data['option_gender'] = $AryGender;
                $data['option_role'] = $AryGroup;
                $data['option_position'] = $AryPosition;
                $data['option_branch'] = $AryBranch;
                $data['option_grade'] = $AryGrade;
                $data['option_maritalstatus'] = $AryMaritalStatus;
                $data['id'] = $this->md_employee->MDL_getAutoID();

                $AryReligion = $this->CTRL_Option_Religion();
                $data['religion'] = '';
                $data['option_religion'] = $AryReligion;

                $AryCountry = $this->CTRL_Option_Country();
                $data['country'] = '';
                $data['option_country'] = $AryCountry;

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = '';
                $data['option_province'] = $AryProvince;

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);

                $data['url_cek_field'] = sprintf("%s%s/username", site_url(), "employee/CTRL_CekField");
                $data['url_position'] = sprintf("%semployee/CTRL_View_Position/", site_url());
                $data['url'] = 'employee/CTRL_New';
                $data['page'] = 'Employee/form';
                $data['plugin'] = 'Employee/plugin';
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
                redirect('employee');
            } elseif ($this->input->post('upload')) {
                $this->md_employee->MDL_UpdateFoto($id);
                $this->session->set_flashdata('send_success', 'Data Saved !');
                redirect('employee/CTRL_Edit/' . $id);
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('emp_id');
                $this->md_employee->MDL_Update($id);
                $this->session->set_flashdata('send_success', 'Data Saved !');
                redirect('employee/CTRL_Edit/' . $id);
            } elseif ($this->input->post('submit_address')) {
                $id = $this->input->post('emp_id');
                $this->md_employee->MDL_Update_Address($id);
                redirect('employee/CTRL_Edit/' . $id);
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
                //$this->breadcrumbs->add('Spring Tutorial', base_url().'tutorials/spring-tutorials');
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_employee->MDL_SelectID($id);

                $data['id'] = $hasil->emp_id;
                $data['first_name'] = $hasil->first_name;
                $data['middle_name'] = $hasil->middle_name;
                $data['last_name'] = $hasil->last_name;
                $data['username'] = $hasil->username;
                $data['role'] = $hasil->role;
                $data['position_id'] = $hasil->position_id;
                $data['gender'] = $hasil->gender;
                $data['grade_id'] = $hasil->grade_id;
                $data['join_date'] = $hasil->join_date;
                $data['phone'] = $hasil->phone;
                $data['hp'] = $hasil->hp;
                $data['post_code'] = $hasil->post_code;
                $data['photo'] = $hasil->photo;
                $data['signature'] = $hasil->signature;
                $data['branch_id'] = $hasil->branch_id;
                $data['status'] = $hasil->status;
                $data['email'] = $hasil->email;
                $data['id_number'] = $hasil->id_number;
                $data['id_expireddate'] = $hasil->id_expireddate;
                $data['birth_place'] = $hasil->birth_place;
                $data['birth_date'] = $hasil->birth_date;
                $data['marital_status'] = $hasil->marital_status;
                $data['marital_date'] = $hasil->marital_date;
                $data['marital_place'] = $hasil->marital_place;
                $data['religion'] = $hasil->religion;
                $data['emp_status'] = $hasil->emp_status;
                $data['end_date'] = $hasil->end_date;
                $data['cost_center'] = $hasil->cost_center;

                $file_name = $hasil->photo;
                if (strlen($file_name)) {
                    $ary = @explode(".", $file_name);
                    $type = $ary[count($ary) - 1];
                    $data['file_name'] = sprintf("file_upload/avatar/%s.%s", $id, $type);
                } else {
                    $data['file_name'] = sprintf("file_upload/avatar/no_photo.jpg");
                }
                $file_signature = $hasil->signature;
                if (strlen($file_signature)) {
                    $ary = @explode(".", $file_signature);
                    $type = $ary[count($ary) - 1];
                    // $data['file_signature'] = sprintf("file_upload/signature/%s", $data['signature']);
                    $data['file_signature'] = sprintf("file_upload/signature/%s.%s", $id, $type);
                } else {
                    $data['file_signature'] = sprintf("file_upload/signature/no_photo.jpg");
                }
		
                $AryGender = $this->CTRL_Option_Gender();
                $data['option_gender'] = $AryGender;

                $AryPosition = $this->CTRL_Option_Position();
                $data['option_position'] = $AryPosition;

                $AryBranch = $this->CTRL_Option_Branch();
                $data['option_branch'] = $AryBranch;

                $AryGrade = $this->CTRL_Option_Grade();
                $data['option_grade'] = $AryGrade;

                $AryGroup = $this->CTRL_Select_Group();
                $data['option_role'] = $AryGroup;

                $AryMaritalStatus = $this->CTRL_Option_MaritalStatus();
                $data['option_maritalstatus'] = $AryMaritalStatus;

                $AryReligion = $this->CTRL_Option_Religion();
                $data['option_religion'] = $AryReligion;

                $AryEmpStatus = $this->CTRL_Option_EmpStatus();
                $data['option_empstatus'] = $AryEmpStatus;

                $AryCostCenter = $this->CTRL_Option_CostCenter();
                $data['option_costcenter'] = $AryCostCenter;
		
                // Address and Phone Information
                $results = $this->md_employee->MDL_Select_Address($id);
                $data['address1'] = $results->address1;
                $data['rt1'] = $results->rt1;
                $data['rw1'] = $results->rw1;
                $data['phone1'] = $results->phone1;
                $data['postal_code1'] = $results->postal_code1;
                $data['address2'] = $results->address2;
                $data['rt2'] = $results->rt2;
                $data['rw2'] = $results->rw2;
                $data['phone2'] = $results->phone2;
                $data['postal_code2'] = $results->postal_code2;
                $data['mobile_phone1'] = $results->mobile_phone1;
                $data['mobile_phone2'] = $results->mobile_phone2;

                $AryCountry = $this->CTRL_Option_Country();
                $data['country'] = $results->country1;
                $data['option_country'] = $AryCountry;

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = $results->province1;
                $data['option_province'] = $AryProvince;

                $AryCountry2 = $this->CTRL_Option_Country2();
                $data['country2'] = $results->country2;
                $data['option_country2'] = $AryCountry2;

                $AryProvince2 = $this->CTRL_Option_Province2();
                $data['province2'] = $results->province2;
                $data['option_province2'] = $AryProvince2;
                // End of Address


                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);

                $data['url_cek_field'] = sprintf("%s%s/username/%s", site_url(), "employee/CTRL_CekField", $data['username']);
                $data['url'] = 'employee/CTRL_Edit/' . $id;
                $data['url_del'] = 'employee/CTRL_Delete/' . $id;
                $data['page'] = 'Employee/form_edit';
                $data['plugin'] = 'Employee/plugin';
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
            $this->md_employee->MDL_Delete($id);
            redirect('employee');
        }
    }

    public function CTRL_View_Position() {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {

            $data['url'] = '';
            $data['page'] = 'Employee/form_view_position';
            $data['plugin'] = 'Employee/plugin_viewtree';
            $this->load->view('template_popupwindow', $data);
        }
    }

    public function CTRL_Select_Position($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            $data['results'] = $this->md_employee->MDL_Get_Position($id);

            $data['url'] = '';
            $data['page'] = 'Employee/form_select_position';
            $data['plugin'] = 'Employee/plugin';
            $this->load->view('template_popupwindow', $data);
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

            $AryGender = $this->CTRL_Option_Gender();
            $AryGroup = $this->CTRL_Select_Group();
            $AryPosition = $this->CTRL_Option_Position();
            $AryBranch = $this->CTRL_Option_Branch();

            $hasil = $this->md_employee->MDL_SelectID($id);
            $data['id'] = $hasil->emp_id;
            $data['first_name'] = $hasil->first_name;
            $data['middle_name'] = $hasil->middle_name;
            $data['last_name'] = $hasil->last_name;
            $data['username'] = $hasil->username;
            $data['role'] = @$AryGroup[$hasil->role];
            $data['position_id'] = @$AryPosition[$hasil->position_id];
            $data['gender'] = @$AryGender[$hasil->gender];
            $data['join_date'] = date("d F Y", strtotime($hasil->join_date));
            $data['address'] = $hasil->address;
            $data['phone'] = $hasil->phone;
            $data['hp'] = $hasil->hp;
            $data['post_code'] = $hasil->post_code;
            $data['photo'] = $hasil->photo;
            $data['branch_id'] = @$AryBranch[$hasil->branch_id];
            $data['status'] = ($hasil->status == 1) ? "Active" : "Not Active";
            $data['cek_status'] = $hasil->status;
            $data['email'] = $hasil->email;

            $file_name = $hasil->photo;
            if (strlen($file_name)) {
                $ary = @explode(".", $file_name);
                $type = $ary[count($ary) - 1];
                $data['file_name'] = sprintf("file_upload/avatar/%s.%s", $id, $type);
            } else {
                $data['file_name'] = sprintf("file_upload/avatar/no_photo.jpg");
            }

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title_head'] = sprintf("%s - %s", $nm_title, $data['first_name']);
            $data['title'] = sprintf("%s", $nm_title);

            $data['page'] = 'Employee/form_view';
            $data['plugin'] = 'Employee/plugin';
            $this->load->view('template_popupwindow', $data);
        }
    }

    //FAMILY
    public function CTRL_New_Family($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $id);
            } elseif ($this->input->post('submit')) {
                $this->md_employee->MDL_Insert_Family($id);
                redirect('employee/CTRL_Edit/' . $id);
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $id);
                $this->breadcrumbs->add('Family Add New', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $data['id'] = $id;
                $AryGender = $this->CTRL_Option_Gender();
                $data['gender'] = '';
                $data['option_gender'] = $AryGender;

                $Aryeducation_lvl = $this->CTRL_Option_EducationLevel();
                $data['education_lvl'] = '';
                $data['option_education_lvl'] = $Aryeducation_lvl;

                $AryRelationship = $this->CTRL_Option_Relationship();
                $data['relationship'] = '';
                $data['option_relationship'] = $AryRelationship;

                $data['title_head'] = sprintf("Family And Dependant- Add New");

                $data['url'] = 'employee/CTRL_New_Family/' . $id;
                $data['page'] = 'Employee/form_family';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit_Family($empid, $id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('tmst_emp_family'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $empid);
            } elseif ($this->input->post('submit')) {
                $this->md_employee->MDL_Update_Family($id);
                redirect('employee/CTRL_Edit/' . $empid);
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $empid);
                $this->breadcrumbs->add('Family Update', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_employee->MDL_SelectID($id, 'family');
                $data['id'] = $hasil->id;
                $data['emp_id'] = $hasil->emp_id;
                $data['empfamily_name'] = $hasil->empfamily_name;
                $data['family_birthplace'] = $hasil->family_birthplace;
                $data['family_dob'] = date("Y-m-d", strtotime($hasil->family_dob));
                $data['family_dependentsts'] = $hasil->family_dependentsts;
                $data['family_gender'] = $hasil->family_gender;
                $data['alive_status'] = $hasil->alive_status;
                $data['phone'] = $hasil->phone;
                $data['file_name'] = $hasil->file_family;

                $AryGender = $this->CTRL_Option_Gender();
                $data['gender'] = $hasil->family_gender;
                $data['option_gender'] = $AryGender;

                $Aryeducation_lvl = $this->CTRL_Option_EducationLevel();
                $data['education_lvl'] = $hasil->family_last_education;
                $data['option_education_lvl'] = $Aryeducation_lvl;

                $AryRelationship = $this->CTRL_Option_Relationship();
                $data['relationship'] = $hasil->family_relationship_id;
                $data['option_relationship'] = $AryRelationship;

                $data['title_head'] = sprintf("Family And Dependant - Update");

                $data['url'] = 'employee/CTRL_Edit_Family/' . $hasil->emp_id . '/' . $hasil->id;
                $data['url_del'] = 'employee/CTRL_Delete_Family/' . $hasil->emp_id;
                $data['page'] = 'Employee/form_edit_family';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete_Family($empid) {
        $id = $this->input->post('id');
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('tmst_emp_family'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $this->md_employee->MDL_Delete_Family($id);
            redirect('employee/CTRL_Edit/' . $empid);
        }
    }

    //Bank Account Information
    public function CTRL_New_Bank($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $id);
            } elseif ($this->input->post('submit')) {
                $this->md_employee->MDL_Insert_Bank($id);
                redirect('employee/CTRL_Edit/' . $id);
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $id);
                $this->breadcrumbs->add('Bank Add New', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $data['id'] = $id;

                $AryBankGroup = $this->CTRL_Option_BankGroup();
                $data['bank_group'] = '';
                $data['option_bank_group'] = $AryBankGroup;

                $AryCurrency = $this->CTRL_Option_Currency();
                $data['currency'] = '';
                $data['option_currency'] = $AryCurrency;

                $ArySavingType = $this->CTRL_Option_SavingType();
                $data['saving_type'] = '';
                $data['option_saving_type'] = $ArySavingType;

                $data['title_head'] = sprintf("Bank Account Information - Add New");

                $data['url'] = 'employee/CTRL_New_Bank/' . $id;
                $data['page'] = 'Employee/form_bank';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit_Bank($empid, $id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('ttrs_empbank'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $empid);
            } elseif ($this->input->post('submit')) {
                $this->md_employee->MDL_Update_Bank($id);
                redirect('employee/CTRL_Edit/' . $empid);
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $empid);
                $this->breadcrumbs->add('Bank Account Information Update', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_employee->MDL_SelectID($id, 'bank');
                $data['id'] = $hasil->id;
                $data['emp_id'] = $hasil->emp_id;
                $data['bank_group'] = $hasil->bank_group;
                $data['bank_name'] = $hasil->bank_name;
                $data['bank_account'] = $hasil->bank_account;
                $data['account_name'] = $hasil->account_name;
                $data['bank_branch'] = $hasil->bank_branch;
                $data['currency'] = $hasil->currency_id;
                $data['saving_type'] = $hasil->saving_type;
                $data['isdefault'] = $hasil->isdefault;

                $AryBankGroup = $this->CTRL_Option_BankGroup();
                $data['option_bank_group'] = $AryBankGroup;

                $AryCurrency = $this->CTRL_Option_Currency();
                $data['option_currency'] = $AryCurrency;

                $ArySavingType = $this->CTRL_Option_SavingType();
                $data['option_saving_type'] = $ArySavingType;

                $data['title_head'] = sprintf("Bank Account Information - Update");

                $data['url'] = 'employee/CTRL_Edit_Bank/' . $hasil->emp_id . '/' . $hasil->id;
                $data['url_del'] = 'employee/CTRL_Delete_Bank/' . $hasil->emp_id;
                $data['page'] = 'Employee/form_edit_bank';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete_Bank($empid) {
        $id = $this->input->post('id');
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('ttrs_empbank'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $this->md_employee->MDL_Delete_Bank($id);
            redirect('employee/CTRL_Edit/' . $empid);
        }
    }

    //EDUCATION
    public function CTRL_New_Education($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $id);
            } elseif ($this->input->post('submit')) {
                list($res, $msg) = $this->md_employee->MDL_Insert_Education();
                if ($res) {
                    redirect('employee/CTRL_Edit/' . $id);
                } else {
                    $data['msg'] = $msg;
                    $data['page'] = 'error_filetype';
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $id);
                $this->breadcrumbs->add('Education Add New', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $Aryeducation_lvl = $this->CTRL_Option_EducationLevel();
                $data['education_lvl'] = '';
                $data['option_education_lvl'] = $Aryeducation_lvl;

                $Aryfaculty = $this->CTRL_Option_Faculty();
                $data['faculty'] = '';
                $data['option_faculty'] = $Aryfaculty;

                $Aryinstitution = $this->CTRL_Option_Institution();
                $data['institution'] = '';
                $data['option_institution'] = $Aryinstitution;

                $AryCountry = $this->CTRL_Option_Country();
                $data['country'] = '';
                $data['option_country'] = $AryCountry;

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = '';
                $data['option_province'] = $AryProvince;

                $data['id'] = $id;

                $data['title_head'] = sprintf("Education - Add New");

                $data['url'] = 'employee/CTRL_New_Education/' . $id;
                $data['page'] = 'Employee/form_education';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit_Education($empid, $id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('tmst_emp_education'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $empid);
            } elseif ($this->input->post('btnUpload')) {
                list($res, $msg) = $this->md_employee->MDL_UpdateCertificate($id);
                if ($res) {
                    redirect('employee/CTRL_Edit_Education/' . $empid . '/' . $id);
                } else {
                    $data['msg'] = $msg;
                    $data['page'] = 'error_filetype';
                    $this->load->view('template_admin', $data);
                }
            } elseif ($this->input->post('submit')) {
                $id = $this->input->post('id');
                list($res, $msg) = $this->md_employee->MDL_Update_Education($id);
                if ($res) {
                    redirect('employee/CTRL_Edit/' . $empid);
                } else {
                    $data['msg'] = $msg;
                    $data['page'] = 'error_filetype';
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $empid);
                $this->breadcrumbs->add('Education Update', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_employee->MDL_SelectID($id, 'education');
                $data['id'] = $hasil->id;
                $data['emp_id'] = $hasil->emp_id;
                $data['education_lvl'] = $hasil->education_lvl;
                $data['startdate'] = $hasil->startdate;
                $data['enddate'] = $hasil->enddate;
                $data['faculty'] = $hasil->faculty;
                $data['institution'] = $hasil->institution;
                $data['country'] = $hasil->country;
                $data['province'] = $hasil->province;
                $data['city'] = $hasil->city;
                $data['major'] = $hasil->major;
                $data['gpa'] = $hasil->gpa;
                $data['certificate'] = $hasil->certificate;
                $data['certificate_date'] = ($hasil->certificate_date == "0000-00-00") ? "" : $hasil->certificate_date;
                $data['certificate_num'] = $hasil->certificate_num;
                $data['certificate_file'] = $hasil->certificate_file;
                $data['is_default'] = $hasil->is_default;
		
                $Aryeducation_lvl = $this->CTRL_Option_EducationLevel();
                $data['option_education_lvl'] = $Aryeducation_lvl;

                $Aryfaculty = $this->CTRL_Option_Faculty();
                $data['option_faculty'] = $Aryfaculty;

                $Aryinstitution = $this->CTRL_Option_Institution();
                $data['option_institution'] = $Aryinstitution;

                $AryCountry = $this->CTRL_Option_Country();
                $data['country'] = $hasil->country;
                $data['option_country'] = $AryCountry;

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = $hasil->province;
                $data['option_province'] = $AryProvince;

                $data['title_head'] = sprintf("Education - Update");

                $data['url'] = 'employee/CTRL_Edit_Education/' . $hasil->emp_id . '/' . $hasil->id;
                $data['url_del'] = 'employee/CTRL_Delete_Education/' . $hasil->emp_id;
                $data['page'] = 'Employee/form_edit_education';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete_Education($empid) {
        $id = $this->input->post('id');
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('tmst_emp_education'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $this->md_employee->MDL_Delete_Education($id);
            redirect('employee/CTRL_Edit/' . $empid);
        }
    }

    //TRAINING
    public function CTRL_New_Training($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $id);
            } elseif ($this->input->post('submit')) {
                $this->md_employee->MDL_Insert_Training();
                redirect('employee/CTRL_Edit/' . $id);
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $id);
                $this->breadcrumbs->add('Training Add New', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $AryCurrency = $this->CTRL_Option_Currency();
                $data['currency'] = '';
                $data['option_currency'] = $AryCurrency;

                $AryTrainingType = $this->CTRL_Option_TrainingType();
                $data['type'] = '';
                $data['option_type'] = $AryTrainingType;

                $data['id'] = $id;

                $data['title_head'] = sprintf("Training - Add New");

                $data['url'] = 'employee/CTRL_New_Training/' . $id;
                $data['page'] = 'Employee/form_training';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit_Training($empid, $id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('tmst_emp_training'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('employee/CTRL_Edit/' . $empid);
            } elseif ($this->input->post('submit')) {
                $this->md_employee->MDL_Update_Training($id);
                redirect('employee/CTRL_Edit/' . $empid);
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
                $this->breadcrumbs->add('Update', base_url() . $url_menu . 'CTRL_Edit/' . $empid);
                $this->breadcrumbs->add('Training Update', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_employee->MDL_SelectID($id, 'training');
                $data['id'] = $hasil->id;
                $data['emp_id'] = $hasil->emp_id;
                $data['subject'] = $hasil->subject;
                $data['startdate'] = $hasil->startdate;
                $data['enddate'] = $hasil->enddate;
                $data['topic'] = $hasil->topic;
                $data['fee'] = number_format($hasil->fee, 0, ".", ",");
                $data['currency'] = $hasil->currency;
                $data['trainer'] = $hasil->trainer;
                $data['provider'] = $hasil->provider;
                $data['certificate_num'] = $hasil->certificate_num;
                $data['passed'] = $hasil->passed;

                $AryCurrency = $this->CTRL_Option_Currency();
                $data['option_currency'] = $AryCurrency;

                $AryTrainingType = $this->CTRL_Option_TrainingType();
                $data['type'] = $hasil->type;
                $data['option_type'] = $AryTrainingType;

                $data['title_head'] = sprintf("Training - Update");

                $data['url'] = 'employee/CTRL_Edit_Training/' . $hasil->emp_id . '/' . $hasil->id;
                $data['url_del'] = 'employee/CTRL_Delete_Training/' . $hasil->emp_id;
                $data['page'] = 'Employee/form_edit_training';
                $data['plugin'] = 'Employee/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete_Training($empid) {
        $id = $this->input->post('id');
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->config->item('tmst_emp_training'), 'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $this->md_employee->MDL_Delete_Training($id);
            redirect('employee/CTRL_Edit/' . $empid);
        }
    }

    public function CTRL_CekField($field, $id = '') {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } else {
            $result = $this->md_employee->MDL_CekField($field, $id);
            echo json_encode($result);
        }
    }

    public function CTRL_Option_Gender() {
        $this->load->model('md_ref_json');
        $AryEmployee = $this->md_ref_json->MDL_Select_MasterType('GENDER');
        $option[''] = 'Choose a Gender...';
        foreach ($AryEmployee as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

    public function CTRL_Option_MaritalStatus() {
        $this->load->model('md_ref_json');
        $AryEmployee = $this->md_ref_json->MDL_Select_MasterType('MARITALSTATUS');
        $option[''] = 'Choose a Marital Status...';
        foreach ($AryEmployee as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

    public function CTRL_Option_Religion() {
        $this->load->model('md_ref_json');
        $AryReligion = $this->md_ref_json->MDL_Select_MasterType('RELIGION');
        $option[''] = 'Choose a Religion...';
        foreach ($AryReligion as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

    public function CTRL_Option_EmpStatus() {
        $this->load->model('md_employee_status');
        $AryEmpStatus = $this->md_employee_status->MDL_Select();
        $option[''] = 'Choose a Employment Status...';
        foreach ($AryEmpStatus as $row) {
            $option[$row->employmentstatus_code] = $row->employmentstatus_name;
        }
        return $option;
    }

    public function CTRL_Option_Relationship() {
        $this->load->model('md_ref_json');
        $AryRelationship = $this->md_ref_json->MDL_Select_MasterType('RELATIONSHIP');
        $option[''] = 'Choose a Relationship...';
        foreach ($AryRelationship as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

    public function CTRL_Option_Currency() {
        $this->load->model('md_ref_json');
        $AryCurrency = $this->md_ref_json->MDL_Select_MasterType('CURRENCY');
        //$option[''] = 'Choose a Currency...';
        foreach ($AryCurrency as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function CTRL_Option_TrainingType() {
        $this->load->model('md_ref_json');
        $AryTrainingType = $this->md_ref_json->MDL_Select_MasterType('TRAINING_TYPE');
        foreach ($AryTrainingType as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function CTRL_Option_Position() {
        $this->load->model('md_ref_json');
        $AryPosition = $this->md_employee->MDL_Select_Position();
        $option[''] = 'Choose a Position...';
        foreach ($AryPosition as $row) {
            $option[$row->position_id] = $row->position_name;
        }
        return $option;
    }

    public function CTRL_Option_Branch() {
        $this->load->model('md_branch');
        $AryBranch = $this->md_branch->MDL_Select();
        $option[''] = 'Choose a Worklocation...';
        foreach ($AryBranch as $row) {
            $option[$row->id] = $row->branch;
        }
        return $option;
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

    public function CTRL_Option_Province() {
        $this->load->model('md_province');
        $AryProvince = $this->md_province->MDL_Select();
        $option[''] = 'Choose a Province...';
        foreach ($AryProvince as $row) {
            $option[$row->province_code] = $row->province_name;
        }
        return $option;
    }

    public function CTRL_Option_Country2() {
        $this->load->model('md_country');
        $AryCountry2 = $this->md_country->MDL_Select();
        $option[''] = 'Choose a Country...';
        foreach ($AryCountry2 as $row) {
            $option[$row->country_code] = $row->country_name;
        }
        return $option;
    }

    public function CTRL_Option_Province2() {
        $this->load->model('md_province');
        $AryProvince2 = $this->md_province->MDL_Select();
        $option[''] = 'Choose a Province...';
        foreach ($AryProvince2 as $row) {
            $option[$row->province_code] = $row->province_name;
        }
        return $option;
    }

    public function CTRL_Select_Group() {
        $this->load->model('md_manage_group');
        $AryGroup = $this->md_manage_group->MDL_Select();
        $option = array();
        $option[''] = 'Choose a Role...';
        if (isset($AryGroup)) {
            foreach ($AryGroup as $row) {
                $option[$row->id] = $row->nama;
            }
        }
        return $option;
    }

    public function CTRL_Option_EducationLevel() {
        $this->load->model('md_ref_json');
        $Aryeducation_lvl = $this->md_ref_json->MDL_Select_MasterType('EDUCATION_LEVEL');
        $option[''] = 'Choose a Education Level...';
        foreach ($Aryeducation_lvl as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function CTRL_Option_Faculty() {
        $this->load->model('md_ref_json');
        $Aryfaculty = $this->md_ref_json->MDL_Select_MasterType('FACULTY');
        $option[''] = 'Choose a faculty...';
        foreach ($Aryfaculty as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function CTRL_Option_Institution() {
        $this->load->model('md_ref_json');
        $Aryinstitution = $this->md_ref_json->MDL_Select_MasterType('INSTITUTION');
        $option[''] = 'Choose a Institution...';
        foreach ($Aryinstitution as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function CTRL_Option_Grade() {
        $this->load->model('md_job_grade');
        $AryData = $this->md_job_grade->MDL_Select();
        $option[''] = 'Choose a Grade...';
        foreach ($AryData as $row) {
            $option[$row->id] = $row->grade_name;
        }
        return $option;
    }

    public function CTRL_Option_CostCenter() {
        $this->load->model('md_costcenter');
        $AryData = $this->md_costcenter->MDL_Select();
        $option[''] = 'Choose a Cost Center...';
        foreach ($AryData as $row) {
            $option[$row->costcenter_code] = $row->costcenter_name;
        }
        return $option;
    }

    public function CTRL_Option_BankGroup() {
        $this->load->model('md_ref_json');
        $AryBankGroup = $this->md_ref_json->MDL_Select_MasterType('BANK_GROUP');
        $option[''] = 'Choose a Bank Group...';
        foreach ($AryBankGroup as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function CTRL_Option_BankName() {
        $bank_group = $this->input->post('bank_group');

        $query = $this->md_employee->MDL_Select_BankName($bank_group);
        $data = "<option value=''>Choose a Bank Name</option>\n";
        foreach ($query as $qry) {
            $data .= "<option value='$qry->bank_name'>$qry->bank_name</option>\n ";
        }
        echo $data;
    }

    public function CTRL_Option_SavingType() {
        $this->load->model('md_ref_json');
        $ArySavingType = $this->md_ref_json->MDL_Select_MasterType('SAVING_TYPE');
        $option[''] = 'Choose a Saving Type...';
        foreach ($ArySavingType as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

}
