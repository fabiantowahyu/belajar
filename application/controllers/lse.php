<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lse extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
        parent::__construct();
        $this->load->model('md_lse');
        $this->load->model('Md_lse_approval');
        $this->load->model('md_template_email');

        $this->tblName = $this->config->item('ttrs_lse');
        $this->tblNamehs = $this->config->item('ttrs_lse_survres_hs');
        $this->tblNameroy = $this->config->item('ttrs_lse_survres_royalty');
        $this->tblNamecal = $this->config->item('ttrs_lse_survres_cal');
        $this->field = 'id';
        $this->field_no_lse = 'no_lse';
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

            $req_startdate = $this->input->post('req_startdate');
            $req_startdate = strlen($req_startdate) ? $req_startdate : date("Y-m-01");
            $req_enddate = $this->input->post('req_enddate');
            $req_enddate = strlen($req_enddate) ? $req_enddate : date("Y-m-t");

            $data['req_startdate'] = $req_startdate;
            $data['req_enddate'] = $req_enddate;

            $data['results'] = $this->md_lse->MDL_Select($req_startdate, $req_enddate);


            $nm_title = $this->auth->Auth_getNameMenu();
            $data['title'] = sprintf("%s", $nm_title);
            $data['url_view'] = sprintf("%lse/CTRL_View/", site_url());
            $data['page'] = 'lse/view';
            $data['plugin'] = 'lse/plugin';
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
                $isDuplicated = $this->md_lse->MDL_isPermInsert($this->input->post('no_lse'));
                $id = $data['id'] = $this->md_lse->MDL_getAutoID();
                if ($isDuplicated) {
                    $this->md_lse->MDL_Insert();
                    redirect('lse/CTRL_Edit/' . $this->input->post('no_lse') . '/' . $this->input->post('id') . '#FormC');
                } else {
                    $data['no_lse'] = $this->input->post('no_lse');
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

                /* DATA FORM */
                $data['datenow'] = date("Y-m-d");
                $data['id'] = $this->md_lse->MDL_getAutoID();
                $data['no_lse'] = $this->md_lse->MDL_getAutoID2();
                /* END DATA FORM */

                /* DATA OPTION FORM */
                $AryBranch = $this->CTRL_Option_Branch();
                $data['branch'] = "";
                $data['option_branch'] = $AryBranch;

                $AryCountry = $this->CTRL_Option_Country();
                $data['country'] = "";
                $data['option_country'] = $AryCountry;

                $AryPort = $this->CTRL_Option_Port();
                $data['port'] = "";
                $data['option_port'] = $AryPort;

                // 1 agustus 2017 10:17
                $AryExporter = $this->CTRL_Option_Exporter();
                $data['exporter'] = "";
                $data['option_exporter'] = $AryExporter;

                // 1 agustus 2017 11:16
                $AryImporter = $this->CTRL_Option_Importer();
                $data['importer'] = "";
                $data['option_importer'] = $AryImporter;
                /* END OPTION FORM */

                $AryType = $this->CTRL_Option_Type();
                $data['type'] = '';
                $data['option_type'] = $AryType;

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = '';
                $data['option_province'] = $AryProvince;


                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add New", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);

                $data['url_cek_field'] = sprintf("%s%s/costcenter_code", site_url(), "lse/CTRL_CekField");
                $data['url'] = 'lse/CTRL_New';
                $data['page'] = 'lse/form';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_Edit($no_lse, $id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($no_lse, $this->tblName, $this->field_no_lse)) {
            $data['no_lse'] = $no_lse;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                redirect('lse');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_lse->MDL_Update($no_lse);
                redirect('lse/CTRL_Edit/' . $no_lse . '/' . $id);
            } elseif ($this->input->post('btn_submit2')) {
                $this->md_lse->MDL_Update($no_lse);
                redirect('lse/CTRL_Edit/' . $no_lse . '/' . $id . '/#FormC');
            } else if ($this->input->post('btn_upload')) {
                $this->md_lse->MDL_Upload_Document($no_lse, $id);
                redirect('lse/CTRL_Edit/' . $no_lse . '/' . $id . '/#FormDocument');
            } elseif ($this->input->post('btn_inatrade')) {


                $this->CTRL_SendXML();
                echo 'Send to Inatrade';
                die();

                redirect('Lse_approval');
            } elseif ($this->input->post('btn_aggrement')) {
                $this->Md_lse_approval->MDL_ApproveAggrement($no_lse);
                $this->Md_lse_approval->MDL_InsertAggrement($no_lse);
                redirect('lse/CTRL_Edit/' . $no_lse . '/' . $id . '/#FormCertificate');
            } elseif ($this->input->post('btn_send_approve')) {
                $res = $this->md_lse->MDL_Approval_LSE($no_lse);
                if ($res) {
                    $this->CTRL_SendEmail($no_lse);
                }
                redirect('lse');
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

                $hasil = $this->md_lse->MDL_SelectID($no_lse);
                $data['id'] = $hasil->id;
                $data['no_lse'] = $hasil->no_lse;
                $data['date_issued'] = $hasil->date_issued;
                $data['date_expired'] = $hasil->date_expired;
                $data['no_reg_exporter'] = $hasil->no_reg_exporter;
                $data['date_reg_exporter'] = $hasil->date_reg_exporter;
                $data['no_wo'] = $hasil->no_wo;
                $data['npwp_no'] = $hasil->exporter_npwp;
                $data['date_wo'] = $hasil->date_wo;
                $data['importer_name'] = $hasil->importer_name;
                $data['survey_location_date'] = $hasil->survey_location_date;
                $data['survey_location'] = $hasil->survey_location;
                $data['no_packing_list'] = $hasil->no_packing_list;
                $data['date_packing_list'] = $hasil->date_packing_list;
                $data['no_invoice_packing_list'] = $hasil->no_invoice_packing_list;
                $data['date_invoice_packing_list'] = $hasil->date_invoice_packing_list;
                $data['export_value'] = number_format($hasil->total_fas, 2);
                $data['port_destination'] = $hasil->port_destination;
                $data['vessel_name'] = $hasil->vessel_name;
                $data['stdate_load_vessel'] = $hasil->stdate_load_vessel;
                $data['enddate_load_vessel'] = $hasil->enddate_load_vessel;
                $data['no_mining_license'] = $hasil->no_mining_license;
                $data['date_mining_license'] = $hasil->date_mining_license;
                $data['no_transsell_license'] = $hasil->no_transsell_license;
                if ($hasil->date_transsell_license == "0000-00-00") {
                    $data['date_transsell_license'] = '';
                } else {
                    $data['date_transsell_license'] = $hasil->date_transsell_license;
                }
                $data['no_smelter_license'] = $hasil->no_smelter_license;
                if ($hasil->date_smelter_license == "0000-00-00") {
                    $data['date_smelter_license'] = '';
                } else {
                    $data['date_smelter_license'] = $hasil->date_smelter_license;
                }
                $data['no_royalty_payment'] = $hasil->no_royalty_payment;
                if ($hasil->date_royalty_payment == "0000-00-00") {
                    $data['date_royalty_payment'] = '';
                } else {
                    $data['date_royalty_payment'] = $hasil->date_royalty_payment;
                }

                //7 agustus 2017 10:36
                $data['last_status'] = $hasil->laststatus_lse;
                $data['mode_transport'] = $hasil->mode_transport;
                $data['cargo_type'] = $hasil->cargo_type;
                $data['container_numseal'] = $hasil->container_numseal;
                $data['note'] = $hasil->note;
                $data['requester'] = $hasil->userid;

                //7 agustus 2017 3:34
                $data['no_lc'] = $hasil->no_lc;
                $data['date_lc'] = $hasil->date_lc;
                $data['lc_type'] = $hasil->lc_type;
                $data['file_pveb'] = $hasil->file_pveb;
                $data['file_ssbp'] = $hasil->file_ssbp;
                $data['file_packing_list'] = $hasil->file_pck_list;
                $data['file_commercial_invoice'] = $hasil->file_inv;
                $data['file_surat_blending'] = $hasil->file_blending;
                $data['file_spplc'] = $hasil->file_spplc;
                $data['file_copylc'] = $hasil->file_copylc;
                $data['no_pveb'] = $hasil->no_pveb;
                $data['date_pveb'] = $hasil->date_pveb;


                /* DATA OPTION FORM */
                $AryBranch = $this->CTRL_Option_Branch();
                $data['branch'] = $hasil->id_branch;
                $data['branch_name'] = $hasil->branch;
                $data['option_branch'] = $AryBranch;

                $AryAggrement = $this->CTRL_Option_Client();
                $data['aggrement'] = "";
                $data['option_aggrement'] = $AryAggrement;

                $AryCountry = $this->CTRL_Option_Country();
                $data['country'] = $hasil->country_code;
                $data['option_country'] = $AryCountry;

                $AryPort = $this->CTRL_Option_Port();
                $data['port'] = $hasil->loading_port_code;
                $data['option_port'] = $AryPort;

                $AryAggrement = $this->CTRL_Option_Client();
                $data['aggrement'] = "";
                $data['option_aggrement'] = $AryAggrement;

                // 1 agustus 2017 10:17
                $AryExporter = $this->CTRL_Option_Exporter();
                $data['exporter'] = $hasil->client_id;
                $data['option_exporter'] = $AryExporter;
                $data['client_name'] = $hasil->client_name;
                $data['exporter_address'] = $hasil->exporter_address;

                // 1 agustus 2017 11:16
                $AryImporter = $this->CTRL_Option_Importer();
                $data['importer'] = $hasil->importer_id;
                $data['option_importer'] = $AryImporter;
                $data['importer_address'] = $hasil->importer_address;


                // 4 agustus 2017 08:54
                $AryTransport = $this->CTRL_Option_Transport();
                $data['transport'] = $hasil->mode_transport;
                $data['option_transport'] = $AryTransport;

                // 4 agustus 2017 08:54
                $AryCargo = $this->CTRL_Option_Cargo();
                $data['cargo'] = $hasil->cargo_type;
                $data['option_cargo'] = $AryCargo;

                $AryType = $this->CTRL_Option_Type();
                $data['type'] = '';
                $data['option_type'] = $AryType;

                $AryProvince = $this->CTRL_Option_Province();
                $data['province'] = '';
                $data['option_province'] = $AryProvince;


                /* END OPTION FORM */


                $AryDocument = $this->CTRL_Option_Document();
                $data['option_document'] = $AryDocument;

                $data['results2'] = $this->md_lse->MDL_SelectSR1($no_lse);
                $data['results2a'] = $this->md_lse->MDL_SelectTSR1($no_lse);
                $data['results3'] = $this->md_lse->MDL_SelectSR2($no_lse);
                $data['results3a'] = $this->md_lse->MDL_SelectTSR2($no_lse);
                $data['results4'] = $this->md_lse->MDL_SelectSR3($no_lse);

                //TAB 4
                $data['history'] = $this->md_lse->MDL_SelectHistory($hasil->no_lse);

                //CERTIFICATE
                $data['table1'] = $this->md_lse->MDL_SelectDetailHS($no_lse);
                $data['table2'] = $this->md_lse->MDL_SelectDetailRoyalty($no_lse);
                $data['table3'] = $this->md_lse->MDL_SelectDetailCal($no_lse);

                $SumAmount = $this->md_lse->MDL_GetSum($hasil->id);
                if ($SumAmount) {
                    $data['SumAmount'] = $SumAmount->SumFas;
                } else {
                    $data['SumAmount'] = "0";
                }

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Update", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'lse/CTRL_Edit/' . $no_lse . '/' . $id;
                $data['url_del'] = 'lse/CTRL_Delete/' . $no_lse . '/' . $id;
                $data['page'] = 'lse/form_edit';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_admin', $data);
            }
        }
    }

    public function CTRL_New_SR1($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field_no_lse)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                print("
                     <script language=\"javascript\">
                     self.close();
                     </script>
                     ");
                //redirect('lse/CTRL_Edit/' . $id . '/#FormC');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_lse->MDL_New_SR1($id);
                print("
                     <script language=\"javascript\">
                     window.opener.location.reload();
                     self.close();
                     </script>
                     ");
                //redirect('lse/CTRL_Edit/' . $id . '/#FormC');
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
                $this->breadcrumbs->add('Add SR 1', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $data['results2a'] = $this->md_lse->MDL_SelectTSR1($id);

                $hasil = $this->md_lse->MDL_SelectID($id);
                $data['no_lse'] = $hasil->no_lse;
                $data['no_mining_license'] = $hasil->no_mining_license;
                $data['id'] = $hasil->id;


                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'lse/CTRL_New_SR1/' . $id;
                $data['page'] = 'lse/form_sr1';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_popupwindow', $data);
            }
        }
    }

    public function CTRL_Edit_SR1($id_hs, $no_lse) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id_hs, $this->tblNamehs, $this->field)) {
            $data['id'] = $id_hs;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $hasil = $this->md_lse->MDL_SelectID_SR1($id_hs);
            $data['id_hs'] = $hasil->id_hs;
            $data['no_lse'] = $hasil->no_lse;
            if ($this->input->post('close')) {
                print("
                     <script language=\"javascript\">
                     self.close();
                     </script>
                     ");
                //redirect('lse/CTRL_Edit/' . $hasil->no_lse . '/#FormC');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_lse->MDL_Edit_SR1($id_hs, $no_lse);

                print("
                     <script language=\"javascript\">
                     window.opener.location.reload();
                     self.close();
                     </script>
                     ");
                //redirect('lse/CTRL_Edit/' . $hasil->no_lse . '/#FormC');
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
                $this->breadcrumbs->add('Edit SR 1', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $data['results2a'] = $this->md_lse->MDL_SelectTSR1($id_hs);

                $hasil = $this->md_lse->MDL_SelectID_SR1($id_hs);
                $data['no_lse'] = $hasil->no_lse;
                $data['no_mining_license'] = $hasil->no_mining_license;
                $data['id_hs'] = $hasil->id_hs;
                $data['hs'] = $hasil->hs;
                $data['description'] = $hasil->description;
                $data['quantity'] = $hasil->quantity;
                $data['fas'] = $hasil->fas;
                $data['no_mining_license'] = $hasil->no_mining_license;

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Edit", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'lse/CTRL_Edit_SR1/' . $id_hs . '/' . $no_lse;
                $data['url_del'] = 'lse/CTRL_Delete_SR1/' . $id_hs . '/' . $no_lse;
                $data['page'] = 'lse/form_edit_sr1';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_popupwindow', $data);
            }
        }
    }

    public function CTRL_New_SR2($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field_no_lse)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                print("
                       <script language=\"javascript\">
                       self.close();
                       </script>
                       ");
                //redirect('lse/CTRL_Edit/' . $id . '/#FormC');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_lse->MDL_New_SR2($id);
                print("
                       <script language=\"javascript\">
                       window.opener.location.reload();
                       self.close();
                       </script>
                       ");
                //redirect('lse/CTRL_Edit/' . $id . '/#FormC');
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
                $this->breadcrumbs->add('Add SR 2', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_lse->MDL_SelectID($id);
                $data['no_lse'] = $hasil->no_lse;
                $data['id'] = $hasil->id;

                // 1 agustus 2017 10:17
                $AryExporter = $this->CTRL_Option_Exporter();
                $data['exporter'] = "";
                $data['option_exporter'] = $AryExporter;


                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'lse/CTRL_New_SR2/' . $id;
                $data['page'] = 'lse/form_sr2';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_popupwindow', $data);
            }
        }
    }

    public function CTRL_Edit_SR2($id_roy, $no_lse) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id_roy, $this->tblNameroy, $this->field)) {
            $data['id'] = $id_roy;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $hasil = $this->md_lse->MDL_SelectID_SR2($id_roy);
            $data['id_roy'] = $hasil->id_roy;
            $data['id_lse'] = $hasil->id_lse;
            if ($this->input->post('close')) {
                print("
                       <script language=\"javascript\">
                       self.close();
                       </script>
                       ");
                //redirect('lse/CTRL_Edit/' . $hasil->no_lse . '/#FormC');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_lse->MDL_Edit_SR2($id_roy, $no_lse);
                print("
                     <script language=\"javascript\">
                     window.opener.location.reload();
                     self.close();
                     </script>
                     ");

                //redirect('lse/CTRL_Edit/' . $hasil->no_lse . '/#FormC');
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
                $this->breadcrumbs->add('Edit SR 2', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_lse->MDL_SelectID_SR2($id_roy);
                $data['no_lse'] = $hasil->no_lse;
                $data['royalty_dp'] = $hasil->royalty_dp;

                $AryExporter = $this->CTRL_Option_Exporter();
                $data['exporter'] = $hasil->client_id;
                $data['option_exporter'] = $AryExporter;
                $data['client_name'] = $hasil->client_name;
                $data['exporter_address'] = $hasil->exporter_address;
                // 1 agustus 2017 10:17


                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Edit", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'lse/CTRL_Edit_SR2/' . $id_roy . '/' . $no_lse;
                $data['url_del'] = 'lse/CTRL_Delete_SR2/' . $id_roy . '/' . $no_lse;
                $data['page'] = 'lse/form_edit_sr2';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_popupwindow', $data);
            }
        }
    }

    public function CTRL_New_SR3($id) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('add')) {
            $data['action'] = 'add';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field_no_lse)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            if ($this->input->post('close')) {
                print("
                           <script language=\"javascript\">
                           self.close();
                           </script>
                           ");
                //redirect('lse/CTRL_Edit/' . $id . '/#FormC');
            } elseif ($this->input->post('btn_submit')) {
                $this->md_lse->MDL_New_SR3($id);
                print("
                           <script language=\"javascript\">
                           window.opener.location.reload();
                           self.close();
                           </script>
                           ");
                //redirect('lse/CTRL_Edit/' . $id . '/#FormC');
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
                $this->breadcrumbs->add('Add SR 3', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_lse->MDL_SelectID($id);
                $data['no_lse'] = $hasil->no_lse;
                $data['id'] = $hasil->id;


                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Add", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'lse/CTRL_New_SR3/' . $id;
                $data['page'] = 'lse/form_sr3';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_popupwindow', $data);
            }
        }
    }

    public function CTRL_Edit_SR3($id_cal, $no_lse) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('edit')) {
            $data['action'] = 'edit';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id_cal, $this->tblNamecal, $this->field)) {
            $data['id'] = $id_cal;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $hasil = $this->md_lse->MDL_SelectID_SR3($id_cal);
            $data['id_cal'] = $hasil->id_cal;
            $data['no_lse'] = $hasil->no_lse;
            if ($this->input->post('close')) {
                //redirect('lse/CTRL_Edit/' . $hasil->no_lse . '/#FormC');
                print("
                           <script language=\"javascript\">
                           self.close();
                           </script>
                           ");
            } elseif ($this->input->post('btn_submit')) {
                $this->md_lse->MDL_Edit_SR3($id_cal, $no_lse);
                print("
                           <script language=\"javascript\">
                           window.opener.location.reload();
                           self.close();
                           </script>
                           ");
                //redirect('lse/CTRL_Edit/' . $hasil->no_lse . '/#FormC');
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
                $this->breadcrumbs->add('Edit SR 3', current_url());
                $breadcrum = $this->breadcrumbs->output();
                $data['breadcrum'] = $breadcrum;
                /* end */

                $hasil = $this->md_lse->MDL_SelectID_SR3($id_cal);
                $data['no_lse'] = $hasil->no_lse;
                $data['cal_arb'] = $hasil->cal_arb;
                $data['cal_adb'] = $hasil->cal_adb;
                $data['tm_arb'] = $hasil->tm_arb;
                $data['t_ash_adb'] = $hasil->t_ash_adb;
                $data['t_sulfur_adb'] = $hasil->t_sulfur_adb;
                $data['klasifikasi_batubara'] = $hasil->klasifikasi_batubara;
                $data['ket'] = $hasil->ket;

                $nm_title = $this->auth->Auth_getNameMenu();
                $data['title_head'] = sprintf("%s - Edit", $nm_title);
                $data['title'] = sprintf("%s", $nm_title);
                $data['url'] = 'lse/CTRL_Edit_SR3/' . $id_cal . '/' . $no_lse;
                $data['url_del'] = 'lse/CTRL_Delete_SR3/' . $id_cal . '/' . $no_lse;
                $data['page'] = 'lse/form_edit_sr3';
                $data['plugin'] = 'lse/plugin';
                $this->load->view('template_popupwindow', $data);
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
        } elseif (!$this->auth->Auth_isRecID($id, $this->tblName, $this->field_no_lse)) {
            $data['id'] = $id;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $id = $this->input->post('id');
            $this->md_lse->MDL_Delete($id);
            redirect('lse');
        }
    }

    public function CTRL_Delete_SR1($id_hs, $no_lse) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id_hs, $this->tblNamehs, $this->field)) {
            $data['no_lse'] = $no_lse;
            $data['id_hs'] = $id_hs;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $id = $this->input->post('id');
            $this->md_lse->MDL_Delete_SR1($id);
            print("
                           <script language=\"javascript\">
                           window.opener.location.reload();
                           self.close();
                           </script>
                           ");
            //redirect('lse/CTRL_Edit/' . $no_lse . '/#FormC');
        }
    }

    public function CTRL_Print($no_lse, $id_lse) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } else {
            $hasil = $this->md_lse->MDL_SelectID($no_lse);
            $table1 = $this->md_lse->MDL_SelectDetailHS($no_lse);
            $table2 = $this->md_lse->MDL_SelectDetailRoyalty($no_lse);
            $table3 = $this->md_lse->MDL_SelectDetailCal($no_lse);

            $template_id = $this->config->item('template_LSE');

            $template = $this->md_template_email->MDL_SelectID($template_id);
            $content = $template->content;

            $content = str_replace('{BRANCH_ISSUING}', $hasil->branch, $content);
            $content = str_replace('{LS_NO}', $hasil->no_lse, $content);
            $content = str_replace('{LS_DATE}', date("d M Y", strtotime($hasil->date_issued)), $content);
            $content = str_replace('{EXPIRES_DATE}', date("d M Y", strtotime($hasil->date_expired)), $content);
            $content = str_replace('{PPBE_NO}', $hasil->no_wo, $content);
            $content = str_replace('{PPBE_DATE}', date("d M Y", strtotime($hasil->date_wo)), $content);
            $content = str_replace('{SURVEY_LOCATION}', $hasil->survey_location, $content);
            $content = str_replace('{VERIFIED_DATE}', date("d M Y", strtotime($hasil->survey_location_date)), $content);
            $content = str_replace('{PACKING_NO}', $hasil->no_packing_list, $content);
            $content = str_replace('{PACKING_DATE}', date("d M Y", strtotime($hasil->date_packing_list)), $content);
            $content = str_replace('{INVOICE_NO}', $hasil->no_invoice_packing_list, $content);
            $content = str_replace('{INVOICE_DATE}', date("d M Y", strtotime($hasil->date_invoice_packing_list)), $content);
            $content = str_replace('{VALUTA}', "USD", $content);
            $content = str_replace('{IUP_NO}', $hasil->no_mining_license, $content);
            $content = str_replace('{IUP_DATE}', date("d M Y", strtotime($hasil->date_mining_license)), $content);
            $content = str_replace('{ET_NO}', $hasil->no_reg_exporter, $content);
            $content = str_replace('{ET_DATE}', date("d M Y", strtotime($hasil->date_reg_exporter)), $content);
            $content = str_replace('{NPWP_NO}', $hasil->exporter_npwp, $content);
            $content = str_replace('{EXPORTER_NAME}', $hasil->client_name, $content);
            $content = str_replace('{EXPORTER_ADDRESS}', $hasil->exporter_address, $content);
            $content = str_replace('{IMPORTER_NAME}', $hasil->importer_name, $content);
            $content = str_replace('{IMPORTER_ADDRESS}', $hasil->importer_address, $content);
            $content = str_replace('{PORT_LOADING}', $hasil->loading_port_name, $content);
            $content = str_replace('{PORT_DATE}', date("d M Y", strtotime($hasil->stdate_load_vessel)), $content);
            $content = str_replace('{PORT_DESTINATION}', $hasil->port_destination, $content);
            $content = str_replace('{VESSEL_NAME}', $hasil->vessel_name, $content);
            $content = str_replace('{ROYALTY_NO}', $hasil->no_royalty_payment, $content);
            $content = str_replace('{ROYALTY_DATE}', date("d M Y", strtotime($hasil->date_royalty_payment)), $content);
            $content = str_replace('{SHIPPING_DATE}', date("d M Y", strtotime($hasil->stdate_load_vessel)), $content);
            $content = str_replace('{SHIPPING_DATE_END}', date("d M Y", strtotime($hasil->enddate_load_vessel)), $content);
            $content = str_replace('{MODE_TRANSPORT}', $hasil->mode_transport, $content);
            $content = str_replace('{CARGO_TYPE}', $hasil->cargo_type, $content);
            $content = str_replace('{SURVEY_NOTES}', $hasil->note, $content);

            //$content = str_replace('{SIGNATURE}', $hasil->note, $content);

            $item_table1 = '<table border="1" cellpadding="2">';
            $item_table1 .= '<tr>';
            $item_table1 .= '<th align="center"><font face="Arial"><b>NO</b></font></th>';
            $item_table1 .= '<th align="center"><font face="Arial"><b>HS</b></font></th>';
            $item_table1 .= '<th align="center"><font face="Arial"><b>DESCRIPTION</b></font></th>';
            $item_table1 .= '<th align="center"><font face="Arial"><b>QUANTITY(TNE)</font></b></th>';
            $item_table1 .= '<th align="center"><font face="Arial"><b>FAS(USD) PRICE</font></b></th>';
            $item_table1 .= '<th align="center"><font face="Arial"><b>NO MINING LICENSE</font></b></th>';
            $item_table1 .= '</tr>';

            $SumQty = 0;
            $SumFAS = 0;
            foreach ($table1 as $key => $row) {
                $no = $key + 1;
                $item_table1 .= '<tr>';
                $item_table1 .= '<td>' . $no . '</td>';
                $item_table1 .= '<td>' . $row->hs . '</td>';
                $item_table1 .= '<td>' . $row->description . '</td>';
                $item_table1 .= '<td>' . number_format($row->quantity, 3, ",", ".") . ' MT</td>';
                $item_table1 .= '<td>' . number_format($row->fas, 2, ",", ".") . '</td>';
                $item_table1 .= '<td>' . $row->no_mining_license . '</td>';
                $item_table1 .= '</tr>';

                $SumQty = $SumQty + $row->quantity;
                $SumFAS = $SumFAS + $row->fas;
            }
            $item_table1 .= '<tr>';
            $item_table1 .= '<td align="center" colspan="3"><b>TOTAL</b></td>';
            $item_table1 .= '<td><font face="Arial"><b>' . number_format($SumQty, 3, ",", ".") . ' MT</b></font></td>';
            $item_table1 .= '<td><font face="Arial"><b>' . number_format($SumFAS, 2, ",", ".") . '</font></b></td>';
            $item_table1 .= '<td colspan="2"></td>';
            $item_table1 .= '</tr>';
            $item_table1 .= "</table>";
            $item_table1 .= "<br/><br/>";


            $content = str_replace('{AMOUNT}', number_format($SumFAS, 2, ",", "."), $content);
            $content = str_replace('{CONTENT1}', $item_table1, $content);

            $item_table2 = '<table border="1" cellpadding="2">';
            $item_table2 .= '<tr>';
            $item_table2 .= '<th align="center"><font face="Arial"><b>NO</b></font></th>';
            $item_table2 .= '<th align="center"><font face="Arial"><b>NAMA PERUSAHAAN ASAL BARANG</b></font></th>';
            $item_table2 .= '<th align="center"><font face="Arial"><b>NPWP</b></font></th>';
            $item_table2 .= '<th align="center"><font face="Arial"><b>PROPINSI ASAL BARANG</font></b></th>';
            $item_table2 .= '<th align="center"><font face="Arial"><b>ROYALTI DP</font></b></th>';
            $item_table2 .= '</tr>';

            $SumRoyalty = 0;
            foreach ($table2 as $key2 => $row2) {
                $no2 = $key2 + 1;
                $item_table2 .= '<tr>';
                $item_table2 .= '<td>' . $no2 . '</td>';
                $item_table2 .= '<td>' . $row2->company_name . '</td>';
                $item_table2 .= '<td>' . $row2->npwp . '</td>';
                $item_table2 .= '<td>' . $row2->province_name . '</td>';
                $item_table2 .= '<td>' . number_format($row2->royalty_dp, 2, ",", ".") . '</td>';
                $item_table2 .= '</tr>';

                $SumRoyalty = $SumRoyalty + $row2->royalty_dp;
            }
            $item_table2 .= '<tr>';
            $item_table2 .= '<td align="center" colspan="4"></td>';
            $item_table2 .= '<td><font face="Arial"><b>' . number_format($SumRoyalty, 2, ",", ".") . '</font></b></td>';
            $item_table2 .= '</tr>';
            $item_table2 .= "</table>";
            $item_table2 .= "<br/><br/>";

            $content = str_replace('{CONTENT2}', $item_table2, $content);

            $item_table3 = '<table border="1" cellpadding="2">';
            $item_table3 .= '<tr>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>NO</b></font></th>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>Cal.(KKal/Kg-arb)</b></font></th>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>Cal.(KKal/Kg-adb)</b></font></th>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>TM(%-arb)</font></b></th>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>T.Ash(%-adb)</font></b></th>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>T.Sulfur(%-adb)</b></font></th>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>Klarifikasi <br/> Batubara(adb)</font></b></th>';
            $item_table3 .= '<th align="center"><font face="Arial"><b>Ket</font></b></th>';
            $item_table3 .= '</tr>';

            foreach ($table3 as $key3 => $row3) {
                $no3 = $key3 + 1;
                $item_table3 .= '<tr>';
                $item_table3 .= '<td>' . $no3 . '</td>';
                $item_table3 .= '<td>' . $row3->cal_arb . '</td>';
                $item_table3 .= '<td>' . $row3->cal_adb . '</td>';
                $item_table3 .= '<td>' . $row3->tm_arb . '</td>';
                $item_table3 .= '<td>' . $row3->t_ash_adb . '</td>';
                $item_table3 .= '<td>' . $row3->t_sulfur_adb . '</td>';
                $item_table3 .= '<td>' . $row3->klasifikasi_batubara . '</td>';
                $item_table3 .= '<td>' . $row3->ket . '</td>';
                $item_table3 .= '</tr>';
            }
            $item_table3 .= "<br/>";
            $item_table3 .= "</table>";

            $content = str_replace('{CONTENT3}', $item_table3, $content);

            $data = array(
                'content' => $content
            );

            $data['plugin'] = 'Lse/plugin';
            $this->load->view('Lse/print_request_form', $data);
        }
    }

    public function CTRL_Delete_SR2($id_roy, $id_lse) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id_roy, $this->tblNameroy, $this->field)) {
            $data['id_lse'] = $id_lse;
            $data['id_roy'] = $id_roy;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $id = $this->input->post('id');
            $this->md_lse->MDL_Delete_SR2($id);
            print("
                           <script language=\"javascript\">
                           window.opener.location.reload();
                           self.close();
                           </script>
                           ");
            //redirect('lse/CTRL_Edit/' . $id_lse . '/#FormC');
        }
    }

    public function CTRL_Delete_SR3($id_cal, $id_lse) {
        if (!$this->auth->Auth_isPerm()) {
            $this->load->view('error_akses');
        } elseif (!$this->auth->Auth_isPrivButton('delete')) {
            $data['action'] = 'delete';
            $data['page'] = 'error_sysmenu';
            $this->load->view('template_admin', $data);
        } elseif (!$this->auth->Auth_isRecID($id_cal, $this->tblNamecal, $this->field)) {
            $data['id_lse'] = $id_lse;
            $data['id_cl'] = $id_cal;
            $data['page'] = 'error_invalidID';
            $this->load->view('template_admin', $data);
        } else {
            $id = $this->input->post('id');
            $this->md_lse->MDL_Delete_SR3($id);
            print("
                           <script language=\"javascript\">
                           window.opener.location.reload();
                           self.close();
                           </script>
                           ");
            //redirect('lse/CTRL_Edit/' . $id_lse . '/#FormC');
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

    public function CTRL_Option_Port() {
        $this->load->model('md_loading_port');
        $AryPort = $this->md_loading_port->MDL_Select();
        $option[''] = 'Choose Ports...';
        foreach ($AryPort as $row) {
            $option[$row->loading_port_code] = $row->loading_port_name;
        }
        return $option;
    }

    public function CTRL_Option_Branch() {
        $this->load->model('md_branch');
        $AryBranch = $this->md_branch->MDL_Select();
        $option[''] = 'Choose Office...';
        foreach ($AryBranch as $row) {
            $option[$row->id] = $row->branch . '&nbsp&nbsp|&nbsp&nbsp' . $row->address;
        }
        return $option;
    }

    // 1 agustus 2017 10:17
    public function CTRL_Option_Exporter() {
        $AryExporter = $this->md_lse->MDL_SelectExporter();
        $option[''] = 'Choose a Exporter...';
        if ($AryExporter) {
            foreach ($AryExporter as $row) {
                $option[$row->client_id] = $row->npwp . '&nbsp&nbsp|&nbsp&nbsp' . $row->client_name;
            }
        }
        return $option;
    }

    // 1 agustus 2017 10:17
    public function getControlExporter() {
        $id_client = $this->input->post('$id_client');
       // $exporter = $this->db->get_where('tmst_client', array('client_id' => $id_client))->row();
        $exporter = $this->db->query("SELECT a.address,a.client_name, b.no_reg_exporter,date_reg_exporter from tmst_client a left join tmst_client_document b on a.client_id=b.client_id where a.client_id='$id_client'")->row();
        $result = array(
            'detail_addressEks' => $exporter->address,
            'detail_nameEks' => $exporter->client_name,
            'no_reg_exporter' => $exporter->no_reg_exporter,
            'date_reg_exporter' => $exporter->date_reg_exporter,
            
        );

        echo json_encode($result);
    }

    public function getAllDatas($req_startdate, $req_enddate) {
        $req_startdate = strlen($req_startdate) ? $req_startdate : date("Y-m-01");
        $req_enddate = strlen($req_enddate) ? $req_enddate : date("Y-m-t");


        $results = $this->md_lse->MDL_Select($req_startdate, $req_enddate);

        echo json_encode($results);
    }

    // 1 agustus 2017 11:16
    public function CTRL_Option_Importer() {
        $AryImporter = $this->md_lse->MDL_SelectImporter();
        $option[''] = 'Choose a Importer...';
        if ($AryImporter) {
            foreach ($AryImporter as $row) {
                $option[$row->importer_id] = $row->importer_name;
            }
        }
        return $option;
    }

    // 1 agustus 2017 11:16
    public function getControlImporter() {
        $id_importer = $this->input->post('$id_importer');
        $importer = $this->db->get_where('tmst_importer', array('importer_id' => $id_importer))->row();
        $result = array(
            'detail_addressImp' => $importer->address
        );

        echo json_encode($result);
    }

    // 4 agustus 2017 08:54
    public function CTRL_Option_Transport() {
        $AryTransport = $this->md_lse->MDL_SelectTransport();
        $option[''] = 'Choose a Transport...';
        if ($AryTransport) {
            foreach ($AryTransport as $row) {
                $option[$row->name] = $row->name;
            }
        }
        return $option;
    }

    public function CTRL_SendEmail($reqid) {

        $config = Array(
            'protocol' => $this->config->item('protocol'),
            'smtp_host' => $this->config->item('smtp_host'),
            'smtp_port' => $this->config->item('smtp_port'),
            'smtp_user' => $this->config->item('smtp_user'), // change it to yours
            'smtp_pass' => $this->config->item('smtp_pass'), // change it to yours
            'mailtype' => $this->config->item('mailtype'),
            'charset' => $this->config->item('charset'),
            'wordwrap' => $this->config->item('wordwrap')
        );

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from($this->config->item('smtp_user'), 'Laporan Surveyor - Export (Coal)');

        $aryTemplate = $this->md_lse->MDL_getTemplateEmail('38'); // Template Approval
        $subject = @$aryTemplate->name . "-" . "Request Surveyor Export";
        $message = @$aryTemplate->content;

        # Replace Content Email
        $hasil = $this->md_lse->MDL_SelectID($reqid);
        $tmpHasil['${REQUESTAPPROVALNAME}'] = "LSCOAL Approval Request";
        $tmpHasil['${REQUEST_NUMBER}'] = $hasil->no_lse;
        $tmpHasil['${REQUESTER_EMPNO}'] = $hasil->userid;
        $tmpHasil['${REQUESTER_NAME}'] = $hasil->requester_name;
        $aryParam = array_keys($tmpHasil);
        $aryValue = array_values($tmpHasil);

        $message = str_replace($aryParam, $aryValue, $message);
        $aryEmail = $this->md_lse->MDL_getEmailTo($reqid);

        while (list($k, $v) = @each($aryEmail)) {
            $emailto = $v;
            $this->email->to($emailto);

            $this->email->subject($subject);
            $this->email->message($message);

            $this->email->send();
        }
    }

    // 4 agustus 2017 08:54
    public function CTRL_Option_Cargo() {
        $AryCargo = $this->md_lse->MDL_SelectCargo();
        $option[''] = 'Choose a Cargo...';
        if ($AryCargo) {
            foreach ($AryCargo as $row) {
                $option[$row->name] = $row->name;
            }
        }
        return $option;
    }

    public function CTRL_Option_Document() {
        $AryDocument = $this->md_lse->MDL_SelectDocument();
        $option[''] = 'Choose Document Type...';
        if ($AryDocument) {
            foreach ($AryDocument as $row) {
                $option[$row->id] = $row->name;
            }
            return $option;
        }
    }

    public function CTRL_Option_Client() {
        $this->load->model('md_ref_json');
        $AryTypeStatus = $this->md_ref_json->MDL_Select_MasterType('REQUEST_STATUS');
        foreach ($AryTypeStatus as $row) {
            if ($row->id >= '6' && $row->id != '9' && $row->id != '8') {
                $option[$row->id] = $row->name;
            }
        }
        return $option;
    }

    public function CTRL_SendXML() {


        $data = $this->CTRL_ProvideData();


        $str = "<?xml version='1.0' encoding='iso-8859-1'?><lse_batubara_document></lse_batubara_document>";
        $xml = simplexml_load_string($str);

        $header = $xml->addChild('header');
       // $header->addChild('npwp', $data['exporter_npwp']);
        $header->addChild('npwp', '12345');
        $header->addChild('namapersh', $data['client_name']);
        $header->addChild('alamat', $data['exporter_address']);
        $header->addChild('telp', $data['phone']);
        $header->addChild('fax', $data['fax']);
        $header->addChild('idprop', '');
        $header->addChild('nmprop', '');
        $header->addChild('idkab', '');
        $header->addChild('nmkab', '');
      //  $header->addChild('jenisls', 'LS0012');
        $header->addChild('nols', $data['no_lse']);
        $header->addChild('tglls', $data['date_issued']);
        $header->addChild('tglakhirls', $data['date_expired']);
        $header->addChild('urbarang', '');
        $header->addChild('noet', $data['no_reg_exporter']);
        $header->addChild('tglet', $data['date_reg_exporter']);
        $header->addChild('tglakhiret', '');
        $header->addChild('nospe', '');
        $header->addChild('tglakhirspe', '');
        $header->addChild('nopveb', '');
        $header->addChild('tglpveb', '');
        $header->addChild('tempatperiksa', $data['survey_location']);
        $header->addChild('tglperiksa', $data['survey_location_date']);
        $header->addChild('portperiksa', $data['loading_port_id']);
        $header->addChild('nopacklist', $data['no_packing_list']);
        $header->addChild('tglpacklist', $data['date_packing_list']);
        $header->addChild('noinvoice', $data['no_invoice_packing_list']);
        $header->addChild('tglinvoice', $data['date_invoice_packing_list']);
        $header->addChild('fobusd', $data['total_fas']);
        $header->addChild('kurs', 'USD');
        $header->addChild('namaimp', $data['importer_name']);
        $header->addChild('alamatimp', $data['importer_address']);
        $header->addChild('negaraimp', $data['country']);
        $header->addChild('portmuat', $data['loading_port_code']);
        $header->addChild('tglmuat', $data['tglmuat']);//////////////////////
        $header->addChild('negaratujuan', $data['negaratujuan']);///////////////
        $header->addChild('porttujuan', $data['porttujuan']);///////////
        $header->addChild('namavessel', $data['vessel_name']);
        $header->addChild('tglmuatvessel', $data['stdate_load_vessel']);
        $header->addChild('noiupop', $data['no_mining_license']);
        $header->addChild('tgliupop', $data['date_mining_license']);
        $header->addChild('noiupopkpp', $data['no_smelter_license']);
        $header->addChild('tgliupopkpp', $data['date_smelter_license']);
        $header->addChild('noiupopkolah', $data['no_transsell_license']);
        $header->addChild('tgliupopkolah', $data['date_transsell_license']);
        $header->addChild('nobayarroyalti', $data['no_royalty_payment']);
        $header->addChild('tglbayarroyalti', $data['date_royalty_payment']);
        $header->addChild('idlc', $data['lc_type']);//////////////////////////////
        $header->addChild('nolc', $data['no_lc']);
        $header->addChild('tgllc', $data['date_lc']);
        $header->addChild('modetransport', $data['mode_transport']);
        $header->addChild('cargotype', $data['cargo_type']);
        $header->addChild('nopetikemas', $data['container_numseal']); //////////////////////////////////////////////////////
        $header->addChild('nosegel', $data['container_numseal']);
        $header->addChild('catatanperiksa', $data['note']);
        $header->addChild('kesimpulan', '');

        if ($data['komoditas']) {
            $komoditas = $xml->addChild('komoditas');
            foreach ($data['komoditas'] as $key => $kom) {

                $item = $komoditas->addChild('loop');


                $item->addChild('seri', $kom->lse_id);
                $item->addChild('hs', $kom->hs);
                $item->addChild('uraian', $kom->description);
                $item->addChild('volume', $kom->quantity);
                $item->addChild('satuan', 'TNE'); ////////////////////////////
                $item->addChild('fob', $kom->fas);
                $item->addChild('kurs', 'USD'); ///////////////////////////////
                $item->addChild('noiup', $kom->no_mining_license);
                $item->addChild('tgliup', '');//////////////////////////////////
            }
        }

        if ($data['detil_batubara']) {
            $detil_batubara = $xml->addChild('detil_batubara');
            foreach ($data['detil_batubara'] as $key => $det_bat) {

                $item = $detil_batubara->addChild('loop');


                $item->addChild('seri', $det_bat->id_cal);
                $item->addChild('cal_arb', $det_bat->cal_arb);
                $item->addChild('cal_adb', $det_bat->cal_adb);
                $item->addChild('tm_arb', $det_bat->tm_arb);
                $item->addChild('tash_adb', $det_bat->t_ash_adb);
                $item->addChild('tsulf_adb', $det_bat->t_sulfur_adb);
                $item->addChild('klasifikasibb', 1234);////////////////////////di petunjuk harus terisi angka
               // $item->addChild('klasifikasibb', $det_bat->klasifikasi_batubara);
                $item->addChild('keterangan', $det_bat->ket);
            }
        }

        if ($data['detil_asal']) {
            $detil_asal = $xml->addChild('detil_asal');
            foreach ($data['detil_asal'] as $key => $det_asal) {

                $item = $detil_asal->addChild('loop');

                $item->addChild('seri', $det_asal->id_roy);
                $item->addChild('npwp', $det_asal->npwp);
                $item->addChild('nmpersh', $det_asal->client_name);
                $item->addChild('idprop', $det_asal->province_code);
                $item->addChild('nmprop', $det_asal->province_name);
                $item->addChild('royalti', $det_asal->royalty_dp);
                $item->addChild('kurs', 'USD');
            }
        }



        $doc = new DOMDocument('1.0');
        $doc->formatOutput = true;
        $doc->preserveWhiteSpace = true;
        $doc->loadXML($xml->asXML(), LIBXML_NOBLANKS);
        $doc->save('xml/' . $data['no_lse'] . '.xml');

        $file = 'xml/' . $data['no_lse'] . '.xml';
        $xml = simplexml_load_file($file);
        //var_dump($xml); exit();*/
        $xml = $xml->asXML();
        //print_r($xml);


        /* Koneksi Web Services with NuSoap Client */
		$this->load->library("Nusoap_lib");
		$data = array(
			"wscarsurin",  		// Username
			"54FRB4WK",
			$xml
		);
				
		$soapclient = new nusoap_client('http://inatrade.kemendag.go.id/ws/lse_bb.php');
		$result = $soapclient->call("sendDocument", $data);
		
                $this->auth->TVD($result);
                
                die();
		if($result['respond']->status == "R00"){
			//Update Status refunmer pada LSE 
		$this->md_lse->MDL_UpdateRefnumberSuccess($data['no_lse'],$result['respond']->refnumber);
			
			print("
					<script language=\"javascript\">
						alert('Data has been sent to INATRADE');
						window.location.href = document.referrer;
					</script>");	
		}else{
			print("
					<script language=\"javascript\">
						alert('Integration failed, please check any required information and try again.');
						window.location.href = document.referrer;
					</script>");
		}
    }

    private function CTRL_ProvideData() {


        $no_lse = $this->uri->segment(3);
        $this->load->model('md_ref_json');
        $breadcrum = $this->breadcrumbs->output();
        $data['breadcrum'] = $breadcrum;


        $hasil = $this->md_lse->MDL_SelectID($no_lse);





        $data['exporter_npwp'] = $hasil->exporter_npwp;
        $data['client_name'] = $hasil->client_name;
        $data['exporter_address'] = $hasil->exporter_address;
        $data['phone'] = $hasil->phone;
        $data['fax'] = $hasil->fax;
        $data['no_lse'] = $hasil->no_lse;
        $data['date_issued'] = $hasil->date_issued;
        $data['date_expired'] = $hasil->date_expired;
        $data['no_reg_exporter'] = $hasil->no_reg_exporter;
        $data['date_reg_exporter'] = $hasil->date_reg_exporter;
        $data['survey_location'] = $hasil->survey_location;
        $data['survey_location_date'] = $hasil->survey_location_date;
        $data['loading_port_id'] = $hasil->loading_port_id;

        $data['no_packing_list'] = $hasil->no_packing_list;
        $data['date_packing_list'] = $hasil->date_packing_list;
        $data['no_invoice_packing_list'] = $hasil->no_invoice_packing_list;
        $data['date_invoice_packing_list'] = $hasil->date_invoice_packing_list;
        $data['total_fas'] = $hasil->total_fas;
        $data['importer_name'] = $hasil->importer_name;
        $data['importer_address'] = $hasil->importer_address;

        $data['country'] = $hasil->country;
        $data['loading_port_code'] = $hasil->loading_port_code;
       
        $data['tglmuat'] = $hasil->date_lc;
        $data['negaratujuan'] = $hasil->country_id;
        $data['port_destination'] = $hasil->port_destination;
        
        $data['vessel_name'] = $hasil->vessel_name;
        $data['stdate_load_vessel'] = $hasil->stdate_load_vessel;
        $data['no_mining_license'] = $hasil->no_mining_license;
        $data['date_mining_license'] = $hasil->date_mining_license;
        $data['no_smelter_license'] = $hasil->no_smelter_license;
        $data['date_smelter_license'] = $hasil->date_smelter_license;

        $data['no_transsell_license'] = $hasil->no_transsell_license;
        $data['date_transsell_license'] = $hasil->date_transsell_license;
        $data['no_royalty_payment'] = $hasil->no_royalty_payment;
        $data['date_royalty_payment'] = $hasil->date_royalty_payment;

        $data['lc_type'] = $hasil->lc_type;
        $data['no_lc'] = $hasil->no_lc;
        $data['date_lc'] = $hasil->date_lc;
        $data['mode_transport'] = $hasil->mode_transport;
        $data['cargo_type'] = $hasil->cargo_type;


        $data['container_numseal'] = $hasil->container_numseal;
        $data['note'] = $hasil->note;





        $data['komoditas'] = $this->md_lse->MDL_SelectSR1($no_lse);
        $data['detil_asal'] = $this->md_lse->MDL_SelectSR2($no_lse);
        $data['detil_batubara'] = $this->md_lse->MDL_SelectSR3($no_lse);



        $this->auth->TVD($data);die();


        return $data;
    }

}
