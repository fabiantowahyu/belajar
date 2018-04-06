<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_pasien');
        //$this->tblName = $this->config->item('tmst_pasien');
         $this->tblName = 'tmst_pasien';
        $this->field = 'id_pasien';
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

            $data['results'] = $this->md_pasien->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Pasien/view';
            $data['plugin'] = 'Pasien/plugin';
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
                redirect('pasien');
            } elseif ($this->input->post('btn_submit')) {
               
                
                    $this->md_pasien->MDL_Insert();
                    redirect('pasien');
                
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

                $data['url'] = 'pasien/CTRL_New';
                $data['url_tid'] = sprintf("%s%s/",site_url(),"pasien/CTRL_Select_OrderNumber");
                $data['page'] = 'Pasien/form';
                $data['plugin'] = 'Pasien/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id_pasien='') {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id_pasien,$this->tblName,$this->field)) {
            $data['id'] = $id_pasien;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('pasien');
            } elseif ($this->input->post('btn_submit')) {
                
                $this->md_pasien->MDL_Update($id_pasien);
                redirect('pasien');
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

                $hasil = $this->md_pasien->MDL_SelectID($id_pasien);
                $data['id_pasien'] = $hasil->id_pasien;
                $data['nama'] = $hasil->nama;
                $data['alamat'] = $hasil->alamat;
                $data['foto'] = $hasil->foto;
                $data['telp'] = $hasil->telp;
                $data['no_rm'] = $hasil->no_rm;
                $data['asuransi'] = $hasil->asuransi;
                $data['no_asuransi'] = $hasil->no_asuransi;
                $data['kota'] = $hasil->kota;
                $data['jenis_kelamin'] = $hasil->jenis_kelamin;
                $data['pekerjaan'] = $hasil->pekerjaan;
                $data['status_perkawinan'] = $hasil->status_perkawinan;
                $data['tempat_lahir'] = $hasil->tempat_lahir;
                $data['tanggal_lahir'] = $hasil->tanggal_lahir;
                $data['umur'] = $hasil->umur;
                $data['email'] = $hasil->email;
               

               
                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'pasien/CTRL_Edit/'.$id_pasien;
                $data['url_del'] = 'pasien/CTRL_Delete/'.$id_pasien;
                $data['url_tid'] = sprintf("%s%s/",site_url(),"pasien/CTRL_Select_OrderNumber");
                $data['page'] = 'Pasien/form_edit';
                $data['plugin'] = 'Pasien/plugin';
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
            
                $this->md_pasien->MDL_Delete($id);
                redirect('pasien');
            
        }
    }

    

}
