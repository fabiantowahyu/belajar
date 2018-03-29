<?php

class Md_request_approval extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $tblrequestapproval = $this->config->item('tmst_requestapproval');

        $hasil = array();

        $sSQL = "
			SELECT id, request_name, remark 
			FROM $tblrequestapproval 
			WHERE 1=1 ORDER BY id
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    public function MDL_SelectID($id) {
        $tblrequestapproval = $this->config->item('tmst_requestapproval');

        return $this->db->get_where($tblrequestapproval, array('id' => $id))->row();
    }

	// Febriyanto
	public function MDL_SelectID_RequestApprovalDetail($id){
        $tblrequestapproval = $this->config->item('tmst_requestapproval');
        $tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');
        $tblemployee = $this->config->item('tmst_employee');
		
		$hasil = array();

        $sSQL = "
			SELECT 
			  rad.request_no,
			  CONCAT(
			    e.first_name,
			    ' ',
			    e.middle_name,
			    ' ',
			    e.last_name
			  ) AS requester_name,
			  rad.id,
			  rad.requester,
			  rad.approved_by,
			  rad.is_required,
			  rad.step_approval 
			FROM
			  $tblrequestapproval_detail AS rad 
			  INNER JOIN $tblemployee AS e 
			    ON rad.requester = e.emp_id 
			WHERE 1 
			  AND rad.request_no = '$id' 
			ORDER BY requester_name ASC,
			  rad.requester ASC,
			  rad.step_approval * 1 ASC
		";
		$ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
        	foreach ($ambil->result() as $data) {
        		
        		$hasil[] = $data;
        		
        	}
        }
        
        return $hasil;
	}
	
    public function MDL_SelectID_DetailApproval($id) {
        $tblrequestapproval = $this->config->item('tmst_requestapproval');
        $tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');
        $tblemployee = $this->config->item('tmst_employee');

        $hasil = array();

        $sSQL = "
			SELECT a.request_name,CONCAT(c.first_name,' ',c.middle_name,' ',c.last_name) as requester_name 
			FROM $tblrequestapproval a, $tblrequestapproval_detail b, $tblemployee c
			WHERE 1=1 
			AND a.id = b.request_no
			AND b.requester = c.emp_id
			ORDER BY b.request_no
		";

        $sSQL = "
			SELECT b.requester AS req_emp_id, b.approved_by AS app_emp_id, b.is_required
				, (
					SELECT CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name)
					FROM $tblemployee e
					WHERE e.emp_id = b.requester
				) AS req_emp_name
				, (
					SELECT CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name)
					FROM $tblemployee e
					WHERE e.emp_id = b.approved_by
				) AS app_emp_name
			FROM $tblrequestapproval_detail b
			WHERE 1=1 
				AND b.request_no = '$id'
			ORDER BY b.requester, b.approved_by
		";
		
        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            $req_emp_id = "";
            $req_emp_name = "";
            foreach ($ambil->result() as $data) {
                if ($req_emp_id != $data->req_emp_id) {
                    $req_emp_id = $data->req_emp_id;
                } else {
                    $data->req_emp_id = "";
                }
                if ($req_emp_name != $data->req_emp_name) {
                    $req_emp_name = $data->req_emp_name;
                } else {
                    $data->req_emp_name = "";
                }
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    public function MDL_Select_User() {
        $tblemployee = $this->config->item('tmst_employee');

        $hasil = array();

        $sSQL = "
			SELECT 
				emp_id,
				CONCAT(first_name,' ',middle_name,' ',last_name) as emp_name
			FROM 
				$tblemployee 
			WHERE 
				1=1 
			ORDER BY 
				emp_name ASC
		";
		
        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    public function MDL_Select_UserID($request_id, $requester, $step_approval) {
        $tblemployee = $this->config->item('tmst_employee');
        $tblrequestapproval = $this->config->item('tmst_requestapproval');
        $tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');

        $hasil = "";

        $sSQL = "
			SELECT c.approved_by,c.is_required
			FROM $tblrequestapproval b,$tblrequestapproval_detail c
			WHERE 1=1 
			AND b.id ='$request_id'
			AND b.id = c.request_no
			AND c.requester ='$requester'
			AND c.step_approval ='$step_approval'
		";
		/*echo $sSQL;
		echo "<hr/>";*/
        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil = $data;
            }
        }
        return $hasil;
    }

    public function MDL_Select_NotMember($gid, $item = '') {
        $tblemployee = $this->config->item('tmst_employee');
        $tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');

        $hasil = array();

        $FILTER = strlen($item) ? "AND (first_name LIKE '%$item%') OR (middle_name LIKE '%$item%') OR (last_name LIKE '%$item%')" : "";

        $sSQL = "
			SELECT emp_id,CONCAT(first_name,' ',middle_name,' ',last_name) as emp_name
			FROM $tblemployee 
			WHERE 1=1
				AND emp_id NOT IN (
					SELECT requester
					FROM $tblrequestapproval_detail
					WHERE request_no = '$gid'
				)
				$FILTER
			ORDER BY emp_name ASC
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    public function MDL_Select_Member($gid, $item = '') {
        $tblemployee = $this->config->item('tmst_employee');
        $tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');

        $hasil = array();
        $FILTER = strlen($item) ? "AND (emp_name LIKE '%$item%')" : "";

        $sSQL = "
			SELECT emp_id,CONCAT(first_name,' ',middle_name,' ',last_name) as emp_name
			FROM $tblemployee 
			WHERE 1=1
				AND emp_id IN (
					SELECT requester
					FROM $tblrequestapproval_detail
					WHERE request_no = '$gid'
				)
				$FILTER
			ORDER BY emp_name ASC
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;
    }

    public function MDL_Select_UserGroup($gid, $emp_id = '') {
        $tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');
        $rep_empid = str_replace(",", "','", $emp_id);

        $hasil = array();
        $sSQL = "
			SELECT id, requester
			FROM $tblrequestapproval_detail
			WHERE request_no = '$gid'
			-- AND requester IN ('$rep_empid')
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[$data->id] = $data->requester;
            }
        }
        return $hasil;
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
        $tblgroup = $this->config->item('tmst_group');

        $nama = $this->input->post('nama');
        $description = $this->input->post('description');
        $active = $this->input->post('active');
        $userid = $this->session->userdata('userid');
        $recdate = date("Y-m-d H:i:s");
        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");
        $data = array(
            'nama' => $nama,
            'description' => $description,
            'active' => $active,
            'userid' => $userid,
            'recdate' => $recdate,
            'moduser' => $moduser,
            'moddate' => $moddate
        );
        $this->db->insert($tblgroup, $data);
    }

    # Revisi 28 Feb 2014
    # By Tomo, ditambahkan trap supaya user approver yang sama tidak terinput

	// Febriyanto approver yang sama tidak terinput
    public function MDL_Update_Detail() {
        $tblrequestapproval_detail = $this->config->item('tmst_requestapproval_detail');

        $userid = $this->session->userdata('userid');
        $recdate = date("Y-m-d H:i:s");
        $moduser = $this->session->userdata('userid');
        $moddate = date("Y-m-d H:i:s");
        
        $id = $this->input->post('id');
        $emp_id = $this->input->post('emp_id');
        $selMember_value = $this->input->post('selMember_value');
        
        $type = $this->input->post('type');
        $Ary_approver = $this->input->post('approvalby');
        $Ary_approver_subs = $this->input->post('approvalby_subs');
        
        if($type*1==1){
        	$member_value = $emp_id;
        }
        else{
        	$member_value = $selMember_value;
        }
        
        foreach(explode(',',$member_value) as $key2 => $requester){
        	
        	if(!empty($requester)){
				
	        	//Delete dulu data yg lama
	        	$this->db->delete($tblrequestapproval_detail, array('request_no' => $id, 'requester' => $requester));
	        	
	        	$val_prev="";
		        $i = 1;
		        foreach($Ary_approver as $key => $val){
		        	
		        	if(!empty($val)){
		        		
		        		if($val_prev!=$val){
		        			
		        			$is_required = $this->input->post('is_required'.$i);
		        		
		        			$approved_by = "";
			        		$approved_by .= $val.',';
			        		
			        		if(!empty($Ary_approver_subs[$key])){
								$approved_by .= $Ary_approver_subs[$key].',';	
							}
			        		
			        		$sid = $this->get_counter_int($tblrequestapproval_detail, "id", 100);
			        		
			        		$data = array(
			                    'id' => $sid,
			                    'request_no' => $id,
			                    'requester' => $requester,
			                    'approved_by' => $approved_by,
			                    'step_approval' => $i,
			                    'is_required' => $is_required,
			                    'userid' => $userid,
			                    'recdate' => $recdate,
			                    'moduser' => $moduser,
			                    'moddate' => $moddate
			                );
			                
			                $this->db->insert($tblrequestapproval_detail, $data);					
						}
						
						$val_prev = $val;
					}
					
					$i++;
				}
			}
		}
		
		return ($this->db->affected_rows() > 0) ? TRUE : FALSE; 
    }

   public function get_counter_int($tbl_name, $pk, $limit = 100){
	   	$q = "
		   	SELECT
		   	" . $tbl_name . "." . $pk . "
		   	FROM
		   	" . $tbl_name . "
		   	ORDER BY
		   	" . $tbl_name . "." . $pk . "*1 DESC
		   	LIMIT 0," . $limit . "
	   	";

	   	$qry_id = $this->db->query($q);
	   	$jml_data = $qry_id->num_rows();

	   	$no = true;
	   	foreach($qry_id->result() as $r_id){
	   		if($no){
	   			$id = $r_id->$pk;
	   			$no = false;
	   		}

	   		$arr_data["list_id"][$r_id->$pk] = $r_id->$pk;
	   	}

	   	$prev_id = 0;

	   	if($jml_data != 0){
	   		foreach($arr_data["list_id"] as $list_id => $val){
	   			if($prev_id * 1 != 0){
	   				if(($prev_id - 1) != $val){
	   					$id = $val;
	   					break;
	   				}
	   			}
	   			$prev_id = $val;
	   		}
	   	} else{
	   		$id = 0;
	   	}
	   	$id = ($id * 1) + 1;

	   	return $id;
   }

    public function MDL_cekApproveID($reqno, $reqid, $appid) {
        $tblName = $this->config->item('tmst_requestapproval_detail');

        $res = $this->db->get_where($tblName, array('request_no' => $reqno, 'requester' => $reqid, 'approved_by' => $appid))->num_rows();

        if ($res) {
            return 0;
        } else {
            return 1;
        }
    }

    /*
      // Fungsi Hapus Data
      public function MDL_Delete($id) {
      $tblgroup = $this->config->item('tmst_group');
      $tblgroup_det = $this->config->item('tmst_group_det');

      $this->db->delete($tblgroup, array('id' => $id));
      $this->db->delete($tblgroup_det, array('pid' => $id));
      }

      // Fungsi Uniq ID
      public function MDL_nextuniqueid() {
      srand((double)microtime()*1000000);
      return sprintf("%s%06d",date("YmdHis"),rand(0, 999999));
      }

      public function MDL_isPermInsert($id){
      $tblName = $this->config->item('tmst_group');

      $res = $this->db->get_where($tblName, array('id' => $id))->num_rows();

      if($res) {
      return 0;
      } else {
      return 1;
      }
      }

      public function MDL_isPermDelete($id){
      $tblName = $this->config->item('tmst_users_group');

      //$res = $this->db->get_where($tblName, array('empstatus_id' => $id))->num_rows();
      $sSQL = "
      SELECT group_id FROM $tblName WHERE group_id = '$id' LIMIT 0,1
      ";

      $ambil = $this->db->query($sSQL);
      $res = $ambil->num_rows();

      if($res) {
      return 0;
      } else {
      return 1;
      }
      }
     */

    public function MDL_getEmployeeName($emp_id) {

        $sSQL = "select CONCAT(e.first_name,' ',e.middle_name,' ',e.last_name) as employee_name from tmst_employee e where emp_id='$emp_id'";

        $ambil = $this->db->query($sSQL)->row();

        return $ambil->employee_name;
    }

}

?>