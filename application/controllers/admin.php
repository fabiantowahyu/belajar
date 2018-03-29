<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
	parent::__construct();
	$this->load->model('md_admin');
	$this->load->model('md_manage_group');
	$this->load->model('md_dashboard_view');
	//$this->load->model('md_order_report');
    }

    public function index() {
	if ($this->auth->Auth_isPerm()) {
	    /* Bread crum */
	    $this->load->model('md_ref_json');
	    $params = $this->router->fetch_class();
	    $hasil = $this->md_ref_json->MDL_SelectMenu($params);
	    $parentt = $hasil->parentt;
	    $nm_menu = $hasil->custom_title;
	    $path_icon = $hasil->path_icon;
	    $this->breadcrumbs->add($parentt, '#', $path_icon);
	    $this->breadcrumbs->add($nm_menu, base_url());
	    //$this->breadcrumbs->add('Spring Tutorial', base_url().'tutorials/spring-tutorials');
	    $breadcrum = $this->breadcrumbs->output();
	    $data['breadcrum'] = $breadcrum;
	    /* end */

	    $result_company = $this->md_admin->MDL_Select_Company();
	    $data['company_name'] = $result_company->company_name;
	    $data['vission'] = $result_company->vission;
	    $data['mission'] = $result_company->mission;

	    //$data['charts1'] = $this->report_order();

	    $data['userid'] = $this->session->userdata('userid');
	    $data['username'] = $this->session->userdata('username');
	    $data['previlege'] = $this->session->userdata('table');
	    $data['user_access'] = $this->md_admin->MDL_GetGroupID($data['userid']);
	    //var_dump($data['user_access']);die();

	    $data['group'] = $this->md_manage_group->MDL_Select();
	    $data['dashboard_view'] = $this->md_dashboard_view->MDL_Select_View();
	    $data['active_group'] = $this->session->userdata('active_group') ? $this->session->userdata('active_group') : '1';
	    $data['active_view_left'] = $this->md_dashboard_view->MDL_Select_View_ID($data['active_group'], "L");
	    $data['active_view_right'] = $this->md_dashboard_view->MDL_Select_View_ID($data['active_group'], "R");

	    $user_group = $this->md_manage_group->MDL_Select_UserID($data['userid']);
	    $data['user_group'] = $user_group->group_id;
	    $data['dashboard_left'] = $this->md_dashboard_view->MDL_Select_View_ID($data['user_group'], "L");
	    $data['dashboard_right'] = $this->md_dashboard_view->MDL_Select_View_ID($data['user_group'], "R");
	    $data['file'] = './file_upload/registration/';

	    $data['url'] = '';
	    $data['page'] = 'Home/view';
	    $data['plugin'] = 'Home/plugin';
	    $this->load->view('template_admin', $data);
	} else {
	    $this->load->view('template_admin', $data);
	}
    }

    public function maintenance() {
	$this->load->view('maintenance');
    }

//    public function report_order() {
//
//	$data['year'] = strlen($this->input->post('year')) ? $this->input->post('year') : date("Y");
//
//	$report_domestic = $this->md_order_report->MDL_SelectOrderDomestic($data['year']);
//	$report_import = $this->md_order_report->MDL_SelectOrderImport($data['year']);
//
//	$data['domestic_total'] = $this->md_order_report->MDL_DomesticTotal($data['year']);
//	$data['import_total'] = $this->md_order_report->MDL_ImportTotal($data['year']);
//
//	$temp = "";
//	$temp2 = "";
//	$rev = "";
//	$rev2 = "";
//	$report = "";
//	$report2 = "";
//	$sumReport = "";
//	$flag1 = "";
//	$flag2 = "";
//	$reportRev2 ="";
//	$sumRevenue ="";
//
//	//sumorder
//	foreach ($report_domestic as $row) {
//	    $order = $row->TotalOrder;
//	    $revenue = $row->Revenue;
//	    $month = $row->bulan;
//	    $temp[] = "[$month, $order]";
//	    $rev[] = "[$month, $revenue]";
//	    $report[] = "$order";
//	    $reportRev[] = "$revenue";
//	    $flag1++;
//	}
//	$data['report'] = $report;
//	$data['reportRev'] = $reportRev;
//	if ($temp == NULL) {
//	    $jstime[] = "[0, 0]";
//	    $data['temp'] = $jstime;
//	    $data['rev'] = $jstime;
//	} else {
//	    $data['temp'] = $temp;
//	    $data['rev'] = $rev;
//	}
//
//	//sumimport
//	foreach ($report_import as $row2) {
//	    $order2 = $row2->TotalOrder;
//	    $revenue2 = $row2->Revenue;
//	    $month2 = $row2->bulan;
//	    $temp2[] = "[$month2, $order2]";
//	    $rev2[] = "[$month2, $revenue2]";
//	    $report2[] = "$order2";
//	    $reportRev2[] = "$revenue2";
//	    $flag2++;
//	}
//	$data['report2'] = $report2;
//	$data['reportRev2'] = $reportRev2;
//	if ($temp2 == NULL) {
//	    $jstime[] = "[0, 0]";
//	    $data['temp2'] = $jstime;
//	    $data['rev2'] = $jstime;
//	} else {
//	    $data['temp2'] = $temp2;
//	    $data['rev2'] = $rev2;
//	}
//	if ($flag1 >= $flag2) {
//	    $reports = $report;
//	} else {
//	    $reports = $report2;
//	}
//	$i = 0;
//	if ($report != "" && $report2 != "") {
//	    foreach ($reports as $n) {
//		if (!isset($report[$i])) {
//		    $report[$i] = 0;
//		    $reportRev[$i] = 0;
//		}
//
//		if (!isset($report2[$i])) {
//		    $report2[$i] = 0;
//		    $reportRev2[$i] = 0;
//		}
//		$sumRevenue[] = $reportRev[$i] += $reportRev2[$i];
//		$sumReport[] = $report[$i] += $report2[$i];
//		$i++;
//	    }
//	}
//		$data['sumReport'] = $sumReport;
//		$data['sumRevenue'] = $sumRevenue;
//		return $data;
//    }

    public function CTRL_Search(){
		if($this->auth->Auth_isPerm()) {
			$keyword = $this->input->get('keyword');
                        
            //print_r($keyword);
                        
			$userid = $this->session->userdata('userid');
			$data['results'] = $this->md_admin->MDL_SearchByName($keyword, $userid);
            $data['keyword'] = $keyword;
            //print_r($data['results']);
            //die();
            $data['title'] = 'Search Results';
			$data['page'] = 'Home/view_search';
			//$data['plugin'] = 'Home/plugin';
			$this->load->view('template_admin', $data);
		}
	}

    public function CTRL_Upload_Data() {
		$file = array();
		$file['expired_date'] = $this->input->post('expired_date');
		$file['fieldname'] = $this->input->post('fieldname');
		$file['userid'] = $this->input->post('userid');
		$file['file'] = $_FILES["name"]["name"];

		$is_userid = $this->md_file_expired->MDL_Select_ID($file['userid']);
		if ($is_userid) {
		    $this->md_file_expired->MDL_Update($file);
		} else {
		    $this->md_file_expired->MDL_Insert($file);
		}
		$status = TRUE;
		if ($file['file']) {
		    $config = array();
		    $config['upload_path'] = './file_upload/registration';
		    $config['allowed_types'] = 'pdf|doc|docx|jpeg|jpg';
		    $config['max_size'] = '1024';
		    $config['encrypt_name'] = TRUE;
		    $this->load->library('upload', $config);
		    $is_upload = $this->upload->do_upload('name');
		    if (!$is_upload) {
			$status = FALSE;
			print("
						<script language=\"javascript\">
							alert('An error occured, please try again');
							document.referrer = 'admin';
							location.href = document.referrer;
						</script>
					");
		    } else {
			$status = FALSE;
			$current_file = $this->md_registration->MDL_SelectByField($file);
			$path = './file_upload/registration/';
			if ($current_file->$file['fieldname']) {
			    if (file_exists($path . $current_file->$file['fieldname'])) {
				chmod($path . $current_file->$file['fieldname'], 0777);
				unlink($path . $current_file->$file['fieldname']);
			    }
			}
			$result = $this->upload->data();
			$file['file'] = $result['file_name'];
			$this->md_registration->MDL_UpdateByField($file);
			print("
						<script language=\"javascript\">
							alert('Your document has been saved');
							location.href = document.referrer;
						</script>
					");
		    }
		}

		if ($status) {
		    print("
						<script language=\"javascript\">
							alert('Your document has been saved');
							location.href = document.referrer;
						</script>");
		}
    }

    public function CTRL_SetFilterGroup() {
		$active_group = $this->input->post('user_group');
		$this->session->set_userdata('active_group', $active_group);
		redirect(base_url() . 'admin');
    }

    public function CTRL_AddDashboardView() {
		$group_id = $this->input->post('group_id');
		$view_id = $this->input->post('view_id');
		$position = $this->input->post('position');

		$view = $this->md_dashboard_view->MDL_Select_View_Previlege($group_id, $view_id);
		if ($view) {
		    print("
						<script language=\"javascript\">
							alert('View already set');
							location.href = document.referrer;
						</script>");
		} else {
		    $data = array(
			"group_id" => $group_id,
			"view_id" => $view_id,
			"status" => 1,
			"position" => $position
		    );
		    $this->md_dashboard_view->MDL_Insert_Previlege($data);
		    print("
						<script language=\"javascript\">
							alert('View activated');
							location.href = document.referrer;
						</script>");
		}
    }

    public function CTRL_DeleteView() {
	$id = $this->uri->segment(3);
	$this->md_dashboard_view->MDL_DeletePrevilege($id);

	print("
			<script language=\"javascript\">
				alert('Previlege has been deleted');
				location.href = document.referrer;
			</script>");
    }

    public function getNotificationApproval() {
	$isi = "";

	$notifications_approval = $this->md_admin->MDL_getNotificationsApproval();

	foreach ($notifications_approval as $key => $value) {
	    $id_lse = $this->db->get_where('ttrs_lse',array('id'=>$value->id))->row();
		$isi .= "<li >
			<span class='padding-10'>
				<em class='badge padding-5 no-border-radius bg-color-red pull-left margin-right-5'>
					<i class='fa fa-file-text-o fa-fw fa-2x'></i>
				</em>
				
				<span>
	                New Request <strong>$value->request_no</strong> from $value->requester_name needs to be approved - <a target='blank' href='" . base_url() . "lse_approval/CTRL_Edit/$value->id/$id_lse->no_lse' class='display-normal'>Click here</a>
					<br>
					<span class='pull-right font-xs text-muted'><i>" . $this->md_admin->time_elapsed_string($value->recdate) . "...</i></span>
				</span>
			</span>
		</li>";
	   
            
            }



	$no_data = "<div class='alert alert-transparent'>
        <h4 class='text-center'>No new notification</h4>

</div>
<i class='fa fa-info-circle fa-4x fa-border'></i>";
	$jumlah = count($notifications_approval);

	
	    if ($jumlah != 0) {
		echo $isi;
	    } else {
		echo $no_data;
	    }
	
    }

    public function getCountNotification() {
	//created by aa dito ganteng

	$notifications = COUNT($this->md_admin->MDL_getNotificationsApproval());
	

	

	$notifall = $notifications ;

	
	    $result = array(
		'count_all' => $notifall
	    );
	

	echo json_encode($result);
    }

}
