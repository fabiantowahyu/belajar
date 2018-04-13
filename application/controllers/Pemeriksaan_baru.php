<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemeriksaan_baru extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_pemeriksaan_baru');
        //$this->tblName = $this->config->item('tmst_pemeriksaan_baru');
         $this->tblName = 'tmst_pemeriksaan_baru';
        $this->field = 'id_pemeriksaan_baru';
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

            $data['results'] = $this->md_pemeriksaan_baru->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Pemeriksaan/view_pemeriksaan_baru';
            $data['plugin'] = 'Pemeriksaan/plugin';
            $this->load->view('template_admin', $data);
        }
    }
    
    
    public function CTRL_New($no_urut)	{
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('btn_submit')) {
               
                //die();
                    $this->md_pemeriksaan_baru->MDL_Insert($no_urut);
                    redirect('pemeriksaan_baru');
                
            }else{
                
            $this->checkSudahAda($no_urut);    
                
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

            $hasil = $this->md_pemeriksaan_baru->MDL_SelectID($no_urut);
            
            $data['no_urut'] = $hasil->no_urut;
            $data['tgl_kunjungan'] = $hasil->recdate;
            $data['pasien'] = $hasil->pasien;
            $data['dokter'] = $hasil->dokter;
            $data['asuransi'] = '';
            
            
            $data['option_pasien'] = $this->CTRL_Option_Pasien();
            $data['option_dokter'] = $this->CTRL_Option_Dokter();
            $data['option_asuransi'] = $this->CTRL_Option_Asuransi();
            

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['url'] = 'pemeriksaan_baru/CTRL_New/'.$no_urut;
            $data['page'] = 'Pemeriksaan/form_item_pemeriksaan';
            $data['plugin'] = 'Pemeriksaan/plugin';
            $this->load->view('template_admin', $data);
        }
        }
    }
    
    public function CTRL_Edit($no_urut,$id_pemeriksaan)	{
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('btn_submit')) {
               
                //die();
                    $this->md_pemeriksaan_baru->MDL_Insert($no_urut);
                    redirect('pemeriksaan_baru');
                
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

            $hasil = $this->md_pemeriksaan_baru->MDL_SelectIDEdit($no_urut);
            
            $data['no_urut'] = $hasil->no_urut;
            $data['tgl_kunjungan'] = $hasil->recdate;
            $data['pasien'] = $hasil->pasien;
            $data['dokter'] = $hasil->dokter;
            $data['asuransi'] = $hasil->asuransi;
            
            $data['result_tindakan'] = $this->md_pemeriksaan_baru->MDL_SelectTindakan($id_pemeriksaan);
            $data['list_tindakan'] = $this->get_list_tindakan($id_pemeriksaan);
            
            //$this->auth->TVD($data['list_tindakan']);die();
            
            $data['option_pasien'] = $this->CTRL_Option_Pasien();
            $data['option_dokter'] = $this->CTRL_Option_Dokter();
            $data['option_asuransi'] = $this->CTRL_Option_Asuransi();
            

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['url'] = 'pemeriksaan_baru/CTRL_New/'.$no_urut;
            $data['page'] = 'Pemeriksaan/form_edit_item_pemeriksaan';
            $data['plugin'] = 'Pemeriksaan/plugin';
            $this->load->view('template_admin', $data);
        }
        }
    }
    
   public function checkSudahAda($no_urut){
      $exist = $this->db->get_where('ttrs_pemeriksaan_lab',array('no_urut'=>$no_urut))->row();
       if($exist){
           redirect('pemeriksaan_baru/CTRL_Edit/'.$no_urut.'/'.$exist->id_pemeriksaan);
       }else{
           return true;
       }
       
   }
    
public function CTRL_Option_Pasien() {
        $AryAsuransi = $this->db->get_where('tmst_pasien')->result();
        $option[''] = 'Pilih Pasien';
        foreach($AryAsuransi as $row) {
            $option[$row->id_pasien] = $row->nama;
        }

        return $option;
    }
    
    public function CTRL_Option_Dokter() {
        $AryAsuransi = $this->db->get_where('tmst_dokter')->result();
        $option[''] = 'Pilih Dokter';
        foreach($AryAsuransi as $row) {
            $option[$row->id_dokter] = $row->nama;
        }

        return $option;
    }
    
     public function CTRL_Option_Poli() {
        $AryPoli = $this->db->get_where('tmst_poli')->result();
        $option[''] = 'Pilih Poli';
        foreach($AryPoli as $row) {
            $option[$row->id_poli] = $row->nama;
        }

        return $option;
    }
    
     public function CTRL_Option_Asuransi() {
        $AryAsuransi = $this->db->get_where('tmst_asuransi')->result();
        $option[''] = 'Pilih Asuransi';
        foreach($AryAsuransi as $row) {
            $option[$row->id_asuransi] = $row->nama;
        }

        return $option;
    }
    
 public function get_item_list_tindakan_lab() {
        $Arytindakan = $this->db->get_where('tmst_tindakan_lab')->result();
        
        //var_dump($Arytindakan);
        // $option[''] = '--Choose an Item--';
        // foreach($AryBranch as $row)
        // {
        //     $option[$row->code] = $row->name;
        // }


        echo json_encode(array('result' => $Arytindakan));
    }
    
    public function get_list_tindakan() {
        $Arytindakan = $this->db->get_where('tmst_tindakan_lab')->result();
        
        return $Arytindakan;
    }
    
 
}
