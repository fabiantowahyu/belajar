<?php
class Md_branch extends CI_Model {

	// Fungsi Ambil Data
	public function MDL_Select($where=FALSE) {
		$tblbranch = $this->config->item('tmst_branch');
		$tblcompany = $this->config->item('tmst_company');

		$hasil = array();
		
		$where_search = "";
		if($where)
		{
			$where_search = $this->md_branch->where_array($where, "b.id", $type="in");	;	
		}
		
		$sSQL = "
			SELECT b.id, b.branch, b.address, b.phone, b.email, b.fax, c.name as company, c.type
			FROM $tblbranch b 
				LEFT JOIN $tblcompany c ON c.id = b.company_id
			WHERE 1=1 ".$where_search." 
			ORDER BY b.id
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
		$tblbranch = $this->config->item('tmst_branch');

        return $this->db->get_where($tblbranch, array('id' => $id))->row();
    }

	// Fungsi Tambah Data
	public function MDL_Insert() {
		$tblbranch = $this->config->item('tmst_branch');

		$id = $this->input->post('id');
		$branch = $this->input->post('branch');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$fax = $this->input->post('fax');
		$company_id = $this->input->post('company_id');
		$authorized_sign = $this->input->post('invoice_signature');

		$userid = $this->session->userdata('userid');
		$recdate = date("Y-m-d H:i:s");
		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");

		$data = array(
			'id' => $id,
			'branch' => $branch,
			'address' => $address,
			'phone' => $phone,
			'email' => $email,
			'fax' => $fax,
			'company_id' => $company_id,
			'authorized_sign' => $authorized_sign,
			'userid' => $userid,
			'recdate' => $recdate,
			'moduser' => $moduser,
			'moddate' => $moddate
			);
		$this->db->insert($tblbranch, $data);
	}

	// Fungsi Ubah Data
	public function MDL_Update($id){
		$tblbranch = $this->config->item('tmst_branch');
        
		//$id = $this->input->post('id');
		$branch = $this->input->post('branch');
		$address = $this->input->post('address');
		$phone = $this->input->post('phone');
		$email = $this->input->post('email');
		$fax = $this->input->post('fax');
		$company_id = $this->input->post('company_id');
		$authorized_sign = $this->input->post('invoice_signature');

		$moduser = $this->session->userdata('userid');
		$moddate = date("Y-m-d H:i:s");
		$data = array(
			'branch' => $branch,
			'address' => $address,
			'phone' => $phone,
			'email' => $email,
			'fax' => $fax,
			'company_id' => $company_id,
			'authorized_sign' => $authorized_sign,
			'moduser' => $moduser,
			'moddate' => $moddate
			);

        $this->db->where('id', $id);
        $this->db->update($tblbranch, $data);
    }

	// Fungsi Hapus Data
	public function MDL_Delete($id) {
		$tblbranch = $this->config->item('tmst_branch');

		$this->db->delete($tblbranch, array('id' => $id));
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
		$tblName = $this->config->item('tmst_branch');

		//$res = $this->db->get_where($tblName, array('empstatus_id' => $id))->num_rows();
		$sSQL = "
			SELECT id FROM $tblName WHERE id = '$id' LIMIT 0,1
		";

		$ambil = $this->db->query($sSQL);
		$res = $ambil->num_rows();

		if($res) {
			return 0;
		} else {
			return 1;
		}
    }

	public function MDL_getAutoID() {
		$tblbranch = $this->config->item('tmst_branch');

		$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(id,5,5) AS UNSIGNED INTEGER) AS num
				FROM $tblbranch
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

		$hasil = sprintf("BRNC%05d",$no_urut);

		return $hasil;	
	}
	
    public function get_stock_branch($arr_branch,$arr_item)
    {
    	unset($hasil);
    	
		$tblsetminstock = $this->config->item('tmst_set_min_stock');

		$hasil = array();
		
		$where_branch = "";
		if(count($arr_branch)*1>0)
		{
			$where_branch = $this->md_branch->where_array($arr_branch, "".$tblsetminstock.".branch_id", $type="in");	;	
		}
		
		$where_item = "";
		if(count($arr_item)*1>0)
		{
			$where_item = $this->md_branch->where_array($arr_item, "".$tblsetminstock.".item_code", $type="in");	;	
		}
		
		$sSQL = "
			SELECT 
			  ".$tblsetminstock.".id,
			  ".$tblsetminstock.".branch_id,
			  ".$tblsetminstock.".item_code,
			  ".$tblsetminstock.".min_stock,
			  ".$tblsetminstock.".max_stock,
			  ".$tblsetminstock.".available_stock,
			  ".$tblsetminstock.".uom,
			  ".$tblsetminstock.".stock_awal 
			FROM
			  ".$tblsetminstock." 
			WHERE 
			  1
			  ".$where_branch." 
			  ".$where_item." 
			ORDER BY ".$tblsetminstock.".branch_id ASC,
			  ".$tblsetminstock.".item_code ASC
		";
		//echo $sSQL;
		$ambil = $this->db->query($sSQL);
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				
				$hasil["min_stock"][$data->branch_id][$data->item_code] = $data->min_stock;
				$hasil["max_stock"][$data->branch_id][$data->item_code] = $data->max_stock;
				$hasil["available_stock"][$data->branch_id][$data->item_code] = $data->available_stock;
				$hasil["uom"][$data->branch_id][$data->item_code] = $data->uom;
				$hasil["stock_awal"][$data->branch_id][$data->item_code] = $data->stock_awal;
			}
		}
		
		return $hasil;
	}
	
	public function get_logstock($arr_branch=FALSE,$arr_item=FALSE,$startdate,$enddate)
	{
    	unset($arr_return);
    	
		$tblloghistory = $this->config->item('ttrs_loghistory');

		$arr_return = array();
		
		$where_branch = "";
		if(count($arr_branch)*1>0)
		{
			$where_branch = $this->md_branch->where_array($arr_branch, "".$tblloghistory.".branch_id", $type="in");	;	
		}
		
		$where_item = "";
		if(count($arr_item)*1>0)
		{
			$where_item = $this->md_branch->where_array($arr_item, "".$tblloghistory.".item_code", $type="in");	;	
		}
		
		$sSQL = "
			SELECT 
			  ".$tblloghistory.".branch_id,
			  ".$tblloghistory.".item_code,
			  ".$tblloghistory.".quantity,
			  ".$tblloghistory.".request_no 
			FROM
			  ".$tblloghistory."
			WHERE 
			  1 
			  ".$where_branch."
			  ".$where_item."
			  AND ".$tblloghistory.".created_date BETWEEN '".$startdate."' AND '".$enddate."' 
			ORDER BY ".$tblloghistory.".branch_id ASC,
			  ".$tblloghistory.".item_code ASC,
			  ".$tblloghistory.".quantity * 1 ASC
		";
		//echo $sSQL;
		$ambil = $this->db->query($sSQL);
		if ($ambil->num_rows() > 0) {
			foreach ($ambil->result() as $data) {
				
				if(substr($data->quantity,0,1)=="-")
				{
					$arr_return["out_stock"][$data->branch_id][$data->item_code] += $data->quantity;	
				}
				
				if(substr($data->quantity,0,1)=="+")
				{
					$arr_return["in_stock"][$data->branch_id][$data->item_code] += $data->quantity;	
				}
			}
		}
		
		return $arr_return;
	}
	
	public function where_array($list_array, $kolom, $type="in")
	{
	    $where = "";
	    if($type=="in")
	    {
	    	if(is_array($list_array))
	    	{
		        foreach($list_array as $key=>$val)
		        if($where == "")
		        {
		            $where .= " AND (".$kolom." = '".$val."' ";
		        }    
		        else
		        {
		            $where .= " OR ".$kolom." = '".$val."' ";    
		        }
		        
		        if($where)
		        {
		            $where .= ")";
		        }
			}
	    }
	    else if($type=="not in")
	    {
	    	if(is_array($list_array))
	    	{
		        foreach($list_array as $key=>$val)
		        if($where == "")
		        {
		            $where .= " AND (".$kolom." != '".$val."' ";
		        }    
		        else
		        {
		            $where .= " OR ".$kolom." != '".$val."' ";
		        }
		        
		        if($where)
		        {
		            $where .= ")";
		        }
		    }    
	    }
	    
	    return $where;
	}

}
?>