<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lse_approval extends CI_Controller {

    private $tblName;
    private $field;

    public function __construct() {
	parent::__construct();
	$this->load->model('Md_lse_approval');
	$this->load->model('md_template_email');
	$this->load->model('md_employee');
	$this->tblName = $this->config->item('ttrs_lse');
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

	    $laststatus_lse = $this->input->post('laststatus_lse');
	    $laststatus_lse = strlen($laststatus_lse) ? $laststatus_lse : '1';
	    $data['laststatus_lse'] = $laststatus_lse;

	    $AryStatment = $this->CTRL_Option_TypeView();
	    $data['laststatus'] = $laststatus_lse;
	    $data['option_laststatus'] = $AryStatment;

	    $data['results'] = $this->Md_lse_approval->MDL_SelectApprove($laststatus_lse);

	    $nm_title = $this->auth->Auth_getNameMenu();
	    $data['title'] = sprintf("%s", $nm_title);
	    $data['url_view'] = sprintf("%Lse_approval/CTRL_View/", site_url());
	    $data['page'] = 'Lse_approval/view';
	    $data['plugin'] = 'Lse_approval/plugin';
	    $this->load->view('template_admin', $data);
	}
    }

    public function CTRL_Edit($id, $no_lse) {
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
		redirect('Lse_approval');
	    } elseif ($this->input->post('btn_send')) {
		$approval_status = $this->input->post('approval_status');

		if ($approval_status != '3') {
		    $this->Md_lse_approval->MDL_Approve($no_lse);
		    $this->Md_lse_approval->MDL_Insert($no_lse);

		    redirect('Lse_approval');
		} else {
		    $npwp_upload = $this->input->post('npwp_upload') ? TRUE : FALSE;
		    $tdp = $this->input->post('tdp') ? TRUE : FALSE;
		    $siup = $this->input->post('siup') ? TRUE : FALSE;
		    $situ = $this->input->post('situ') ? TRUE : FALSE;
		    $pkp = $this->input->post('pkp') ? TRUE : FALSE;
		    $iupop = $this->input->post('iupop') ? TRUE : FALSE;
		    $iukop = $this->input->post('iukop') ? TRUE : FALSE;
		    $pkp2b = $this->input->post('pkp2b') ? TRUE : FALSE;
		    $iupopkpm = $this->input->post('iupopkpm') ? TRUE : FALSE;
		    $et = $this->input->post('et') ? TRUE : FALSE;

		    $file_pveb = $this->input->post('file_pveb') ? TRUE : FALSE;
		    $file_packing_list = $this->input->post('file_packing_list') ? TRUE : FALSE;
		    $file_commercial_invoice = $this->input->post('file_commercial_invoice') ? TRUE : FALSE;
		    $file_ssbp = $this->input->post('file_ssbp') ? TRUE : FALSE;
		    $file_surat_blending = $this->input->post('file_surat_blending') ? TRUE : FALSE;
		    $file_copylc = $this->input->post('file_copylc') ? TRUE : FALSE;


		    if ($npwp_upload && $tdp && $siup && $situ && $pkp && $iupop && $iukop && $pkp2b && $iupopkpm && $et && $file_pveb && $file_packing_list && $file_commercial_invoice && $file_ssbp && $file_surat_blending && $file_copylc) {
			$this->Md_lse_approval->MDL_Approve($no_lse);
			$this->Md_lse_approval->MDL_Insert($no_lse);

			redirect('Lse_approval');
		    } else {
			print("
					<script language=\"javascript\">
						alert('You must checklist all document to approve this registration');
						self.history.back();
					</script>
				");
		    }
		}
	    } elseif ($this->input->post('btn_void')) {
		$void_notes = $this->input->post('void_notes');
		$this->Md_lse_approval->MDL_InsertVoid($no_lse, $void_notes);
		$this->Md_lse_approval->MDL_Set_Void($no_lse, $void_notes);
		redirect('Lse_approval');
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
		$this->breadcrumbs->add('LSE Approval Statment', current_url());
		$breadcrum = $this->breadcrumbs->output();
		$data['breadcrum'] = $breadcrum;
		/* end */

		//TAB 1
		$hasil = $this->Md_lse_approval->MDL_SelectID($id);
		$data['id_lse'] = $id;
		$data['no_lse'] = $hasil->no_lse;
		$data['date_issued'] = $hasil->date_issued;
		$data['date_expired'] = $hasil->date_expired;
		$data['no_reg_exporter'] = $hasil->no_reg_exporter;
		$data['date_reg_exporter'] = $hasil->date_reg_exporter;
		$data['no_wo'] = $hasil->no_wo;
		$data['date_wo'] = $hasil->date_wo;
		$data['branch'] = $hasil->branch;
		$data['npwp_no'] = $hasil->exporter_npwp;
		$data['client_name'] = $hasil->client_name;
		$data['exporter_address'] = $hasil->exporter_address;
		$data['port'] = $hasil->loading_port_name;
		$data['country'] = $hasil->country_name;
		$data['survey_location_date'] = $hasil->survey_location_date;
		$data['survey_location'] = $hasil->survey_location;
		$data['no_packing_list'] = $hasil->no_packing_list;
		$data['date_packing_list'] = $hasil->date_packing_list;
		$data['no_invoice_packing_list'] = $hasil->no_invoice_packing_list;
		$data['date_invoice_packing_list'] = $hasil->date_invoice_packing_list;
		$data['port_destination'] = $hasil->port_destination;
		$data['vessel_name'] = $hasil->vessel_name;
		$data['stdate_load_vessel'] = $hasil->stdate_load_vessel;
		$data['enddate_load_vessel'] = $hasil->enddate_load_vessel;
		$data['no_mining_license'] = $hasil->no_mining_license;
		$data['date_mining_license'] = $hasil->date_mining_license;
		$data['no_transsell_license'] = $hasil->no_transsell_license;
		$data['date_transsell_license'] = $hasil->date_transsell_license;
		$data['no_smelter_license'] = $hasil->no_smelter_license;
		$data['date_smelter_license'] = $hasil->date_smelter_license;
		$data['no_royalty_payment'] = $hasil->no_royalty_payment;
		$data['date_royalty_payment'] = $hasil->date_royalty_payment;
		$data['importer'] = $hasil->importer_id;
		$data['importer_name'] = $hasil->importer_name;
		$data['importer_address'] = $hasil->importer_address;
		$data['mode_transport'] = $hasil->mode_transport;
		$data['cargo_type'] = $hasil->cargo_type;
		$data['container_numseal'] = $hasil->container_numseal;
		$data['note'] = $hasil->note;
		$data['file_pveb'] = $hasil->file_pveb;
		$data['file_ssbp'] = $hasil->file_ssbp;
		$data['file_packing_list'] = $hasil->file_pck_list;
		$data['file_commercial_invoice'] = $hasil->file_inv;
		$data['file_surat_blending'] = $hasil->file_blending;
		$data['file_spplc'] = $hasil->file_spplc;
		$data['file_copylc'] = $hasil->file_copylc;


		$data['last_status'] = $hasil->laststatus_lse;
		$data['session_user'] = $this->session->userdata('userid');
		$data['requester'] = $hasil->userid;

		//TAB 2
		$hasil_upload = $this->Md_lse_approval->MDL_Select_Uploaded_Document($hasil->client_id);
		if ($hasil_upload) {
		    $data['npwp_upload'] = $hasil_upload->npwp_upload;
		    $data['tdp'] = $hasil_upload->tdp;
		    $data['siup'] = $hasil_upload->siup;
		    $data['situ'] = $hasil_upload->situ;
		    $data['pkp'] = $hasil_upload->pkp;
		    $data['iupop'] = $hasil_upload->iupop;
		    $data['iukop'] = $hasil_upload->iukop;
		    $data['pkp2b'] = $hasil_upload->pkp2b;
		    $data['iupopkpm'] = $hasil_upload->iupopkpm;
		    $data['et'] = $hasil_upload->et;
		} else {
		    $data['npwp_upload'] = '';
		    $data['tdp'] = '';
		    $data['siup'] = '';
		    $data['situ'] = '';
		    $data['pkp'] = '';
		    $data['iupop'] = '';
		    $data['iukop'] = '';
		    $data['pkp2b'] = '';
		    $data['iupopkpm'] = '';
		    $data['et'] = '';
		}

		//TAB 3
		$data['goods'] = $this->Md_lse_approval->MDL_SelectDetailHS($no_lse);
		$data['companys'] = $this->Md_lse_approval->MDL_SelectDetailRoyalty($no_lse);
		$data['cals'] = $this->Md_lse_approval->MDL_SelectDetailCal($no_lse);

		$data['hasil_approveby'] = $this->Md_lse_approval->MDL_ApproveBy($no_lse);
		$current_approver = $this->Md_lse_approval->MDL_ApproveBy_Now($no_lse);
		$data['approver'] = array();
		if ($current_approver != null) {
		    $data['approver'] = $current_approver->approved_by;
		}
		$AryStatment = $this->CTRL_Option_Type();
		$data['statement'] = $hasil->laststatus_lse;
		$data['option_statement'] = $AryStatment;

		//TAB 4
		$data['history'] = $this->Md_lse_approval->MDL_SelectHistory($no_lse);

		//CERTIFICATE
		$data['table1'] = $this->Md_lse_approval->MDL_SelectDetailHS($no_lse);
		$data['table2'] = $this->Md_lse_approval->MDL_SelectDetailRoyalty($no_lse);
		$data['table3'] = $this->Md_lse_approval->MDL_SelectDetailCal($no_lse);

		$AryAggrement = $this->CTRL_Option_Client();
		$data['aggrement'] = "";
		$data['option_aggrement'] = $AryAggrement;

		//GETSUM AMOUNT
		$SumAmount = $this->Md_lse_approval->MDL_GetSum($id);
		if ($SumAmount) {
		    $data['SumAmount'] = $SumAmount->SumFas;
		} else {
		    $data['SumAmount'] = "0";
		}

		$nm_title = $this->auth->Auth_getNameMenu();
		$data['title_head'] = sprintf("%s - LSE Approval Statment", $nm_title);
		$data['title'] = sprintf("%s", $nm_title);
		$data['url'] = 'Lse_approval/CTRL_Edit/' . $id . '/' . $no_lse;
		$data['url_del'] = 'Lse_approval/CTRL_Delete/' . $id . '/' . $no_lse;
		$data['page'] = 'Lse_approval/form_edit';
		$data['plugin'] = 'Lse_approval/plugin';
		$this->load->view('template_admin', $data);
	    }
	}
    }

    public function CTRL_Print($id, $no_lse) {
	if (!$this->auth->Auth_isPerm()) {
	    $this->load->view('error_akses');
	} elseif (!$this->auth->Auth_isPrivButton('delete')) {
	    $data['action'] = 'delete';
	    $data['page'] = 'error_sysmenu';
	    $this->load->view('template_admin', $data);
	} else {
	    $hasil = $this->Md_lse_approval->MDL_SelectID($id);
	    $table1 = $this->Md_lse_approval->MDL_SelectDetailHS($no_lse);
	    $table2 = $this->Md_lse_approval->MDL_SelectDetailRoyalty($no_lse);
	    $table3 = $this->Md_lse_approval->MDL_SelectDetailCal($no_lse);

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
		$item_table1 .= '<td>' . number_format($row->quantity, 3, ',', '.') . ' MT</td>';
		$item_table1 .= '<td>' . number_format($row->fas, 2, ',', '.') . '</td>';
		$item_table1 .= '<td>' . $row->no_mining_license . '</td>';
		$item_table1 .= '</tr>';

		$SumQty = $SumQty + $row->quantity;
		$SumFAS = $SumFAS + $row->fas;
	    }
	    $item_table1 .= '<tr>';
	    $item_table1 .= '<td align="center" colspan="3"><b>TOTAL</b></td>';
	    $item_table1 .= '<td><font face="Arial"><b>' . number_format($SumQty, 3, ',', '.') . ' MT</b></font></td>';
	    $item_table1 .= '<td><font face="Arial"><b>' . number_format($SumFAS, 2, ',', '.') . '</font></b></td>';
	    $item_table1 .= '<td colspan="2"></td>';
	    $item_table1 .= '</tr>';
	    $item_table1 .= "</table>";
	    $item_table1 .= "<br/><br/>";


	    $content = str_replace('{AMOUNT}', number_format($SumFAS, 2, ',', '.'), $content);
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
		$item_table2 .= '<td>' . number_format($row2->royalty_dp, 2, ',', '.') . '</td>';
		$item_table2 .= '</tr>';

		$SumRoyalty = $SumRoyalty + $row2->royalty_dp;
	    }
	    $item_table2 .= '<tr>';
	    $item_table2 .= '<td align="center" colspan="4"></td>';
	    $item_table2 .= '<td><font face="Arial"><b>' . number_format($SumRoyalty, 0, '.', ',') . '</font></b></td>';
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

	    $data['plugin'] = 'Lse_approval/plugin';
	    $this->load->view('Lse_approval/print_request_form', $data);
	}
    }

    public function CTRL_Option_Type() {
	$this->load->model('md_ref_json');
	$AryTypeStatus = $this->md_ref_json->MDL_Select_MasterType('REQUEST_STATUS');
	foreach ($AryTypeStatus as $row) {
	    if ($row->id != '0' && $row->id != '1' && $row->id != '2' && $row->id != '6' && $row->id != '7' && $row->id != '8') {
		$option[$row->id] = $row->name;
	    }
	}
	return $option;
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

    public function CTRL_Option_TypeView() {
	$this->load->model('md_ref_json');
	$Aryapproval_status = $this->md_ref_json->MDL_Select_MasterType('REQUEST_STATUS');
	foreach ($Aryapproval_status as $row) {
	    $option[$row->id] = $row->name;
	}
	$option['0'] = 'All';
	return $option;
    }

}
