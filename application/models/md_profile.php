<?php
class Md_profile extends CI_Model {


	
	public function MDL_SelectID(){
		
		
		return $this->db->get_where('tmst_client', array('client_id' => 'CLI00112'))->row();
		
		
    }
    
    public function MDL_SelectIDEmployee() {
	$hasil = "";
		
		$sSQL = "
			select tmst_employee.*, tmst_branch.branch from tmst_employee left join tmst_branch on tmst_employee.branch_id=tmst_branch.id where tmst_employee.emp_id='EMP00001'
	
	
		";
		$ambil = $this->db->query($sSQL);
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				$hasil = $data;
			}
		}
		return $hasil;	
		
		//$ambil = $this->db->query($sSQL);
		//print_r($ambil->result());die();
		//$hasil = reset($ambil->result());
		//return $hasil;	
		
		//return $this->db->get_where('tmst_employee', array('emp_id' => 'EMP00001'))->row();
		
	}

		
}
?>