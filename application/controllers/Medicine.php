<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medicine extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_medicine');
        $this->tblName = $this->config->item('tmst_typevar');
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
            $this->breadcrumbs->add($nm_menu, current_url());
            $breadcrum = $this->breadcrumbs->output();
            $data['breadcrum'] = $breadcrum;
            /* end */

            $data['results'] = $this->md_medicine->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Medicine/view';
            $data['plugin'] = 'Medicine/plugin';
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
                redirect('master_type');
            } elseif ($this->input->post('btn_submit')) {
                $isDuplicated = $this->md_medicine->MDL_isPermInsert($this->input->post('id'));
                if($isDuplicated) {
                    $this->md_medicine->MDL_Insert();
                    redirect('master_type');
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
                $this->breadcrumbs->add($nm_menu, base_url().$url_menu);
                $this->breadcrumbs->add('Add New', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $AryTableName = $this->CTRL_Option_TableName();
                $data['table_name'] = '';
                $data['option_table_name'] = $AryTableName;

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);

                $data['url'] = 'master_type/CTRL_New';
                $data['url_tid'] = sprintf("%s%s/",site_url(),"master_type/CTRL_Select_OrderNumber");
                $data['page'] = 'Medicine/form';
                $data['plugin'] = 'Medicine/plugin';
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
                redirect('master_type');
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('id');
                $this->md_medicine->MDL_Update($id);
                redirect('master_type');
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

                $hasil = $this->md_medicine->MDL_SelectID($id);
                $data['id'] = $hasil->id;
                $data['name'] = $hasil->name;
                $data['table_name'] = $hasil->table_name;
                $data['tid'] = $hasil->tid;

                $AryTableName = $this->CTRL_Option_TableName();
                $data['option_table_name'] = $AryTableName;

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'master_type/CTRL_Edit/'.$id;
                $data['url_del'] = 'master_type/CTRL_Delete/'.$id;
                $data['url_tid'] = sprintf("%s%s/",site_url(),"master_type/CTRL_Select_OrderNumber");
                $data['page'] = 'Medicine/form_edit';
                $data['plugin'] = 'Medicine/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete($id='') {
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
            $isDeleted = $this->md_medicine->MDL_isPermDelete($id);
            if($isDeleted) {
                $this->md_medicine->MDL_Delete($id);
                redirect('master_type');
            } else {
                $data['page'] = 'error_delete';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Select_OrderNumber() {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        }  else {
            $result = $this->md_medicine->MDL_getMax_OrderNumber();
            if ($result){
                echo json_encode(array('success'=>true,'tid'=>$result));
            } else {
                echo json_encode(array('msg'=>'Some errors occured.'));
            }
        }
    }

    public function CTRL_Option_TableName() {

        $AryCompany = $this->md_medicine->MDL_Select();
        $option[''] = 'Choose a Table Name...';
        foreach($AryCompany as $row) {
            $option[$row->table_name] = $row->table_name;
        }
        $option['other'] = 'Other';

        return $option;
    }

}
