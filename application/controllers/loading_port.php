<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Loading_port extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_loading_port');
        $this->tblName = $this->config->item('tmst_loading_port');
        $this->field = 'id';
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

            $data['results'] = $this->md_loading_port->MDL_Select();

            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s", $nm_title);
            $data['url_view'] = sprintf("%sloading_port/CTRL_View/", site_url());
            $data['page'] = 'loading_port/view';
            $data['plugin'] = 'loading_port/plugin';
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
                redirect('loading_port');
            } elseif ($this->input->post('btn_submit')) {
                $isDuplicated = $this->md_loading_port->MDL_isPermInsert($this->input->post('loading_port_code'));
                if ($isDuplicated==0) {
                    $this->md_loading_port->MDL_Insert();
                    redirect('loading_port');
                } else {
                    $data['id'] = $this->input->post('loading_port_code');
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

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);

                $data['url_cek_field'] = sprintf("%s%s/costcenter_code", site_url(), "loading_port/CTRL_CekField");
                $data['url'] = 'loading_port/CTRL_New';
                $data['page'] = 'loading_port/form';
                $data['plugin'] = 'loading_port/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($id = '') {
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
                redirect('loading_port');
            } elseif ($this->input->post('btn_submit')) {
                $id = $this->input->post('id');
                $this->md_loading_port->MDL_Update($id);
                redirect('loading_port');
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
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_loading_port->MDL_SelectID($id);
                $data['id'] = $hasil->id;
                $data['loading_port_code'] = $hasil->loading_port_code;
                $data['loading_port_name'] = $hasil->loading_port_name;

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);

                $data['url_cek_field'] = sprintf("%s%s/loading_port_code/%s", site_url(), "loading_port/CTRL_CekField", $hasil->loading_port_code);
                $data['url'] = 'loading_port/CTRL_Edit/' . $id;
                $data['url_del'] = 'loading_port/CTRL_Delete/' . $id;
                $data['page'] = 'loading_port/form_edit';
                $data['plugin'] = 'loading_port/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Delete($id = '') {
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
            $isexist = $this->md_loading_port->MDL_isPermDelete($id);
            if ($isexist==0) {
                $this->md_loading_port->MDL_Delete($id);
                redirect('loading_port');
            } else {
                $data['page'] = 'error_delete';
                $this->load->view('template_admin', $data);
            }
        }
    }
}
