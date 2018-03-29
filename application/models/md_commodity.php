<?php
class md_commodity extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tblcommodity = $this->config->item('tmst_commodity');
		
		$hasil = array();
		
		$sSQL = "
			SELECT a.id,a.commodity_name,a.sni,a.scheme
			FROM $tblcommodity a
			WHERE 1=1 
			ORDER BY commodity_name ASC
		";
		
		$ambil = $this->db->query($sSQL);
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				$hasil[] = $data;
			}
		}
		return $hasil;	
	}

	public function MDL_SelectID($id){
		$tblcommodity = $this->config->item('tmst_commodity');
		
        return $this->db->get_where($tblcommodity, array('id' => $id))->row();
    }

	// Fungsi Tambah Data
	public function MDL_Insert() {
		$tblcommodity = $this->config->item('tmst_commodity');

		$commodity_name = $this->input->post('commodity_name');
		$scheme = implode(",", $this->input->post('schema'));
		$sni = $this->input->post('sni');
		
		$userid = $this->session->userdata('userid');
		$recdate = date("Y-m-d H:i:s");
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");

		$data = array(
			'commodity_name'=> $commodity_name,
			'sni' 			=> $sni,
			'scheme'		=> $scheme,
			'userid' 		=> $userid,
			'recdate' 		=> $recdate,
			'moduser' 		=> $moduser,
			'moddate' 		=> $moddate
			);

		$this->db->insert($tblcommodity, $data);
	}

	// Fungsi Ubah Data
	public function MDL_Update($id){
		$tblcommodity = $this->config->item('tmst_commodity');

        $commodity_name = $this->input->post('commodity_name');
		$sni = $this->input->post('sni');
		
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");
		
		$data = array(
            'commodity_name' => $commodity_name,
			'sni' => $sni,
			'moduser' => $moduser,
			'moddate' => $moddate
			);

        $this->db->where('id', $id);
        $this->db->update($tblcommodity, $data);
    }

	public function MDL_isPermInsert($commodity_name){
		$tblcommodity = $this->config->item('tmst_commodity');

		$res = $this->db->get_where($tblcommodity, array('commodity_name' => $commodity_name))->num_rows();
		if($res) {
			return 0;
		} else {
			return 1;
		}
    }
	
	// Fungsi Hapus Data
	public function MDL_Delete($id) {
		$tblcommodity = $this->config->item('tmst_commodity');
		
		$this->db->delete($tblcommodity, array('id' => $id));
	}
	
	public function MDL_isPermDelete($id){
		//Nanti di set pada table transaksi
		$tblName = $this->config->item('tmst_employee');

		$sSQL = "
			SELECT country FROM $tblName WHERE country = '$id' LIMIT 0,1
		";
		
		$ambil = $this->db->query($sSQL);
		$res = $ambil->num_rows();
		
		if($res) {
			return 0;
		} else {
			return 1;
		}
		
		
    } 
	
	public function MDL_CekField($field,$id='') {
		$tbljob_grade = $this->config->item('tmst_job_grade');

		$fvalue = $_REQUEST['fvalue'];
        $res = ($fvalue == $id) ? 0 : $this->db->get_where($tbljob_grade, array($field => $fvalue))->num_rows();

		if(!$res) {
			return true;
		} else {
			return false;
		}
    }

	/*
	public function MDL_getAutoID() {
		$tbljob_grade = $this->config->item('tmst_job_grade');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(Equipment_Id,5,5) AS UNSIGNED INTEGER) AS num
				FROM $tbljob_grade
			) p
			WHERE 1=1
		";

		$ambil = $this->db->query($sSQL);
		if ($ambil->num_rows() > 0) {
			$data = $ambil->row();
			$no_urut = $data->no_urut + 1;
		} else {
			$no_urut = 1;
		}

		$hasil = sprintf("EQP%05d",$no_urut);

		return $hasil;	
	}
	*/
}
?>