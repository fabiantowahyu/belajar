<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Supplier extends CI_Controller {
    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('Md_supplier');
        $this->tblName = $this->config->item('tmst_supplier');
        $this->field = 'supplier_id';
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

            $data['results'] = $this->Md_supplier->MDL_Select();
            
            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s",$nm_title);
            $data['url_view'] = sprintf("%sSupplier/CTRL_View/",site_url());
            $data['page'] = 'Supplier/view';
            $data['plugin'] = 'Supplier/plugin';
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
                redirect('Supplier');
            } elseif ($this->input->post('btn_submit')) {
                $isDuplicated = $this->Md_supplier->MDL_isPermInsert($this->input->post('id'));
                if($isDuplicated) {
                    $this->Md_supplier->MDL_Insert();
                    $supplier_id = $this->input->post('id');
                    redirect('Supplier/CTRL_Edit/'.$supplier_id);
                } else {
                    $data['id'] = $this->input->post('supplier_id');
                    $data['page'] = 'error_duplicated';
                    $this->load->view('template_admin', $data);
                }

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

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = '';
                $data['option_province'] = $AryProvince;

                $AryType = $this->CTRL_Option_Type();
                $data['type'] = '';
                $data['option_type'] = $AryType;

                $data['id'] = $this->Md_supplier->MDL_getAutoID();

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);

                $data['url'] = 'Supplier/CTRL_New';
                $data['page'] = 'Supplier/form';
                $data['plugin'] = 'Supplier/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id) {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('Supplier');
            } elseif ($this->input->post('btn_submit')) {
                $this->Md_supplier->MDL_Update($id);
                redirect('Supplier');
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
                //$this->breadcrumbs->add('Spring Tutorial', base_url().'tutorials/spring-tutorials');
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->Md_supplier->MDL_SelectID($id);
                $data['id'] = $hasil->supplier_id;
                $data['supplier_name'] = $hasil->supplier_name;
                $data['pic'] = $hasil->pic;
                $data['npwp_address'] = $hasil->npwp_address;
                $data['email'] = $hasil->email;
                $data['phone'] = $hasil->phone;
                $data['fax'] = $hasil->fax;
                $data['address'] = $hasil->address;
                $data['npwp'] = $hasil->npwp;
                $data['postal_code'] = $hasil->postcode; 

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = $hasil->province;
                $data['option_province'] = $AryProvince;

                $AryType = $this->CTRL_Option_Type();
                $data['type'] = $hasil->type;
                $data['option_type'] = $AryType;

                $data['results_pic'] = $this->Md_supplier->MDL_Select_PIC($id);
                $data['results_address'] = $this->Md_supplier->MDL_Select_Address($id);

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update",$nm_title);
                $data['title'] = sprintf("%s",$nm_title);
                $data['url'] = 'Supplier/CTRL_Edit/'.$id;
                $data['url_del'] = 'Supplier/CTRL_Delete/'.$id;
                $data['page'] = 'Supplier/form_edit';
                $data['plugin'] = 'Supplier/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete($id) {
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
            $id = $this->input->post('id');
            $isDeleted = $this->Md_supplier->MDL_isPermDelete($id);
            if($isDeleted) {
                $this->Md_supplier->MDL_Delete($id);
                redirect('Supplier');
            } else {
                $data['page'] = 'error_delete';
                $this->load->view('template_admin', $data);
            }
        }
    }

    //PIC
    public function CTRL_New_PIC($id) {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('Supplier/CTRL_Edit/'.$id);
            } elseif ($this->input->post('btn_submit')) {
                $this->Md_supplier->MDL_Insert_PIC();
                redirect('Supplier/CTRL_Edit/'.$id);
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
                $this->breadcrumbs->add('Update', base_url().$url_menu.'CTRL_Edit/'.$id);
                $this->breadcrumbs->add('PIC Add New', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $data['id'] = $id;
                $data['category'] = '';

                //Define Select Box
                $AryCategoryPIC = $this->CTRL_Option_CategoryPIC();
                $data['option_category'] = $AryCategoryPIC;

                $data['title_head'] = sprintf("PIC - Add New");

                $data['url'] = 'Supplier/CTRL_New_PIC/'.$id;
                $data['page'] = 'Supplier/form_pic';
                $data['plugin'] = 'Supplier/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit_PIC($pid, $id) {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->config->item('tmst_cust_pic'),'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('Supplier/CTRL_Edit/'.$pid);
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('id');
                $this->Md_supplier->MDL_Update_PIC($id);
                redirect('Supplier/CTRL_Edit/'.$pid);
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
                $this->breadcrumbs->add('Update', base_url().$url_menu.'CTRL_Edit/'.$pid);
                $this->breadcrumbs->add('PIC Update', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->Md_supplier->MDL_SelectIDPIC($pid,$id);

                $data['id'] = $hasil->id;
                $data['supplier_id'] = $hasil->supplier_id;
                $data['contact_name'] = $hasil->contact_name;
                $data['email'] = $hasil->email;
                $data['fax'] = $hasil->fax;
                $data['hp'] = $hasil->hp;
                $data['work_phone'] = $hasil->work_phone;
                $data['category'] = $hasil->category;

                //Define Select Box
                $AryCategoryPIC = $this->CTRL_Option_CategoryPIC();
                $data['option_category'] = $AryCategoryPIC;

                $data['title_head'] = sprintf("PIC - Update");

                $data['url'] = 'Supplier/CTRL_Edit_PIC/'.$hasil->supplier_id.'/'.$hasil->id;
                $data['url_del'] = 'Supplier/CTRL_Delete_PIC/'.$hasil->supplier_id.'/'.$hasil->id;
                $data['page'] = 'Supplier/form_edit_pic';
                $data['plugin'] = 'Supplier/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete_PIC($pid, $id) {
        //var_dump($id);die();
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->config->item('tmst_cust_pic'),'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {  
            //var_dump($id);die();
            $this->Md_supplier->MDL_Delete_PIC($id);
            redirect('Supplier/CTRL_Edit/'.$pid);
        }
    }

    //Address
    public function CTRL_Delete_Address($pid, $id) {
        //var_dump($id);die();
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->config->item('tmst_cust_address'),'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {  
            //var_dump($id);die();
            $this->Md_supplier->MDL_Delete_Address($id);
            redirect('Supplier/CTRL_Edit/'.$pid);
        }
    }

    public function CTRL_New_Address($id) {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('Supplier/CTRL_Edit/'.$id);
            } elseif ($this->input->post('btn_submit')) {
                $this->Md_supplier->MDL_Insert_Address();
                redirect('Supplier/CTRL_Edit/'.$id);
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
                $this->breadcrumbs->add('Update', base_url().$url_menu.'CTRL_Edit/'.$id);
                $this->breadcrumbs->add('Address Add New', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $data['id'] = $id;

                $hasilShipping = $this->Md_supplier->MDL_defaultShipping($id);
                $data['defaultShipping'] = (@$hasilShipping->def_shipping==1) ? "disabled" : "";

                $hasilBilling = $this->Md_supplier->MDL_defaultBilling($id);
                $data['defaultBilling'] = (@$hasilBilling->def_billing==1) ? "disabled" : "";

                $AryCountry = $this->CTRL_Option_Country();
				$data['country'] = strlen($this->input->post('country')) ? $this->input->post('country') : 'ID';
				$data['option_country'] = $AryCountry;
                
                $AryProvince = $this->CTRL_Option_Province2($data['country']);
				$data['province'] = count($this->input->post('province[]')) ? $this->input->post('province[]') : '';
				$data['option_province'] = $AryProvince;

                $data['title_head'] = sprintf("Address - Add New");

                $data['url'] = 'Supplier/CTRL_New_Address/'.$id;
                $data['url_cek_id'] = sprintf("%s%s/",site_url(),"Supplier/CTRL_CekID");
                $data['page'] = 'Supplier/form_address';
                $data['plugin'] = 'Supplier/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit_Address($pid, $id) {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->config->item('tmst_cust_address'),'id')) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('Supplier/CTRL_Edit/'.$pid);
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('id');
                $this->Md_supplier->MDL_Update_Address($id);
                redirect('Supplier/CTRL_Edit/'.$pid);
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
                $this->breadcrumbs->add('Update', base_url().$url_menu.'CTRL_Edit/'.$pid);
                $this->breadcrumbs->add('Address Update', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->Md_supplier->MDL_SelectIDAddress($pid,$id);
                
                $data['id'] = $hasil->id;
                $data['supplier_id'] = $hasil->supplier_id;
                $data['def_shipping'] = $hasil->def_shipping;
                $data['def_billing'] = $hasil->def_billing;
                $data['label'] = $hasil->label;
                $data['attention'] = $hasil->attention;
                $data['phone'] = $hasil->phone;
                $data['city'] = $hasil->city;
                $data['post_code'] = $hasil->post_code;
                $data['address'] = $hasil->address;

                $hasilShipping = $this->Md_supplier->MDL_defaultShipping($pid);
                $data['defaultShipping'] = (@$hasilShipping->def_shipping==1 && (@$hasilShipping->id != $hasil->id)) ? "disabled" : "";

                $hasilBilling = $this->Md_supplier->MDL_defaultBilling($pid);
                $data['defaultBilling'] = (@$hasilBilling->def_billing==1 && (@$hasilBilling->id != $hasil->id)) ? "disabled" : "";

                //Define Select Box
                $AryCategoryPIC = $this->CTRL_Option_CategoryPIC();
                $data['option_category'] = $AryCategoryPIC;
                
                $AryCountry = $this->CTRL_Option_Country();
				$data['country'] = strlen($this->input->post('country')) ? $this->input->post('country') : $hasil->country;
				$data['option_country'] = $AryCountry;
                
                $AryProvince = $this->CTRL_Option_Province2($data['country']);
				$data['province'] = count($this->input->post('province[]')) ? $this->input->post('province[]') : $hasil->province;
				$data['option_province'] = $AryProvince;
                
                $data['title_head'] = sprintf("Address - Update");

                $data['url'] = 'Supplier/CTRL_Edit_Address/'.$hasil->supplier_id.'/'.$hasil->id;
                $data['url_del'] = 'Supplier/CTRL_Delete_Address/'.$hasil->supplier_id.'/'.$hasil->id;
                $data['page'] = 'Supplier/form_edit_address';
                $data['plugin'] = 'Supplier/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_View($id) {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif(!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif(!$this->auth->Auth_isRecID($id,$this->tblName,$this->field)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {

            $hasil = $this->Md_supplier->MDL_SelectID($id);
            $data['id'] = $hasil->supplier_id;
            $data['supplier_name'] = $hasil->supplier_name;
            $data['pic'] = $hasil->pic;
            //$data['Area'] = $hasil->area;
            $data['email'] = $hasil->email;
            $data['phone'] = $hasil->phone;
            $data['fax'] = $hasil->fax;
            $data['address'] = $hasil->address;

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title_head'] = sprintf("%s",$nm_title);
            $data['title'] = sprintf("%s",$nm_title);

            $data['page'] = 'Supplier/form_view';
            $data['plugin'] = 'Supplier/plugin';
            $this->load->view('template_popupwindow', $data);
        }
    }

    public function CTRL_CekID() {
        if(!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } else {
            $result = $this->Md_supplier->MDL_Ajax_CekID();
            echo json_encode($result);
        }
    }

    public function CTRL_Option_Province() {
        $this->load->model('md_province');
        $AryProvince = $this->md_province->MDL_Select();
        $option[''] = 'Choose Region...';
        foreach($AryProvince as $row) {
            $option[$row->province_code] = $row->province_name;
        }
        return $option;
    }
    
    public function CTRL_Option_Province2($country) {
        $this->load->model('md_province');
        $AryProvince = $this->md_province->MDL_Select2($country);
        $option[''] = 'Choose Region...';
        foreach($AryProvince as $row) {
            $option[$row->province_code] = $row->province_name;
        }
        return $option;
    }

    public function CTRL_Option_Country() {
        $this->load->model('md_country');
        $AryCountry = $this->md_country->MDL_Select();
        $option[''] = 'Choose Country...';
        foreach($AryCountry as $row) {
            $option[$row->country_code] = $row->country_name;
        }
        return $option;
    }

    public function CTRL_Option_Type() {
        $this->load->model('md_ref_json');
        $AryTypeStatus = $this->md_ref_json->MDL_Select_MasterType('COMPANY_TYPE');
        $option[''] = 'Choose Entity Type...';
        foreach($AryTypeStatus as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function CTRL_Option_CategoryPIC() {
        $this->load->model('md_ref_json');
        $AryCompany = $this->md_ref_json->MDL_Select_MasterType('CATEGORY_PIC');
        $option[''] = 'Choose a Category...';
        foreach($AryCompany as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }
    
    public function cek_country_region() {
        $country_code = $this->input->post('country_code');
        $AryData = $this->Md_supplier->select_region_by_countryID($country_code);

        echo json_encode(array('result'=>$AryData));
    }
    
    public function get_province($country_code){
        $AryData = $this->Md_supplier->select_region($country_code);

        $option = array();
        foreach($AryData as $row) {
            $option[$row->country_code] = $row->province_name;
        }
        //var_dump($option);die();
        echo json_encode(array('result'=>$AryData));
        return $option; 
    }
    
}
