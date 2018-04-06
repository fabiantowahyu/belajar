<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pasien_pendaftaran extends CI_Controller {
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
            $data['option_asuransi'] = $this->CTRL_Option_Asuransi();
            $data['option_jenis_kelamin'] = $this->CTRL_Option_Jenis_Kelamin();
            $data['option_status_perkawinan'] = $this->CTRL_Option_Status_Perkawinan();
            $data['option_pekerjaan'] = $this->CTRL_Option_Pekerjaan();

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Pasien/form_new';
            $data['plugin'] = 'Pasien/plugin';
            $this->load->view('template_admin', $data);
        }
    }

 public function CTRL_Option_Asuransi() {
        $AryAsuransi = $this->db->get_where('tmst_asuransi')->result();
        $option[''] = 'Pilih Asuransi';
        foreach($AryAsuransi as $row) {
            $option[$row->id_asuransi] = $row->nama;
        }

        return $option;
    }
    
    public function CTRL_Option_Jenis_Kelamin() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('JENIS_KELAMIN');
        
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }
    
    
    public function CTRL_Option_Status_Perkawinan() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('STATUS_PERKAWINAN');
        
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }
    
    public function CTRL_Option_Pekerjaan() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('JENIS_PEKERJAAN');
        
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

}
