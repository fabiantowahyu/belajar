<?php

class Md_lse extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select($start_date, $end_date) {
	$tblLse = $this->config->item('ttrs_lse');
	$tblImporter = $this->config->item('tmst_importer');
	$tblClient = $this->config->item('tmst_client');
	$tblBranch = $this->config->item('tmst_branch');
	$tblLoadingPort = $this->config->item('tmst_loading_port');
	$tblCountry = $this->config->item('tmst_country');
	$user = $this->session->userdata('userid');
	$type = $this->session->userdata('type');
	$tbltypevar = $this->config->item('tmst_typevar');

	if ($type == 'usr') {
	    $AND = "AND a.userid='$user'";
	} else {
	    $AND = "";
	}

	// Add 1 days
	$end_date = date('Y-m-d', strtotime($end_date . "+1 days"));

	$hasil = array();
	$sSQL = "
                SELECT
                    a.id, a.no_lse, a.date_issued, a.date_expired, a.date_expired, a.port_destination, a.laststatus_lse, a.lastdate_lse,
                    b.importer_id, b.country as country_importer, b.npwp, b.importer_name, b.address as importer_address,
                    c.client_id, c.country, c.client_name, c.npwp as exporter_npwp, c.address as exporter_address,
                    d.id as id_branch, d.branch,
                    e.id as id_lpc, e.loading_port_code, e.loading_port_name,
                    f.id as id_country, f.country_code, f.country_name,
                    g.id as id_typevar, g.name as name_typevar,
                    t.nm_type as status_lse
                FROM
                    $tblLse a
                    LEFT JOIN(SELECT * FROM $tblImporter)b ON b.importer_id = a.importer_id
                    LEFT JOIN(SELECT * FROM $tblClient)c ON c.client_id = a.client_id
                    LEFT JOIN(SELECT * FROM $tblBranch)d ON d.id = a.branch_id 
                    LEFT JOIN(SELECT * FROM $tblLoadingPort)e ON e.loading_port_code = a.loading_port_id
                    LEFT JOIN(SELECT * FROM $tblCountry)f ON f.country_code = a.country_id
                    LEFT JOIN(SELECT * FROM $tbltypevar)g ON g.id = a.laststatus_lse
                    LEFT JOIN (SELECT id, name as nm_type FROM $tbltypevar WHERE table_name = 'REQUEST_STATUS') t ON t.id = a.laststatus_lse
                WHERE 1=1
                    AND a.recdate >= '$start_date'
                    AND a.recdate <= '$end_date'
                    $AND
                ORDER BY a.id ASC 
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil['data'][] = $data;
	    }
	    return $hasil;
	} else {
	    return $hasil['data'] = array('data' => []);
	}

	// print_r($hasil);di();
    }

    //3 agustus 2017 5:04 pm Fungsi Survei Result Table C-1
    public function MDL_SelectSR1($id) {
	$tblLse = $this->config->item('ttrs_lse');
	$tblHS = $this->config->item('ttrs_lse_survres_hs');
	$hasil = array();
	$sSQL = "
                SELECT
                    a.id as lse_id, a.no_lse, a.no_mining_license,
                    b.id as id_hs, b.hs, b.description, b.quantity, b.fas, b.id_lse, b.no_mining_license as no_minlic
                FROM
                    $tblLse a,
                    $tblHS b
                WHERE b.id_lse='$id' 
                    AND b.id_lse = a.no_lse
                ORDER BY b.id ASC
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    //4 agustus 2017 10:35 am Fungsi Total Survei Result Table C-1
    public function MDL_SelectTSR1($id) {
	$tblHS = $this->config->item('ttrs_lse_survres_hs');
	$hasil = array();
	$sSQL = "
                SELECT
                    sum(b.quantity) as total_quantity,
                    sum(b.fas) as total_fas
                FROM
                    $tblHS b
                WHERE b.id_lse='$id'
                ORDER BY b.id ASC
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    //4 agustus 2017 10:35 am Fungsi Survei Result Table C-2
    public function MDL_SelectSR2($id) {
	$tblProvince = $this->config->item('tmst_province');
	$tblClient = $this->config->item('tmst_client');
	$tblLse = $this->config->item('ttrs_lse');
	$tblRoyalty = $this->config->item('ttrs_lse_survres_royalty');
	$hasil = array();
	$sSQL = "
                SELECT
                    a.id as id_province, a.province_code, a.province_name,
                    b.client_id, b.client_name, b.npwp, b.province,
                    c.id as id_lse, no_lse,
                    d.id as id_roy, d.royalty_dp, d.id_lse, d.client_id
                FROM
                    $tblProvince a,
                    $tblClient b,
                    $tblLse c,
                    $tblRoyalty d
                WHERE d.id_lse='$id' 
                    AND d.id_lse = c.no_lse
                    AND d.client_id = b.client_id
                    AND b.province = a.province_code
                ORDER BY d.id ASC
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_getTemplateEmail($id) {
	$tblemail_template = $this->config->item('tmst_template_email');

	return $this->db->get_where($tblemail_template, array('id' => $id, 'status' => 1))->row();
    }

    public function MDL_getEmailTo($reqid) {
	$tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');
	$tblemployee = $this->config->item('tmst_employee');
	$userid = $this->session->userdata('userid');

	$hasil = array();

	$sSQL = "
            SELECT u.emp_id, u.email
            FROM $tblemployee u, $tblrequestapproval_detail e
            WHERE u.emp_id IN (trim(TRAILING',' FROM e.approved_by))
                AND e.requester = '$userid'
                AND e.request_no ='1'
                AND u.email != ''
        ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data->email;
	    }
	}

	return $hasil;
    }

    //4 agustus 2017 10:35 am Fungsi Total Survei Result Table C-2
    public function MDL_SelectTSR2($id) {
	$tblRoyalty = $this->config->item('ttrs_lse_survres_royalty');
	$hasil = array();
	$sSQL = "
                SELECT
                    sum(d.royalty_dp) as total_royalty_dp
                FROM
                    $tblRoyalty d
                WHERE d.id_lse='$id'
                ORDER BY d.id ASC
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    //4 agustus 2017 1:39 pm Fungsi Survei Result Table C-3
    public function MDL_SelectSR3($id) {
	$tblLse = $this->config->item('ttrs_lse');
	$tblRoyalty = $this->config->item('ttrs_lse_survres_cal');
	$hasil = array();
	$sSQL = "
                SELECT
                    a.id as id_lse, no_lse,
                    b.id as id_cal, b.cal_arb, b.cal_adb, b.tm_arb, b.t_ash_adb, b.t_sulfur_adb, b.klasifikasi_batubara, b.ket, b.id_lse
                FROM
                    $tblLse a,
                    $tblRoyalty b
                WHERE b.id_lse='$id' 
                    AND b.id_lse = a.no_lse
                ORDER BY b.id ASC
                ";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
	$tbllse = $this->config->item('ttrs_lse');
	$data = array(
	    'id' => $this->input->post('id'),
	    'no_lse' => $this->input->post('no_lse'),
	    'date_issued' => $this->input->post('date_issued'),
	    'date_expired' => $this->input->post('date_expired'),
	    'branch_id' => $this->input->post('branch_id'),
	    'no_reg_exporter' => $this->input->post('no_reg_exporter'),
	    'date_reg_exporter' => $this->input->post('date_reg_exporter'),
	    'client_id' => $this->input->post('client_id'),
	    'no_wo' => $this->input->post('no_wo'),
	    'date_wo' => $this->input->post('date_wo'),
	    'survey_location_date' => $this->input->post('survey_location_date'),
	    'survey_location' => $this->input->post('survey_location'),
	    'no_packing_list' => $this->input->post('no_packing_list'),
	    'date_packing_list' => $this->input->post('date_packing_list'),
	    'no_invoice_packing_list' => $this->input->post('no_invoice_packing_list'),
	    'date_invoice_packing_list' => $this->input->post('date_invoice_packing_list'),
	    'importer_id' => $this->input->post('importer_id'),
	    'loading_port_id' => $this->input->post('loading_port_id'),
	    'country_id' => $this->input->post('country_id'),
	    'port_destination' => $this->input->post('port_destination'),
	    'vessel_name' => $this->input->post('vessel_name'),
	    'stdate_load_vessel' => $this->input->post('stdate_load_vessel'),
	    'enddate_load_vessel' => $this->input->post('enddate_load_vessel'),
	    'no_mining_license' => $this->input->post('no_mining_license'),
	    'date_mining_license' => $this->input->post('date_mining_license'),
	    'no_transsell_license' => $this->input->post('no_transsell_license'),
	    'date_transsell_license' => $this->input->post('date_transsell_license'),
	    'no_smelter_license' => $this->input->post('no_smelter_license'),
	    'date_smelter_license' => $this->input->post('date_smelter_license'),
	    'no_royalty_payment' => $this->input->post('no_royalty_payment'),
	    'date_royalty_payment' => $this->input->post('date_royalty_payment'),
	    'no_lc' => $this->input->post('no_lc'),
	    'date_lc' => $this->input->post('date_lc'),
	    'lc_type' => $this->input->post('lc_type'),
	    'lastdate_lse' => date("Y-m-d H:i:s"),
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	);

	$this->db->insert($tbllse, $data);
    }

    public function MDL_SelectID($id) {
	$tblLse = $this->config->item('ttrs_lse');
	$tblImporter = $this->config->item('tmst_importer');
	$tblClient = $this->config->item('tmst_client');
	$tblBranch = $this->config->item('tmst_branch');
	$tblLoadingPort = $this->config->item('tmst_loading_port');
	$tblCountry = $this->config->item('tmst_country');
	$tbltypevar = $this->config->item('tmst_typevar');
	$tblhs = $this->config->item('ttrs_lse_survres_hs');
	$sSQL = "
                SELECT
                    a.*,
                    b.importer_id, b.country as country_importer, b.npwp, b.importer_name, b.address as importer_address,
                    c.client_id, c.country, c.client_name,c.phone,c.fax, c.npwp as exporter_npwp, c.address as exporter_address,
                    d.id as id_branch, d.branch,
                    e.id as id_lpc, e.loading_port_code, e.loading_port_name,
                    f.id as id_country, f.country_code, f.country_name,
                    g.id as id_typevar, g.name as name_typevar,
                    h.id as id_hs, h.hs, h.id_lse, sum(h.fas) as total_fas,
		    i.requester_name
                FROM
                    $tblLse a
                    LEFT JOIN(SELECT * FROM $tblImporter)b ON b.importer_id = a.importer_id
                    LEFT JOIN(SELECT * FROM $tblClient)c ON c.client_id = a.client_id
                    LEFT JOIN(SELECT * FROM $tblBranch)d ON d.id = a.branch_id 
                    LEFT JOIN(SELECT * FROM $tblLoadingPort)e ON e.loading_port_code = a.loading_port_id
                    LEFT JOIN(SELECT * FROM $tblCountry)f ON f.country_code = a.country_id
                    LEFT JOIN(SELECT * FROM $tbltypevar)g ON g.id = a.laststatus_lse
                    LEFT JOIN(SELECT * FROM $tblhs)h ON h.id_lse = a.no_lse
		    LEFT JOIN(SELECT emp_id, CONCAT(first_name,' ',middle_name,' ',last_name) AS requester_name FROM tmst_employee)i ON i.emp_id = a.userid
                WHERE a.no_lse='$id'
                ORDER BY a.id ASC 
                ";
	$ambil = $this->db->query($sSQL);
	return $ambil->row();
    }

    public function MDL_SelectID_SR1($id) {
	$tbllse = $this->config->item('ttrs_lse');
	$tblhs = $this->config->item('ttrs_lse_survres_hs');
	$sSQL = "
                SELECT
                    a.id as id_hs, a.hs, a.description, a.quantity, a.fas, a.no_mining_license, a.id_lse, 
                    b.id as lse, b.no_lse
                FROM
                    $tblhs a
                    LEFT JOIN(SELECT * FROM $tbllse)b ON b.no_lse = a.id_lse
                WHERE a.id='$id' 
                ORDER BY a.id ASC 
                ";
	$ambil = $this->db->query($sSQL);
	return $ambil->row();
    }

    public function MDL_SelectID_SR2($id) {
	$tbllse = $this->config->item('ttrs_lse');
	$tblroy = $this->config->item('ttrs_lse_survres_royalty');
	$tblClient = $this->config->item('tmst_client');
	$sSQL = "
                SELECT
                    a.id as id_roy, a.royalty_dp, a.id_lse,
                    b.id as id_lse, b.no_lse,
                    c.client_id, c.country, c.client_name, c.npwp as exporter_npwp, c.address as exporter_address
                FROM
                    $tblroy a
                    LEFT JOIN(SELECT id , no_lse FROM $tbllse)b ON b.no_lse = a.id_lse
                    LEFT JOIN(SELECT * FROM $tblClient)c ON c.client_id = a.client_id
                WHERE a.id='$id' 
                ORDER BY a.id ASC 
                ";
	$ambil = $this->db->query($sSQL);
	return $ambil->row();
    }

    public function MDL_SelectID_SR3($id) {
	$tbllse = $this->config->item('ttrs_lse');
	$tblcal = $this->config->item('ttrs_lse_survres_cal');
	$sSQL = "
                SELECT
                    a.id as id_cal, a.cal_arb, a.cal_adb, a.tm_arb, a.t_ash_adb, a.t_sulfur_adb, a.klasifikasi_batubara, a.ket, a.id_lse, 
                    b.id as id_lse, b.no_lse
                FROM
                    $tblcal a
                    LEFT JOIN(SELECT * FROM $tbllse)b ON b.no_lse = a.id_lse
                WHERE a.id='$id' 
                ORDER BY a.id ASC 
                ";
	$ambil = $this->db->query($sSQL);
	return $ambil->row();
    }

    // Fungsi Ubah Data
    public function MDL_Update($id) {

	$tbllse = $this->config->item('ttrs_lse');
	$z = $this->input->post('cargo_type');

	if (empty($z)) {
	    $data = array(
		'date_issued' => $this->input->post('date_issued'),
		'date_expired' => $this->input->post('date_expired'),
		'branch_id' => $this->input->post('branch_id'),
		'no_reg_exporter' => $this->input->post('no_reg_exporter'),
		'date_reg_exporter' => $this->input->post('date_reg_exporter'),
		'client_id' => $this->input->post('client_id'),
		'no_wo' => $this->input->post('no_wo'),
		'date_wo' => $this->input->post('date_wo'),
		'survey_location_date' => $this->input->post('survey_location_date'),
		'survey_location' => $this->input->post('survey_location'),
		'no_packing_list' => $this->input->post('no_packing_list'),
		'date_packing_list' => $this->input->post('date_packing_list'),
		'no_invoice_packing_list' => $this->input->post('no_invoice_packing_list'),
		'date_invoice_packing_list' => $this->input->post('date_invoice_packing_list'),
		'importer_id' => $this->input->post('importer_id'),
		'loading_port_id' => $this->input->post('loading_port_id'),
		'country_id' => $this->input->post('country_id'),
		'port_destination' => $this->input->post('port_destination'),
		'vessel_name' => $this->input->post('vessel_name'),
		'stdate_load_vessel' => $this->input->post('stdate_load_vessel'),
		'enddate_load_vessel' => $this->input->post('enddate_load_vessel'),
		'no_mining_license' => $this->input->post('no_mining_license'),
		'date_mining_license' => $this->input->post('date_mining_license'),
		'no_transsell_license' => $this->input->post('no_transsell_license'),
		'date_transsell_license' => $this->input->post('date_transsell_license'),
		'no_smelter_license' => $this->input->post('no_smelter_license'),
		'date_smelter_license' => $this->input->post('date_smelter_license'),
		'no_royalty_payment' => $this->input->post('no_royalty_payment'),
		'date_royalty_payment' => $this->input->post('date_royalty_payment'),
		'no_lc' => $this->input->post('no_lc'),
		'date_lc' => $this->input->post('date_lc'),
		'lc_type' => $this->input->post('lc_type'),
		'lastdate_lse' => date("Y-m-d H:i:s"),
		'userid' => $this->session->userdata('userid'),
		'recdate' => date("Y-m-d H:i:s"),
		'moduser' => $this->session->userdata('userid'),
		'moddate' => date("Y-m-d H:i:s")
	    );
	} else {
	    $data = array(
		//7 agustus 2017 10:36
		'mode_transport' => $this->input->post('mode_transport'),
		'cargo_type' => $this->input->post('cargo_type'),
		'container_numseal' => $this->input->post('container_numseal'),
		'note' => $this->input->post('note')
	    );
	}

	$this->db->where('no_lse', $id);
	$this->db->update($tbllse, $data);
    }

    // 8 agustus 2017 9:27 am
    public function MDL_New_SR1($id) {
	$tblsr1 = $this->config->item('ttrs_lse_survres_hs');
	$data = array(
	    'hs' => $this->input->post('hs'),
	    'description' => $this->input->post('description'),
	    'quantity' => str_replace(',', '', $this->input->post('quantity')),
	    'fas' => str_replace(',', '', $this->input->post('fas')),
	    'no_mining_license' => $this->input->post('no_mining_license'),
	    'id_lse' => $id,
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	    'moduser' => $this->session->userdata('userid'),
	    'moddate' => date("Y-m-d H:i:s")
	);


	$tbllse = $this->config->item('ttrs_lse');
	$data2 = array(
	    'lastdate_lse' => date("Y-m-d H:i:s")
	);
	$this->db->where('id', $id);
	$this->db->update($tbllse, $data2);
	$this->db->insert($tblsr1, $data);
    }

    // 9 agustus 2017 1:47 pm
    public function MDL_Edit_SR1($id_hs, $no_lse) {
	$tblsr1 = $this->config->item('ttrs_lse_survres_hs');
	$data3 = array(
	    'hs' => $this->input->post('hs'),
	    'description' => $this->input->post('description'),
	    'quantity' => str_replace(',', '', $this->input->post('quantity')),
	    'fas' => str_replace(',', '', $this->input->post('fas')),
	    'no_mining_license' => $this->input->post('no_mining_license'),
	    'id_lse' => $no_lse,
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	    'moduser' => $this->session->userdata('userid'),
	    'moddate' => date("Y-m-d H:i:s")
	);
	$this->db->where('id', $id_hs);
	$this->db->update($tblsr1, $data3);
    }

    // 8 agustus 2017 9:27 am
    public function MDL_New_SR2($id) {
	$tblsr2 = $this->config->item('ttrs_lse_survres_royalty');
	$data = array(
	    'royalty_dp' => str_replace(',', '', $this->input->post('royalty_dp')),
	    'client_id' => $this->input->post('client_id'),
	    'id_lse' => $id,
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	    'moduser' => $this->session->userdata('userid'),
	    'moddate' => date("Y-m-d H:i:s")
	);
	$this->db->insert($tblsr2, $data);
    }

    public function MDL_Edit_SR2($id_roy, $no_lse) {
	$tblsr2 = $this->config->item('ttrs_lse_survres_royalty');
	$data = array(
	    'royalty_dp' => str_replace(',', '', $this->input->post('royalty_dp')),
	    'client_id' => $this->input->post('client_id'),
	    'id_lse' => $no_lse,
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	    'moduser' => $this->session->userdata('userid'),
	    'moddate' => date("Y-m-d H:i:s")
	);
	$this->db->where('id', $id_roy);
	$this->db->update($tblsr2, $data);
    }

    // 8 agustus 2017 9:27 am
    public function MDL_New_SR3($id) {
	$tblsr3 = $this->config->item('ttrs_lse_survres_cal');
	$cal_arb = str_replace(',', '', $this->input->post('cal_arb'));
	$data = array(
	    'cal_arb' => $cal_arb,
	    'cal_adb' => str_replace(',', '', $this->input->post('cal_adb')),
	    'tm_arb' => str_replace(',', '', $this->input->post('tm_arb')),
	    't_ash_adb' => str_replace(',', '', $this->input->post('t_ash_adb')),
	    't_sulfur_adb' => str_replace(',', '', $this->input->post('t_sulfur_adb')),
	    'klasifikasi_batubara' => $this->input->post('klasifikasi_batubara'),
	    'ket' => $this->input->post('ket'),
	    'id_lse' => $id,
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	    'moduser' => $this->session->userdata('userid'),
	    'moddate' => date("Y-m-d H:i:s")
	);
	$this->db->insert($tblsr3, $data);
    }

    /// 9 agustus 2017 1:47 pm
    public function MDL_Edit_SR3($id_roy, $id_lse) {
	$tblsr3 = $this->config->item('ttrs_lse_survres_cal');
	$data = array(
	    'cal_arb' => str_replace(',', '', $this->input->post('cal_arb')),
	    'cal_adb' => str_replace(',', '', $this->input->post('cal_adb')),
	    'tm_arb' => str_replace(',', '', $this->input->post('tm_arb')),
	    't_ash_adb' => str_replace(',', '', $this->input->post('t_ash_adb')),
	    't_sulfur_adb' => str_replace(',', '', $this->input->post('t_sulfur_adb')),
	    'klasifikasi_batubara' => $this->input->post('klasifikasi_batubara'),
	    'ket' => $this->input->post('ket'),
	    'id_lse' => $id_lse,
	    'userid' => $this->session->userdata('userid'),
	    'recdate' => date("Y-m-d H:i:s"),
	    'moduser' => $this->session->userdata('userid'),
	    'moddate' => date("Y-m-d H:i:s")
	);
	$this->db->where('id', $id_roy);
	$this->db->update($tblsr3, $data);
    }

    public function MDL_isPermInsert($id) {
	$tblName = $this->config->item('ttrs_lse');
	$res = $this->db->get_where($tblName, array('no_lse' => $id))->num_rows();

	if ($res) {
	    return 0;
	} else {
	    return 1;
	}
    }

    public function MDL_Delete($id) {
	$tblse = $this->config->item('ttrs_lse');
	$tblhs = $this->config->item('ttrs_lse_survres_hs');
	$tblroy = $this->config->item('ttrs_lse_survres_royalty');
	$tblcal = $this->config->item('ttrs_lse_survres_cal');

	$this->db->delete($tblse, array('no_lse' => $id));
	$this->db->delete($tblhs, array('id_lse' => $id));
	$this->db->delete($tblroy, array('id_lse' => $id));
	$this->db->delete($tblcal, array('id_lse' => $id));
    }

    public function MDL_Delete_SR1($id_hs) {
	$tblhs = $this->config->item('ttrs_lse_survres_hs');
	$this->db->delete($tblhs, array('id' => $id_hs));
    }

    public function MDL_Delete_SR2($id_roy) {
	$tblroy = $this->config->item('ttrs_lse_survres_royalty');
	$this->db->delete($tblroy, array('id' => $id_roy));
    }

    public function MDL_Delete_SR3($id_cal) {
	$tblcal = $this->config->item('ttrs_lse_survres_cal');
	$this->db->delete($tblcal, array('id' => $id_cal));
    }

    public function MDL_getAutoID() {
	$tbllse = $this->config->item('ttrs_lse');

	$sSQL = "
			SELECT MAX(a.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(no_lse,5,5) AS UNSIGNED INTEGER) AS num
				FROM $tbllse
			) a
			WHERE 1=1
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    $data = $ambil->row();
	    $no_urut = $data->no_urut + 1;
	} else {
	    $no_urut = 1;
	}

	$hasil = sprintf($no_urut);

	return $hasil;
    }

    public function MDL_getAutoID2() {
	$tbllse = $this->config->item('ttrs_lse');

	$sSQL = "
			SELECT MAX(a.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(no_lse,5,5) AS UNSIGNED INTEGER) AS num
				FROM $tbllse
			) a
			WHERE 1=1
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    $data = $ambil->row();
	    $no_urut = $data->no_urut + 1;
	} else {
	    $no_urut = 1;
	}

	$hasil = sprintf("LS%05d", $no_urut);

	return $hasil;
    }

    public function select_region_by_countryID($country_code) {
	$tbl_province = $this->config->item('tmst_country');

	$query = $this->db->query("SELECT 
              a.country_code,
              a.country_name
            FROM
              $tbl_province a 
            WHERE  a.country_code = '$country_code'
            ORDER BY a.country_name asc");

	// echo $this->db->last_query();die();
	return $query->result();
    }

    public function select_region($country_code) {
	$tbl_province = $this->config->item('tmst_province');
	$query = $this->db->query(" SELECT 
            a.country_code,
            a.province_name,
            a.province_code

            FROM $tbl_province a

            WHERE a.country_code = '$country_code' 
            ORDER BY a.province_name asc");
	return $query->result();
    }

    // 1 agustus 2017 10:17
    public function MDL_SelectExporter() {
	$tbl_exporter = $this->config->item('tmst_client');
	$user_id = $this->session->userdata('userid');
	$hasil = array();
	$sSQL = "
                SELECT a.*
		FROM $tbl_exporter a
		WHERE 1=1 
		";
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	    return $hasil;
	}
    }

    // 1 agustus 2017 11:16
    public function MDL_SelectImporter() {
	$tbl_importer = $this->config->item('tmst_importer');
	$user_id = $this->session->userdata('userid');
	$hasil = array();
	$sSQL = "
                SELECT a.*
		FROM $tbl_importer a
		WHERE 1=1 
		";
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	    return $hasil;
	}
    }

    // 4 agustus 2017 08:54
    public function MDL_SelectTransport() {
	$tbl_transport = $this->config->item('tmst_typevar');
	$hasil = array();
	$sSQL = "
                SELECT a.id, a.name, a.table_name
		FROM $tbl_transport a
		WHERE table_name='TRANSPORT' 
		";
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	    return $hasil;
	}
    }

    // 4 agustus 2017 08:54
    public function MDL_SelectCargo() {
        $tbl_cargo = $this->config->item('tmst_typevar');
        $hasil = array();
        $sSQL = "
    SELECT a.id, a.name, a.table_name
    FROM $tbl_cargo a
    WHERE table_name='CARGO_TYPE'
    ";
        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function MDL_SelectDocument() {
	$tmst_typevar = $this->config->item('tmst_typevar');
	$hasil = array();
	$sSQL = "
                SELECT a.id, a.name, a.table_name
		FROM $tmst_typevar a
		WHERE table_name='DOCUMENT_UPLOAD' order by 2
		";
	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	    return $hasil;
	}
    }

    public function MDL_Upload_Document($no_lse,$id) {
	$ttrs_lse = $this->config->item('ttrs_lse');
	$filepath_client_document = $this->config->item('filepath_client_document');
	$document_type = $this->input->post('document_type');
        $moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$konfigurasi = array(
	    'upload_path' => $filepath_client_document,
	    'allowed_types' => 'pdf',
	    'max_size' => 1200,
	    'remove_spaces' => FALSE,
	    'encrypt_name' => FALSE,
	);

	$file_name = "";

	$this->load->library('upload', $konfigurasi);

	if (strlen($_FILES['file_upload']['name'])) {
	    if ($this->upload->do_upload('file_upload')) {
		$file_name = $this->upload->data();
		$file_name = $file_name['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.history.back();</script>";
die();
//redirect('lse/CTRL_Edit/' . $no_lse . '/' . $id . '/#FormDocument');
		//return array(false, $this->upload->display_errors());die();
	    }
	}

	$data = array(
	    $document_type => $file_name
	);
	$this->db->where('no_lse', $no_lse);
	$this->db->update($ttrs_lse, $data);
        
        
        if($this->input->post('no_pveb') || $this->input->post('tgl_pveb')){
            
            $data2 = array(
	    'date_pveb' => $this->input->post('date_pveb'),
            'no_pveb' => $this->input->post('no_pveb'),
            'moduser' => $moduser,
	    'moddate' => $moddate
	);
	$this->db->where('no_lse', $no_lse);
	$this->db->update($ttrs_lse, $data2);
        
        $this->UpdateDataClient($this->input->post('client_id'),$data2);
            
        }
    }

    function MDL_Approval_LSE($id) {
	$tbl_lse = $this->config->item('ttrs_lse');
	$tbl_approvedby = $this->config->item('ttrs_approvedby');
	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$results_approver = $this->md_lse->MDL_Approver();
	//$result['approver_email'] = $results_approver['approver_email'];
	//$result['requester_name'] = $this->md_employee->MDL_SelectByID($moduser)->emp_id;
	//unset($results_approver['approver_email']);
	//unset($results_approver['requester_name']);

	$data = array(
	    'laststatus_lse' => 1,
	    'lastdate_lse' => $moddate,
	    'moduser' => $moduser,
	    'moddate' => $moddate
	);
	$this->db->where('no_lse', $id);
	$this->db->update($tbl_lse, $data);

	if (count($results_approver) > 0) {
	    foreach ($results_approver as $row) {
		$data = array(
		    'requestapproval_id' => 1,
		    'request_no' => $id,
		    'status' => 1,
		    'recdate' => date("Y-m-d H:i:s"),
		    'last_status' => 1,
		    'request_for' => $row->requester,
		    'approved_by' => $row->approved_by
		);
		$cek_request = $this->MDL_SelectApprover($id);
		if (count($cek_request) > 0) {
		    $this->db->delete($tbl_approvedby, array('request_no' => $id));
		    $this->db->insert($tbl_approvedby, $data);
		} else {
		    $this->db->insert($tbl_approvedby, $data);
		}
	    }
	    $result['status'] = TRUE;
	    return $result;
	} else {
	    $result['status'] = FALSE;
	    return $result;
	}
    }

    public function MDL_Approver() {
	$tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');
	$tbl_user = $this->config->item('tmst_users');
	$userid = $this->session->userdata('userid');
	$hasil = array();
	$sSQL = "       
            SELECT requester,approved_by
            FROM $tblrequestapproval_detail
            WHERE requester ='$userid'
            AND request_no ='1'
            ORDER BY id asc
        ";
	$ambil = $this->db->query($sSQL)->result();
	//if ($ambil->num_rows() > 0) {
	// $j = 0;
	//$approver_email = array();
	//foreach ($ambil->result() as $data) {
	//$approve = explode(',', $data->approved_by);
	//for ($i = 0; $i < count($approve); $i++) {
	//$approver_email[$j] = $this->md_employee->MDL_SelectByID($approve[$i])->email;
	//$j++;
	//}
	//$hasil[] = $data;
	//}
	//}
	//$hasil['approver_email'] = $approver_email;
	return $ambil;
    }

    public function MDL_SelectApprover($id) {
	$this->db->from('ttrs_approvedby a');
	$this->db->join('tmst_employee e', 'a.fixed_approver = e.emp_id', 'left');
	$this->db->join('tmst_position p', 'e.position_id = p.position_id', 'left');
	$this->db->where('a.request_no', $id);
	$result = $this->db->get();
	$result = $result->result();
	return $result;
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

     public function MDL_UpdateRefnumberSuccess($no_lse, $refnumber) {

	$tbllse = $this->config->item('ttrs_lse');

	    $data = array(
		
		'refnumber' => $refnumber,
		'moduser' => $this->session->userdata('userid'),
		'moddate' => date("Y-m-d H:i:s")
	    );
	

	$this->db->where('no_lse', $no_lse);
	$this->db->update($tbllse, $data);
    }
    
    public function UpdateDataClient($client_id, $data) {
        
        $tmst_client_document = $this->config->item('tmst_client_document');
        
        $this->db->where('client_id', $client_id);
	$this->db->update($tmst_client_document, $data);
        
    }
    
}

?>
