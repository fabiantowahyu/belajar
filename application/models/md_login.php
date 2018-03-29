<?php
class md_login extends CI_Model {

	// Fungsi Tambah Data
	public function MDL_Insert() {
		$tblcommodity = $this->config->item('tmst_commodity');

		$commodity_name = $this->input->post('commodity_name');
		//$country_code = strtoupper($country_code);
		$sni = $this->input->post('sni');
		
		$userid = $this->session->userdata('userid');
		$recdate = date("Y-m-d H:i:s");
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");

		$data = array(
			'commodity_name' => $commodity_name,
			'sni' => $sni,
			'userid' => $userid,
			'recdate' => $recdate,
			'moduser' => $moduser,
			'moddate' => $moddate
			);
		$this->db->insert($tblcommodity, $data);
	}
	
}
?>