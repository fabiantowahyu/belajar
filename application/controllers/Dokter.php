<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dokter extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_dokter');
        //$this->tblName = $this->config->item('tmst_dokter');
         $this->tblName = 'tmst_dokter';
        $this->field = 'id_dokter';
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

            $data['results'] = $this->md_dokter->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Dokter/view';
            $data['plugin'] = 'Dokter/plugin';
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
                redirect('dokter');
            } elseif ($this->input->post('btn_submit')) {
               
                
                    $this->md_dokter->MDL_Insert();
                    redirect('dokter');
                
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

                $data['option_jabatan'] = $this->CTRL_Option_Jabatan();

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);

                $data['url'] = 'dokter/CTRL_New';
                $data['url_tid'] = sprintf("%s%s/",site_url(),"dokter/CTRL_Select_OrderNumber");
                $data['page'] = 'Dokter/form';
                $data['plugin'] = 'Dokter/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id_dokter='') {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id_dokter,$this->tblName,$this->field)) {
            $data['id'] = $id_dokter;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('dokter');
            } elseif ($this->input->post('btn_submit')) {
                
                $this->md_dokter->MDL_Update($id_dokter);
                redirect('dokter');
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

                $hasil = $this->md_dokter->MDL_SelectID($id_dokter);
                $data['id_dokter'] = $hasil->id_dokter;
                $data['nama_dokter'] = $hasil->nama_dokter;
                $data['alamat'] = $hasil->alamat;
                $data['poli'] = $hasil->poli;
                $data['telp'] = $hasil->telp;
                $data['jadwal'] = $hasil->jadwal;
                $data['jabatan'] = $hasil->jabatan;
                $data['option_jabatan'] = $this->CTRL_Option_Jabatan();

               
                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'dokter/CTRL_Edit/'.$id_dokter;
                $data['url_del'] = 'dokter/CTRL_Delete/'.$id_dokter;
                $data['url_tid'] = sprintf("%s%s/",site_url(),"dokter/CTRL_Select_OrderNumber");
                $data['page'] = 'Dokter/form_edit';
                $data['plugin'] = 'Dokter/plugin';
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
            
                $this->md_dokter->MDL_Delete($id);
                redirect('dokter');
            
        }
    }

    public function CTRL_Option_Jabatan() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('JENIS_KARYAWAN');
        $option[''] = 'Pilih Poli';
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

}
