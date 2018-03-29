<?php

class Md_report_lse_lc extends CI_Model {

    public function __construct() {
	parent::__construct();
	$this->load->model('md_employee');
    }

    public function MDL_Select($start_date = '', $end_date = '') {
	$userid = $this->session->userdata('userid');
	$SQL = " SELECT d.loading_port_name,
			c.importer_name,
			b.npwp,b.address,b.client_name,
			a.*
			FROM ttrs_lse a 
			    JOIN tmst_client b
			    ON a.client_id = b.client_id 
			    JOIN tmst_importer c
			    ON c.importer_id = a.importer_id
			    JOIN tmst_loading_port d
			    ON a.loading_port_id = d.loading_port_code 
			WHERE a.recdate >= '$start_date'
			AND a.recdate <= '$end_date'";
	$result = $this->db->query($SQL)->result();

	return $result;
    }

    public function MDL_SelectReport($start_date = '', $end_date = '') {
	$userid = $this->session->userdata('userid');
	$SQL = " SELECT a.*,
			e.branch AS branch_name, e.address AS branch_address,
			d.loading_port_name,
			c.importer_name,
			b.npwp,b.address,
			b.client_name,
			SUM(f.quantity) AS SumQuantity, SUM(f.fas) AS SumFas
			FROM ttrs_lse a 
			    LEFT JOIN(SELECT * FROM tmst_client) b
			    ON a.client_id = b.client_id 
			    LEFT JOIN(SELECT * FROM tmst_importer) c
			    ON c.importer_id = a.importer_id
			    LEFT JOIN(SELECT * FROM tmst_loading_port) d
			    ON a.loading_port_id = d.loading_port_code
			    LEFT JOIN(SELECT * FROM tmst_branch)e
			    ON a.branch_id = e.id
			    LEFT JOIN(SELECT * FROM ttrs_lse_survres_hs)f ON a.no_lse = f.id_lse
			WHERE a.recdate >= '$start_date'
			AND a.recdate <= '$end_date'
			GROUP BY a.id";
	$result = $this->db->query($SQL)->result();

	return $result;
    }

}

?>
