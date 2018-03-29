<?php

class Md_admin extends CI_Model {

    public function MDL_Select_Company() {
	$tbl_company = $this->config->item('tmst_company');

	$sSQL = "		
			SELECT CONCAT(a.type,' ',a.name) as company_name, a.id,a.vission,a.mission
			FROM $tbl_company a
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_GetGroupID($user_id) {
	$tbl_user_group = $this->config->item('tmst_users_group');
	
	$hasil = "";
	$sSQL = "		
			SELECT user_id,group_id
			FROM $tbl_user_group
			WHERE user_id = '$user_id'
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    // Fungsi Ambil Data
    public function MDL_Total_Approval() {
	$tbl_approvedby = $this->config->item('ttrs_approvedby');
	$tbl_user = $this->config->item('tmst_users');

	$userid = $this->session->userdata('userid');
	//$hasil = array();
	$sSQL = "	
			Select count(*) as jumlah_approval
			FROM $tbl_approvedby	
			WHERE approved_by LIKE '%$userid%'
			AND status NOT IN ('3','4') 
		";
	//var_dump($sSQL); exit();
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_Total_Approval_ReceiptForm() {
	$tbl_approvedby = $this->config->item('ttrs_approvedby');
	$tbl_user = $this->config->item('tmst_users');

	$userid = $this->session->userdata('userid');
	//$hasil = array();
	$sSQL = "	
			Select count(*) as jumlah_approval
			FROM $tbl_approvedby	
			WHERE 1=1
			AND (approved_by LIKE '$userid,%' OR approved_by LIKE '%,$userid' OR approved_by LIKE '%,$userid,%')
			AND status NOT IN ('3','4')
			AND requestapproval_id ='10'
		";

	//$this->auth->TVD($sSQL); exit();
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

        
    public function MDL_Total_Approval_RequestForm() {
	$tbl_approvedby = $this->config->item('ttrs_approvedby');
	$tbl_user = $this->config->item('tmst_users');

	$userid = $this->session->userdata('userid');
	//$hasil = array();
	$sSQL = "	
			Select count(*) as jumlah_approval
			FROM $tbl_approvedby	
			WHERE 1=1
			AND (approved_by LIKE '$userid,%' OR approved_by LIKE '%,$userid' OR approved_by LIKE '%,$userid,%')
			AND status NOT IN ('3','4','5')
			AND requestapproval_id ='7'
		";

	//var_dump($sSQL); exit();
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_SelectID_Employee($emp_id) {
	$tblemployee = $this->config->item('tmst_employee');
	$tblposition = $this->config->item('tmst_position');
	$tbltypevar = $this->config->item('tmst_typevar');
	$tblbranch = $this->config->item('tmst_branch');
	$tbladdress = $this->config->item('tmst_address');
	$tblcountry = $this->config->item('tmst_country');
	$tblprovince = $this->config->item('tmst_province');
	$tblcompany = $this->config->item('tmst_company');

	$hasil = "";
	$sSQL = "	
			SELECT e.emp_id, CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) as emp_name,f.position_name, e.hp, e.join_date, c.branch,
				   e.birth_place,e.birth_date,e.photo,e.signature,e.email,g.address1,g.phone1,g.mobile_phone1,
				   CONCAT(a.type,' ',a.name) as company_name
			FROM $tblcompany a,$tblposition f,$tbladdress g,$tblemployee e
				LEFT JOIN ( SELECT id, name as nm_type FROM $tbltypevar WHERE table_name = 'GENDER') t ON t.id = e.gender
				LEFT JOIN $tblbranch c ON c.id = e.branch_id
			WHERE 1=1 
				AND e.emp_id ='$emp_id'
				AND e.emp_id = g.emp_id
				AND f.position_id = e.position_id
				AND a.id = e.company_id
		";

	//$this->auth->TVD($sSQL); exit();

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    
    public function MDL_getNotificationsApproval() {
	$ttrs_lse = $this->config->item('ttrs_lse');
	$tmst_employee = $this->config->item('tmst_employee');
        $ttrs_approvedby = $this->config->item('ttrs_approvedby');
        
        $userid = $this->session->userdata('userid');

	$sSQL = "		
			select l.id, a.request_no, CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) as requester_name, a.recdate
from ttrs_approvedby a

join $tmst_employee e
on a.request_for = e.emp_id

join $ttrs_lse l
on l.no_lse=a.request_no

where a.approved_by LIKE  '%$userid%'

AND a.status NOT IN ('3','4','5')
			";
	
	$ambil = $this->db->query($sSQL);
	return $ambil->result();
    }

    public function MDL_getNotifications_User() {

	$ttrs_order_domestic = $this->config->item('ttrs_order_domestic');
	$ttrs_order_import = $this->config->item('ttrs_order_import');
	$tmst_registration = $this->config->item('tmst_registration');
	$userid = $this->session->userdata('userid');

	$sSQL = "
			(select a.userid,a.id,a.order_no,b.client_name,a.recdate ,'confirmation' as type

			from $ttrs_order_domestic a 
			left join  $tmst_registration b
			on a.client_id=b.client_id
			where a.laststatus_printing ='L05' AND userid ='$userid')
			union
			(
			select a.userid,a.id,a.order_no,b.client_name,a.recdate ,'confirmation' as type

			from $ttrs_order_import a 
			left join  $tmst_registration b
			on a.client_id=b.client_id
			where a.laststatus_printing ='L05'  AND userid ='$userid'
			)
			order by recdate desc
		";

	$ambil = $this->db->query($sSQL);

	return $ambil->result();
    }

    function time_elapsed_string($datetime, $full = false) {
	$now = new DateTime;
	$ago = new DateTime($datetime);
	$diff = $now->diff($ago);

	$diff->w = floor($diff->d / 7);
	$diff->d -= $diff->w * 7;

	$string = array(
	    'y' => 'year',
	    'm' => 'month',
	    'w' => 'week',
	    'd' => 'day',
	    'h' => 'hour',
	    'i' => 'minute',
	    's' => 'second',
	);
	foreach ($string as $k => &$v) {
	    if ($diff->$k) {
		$v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
	    } else {
		unset($string[$k]);
	    }
	}

	if (!$full)
	    $string = array_slice($string, 0, 1);
	return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public function MDL_SearchByName($keyword, $login_emp_id) {
        $tbl_lse = $this->config->item('ttrs_lse');
        $tbl_client = $this->config->item('tmst_client');
        $key = explode(' ', $keyword);

        //print_r($key);die();

        if (count($key) > 1) {

            $AND = "AND no_lse like '%$key[0]%' OR client_name like '%$key[0]%' OR vessel_name like '%$key[0]%' OR no_lc like '%$key[0]%' ";

            for ($i = 1; $i < count($key); $i++) {

                $AND .= " OR no_lse like '%$key[$i]%' OR client_name like '%$key[$i]%' OR vessel_name like '%$key[$i]%' OR no_lc like '%$key[$i]%'";
            }
        } else {

            $AND = " AND no_lse like '%$key[0]%' OR client_name like '%$key[0]%' OR vessel_name like '%$key[0]%' OR no_lc like '%$key[0]%'";
        }

        if ($this->session->userdata('type') != 'emp') {
            $ANDUSER=" AND a.userid ='$login_emp_id'";
        } else {
            $ANDUSER=" ";
        }

        $hasil = array();

        $sSQL = "
			SELECT a.no_lse,b.client_name,a.vessel_name,a.no_lc,a.recdate
			FROM $tbl_lse a
			JOIN $tbl_client b on b.client_id= a.client_id
			where 1=1 
			$ANDUSER 
			$AND
		";

        //var_dump($sSQL); exit();
        $ambil = $this->db->query($sSQL);

        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }

        return $hasil;
    }

}
