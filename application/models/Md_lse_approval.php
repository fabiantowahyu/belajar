<?php

class Md_lse_approval extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select($laststatus_lse) {
	$tblLse = $this->config->item('ttrs_lse');
	$tblImporter = $this->config->item('tmst_importer');
	$tblClient = $this->config->item('tmst_client');
	$tblBranch = $this->config->item('tmst_branch');
	$tblLoadingPort = $this->config->item('tmst_loading_port');
	$tblCountry = $this->config->item('tmst_country');
	$tbltypevar = $this->config->item('tmst_typevar');
	$user = $this->session->userdata('userid');

	$hasil = array();
	$sSQL = "
                SELECT
                    a.id, a.no_lse, a.date_issued, a.date_expired, a.date_expired, a.port_destination, a.laststatus_lse, 
		    a.lastdate_lse, a.laststatus_inatrade, a.lastdate_inatrade, a.mode_transport, a.cargo_type, a.container_numseal, a.note,
                    b.importer_id, b.country as country_importer, b.npwp, b.importer_name, b.address as importer_address,
                    c.client_id, c.country, c.client_name, c.npwp as exporter_npwp, c.address as exporter_address,
                    d.id as id_branch, d.branch,
                    e.id as id_lpc, e.loading_port_code, e.loading_port_name,
                    f.id as id_country, f.country_code, f.country_name,
                    g.id as id_typevar, g.name as name_typevar,
                    t.nm_type as status_lse,
                    t2.nm_type2 as status_inatrade
                FROM
                    $tblImporter b,
                    $tblClient c,
                    $tblBranch d,
                    $tblLoadingPort e,
                    $tblCountry f,
                    $tbltypevar g,
                    $tblLse a
                    LEFT JOIN (SELECT id, name as nm_type FROM $tbltypevar WHERE table_name = 'REQUEST_STATUS') t ON t.id = a.laststatus_lse
                    LEFT JOIN (SELECT id as id2, name as nm_type2 FROM $tbltypevar WHERE table_name = 'REQUEST_STATUS') t2 ON t2.id2 = a.laststatus_inatrade
		    LEFT JOIN (SELECT request_no,approved_by FROM ttrs_approvedby)h ON h.request_no = a.id
                WHERE 1=1 
                    AND a.importer_id           = b.importer_id
                    AND a.client_id             = c.client_id
                    AND a.branch_id             = d.id
                    AND a.loading_port_id       = e.loading_port_code
                    AND a.country_id            = f.country_code
                    AND a.laststatus_lse        = g.id
                    AND a.laststatus_lse = '$laststatus_lse'
                ORDER BY a.id ASC 
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_SelectApprove($current_status = FALSE) {

	$userid = $this->session->userdata('userid');
	$this->db->select('ir.*,b.branch, CONCAT(e.first_name," ",e.middle_name," ",e.last_name) AS client_name , c.name AS status_lse ');
	$this->db->from('ttrs_lse ir');

	$this->db->join('tmst_employee e', 'ir.userid = e.emp_id');
	$this->db->join('tmst_branch b', 'e.branch_id = b.id');
	$this->db->join('ttrs_approvedby a', 'ir.no_lse = a.request_no');
	$this->db->join('tmst_typevar c', 'ir.laststatus_lse = c.id');
	$this->db->like('a.approved_by', $userid);
	if ($current_status) {
	    $this->db->where('ir.laststatus_lse', $current_status);
	}
	$this->db->group_by('a.request_no');
	return $this->db->get()->result();
    }

    // Fungsi Tambah Data
    public function MDL_Insert($no_lse) {

	$data = array(
	    'no_lse' => $no_lse,
	    'approval_status' => $this->input->post('approval_status'),
	    'approval_date' => date("Y-m-d H:i:s"),
	    'remark' => $this->input->post('remark'),
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s")
	);

	$this->db->insert('ttrs_lse_history_approval', $data);
    }

    public function MDL_InsertAggrement($no_lse) {

	$data = array(
	    'no_lse' => $no_lse,
	    'approval_status' => $this->input->post('client_aggrement'),
	    'approval_date' => date("Y-m-d H:i:s"),
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s")
	);

	$this->db->insert('ttrs_lse_history_approval', $data);
    }

    public function MDL_InsertVoid($no_lse, $void_notes) {

	$data = array(
	    'no_lse' => $no_lse,
	    'approval_status' => '9',
	    'approval_date' => date("Y-m-d H:i:s"),
	    'remark' => $void_notes,
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	    'moduser' => $this->session->userdata('userid'),
	    'moddate' => date("Y-m-d H:i:s")
	);

	$this->db->insert('ttrs_lse_history_approval', $data);
    }

    public function MDL_SelectID($id) {
	$tblLse = $this->config->item('ttrs_lse');
	$tblImporter = $this->config->item('tmst_importer');
	$tblClient = $this->config->item('tmst_client');
	$tblBranch = $this->config->item('tmst_branch');
	$tblLoadingPort = $this->config->item('tmst_loading_port');
	$tblCountry = $this->config->item('tmst_country');
	$tbltypevar = $this->config->item('tmst_typevar');
	$sSQL = "
                SELECT
                    a.*,
                    b.importer_id, b.country as country_importer, b.npwp, b.importer_name, b.address as importer_address,
                    c.client_id, c.country, c.client_name, c.npwp as exporter_npwp, c.address as exporter_address,
                    d.id as id_branch, d.branch,
                    e.id as id_lpc, e.loading_port_code, e.loading_port_name,
                    f.id as id_country, f.country_code, f.country_name,
                    g.id as id_typevar, g.name as name_typevar
                FROM
                    $tblLse a
			LEFT JOIN(SELECT * FROM $tblImporter)b ON b.importer_id = a.importer_id
			    LEFT JOIN(SELECT * FROM $tblClient)c ON c.client_id = a.client_id
				LEFT JOIN(SELECT * FROM $tblBranch)d ON d.id = a.branch_id 
				    LEFT JOIN(SELECT * FROM $tblLoadingPort)e ON e.loading_port_code = a.loading_port_id
					LEFT JOIN(SELECT * FROM $tblCountry)f ON f.country_code = a.country_id
					    LEFT JOIN(SELECT * FROM $tbltypevar)g ON g.id = a.laststatus_lse
                WHERE a.id='$id'
                ORDER BY a.id ASC 
                ";

	$ambil = $this->db->query($sSQL);
	return $ambil->row();
    }

    public function MDL_SelectDetailHS($id_lse) {
	$tblLseHS = $this->config->item('ttrs_lse_survres_hs');

	$hasil = array();
	$sSQL = "
                SELECT
                    hs, description, quantity, fas, no_mining_license
                FROM
                    $tblLseHS
                WHERE id_lse = '$id_lse'
                ORDER BY id ASC 
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_GetSum($id_lse) {
	$tblLseHS = $this->config->item('ttrs_lse_survres_hs');

	$hasil = array();
	$sSQL = "
                SELECT
                    SUM(fas) AS SumFas
                FROM
                    $tblLseHS
                WHERE id_lse = '$id_lse'
                GROUP BY id_lse
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_SelectDetailRoyalty($id_lse) {
	$tblLseRoyalty = $this->config->item('ttrs_lse_survres_royalty');

	$hasil = array();
	$sSQL = "
                SELECT
                    a.royalty_dp,
		    b.company_name, b.npwp,
		    c.province_name
                FROM
                    $tblLseRoyalty a
			LEFT JOIN(SELECT client_id, CONCAT(type,'. ',client_name)AS company_name, npwp, province FROM tmst_client)b ON b.client_id = a.client_id
			    LEFT JOIN(SELECT province_code,province_name FROM tmst_province)c ON c.province_code = b.province
                WHERE a.id_lse = '$id_lse'
                ORDER BY a.id ASC 
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_SelectDetailCal($id_lse) {
	$tblLseCal = $this->config->item('ttrs_lse_survres_cal');

	$hasil = array();
	$sSQL = "
                SELECT
                    cal_arb, cal_adb, tm_arb, t_ash_adb, t_sulfur_adb, klasifikasi_batubara, ket
                FROM
                    $tblLseCal
                WHERE id_lse = '$id_lse'
                ORDER BY id ASC 
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    // Fungsi Ubah Data
    public function MDL_Update($request_no) {
	$tbl_approvedby = $this->config->item('ttrs_approvedby');

	$user = $this->session->userdata('userid');

	$data = array(
	    'status' => $this->input->post('approval_statement'),
	    'last_status' => $this->input->post('last_status'),
	    'respon_date' => date("Y-m-d H:i:s"),
	    'fixed_approver' => $user,
	    'remark' => $this->input->post('remark')
	);

	$this->db->where(array(
	    'request_no' => $request_no,
	    'approved_by' => $user
	));
	$this->db->update($tbl_approvedby, $data);
    }

    public function MDL_SelectApproval($request_no, $request_for) {
	$tbl_approvedby = $this->config->item('ttrs_approvedby');
	$user = $this->session->userdata('userid');

	$hasil = array();
	$sSQL = "
                SELECT a.respon_date, a.remark,
		       b.status_name,
		       c.emp_name
		FROM $tbl_approvedby a
		    LEFT JOIN(SELECT id, name AS status_name FROM tmst_typevar)b ON b.id = a.status
			    LEFT JOIN(SELECT emp_id, CONCAT(first_name,' ',middle_name,' ',last_name)AS emp_name FROM tmst_employee)c ON c.emp_id = a.approved_by
		WHERE a.request_no = '$request_no' AND
		      a.request_for = '$request_for' AND
		      a.approved_by != '$user'
		";
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	    return $hasil;
	}
    }

    public function MDL_SelectApprovalBy($request_no, $request_for) {
	$tbl_approvedby = $this->config->item('ttrs_approvedby');
	$user = $this->session->userdata('userid');

	$hasil = array();
	$sSQL = "
                SELECT a.respon_date, a.remark,a.status,
		       b.status_name,
		       c.emp_name
		FROM $tbl_approvedby a
		    LEFT JOIN(SELECT id, name AS status_name FROM tmst_typevar)b ON b.id = a.status
			    LEFT JOIN(SELECT emp_id, CONCAT(first_name,' ',middle_name,' ',last_name)AS emp_name FROM tmst_employee)c ON c.emp_id = a.approved_by
		WHERE a.request_no = '$request_no' AND
		      a.request_for = '$request_for' AND
		      a.approved_by = '$user'
		";
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	    return $hasil;
	}
    }

    public function MDL_ApproveBy($no_lse) {
	$tblapprovedby = $this->config->item('ttrs_approvedby');
	$tblemployee = $this->config->item('tmst_employee');
	$tbltypevar = $this->config->item('tmst_typevar');

	$hasil = array();

	$sSQL = "       
            SELECT a.id id, CONCAT(b.first_name,' ',b.middle_name,' ',b.last_name) as approval_name, a.approved_by, a.respon_date, master_type.name as status_name, a.status, a.approved_by, a.remark
            FROM $tblapprovedby a
            LEFT JOIN ( SELECT id, name FROM $tbltypevar WHERE table_name = 'REQUEST_STATUS' ) master_type ON master_type.id = a.status
            LEFT JOIN $tblemployee b ON a.fixed_approver = b.emp_id
            WHERE a.request_no = '$no_lse'
            ORDER BY a.id desc
        ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$approve = explode(',', $data->approved_by);
		$approver_name = array();
		for ($i = 0; $i < count($approve); $i++) {
		    if ($approve[$i]) {
			$approver_name[$i] = $this->md_employee->MDL_SelectByID($approve[$i])->emp_name;
		    }
		}
		$data->approver_name = $approver_name;
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_ApproveBy_Now($no_lse) {
	$tblapprovedby = $this->config->item('ttrs_approvedby');
	$tblemployee = $this->config->item('tmst_employee');
	$tbltypevar = $this->config->item('tmst_typevar');

	$userid = $this->session->userdata('userid');

	$hasil = array();

	$sSQL = "       
            SELECT CONCAT(b.first_name,' ',b.middle_name,' ',b.last_name) as approval_name, 
		   a.approved_by, a.respon_date, 
		   master_type.name as status_name,a.status , a.approved_by
            FROM $tblemployee b, $tblapprovedby a
		LEFT JOIN ( SELECT id, name FROM $tbltypevar WHERE table_name = 'REQUEST_STATUS' ) master_type ON master_type.id = a.status
            WHERE a.request_no = '$no_lse'
		AND (SUBSTR(a.approved_by,1,8) = b.emp_id OR SUBSTR(a.approved_by,10,8) = b.emp_id)
		AND (SUBSTR(a.approved_by,1,8) = '$userid' OR SUBSTR(a.approved_by,10,8) = '$userid')
		AND fixed_approver = ''
            ORDER BY a.id asc
        ";
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_Approve($no_lse) {
	$tbl_approvedby = $this->config->item('ttrs_approvedby');
	$tbl_ttrs_lse = $this->config->item('ttrs_lse');

	$requester = array();
	$approval_status = $this->input->post('approval_status');
	$approved_by = $this->input->post('approved_by');
	$userid = $this->session->userdata('userid');
	$recdate = date("Y-m-d H:i:s");
	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$ceklast_status = $this->Md_lse_approval->MDL_LastStatus($no_lse);
	if ($ceklast_status->total_lststatus == 1 && $approval_status == 3) {
	    $lst_status = 3;
	} elseif ($ceklast_status->total_lststatus == 2 && $approval_status == 3) {
	    $lst_status = 2;
	} elseif ($ceklast_status->total_lststatus == 3 && $approval_status == 3) {
	    $lst_status = 2;
	} else {
	    $lst_status = $approval_status;
	}

	$data = array(
	    'laststatus_lse' => $lst_status,
	);
	$this->db->where('no_lse', $this->input->post('no_lse'));
	$this->db->from('ttrs_lse');
	$temp_requester = $this->db->get()->result()->requester;
	$requester = reset($temp_requester);
	$this->db->where('emp_id', $requester);
	$this->db->from('tmst_employee');
	$temp_branch = $this->db->get()->result()->branch_id;
	$branch = reset($temp_branch);

	$this->db->where('no_lse', $no_lse);
	$this->db->update($tbl_ttrs_lse, $data);

	// insert Approved By

	if ($lst_status == 3) { //if last status in transaction Approved, last status in Approved By "Approved"
	    $data = array(
		'status' => $approval_status,
		'last_status' => $lst_status,
		'respon_date' => $recdate,
		'fixed_approver' => $this->session->userdata('userid'),
		'remark' => $this->input->post('remark')
	    );

	    $this->db->where('id', $this->input->post('id_approval'));
	    $this->db->update($tbl_approvedby, $data);
	} else {
	    $data = array(
		'status' => $approval_status,
		'last_status' => $lst_status,
		'respon_date' => $recdate,
		'fixed_approver' => $this->session->userdata('userid'),
		'remark' => $this->input->post('remark')
	    );

	    $this->db->where('id', $this->input->post('id_approval'));
	    $this->db->update($tbl_approvedby, $data);
	}
    }

    public function MDL_ApproveAggrement($no_lse) {
	$tbl_ttrs_lse = $this->config->item('ttrs_lse');
	$user = $this->session->userdata('userid');

	$data = array(
	    'laststatus_lse' => $this->input->post('client_aggrement'),
	    'moddate' => date("Y-m-d H:i:s"),
	    'moduser' => $user
	);

	$this->db->where(array(
	    'no_lse' => $no_lse,
	));
	$this->db->update($tbl_ttrs_lse, $data);
    }

    public function MDL_LastStatus($id) {
	$tblapprovedby = $this->config->item('ttrs_approvedby');

	//$hasil = array();

	$sSQL = "       
            SELECT count(*) as total_lststatus
            FROM $tblapprovedby 
            WHERE request_no = '$id'
            AND status  <>  3
            ORDER BY id asc
        ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_SelectHistory($no_lse) {

	$hasil = array();
	$sSQL = "
                SELECT
                    a.*,
		    b.emp_name,
		    c.status_name
                FROM ttrs_lse_history_approval a
		    LEFT JOIN(SELECT emp_id, CONCAT(first_name,' ',middle_name,' ',last_name) AS emp_name FROM tmst_employee)b ON b.emp_id=a.userid
			LEFT JOIN(SELECT id, name AS status_name FROM tmst_typevar)c ON c.id=a.approval_status
                WHERE no_lse = '$no_lse'
                ORDER BY a.approval_date ASC 
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_Set_Void($no_lse, $void_notes) {
	$this->db->where('no_lse', $no_lse);
	$this->db->update('ttrs_lse', array('laststatus_lse' => 9, 'void_notes' => $void_notes));
    }

    public function MDL_Select_Uploaded_Document($client_id) {
	$tblclient = $this->config->item('tmst_client');

	$result = array();

	$sSQL = "
			SELECT * FROM tmst_client_document WHERE client_id= '$client_id'
		";

	$result = $this->db->query($sSQL)->row();

	return $result;
    }

}

?>