<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tindakan extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_tindakan');
        //$this->tblName = $this->config->item('tmst_tindakan');
         $this->tblName = 'tmst_tindakan';
        $this->field = 'id_tindakan';
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

            $data['results'] = $this->md_tindakan->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Tindakan/view';
            $data['plugin'] = 'Tindakan/plugin';
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
                redirect('tindakan');
            } elseif ($this->input->post('btn_submit')) {
               
                
                    $this->md_tindakan->MDL_Insert();
                    redirect('tindakan');
                
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

                $data['option_poli'] =  $this->CTRL_Option_Poli();
                $data['option_jenis_tindakan'] =  $this->CTRL_Option_Jenis_Tindakan();

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);

                $data['url'] = 'tindakan/CTRL_New';
                $data['url_tid'] = sprintf("%s%s/",site_url(),"tindakan/CTRL_Select_OrderNumber");
                $data['page'] = 'Tindakan/form';
                $data['plugin'] = 'Tindakan/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id_tindakan='') {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id_tindakan,$this->tblName,$this->field)) {
            $data['id'] = $id_tindakan;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('tindakan');
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('id');
                $this->md_tindakan->MDL_Update($id_tindakan);
                redirect('tindakan');
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

                $hasil = $this->md_tindakan->MDL_SelectID($id_tindakan);
                $data['id_tindakan'] = $hasil->id_tindakan;
                $data['nama'] = $hasil->nama;
                $data['option_poli'] =  $this->CTRL_Option_Poli();
                $data['option_jenis_tindakan'] =  $this->CTRL_Option_Jenis_Tindakan();
                $data['poli'] = $hasil->poli;
                $data['jenis'] = $hasil->jenis;
                $data['tarif_umum'] = $hasil->tarif_umum;
                $data['tarif_member'] = $hasil->tarif_member;
                $data['fee_dokter'] = $hasil->fee_dokter;
                $data['fee_nurse'] = $hasil->fee_nurse;

               
                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'tindakan/CTRL_Edit/'.$id_tindakan;
                $data['url_del'] = 'tindakan/CTRL_Delete/'.$id_tindakan;
                $data['url_tid'] = sprintf("%s%s/",site_url(),"tindakan/CTRL_Select_OrderNumber");
                $data['page'] = 'Tindakan/form_edit';
                $data['plugin'] = 'Tindakan/plugin';
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
            
                $this->md_tindakan->MDL_Delete($id);
                redirect('tindakan');
            
        }
    }

    public function CTRL_Select_OrderNumber() {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        }  else {
            $result = $this->md_tindakan->MDL_getMax_OrderNumber();
            if ($result){
                echo json_encode(array('success'=>true,'tid'=>$result));
            } else {
                echo json_encode(array('msg'=>'Some errors occured.'));
            }
        }
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
    
    public function CTRL_Option_Jenis_Tindakan() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('JENIS_TINDAKAN');
        
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

}
