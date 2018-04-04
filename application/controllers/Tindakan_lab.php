<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tindakan_lab extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_tindakan_lab');
        //$this->tblName = $this->config->item('tmst_tindakan_lab');
         $this->tblName = 'tmst_tindakan_lab';
        $this->field = 'id_tindakan_lab';
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

            $data['results'] = $this->md_tindakan_lab->MDL_Select();


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['page'] = 'Tindakan_lab/view';
            $data['plugin'] = 'Tindakan_lab/plugin';
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
                redirect('tindakan_lab');
            } elseif ($this->input->post('btn_submit')) {
               
                
                    $this->md_tindakan_lab->MDL_Insert();
                    redirect('tindakan_lab');
                
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

                $data['option_golongan'] =  $this->CTRL_Option_Golongan();
                $data['option_jenis'] =  $this->CTRL_Option_Jenis_Tindakan_lab();

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);

                $data['url'] = 'tindakan_lab/CTRL_New';
                $data['url_tid'] = sprintf("%s%s/",site_url(),"tindakan_lab/CTRL_Select_OrderNumber");
                $data['page'] = 'Tindakan_lab/form';
                $data['plugin'] = 'Tindakan_lab/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id_tindakan_lab='') {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id_tindakan_lab,$this->tblName,$this->field)) {
            $data['id'] = $id_tindakan_lab;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('tindakan_lab');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_tindakan_lab->MDL_Update($id_tindakan_lab);
                redirect('tindakan_lab');
            } elseif ($this->input->post('btn_submit_consumable')) {
                $this->md_tindakan_lab->MDL_InsertConsumable($id_tindakan_lab);
                redirect('tindakan_lab');
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

                $hasil = $this->md_tindakan_lab->MDL_SelectID($id_tindakan_lab);
                $data['id_tindakan_lab'] = $hasil->id_tindakan_lab;
                $data['nama'] = $hasil->nama;
                $data['option_golongan'] =  $this->CTRL_Option_Golongan();
                $data['option_jenis'] =  $this->CTRL_Option_Jenis_Tindakan_lab();
                $data['option_satuan'] = $this->CTRL_Option_Satuan();
                $data['golongan'] = $hasil->golongan;
                $data['jenis'] = $hasil->jenis;
                $data['tarif'] = $hasil->tarif;
                $data['fee'] = $hasil->fee;
               
                
                
                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'tindakan_lab/CTRL_Edit/'.$id_tindakan_lab;
                $data['url_del'] = 'tindakan_lab/CTRL_Delete/'.$id_tindakan_lab;
                $data['url_tid'] = sprintf("%s%s/",site_url(),"tindakan_lab/CTRL_Select_OrderNumber");
                $data['page'] = 'Tindakan_lab/form_edit';
                $data['plugin'] = 'Tindakan_lab/plugin';
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
            
                $this->md_tindakan_lab->MDL_Delete($id);
                redirect('tindakan_lab');
            
        }
    }
    
     public function deleteConsumable($id,$id_tindakan_lab) {
         
         $res = $this->db->delete('tmst_tindakan_lab_penggunaan_bahan',array('id'=>$id));
               
         if($res){
             
          redirect('tindakan_lab/CTRL_Edit/'.$id_tindakan_lab);

         }else{
             
             print("
                     <script language=\"javascript\">
                     alert('gagal hapus');
                      window.history.back();
                     </script>
                     ");
         }
        
            
        
    }
    
    
    

    public function CTRL_Select_OrderNumber() {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        }  else {
            $result = $this->md_tindakan_lab->MDL_getMax_OrderNumber();
            if ($result){
                echo json_encode(array('success'=>true,'tid'=>$result));
            } else {
                echo json_encode(array('msg'=>'Some errors occured.'));
            }
        }
    }

    public function CTRL_Option_Golongan() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('GOLONGAN_LAB');
        $option[''] = 'Pilih Golongan';
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }
    
    public function CTRL_Option_Satuan() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('SATUAN');
        $option[''] = 'Pilih Satuan';
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }
    
    public function CTRL_Option_Jenis_Tindakan_lab() {
        $this->load->Model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('JENIS_TINDAKAN_LAB');
        
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }

        return $option;
    }

}
