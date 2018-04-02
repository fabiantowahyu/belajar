<?php
class Md_supplier extends CI_Model {

    // Fungsi Ambil Data
    public function MDL_Select() {
        $tblsupplier = $this->config->item('tmst_supplier');
        $tbltypevar = $this->config->item('tmst_typevar');

        $hasil = array();

        $sSQL = "
			SELECT c.supplier_id,c.supplier_name, c.pic, c.hp, c.phone, c.fax, c.email, c.address, c.npwp
			FROM $tblsupplier c
			WHERE 1=1 
			ORDER BY c.supplier_name ASC
		";

        $ambil = $this->db->query($sSQL);
        if ($ambil->num_rows() > 0) {
            foreach ($ambil->result() as $data) {
                $hasil[] = $data;
            }
        }
        return $hasil;	
    }

    public function MDL_NewClient($supplier){
        $result = $this->db->insert('tmst_supplier', $supplier);
        return $result;
    }

    public function MDL_SelectID($id){
        $tblsupplier = $this->config->item('tmst_supplier');

        $tblName = $tblsupplier;

        return $this->db->get_where($tblName, array('supplier_id' => $id))->row();
    }

    public function MDL_SelectIDAddress($pid,$id){
        $tblcust_address = $this->config->item('tmst_supplier_address');

        $tblName = $tblcust_address;

        return $this->db->get_where($tblName, array('id' => $id))->row();
    }

    public function MDL_SelectIDPIC($pid,$id){
        $tblcust_pic = $this->config->item('tmst_supplier_pic');

        $tblName = $tblcust_pic;

        return $this->db->get_where($tblName, array('id' => $id))->row();
    }

    //PIC
    public function MDL_Select_PIC($id) {
        $tblcust_pic = $this->config->item('tmst_supplier_pic');
        $tbltypevar = $this->config->item('tmst_typevar');

        $hasil = array();

        $sSQL = "
			SELECT p.id, p.contact_name, p.email, p.fax, p.hp, p.work_phone, t.name as category_name
			FROM $tblcust_pic p,
				( SELECT id, name FROM $tbltypevar WHERE table_name = 'CATEGORY_PIC' ) t
			WHERE 1=1
				AND t.id = p.category
				AND p.supplier_id = '$id'
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
        $tblcust_pic = $this->config->item('tmst_supplier_pic');

        $id = $this->auth->Auth_nextuniqueid();
        $supplier_id = $this->input->post('supplier_id');
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
            'supplier_id' => $supplier_id,
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
        $tblcust_pic = $this->config->item('tmst_supplier_pic');

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
        $tblcust_pic = $this->config->item('tmst_supplier_pic');

        $this->db->delete($tblcust_pic, array('id' => $id));
    }

    //Address
    public function MDL_Delete_Address($id) {
        $tblcust_address = $this->config->item('tmst_supplier_address');

        $this->db->delete($tblcust_address, array('id' => $id));
    }

    public function MDL_Select_Address($id) {
        $tblcust_address = $this->config->item('tmst_supplier_address');
        $tbltypevar = $this->config->item('tmst_typevar');

        $hasil = array();

        $sSQL = "
			SELECT p.id, p.def_shipping, p.def_billing, p.residential, p.label, p.attention, p.addressee
				, IF(p.def_shipping=1,'Yes','No') AS shipping, IF(p.def_billing=1,'Yes','No') AS billing
				, IF(p.residential=1,'Yes','No') AS residential_lbl
				, p.phone, p.city, p.province, p.country, p.post_code, p.address
			FROM $tblcust_address p
			WHERE 1=1
				AND p.supplier_id = '$id'
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
        $tblcust_address = $this->config->item('tmst_supplier_address');

        $id = $this->auth->Auth_nextuniqueid();
        $supplier_id = $this->input->post('supplier_id');
        if($this->input->post('def_shipping') =='1'){
            $def_shipping ='1';
        } else {
            $def_shipping ='0';
        }

        if ($this->input->post('def_billing') =='1'){
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

        foreach($province as $key)
        {
            if($key){

                $data = array(
                    'id' => $id,
                    'supplier_id' => $supplier_id,
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
        $tblcust_address = $this->config->item('tmst_supplier_address');

        //$address_id = $this->input->post('address_id');
        //$supplier_id = $this->input->post('supplier_id');
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

        foreach($province as $key)
        {
            if($key){

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

    public function MDL_defaultShipping($id){
        $tblName = $this->config->item('tmst_supplier_address');

        $res = $this->db->get_where($tblName, array('supplier_id' => $id,'def_shipping' => 1))->row();

        return $res;
    }

    public function MDL_defaultBilling($id){
        $tblName = $this->config->item('tmst_supplier_address');

        $res = $this->db->get_where($tblName, array('supplier_id' => $id,'def_billing' => 1))->row();

        return $res;
    }

    // Fungsi Tambah Data
    public function MDL_Insert() {
        $tblsupplier = $this->config->item('tmst_supplier');

        $id = $this->input->post('id');
        $supplier = $this->input->post('supplier');
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
            'supplier_id' => $id,
            'supplier_name' => $supplier,
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

        $this->db->insert($tblsupplier, $data);
    }

    // Fungsi Ubah Data
    public function MDL_Update($id){
        $tblsupplier = $this->config->item('tmst_supplier');

        //$id = $this->input->post('id');
        $supplier = $this->input->post('supplier');
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
            'supplier_name' => $supplier,
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
            'moduser' => $moduser,
            'moddate' => $moddate
        );

        $this->db->where('supplier_id', $id);
        $this->db->update($tblsupplier, $data);
    }

    // Fungsi Hapus Data
    public function MDL_Delete($id) {
        $tblsupplier = $this->config->item('tmst_supplier');

        $this->db->delete($tblsupplier, array('supplier_id' => $id));
    }

    //=====================================================================
    public function MDL_isPermInsert($id){
        $tblName = $this->config->item('tmst_supplier');

        $res = $this->db->get_where($tblName, array('supplier_id' => $id))->num_rows();

        if($res) {
            return 0;
        } else {
            return 1;
        }
    }

    public function MDL_isPermInsert_Address($id){
        $tblName = $this->config->item('tmst_supplier_address');

        $res = $this->db->get_where($tblName, array('id' => $id))->num_rows();

        if($res) {
            return 0;
        } else {
            return 1;
        }
    }

    public function MDL_isPermDelete($id){
        $tblName = $this->config->item('ttrs_so');

        return 1;
        //$res = $this->db->get_where($tblName, array('empstatus_id' => $id))->num_rows();
        $sSQL = "
			SELECT supplier_id FROM $tblName WHERE supplier_id = '$id' LIMIT 0,1
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
        $tblsupplier = $this->config->item('tmst_supplier');

        $hasil = array();
        $tmpData = array();
        $jum = 0;


        $sSQL = "
			SELECT MAX(p.num) AS no_urut
			FROM (
				SELECT CAST(SUBSTRING(supplier_id,4,5) AS UNSIGNED INTEGER) AS num
				FROM $tblsupplier
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

        $nom_jo = sprintf("CLI%05d",$no_urut);

        return $nom_jo;	
    }

   /* public function MDL_Ajax_CekID(){
        $tblName = $this->config->item('tmst_supplier_address');

        $fvalue = $_REQUEST['address_id'];
        $res = $this->db->get_where($tblName, array('address_id' => $fvalue))->num_rows();

        if(!$res) {
            return true;
        } else {
            return false;
        }
    }*/

    public function select_region_by_countryID($country_code){
        $tbl_province    = $this->config->item('tmst_country');

        $query=$this->db->query("SELECT 
              a.country_code,
              a.country_name
            FROM
              $tbl_province a 
            WHERE  a.country_code = '$country_code'
            ORDER BY a.country_name asc");

        // echo $this->db->last_query();die();
        return $query->result();

    }

    public function select_region($country_code){
        $tbl_province = $this->config->item('tmst_province');
        $query=$this->db->query(" SELECT 
            a.country_code,
            a.province_name,
            a.province_code

            FROM $tbl_province a

            WHERE a.country_code = '$country_code' 
            ORDER BY a.province_name asc");
        return $query->result();
    }

}
?>