<?php

class Md_create_account extends CI_Model {

    //validasi user exist
    public function MDL_IsUserNameExist($username) {
	$tbluser = $this->config->item('tmst_registration');
	$this->db->where('username', $username);
	$this->db->from('tmst_registration');
	$result = $this->db->get();
	//var_dump($result->result());exit();
	return $result->result();
    }

    public function MDL_InsertUser($goods) {
	
	$tblregis = $this->config->item('tmst_registration');
	$filepath_registration = $this->config->item('filepath_registration');

	$NRP = "";
	$NPB = "";
	$APP = "";
	$TDI = "";
	$NPWP = "";
	$SM = "";
	$PLM = "";
	$konfigurasi = array(
	    'upload_path' => $filepath_registration,
	    'allowed_types' => 'pdf',
	    'max_size' => 1200,
	    'remove_spaces' => FALSE,
	    'encrypt_name' => TRUE,
	);
	$this->load->library('upload', $konfigurasi);
	
	if (strlen($_FILES['APP']['name'])) {
	    if ($this->upload->do_upload('APP')) {
		$APP = $this->upload->data();
		$APP = $APP['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}

	if (strlen($_FILES['TDI']['name'])) {
	    if ($this->upload->do_upload('TDI')) {
		$TDI = $this->upload->data();
		$TDI = $TDI['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}

	if (strlen($_FILES['NPWP']['name'])) {
	    if ($this->upload->do_upload('NPWP')) {
		$NPWP = $this->upload->data();
		$NPWP = $NPWP['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}

	if (strlen($_FILES['SM']['name'])) {
	    if ($this->upload->do_upload('SM')) {
		$SM = $this->upload->data();
		$SM = $SM['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}

	if (strlen($_FILES['PLM']['name'])) {
	    if ($this->upload->do_upload('PLM')) {
		$PLM = $this->upload->data();
		$PLM = $PLM['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}


	/* data user step 3 wizard */
	
	$billing_name = $this->input->post('name');
	$billing_email = $this->input->post('email');
	$billing_address = $this->input->post('address');
	$billing_jobtitle = $this->input->post('both_jobtitle');
	$billing_phone = $this->input->post('phone');
	
	$username = $this->input->post('username_create_account');
	$password = MD5($this->input->post('password_create_account'));
	$email = $this->input->post('email_create_account');

	$date = date("Y-m-d H:i:s");
	$data = array(
	    'username' => $username,
	    'status' => '0',
	    'password' => $password,
	    'email' => $email,
	    'timestamp' => $date,
	    'client_type' => $goods,
	    'client_name' => $billing_name,
	    'client_email' => $billing_email,
	    'client_address' => $billing_address,
	    'client_jobtitle' => $billing_jobtitle,
	    'client_phone' => $billing_phone,
	    'client_email' => $billing_email,
	    'NRP' => $NRP,
	    'NPB' => $NPB,
	    'APP' => $APP,
	    'TDI' => $TDI,
	    'NPWP' => $NPWP,
	    'SM' => $SM,
	    'PLM' => $PLM,
        'recdate'=>$date
	);
	//$this->db->trans_start(); //Transaction
	
	$this->db->insert($tblregis, $data);
	$registration_id = $this->db->insert_id();

	$nrp_registration_no = $this->input->post('nrp_registration_no');
	$nrp_registration_date = $this->input->post('nrp_registration_date');
	$nrp_expiration_date = $this->input->post('nrp_expiration_date');
	$nrp_commodity = $this->input->post('nrp_commodity');
	$client_brand = $this->input->post('nrp_brand');
	$client_product = $this->input->post('nrp_product');

	
	if($nrp_registration_no[0]!=''){

	for ($i = 0; $i < count($_FILES['nrp_file_upload']['name']); $i++) {


	    $konfigurasi = array(
		'allowed_types' => 'pdf|jpeg|png|gif',
		'max_size' => 1200,
		'encrypt_name' => TRUE,
		'remove_spaces' => FALSE
	    );
	    $this->load->library('upload', $konfigurasi);

	    $_FILES['nrp_file_upload[]']['name'] = $_FILES['nrp_file_upload']['name'][$i];
	    $_FILES['nrp_file_upload[]']['tmp_name'] = $_FILES['nrp_file_upload']['tmp_name'][$i];
	    $_FILES['nrp_file_upload[]']['size'] = $_FILES['nrp_file_upload']['size'][$i];

	    $this->upload->set_upload_path($filepath_registration);
	    $res = $this->upload->do_upload('nrp_file_upload[]');
	    //echo $this->upload->data('file_name');
	    	
	    $datalicenseExporter = array(
			'pid'=>$registration_id,
			'registration_no' => $nrp_registration_no[$i],
			'registration_date' => $nrp_registration_date[$i],
			'expdate' => $nrp_expiration_date[$i],
			'commodity' => $nrp_commodity[$i],
			'brand' => $client_brand[$i],
			'product_type' => $client_product[$i],
			'type' => 'G001',
			'recdate'=> date("Y-m-d H:i:s"),
			'file_upload' => $this->upload->data('file_name')
	    );
	    	$this->db->insert('tmst_licenses_registration', $datalicenseExporter);
		}
	}

	$npb_registration_no = $this->input->post('npb_registration_no');
	$npb_registration_date = $this->input->post('npb_registration_date');
	$npb_expiration_date = $this->input->post('npb_expiration_date');
	$npb_commodity = $this->input->post('npb_commodity');
	$npb_brand = $this->input->post('npb_brand');
	$npb_product = $this->input->post('npb_product');
	
	if($npb_registration_no[0]!=''){
	for ($i = 0; $i < count($_FILES['npb_file_upload']['name']); $i++) {


	    $konfigurasi = array(
		'allowed_types' => 'pdf|jpeg|png|gif',
		'max_size' => 1200,
		'encrypt_name' => TRUE,
		'remove_spaces' => FALSE
	    );
	    $this->load->library('upload', $konfigurasi);

	    
	    $_FILES['npb_file_upload[]']['name'] = $_FILES['npb_file_upload']['name'][$i];
	    $_FILES['npb_file_upload[]']['tmp_name'] = $_FILES['npb_file_upload']['tmp_name'][$i];
	    $_FILES['npb_file_upload[]']['size'] = $_FILES['npb_file_upload']['size'][$i];

	    $this->upload->set_upload_path($filepath_registration);

	    $res = $this->upload->do_upload('npb_file_upload[]');
	    //echo $this->upload->data('file_name');
	   
	    //var_dump($res);

	    $datalicenseImporter = array(
		'pid'=>$registration_id,
		'registration_no' => $npb_registration_no[$i],
		'registration_date' => $npb_registration_date[$i],
		'expdate' => $npb_expiration_date[$i],
		'commodity' => $npb_commodity[$i],
		'brand' => $npb_brand[$i],
		'product_type' => $npb_product[$i],
		'type' => 'G002',
		'recdate'=> date("Y-m-d H:i:s"),
		'file_upload' => $this->upload->data('file_name')
	    );
	    
	    $this->db->insert('tmst_licenses_registration', $datalicenseImporter);
	}
	}
	$this->db->trans_complete(); //End transaction
        if ($this->db->trans_status() === FALSE) {
            // generate an error... or use the log_message() function to log your error
            echo ("error save request form..!!");
        }
	
    }

}

?>