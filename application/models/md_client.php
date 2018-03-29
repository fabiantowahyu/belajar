<?php

class Md_client extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
	$tblclient = $this->config->item('tmst_client');
	$tbltypevar = $this->config->item('tmst_typevar');

	$hasil = array();

	$sSQL = "
			SELECT c.client_id,c.client_name, c.pic, c.hp, c.phone, c.fax, c.email, c.address, c.npwp
			FROM $tblclient c
			WHERE 1=1 
			ORDER BY c.client_name ASC
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_NewClient($client) {
	$result = $this->db->insert('tmst_client', $client);
	return $result;
    }

    public function MDL_SelectID($id) {
	$tblclient = $this->config->item('tmst_client');

	$tblName = $tblclient;

	return $this->db->get_where($tblName, array('client_id' => $id))->row();
    }

    public function MDL_SelectIDAddress($pid, $id) {
	$tblcust_address = $this->config->item('tmst_cust_address');

	$tblName = $tblcust_address;

	return $this->db->get_where($tblName, array('id' => $id))->row();
    }

    public function MDL_SelectIDPIC($pid, $id) {
	$tblcust_pic = $this->config->item('tmst_cust_pic');

	$tblName = $tblcust_pic;

	return $this->db->get_where($tblName, array('id' => $id))->row();
    }

    //PIC
    public function MDL_Select_PIC($id) {
	$tblcust_pic = $this->config->item('tmst_cust_pic');
	$tbltypevar = $this->config->item('tmst_typevar');

	$hasil = array();

	$sSQL = "
			SELECT p.id, p.contact_name, p.email, p.fax, p.hp, p.work_phone, t.name as category_name
			FROM $tblcust_pic p,
				( SELECT id, name FROM $tbltypevar WHERE table_name = 'CATEGORY_PIC' ) t
			WHERE 1=1
				AND t.id = p.category
				AND p.client_id = '$id'
			ORDER BY p.id
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_Insert_PIC() {
	$tblcust_pic = $this->config->item('tmst_cust_pic');

	$id = $this->auth->Auth_nextuniqueid();
	$client_id = $this->input->post('client_id');
	$category = $this->input->post('category');
	$contact_name = $this->input->post('contact_name');
	$email = $this->input->post('email');
	$fax = $this->input->post('fax');
	$hp = $this->input->post('hp');
	$work_phone = $this->input->post('work_phone');

	$userid = $this->session->userdata('userid');
	$recdate = date("Y-m-d H:i:s");
	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$data = array(
	    'id' => $id,
	    'client_id' => $client_id,
	    'contact_name' => $contact_name,
	    'email' => $email,
	    'fax' => $fax,
	    'hp' => $hp,
	    'work_phone' => $work_phone,
	    'category' => $category,
	    'userid' => $userid,
	    'recdate' => $recdate,
	    'moduser' => $moduser,
	    'moddate' => $moddate
	);

	$this->db->insert($tblcust_pic, $data);
    }

    public function MDL_Update_PIC($id) {
	$tblcust_pic = $this->config->item('tmst_cust_pic');

	$category = $this->input->post('category');
	$contact_name = $this->input->post('contact_name');
	$email = $this->input->post('email');
	$fax = $this->input->post('fax');
	$hp = $this->input->post('hp');
	$work_phone = $this->input->post('work_phone');

	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$data = array(
	    'contact_name' => $contact_name,
	    'email' => $email,
	    'fax' => $fax,
	    'hp' => $hp,
	    'work_phone' => $work_phone,
	    'category' => $category,
	    'moduser' => $moduser,
	    'moddate' => $moddate
	);

	$this->db->where('id', $id);
	$this->db->update($tblcust_pic, $data);
    }

    public function MDL_Delete_PIC($id) {
	$tblcust_pic = $this->config->item('tmst_cust_pic');

	$this->db->delete($tblcust_pic, array('id' => $id));
    }

    //Address
    public function MDL_Delete_Address($id) {
	$tblcust_address = $this->config->item('tmst_cust_address');

	$this->db->delete($tblcust_address, array('id' => $id));
    }

    public function MDL_Select_Address($id) {
	$tblcust_address = $this->config->item('tmst_cust_address');
	$tbltypevar = $this->config->item('tmst_typevar');

	$hasil = array();

	$sSQL = "
			SELECT p.id, p.def_shipping, p.def_billing, p.residential, p.label, p.attention, p.addressee
				, IF(p.def_shipping=1,'Yes','No') AS shipping, IF(p.def_billing=1,'Yes','No') AS billing
				, IF(p.residential=1,'Yes','No') AS residential_lbl
				, p.phone, p.city, p.province, p.country, p.post_code, p.address
			FROM $tblcust_address p
			WHERE 1=1
				AND p.client_id = '$id'
			ORDER BY p.id
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$hasil[] = $data;
	    }
	}
	return $hasil;
    }

    public function MDL_Insert_Address() {
	$tblcust_address = $this->config->item('tmst_cust_address');

	$id = $this->auth->Auth_nextuniqueid();
	$client_id = $this->input->post('client_id');
	if ($this->input->post('def_shipping') == '1') {
	    $def_shipping = '1';
	} else {
	    $def_shipping = '0';
	}

	if ($this->input->post('def_billing') == '1') {
	    $def_billing = '1';
	} else {
	    $def_billing = '0';
	}

	$residential = $this->input->post('residential');
	$label = $this->input->post('label');
	$attention = $this->input->post('attention');
	$addressee = $this->input->post('addressee');
	$phone = $this->input->post('phone');
	$city = $this->input->post('city');
	$province = $this->input->post('province');
	$country = $this->input->post('country');
	$post_code = $this->input->post('post_code');
	$address = $this->input->post('address');
	//$override = $this->input->post('override');

	$userid = $this->session->userdata('userid');
	$recdate = date("Y-m-d H:i:s");
	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	foreach ($province as $key) {
	    if ($key) {

		$data = array(
		    'id' => $id,
		    'client_id' => $client_id,
		    'def_shipping' => $def_shipping,
		    'def_billing' => $def_billing,
		    'label' => $label,
		    'attention' => $attention,
		    'phone' => $phone,
		    'city' => $city,
		    'province' => $province[0],
		    'country' => $country,
		    'post_code' => $post_code,
		    'address' => $address,
		    'userid' => $userid,
		    'recdate' => $recdate,
		    'moduser' => $moduser,
		    'moddate' => $moddate
		);

		$this->db->insert($tblcust_address, $data);
	    }
	}
    }

    public function MDL_Update_Address($id) {
	$tblcust_address = $this->config->item('tmst_cust_address');

	//$address_id = $this->input->post('address_id');
	//$client_id = $this->input->post('client_id');
	$def_shipping = $this->input->post('def_shipping');
	$def_billing = $this->input->post('def_billing');
	$label = $this->input->post('label');
	$attention = $this->input->post('attention');
	$phone = $this->input->post('phone');
	$city = $this->input->post('city');
	$province = $this->input->post('province');
	$country = $this->input->post('country');
	$post_code = $this->input->post('post_code');
	$address = $this->input->post('address');
	//$override = $this->input->post('override');

	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	foreach ($province as $key) {
	    if ($key) {

		$data = array(
		    'def_shipping' => $def_shipping,
		    'def_billing' => $def_billing,
		    'label' => $label,
		    'attention' => $attention,
		    'phone' => $phone,
		    'city' => $city,
		    'province' => $province[0],
		    'country' => $country,
		    'post_code' => $post_code,
		    'address' => $address,
		    'moduser' => $moduser,
		    'moddate' => $moddate
		);

		$this->db->where('id', $id);
		$this->db->update($tblcust_address, $data);
	    }
	}
    }

    public function MDL_defaultShipping($id) {
	$tblName = $this->config->item('tmst_cust_address');

	$res = $this->db->get_where($tblName, array('client_id' => $id, 'def_shipping' => 1))->row();

	return $res;
    }

    public function MDL_defaultBilling($id) {
	$tblName = $this->config->item('tmst_cust_address');

	$res = $this->db->get_where($tblName, array('client_id' => $id, 'def_billing' => 1))->row();

	return $res;
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
	$tblclient = $this->config->item('tmst_client');

	$id = $this->input->post('id');
	$client = $this->input->post('client');
	$pic = $this->input->post('pic');
	$npwp_address = $this->input->post('npwp_address');
	$priority = $this->input->post('priority');
	$email = $this->input->post('email');
	$hp = $this->input->post('hp');
	$phone = $this->input->post('phone');
	$fax = $this->input->post('fax');
	$postal_code = $this->input->post('postal_code');
	$province = $this->input->post('province');
	$country = $this->input->post('country');
	$address = $this->input->post('address');
	$npwp = $this->input->post('npwp');

	$type = $this->input->post('type');

	$userid = $this->session->userdata('userid');
	$recdate = date("Y-m-d H:i:s");
	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$data = array(
	    'client_id' => $id,
	    'client_name' => $client,
	    'type' => $type,
	    'pic' => $pic,
	    'npwp_address' => $npwp_address,
	    //'priority' => $priority,
	    'email' => $email,
	    //'hp' => $hp,
	    'phone' => $phone,
	    'fax' => $fax,
	    'postcode' => $postal_code,
	    'province' => $province,
	    'address' => $address,
	    'npwp' => $npwp,
	    'userid' => $userid,
	    'recdate' => $recdate,
	    'moduser' => $moduser,
	    'moddate' => $moddate
	);

	$this->db->insert($tblclient, $data);
    }

    // Fungsi Ubah Data
    public function MDL_Update($id) {
	$tblclient = $this->config->item('tmst_client');

	//$id = $this->input->post('id');
	$client = $this->input->post('client');
	$type = $this->input->post('type');
	$pic = $this->input->post('pic');
	$category = $this->input->post('category');
	$priority = $this->input->post('priority');
	$email = $this->input->post('email');
	$hp = $this->input->post('hp');
	$phone = $this->input->post('phone');
	$fax = $this->input->post('fax');
	$postcode = $this->input->post('postal_code');
	$province = $this->input->post('province');
	$country = $this->input->post('country');
	$address = $this->input->post('address');
	$npwp = $this->input->post('npwp');

	$userid = $this->session->userdata('userid');
	$recdate = date("Y-m-d H:i:s");
	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$data = array(
	    'client_name' => $client,
	    'type' => $type,
	    'pic' => $pic,
	    'category' => $category,
	    'priority' => $priority,
	    'email' => $email,
	    'hp' => $hp,
	    'phone' => $phone,
	    'fax' => $fax,
	    'postcode' => $postcode,
	    'province' => $province,
	    'country' => $country,
	    'address' => $address,
	    'npwp' => $npwp,
        'npwp_address' => $this->input->post('npwp_address'),
	    'moduser' => $moduser,
	    'moddate' => $moddate
	);

	$this->db->where('client_id', $id);
	$this->db->update($tblclient, $data);
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id) {
	$tblclient = $this->config->item('tmst_client');

	$this->db->delete($tblclient, array('client_id' => $id));
    }

    //=====================================================================
    public function MDL_isPermInsert($id) {
	$tblName = $this->config->item('tmst_client');

	$res = $this->db->get_where($tblName, array('client_id' => $id))->num_rows();

	if ($res) {
	    return 0;
	} else {
	    return 1;
	}
    }

    public function MDL_isPermInsert_Address($id) {
	$tblName = $this->config->item('tmst_cust_address');

	$res = $this->db->get_where($tblName, array('id' => $id))->num_rows();

	if ($res) {
	    return 0;
	} else {
	    return 1;
	}
    }

    public function MDL_isPermDelete($id) {
	$tblName = $this->config->item('ttrs_so');

	return 1;
	//$res = $this->db->get_where($tblName, array('empstatus_id' => $id))->num_rows();
	$sSQL = "
			SELECT client_id FROM $tblName WHERE client_id = '$id' LIMIT 0,1
		";

	$ambil = $this->db->query($sSQL);
	$res = $ambil->num_rows();

	if ($res) {
	    return 1;
	} else {
	    return 0;
	}
    }

    public function MDL_getAutoID() {
	$tblclient = $this->config->item('tmst_client');

	$hasil = array();
	$tmpData = array();
	$jum = 0;


	$sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(client_id,4,5) AS UNSIGNED INTEGER) AS num
				FROM $tblclient
			) p
			WHERE 1=1
		";

	$ambil = $this->db->query($sSQL);
	if ($ambil->num_rows() > 0) {
	    foreach ($ambil->result() as $data) {
		$no_urut = $data->no_urut + 1;
	    }
	} else {
	    $no_urut = 1;
	}

	$nom_jo = sprintf("CLI%05d", $no_urut);

	return $nom_jo;
    }

    /* public function MDL_Ajax_CekID(){
      $tblName = $this->config->item('tmst_cust_address');

      $fvalue = $_REQUEST['address_id'];
      $res = $this->db->get_where($tblName, array('address_id' => $fvalue))->num_rows();

      if(!$res) {
      return true;
      } else {
      return false;
      }
      } */

    public function select_region_by_countryID($country_code) {
	$tbl_province = $this->config->item('tmst_country');

	$query = $this->db->query("SELECT 
              a.country_code,
              a.country_name
            FROM
              $tbl_province a 
            WHERE  a.country_code = '$country_code'
            ORDER BY a.country_name asc");

	// echo $this->db->last_query();die();
	return $query->result();
    }

    public function select_region($country_code) {
	$tbl_province = $this->config->item('tmst_province');
	$query = $this->db->query(" SELECT 
            a.country_code,
            a.province_name,
            a.province_code

            FROM $tbl_province a

            WHERE a.country_code = '$country_code' 
            ORDER BY a.province_name asc");
	return $query->result();
    }

    public function MDL_Select_Uploaded_Document($client_id) {
	$tblclient = $this->config->item('tmst_client');


	$result = array();

	$sSQL = "
			SELECT * FROM tmst_client_document WHERE client_id= '$client_id'
		";

	$result = $this->db->query($sSQL)->row();

	return $result;
    }

    public function MDL_UpdateDocumentData($client_id) {
	$tblclient = $this->config->item('tmst_client');


	$is_exist = $this->db->get_where('tmst_client_document', array('client_id' => $client_id))->row();

	if ($is_exist) {


	    $this->UpdateClientDocument($client_id);
	} else {

	    $this->InsertClientDocument($client_id);
	}
    }

    public function UpdateClientDocument($client_id) {

	$filepath_client_document = $this->config->item('filepath_client_document');

	$konfigurasi = array(
	    'upload_path' => $filepath_client_document,
	    'allowed_types' => 'pdf',
	    'max_size' => 1200,
	    'remove_spaces' => FALSE,
	    'encrypt_name' => FALSE,
	);

	$npwp_upload = '';
	$tdp = '';
	$siup = '';
	$situ = '';
	$pkp = '';
	$iupop = '';
	$iukop = '';
	$pkp2b = '';
	$iupopkpm = '';
	$et = '';




	$this->load->library('upload', $konfigurasi);

	if (strlen($_FILES['npwp_upload']['name'])) {
	    if ($this->upload->do_upload('npwp_upload')) {
		$npwp_upload = $this->upload->data();
		$npwp_upload = $npwp_upload['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {
	    $npwp_upload = $this->input->post('uploaded_npwp');
	}

	if (strlen($_FILES['tdp']['name'])) {
	    if ($this->upload->do_upload('tdp')) {
		$tdp = $this->upload->data();
		$tdp = $tdp['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $tdp = $this->input->post('uploaded_tdp');
	}
	if (strlen($_FILES['siup']['name'])) {
	    if ($this->upload->do_upload('siup')) {
		$siup = $this->upload->data();
		$siup = $siup['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $siup = $this->input->post('uploaded_siup');
	}
	if (strlen($_FILES['situ']['name'])) {
	    if ($this->upload->do_upload('situ')) {
		$situ = $this->upload->data();
		$situ = $situ['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $situ = $this->input->post('uploaded_situ');
	}
	if (strlen($_FILES['pkp']['name'])) {
	    if ($this->upload->do_upload('pkp')) {
		$pkp = $this->upload->data();
		$pkp = $pkp['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $pkp = $this->input->post('uploaded_pkp');
	}
	if (strlen($_FILES['iukop']['name'])) {
	    if ($this->upload->do_upload('iukop')) {
		$iukop = $this->upload->data();
		$iukop = $iukop['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $iukop = $this->input->post('uploaded_iukop');
	}
	if (strlen($_FILES['pkp2b']['name'])) {
	    if ($this->upload->do_upload('pkp2b')) {
		$pkp2b = $this->upload->data();
		$pkp2b = $pkp2b['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $pkp2b = $this->input->post('uploaded_pkp2b');
	}
	if (strlen($_FILES['iupopkpm']['name'])) {
	    if ($this->upload->do_upload('iupopkpm')) {
		$iupopkpm = $this->upload->data();
		$iupopkpm = $iupopkpm['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $iupopkpm = $this->input->post('uploaded_iupopkpm');
	}
	if (strlen($_FILES['et']['name'])) {
	    if ($this->upload->do_upload('et')) {
		$et = $this->upload->data();
		$et = $et['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $et = $this->input->post('uploaded_et');
	}
	if (strlen($_FILES['iupop']['name'])) {
	    if ($this->upload->do_upload('iupop')) {
		$iupop = $this->upload->data();
		$iupop = $iupop['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	} else {

	    $iupop = $this->input->post('uploaded_iupop');
	}


//
//        $userid = $this->session->userdata('userid');
//        $recdate = date("Y-m-d H:i:s");
	$moduser = $this->session->userdata('userid');
	$moddate = date("Y-m-d H:i:s");

	$data = array(
	    'npwp_upload' => $npwp_upload,
	    'tdp' => $tdp,
	    'siup' => $siup,
	    'situ' => $situ,
	    'pkp' => $pkp,
	    'iukop' => $iukop,
	    'iupop' => $iupop,
	    'pkp2b' => $pkp2b,
	    'iupopkpm' => $iupopkpm,
	    'et' => $et,
            'no_reg_exporter' => $this->input->post('no_reg_exporter'),
            'date_reg_exporter' => $this->input->post('date_reg_exporter'),
            'no_pveb' => $this->input->post('no_pveb'),
            'date_pveb' => $this->input->post('date_pveb'),
	    'moduser' => $moduser,
	    'moddate' => $moddate
	);

	$this->db->where('client_id', $client_id);
	$this->db->update('tmst_client_document', $data);
    }

    public function InsertClientDocument($client_id) {

	$filepath_client_document = $this->config->item('filepath_client_document');

	$konfigurasi = array(
	    'upload_path' => $filepath_client_document,
	    'allowed_types' => 'pdf',
	    'max_size' => 1200,
	    'remove_spaces' => FALSE,
	    'encrypt_name' => FALSE,
	);

	$npwp_upload = "";
	$tdp = '';
	$siup = '';
	$situ = '';
	$pkp = '';
	$iupop = '';
	$iukop = '';
	$pkp2b = '';
	$iupopkpm = '';
	$et = '';




	$this->load->library('upload', $konfigurasi);

	if (strlen($_FILES['npwp_upload']['name'])) {
	    if ($this->upload->do_upload('npwp_upload')) {
		$npwp_upload = $this->upload->data();
		$npwp_upload = $npwp_upload['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}

	if (strlen($_FILES['tdp']['name'])) {
	    if ($this->upload->do_upload('tdp')) {
		$tdp = $this->upload->data();
		$tdp = $tdp['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['siup']['name'])) {
	    if ($this->upload->do_upload('siup')) {
		$siup = $this->upload->data();
		$siup = $siup['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['situ']['name'])) {
	    if ($this->upload->do_upload('situ')) {
		$situ = $this->upload->data();
		$situ = $situ['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['pkp']['name'])) {
	    if ($this->upload->do_upload('pkp')) {
		$pkp = $this->upload->data();
		$pkp = $pkp['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['iukop']['name'])) {
	    if ($this->upload->do_upload('iukop')) {
		$iukop = $this->upload->data();
		$iukop = $iukop['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['pkp2b']['name'])) {
	    if ($this->upload->do_upload('pkp2b')) {
		$pkp2b = $this->upload->data();
		$pkp2b = $pkp2b['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['iupopkpm']['name'])) {
	    if ($this->upload->do_upload('iupopkpm')) {
		$iupopkpm = $this->upload->data();
		$iupopkpm = $iupopkpm['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['et']['name'])) {
	    if ($this->upload->do_upload('et')) {
		$et = $this->upload->data();
		$et = $et['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}
	if (strlen($_FILES['iupop']['name'])) {
	    if ($this->upload->do_upload('iupop')) {
		$iupop = $this->upload->data();
		$iupop = $iupop['file_name'];
	    } else {
		array(false => $this->upload->display_errors());
		echo "<script type='text/javascript'>alert('Attached File Denied, Please choose another type of attachment..');window.close();</script>";
		die();
		//return array(false, $this->upload->display_errors());die();
	    }
	}


//
	$userid = $this->session->userdata('userid');
	$recdate = date("Y-m-d H:i:s");
//        $moduser = $this->session->userdata('userid');
//        $moddate = date("Y-m-d H:i:s");

	$data = array(
	    'client_id' => $client_id,
	    'npwp_upload' => $npwp_upload,
	    'tdp' => $tdp,
	    'siup' => $siup,
	    'situ' => $situ,
	    'pkp' => $pkp,
	    'iukop' => $iukop,
	    'iupop' => $iupop,
	    'pkp2b' => $pkp2b,
	    'iupopkpm' => $iupopkpm,
	    'et' => $et,
	    'userid' => $userid,
	    'recdate' => $recdate,
	);


	$this->db->insert('tmst_client_document', $data);
    }

}

?>