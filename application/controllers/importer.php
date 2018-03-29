<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Importer extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_importer');
        $this->tblName = $this->config->item('tmst_importer');
        $this->field = 'importer_id';
    }

    public function index() {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('list')) {
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

            $data['results'] = $this->md_importer->MDL_Select();

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s", $nm_title);
            $data['url_view'] = sprintf("%simporter/CTRL_View/", site_url());
            $data['page'] = 'importer/view';
            $data['plugin'] = 'importer/plugin';
            $this->load->view('template_admin', $data);
        }
    }

    public function CTRL_New() {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('importer');
            } elseif ($this->input->post('btn_submit')) {
                $isDuplicated = $this->md_importer->MDL_isPermInsert($this->input->post('id'));
                if ($isDuplicated) {
                    $this->md_importer->MDL_Insert();
                    $importer_id = $this->input->post('id');
                    redirect('importer');
                } else {
                    $data['id'] = $this->input->post('importer_id');
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
                $this->breadcrumbs->add($nm_menu, base_url() . $url_menu);
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

                $data['id'] = $this->md_importer->MDL_getAutoID();

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);

                $data['url'] = 'importer/CTRL_New';
                $data['page'] = 'importer/form';
                $data['plugin'] = 'importer/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('importer');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_importer->MDL_Update($id);
                redirect('importer');
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
                $this->breadcrumbs->add($nm_menu, base_url() . $url_menu);
                $this->breadcrumbs->add('Update', current_url());
                //$this->breadcrumbs->add('Spring Tutorial', base_url().'tutorials/spring-tutorials');
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_importer->MDL_SelectID($id);
                $data['id'] = $hasil->importer_id;
                $data['importer_name'] = $hasil->importer_name;
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

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'importer/CTRL_Edit/' . $id;
                $data['url_del'] = 'importer/CTRL_Delete/' . $id;
                $data['page'] = 'importer/form_edit';
                $data['plugin'] = 'importer/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $id = $this->input->post('id');
            $isexist = $this->md_importer->MDL_isPermDelete($id);
            if ($isexist==0) {
                $this->md_importer->MDL_Delete($id);
                redirect('importer');
            } else {
                $data['page'] = 'error_delete';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_View($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('list')) {
            $data['action'] = 'list';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {

            $hasil = $this->md_importer->MDL_SelectID($id);
            $data['id'] = $hasil->importer_id;
            $data['importer_name'] = $hasil->importer_name;
            $data['pic'] = $hasil->pic;
            //$data['Area'] = $hasil->area;
            $data['email'] = $hasil->email;
            $data['phone'] = $hasil->phone;
            $data['fax'] = $hasil->fax;
            $data['address'] = $hasil->address;

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title_head'] = sprintf("%s", $nm_title);
            $data['title'] = sprintf("%s", $nm_title);

            $data['page'] = 'importer/form_view';
            $data['plugin'] = 'importer/plugin';
            $this->load->view('template_popupwindow', $data);
        }
    }

    public function CTRL_CekID() {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } else {
            $result = $this->md_importer->MDL_Ajax_CekID();
            echo json_encode($result);
        }
    }

    public function CTRL_Option_Province() {
        $this->load->model('md_province');
        $AryProvince = $this->md_province->MDL_Select();
        $option[''] = 'Choose Region...';
        foreach ($AryProvince as $row) {
            $option[$row->province_code] = $row->province_name;
        }
        return $option;
    }

    public function CTRL_Option_Province2($country) {
        $this->load->model('md_province');
        $AryProvince = $this->md_province->MDL_Select2($country);
        $option[''] = 'Choose Region...';
        foreach ($AryProvince as $row) {
            $option[$row->province_code] = $row->province_name;
        }
        return $option;
    }

    public function CTRL_Option_Country() {
        $this->load->model('md_country');
        $AryCountry = $this->md_country->MDL_Select();
        $option[''] = 'Choose Country...';
        foreach ($AryCountry as $row) {
            $option[$row->country_code] = $row->country_name;
        }
        return $option;
    }

    public function CTRL_Option_Type() {
        $this->load->model('md_ref_json');
        $AryTypeStatus = $this->md_ref_json->MDL_Select_MasterType('COMPANY_TYPE');
        $option[''] = 'Choose Entity Type...';
        foreach ($AryTypeStatus as $row) {
            $option[$row->id] = $row->name;
        }
        return $option;
    }

    public function cek_country_region() {
        $country_code = $this->input->post('country_code');
        $AryData = $this->md_importer->select_region_by_countryID($country_code);

        echo json_encode(array('result' => $AryData));
    }

    public function get_province($country_code) {
        $AryData = $this->md_importer->select_region($country_code);

        $option = array();
        foreach ($AryData as $row) {
            $option[$row->country_code] = $row->province_name;
        }
        //var_dump($option);die();
        echo json_encode(array('result' => $AryData));
        return $option;
    }

    
    public function CTRL_New_Importer() {
        $this->load->model('md_importer');
        $new_id = $this->md_importer->MDL_getAutoID();

        $result = $this->md_importer->MDL_Insert($new_id);

        $response = array(
            'success' => $result['success'],
            'importer_id' => $result['id']
        );

        echo json_encode($response);
    }

    public function CTRL_Get_Importer_Detail($id) {


        $detail_importer = $this->db->get_where('tmst_importer', array('importer_id' => $id))->row();

        $result = array(
            'id' => $id,
            'importer_name' => $detail_importer->importer_name,
            'type' => $detail_importer->type,
            'pic' => $detail_importer->pic,
            'npwp_address' => $detail_importer->npwp_address,
            'email' => $detail_importer->email,
            'phone' => $detail_importer->phone,
            'province' => $detail_importer->province,
            'fax' => $detail_importer->fax,
            'postcode' => $detail_importer->postcode,
            'address' => $detail_importer->address,
            'npwp' => $detail_importer->npwp,
        );

//print_r($result);die();
        echo json_encode($result);
    }

    public function CTRL_Edit_Importer_Detail($id) {
        $this->load->model('md_importer');
        $result = $this->md_importer->MDL_Update($id);

        $response = array(
            'success' => $result['success'],
            'id' => $id,
        );

        echo json_encode($response);
    }

}
