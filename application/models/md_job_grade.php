<?php
class Md_job_grade extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tbljob_grade = $this->config->item('tmst_job_grade');

		$hasil = array();
		
		$sSQL = "
			SELECT id, grade_code, grade_name, currency, minimum_pay,mid_pay, maximum_pay
			FROM $tbljob_grade 
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
		$tbljob_grade = $this->config->item('tmst_job_grade');
		
        return $this->db->get_where($tbljob_grade, array('id' => $id))->row();
    }

	// Fungsi Tambah Data
	public function MDL_Insert() {
		$tbljob_grade = $this->config->item('tmst_job_grade');

		$id = $this->auth->Auth_nextuniqueid();
		$grade_code = $this->input->post('grade_code');
		$grade_code = strtoupper($grade_code);
		$grade_name = $this->input->post('grade_name');
		$currency = $this->input->post('currency');
		$min_pay = $this->input->post('minimum_pay');
		$minimum_pay = str_replace(",","",$min_pay);
		$middle_pay = $this->input->post('midpay');
		$mid_pay = str_replace(",","",$middle_pay);
		$max_pay = $this->input->post('maximum_pay');
		$maximum_pay = str_replace(",","",$max_pay);
		
		$userid = $this->session->userdata('userid');
		$recdate = date("Y-m-d H:i:s");
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");

		$data = array(
			'id' => $id,
			'grade_code' => $grade_code,
			'grade_name' => $grade_name,
			'currency' => $currency,
			'minimum_pay' => $minimum_pay,
			'mid_pay' => $mid_pay,
			'maximum_pay' => $maximum_pay,
			'userid' => $userid,
			'recdate' => $recdate,
			'moduser' => $moduser,
			'moddate' => $moddate
			);
		$this->db->insert($tbljob_grade, $data);
	}

	// Fungsi Ubah Data
	public function MDL_Update($id){
		$tbljob_grade = $this->config->item('tmst_job_grade');

		$grade_name = $this->input->post('grade_name');
		$currency = $this->input->post('currency');
		$min_pay = $this->input->post('minimum_pay');
		$minimum_pay = str_replace(",","",$min_pay);
		$middle_pay = $this->input->post('midpay');
		$mid_pay = str_replace(",","",$middle_pay);
		$max_pay = $this->input->post('maximum_pay');
		$maximum_pay = str_replace(",","",$max_pay);
		
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");
		
		$data = array(
			'grade_name' => $grade_name,
			'currency' => $currency,
			'minimum_pay' => $minimum_pay,
			'mid_pay' => $mid_pay,
			'maximum_pay' => $maximum_pay,
			'moduser' => $moduser,
			'moddate' => $moddate
			);

        $this->db->where('id', $id);
        $this->db->update($tbljob_grade, $data);
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id) {
		$tbljob_grade = $this->config->item('tmst_job_grade');
		
		$this->db->delete($tbljob_grade, array('id' => $id));
	}

	public function MDL_isPermInsert($id){
		$tbljob_grade = $this->config->item('tmst_job_grade');

		$res = $this->db->get_where($tbljob_grade, array('grade_code' => $id))->num_rows();
		
		if($res) {
			return 0;
		} else {
			return 1;
		}
    }
	
	public function MDL_isPermDelete($id){
		//Nanti di set pada table transaksi
		$tblName = $this->config->item('tmst_employee');

		$sSQL = "
			SELECT grade_id FROM $tblName WHERE grade_id = '$id' LIMIT 0,1
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