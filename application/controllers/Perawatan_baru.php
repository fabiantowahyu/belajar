<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perawatan_baru extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_perawatan_baru');
        //$this->tblName = $this->config->item('tmst_perawatan_baru');
         $this->tblName = 'tmst_perawatan_baru';
        $this->field = 'id_perawatan_baru';
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

            $data['results'] = $this->md_perawatan_baru->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Perawatan/view_perawatan_baru';
            $data['plugin'] = 'Perawatan/plugin';
            $this->load->view('template_admin', $data);
        }
    }
    
    
    public function CTRL_New()	{
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('btn_submit')) {
               
                
                    $this->md_perawatan_baru->MDL_Insert();
                    redirect('perawatan_baru');
                
            }else{
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

            $data['results'] = $this->md_perawatan_baru->MDL_Select();
            $data['option_pasien'] = $this->CTRL_Option_Pasien();
            $data['option_dokter'] = $this->CTRL_Option_Dokter();
            $data['option_poli'] = $this->CTRL_Option_Poli();

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['url'] = 'perawatan_baru/CTRL_New';
            $data['page'] = 'Perawatan/form_kunjungan';
            $data['plugin'] = 'Perawatan/plugin';
            $this->load->view('template_admin', $data);
        }
        }
    }
    
public function CTRL_Option_Pasien() {
        $AryAsuransi = $this->db->get_where('tmst_pasien')->result();
        $option[''] = 'Pilih Asuransi';
        foreach($AryAsuransi as $row) {
            $option[$row->id_pasien] = $row->nama;
        }

        return $option;
    }
    
    public function CTRL_Option_Dokter() {
        $AryAsuransi = $this->db->get_where('tmst_dokter')->result();
        $option[''] = 'Pilih Asuransi';
        foreach($AryAsuransi as $row) {
            $option[$row->id_dokter] = $row->nama;
        }

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
