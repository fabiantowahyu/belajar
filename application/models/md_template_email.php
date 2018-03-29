<?php
class Md_template_email extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select() {
		$tbltemplate_email = $this->config->item('tmst_template_email');
		$tbltypevar = $this->config->item('tmst_typevar');

		$hasil = array();
		
		$sSQL = "
			SELECT a.id, a.name, a.status as sts, IF(a.status=1,'Active','Not Active') AS status
				, b.name AS type
			FROM $tbltemplate_email a
				,( SELECT id, name FROM $tbltypevar WHERE table_name = 'TMPEMAIL_TYPE' ) b
			WHERE 1=1
				AND a.type = b.id
			ORDER BY a.name
		";
		
		$ambil = $this->db->query($sSQL);
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				$data->status = ($data->sts==1) 
					? '<span class="label label-primary arrowed-in-right">' . $data->status . '</span>' 
					: '<span class="label label-warning arrowed-in-right">' . $data->status . '</span>';
				$hasil[] = $data;
			}
		}
		return $hasil;
	}
    
	public function MDL_SelectID($id,$type=''){
		$tbltemplate_email = $this->config->item('tmst_template_email');
		$tbltmpemail_param = $this->config->item('tmst_template_email_param');
		
		if($type == "parameter") {
			return $this->db->get_where($tbltmpemail_param, array('id' => $id))->row();
		} else {
			return $this->db->get_where($tbltemplate_email, array('id' => $id))->row();
		}
		
       
    }

	// Fungsi Tambah Data
	public function MDL_Insert() {
		$tbltemplate_email = $this->config->item('tmst_template_email');

		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$content = $this->input->post('content');
		$status = $this->input->post('status');
		
		$userid = $this->session->userdata('userid');
		$recdate = date("Y-m-d H:i:s");
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");

		$data = array(
			'name' => $name,
			'type' => $type,
			'content' => $content,
			'status' => $status,
			'userid' => $userid,
			'recdate' => $recdate,
			'moduser' => $moduser,
			'moddate' => $moddate
			);
		$this->db->insert($tbltemplate_email, $data);
	}

	// Fungsi Ubah Data
	public function MDL_Update($id){
		$tbltemplate_email = $this->config->item('tmst_template_email');

		$name = $this->input->post('name');
		$type = $this->input->post('type');
		$content = $this->input->post('content');
		$status = $this->input->post('status');
		
		$userid = $this->session->userdata('userid');
		$recdate = date("Y-m-d H:i:s");
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");
		
		$data = array(
			'name' => $name,
			'type' => $type,
			'content' => $content,
			'status' => $status,
			'moduser' => $moduser,
			'moddate' => $moddate
			);

        $this->db->where('id', $id);
        $this->db->update($tbltemplate_email, $data);
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id) {
		$tbltemplate_email = $this->config->item('tmst_template_email');

		$this->db->delete($tbltemplate_email, array('id' => $id));
	}

	
	public function MDL_isPermInsert($id){
		$tblName = $this->config->item('tmst_branch');

		$res = $this->db->get_where($tblName, array('id' => $id))->num_rows();

		if($res) {
			return 0;
		} else {
			return 1;
		}
    }

	public function MDL_isPermDelete($id){
		$tblName = $this->config->item('tmst_laboratory');

		return 1;
		//$res = $this->db->get_where($tblName, array('empstatus_id' => $id))->num_rows();
		/* $sSQL = "
			SELECT branch_id FROM $tblName WHERE branch_id = '$id' LIMIT 0,1
		";

		$ambil = $this->db->query($sSQL);
		$res = $ambil->num_rows();

		if($res) {
			return 0;
		} else {
			return 1;
		} */
    }

	public function MDL_getAutoID() {
		$tbl_email = $this->config->item('tmst_template_email');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id,5,5) AS UNSIGNED INTEGER) AS num
				FROM $tbl_email
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

		$hasil = sprintf("WRKS%05d",$no_urut);

		return $hasil;	
	}

}
?>