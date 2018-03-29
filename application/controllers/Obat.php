<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Obat extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_obat');
        //$this->tblName = $this->config->item('tmst_obat');
         $this->tblName = 'tmst_obat';
        $this->field = 'id_obat';
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

            $data['results'] = $this->md_obat->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Obat/view';
            $data['plugin'] = 'Obat/plugin';
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
                redirect('obat');
            } elseif ($this->input->post('btn_submit')) {
               
                
                    $this->md_obat->MDL_Insert();
                    redirect('obat');
                
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

               

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);

                $data['url'] = 'obat/CTRL_New';
                $data['url_tid'] = sprintf("%s%s/",site_url(),"obat/CTRL_Select_OrderNumber");
                $data['page'] = 'Obat/form';
                $data['plugin'] = 'Obat/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id_obat='') {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id_obat,$this->tblName,$this->field)) {
            $data['id'] = $id_obat;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('obat');
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('id');
                $this->md_obat->MDL_Update($id_obat);
                redirect('obat');
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

                $hasil = $this->md_obat->MDL_SelectID($id_obat);
                $data['id_obat'] = $hasil->id_obat;
                $data['nama'] = $hasil->nama;
                $data['merk'] = $hasil->merk;
                $data['harga_jual'] = $hasil->harga_jual;
                $data['satuan'] = $hasil->satuan;

               
                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'obat/CTRL_Edit/'.$id_obat;
                $data['url_del'] = 'obat/CTRL_Delete/'.$id_obat;
                $data['url_tid'] = sprintf("%s%s/",site_url(),"obat/CTRL_Select_OrderNumber");
                $data['page'] = 'Obat/form_edit';
                $data['plugin'] = 'Obat/plugin';
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
            
                $this->md_obat->MDL_Delete($id);
                redirect('obat');
            
        }
    }

    public function CTRL_Select_OrderNumber() {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        }  else {
            $result = $this->md_obat->MDL_getMax_OrderNumber();
            if ($result){
                echo json_encode(array('success'=>true,'tid'=>$result));
            } else {
                echo json_encode(array('msg'=>'Some errors occured.'));
            }
        }
    }

    public function CTRL_Option_TableName() {

        $AryCompany = $this->md_obat->MDL_Select();
        $option[''] = 'Choose a Table Name...';
        foreach($AryCompany as $row) {
            $option[$row->table_name] = $row->table_name;
        }
        $option['other'] = 'Other';

        return $option;
    }

}
