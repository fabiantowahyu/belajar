<?php
class Md_costcenter extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tblcostcenter = $this->config->item('tmst_costcenter');

		$hasil = array();
		
		$sSQL = "
			SELECT id,costcenter_code,costcenter_name
			FROM $tblcostcenter 
			WHERE 1=1 
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

	public function MDL_SelectID($id){
		$tblcostcenter = $this->config->item('tmst_costcenter');
		
        return $this->db->get_where($tblcostcenter, array('id' => $id))->row();
    }

	// Fungsi Tambah Data
	public function MDL_Insert() {
		$tblcostcenter = $this->config->item('tmst_costcenter');

		$id = $this->auth->Auth_nextuniqueid();
		$costcenter_code = $this->input->post('costcenter_code');
		$costcenter_code = strtoupper($costcenter_code);
		$costcenter_name = $this->input->post('costcenter_name');
		
		
		$userid = $this->session->userdata('userid');
		$recdate = date("Y-m-d H:i:s");
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");

		$data = array(
			'id' => $id,
			'costcenter_code' => $costcenter_code,
			'costcenter_name' => $costcenter_name,
			'userid' => $userid,
			'recdate' => $recdate,
			'moduser' => $moduser,
			'moddate' => $moddate
			);
		$this->db->insert($tblcostcenter, $data);
	}

	// Fungsi Ubah Data
	public function MDL_Update($id){
		$tblcostcenter = $this->config->item('tmst_costcenter');

		$costcenter_name = $this->input->post('costcenter_name');
		
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");
		
		$data = array(
			'costcenter_name' => $costcenter_name,
			'moduser' => $moduser,
			'moddate' => $moddate
			);

        $this->db->where('id', $id);
        $this->db->update($tblcostcenter, $data);
    }

	public function MDL_isPermInsert($id){
		$tblcost_center = $this->config->item('tmst_costcenter');

		$res = $this->db->get_where($tblcost_center, array('costcenter_code' => $id))->num_rows();
		if($res) {
			return 0;
		} else {
			return 1;
		}
    }
	
	// Fungsi Hapus Data
	public function MDL_Delete($id) {
		$tblcost_center = $this->config->item('tmst_costcenter');
		
		$this->db->delete($tblcost_center, array('costcenter_code' => $id));
	}
	
	public function MDL_isPermDelete($id){
		//Nanti di set pada table transaksi
		$tblName = $this->config->item('tmst_employee');

		$sSQL = "
			SELECT cost_center FROM $tblName WHERE cost_center = '$id' LIMIT 0,1
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