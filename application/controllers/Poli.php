<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poli extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_poli');
        //$this->tblName = $this->config->item('tmst_poli');
         $this->tblName = 'tmst_poli';
        $this->field = 'id_poli';
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

            $data['results'] = $this->md_poli->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Poli/view';
            $data['plugin'] = 'Poli/plugin';
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
                redirect('poli');
            } elseif ($this->input->post('btn_submit')) {
               
                
                    $this->md_poli->MDL_Insert();
                    redirect('poli');
                
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

                $data['option_poli'] = $this->CTRL_Option_Poli();

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);

                $data['url'] = 'poli/CTRL_New';
                $data['url_tid'] = sprintf("%s%s/",site_url(),"poli/CTRL_Select_OrderNumber");
                $data['page'] = 'Poli/form';
                $data['plugin'] = 'Poli/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id_poli='') {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id_poli,$this->tblName,$this->field)) {
            $data['id'] = $id_poli;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('poli');
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('id');
                $this->md_poli->MDL_Update($id_poli);
                redirect('poli');
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

                $hasil = $this->md_poli->MDL_SelectID($id_poli);
                $data['id_poli'] = $hasil->id_poli;
                $data['nama_poli'] = $hasil->nama_poli;

               
                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'poli/CTRL_Edit/'.$id_poli;
                $data['url_del'] = 'poli/CTRL_Delete/'.$id_poli;
                $data['url_tid'] = sprintf("%s%s/",site_url(),"poli/CTRL_Select_OrderNumber");
                $data['page'] = 'Poli/form_edit';
                $data['plugin'] = 'Poli/plugin';
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
            
                $this->md_poli->MDL_Delete($id);
                redirect('poli');
            
        }
    }

    public function CTRL_Select_OrderNumber() {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        }  else {
            $result = $this->md_poli->MDL_getMax_OrderNumber();
            if ($result){
                echo json_encode(array('success'=>true,'tid'=>$result));
            } else {
                echo json_encode(array('msg'=>'Some errors occured.'));
            }
        }
    }

    public function CTRL_Option_TableName() {

        $AryCompany = $this->md_poli->MDL_Select();
        $option[''] = 'Choose a Table Name...';
        foreach($AryCompany as $row) {
            $option[$row->table_name] = $row->table_name;
        }
        $option['other'] = 'Other';

        return $option;
    }
    
    public function CTRL_Option_Poli() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('POLI_JENIS');
        $option[''] = 'Pilih Poli';
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

}
