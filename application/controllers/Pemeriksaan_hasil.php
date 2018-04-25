<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pemeriksaan_hasil extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_pemeriksaan_hasil');
        //$this->tblName = $this->config->item('tmst_pemeriksaan_hasil');
         $this->tblName = 'tmst_pemeriksaan_hasil';
        $this->field = 'id_pemeriksaan_hasil';
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

            $data['results'] = $this->md_pemeriksaan_hasil->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Pemeriksaan/view_pemeriksaan_hasil';
            $data['plugin'] = 'Pemeriksaan/plugin';
            $this->load->view('template_admin', $data);
        }
    }
    
    
    public function CTRL_New($id_pemeriksaan)	{
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('btn_submit')) {
               
                //die();
                //$this->auth->TVD($_POST);die();
                    $this->md_pemeriksaan_hasil->MDL_Insert($id_pemeriksaan);
                    redirect('pemeriksaan_hasil');
                
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

            $hasil = $this->md_pemeriksaan_hasil->MDL_SelectID($id_pemeriksaan);
            
            $data['no_urut'] = $hasil->no_urut;
            $data['tgl_kunjungan'] = $hasil->recdate;
            $data['pasien'] = $hasil->pasien;
            $data['dokter'] = $hasil->dokter;
            $data['asuransi'] = $hasil->asuransi;
            
            $data['result_tindakan'] = $this->md_pemeriksaan_hasil->MDL_SelectTindakan($id_pemeriksaan);
            //var_dump($data['result_tindakan']);die();
            
            $data['option_pasien'] = $this->CTRL_Option_Pasien();
            $data['option_dokter'] = $this->CTRL_Option_Dokter();
            $data['option_asuransi'] = $this->CTRL_Option_Asuransi();
            

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['url'] = 'pemeriksaan_hasil/CTRL_New/'.$id_pemeriksaan;
            $data['page'] = 'Pemeriksaan/form_item_pemeriksaan_hasil';
            $data['plugin'] = 'Pemeriksaan/plugin';
            $this->load->view('template_admin', $data);
        }
        }
    }
    
public function CTRL_Option_Pasien() {
        $AryAsuransi = $this->db->get_where('tmst_pasien')->result();
        $option[''] = 'Pilih Pasien';
        foreach($AryAsuransi as $row) {
            $option[$row->id_pasien] = $row->nama_pasien;
        }

        return $option;
    }
    
    public function CTRL_Option_Dokter() {
        $AryAsuransi = $this->db->get_where('tmst_dokter')->result();
        $option[''] = 'Pilih Dokter';
        foreach($AryAsuransi as $row) {
            $option[$row->id_dokter] = $row->nama_dokter;
        }

        return $option;
    }
    
     public function CTRL_Option_Poli() {
        $AryPoli = $this->db->get_where('tmst_poli')->result();
        $option[''] = 'Pilih Poli';
        foreach($AryPoli as $row) {
            $option[$row->id_poli] = $row->nama_poli;
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
    
 
}
